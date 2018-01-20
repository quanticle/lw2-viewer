<?php
	header ('Content-type: text/css; charset=utf-8');
?>

<?php echo file_get_contents('fa-custom.css'); ?>

html {
	box-sizing: border-box;
	font-size: 16px;
}
*, *::before, *::after {
	box-sizing: inherit;
}
body {
	background-color: #d8d8d8;
	padding: 0;
	margin: 0;
	font-family: 'Concourse', 'a_Avante';
	font-feature-settings: 'ss07';
}
input {
	font-family: inherit;
	font-size: inherit;
	font-weight: inherit;
	border: 1px solid #ddd;
}
#content {
	background-color: #fff;
	box-shadow: 0px 0px 10px #555;
	margin: 0 auto;
	padding: 0 30px;
	overflow: auto;
	max-width: 900px;
/* 	min-height: 100vh; */
	line-height: 1.55;
	position: relative;
}

.rss {
	position: absolute;
	vertical-align: top;
	font-size: 0.9em;
	right: 0.4em;
	line-height: 1.8;
}
.rss::before {
	content: url('data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents("rss.svg")) ?>');
	display: inline-block;
	width: 1em;
	padding-right: 0.2em;
	position: relative;
	top: 1px;
}

/***********/
/* NAV BAR */
/***********/

.nav-bar {
	margin: 0 -30px;
}
.nav-bar {
	overflow: auto;
	display: table;
	width: calc(100% + 60px);
}
.nav-item {
	display: table-cell;
}
.nav-item * {
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
}
.nav-inner {
	padding: 12px 30px;
	font-weight: 600;
	font-size: 1.375em;
	text-align: center;
	display: block;
	position: relative;
}
#primary-bar.inactive-bar .nav-inner {
	padding-top: 11px;
	padding-bottom: 13px;
}
.nav-inner::after {
	position: absolute;
	left: 5px;
	top: -2px;
	content: attr(accesskey);
	font-weight: 400;
	font-size: 0.7em;
	color: #d6d6d6;
}
.nav-inner:hover::after {
	color: #bbb;
}
#secondary-bar .nav-inner {
	font-size: 1em;
	padding: 3px 0 4px 0;
}
#secondary-bar.active-bar .nav-inner {
	padding-top: 4px;
	padding-bottom: 4px;
}
#bottom-bar a {
	float: left;
	width: 100%;
}
.nav-bar a:link,
.nav-bar a:visited {
	color: #00e;
}
.nav-bar a:hover,
.nav-bar a:focus {
	text-decoration: none;
	text-shadow:
		0 0 1px #fff,
		0 0 3px #fff,
		0 0 5px #fff;
	outline: none;
}
.nav-bar .nav-item:not(.nav-current):not(#nav-item-search):hover {
	background-color: #ddd;
}
.inactive-bar .nav-item:not(.nav-current):not(#nav-item-search):hover {
	background-color: #d8d8d8;
}
#bottom-bar a:hover {
	background-color: #ddd;
}
#content > h1:first-child {
	margin-top: 2em;
}
#content > .post-meta:nth-last-child(2) {
	margin-bottom: 20px;
}

/* This makes the navbar items look like tabs: */

.nav-inactive {
	box-shadow: 
		 0 -1px #d8d8d8 inset,
		 1px 0 #fff inset;
}
.nav-current {
	border-right: 1px solid #d8d8d8;
	border-left: 1px solid #d8d8d8;
}
.nav-current:first-child {
	border-left: none;
}
.nav-current:last-child {
	border-right: none;
}
.nav-current + .nav-inactive,
.nav-inactive:first-child  {
	box-shadow: 0 -1px #d8d8d8 inset;
}

.inactive-bar .nav-inactive {
	background-color: #e4e4e4;
}
.active-bar .nav-inactive {
	background-color: #eee;
}
/* For Webkit: */
.active-bar {
	box-shadow: 0 -3px 8px -2px #ccc;
}

.active-bar .nav-inactive {
	box-shadow: 
		0 -4px 8px -4px #bbb inset,
		1px 0 #fff inset;
}
.active-bar .nav-inactive:first-child {
	box-shadow: 
		0 -4px 8px -4px #bbb inset;
}
.active-bar .nav-current + .nav-inactive {
	box-shadow: 
		4px -4px 8px -4px #bbb inset;
}
.active-bar .nav-item-last-before-current {
	box-shadow: 
		-4px -4px 8px -4px #bbb inset,
		1px 0 #fff inset;
}
.active-bar .nav-item-last-before-current:first-child {
	box-shadow: 
		-4px -4px 8px -4px #bbb inset;
}
/* And for Gecko: */
@-moz-document url-prefix() {
	.active-bar {
		box-shadow: 0 -3px 4px -2px #ccc;
	}

	.active-bar .nav-inactive {
		box-shadow: 
			0 -4px 4px -4px #bbb inset,
			1px 0 #fff inset;
	}
	.active-bar .nav-inactive:first-child {
		box-shadow: 
			0 -4px 4px -4px #bbb inset;
	}
	.active-bar .nav-current + .nav-inactive {
		box-shadow: 
			4px -4px 4px -4px #bbb inset;
	}
	.active-bar .nav-item-last-before-current {
		box-shadow: 
			-4px -4px 4px -4px #bbb inset,
			1px 0 #fff inset;
	}
	.active-bar .nav-item-last-before-current:first-child {
		box-shadow: 
			-4px -4px 4px -4px #bbb inset;
	}
}

#secondary-bar {
	table-layout: fixed;
}

/* Search tab */

