<?php
	$UI_font = "'Mundo Sans', 'Helvetica', sans-serif";
	$headings_font = "'Caecilia', 'Helvetica', sans-serif";
	$text_font = "'Source Serif Pro', 'Helvetica', sans-serif";
	$hyperlink_color = "#92c396";
	$white_glow = "0 0 1px #fff, 0 0 3px #fff, 0 0 5px #fff";
?>

/**************/
/* THEME LESS */
/**************/

body {
	color: #000;
	font-family: <?php echo $UI_font; ?>;
	font-weight: 300;
	background-color: #fff;
}
#content {
	line-height: 1.55;
	overflow: visible;
	padding: 30px 20px 0 90px;
	position: relative;
}
#content.post-page {
	padding: 0 0 0 60px;
}
#ui-elements-container {
	visibility: hidden;
}

/* Compensating for Linux/Windows being terrible. */

.post-meta > *:not(.post-section),
.comment-meta > *,
#primary-bar a,
#secondary-bar a,
#nav-item-search > *,
.page-toolbar > *,
#top-nav-bar > *,
.post-body a,
.comment-body a {
	text-shadow: <?php global $platform; echo ($platform == 'Mac' ? 'none' : '0 0 0 #aaa'); ?>;
}

/*=========*/
/* NAV BAR */
/*=========*/

/*= Layout (desktop) =*/

@media not screen and (hover: none), not screen and (-moz-touch-enabled) {
	.nav-inner {
		font-size: 1.125em;
		padding: 0.5rem 0.75rem;
		text-align: right;
	}
	#secondary-bar .nav-inner {
		font-size: 0.875em;
		padding: 0.5rem 0.75rem;
	}
	#primary-bar,
	#secondary-bar {
		margin: 0;
		flex-flow: column;
		line-height: 1;
	}
	#primary-bar {
		position: fixed;
		width: 112px;
	}
	#primary-bar > * {
		position: relative;
		right: 47px;
	}
	#nav-item-archive,
	#nav-item-about {
		position: fixed;
		transform: translateX(-106px);
		width: 80px;
	}
	#content.post-page #nav-item-archive,
	#content.post-page #nav-item-about {
		transform: translateX(-76px);
	}

	#nav-item-home {
		padding-top: 0.5em;
	}

	#bottom-bar .nav-inner {
		text-align: center;
		padding: 0.75em;
	}
}

/*= Styling =*/

#bottom-bar .nav-item a::before {
	font-weight: 300;
}

.nav-bar a,
.nav-bar a:visited {
	color: #acd2af;
}
.nav-bar a:hover {
	color: #79a97e;
}

/* Accesskey hints */

.nav-inner::after {
	display: none;
}

/* "Tabs" */

.nav-current {
	font-weight: 500;
}

#nav-item-recent-comments .nav-inner span {
	display: none;
}
#nav-item-login {
	position: absolute;
	top: 0;
	right: 0;
	padding-right: 1.5em;
}

/* Search tab */

#nav-item-search {
	position: absolute;
	top: 0;
	left: 4.75em;
	width: 400px;
}
#nav-item-search .nav-inner {
	padding: 1px;
	display: flex;
}
#nav-item-search form::before {
	font-size: 1.125em;
	color: #e6e6e6;
	font-weight: 400;
	padding: 5px;
	transition: color 0.15s ease;
}
#nav-item-search form:focus-within::before {
	color: #92c396;
}
#nav-item-search button {
	border: none;
	font-weight: 300;
	padding: 6px;
	height: 23px;
}
#nav-item-search form:not(:focus-within) button:not(:hover) {
	color: #ddd;
}
#nav-item-search input {
	width: unset;
	flex: 1 0 auto;
	font-family: Inconsolata, monospace;
	padding: 2px 1px;
	margin: 0 0 0 2px;
}

/* Inbox indicator */

#inbox-indicator::before {
	color: #eaeaea;
	top: 3px;
	font-size: 1.125em;
}

/*==============*/
/* PAGE TOOLBAR */
/*==============*/

.page-toolbar {
	padding: 0 0 0 0;
	margin: 0;
	white-space: nowrap;
	position: fixed;
	width: 120px;
}

.page-toolbar > * {
	display: block;
	text-align: right;
	line-height: 1;
	padding: 0.5rem 0.75rem;
	position: relative;
	right: 56px;
}

.page-toolbar button {
	padding: 0;
}

.page-toolbar .button::before {
	font-size: 0.875em;
	font-weight: 400;
}

.new-private-message {
	white-space: normal;
	line-height: 1.15;
}
.new-private-message::before {
	opacity: 0.7;
}

.logout-button {
	color: #d33;
	font-weight: 300;
}

/*===================*/
/* TOP PAGINATION UI */
/*===================*/

#top-nav-bar {
	justify-content: flex-start;
	padding: 1em 0 0.25em 0;
	font-size: 1em;
	margin: 0 0 0 -4px;
	grid-column: 1;
}
#top-nav-bar .page-number {
	line-height: 1.5;
}
#top-nav-bar .page-number span {
	display: none;
}
#top-nav-bar a::before {
	font-weight: 400;
}
#top-nav-bar a.disabled {
	visibility: visible;
	opacity: 0.4;
}

#content.user-page > #top-nav-bar {
	justify-content: center;
	grid-column: 2;
	padding: 0;
}
.archive-nav + #top-nav-bar {
	margin: 0.5em 0 0 -4px;
	padding: 0 0 0.25em 0;
}

/*==============*/
/* SUBLEVEL NAV */
/*==============*/

.sublevel-nav .sublevel-item {
	border-color: #c4dbc4;
	border-style: solid;
	border-width: 1px 1px 1px 0;
	color: #92c396;
	padding: 3px 9px 0 9px;
}
.sublevel-nav .sublevel-item:first-child {
	border-radius: 8px 0 0 8px;
	border-width: 1px;
}
.sublevel-nav .sublevel-item:last-child {
	border-radius: 0 8px 8px 0;
}
.sublevel-nav a.sublevel-item:hover,
.sublevel-nav a.sublevel-item:active,
.sublevel-nav span.sublevel-item {
	background-color: #c4dbc4;
	color: #fff;
	text-decoration: none;
}
.sublevel-nav a.sublevel-item:active {
	background-color: #92c396;
	border-color: #92c396;
}

/*=====================*/
/* SORT ORDER SELECTOR */
/*=====================*/

#content.index-page .sublevel-nav.sort {
	grid-row: 2;
	grid-column: 3;
	justify-self: right;
}

.sublevel-nav.sort {
	padding: 18px 0 0 0;
	border-radius: 8px;
}
.sublevel-nav.sort::before {
	text-transform: uppercase;
	color: #444;
	text-shadow: 0.5px 0.5px 0 #fff;
}
.sublevel-nav.sort .sublevel-item {
	padding: 5px 6px 2px 6px;
	border: 1px solid #c4dbc4;
	text-transform: uppercase;
}

/* Vertical */
.sublevel-nav.sort .sublevel-item:first-child {
	border-radius: 6px 6px 0 0;
}
.sublevel-nav.sort .sublevel-item:last-child {
	border-radius: 0 0 6px 6px;
	border-width: 0 1px 1px 1px;
}

/* Horizontal */
.sublevel-nav.sort.horizontal .sublevel-item:first-child {
	border-radius: 6px 0 0 6px;
}
.sublevel-nav.sort.horizontal .sublevel-item:last-child {
	border-radius: 0 6px 6px 0;
	border-width: 1px 1px 1px 0;
}

/*============*/
/* UI TOGGLES */
/*============*/

