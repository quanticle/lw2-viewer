(uiop:define-package #:lw2.login
  (:use #:cl #:lw2-viewer.config #:lw2.utils #:lw2.backend #:alexandria #:cl-json #:flexi-streams #:websocket-driver-client)
  (:import-from #:ironclad #:byte-array-to-hex-string #:digest-sequence)
  (:export #:do-lw2-resume #:do-login #:do-lw2-create-user #:do-lw2-forgot-password #:do-lw2-reset-password
	   #:do-lw2-post-query #:do-lw2-post-query*
           #:do-lw2-post #:do-lw2-post-edit #:do-lw2-post-remove #:do-lw2-comment #:do-lw2-comment-edit #:do-lw2-comment-remove #:do-lw2-vote))

(in-package #:lw2.login) 

(defparameter *sockjs-debug-output* nil)

(declaim (inline maybe-output))
(defun maybe-output (stream prefix message)
  (if stream (format stream "~&~A: ~A~%" prefix message))
  message)

(defun forwarded-header ()
  (let ((addr (and (boundp 'hunchentoot:*request*) (hunchentoot:real-remote-addr))))
    (if addr
      (list (cons "X-Forwarded-For" addr))
      nil))) 

(defun sockjs-encode-alist (alist)
  (encode-json-to-string (list (encode-json-alist-to-string alist)))) 

(defun sockjs-decode (msg)
  (if (eq (elt msg 0) #\a) 
    (let ((response (map 'list #'decode-json-from-string (decode-json-from-string (subseq msg 1)))))
      (if (= (length response) 1)
	(first response)
	(error "Unsupported sockjs message.")))))

(defun password-digest (password)
  (byte-array-to-hex-string
    (digest-sequence :sha256
      (string-to-octets password :external-format :utf8))))

(defun random-string (length)
  (coerce (loop repeat length collecting (code-char (+ (char-code #\a) (ironclad:strong-random 26)))) 'string)) 

(defun do-lw2-sockjs-operation (operation)
  (let ((client (wsd:make-client (concatenate 'string *websocket-uri* "sockjs/329/" (random-string 8) "/websocket")
				 :additional-headers (forwarded-header)))
	(debug-output *sockjs-debug-output*) 
	(result-semaphore (sb-thread:make-semaphore))
	result)
    (unwind-protect
      (progn
	(wsd:start-connection client) 
	(wsd:on :message client (lambda (encoded-message)
				  (maybe-output debug-output "sockjs recd" encoded-message)
				  (let ((message (sockjs-decode encoded-message)))
				    (switch ((cdr (assoc :msg message)) :test 'equal)
					    ("connected"
                                             (wsd:send client (maybe-output debug-output "sockjs sent" (sockjs-encode-alist operation))))
					    ("result"
					     (setf result message)
					     (sb-thread:signal-semaphore result-semaphore)))))) 
	(wsd:send client (maybe-output debug-output "sockjs sent" (sockjs-encode-alist `(("msg" . "connect") ("version" . "1") ("support" . ("1"))))))
        (unless (sb-thread:wait-on-semaphore result-semaphore :timeout 10)
          (error "Timeout while waiting for LW2 server.")))
      (wsd:close-connection client))
    result))

(defun do-lw2-sockjs-method (method params)
  (do-lw2-sockjs-operation `(("msg" . "method")
                             ("method" . ,method)
                             ("params" . ,params)
                             ("id" . "3"))))

(defun parse-login-result (result)
  (let* ((result-inner (cdr (assoc :result result)))
	 (userid (cdr (assoc :id result-inner))) 
	 (token (cdr (assoc :token result-inner)))
         (expires (cdadr (assoc :token-expires result-inner))))
    (if (and userid token)
      (values userid token nil (and expires (floor expires 1000)))
      (if-let (error-message (cdr (assoc :reason (cdr (assoc :error result)))))
	      (values nil nil error-message)
	      (error "Unknown response from LW2: ~A" result)))))

(defun do-lw2-resume (auth-token)
  (let ((result (do-lw2-sockjs-method "login" `((("resume" . ,auth-token))))))
    (parse-login-result result)))

(declare-backend-function do-login)

(define-backend-operation do-login backend-lw2 (user-designator-type user-designator password)
  (let ((result (do-lw2-sockjs-method "login"
                                      `((("user" (,user-designator-type . ,user-designator))
                                         ("password"
                                          (digest . ,(password-digest password))
                                          ("algorithm" . "sha-256")))))))
    (parse-login-result result)))

(defun do-lw2-create-user (username email password)
  (let ((result (do-lw2-sockjs-method "createUser"
                                      `((("username" . ,username)
                                         ("email" . ,email)
                                         ("password"
                                          (digest . ,(password-digest password))
                                          ("algorithm" . "sha-256")))))))
    (parse-login-result result))) 

(defun do-lw2-forgot-password (email)
  (let ((result (do-lw2-sockjs-method "forgotPassword"
                                      `((("email" . ,email))))))
    (if-let (error-data (cdr (assoc :error result)))
            (values nil (cdr (assoc :reason error-data)))
            t)))

(defun do-lw2-reset-password (auth-token password)
  (let ((result (do-lw2-sockjs-method "resetPassword"
                                      `(,auth-token
                                         ((digest . ,(password-digest password))
                                          ("algorithm" . "sha-256"))))))
    (parse-login-result result)))

; resume session ["{\"msg\":\"connect\",\"session\":\"mKvhev8p2f4WfKd6k\",\"version\":\"1\",\"support\":[\"1\",\"pre2\",\"pre1\"]}"]
;
; logout ["{\"msg\":\"method\",\"method\":\"logout\",\"params\":[],\"id\":\"7\"}"]
;
; new user ["{\"msg\":\"method\",\"method\":\"createUser\",\"params\":[{\"username\":\"test2\",\"email\":\"test@example.com\",\"password\":{\"digest\":\"37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578\",\"algorithm\":\"sha-256\"}}],\"id\":\"8\"}"]

; (do-lw2-post-query "OCP7NeJEW9fPpYGG_nCN3g0felGTTNd0eg5uiLNQqBR" `((("query" . "mutation vote($documentId: String, $voteType: String, $collectionName: String) { vote(documentId: $documentId, voteType: $voteType, collectionName: $collectionName) { ... on Post { currentUserVotes { _id, voteType, power } } } }") ("variables" ("documentId" . "sqhAntEGpYgFXXH2H") ("voteType" . "upvote") ("collectionName" . "Posts")) ("operationName" . "vote"))))

(defun do-lw2-post-query (auth-token data)
  (lw2.backend::do-graphql-debug data)
  (let* ((response-json (octets-to-string
			  (drakma:http-request *graphql-uri* :method :post
                                               :additional-headers (remove-if #'null `(,(if auth-token (cons "authorization" auth-token))
                                                                                       ,@(forwarded-header)))
					       :content-type "application/json"
					       :content (encode-json-to-string data))))
	 (response-alist (json:decode-json-from-string response-json))
	 (res-error (first (cdr (assoc :errors response-alist))))
	 (res-data (rest (first (cdr (assoc :data response-alist)))))) 
    (cond
      (res-error (if (search "not_allowed" (cdr (assoc :message res-error))) (error "LW2 server reports: not allowed.")
		   (error "Unknown LW2 error: ~A" res-error)))
      (res-data res-data) 
      (t (error "Unknown response from LW2 server: ~A" response-json))))) 

(define-backend-operation do-login backend-accordius (user-designator-type user-designator password)
  (declare (ignore user-designator-type))
  (let* ((response
           (do-lw2-post-query nil `(("query" . "mutation Login($username: String, $password: String) { Login(username: $username, password: $password) {userId, sessionKey, expiration}}")
                                    ("variables" .
                                     (("username" . ,user-designator)
                                      ("password" . ,password))))))
         (user-id (format nil "~A" (cdr (assoc :user-id response))))
         (auth-token (cdr (assoc :session-key response)))
         (expiration (truncate (* 1000 (cdr (assoc :expiration response))))))
    (values user-id auth-token nil expiration)))

(defun do-lw2-post-query* (auth-token data)
  (cdr (assoc :--id (do-lw2-post-query auth-token data))))

(defun do-lw2-post (auth-token data)
  (do-lw2-post-query auth-token `(("query" . "mutation PostsNew($document: PostsInput) { PostsNew(document: $document) { _id, slug } }")
                                  ("variables" .
                                   (("document" . ,data)))
                                  ("operationName" . "PostsNew"))))

(defun do-lw2-post-edit (auth-token post-id set &optional unset)
  (do-lw2-post-query auth-token `(("query" . , (format nil "mutation PostsEdit($documentId: String, $set: PostsInput~@[, $unset: PostsUnset~]~@*) { PostsEdit(documentId: $documentId, set: $set~@[, unset: $unset~]~@*) { _id, slug } }" unset)) ; $unset: PostsUnset
				   ("variables" .
				    (("documentId" . ,post-id)
				     ("set" . ,set)
				     ,@(if unset `(("unset" . ,unset)))))
				   ("operationName" . "PostsEdit")))) 

(defun do-lw2-post-remove (auth-token post-id)
  (do-lw2-post-query auth-token `(("query" . "mutation PostsRemove($documentId: String) { PostsRemove(documentId: $documentId) { __typename } }")
				   ("variables" .
				    (("documentId" . ,post-id)))
				   ("operationName" . "PostsRemove"))))

(defun do-lw2-comment (auth-token data)
  (do-lw2-post-query* auth-token `(("query" . "mutation CommentsNew ($document: CommentsInput) { CommentsNew (document: $document) { _id } }")
				    ("variables" .
				     (("document" . ,data)))
				    ("operationName" . "CommentsNew"))))

(defun do-lw2-comment-edit (auth-token comment-id set)
  (do-lw2-post-query* auth-token `(("query" . "mutation CommentsEdit($documentId: String, $set: CommentsInput) { CommentsEdit(documentId: $documentId, set: $set) { _id } }")
				    ("variables" .
				     (("documentId" . ,comment-id)
				      ("set" . ,set)))
				    ("operationName" . "CommentsEdit")))) 

(defun do-lw2-comment-remove (auth-token comment-id)
  (do-lw2-post-query auth-token `(("query" . "mutation CommentsRemove($documentId: String) { CommentsRemove(documentId: $documentId) { __typename } }")
				   ("variables" .
				    (("documentId" . ,comment-id)))
				   ("operationName" . "CommentsRemove"))))

(defun do-lw2-vote (auth-token target target-type vote-type)
  (let ((ret (do-lw2-post-query auth-token
	       `(("query" . "mutation vote($documentId: String, $voteType: String, $collectionName: String) { vote(documentId: $documentId, voteType: $voteType, collectionName: $collectionName) { ... on Post { baseScore, currentUserVotes { _id, voteType, power } } ... on Comment { baseScore, currentUserVotes { _id, voteType, power } } } }")
		  ("variables" ("documentId" . ,target) ("voteType" . ,vote-type) ("collectionName" . ,target-type)) ("operationName" . "vote")))))
    (values (cdr (assoc :base-score ret)) (cdr (assoc :vote-type (first (cdr (assoc :current-user-votes ret))))) ret)))

(declare-backend-function generate-message-document)

(define-backend-operation generate-message-document backend-lw2 (conversation-id text)
  (alist :content
         (alist :blocks (loop for para in (ppcre:split "\\n+" text)
                              collect (alist :text para :type "unstyled"))
                :entity-map (make-hash-table))
         :conversation-id conversation-id))

(define-backend-operation generate-message-document backend-accordius (conversation-id text)
  (alist :body text
         :conversation-id conversation-id))

(declare-backend-function do-create-message)

(define-backend-operation do-create-message backend-lw2 (auth-token conversation-id text)
  (do-lw2-post-query auth-token
    (alist :query "mutation MessagesNew($document: MessagesInput) { MessagesNew(document: $document) { _id }}"
           :variables (alist :document (generate-message-document conversation-id text))
           :operation-name "MessagesNew")))