#nav-item-search {
	width: 60%;
}
#secondary-bar #nav-item-search form {
	padding-top: 3px;
	padding-bottom: 4px;
}
#nav-item-search form::before {
	content: "";
	display: inline-block;
	vertical-align: top;
	background-image: url('data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents("search.svg")) ?>');
	height: 23px;
	width: 23px;
	padding: 3px 3px 3px 3px;
	background-repeat: no-repeat;
	background-origin: content-box;
}
#nav-item-search input {
	height: 23px;
	width: calc(95% - 96px);
	padding: 1px 4px;
}
#nav-item-search input:focus {
	outline: none;
	background-color: #ffd;
	border: 1px solid #bbb;
}
#nav-item-search:focus-within {
	background-color: #ddd;
}
.inactive-bar #nav-item-search:focus-within {
	background-color: #d8d8d8;
}
#nav-item-search.nav-current:focus-within {
	background-color: #fff;
}
#nav-item-search button {
	border: none;
	font-weight: inherit;
	height: 21px;
}

#nav-item-archive {
	width: 10%;
}
#nav-item-login {
	width: 15%;
}

/*******************/
/* QUICKNAV WIDGET */
/*******************/

#bottom-bar a[href='#top']::after,
.post-meta a[href='#comments']::after,
.post-meta a[href='#bottom-bar']::after {
	color: #999;
	background-color: #e4e4e4;
	font-family: 'Font Awesome';
	font-weight: 900;
	font-size: 1.5rem;
	line-height: 1.7;
	display: block;
	position: fixed;
	top: unset;
	left: unset;
	right: calc((100vw - 900px) / 2 - 75px);
	width: 40px;
	height: 40px;
	border-radius: 4px;
}

#bottom-bar a[href='#top']::after {
	content: '\F106';
	bottom: 120px;
}
.post-meta a[href='#comments']::after {
	content: '\F036';
	bottom: 70px;
}
.post-meta a[href='#bottom-bar']::after {
	content: '\F107';
	bottom: 20px;
}

#bottom-bar a[href='#top']:hover::after,
.post-meta a[href='#comments']:hover::after,
.post-meta a[href='#bottom-bar']:hover::after  {
	color: #000;
	background-color: #eee;
}
#bottom-bar a[href='#top']:active::after,
.post-meta a[href='#comments']:active::after,
.post-meta a[href='#bottom-bar']:active::after {
	transform: scale(0.9);
}
#bottom-bar a[href='#top']:focus:not(:hover)::after,
.post-meta a[href='#comments']:focus:not(:hover)::after,
.post-meta a[href='#bottom-bar']:focus:not(:hover)::after {
	transform: none;
}

.comment-thread ~ #bottom-bar a[href='#top']::after,
.listing ~ #bottom-bar a[href='#top']::after {
	display: none;
}

/************/
/* ARCHIVES */
/************/

.archive-nav {
	margin: 1.25em 0.5em -1.25em;
	padding: 0.25em;
	border: 1px solid #aaa;
	position: relative;
}
.archive-nav:last-child {
	margin-bottom: 5em;
}
.archive-nav:last-child::after {
	content: "No posts for the selected period.";
	display: block;
	position: absolute;
	width: 100%;
	text-align: center;
	padding: 1.25em 0 1.25em 0;
	font-size: 1.25em;
}

div[class^='archive-nav-'] {
	display: table;
	table-layout: fixed;
	width: 100%;
}

.archive-nav *[class^='archive-nav-item'] {
	border-style: solid;
	border-color: #ddd;
	border-width: 1px 0 1px 1px;
	background-color: #eee;
	display: table-cell;
	text-align: center;
	padding: 6px 4px 4px 4px;
	line-height: 1;
}
@-moz-document url-prefix() {
	.archive-nav *[class^='archive-nav-item'] {
		padding: 5px 4px;
	}
}
.archive-nav div[class^='archive-nav-']:nth-of-type(2) *[class^='archive-nav-item'] {
	border-top-width: 0;
	border-bottom-width: 0;
}
.archive-nav div[class^='archive-nav-']:last-of-type *[class^='archive-nav-item'] {
	border-bottom-width: 1px;
}
.archive-nav *[class^='archive-nav-item']:last-child {
	border-right-width: 1px;
}
.archive-nav span[class^='archive-nav-item'] {
	font-weight: bold;
	background-color: #e0e0e0;
}
.archive-nav span[class^='archive-nav-item-day'] {
	background-color: #ddd;
}
.archive-nav-years .archive-nav-item-year:first-child {
	width: 6.5%;
}
.archive-nav-months::after,
.archive-nav-days::after {
	content: "";
}
.archive-nav-item-month {
	width: 7.75%;
}
.archive-nav-item-month:first-child {
	width: 7.25%;
}
.archive-nav-days .archive-nav-item-day {
	font-size: 0.8em;
	padding: 7px 0 5px 0;
	width: 3.5%;
}
.archive-nav-days .archive-nav-item-day:first-child {
	width: 4%;
}

.archive-nav a:link, .archive-nav a:visited {
	color: rgba(0, 0, 238, 0.7);
}
.archive-nav a:hover {
	text-decoration: none;
	color: #c00;
	background-color: #e0e0e0;
	text-shadow: 
		0 0 1px #fff,
		0 0 3px #fff;
}
.archive-nav a:active {
	transform: scale(0.9);
}
.archive-nav a:focus:not(:hover) {
	transform: none;
}
.archive-nav a.archive-nav-item-day:hover {
	background-color: #ddd;
}

/************/
/* LISTINGS */
/************/