@media not screen and (hover: none), not screen and (-moz-touch-enabled) {
	#site-nav-ui-toggle,
	#post-nav-ui-toggle,
	#appearance-adjust-ui-toggle {
		visibility: visible;
		position: absolute;
		display: inline-block;
		border-radius: 50%;
		z-index: 1;
	}
	#site-nav-ui-toggle button,
	#post-nav-ui-toggle button,
	#appearance-adjust-ui-toggle button {
		font-family: Font Awesome;
		font-weight: 400;
		font-size: 32px;
		padding: 10px;
		opacity: 0.4;
		-webkit-tap-highlight-color: transparent;
		transition:
			transform 0.2s ease,
			opacity 0.15s ease;
	}
	#site-nav-ui-toggle button:hover,
	#post-nav-ui-toggle button:hover,
	#appearance-adjust-ui-toggle button:hover {
		opacity: 1.0;
	}
	#site-nav-ui-toggle button::selection,
	#post-nav-ui-toggle button::selection,
	#appearance-adjust-ui-toggle button::selection {
		background-color: transparent;
	}
	#site-nav-ui-toggle button::-moz-focus-inner,
	#post-nav-ui-toggle button::-moz-focus-inner,
	#appearance-adjust-ui-toggle button::-moz-focus-inner {
		border: none;
	}
	#post-nav-ui-toggle.highlighted,
	#appearance-adjust-ui-toggle.highlighted {
		transform: scale(1.33);
	}
	#site-nav-ui-toggle.highlighted button {
		transform: scale(1.33);
	}
	#site-nav-ui-toggle.highlighted button,
	#post-nav-ui-toggle.highlighted button,
	#appearance-adjust-ui-toggle.highlighted button {
		opacity: 1.0;
		text-shadow:
			0 0 1px #fff,
			0 0 1px #64ff4c,
			0 0 3px #64ff4c,
			0 0 5px #64ff4c,
			0 0 8px #64ff4c;
	}
	
	#site-nav-ui-toggle {
		top: 0;
		left: 12px;
		pointer-events: none;
	}
	#site-nav-ui-toggle button {
		font-weight: 300;
		position: relative;
		left: 0;
		transition:
			left 0.2s ease,
			opacity 0.2s ease,
			width 0.2s ease;
		pointer-events: auto;
	}
	#site-nav-ui-toggle button:active {
		transform: none;
	}
	#site-nav-ui-toggle button.engaged {
		left: -92px;
		width: 2.125rem;
		overflow: hidden;
	}
	#site-nav-ui-toggle button.engaged::before {
		content: "\F00D";
		padding: 0 0.25em 0 0;
	}
	
	#primary-bar,
	#secondary-bar #nav-item-archive,
	#secondary-bar #nav-item-about,
	.page-toolbar {
		visibility: hidden;
		top: 0;
		max-height: 0px;
	}
	#primary-bar,
	#secondary-bar #nav-item-archive,
	#secondary-bar #nav-item-about,
	.page-toolbar {
		opacity: 0.0;
	}
	#primary-bar,
	#secondary-bar #nav-item-archive,
	#secondary-bar #nav-item-about,
	.page-toolbar {
		transition:
			top 0.2s ease,
			max-height 0.2s ease,
			visibility 0.2s ease,
			opacity 0.2s ease;
	}
	#nav-item-search,
	#nav-item-login {
		visibility: visible;
	}
	#primary-bar.engaged,
	#secondary-bar.engaged #nav-item-archive,
	#secondary-bar.engaged #nav-item-about,
	.page-toolbar.engaged {
		visibility: visible;
		max-height: 1000px;
	}
	#primary-bar.engaged,
	#secondary-bar.engaged #nav-item-archive,
	#secondary-bar.engaged #nav-item-about,
	.page-toolbar.engaged {
		opacity: 1.0;
	}
	#primary-bar.engaged {
		top: 0;
	}
	#secondary-bar.engaged #nav-item-archive {
		top: 196px;
	}
	#secondary-bar.engaged #nav-item-about {
		top: 230px;
	}
	.page-toolbar.engaged {	
		top: 280px;
	}

	#post-nav-ui-toggle {
		bottom: 10px;
		right: -30px;
	}
	#content.post-page ~ #ui-elements-container #post-nav-ui-toggle {
		right: -54px;
	}
	#post-nav-ui-toggle button.engaged {
		transform: rotate(-90deg);
	}
	
	#quick-nav-ui,
	#new-comment-nav-ui,
	#hns-date-picker {
		bottom: 0;
		max-height: 0px;
		opacity: 0.0;
		transition:
			bottom 0.2s ease,
			max-height 0.2s ease,
			opacity 0.2s ease,
			visibility 0.2s ease;
	}
	#quick-nav-ui.engaged,
	#new-comment-nav-ui.engaged,
	#hns-date-picker.engaged {
		visibility: visible;
		max-height: 1000px;
		opacity: 1.0;
	}	
	
	#quick-nav-ui {
		right: -24px;
	}
	#content.post-page ~ #ui-elements-container #quick-nav-ui {
		right: -48px;
	}
	#quick-nav-ui.engaged {
		bottom: 64px;
	}
	#quick-nav-ui a {
		font-weight: 400;
	}
	
	#new-comment-nav-ui {
		right: -49px;
	}
	#new-comment-nav-ui.engaged {
		bottom: 216px;
	}

	#hns-date-picker {
		right: -186px;
	}
	#hns-date-picker.engaged {
		bottom: 247px;
	}
	@media only screen and (max-width: 1440px) {
		#hns-date-picker {
			background-color: rgba(255,255,255,0.95);
			right: -18px;
		}
		#hns-date-picker::before {
			display: none;
		}
		#hns-date-picker input {
			background-color: #fff;
		}
		#hns-date-picker span {
			text-shadow:
				0 0 1px #fff,
				0 0 3px #fff,
				0 0 5px #fff,
				0 0 8px #fff,
				0 0 13px #fff,
				0 0 21px #fff;
		}
		#hns-date-picker.engaged {
			bottom: 238px;
		}
	}

	#appearance-adjust-ui-toggle {
		bottom: 10px;
		left: 10px;
	}
	#appearance-adjust-ui-toggle button.engaged {
		transform: rotate(-90deg);
	}

	#theme-selector,
	#width-selector,
	#text-size-adjustment-ui,
	#theme-tweaker-toggle {
		pointer-events: none;
		visibility: visible;
		width: fit-content;
		opacity: 0.0;
		transition:
			opacity 0.35s ease;
	}
	#theme-selector::after,
	#width-selector::after,
	#text-size-adjustment-ui::after {
		content: "";
		background-color: #fff;
		display: block;
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
	}
	#theme-selector.engaged,
	#width-selector.engaged,
	#text-size-adjustment-ui.engaged,
	#theme-tweaker-toggle.engaged {
		pointer-events: auto;
		opacity: 1.0;
	}

	#theme-selector {
		display: block;
		left: 16px;
		top: calc(100% - 316px);
	}
	#theme-selector::after {
		max-height: 1000px;
		transition:
			max-height 0.2s ease;
	}
	#theme-selector.engaged::after {
		max-height: 0px;
	}

	#width-selector {
		display: table;
		left: -68px;
		top: calc(100% - 48px);
	}
	#width-selector::after {
		max-width: 1000px;
		transition:
			max-width 0.2s ease;
	}
	#width-selector.engaged::after {
		max-width: 0px;
	}

	#text-size-adjustment-ui {
		left: -67px;
		top: calc(100% - 80px);
	}
	#text-size-adjustment-ui::after {
		max-width: 1000px;
		max-height: 1000px;
		transition:
			max-width 0.2s ease,
			max-height 0.2s ease;
	}
	#text-size-adjustment-ui.engaged::after {
		max-width: 0px;
		max-height: 0px;
	}

	#theme-tweaker-toggle {
		left: 19px;
		top: calc(100% - 356px);
		transition:
			opacity 0.5s ease-out;
	}
	@-moz-document url-prefix() {
		#theme-tweaker-toggle {
			left: 18px;
		}
	}
	#theme-tweaker-toggle button {
		font-weight: 400;
	}

	#theme-tweaker-ui {
		visibility: visible;
	}
}

/*================*/
/* WIDTH SELECTOR */
/*================*/

#width-selector button {
	box-shadow:
		0 0 0 4px #fff inset,
		0 0 0 5px #aaa inset;
}
#width-selector button:hover,
#width-selector button.selected {
	box-shadow:
		0 0 0 1px #fff inset,
		0 0 0 2px #aaa inset,
		0 0 0 4px #fff inset,
		0 0 0 5px #aaa inset;
}