h1.listing {
	font-family: 'Concourse';
	font-size: 1.875rem;
	line-height: 1.15;
	margin: 0.8em 20px 0.1em 20px;
}
@media only screen and (min-width: 901px) {
	h1.listing {
		max-height: 1.15em;
	}
}
h1.listing:first-of-type {
	margin-top: 1.5em;
}
.listing + .post-meta {
	text-align: left;
	margin: 0 20px 0 21px;
}
h1.listing a {
	color: #00c;
	position: relative;
	padding-left: 38px;
}
@media only screen and (min-width: 901px) {
	h1.listing a {
		max-width: 100%;
		display: inline-block;
		white-space: nowrap;
		text-overflow: ellipsis;
		overflow: hidden;
		border-bottom: 1px solid transparent;
		-moz-hyphens: auto;
		hyphens: auto;
		z-index: 1;
	}
}
h1.listing a[href^="/"] {
	color: #000;
	padding-left: 0;
}
h1.listing a:hover {
	color: #4879ec;
	text-decoration: dotted underline;
	white-space: initial;
	overflow: visible;
	background-color: rgba(255,255,255,0.85);
	z-index: 2;
}
<?php $margin_of_hover_error = '10px'; ?>
h1.listing a:hover::before {
	content: "";
	position: absolute;
	top: -<?php echo $margin_of_hover_error; ?>;
	right: -<?php echo $margin_of_hover_error; ?>;
	bottom: -<?php echo $margin_of_hover_error; ?>;
	left: -<?php echo $margin_of_hover_error; ?>;
	z-index: -1;
}
h1.listing a[href^="/"]:hover {
	color: #777;
}
h1.listing a::after { 
	content: url('data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents("chain-link.svg")) ?>');
	width: 30px;
	position: absolute;
	top: 0px;
	left: 0px;
}
h1.listing a[href^="/"]::after {
	 content: none;
}

/******************/
/* SEARCH RESULTS */
/******************/

#content.search-results-page h1.listing,
#content.search-results-page .post-meta {
	text-align: left;
}
#content.search-results-page h1.listing {
	margin-left: 0;
	font-size: 1.625em;
}
#content.search-results-page .post-meta {
	margin-left: 2px;
	font-size: 1rem;
	opacity: 0.7;
}
#content.search-results-page .post-meta .author {
  font-weight: 600;
}

/**************/
/* LOGIN FORM */
/**************/

.login-container {
	margin: 3em 0 3em;
	padding: 0 0 1em 0;
	overflow: auto;
}
.login-container > div {
	float: left;
	width: 50%;
}
.login-container h1 {
	text-align: center;
	margin: 0.5em 0;
}
#login-form-container h1 {
	padding-left: 2rem;
}
#create-account-form-container {
	background-color: #f3f3f3;
	padding: 0 0 0.5em 1em;
	border: 1px solid #ddd;
	font-size: 0.9em;
	width: calc(50% - 1em);
	margin-right: 1em;
}
#create-account-form-container h1 {
	font-size: 1.7em;
}
.login-container form > div > div {
	overflow: auto;
	margin: 0.25em 0;
}
.login-container form label,
.login-container form input {
	float: left;
}
.login-container form label {
	clear: left;
	text-align: right;
	padding: 0.25em 0.5em;
	white-space: nowrap;
}
.login-container form input {
	width: calc(100% - 11em);
	padding: 0.25em;
}
.login-container form input[type='submit'] {
	float: right;
	width: calc(100% - 15em);
	padding: 0.35em;
	font-weight: bold;
	line-height: 1;
	background-color: #eee;
	border: 1px solid #ccc;
}
.login-container form input[type='submit']:hover,
.login-container form input[type='submit']:focus {
	background-color: #ddd;
	border: 1px solid #aaa;
}
.login-container form label + input:focus {
	background-color: #ffd;
	border: 1px solid #bbb;
	box-shadow: 0 0 1px #bbb;
	outline: none;
}
#login-form label {
	width: 7em;
}
#login-form input[type='submit'] {
	margin: 0.5em 6em;
}
#signup-form label {
	width: 9em;
}
#signup-form input[type='submit'] {
	margin: 0.75em 4em 0.5em 4em;
	padding: 0.4em 0.5em 0.5em 0.5em;
	background-color: #e4e4e4;
	border: 1px solid #ccc;
}
#signup-form input[type='submit']:hover {
	background-color: #d8d8d8;
	border: 1px solid #aaa;
}
.error-box {
	margin: 1.5em 0.875em -1.5em 0.875em;
	padding: 0.25em;
	text-align: center;
	border: 1px solid red;
	background-color: #faa;
}

/*********************/
/* TABLE OF CONTENTS */
/*********************/

.contents {
	font-family: 'Concourse';
	border: 1px solid #ddd;
	background-color: #eee;
	float: right;
	min-width: 12em;
	max-width: 40%;
	margin: 1.25em 0 0.75em 1.25em;
	padding: 0.35em 0.35em 0.4em 0.35em;
	-webkit-hyphens: none;
	hyphens: none;
}

.contents-head {
	text-align: center;
	font-weight: bold;
	margin-bottom: 0.25em;
}

.post-body .contents ul {
	list-style-type: none;
	margin: 0 0 0 0.5em;
	counter-reset: toc-item-1 toc-item-2 toc-item-3;
	padding-left: 1em;
	font-size: 0.75em;
}
.post-body .contents li {
	margin: 0.15em 0 0.3em 1em;
	text-align: left;
	text-indent: -1em;
	line-height: 1.2;
	position: relative;
}
.post-body .contents li::before {
	position: absolute;
	width: 3em;
	display: block;
	text-align: right;
	left: -4.5em;
	color: #999;
}
.contents .toc-item-1 {
	counter-increment: toc-item-1;
	counter-reset: toc-item-2 toc-item-3;
}
.contents .toc-item-1::before {
	content: counter(toc-item-1);
}
.contents .toc-item-1 ~ .toc-item-2 {
	margin-left: 3em;
	font-size: 0.95em;
}
.contents .toc-item-2 {
	counter-increment: toc-item-2;
	counter-reset: toc-item-3;
}
.contents .toc-item-1 ~ .toc-item-2::before {
	content: counter(toc-item-1) "." counter(toc-item-2);
}
.contents .toc-item-2::before {
	content: counter(toc-item-2);
}
.contents .toc-item-1 + .toc-item-3 {
	counter-increment: toc-item-2 toc-item-3;
}
.contents .toc-item-2 ~ .toc-item-3,
.contents .toc-item-1 ~ .toc-item-3 {
	margin-left: 3em;
	font-size: 0.95em;
}
.contents .toc-item-1 ~ .toc-item-2 ~ .toc-item-3 {
	margin-left: 6em;
	font-size: 0.9em;
}
.contents .toc-item-3 {
	counter-increment: toc-item-3;
}
.contents .toc-item-1 ~ .toc-item-2 ~ .toc-item-3::before {
	content: counter(toc-item-1) "." counter(toc-item-2) "." counter(toc-item-3);
}
.contents .toc-item-1 ~ .toc-item-3::before {
	content: counter(toc-item-1) "." counter(toc-item-3);
}
.contents .toc-item-2 ~ .toc-item-3::before {
	content: counter(toc-item-2) "." counter(toc-item-3);
}
.contents .toc-item-3::before {
	content: counter(toc-item-3);
}
.contents .toc-item-4,
.contents .toc-item-5,
.contents .toc-item-6 {
	display: none;
}

/********************/
/* POSTS & COMMENTS */
/********************/

.post-meta *,
.comment-meta * {
	display: inline-block;
	margin-right: 1em;
	font-size: 1.0625em;
}
.comment-meta .comment-post-title {
	display: block;
}
.post-body, .comment-body {
	text-align: justify;
	-webkit-hyphens: auto;
	hyphens: auto;
}
.post-body p, .comment-body p {
	margin: 1em 0;
}
.post-meta .date {
	color: #888;
}

/*********/
/* POSTS */
/*********/

.post-meta {
	text-align: center;
}
.post-meta:last-child {
	margin-bottom: 40px;
}
.post-meta .author {
	color: #090;
}
.post-body {
	min-height: 8em;
	font-family: Charter;
	padding: 0 30px;
	line-height: 1.5;
	font-size: 1.3rem;
	overflow: auto;
	margin: 0.5em 0 0 0;
}
.post > h1:first-child {
	margin: 1em 0 0.25em 0;
	padding: 0 30px;
	text-align: center;
	font-size: 2.5em;
	line-height: 1.1;
}

/************/
/* COMMENTS */
/************/

#comments {
	border-top: 1px solid #000;
}
#comments:empty::before {
	content: "No comments.";
	display: block;
	width: 100%;
	text-align: center;
	padding: 0.75em 0 0.9em 0;
	font-size: 1.375em;
}

.comment-item input[id^="expand"] {
	display: none;
}
.comment-item input[id^="expand"] + label {
	display: block;
	visibility: hidden;
	position: relative;
	margin: 8px 9px;
}
.comment-item input[id^="expand"] + label::after {
	content: "(Expand " attr(data-child-count) "  below)";
	visibility: visible;
	position: absolute;
	left: 0;
	white-space: nowrap;
	color: #00e;
	font-weight: 600;
	cursor: pointer;
}
.comment-item input[id^="expand"]:checked + label::after {
	content: "(Collapse " attr(data-child-count) "  below)";
}
.comment-item input[id^="expand"] + label:hover::after {
	color: #c00;
}
.comment-item input[id^="expand"] + label:active::after,
.comment-item input[id^="expand"] + label:focus::after{
	color: #c00;
}
.comment-item input[id^="expand"] ~ .comment-thread {
	max-height: 34px;
	overflow: hidden;
}
.comment-item input[id^="expand"] ~ .comment-thread > li:first-child {
	margin-top: 0;
}
.comment-item input[id^="expand"]:checked ~ .comment-thread {
	max-height: 1000000px;
}

.comment-item input[id^="expand"]:checked ~ .comment-thread .comment-thread .comment-item {
  margin: 0;
	border-width: 1px 0 0 0;
}
.comment-item input[id^="expand"]:checked ~ .comment-thread .comment-thread .comment-item a.comment-parent-link:hover::after {
	display: none;
}

<?php
	function nested_stuff($segment, $tip, $last_tip, $nesting_levels) {
		for ($i = $nesting_levels; $i > 0; $i--) {
			for ($j = $i; $j > 0; $j--)
				echo $segment;
			echo $tip;
		}
		echo $last_tip;
	}
	$comment_nesting_depth = 10;
?>

<?php nested_stuff(".comment-item .comment-item ", ".comment-item,\n", ".comment-item", $comment_nesting_depth); ?> {
	background-color: #eee;
}
<?php nested_stuff(".comment-item .comment-item ", ".comment-item a.comment-parent-link::after,\n", ".comment-item a.comment-parent-link::after", $comment_nesting_depth); ?> {
	box-shadow: 
		0 28px 16px -16px #fff inset,
		4px 16px 0 12px #ffd inset,
		4px  4px 0 12px #ffd inset;
}

<?php nested_stuff(".comment-item .comment-item ", ".comment-item .comment-item,\n", ".comment-item .comment-item", $comment_nesting_depth); ?> {
	background-color: #fff;
}
<?php nested_stuff(".comment-item .comment-item ", ".comment-item .comment-item a.comment-parent-link::after,\n", ".comment-item .comment-item a.comment-parent-link::after", $comment_nesting_depth); ?> {
	box-shadow: 
		0 28px 16px -16px #eee inset,
		4px 16px 0 12px #ffd inset,
		4px  4px 0 12px #ffd inset;
}