/*================*/
/* THEME SELECTOR */
/*================*/

#theme-selector button {
	box-shadow:
		0 0 0 4px #fff inset,
		0 0 0 5px #999 inset;
}
#theme-selector button:hover,
#theme-selector button.selected {
	box-shadow:
		0 0 0 1px #fff inset,
		0 0 0 2px #999 inset,
		0 0 0 4px #fff inset,
		0 0 0 5px #999 inset;
}

#theme-selector button::before {
	font-size: 0.9375em;
	font-weight: 300;
	padding: 6px;
	color: #aaa;
	background-color: #fff;
}
#theme-selector button:hover::before,
#theme-selector button.selected::before {
	color: #000;
}

/*======================*/
/* THEME TWEAKER TOGGLE */
/*======================*/

#theme-tweaker-toggle button {
	color: #777;
}

/*=================*/
/* QUICKNAV WIDGET */
/*=================*/

#quick-nav-ui a {
	color: #acd2af;
	border-radius: 4px;
	text-decoration: none;
}
#quick-nav-ui a[href='#bottom-bar'] {
	line-height: 1.8;
}
#quick-nav-ui a:active {
	transform: scale(0.9);
}
#quick-nav-ui a[href='#comments'].no-comments {
	opacity: 0.4;
	color: #ddd;
}
@media only screen and (hover: hover), not screen and (-moz-touch-enabled) {
	#quick-nav-ui a:hover {
		color: #79a97e;
	}
	#quick-nav-ui a:focus:not(:hover) {
		transform: none;
		text-shadow: none;
	}
}

/*======================*/
/* NEW COMMENT QUICKNAV */
/*======================*/

#new-comment-nav-ui .new-comments-count {
	color: #888;
	text-shadow: 0.5px 0.5px 0 #fff;
	top: 2px;
}
#new-comment-nav-ui .new-comments-count::after {
	color: #777;
}
#new-comment-nav-ui .new-comment-sequential-nav-button:disabled {
	color: #e6e6e6;
}

/*=================*/
/* HNS DATE PICKER */
/*=================*/

#hns-date-picker span {
	color: #999;
	font-weight: 400;
}
#hns-date-picker input {
	border: 1px solid #ddd;
	color: #999;
	padding: 3px 3px 0 3px;
}
#hns-date-picker input:focus {
	color: #000;
}

/*======================*/
/* TEXT SIZE ADJUSTMENT */
/*======================*/

#text-size-adjustment-ui button {
	font-weight: 400;
}

/*=============================*/
/* COMMENTS VIEW MODE SELECTOR */
/*=============================*/

#comments-view-mode-selector a {
	color: #777;
}

/*==========*/
/* ARCHIVES */
/*==========*/

.archive-nav {
	border: 1px solid transparent;
	margin: 1.25em 0 0 0;
	padding: 0;
}
.archive-nav *[class^='archive-nav-item'] {
	color: <?php echo $hyperlink_color; ?>;
	border-style: solid;
	border-color: #c4dbc4;
	border-width: 1px 0 1px 1px;
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
.archive-nav a:hover,
.archive-nav span[class^='archive-nav-item'] {
	background-color: #c4dbc4;
	color: #fff;
}

.archive-nav a:active {
	background-color: <?php echo $hyperlink_color; ?>;
}

/*==========*/
/* LISTINGS */
/*==========*/

h1.listing,
#content.search-results-page h1.listing {
	margin: 0.7em 20px 0.1em 0;
	max-width: calc(100% - 20px);
	font-family: <?php echo $headings_font; ?>, 'Font Awesome';
	font-size: 1.25rem;
	line-height: 1.2;
}

h1.listing a[href^="http"] {
	color: #bbb;
	font-weight: 400;
	font-size: 0.8125em;
	top: 3px;
}
h1.listing a[href^="/"] {
	font-weight: 300;
	text-shadow: <?php global $platform; echo ($platform == 'Mac' ? 'none' : '0 0 0 #444'); ?>;
	color: <?php global $platform; echo ($platform == 'Mac' ? '#444' : '#000'); ?>;
}
@-moz-document url-prefix() {
	h1.listing a[href^="/"] {
		text-shadow: none;
	}
}

@media only screen and (hover: hover), not screen and (-moz-touch-enabled) {
	h1.listing a:hover,
	h1.listing a:focus {
		color: #92c396;
		background-color: rgba(255,255,255,0.85);
	}	
	h1.listing:focus-within::before {
		color: #79a97e;
		font-weight: 400;
		left: -0.625em;
	}
	h1.listing a[href^="http"]:hover {
		color: #79a97e;
	}
}

/*===================*/
/* LISTING POST-META */
/*===================*/

h1.listing + .post-meta {
	font-size: 0.875rem;
	margin: 0 20px 0 1px;
}

h1.listing + .post-meta > * {
	color: #bbb;
	margin: 0 1.25em 0 0;
}
h1.listing + .post-meta a {
	color: #92c396;
}
h1.listing + .post-meta a:hover {
	color: #79a97e;
}
h1.listing + .post-meta .karma-value {
	cursor: default;
}
h1.listing + .post-meta .lw2-link {
	display: none;
}
h1.listing + .post-meta .post-section {
	overflow: visible;
	order: 1;
}
h1.listing + .post-meta .post-section::before {
	position: relative;
	left: unset;
	top: -1px;
}

/*============*/
/* USER PAGES */
/*============*/

#content.user-page h1.page-main-heading,
#content.user-page .user-stats {
	grid-row: 1;
}
#content.user-page #comments-list-mode-selector,
#content.user-page .sublevel-nav.sort {
	grid-row: 2 / span 2;
}
#content.user-page .sublevel-nav {
	grid-row: 2;
	margin-bottom: 1em;
}
#content.user-page #top-nav-bar {
	grid-row: 3;
}

#content.user-page h1.page-main-heading,
#content.conversation-page h1.page-main-heading {
	font-family: <?php echo $headings_font; ?>;
	font-weight: normal;
	margin: 0.5em 0 0 0;
}
#content.user-page h1.page-main-heading {
	border-bottom: 1px solid #e6e6e6;
	line-height: 1;
}

#content.user-page h1.listing,
#content.user-page h1.listing + .post-meta {
	border-color: #ddd;
	border-style: solid;
}
#content.user-page h1.listing {
	max-width: 100%;
	padding: 6px 8px 0 8px;
	border-width: 1px 1px 0 1px;
	margin: 1rem 0 0 0;
}
@media only screen and (hover: hover), not screen and (-moz-touch-enabled) {
	#content.user-page h1.listing:focus-within::before {
		left: -0.625em;
	}
}
#content.user-page h1.listing + .post-meta {
	margin: 0 0 1rem 0;
	padding: 12px 8px 3px 8px;
	border-width: 0 1px 1px 1px;
	line-height: 1;
}

#content.conversations-user-page h1.listing {
	padding: 8px 6px 28px 10px;
	font-size: 1.25rem;
}
#content.conversations-user-page h1.listing + .post-meta {
	padding: 4px 10px 0.5em 6px;
	margin: 0;
}

.user-stats .karma-total {
	font-weight: 500;
}

/*===============*/
/* CONVERSATIONS */
/*===============*/

/*============*/
/* LOGIN PAGE */
/*============*/

.login-container form h1 {
	font-family: <?php echo $headings_font; ?>;
	font-weight: 300;
}

.login-container form label {
	color: #aaa;
}

/* “Create account” form */

#signup-form {
	border: 1px solid #e4e4e4;
}
#signup-form input[type='submit'] {
	padding: 8px 12px 6px 12px;
}

/* Log in tip */

.login-container .login-tip {
	border: 1px solid #eee;
}

/* Message box */

.error-box {
	border: 1px solid red;
	background-color: #faa;
}
.success-box {
	border: 1px solid green;
	background-color: #afa;
}

/*=====================*/
/* PASSWORD RESET PAGE */
/*=====================*/