<?php nested_stuff(".comment-item ", ".comment-item:target:not(:focus-within),\n", ".comment-item:target:not(:focus-within)", (2 * $comment_nesting_depth) - 1); ?> {
	background-color: #ffd;
}
.comment-item:target > .comment-thread > .comment-item > .comment > .comment-meta > a.comment-parent-link::after {
	box-shadow: 
		0 28px 16px -16px #ffd inset,
		4px 16px 0 12px #ffd inset,
		4px  4px 0 12px #ffd inset !important;
}

ul.comment-thread {
	list-style-type: none;
	padding: 0;
}

.comment-item {
	border: 1px solid #ccc;
	margin: 2em 0 0 0;
}

.comment-item .comment-item {
	margin: 1em 8px 8px 16px;
}

.comment-item .comment-item + .comment-item {
	margin: 2em 8px 8px 16px;
}

.comment-meta {
	padding: 2px 64px 2px 10px;
	margin: 0 -1px;
	border: none;
}
.comment-meta .author {
	font-weight: bold;
	font-size: 1.25em;
}
.comment-meta .lw2-link {
	margin-left: 1em;
}

.comment-body {
	font-family: Charter;
	line-height: 1.45;
	font-size: 1.2rem;
	padding: 10px;
}

.comment-body ul {
	list-style-type: circle;
}
.comment-body > *:first-child {
	margin-top: 0;
}
.comment-body > *:last-child {
	margin-bottom: 0;
}

a.comment-parent-link {
	opacity: 0.5;
}
a.comment-parent-link:hover {
	opacity: 1.0;
}

a.comment-parent-link::before {
	content: "";
	font-family: "Font Awesome";
	font-weight: 900;
	font-size: 0.75rem;
	color: #bbb;
	line-height: 1;
	position: absolute;
	z-index: 1;
	display: block;
	padding: 3px 3px 0 3px;
	width: 16px;
	height: calc(100% + 2px);
	top: -1px;
	left: -17px;
	content: "\F062";
}
a.comment-parent-link:hover::before {
	background-color: #ffd;
	color: #999;
}
a.comment-parent-link::after {
	content: "";
	position: absolute;
	z-index: 0;
	display: block;
	width: calc(100% + 26px);
	height: calc(100% + 38px);
	top: -29px;
	left: -17px;
	pointer-events: none;
	overflow: hidden;
	visibility: hidden;
}
a.comment-parent-link:hover::after {
	visibility: visible;
}

#comments .comment-thread > li {
	position: relative;
}

.comment-item-highlight {
	box-shadow:
		0 0  2px #e7b200,
		0 0  3px #e7b200,
		0 0  5px #e7b200,
		0 0  7px #e7b200,
		0 0 10px #e7b200;
	border: 1px solid #e7b200;
}
.comment-item-highlight-faint {
	box-shadow:
		0 0  2px #f8e7b5,
		0 0  3px #f8e7b5,
		0 0  5px #f8e7b5,
		0 0  7px #f8e7b5,
		0 0 10px #f8e7b5;
	border: 1px solid #f8e7b5;
}
.comment-popup {
	position: fixed;
	background-color: #fff;
	top: 10%;
	right: 10%;
	max-width: 700px;
	z-index: 1000;
	font-size: 1rem;
}
.comment-popup .comment-parent-link {
	display: none;
}
.comment-popup .comment-body {
	font-size: 1rem;
}

/****************/
/* VOTE BUTTONS */
/****************/

.comment-meta .vote,
.comment-meta .karma {
	margin: 0;
}
.comment-meta .vote {
	font-family: Font Awesome;
	font-weight: 900;
	border: none;
}
.comment-meta .upvote {
	color: #c8c8c8;	
}
.comment-meta .upvote:hover,
.comment-meta .upvote.selected {
	color: #00d800;
}
.comment-meta .upvote::before {
	content: '\F055';
}
.comment-meta .downvote {
	color: #ccc;
}
.comment-meta .downvote:hover,
.comment-meta .downvote.selected {
	color: #eb4c2a;
}
.comment-meta .downvote::before {
	content: '\F056';
}

/*****************/
/* COMMENTING UI */
/*****************/