.reset-password-container input[type='submit'] {
	background-color: #e4e4e4;
	border: 1px solid #ccc;
	font-weight: bold;
}

/*===================*/
/* TABLE OF CONTENTS */
/*===================*/

.contents {
	font-family: <?php echo $UI_font; ?>;
	padding-top: 0;
	margin-top: 1em;
	background-color: #fff;
}
.post-body .contents ul {
	font-size: 0.8125em;
}
.post-body .contents li::before {
	color: #bbb;
}

/*==================*/
/* POSTS & COMMENTS */
/*==================*/

.post-body,
.comment-body {
	font-family: <?php echo $text_font; ?>;
	text-shadow: <?php global $platform; echo ($platform == 'Mac' ? '0 0 0 rgba(0,0,0,0.7)' : 'none'); ?>;
	font-weight: <?php global $platform; echo ($platform == 'Mac' ? '300' : '400'); ?>;
}

/*=======*/
/* POSTS */
/*=======*/

.post {
	overflow: visible;
	padding: 2em 0 0 0;
}

.post-body {
	font-size: 1.25rem;
}

.post > h1:first-child {
	font-size: 2.75rem;
	font-family: <?php echo $headings_font; ?>;
	font-weight: 300;
	line-height: 1.1;
	margin: 1.375em 0 0.5em 0;
}

/*===========*/
/* POST-META */
/*===========*/

.post-meta .post-section::before {
	color: #dfdfdf;
	font-weight: 400;
	padding: 1px;
}
.post-meta .post-section.alignment-forum::before {
	color: #d6d7ff;
}
.post .post-meta .post-section::before {
	position: relative;
	top: -3px;
}

a.post-section::before {
	transition: color 0.15s ease;
}
a.post-section:hover::before {
	color: #79a97e;
}
a.post-section.alignment-forum:hover::before {
	color: #999bc1;
}

.post-meta > * {
	color: #bbb;
}
.post-meta a,
.post-meta a:visited {
	color: #92c396;
}
.post-meta a:hover {
	color: #79a97e;
}
.post-meta .lw2-link:hover {
	opacity: 1;
}

.post .top-post-meta {
	flex-flow: column;
	position: relative;
}
.post .top-post-meta .karma,
.post .top-post-meta .author,
.post .top-post-meta .qualified-linking {
	width: fit-content;
	margin: auto;
}
.post .top-post-meta .karma {
	order: -1;
	display: flex;
	flex-flow: column;
}
.post .top-post-meta .karma .karma-value {
	padding: 5px 0 0 0;
	color: #999;
	font-size: 1.125em;
	position: relative;
}
.post .top-post-meta .karma .karma-value::before,
.post .top-post-meta .karma .karma-value::after {
	content: "";
	position: absolute;
	display: block;
	background-color: #ccc;
	height: 1px;
	width: 100px;
	top: 50%;
}
.post .top-post-meta .karma .karma-value::before {
	right: calc(100% + 8px);
}
.post .top-post-meta .karma .karma-value::after {
	left: calc(100% + 8px);
}
.post .top-post-meta .karma .karma-value span {
	display: none;
}
.post .top-post-meta .author {
	padding: 4px 0 0 0;
	margin: 0.25em auto;
}
.post .top-post-meta .qualified-linking {
	z-index: 1;
}
.post .top-post-meta .qualified-linking label {
	margin: 0;
}

.post .top-post-meta .post-section,
.post .top-post-meta .lw2-link {
	display: none;
}

.post .top-post-meta .date,
.post .top-post-meta .comment-count {
	position: absolute;
	right: 100%;
}
.post .top-post-meta .date {
	top: calc(100% + 34px);
}
.post .top-post-meta .comment-count {
	top: calc(100% + 60px);
}
.post .top-post-meta .date > span,
.post .top-post-meta .comment-count > span {
	position: fixed;
	transform: translateX(-100%);
}

.post .bottom-post-meta {
	padding: 1.75em 0 0 0;
	margin: 0.5em 0 1.5em 0;
	position: relative;
}
.post .bottom-post-meta::before {
	content: "";
	position: absolute;
	display: block;
	background-color: #ddd;
	height: 1px;
	width: calc(100% - 60px);
	top: 0;
}

/*============*/
/* LINK POSTS */
/*============*/

.post.link-post a.link-post-link {
	font-family: <?php echo $UI_font; ?>;
}
.post.link-post a.link-post-link::before {
	opacity: 0.6;
}
.post.link-post a.link-post-link:hover::before {
	opacity: 1;
}

/*==========*/
/* COMMENTS */
/*==========*/

#comments {
	border-top: 1px solid transparent;
	padding: 0 0 0 10px;
}
.comment-item {
	border: 1px solid #ddd;
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
	background-color: #f6f6f6;
}
<?php nested_stuff(".comment-item .comment-item ", ".comment-item a.comment-parent-link::after,\n", ".comment-item a.comment-parent-link::after", $comment_nesting_depth); ?> {
	box-shadow: 
		0 28px 16px -16px #fff inset,
		4px 16px 0 12px #ffd inset,
		4px	4px 0 12px #ffd inset;
}

<?php nested_stuff(".comment-item .comment-item ", ".comment-item .comment-item,\n", ".comment-item .comment-item", $comment_nesting_depth); ?> {
	background-color: #fff;
}
<?php nested_stuff(".comment-item .comment-item ", ".comment-item .comment-item a.comment-parent-link::after,\n", ".comment-item .comment-item a.comment-parent-link::after", $comment_nesting_depth); ?> {
	box-shadow: 
		0 28px 16px -16px #f6f6f6 inset,
		4px 16px 0 12px #ffd inset,
		4px	4px 0 12px #ffd inset;
}

<?php nested_stuff(".comment-item ", ".comment-item:target,\n", ".comment-item:target", (2 * $comment_nesting_depth) - 1); ?> {
	background-color: #ffd;
}
.comment-item:target > .comment-thread > .comment-item > .comment > .comment-meta > a.comment-parent-link::after {
	box-shadow: 
		0 28px 16px -16px #ffd inset,
		4px 16px 0 12px #ffd inset,
		4px	4px 0 12px #ffd inset !important;
}

.comment-body {
	font-size: 1.1875rem;
}
#content.user-page .comment-body,
#content.index-page .comment-body {
	font-size: 1.125rem;
}

/*================================*/
/* DEEP COMMENT THREAD COLLAPSING */
/*================================*/

.comment-item input[id^="expand"] + label::after {
	color: <?php echo $hyperlink_color; ?>;
	font-weight: 400;
}
.comment-item input[id^="expand"] + label:hover::after {
	color: #c00;
}
.comment-item input[id^="expand"] + label:active::after,
.comment-item input[id^="expand"] + label:focus::after{
	color: #c00;
}
.comment-item input[id^="expand"]:checked ~ .comment-thread .comment-thread .comment-item {
	border-width: 1px 0 0 0;
}

/*==============*/
/* COMMENT-META */
/*==============*/

.comment-meta {
	padding-top: 4px;
}
.comment-meta > * {
	color: #bbb;
}
.comment-meta a,
.comment-meta a:visited {
	color: #92c396;
}
.comment-meta a:hover {
	color: #79a97e;
}
.comment-meta .author {
	font-size: 1.125em;
	font-weight: normal;
}

.comment-controls .karma {
	color: #bbb;
}

/*===========================*/
/* COMMENT THREAD NAVIGATION */
/*===========================*/

a.comment-parent-link::before {
	color: #bbb;
	font-weight: 400;
}
a.comment-parent-link:hover::before {
	background-color: #ffd;
	color: #999;
}

div.comment-child-links {
	font-weight: 600;
}
div.comment-child-links a {
	font-weight: normal;
}
div.comment-child-links a::first-letter {
	color: #aaa;
}