.comment-controls {
	text-align: right;
	margin: 0 8px 8px 16px;
}
.comment-thread .comment-controls + .comment-thread > li:first-child {
	margin-top: 8px;
}
#comments > .comment-controls {
	margin: 8px 0 0 0;
}
#comments > .comment-controls:last-child {
	margin: 8px 0 16px 0;
}
#comments > .comment-controls > button {
	font-weight: 600;
	font-size: 1.25rem;
	padding: 0;
	margin: 0 0.25em;
}
.comment-controls textarea {
	display: block;
	width: 100%;
	height: 15em;
	min-height: 15em;
	max-height: calc(100vh - 6em);
	margin: 2px 0;
	padding: 4px 5px;
	font-family: Charter, serif;
	font-size: 1.2rem;
	border: 1px solid #aaa;
	border-top-width: 29px;
	box-shadow: 
		0 0 0 1px #eee inset;
	resize: none;
}
.comment-controls textarea:focus {
	outline: none;
	background-color: #ffd;
	border-color: #00e;
	box-shadow: 
		0 0 0 1px #ddf inset,
		0 0 0 1px #fff,
		0 0 0 2px #00e;
}
.comment-controls form span {
	float: left;
	padding: 2px 0 0 6px;
}
.comment-controls .markdown-reference-link a {
	background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJAAAACQCAQAAABNTyozAAAEDklEQVR4Ae3cY3QDjRaG0V1e27Zt27Zt27Ztf7Zt27Zt10jOdZtZzbSN2q41533+tsFO4zRi0TKRJVACJdDiJVACJVACJVACZQmUQAmUQAmUQAmUQFkCJVACJVACJVACJVDWuD7P8icnGRcVbdyJ/uRZ+jTZYxwq/lN2qMcozvtMibmySe/TsPeqi0JZ3XsAHm1SZAua9CjgoMQo6UB4uiim5gbXV7Ab1EQxT+P3RRw/dHtV3e39UL3g8XuOEw39QNX3g4LHcYwU/n5uo+q7beGKNqLwJ3U1cteKuepEQ1cid03BJIESKIESKIESKIESaIkl0I3dv7Q7a293c//ShrWym7l/abdbGaCnidJGPFzre6opUdqDtLJXitJ+svpA4Uy30dru6hJRHaCws37L37CDRbWAwvctf38S1QOqe43l7f2iikDheg+x9J5ksqpA4TS3svju5CJRXaCwvX7lG3KAqDZQ+Jby/U4kUM0rNN+7hAQSrvNAC/c4Ewn0/052C8Xd0fkigebbRp/5DdpHJFCxr5nfr4QEUqzmJYC3iQRq1jXuj8cYT6CyTnAv54oEKm9EJFBnJVAC7eoS0XJn2r8qQP/wNFOipUY8wvbVAeIjooXq3ki1gPhHC0A/oWWgQZ/37ZI2FaUdVPpb33LHlQS6scPFstrDQBtAvEpNdLEfsZJA3N3lYsnOcTvaAuKzomttqW+lgXimabFoYx5N20D8SXSlw9yElQfiE0J5dW+lI6BBu4uOO8+dWB0g1hel/YIOgbiVE0VHXefhrB7QTRwtmra3gS4AcW+Xibab8SJWE4h7uaLpn/Ud6AoQTzIu2uzDrDYQzzUjCo17HF0D4g3qoo1+yWoCld8hv5OuAvFl0XLb6V8rQGws5votXQfqs45oqaPdjLUDdNO5f7Xa32APgBhu6b2SC92VtQTEfVwlXOhO9ASI2zhNLKsRj2atAfFCo55Iz4C4nyvFks16OWsRiPvQUyCeblIs0adYq0B6DsTb1EV5fk+1gfiWKG0XAwnUZyPRtOPdggTiRg4UC7rEPUkg4PbOFIXGPIEEmt+DCmeu5rUkUHHPaXj76Qsk0MK9R/ynv5FAzfdDYS9Da+n/xe6ovd2lS/8vVlyfH7o1vQLKJVACJVACJVACJVACIYGW/A6z/A6zG8RcNbdT9d1eTcx1A8eKhn6s6vtxweNYfisaqvupu+jXV8H63cXP1Asev+Wpopi6aVMVbFpdFPMUlP6jdrY/8AgTYkHZhEcAvFNdFMpq3qFh78y/okIT3qk4j8zborn290hN91S/c6zrzapVsFnXO9bvPFXjYtEykSVQAnVUAiVQAiVQAiVQAiVQlkAJlEAJlEAJlEAJlCVQAiVQAiVQAiVQAmX/BMHb3CdNrgcrAAAAAElFTkSuQmCC');
	background-size: 1.25em;
	background-repeat: no-repeat;
	padding-right: 1.5em;
	background-position: center right;
	margin-right: 0.15em;
}
#markdown-hints-checkbox + label {
	float: left;
	padding: 2px 0 0 0;
	margin: 0 0 0 1em;
	color: #00e;
	cursor: pointer;
}
#markdown-hints-checkbox {
	visibility: hidden;
}
#markdown-hints-checkbox + label::after {
	content: "(Show commenting help)";
}
#markdown-hints-checkbox:checked + label::after {
	content: "(Hide commenting help)";
}
#markdown-hints-checkbox + label::before {
	content: '\F059';
	font-family: Font Awesome;
	font-weight: 900;
	margin-right: 3px;
}
#markdown-hints-checkbox:checked + label::before {
	font-weight: normal;
}
#markdown-hints-checkbox + label:hover {
	color: #e00;
	text-shadow:
		0 0 1px #fff,
		0 0 3px #fff;
}
.comment-controls .markdown-hints {
	margin: 4px 0 0 4px;
	padding: 4px 8px;
	border: 1px solid #c00;
	background-color: #ffa;
	position: absolute;
	text-align: left;
	top: calc(100% - 1em);
	z-index: 1;
	display: none;
}
.comment-controls #markdown-hints-checkbox:checked ~ .markdown-hints {
	display: table;
}
.comment-controls .markdown-hints-row {
	display: table-row;
}
.comment-controls .markdown-hints-row span,
.comment-controls .markdown-hints-row code {
	float: none;
	display: table-cell;
	border: none;
	background-color: inherit;
	padding: 0 12px 0 0;
}
.comment-controls input[type='submit'] {
	margin: 6px;
	background-color: #fff;
	padding: 4px 10px;
	border: 1px solid #aaa;
	font-weight: bold;
	font-size: 1.125rem;
}
.comment-controls input[type='submit']:hover,
.comment-controls input[type='submit']:focus {
	background-color: #ddd;
	border: 1px solid #999;
}
.comment-controls button {
	border: none;
	font-weight: 600;
	padding: 1px 6px;
	position: relative;
	z-index: 1;
}
.comment-controls .cancel-comment-button,
#comments > .comment-controls .cancel-comment-button {
	position: absolute;
	right: 8px;
	margin: 0;
	height: 27px;
	font-size: inherit;
	color: #c00;
	text-shadow: 
		0 0 1px #fff,
		0 0 2px #fff;
	padding: 4px 8px 2px 4px;
}
#comments > .comment-controls .cancel-comment-button {
	right: 30px;
}
.comment-controls .cancel-comment-button:hover,
#comments > .comment-controls .cancel-comment-button:hover {
	color: #f00;
	text-shadow:
		0 0 1px #fff,
		0 0 3px #fff,
		0 0 5px #fff;
}
.comment + .comment-controls .action-button {
	font-weight: normal;
	font-size: 1.0625em;
}
.comment-controls .edit-button {
	position: absolute;
	right: 8px;
	top: 7px;
	color: #0b0;
}
.comment-controls .edit-button:hover {
	color: #f00;
}
.comment-controls .action-button::before {
	font-family: Font Awesome;
	margin-right: 3px;
}
.comment-controls .reply-button::before {
	content: '\F3E5';
	font-weight: 900;
	font-size: 0.9em;
	opacity: 0.6;
}
.comment-controls .edit-button::before {
	content: '\F303';
	font-weight: 900;
	font-size: 0.75em;
	position: relative;
	top: -1px;
}
.comment-controls .cancel-comment-button::before {
	font-family: Font Awesome;
	margin-right: 3px;
	content: '\F00D';
	font-weight: 900;
	font-size: 0.9em;
	opacity: 0.7;
}
.comment-controls form {
	position: relative;
}
.guiedit-buttons-container {
	background-image: linear-gradient(to bottom, #fff 0%, #ddf 50%, #ccf 75%, #aaf 100%);
	position: absolute;
	left: 1px;
	top: 1px;
	width: calc(100% - 2px);
	height: 28px;
	text-align: left;
	padding: 1px 4px 0 4px;
}
.guiedit-buttons-container button {
	height: 26px;
	padding: 0 7px;
	font-family: Font Awesome, Charter;
	font-weight: 900;
	font-size: 0.875rem;
	position: static;
}
.guiedit-buttons-container button sup {
	font-weight: bold;
}
.guiedit::after {
	content: attr(data-tooltip);
	position: absolute;
	font-weight: normal;
	font-family: Concourse;
	font-size: 1rem;
	top: 0;
	left: 400px;
	color: #777;
	text-shadow: none;
	height: 27px;
	padding: 4px 0;
	white-space: nowrap;
	visibility: hidden;
}
.guiedit:hover::after {
	visibility: visible;
}

/*********/
/* LINKS */
/*********/

a {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}

/***********/
/* BUTTONS */
/***********/

button,
input[type='submit'] {
	font-family: inherit;
	font-size: inherit;
	color: #00e;
	background-color: inherit;
	cursor: pointer;
	border: none;
}
button:hover,
input[type='submit']:hover {
	color: #d00;
	text-shadow:
		0 0 1px #fff,
		0 0 3px #fff,
		0 0 5px #fff;
}
button:active,
input[type='submit']:active {
	color: #f00;
	transform: scale(0.9);
}
button:focus,
input[type='submit']:focus {
	outline: none;
}

/************/
/* HEADINGS */
/************/

.post-body h1,
.post-body h2,
.post-body h3,
.post-body h4,
.post-body h5,
.post-body h6 {
	font-family: 'Concourse';
	line-height: 1.1;
	margin: 1em 0 0.75em 0;
	text-align: left;
}

.post-body h5,
.post-body h6 {
	font-size: 1em;
	font-weight: 600;
	font-family: 'Concourse SmallCaps';
}
.post-body h6 {
	color: #555;
}
.post-body h4 {
	font-size: 1.2em;
}
.post-body h3 {
	font-size: 1.4em;
	font-family: 'Concourse SmallCaps';
	font-weight: 
}
.post-body h2 {
	font-size: 1.75em;
}
.post-body h1 {
	font-size: 2.1em;
	border-bottom: 1px solid #aaa;
}
/********/
/* MISC */
/********/

blockquote {
	font-size: 0.9em;
	margin: 1em 0;
	padding-left: 0.5em;
	border-left: 5px solid #ccc;
	margin-left: 1px;
	padding-bottom: 3px;
}
blockquote *:first-child {
	margin-top: 0;
}
blockquote *:last-child {
	margin-bottom: 0;
}

.post-body img {
	max-width: 100%;
}

li {
	margin-bottom: 0.5em;
}

sup, sub {
	vertical-align: baseline;
	position: relative;
	top: -0.5em;
	left: 0.05em;
	font-size: 0.8em;
}
sub {
	top: 0.3em;
	hyphens: none;
}

hr {
	border: none;
	border-bottom: 1px solid #999;
}

code {
	font-family: Inconsolata, Menlo, monospace;
	font-size: 0.95em;
	display: inline-block;
	background-color: #f6f6ff;
	border: 1px solid #ddf;
	padding: 0 4px 1px 5px;
	border-radius: 4px;
}
pre > code {
	display: block;
	border-radius: 0;
	padding: 3px 4px 5px 8px;
}

figure {
	text-align: center;
	margin: 1.5em auto;
}

figure img {
	border: 1px solid #000;
}

/*************/
/* FOOTNOTES */
/*************/

ol {
	counter-reset: ordered-list;
}
.footnote-definition {
	font-size: 0.9em;
	list-style-type: none;
	counter-increment: ordered-list;
	position: relative;
}
.footnote-definition p {
	font-size: inherit !important;
}
.footnote-definition::before {
	content: counter(ordered-list) ".";
	position: absolute;
	left: -2.5em;
	font-weight: bold;
	text-align: right;
	width: 2em;
}

/*********/
/* LISTS */
/*********/

.post-body ol p,
.post-body ul p,
.comment-body ol p,
.comment-body ul p {
	margin: 0.5em 0;
}

.post-body ol {
	list-style: none;
	padding: 0;
	counter-reset: ol;
}
.post-body ol li {
	position: relative;
	counter-increment: ol;
	padding: 0 0 0 2.5em;
	margin: 0.25em 0 0 0;
}
.post-body ol li::before {
	content: counter(ol) ".";
	position: absolute;
	width: 2em;
	text-align: right;
	left: 0;
}
.post-body ul {
	list-style: none;
	padding: 0;
}
.post-body ul:not(.contents-list) li {
	position: relative;
	padding: 0 0 0 2.5em;
	margin: 0.25em 0 0 0;
}
.post-body ul:not(.contents-list) li::before {
	content: "•";
	position: absolute;
	width: 2em;
	text-align: right;
	left: 0;
}
.post-body li > ul:first-child > li {
	padding-left: 0;
}
.post-body li > ul:first-child > li::before {
	content: none;
}

/**********************/
/* FOR NARROW SCREENS */
/**********************/

@media only screen and (max-width: 900px) {
	#content {
		padding: 0 4px;
	}
	#content > a:last-child,
	#content > a:first-child {
		margin: 0 -4px;
	}
	.nav-bar {
		width: calc(100% + 8px);
	}
	.nav-bar .nav-inner {
		padding: 8px 3.33vw;
	}
	.nav-bar {
		margin: 0 -4px;
	}
	.login-container, .login-container > div {
		display: block;
	}
	.contents {
		float: none;
		display: table;
		max-width: none;
		margin-left: auto;
		margin-right: auto;
	}
	.post-body,
	.post > h1:first-child {
		padding: 0 6px;
	}
	.post-body, .comment-body {
		text-align: left;
		-webkit-hyphens: none;
		hyphens: none;
	}
	@-moz-document url-prefix() {
		.post-body, .comment-body {
			text-align: justify;
			-webkit-hyphens: auto;
			hyphens: auto;
		}
	}
  .nav-inner::after {
		display: none;
	}
}
@media only screen and (max-width: 520px) {
	.nav-inner,
	#secondary-bar .nav-inner {
		font-size: 0.85em;
	}
	h1.listing {
		font-size: 1.3rem;
		line-height: 1.1;
		margin: 0.5em 6px 0 6px;
	}
	h1.listing a {
		display: inline-block;
		padding: 0.4em 0 0.1em 0;
		text-indent: 33px;
	}
	h1.listing a[href^='/'] {
		text-indent: 0;
	}
	h1.listing a::after {
		left: -33px;
		top: 8px;
	}
	h1.listing + .post-meta {
		margin: 0 6px 0 7px;
	}
	#secondary-bar #nav-item-search form {
		padding: 3px 4px 4px 4px;
	}
	.post-body {
		font-size: 1.2rem;
		line-height: 1.45;
	}
	.post > h1:first-child {
		margin: 1em 0.25em 0.25em 0.25em;
		font-size: 2em;
	}
	.comment-item .comment-item {
		margin: 0.75em 4px 4px 12px;
	}
	.comment-item .comment-item + .comment-item {
		margin: 1.5em 4px 4px 12px;
	}
	.comment-body ul {
		padding-left: 30px;
	}
	.contents {
		max-width: 100%;
		margin: 1em 0 1.5em 0;
	}
	.contents-head {
		font-size: 1.2em;
	}
	.contents ul {
		font-size: 1em;
	}
	div[class^='archive-nav-'] {
		display: block;
		text-align: justify;
	}
	.archive-nav *[class^='archive-nav-item'],
	.archive-nav *[class^='archive-nav-item']:first-child {
		display: inline-block;
		width: auto;
		padding: 6px 10px;
		width: 4em;
		margin: 2px;
	}
	.archive-nav *[class^='archive-nav-item'],
	.archive-nav *[class^='archive-nav-item-'],
	.archive-nav div[class^='archive-nav-']:nth-of-type(n+2) *[class^='archive-nav-item'] {
		border: 1px solid #ddd;
	}
	.archive-nav > *[class^='archive-nav-'] +  *[class^='archive-nav-'] {
		margin-top: 0.5em;
	}
	#login-form-container,
	#create-account-form-container {
		width: 50%;
	}
	#nav-item-recent-comments > * > span {
		display: none;
	}
	#primary-bar,
	#secondary-bar {
		table-layout: fixed;
		font-size: 0.55em;
	}
	#secondary-bar {
		font-size: 0.5em;
	}
	#primary-bar .nav-inner,
	#secondary-bar .nav-inner {
		text-transform: uppercase;
		padding: 6px;
		font-weight: 600;
	}
	#secondary-bar .nav-inner {
		padding: 4px;
	}
	#primary-bar .nav-inner::before, 
	#secondary-bar .nav-inner::before {
		display: block;
		font-family: "Font Awesome";
    font-size: 1.25rem;
		font-weight: 900;
	}
	#secondary-bar .nav-inner::before {
    font-size: 0.875rem;
	}
	#nav-item-home .nav-inner::before {
		content: "\F015";
	}
	#nav-item-featured .nav-inner::before {
		content: "\F005";
	}
	#nav-item-all .nav-inner::before {
		content: "\F069";
	}
	#nav-item-meta .nav-inner::before {
		content: "\F077";
	}
	#nav-item-recent-comments .nav-inner::before {
		content: "\F036";
	}
	#nav-item-archive {
		width: auto;
	}
	#nav-item-archive .nav-inner::before {
		content: "\F187";
	}
	#nav-item-search .nav-inner::before {
		content: none;
	}
	#nav-item-search input {
		width: calc(100% - 28px);
	}
	#nav-item-search button {
		width: 22px;
		color: transparent;
		vertical-align: middle;
		padding-left: 4px;
	}
	#nav-item-search button::before {
		content: "\F002";
		color: #00e;
		font-family: Font Awesome;
		font-weight: 900;
		font-size: 1rem;
	}
	#nav-item-login {
		width: auto;
	}
	#nav-item-login .nav-inner::before {
		content: "\F007";
	}
}
@media only screen and (max-width: 374px) {
	.nav-bar .nav-inner {
		padding: 6px 3.33vw;
	}
}