.comment-item-highlight {
	box-shadow:
		0 0	2px #e7b200,
		0 0	3px #e7b200,
		0 0	5px #e7b200,
		0 0	7px #e7b200,
		0 0 10px #e7b200;
	border: 1px solid #e7b200;
}
.comment-item-highlight-faint {
	box-shadow:
		0 0	2px #f8e7b5,
		0 0	3px #f8e7b5,
		0 0	5px #f8e7b5,
		0 0	7px #f8e7b5,
		0 0 10px #f8e7b5;
	border: 1px solid #f8e7b5;
}

.comment-popup {
	background-color: #fff;
}

/*====================*/
/* COMMENT PERMALINKS */
/*====================*/

.comment-meta .permalink::before {
	background-image: url('data:image/gif;base64,<?php echo base64_encode(file_get_contents("assets/anchor-blue-on-white.gif")) ?>');
}
.comment-meta .lw2-link::before {
	background-image: url('data:image/gif;base64,<?php echo base64_encode(file_get_contents("assets/lw-blue-on-white.gif")) ?>');
}
.individual-thread-page a.comment-parent-link:empty::before {
	background-image: url('data:image/gif;base64,<?php echo base64_encode(file_get_contents("assets/up-arrow-blue-on-white.gif")) ?>');
}
.comment-meta .permalink:hover::before {
	background-image: url('data:image/gif;base64,<?php echo base64_encode(file_get_contents("assets/anchor-white-on-blue.gif")) ?>');
}
.comment-meta .lw2-link:hover::before {
	background-image: url('data:image/gif;base64,<?php echo base64_encode(file_get_contents("assets/lw-white-on-blue.gif")) ?>');
}
.individual-thread-page a.comment-parent-link:hover:empty::before {
	left: unset;
	background-image: url('data:image/gif;base64,<?php echo base64_encode(file_get_contents("assets/up-arrow-white-on-blue.gif")) ?>');
}

.comment-meta .permalink,
.comment-meta .lw2-link,
.individual-thread-page .comment-parent-link:empty {
	filter: hue-rotate(270deg);
	opacity: 0.4;
}
.comment-meta .permalink:hover,
.comment-meta .lw2-link:hover,
.individual-thread-page .comment-parent-link:empty:hover {
	opacity: 1.0;
}

/*=======================*/
/* COMMENTS COMPACT VIEW */
/*=======================*/

#comments-list-mode-selector {
	opacity: 0.4;
	transition: opacity 0.15s ease;
}
#content.index-page #comments-list-mode-selector {
	grid-column: 3;
	justify-self: end;
}
#comments-list-mode-selector:hover {
	opacity: 1.0;
}

#comments-list-mode-selector button {
	border: none;
	background-color: transparent;
	box-shadow:
		0 0 0 4px #fff inset,
		0 0 0 5px #aaa inset;
}
#comments-list-mode-selector button:hover,
#comments-list-mode-selector button.selected {
	box-shadow:
		0 0 0 1px #fff inset,
		0 0 0 2px #aaa inset,
		0 0 0 4px #fff inset,
		0 0 0 5px #aaa inset;
}

#content.compact > .comment-thread .comment-item {
	max-height: 58px;
}
#content.compact > .comment-thread .comment-item::after {
	color: <?php echo $hyperlink_color; ?>;
	background: linear-gradient(to right, transparent 0%, #fff 50%, #fff 100%);
}

@media only screen and (hover: hover), not screen and (-moz-touch-enabled) {
	#content.compact > .comment-thread .comment-item:hover .comment {
		background-color: #fff;
		outline: 1px solid #92c396;
	}
	#content.compact > .comment-thread .comment-item:hover .comment::before {
		background-color: #fff;
		box-shadow: 
			0 0  3px #fff,
			0 0  5px #fff,
			0 0  7px #fff,
			0 0 10px #fff,
			0 0 20px #fff,
			0 0 30px #fff,
			0 0 40px #fff;
	}
}
@media only screen and (hover: none), only screen and (-moz-touch-enabled) {
	#content.compact > .comment-thread.expanded .comment-item .comment {
		background-color: #fff;
		outline: 1px solid #92c396;
	}
	#content.compact > .comment-thread.expanded .comment-item .comment::before {
		background-color: #fff;
		box-shadow: 
			0 0  3px #fff,
			0 0  5px #fff,
			0 0  7px #fff,
			0 0 10px #fff,
			0 0 20px #fff,
			0 0 30px #fff,
			0 0 40px #fff;
	}
}
#content.compact > .comment-thread .comment-item:hover .comment {
	background-color: #fff;
	outline: 1px solid #92c396;
}
#content.compact > .comment-thread .comment-item:hover .comment::before {
	background-color: #fff;
	box-shadow: 
		0 0  3px #fff,
		0 0  5px #fff,
		0 0  7px #fff,
		0 0 10px #fff,
		0 0 20px #fff,
		0 0 30px #fff,
		0 0 40px #fff;
}

#content.user-page.compact > h1.listing {
	margin-top: 0.5rem;
}
#content.user-page.compact > h1.listing + .post-meta {
	margin-bottom: 1rem;
}

/*===========================*/
/* HIGHLIGHTING NEW COMMENTS */
/*===========================*/

.new-comment::before {
	outline: 1px solid #5a5;
	box-shadow:
		0 0 6px -2px #5a5 inset, 
		0 0 4px #5a5;
}

/*=================================*/
/* COMMENT THREAD MINIMIZE BUTTONS */
/*=================================*/

.comment-minimize-button {
	color: #ddd;
	font-weight: 300;
	box-shadow: 0 0 0 1px transparent;
}
.comment-minimize-button:hover {
	color: #bbb;
	text-shadow: <?php echo $white_glow; ?>;
}
.comment-minimize-button::after {
	font-family: <?php echo $UI_font; ?>;
	color: #999;
}
.comment-minimize-button.maximized::after {
	color: #ccc;
}

/*=================================*/
/* INDIVIDUAL COMMENT THREAD PAGES */
/*=================================*/

.individual-thread-page > h1 {
	margin: 2em 0 0 36px;
}
.individual-thread-page > #comments {
	padding: 0 0 0 30px;
}

/*==============*/
/* VOTE BUTTONS */
/*==============*/

.upvote,
.downvote {
	color: #ddd;
	font-weight: 400;
	position: relative;
}
.vote::before {
	position: relative;
	z-index: 1;
}
.upvote::before {
	content: "\F077";
}
.downvote::before {
	content: "\F078";
	position: relative;
	top: 1px;
}
.upvote:hover,
.upvote.selected {
	text-shadow:
		0 0 0.5px #fff, 
		0 0 8px #0f0;
}
.downvote:hover,
.downvote.selected {
	text-shadow:
		0 0 0.5px #fff, 
		0 0 8px #f00;
}

.vote::after {
	position: absolute;
	color: transparent;
}
.vote:not(:hover)::after {
	text-shadow: none;
}
.karma.waiting .vote.big-vote::after {
	color: transparent;
}
.vote.big-vote::after,
.vote:not(.big-vote).clicked-twice::after {
	color: inherit;
}
.karma:not(.waiting) .vote.clicked-once::after {
	color: #ddd;
}

.upvote::after {
	content: "\F325";
	bottom: 5px;
	left: 7px;
}

.downvote::after {
	content: "\F322";
	top: 5px;
	left: 7px;
}

/*===========================*/
/* COMMENTING AND POSTING UI */
/*===========================*/

.posting-controls input[type='submit'] {
	padding: 6px 12px 3px 12px;
}

.comment-controls {
	margin: 0 4px 4px 16px;
}
.comment + .comment-controls .action-button {
	font-weight: 300;
}

.new-comment-button {
	margin: 0;
	padding: 0.125em;
}

.comment-controls .cancel-comment-button {
	color: #c00;
	text-shadow: 
		0 0 1px #fff,
		0 0 2px #fff;
}
.comment-controls .cancel-comment-button:hover {
	color: #f00;
}

.comment-controls .edit-button {
	color: #0b0;
}
.comment-controls .edit-button:hover {
	color: #f00;
}

.edit-post-link,
.edit-post-link:visited {
	color: #090;
}

.posting-controls textarea {
	font-family: <?php echo $text_font; ?>;
	font-weight: 300;
	color: #000;
	text-shadow: 0 0 0 #000;
	border-color: #eee;
	transition: border-color 0.15s ease;
}
.posting-controls textarea:focus {
	border-width: 29px 1px 1px 1px;
	border-color: #92c396;
}
.posting-controls.edit-existing-post textarea:focus,
.posting-controls form.edit-existing-comment textarea:focus {
	border-color: #090;
	box-shadow: 0 0 0 1px #090;
}

/* GUIEdit buttons */

.guiedit-buttons-container {
	background-color: #fff;
}

.posting-controls.edit-existing-post .guiedit-buttons-container button,
.posting-controls form.edit-existing-comment .guiedit-buttons-container button {
    color: #050;
}
.guiedit-buttons-container button {
	font-family: Font Awesome, <?php echo $text_font; ?>;
	border: 1px solid transparent;
}

.guiedit::after {
	font-family: <?php echo $UI_font; ?>;
	color: #999;
	font-weight: 300;
	text-shadow: 0 0 0 #999;
	top: 3px;
}

.posting-controls .markdown-reference-link a {
	background-position: right 70%;
}
.markdown-reference-link {
	color: #999;
}

/* Markdown hints */

#markdown-hints-checkbox + label {
	color: <?php echo $hyperlink_color; ?>;
}
#markdown-hints-checkbox + label:hover {
	color: #79a97e;
}
.markdown-hints {
	border: 1px solid #faa;
	background-color: #fff;
}
.markdown-hints .markdown-hints-row span,
.markdown-hints .markdown-hints-row code {
	padding: 2px 12px 2px 2px;
}

/*================*/
/* EDIT POST FORM */
/*================*/

#edit-post-form .link-post-checkbox + label {
	top: 2px;
	color: #acd2af;
	transition: color 0.15s ease;
}
#edit-post-form .link-post-checkbox + label:hover {
	color: #79a97e;
}
#edit-post-form .link-post-checkbox + label::before {
	top: 2px;
	border: 1px solid #eee;
	color: #bbb;
	transition: 
		box-shadow 0.3s ease,
		border-color 0.15s ease;
}
#edit-post-form .link-post-checkbox + label:hover::before {
	border-color: #c4dbc4;
}
#edit-post-form .link-post-checkbox:checked + label {
	font-weight: normal;
}
#edit-post-form .link-post-checkbox:checked + label::before {
	border-color: #c4dbc4;
	box-shadow: 
		0 0 0 4px #fff inset,
		0 0 0 1em #c4dbc4 inset;
}

#edit-post-form label[for='url'],
#edit-post-form input[name='url'] {
	display: block;
	transition:
		max-height 0.15s ease,
		overflow 0.15s ease,
		margin-top 0.15s ease,
		margin-bottom 0.15s ease,
		padding 0.15s ease,
		border-color 0.15s ease;
		
}
#edit-post-form .link-post-checkbox:not(:checked) ~ label[for='url'],
#edit-post-form .link-post-checkbox:not(:checked) ~ input[name='url'] {
	max-height: 0;
	overflow: hidden;
	margin-top: 0;
	margin-bottom: 0;
	padding: 0;
	border-color: transparent;
}

#edit-post-form label[for='title'],
#edit-post-form label[for='url'],
#edit-post-form label[for='section'] {
	color: #aaa;
	text-shadow: 0 0 0 #aaa;
}

#edit-post-form input[type='radio'] + label {
	color: #92c396;
	border-color: #c4dbc4;
	padding: 6px 12px 3px 12px;
	position: relative;
	top: -2px;
	transition:
		background-color 0.15s ease,
		color 0.15s ease,
		border-color 0.15s ease;
}
#edit-post-form input[type='radio'][value='all'] + label {
	border-radius: 8px 0 0 8px;
	border-width: 1px;
}
#edit-post-form input[type='radio'][value='drafts'] + label {
	border-radius: 0 8px 8px 0;
	padding-right: 13px;
}
#edit-post-form input[type='radio'] + label:hover,
#edit-post-form input[type='radio']:focus + label,
#edit-post-form input[type='radio']:checked + label {
	background-color: #c4dbc4;
	color: #fff;
}
#edit-post-form input[type='radio']:active + label {
	border-color: #92c396;
	background-color: #92c396;
}

#edit-post-form input[type='submit'] {
	padding: 7px 14px 4px 14px;
}

/*=======*/
/* LINKS */
/*=======*/

a {
	text-decoration: none;
	color: <?php echo $hyperlink_color; ?>;
	transition: color 0.15s ease;
}
a:visited {
	color: #bebb84;
}
a:hover {
	color: #bbb;
}

/*=========*/
/* BUTTONS */
/*=========*/

button,
input[type='submit'] {
	color: #92c396;
}
input[type='submit'] {
	color: #92c396;
	background-color: #fff;
	border: 1px solid #c4dbc4;
	transition:
		color 0.15s ease,
		background-color 0.15s ease,
		border-color 0.15s ease;
}

input[type='submit']:hover,
input[type='submit']:focus {
	background-color: #c4dbc4;
	color: #fff;
}
input[type='submit']:active {
	background-color: #92c396;
	border-color: #92c396;
}
.button:visited {
	color: #92c396;
}
button:hover,
.button:hover {
	color: #79a97e;
	text-decoration: none;
}
button:active,
.button:active {
	transform: scale(0.9);
}
button:focus:not(:hover),
.button:focus:not(:hover) {
	transform: none;
}
@-moz-document url-prefix() {
	.button:active {
		transform: none;
	}
}

/*==========*/
/* HEADINGS */
/*==========*/

.post-body h1, 
.post-body h2, 
.post-body h3, 
.post-body h4, 
.post-body h5, 
.post-body h6,
.comment-body h1,
.comment-body h2,
.comment-body h3,
.comment-body h4,
.comment-body h5,
.comment-body h6 {
	font-family: <?php echo $headings_font; ?>;
	font-weight: 300;
}
.post-body h1,
.comment-body h1 {
	margin-top: 1.25em;
	box-shadow:
		0 -7px 0 0 #fff inset,
		0 -8px 0 0 #eee inset;
}
.post-body h6,
.comment-body h6 {
	color: #555;
}

/*========*/
/* QUOTES */
/*========*/

blockquote {
	border-left: 5px solid #e6e6e6;
}

/*========*/
/* IMAGES */
/*========*/

.post-body img,
.comment-body img {
	border: 1px solid #ccc;
}
.post-body img[src$='.svg'],
.comment-body img[src$='.svg'] {
	border: none;
}
#content figure img {
	border: 1px solid #000;
}
#content figure img[src$='.svg'] {
	border: none;
}

/*======*/
/* MISC */
/*======*/

hr {
	margin: 1em 0;
}
hr::before {
	content: "• • •";
	letter-spacing: 7px;
	color: #aaa;
	text-align: center;
	display: block;
	font-size: 0.875em;
}

code,
pre {
	font-family: 'Source Code Pro', Inconsolata, monospace;
	font-size: 0.9375em;
	font-feature-settings: 'ss04';
}
code {
	background-color: #eee;
	padding: 0 5px 1px 5px;
	box-shadow: 0 0 0 1px #fff inset;
}

input[type='text'],
input[type='search'],
input[type='password'] {
	border: 1px solid #999;
	color: #000;
	background-color: transparent;
	border-color: transparent;
	border-bottom-color: #eee;
	transition: border-color 0.15s ease;
}
input[type='text']:focus,
input[type='search']:focus,
input[type='password']:focus {
	border-bottom-color: #c4dbc4;
}

select {
	color: #000;
}

strong, b {
	font-weight: 600;
}

/*============*/
/* ABOUT PAGE */
/*============*/

.about-page u {
	background-color: #e6e6e6;
	text-decoration: none;
	box-shadow: 
		0 -1px 0 0 #000 inset, 
		0 -3px 1px -2px #000 inset;
	padding: 0 1px;
}

#content.about-page .accesskey-table {
	font-family: <?php echo $UI_font; ?>;
	border-color: #ddd;
}

#content.about-page img {
	border: 1px solid #000;
}

/*========================*/
/* QUALIFIED HYPERLINKING */
/*========================*/

#content.no-nav-bars ~ #ui-elements-container #site-nav-ui-toggle {
	display: none;
}
#content.no-comments ~ #ui-elements-container #post-nav-ui-toggle {
	display: none;
}

#aux-about-link a {
	color: #777;
}
#aux-about-link a:hover {
	opacity: 1.0;
	text-shadow: 0 0 1px #fff, 0 0 3px #fff, 0 0 5px #fff;
}

.qualified-linking label {
	color: #ccc;
	font-weight: 400;
}
.qualified-linking label:hover {
	color: #92c396;
}

.qualified-linking-toolbar {
	border: 1px solid #ccc;
	background-color: #fff;
}
.qualified-linking-toolbar a {
	padding: 3px 6px 0 6px;
}
.qualified-linking-toolbar a,
.qualified-linking-toolbar a:visited {
	color: #acd2af;
}
.qualified-linking-toolbar a:hover {
	color: #92c396;
	text-decoration: none;
	background-color: #e4f1e5;
}

/*======*/
/* MATH */
/*======*/

.mathjax-block-container::-webkit-scrollbar {
	height: 12px;
	background-color: #f6f6ff;
	border-radius: 6px;
	border: 1px solid #ddf;
}
.mathjax-block-container::-webkit-scrollbar-thumb {
	background-color: #dde;
	border-radius: 6px;
	border: 1px solid #cce;
}
.mathjax-inline-container::-webkit-scrollbar {
	height: 8px;
	background-color: #f6f6ff;
	border-radius: 4px;
	border: 1px solid #ddf;
}
.mathjax-inline-container::-webkit-scrollbar-thumb {
	background-color: #dde;
	border-radius: 4px;
	border: 1px solid #cce;
}

/*====================*/
/* FOR NARROW SCREENS */
/*====================*/

@media not screen and (hover: none), not screen and (-moz-touch-enabled) {
	@media only screen and (max-width: 1080px) {
		#site-nav-ui-toggle button.engaged {
			left: -72px;
		}
		#text-size-adjustment-ui {
			left: -22px;
			top: calc(100% - 240px);
		}
		#width-selector {
			left: -23px;
			top: calc(100% - 140px);
		}
		#theme-tweaker-toggle button {
			width: unset;
			height: unset;
		}
	}
	@media only screen and (max-width: 1020px) {
	}
	@media only screen and (max-width: 1000px) {
		#site-nav-ui-toggle button.engaged {
			left: -56px;
		}
		#theme-selector {
			padding: 0;
		}
		#theme-selector button {
			margin: 1px 7px 0 7px;
		}
	}
}

/*========*/
/* MOBILE */
/*========*/

@media only screen and (hover: none), only screen and (-moz-touch-enabled) {
	#site-nav-ui-toggle {
		top: 10px;
		left: 10px;
	}
	#site-nav-ui-toggle button.engaged {
		width: 1.125em;
		overflow: hidden;
		position: relative;
		left: 5px;
		top: -3px;
	}
	#site-nav-ui-toggle button.engaged::before {
		content: "\F00D";
		font-size: 34px;
		padding: 0 0.25em 0 0;
	}
	#ui-elements-container > #site-nav-ui-toggle button.engaged {
		transform: rotate(90deg);
	}

	#ui-elements-container > div[id$='-ui-toggle'] button,
	#theme-selector .theme-selector-close-button  {
		color: #bbb;
		text-shadow:
			0 0 1px #fff,
			0 0 3px #fff,
			0 0 5px #fff,
			0 0 10px #fff,
			0 0 20px #fff,
			0 0 30px #fff;
	}
	#ui-elements-container > div[id$='-ui-toggle'] button {
		font-weight: 400;
	}
	#theme-selector .theme-selector-close-button {
		font-weight: 300;
	}

	#theme-selector {
		background-color: #fff;
		box-shadow: 
			0 0 0 1px #999,
			0 0 1px 3px #fff,
			0 0 3px 3px #fff,
			0 0 5px 3px #fff,
			0 0 10px 3px #fff,
			0 0 20px 3px #fff;
		border-radius: 12px;
	}
	#theme-selector::before {
		color: #999;
		font-weight: 300;
		position: relative;
		top: 6px;
	}
	#theme-selector button,
	#theme-selector button.selected {
		background-color: #fff;
		border-radius: 10px;
		box-shadow:
			0 0 0 4px #fff inset,
			0 0 0 5px #999 inset;
	}
	#theme-selector button.selected {
		background-color: #c4dbc4;
	}
	#theme-selector button::after {
		color: #819681;
		font-weight: 300;
		max-width: calc(100% - 3.5em);
		overflow: hidden;
		text-overflow: ellipsis;
		padding: 1px 0 0 0;
	}
	#theme-selector button.selected::after {
		color: #fff;
	}

	#theme-tweaker-toggle button {
		color: #999;
		font-weight: 400;
	}

	#quick-nav-ui {
		background-color: #fff;
	}
	#quick-nav-ui,
	#new-comment-nav-ui,
	#hns-date-picker {
		box-shadow:
			0 0 1px 3px #fff,
			0 0 3px 3px #fff,
			0 0 5px 3px #fff,
			0 0 10px 3px #fff,
			0 0 20px 3px #fff;
	}
	#quick-nav-ui a::after,
	#new-comment-nav-ui::before {
		font-family: <?php echo $UI_font; ?>;
		font-weight: bold;
		box-shadow:
			0 0 1px 0 #fff,
			0 0 3px 0 #fff,
			0 0 5px 0 #fff;
		background-color: #fff;
		border-radius: 4px;
	}
	#quick-nav-ui,
	#new-comment-nav-ui {
		border-radius: 8px;
	}
	#new-comment-nav-ui {
		background-color: #fff;
		border: 1px solid #fff;
	}
	#new-comment-nav-ui::before {
		color: #aaa;
		font-weight: 500;
	}
	#new-comment-nav-ui .new-comment-sequential-nav-button {
		color: #79a97e;
	}
	#new-comment-nav-ui .new-comments-count {
		background-color: inherit;
		top: 0;
	}
	#new-comment-nav-ui .new-comment-sequential-nav-button:disabled {
		color: #e6e6e6;
	}
	#new-comment-nav-ui .new-comment-sequential-nav-button.new-comment-previous {
		border-radius: 7px 0 0 7px;
	}
	#new-comment-nav-ui .new-comment-sequential-nav-button.new-comment-next {
		border-radius: 0 7px 7px 0;
	}
	#new-comment-nav-ui button::after {
		font-family: <?php echo $UI_font; ?>;
	}
	#hns-date-picker {
		background-color: #fff;
		border: 1px solid #fff;
	}

	#top-nav-bar {
		padding: 1.25em 0 0.25em 0;
		font-size: 1.625rem;
		margin: 0;
		grid-row: 2;
		grid-column: 2;
	}
	#top-nav-bar .page-number {
		line-height: 1.7;
	}
	#top-nav-bar .page-number span {
		display: block;
	}
	#top-nav-bar a.disabled {
		opacity: 0.2;
	}
	
	/*****************************************/
	@media only screen and (max-width: 900px) {
	/*****************************************/
		#theme-less-mobile-first-row-placeholder {
			grid-row: 1;
			grid-column: 2 / span 2;
			height: 50px;
		}

		#primary-bar,
		#secondary-bar {
			position: static;
			width: 0;
			height: 0;
		}

		#primary-bar {
			position: fixed;
			left: 0;
			margin: 0;
			padding: 5px 0 5px 0;
			height: unset;
			background-color: #fff;
			border-bottom: 1px solid #ddd;
			box-shadow: 0 0 0 1px #fff;
			z-index: 2;
			visibility: hidden;
			transition:
				visibility 0.2s ease,
				width 0.2s ease;
		}
		#primary-bar.engaged {
			width: 100%;
			visibility: visible;
			padding: 5px 4px 75px 60px;
		}
		#secondary-bar #nav-item-archive,
		#secondary-bar #nav-item-about {
			opacity: 0.0;
			transition: opacity 0.3s ease;
		}
		#secondary-bar.engaged #nav-item-archive,
		#secondary-bar.engaged #nav-item-about {
			opacity: 1.0;
			position: fixed;
			top: 80px;
			z-index: 3;
			width: 64px;
		}
		#secondary-bar.engaged #nav-item-archive {
			left: 8px;
		}
		#secondary-bar.engaged #nav-item-about {
			left: 72px;
		}

		.page-toolbar {
			position: fixed;
			height: unset;
			width: unset;
			z-index: 4;
			right: 100%;
			top: 80px;
			transition: right 0.2s ease;
		}
		.page-toolbar.engaged {
			right: 0;
		}
		.page-toolbar,
		#content:not(.user-page) .page-toolbar {
			display: flex;
			flex-flow: row;
			justify-content: flex-end;
			padding: 0 8px 0 0;
		}
		.page-toolbar > * {
			right: unset;
			line-height: 1.15;
			padding: 6px 0;
			margin: 0;
		}
		.page-toolbar > form,
		.page-toolbar > .button {
			text-align: center;
			flex-basis: 25%;
			margin-left: 1.5em;
		}
		.page-toolbar .button {
			text-transform: uppercase;
			font-size: 0.625rem;
		}
		.page-toolbar .button::before,
		#content.user-page .page-toolbar .button::before,
		.page-toolbar form::before,
		#content.user-page .page-toolbar form::before {
			font-size: 1.375rem;
			display: block;
			padding: 2px;
			font-size: 1.375rem;
			display: block;
		}
		.page-toolbar .rss {
			white-space: nowrap;
			position: fixed;
			top: 143px;
			left: -60px;
			padding: 6px 10px 5px 10px;
			visibility: hidden;
			background-color: #fff;
			border-style: solid;
			border-color: #ddd;
			border-width: 0 1px 1px 0;
			box-shadow: 
				0 1px 0 0 #fff,
				1px 1px 0 0 #fff;
			transition: left 0.2s ease;
		}
		.page-toolbar .rss,
		#content.user-page .page-toolbar .rss {
			margin: 0;
		}
		.page-toolbar.engaged .rss {
			visibility: visible;
			left: 0;
		}

		#primary-bar .nav-inner {
			font-size: 1.375em;
		}
		#secondary-bar .nav-inner {
			font-size: 1.125em;
		}
		#secondary-bar .nav-item:not(#nav-item-search) .nav-inner {
			padding: 6px 10px;
		}

		#nav-item-search {
			max-width: calc(100% - 180px);
			top: 4px;
			left: 68px;
		}
		#nav-item-search input {
			width: calc(100% - 32px);
		}
		#nav-item-search button {
			position: relative;
			bottom: 5px;
			visibility: visible;
			height: 32px;
			width: 40px;
			padding: 9px 15px 3px 5px;
		}
		#nav-item-search form:not(:focus-within) button:not(:hover) {
			color: transparent;
		}
		#nav-item-search button::before {
			color: #ddd;
		}

		#nav-item-login {
			top: 16px;
			right: 8px;
		}
		#nav-item-login .nav-inner {
			text-transform: none;
			font-size: 1.75em;
		}
		#nav-item-login .nav-inner::before {
			display: none;
		}
		#inbox-indicator::before {
			font-size: 1.75em;
			left: 2px;
		}

		#bottom-bar .nav-inner {
			padding: 1rem 0 1.25rem 0;
		}
		#bottom-bar .nav-inner::after {
			position: absolute;
		}

		#content.search-results-page #comments-list-mode-selector {
			grid-column: 3;
			grid-row: 2;
			justify-self: end;
		}

		#content,
		#content.post-page {
			padding: 0 4px;
		}

		h1.listing + .post-meta > * {
			line-height: 1.5;
		}
		h1.listing + .post-meta .post-section {
			overflow: visible;
			order: 1;
			width: unset;
		}
		h1.listing + .post-meta .post-section::before {
			position: unset;
		}

		.archive-nav *[class^='archive-nav-item-'] {
			border-width: 1px !important;
		}
		.archive-nav > *[class^='archive-nav-'] + *[class^='archive-nav-']::before {
			background-color: #aaa;
		}

		.post {
			padding: 0;
		}
		.post .top-post-meta .author {
			margin: 1em auto 0 auto;
		}
		.post .top-post-meta .date,
		.post .top-post-meta .comment-count {
			position: static;
		}
		.post .top-post-meta .date {
			margin: 1.5em auto 0 auto;
		}
		.post .top-post-meta .comment-count span {
			display: initial;
			position: static;
		}
		.post > h1:first-child {
			line-height: 1.3;
		}

		#comments {
			padding: 0;
		}
		.comment-item .comment-item {
			margin: 0.75em 3px 3px 6px;
		}
		.comment-item .comment-item + .comment-item {
			margin: 1.5em 3px 3px 6px;
		}

		.comment-controls {
			position: relative;
		}
		.comment-controls .cancel-comment-button,
		#comments > .comment-controls .cancel-comment-button {
			right: 4px;
		}

		.sublevel-nav .sublevel-item,
		.sublevel-nav .sublevel-item:first-child,
		.sublevel-nav .sublevel-item:last-child {
			border-width: 1px;
			border-radius: 8px;
		}

		#content.user-page #theme-less-mobile-first-row-placeholder {
			height: 60px;
		}
		#content.user-page h1.page-main-heading,
		#content.user-page .user-stats {
			grid-row: 2;
		}
		#content.user-page h1.page-main-heading {
			margin: 0.5em 0 0 0.125em;
		}
		#content.user-page #comments-list-mode-selector,
		#content.user-page .sublevel-nav.sort {
			grid-row: 3 / span 2;
		}
		#content.user-page .sublevel-nav {
			grid-row: 3;
			margin-bottom: 1em;
		}
		#content.user-page #top-nav-bar {
			grid-row: 4;
			margin: 0.5em 0 0 0;
		}

		#content.conversation-page #theme-less-mobile-first-row-placeholder {
			height: 64px;
		}
		#content.conversation-page #comments-list-mode-selector {
			grid-row: 6;
			margin-top: -32px;
		}
		#content.conversation-page .conversation-participants {
			grid-row: 4;
			align-self: end;
		}
	/*******************************************/
	} @media only screen and (max-width: 720px) {
	/*******************************************/
		#content.index-page > .sublevel-nav.sort {
			flex-flow: column;
			margin-right: 4px;
		}
	/*******************************************/
	} @media only screen and (max-width: 520px) {
	/*******************************************/
		h1.listing,
		#content.search-results-page h1.listing {
			font-size: 1.25rem;
			margin: 18px 6px 4px 6px;
			max-width: calc(100% - 12px);
		}
		h1.listing + .post-meta {
			margin: 4px 6px;
		}
		#content.conversations-user-page h1.listing::after {
			height: calc(100% + 2.25em);
		}
		#content.conversations-user-page h1.listing + .post-meta .date {
			margin: 0 0 0 1em;
		}
		
		.comment-body {
			font-size: 1.125rem;
		}
		
		#content.compact > .comment-thread .comment-item {
			max-height: 105px;
		}
		
		.textarea-container:focus-within textarea {
			background-color: #fff;
			border-width: 1px;
			box-shadow: 0 0 0 2px #fff;
		}
		.textarea-container:focus-within .guiedit-mobile-auxiliary-button {
			padding: 5px 6px 6px 6px;
			font-weight: bold;
		}
		.textarea-container:focus-within .guiedit-mobile-help-button.active {
			color: #c00;
		}
		.textarea-container:focus-within .guiedit-buttons-container {
			background-color: #fff;
			border-top: 1px solid #ddf;
		}
		.posting-controls .textarea-container:focus-within .guiedit-buttons-container {
			box-shadow: none;
		}
		#content.conversation-page .textarea-container:focus-within::after {
			background-color: #fff;
		}
		.markdown-hints::after {
			color: #090;
		}
	}
}

