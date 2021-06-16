/* ==========================================================================
   HTML5 display definitions
   ========================================================================== */

/**
 * Correct `block` display not defined in IE 8/9.
 */

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
nav,
section,
summary {
  display: block;
}

/**
 * Correct `inline-block` display not defined in IE 8/9.
 */

audio,
canvas,
video {
  display: inline-block;
}

/**
 * Prevent modern browsers from displaying `audio` without controls.
 * Remove excess height in iOS 5 devices.
 */

audio:not([controls]) {
  display: none;
  height: 0;
}

/**
 * Address styling not present in IE 8/9.
 */

[hidden] {
  display: none;
}

/* ==========================================================================
   Base
   ========================================================================== */

/**
 * 1. Set default font family to sans-serif.
 * 2. Prevent iOS text size adjust after orientation change, without disabling
 *    user zoom.
 */

html {
  font-family: sans-serif; /* 1 */
  -ms-text-size-adjust: 100%; /* 2 */
  -webkit-text-size-adjust: 100%; /* 2 */
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

/**
 * Remove default margin.
 */

body {
  margin: 0;
}

/* ==========================================================================
   Links
   ========================================================================== */

a {color: #000;}

/**
 * Address `outline` inconsistency between Chrome and other browsers.
 */

a:focus {
  outline: thin dotted;
}

/**
 * Improve readability when focused and also mouse hovered in all browsers.
 */

a:active,
a:hover {
  outline: 0;
}

/* ==========================================================================
   Typography
   ========================================================================== */

/**
 * Address variable `h1` font-size and margin within `section` and `article`
 * contexts in Firefox 4+, Safari 5, and Chrome.
 */

h1 {
  font-size: 2.5em;
  margin: 0.67em 0;
}

/**
 * Address styling not present in IE 8/9, Safari 5, and Chrome.
 */

abbr[title] {
  border-bottom: 1px dotted;
}

/**
 * Address style set to `bolder` in Firefox 4+, Safari 5, and Chrome.
 */

b,
strong {
  font-weight: bold;
}

/**
 * Address styling not present in Safari 5 and Chrome.
 */

dfn {
  font-style: italic;
}

/**
 * Address differences between Firefox and other browsers.
 */

hr {
  box-sizing: content-box;
  height: 0;
}

/**
 * Address styling not present in IE 8/9.
 */

mark {
  background: #ff0;
  color: #000;
}

/**
 * Correct font family set oddly in Safari 5 and Chrome.
 */

code,
kbd,
pre,
samp {
  font-family: monospace, serif;
  font-size: 1em;
}

/**
 * Improve readability of pre-formatted text in all browsers.
 */

pre {
  white-space: pre-wrap;
}

/**
 * Set consistent quote types.
 */

q {
  quotes: "\201C" "\201D" "\2018" "\2019";
}

/**
 * Address inconsistent and variable font size in all browsers.
 */

small {
  font-size: 80%;
}

/**
 * Prevent `sub` and `sup` affecting `line-height` in all browsers.
 */

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sup {
  top: -0.5em;
}

sub {
  bottom: -0.25em;
}

/* ==========================================================================
   Embedded content
   ========================================================================== */

/**
 * Remove border when inside `a` element in IE 8/9.
 */

img {
  border: 0;
}

/**
 * Correct overflow displayed oddly in IE 9.
 */

svg:not(:root) {
  overflow: hidden;
}

/* ==========================================================================
   Figures
   ========================================================================== */

/**
 * Address margin not present in IE 8/9 and Safari 5.
 */

figure {
  margin: 0;
}

/* ==========================================================================
   Forms
   ========================================================================== */

/**
 * Define consistent border, margin, and padding.
 */

fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em;
}

/**
 * 1. Correct `color` not being inherited in IE 8/9.
 * 2. Remove padding so people aren't caught out if they zero out fieldsets.
 */

legend {
  border: 0; /* 1 */
  padding: 0; /* 2 */
}

/**
 * 1. Correct font family not being inherited in all browsers.
 * 2. Correct font size not being inherited in all browsers.
 * 3. Address margins set differently in Firefox 4+, Safari 5, and Chrome.
 */

button,
input,
select,
textarea {
  font-family: inherit; /* 1 */
  font-size: 100%; /* 2 */
  margin: 0; /* 3 */
}

/**
 * Address Firefox 4+ setting `line-height` on `input` using `!important` in
 * the UA stylesheet.
 */

button,
input {
  line-height: normal;
}

/**
 * Address inconsistent `text-transform` inheritance for `button` and `select`.
 * All other form control elements do not inherit `text-transform` values.
 * Correct `button` style inheritance in Chrome, Safari 5+, and IE 8+.
 * Correct `select` style inheritance in Firefox 4+ and Opera.
 */

button,
select {
  text-transform: none;
}

/**
 * 1. Avoid the WebKit bug in Android 4.0.* where (2) destroys native `audio`
 *    and `video` controls.
 * 2. Correct inability to style clickable `input` types in iOS.
 * 3. Improve usability and consistency of cursor style between image-type
 *    `input` and others.
 */

button,
html input[type="button"],
/* 1 */
input[type="reset"],
input[type="submit"] {
  -webkit-appearance: button; /* 2 */
  -moz-appearance: button;
  cursor: pointer; /* 3 */
}

/**
 * Re-set default cursor for disabled elements.
 */

button[disabled],
html input[disabled] {
  cursor: default;
}

/**
 * 1. Address box sizing set to `content-box` in IE 8/9.
 * 2. Remove excess padding in IE 8/9.
 */

input[type="checkbox"],
input[type="radio"] {
  box-sizing: border-box; /* 1 */
  padding: 0; /* 2 */
}

/**
 * 1. Address `appearance` set to `searchfield` in Safari 5 and Chrome.
 * 2. Address `box-sizing` set to `border-box` in Safari 5 and Chrome
 *    (include `-moz` to future-proof).
 */

input[type="search"] {
  -webkit-appearance: textfield; /* 1 */ /* 2 */
  box-sizing: content-box;
}

/**
 * Remove inner padding and search cancel button in Safari 5 and Chrome
 * on OS X.
 */

input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

label.screen-reader-text,
label.wp-block-search__label {display: none;text-align: center;margin: 0.25em 0;font-size: 2em;font-weight: normal;}

/**
 * 1. Remove default vertical scrollbar in IE 8/9.
 * 2. Improve readability and alignment in all browsers.
 */

textarea {
  overflow: auto; /* 1 */
  vertical-align: top; /* 2 */
}


/* ==========================================================================
   Tables
   ========================================================================== */

/**
 * Remove most spacing between table cells.
 */

table {
  border-collapse: collapse;
  border-spacing: 0;
}





html { font-size: 62.5%; }  /* Base font size: 10px */
body {
  background: #fff;
  color: #000;
  font-size: 1.6rem; /* Base font size: 16px */
  font-weight: 300;
  font-family: 'NeueHaasGroteskDisp Std', sans-serif;
  font-weight: normal;
  font-style: normal;
  line-height: 1.4rem;
  margin: 0;
  padding: 0;
  text-align: left;
  position: relative;
  left: 0;
  transition: left 500ms ease-in-out;
  /* max-width: 100vw; */
}

/* Headings */
h2 {font-size: 2.4rem;line-height: 2.6rem;} /* 22px */
h3 {font-size: 2.2rem;line-height: 2.4rem;} /* 20px */
h4 {font-size: 2.0rem;line-height: 2.2rem;} /* 18px */
h5 {font-size: 1.8rem;line-height: 2.0rem;} /* 16px */
h6 {font-size: 1.8rem;line-height: 2.0rem;} /* 14px */
p {font-size: 1.8rem; line-height: 3rem;} /* 16px */

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: 'NeueHaasGroteskDisp Std', serif;
  font-weight: 700;
  letter-spacing: 1px;
  margin-bottom: .8rem;
}



/* ==========================================================================
   Outils
   ========================================================================== */
.left {float: left;}
.right {float: right;}
.center { display: block; margin: 0 auto; }
.hidden {display: none;}
.transparent {opacity: 0;}
.fixd { position: fixed; }
.clear { clear: both; }


.page #wrap,
.search #wrap,
.archive #wrap {
  width: 100%;
  max-width: 100vw;
  padding-top: 170px;
}

div.page.hentry {
  width: 100%;
  display: block;
}

/* Main Navigation
--------------------------------------------------------------*/

/* List styles */
body.home  #main-nav-wrapper {height: 0;}


#wrap.fixd {position: absolute;}

#blackcurtain,
#blockwindow {
  transition: left 500ms ease-in-out;
}


#blackcurtain {
  position: fixed;
  top: 0;
  left: 100vw;
  z-index:10;
  width: calc(100vw - 300px);
  height: 100%;
  background: #000;
  background: rgba(0,0,0,0.85);
  color: #fff;
}
#blackcurtain.show {
  position:fixed;
  left: 300px;
  overflow: scroll;
  padding-top: 100px;
}

div#closemenu {
  top: 20px;
  left: 50px;
  position: absolute;
  color: #fff;
  font-size: 1.5rem;
  text-transform: uppercase;
  cursor: pointer;
}
div#closemenu span {
  font-size: 3rem;
  vertical-align: middle;
  margin-top: -7px;
  display: inline-block;
}

#main-nav-wrapper {
  display: block;
  width: 100%;
  transition: all 300ms linear;
}

#header {
  padding-bottom: 15px;
}

nav#archive-nav-below {
  position: relative;
  z-index: 999;
  width: 300px;
  margin: 0 auto;
}
nav#archive-nav-below a {
  color: #000;
  padding: 10px;
  text-decoration: none;
}

#wpadminbar {display: none}

/* Site navigation / Logo / Menu
--------------------------------------------------------------*/
#site-navigation {
  width: 100%;
  max-width: 100vw;
  display: block;
  height: 170px;
  position: fixed;
  top: 0;
  z-index: 9;
  overflow: hidden;
}
#site-navigation.menu-open { height: 100%; }
#logo-print { display: none; }

#main-nav-wrapper #logo {
  width: 250px;
  height: 123px;
  margin: 20px auto;
  cursor: pointer;
  z-index: 10;
  position: relative;
}
#main-nav-wrapper #logo svg {
  z-index: 200;
  width: 100%;
  height: auto;
  margin: 0 auto;
  padding: 0;
}
.home #logo svg path {
  transition: fill .5s linear;
}
.WLOGO {
  position: fixed;
  left: 50%;
  transform: translateX(-50%);
  top: 20px;
  cursor: pointer;
  z-index: 11;
  width: 250px;
  height: 123px;
}
.WLOGO svg {
    width: 250px;
    height: auto;
}


#hambmenu {
  display: block;
  width: 80px;
  height: 50px;
  background: transparent;
  border: none;
  position: absolute;
  right: 0px;
  top: 7px;
  z-index: 10;
  outline-color: transparent;
  outline-width: 0;
}
#hambmenu-icon {
  width: 30px;
  height: 30px;
}
#hambmenu-icon rect,
.menu-open #hambmenu-icon rect { 
  transition: all 250ms ease-in-out;
}
.menu-open #hambmenu-icon rect#line1 {
    transform: rotate(-45deg) translateY(110px) translateX(-25px) scale(0.5);
}
.menu-open #hambmenu-icon rect#line2 {
    opacity: 0;
}
.menu-open #hambmenu-icon rect#line3 {
    transform: rotate(45deg) translateY(-80px) translateX(65px) scale(0.5);
}
.sidemenu {
  position: fixed;
  top: 100%;
  left: 0;
  z-index: 9;
  height: 100%;
  width: 100vw;
  background: #fff;
  padding-top: 20px;
  transition: top 300ms ease-in-out;
  display: flex;
  flex-flow: column nowrap;
  align-items: flex-start;
  justify-content: center;
}
.menu-open .sidemenu {
  top: 0;
}
.sidemenu .menu {
  display: flex;
  flex-flow: column nowrap;
  align-items: center;
  justify-content: center;
  list-style: none;
  margin: 100px 0 20px 0;
  padding: 0;
  width: 100%;
}
.sidemenu .menu li {
  padding: 0 40px 25px 40px;
  width: auto;
  flex: 1 0 calc(50% - 80px);
}
.sidemenu .menu li a {
  font-size: 28px;
  line-height: 30px;
  text-transform: uppercase;
  text-decoration: none;
  color: #000;
  font-family: 'Sometimes Times', serif;
  font-weight: 300;
  opacity: 1;
  transition: opacity 200ms ease-in-out;
}
.sidemenu .menu li a:hover {
  opacity: .75;
}
.sidemenu .menu #lang-switcher span:last-child,
.sidemenu .menu #lang-switcher a:last-child { margin-left: 20px }
.sidemenu .menu #lang-switcher span {
  font-size: 26px;
  line-height: 36px;
  font-weight: 300;
  color: #000;
  font-family: 'Sometimes Times', serif;
}

.pinbin-image img {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: alpha(opacity=100);
  opacity: 1;
  transition: opacity 0.3s linear;
}

.single #header,
.page #header {
  padding-bottom: 0;
}

#whitecurtain {
  display: flex;
  flex-flow: row nowrap;
  align-items: center;
  justify-content: center;
  position: fixed;
  width: 100%;
  height: 100vh;
  z-index: 1000;
  top: 0;
  opacity: 1;
  background: #fff;
  transition: 500ms linear;
}
#whitecurtain #CFAlogo-svg { opacity: 0.25; }

#whitecurtain.prehidden { opacity: 0; }
#whitecurtain #CFAlogo-C-svg,
#whitecurtain #CFAlogo-A-svg,
#whitecurtain #CFAlogo-cross-svg path:first-child,
#whitecurtain.hidden { display:none; }

@media only screen and (min-width: 767px) {
  #site-navigation {
    height: 180px;
  }
  #hambmenu {
    display: none;
  }
  .sidemenu {
    background: transparent;
    top: 0;
    left: 0;
    width: 100%;
    height: auto;
    max-height: 180px;
    overflow: hidden;
    transition: none;
    flex-flow: row wrap;
  }
  .sidemenu .menu {
    flex-flow: row wrap;
    flex: 1 0 calc(100% - 60px);
    margin: 0 30px;
  }
  .sidemenu .menu li { padding: 0 0 6px 0; }
  .sidemenu .menu li:nth-child(odd) { text-align: left; }
  .sidemenu .menu li:nth-child(even) { text-align: right; }
  .sidemenu .menu li a {
    font-size: 28px;
    line-height: 30px;
    text-transform: uppercase;
    text-decoration: none;
    color: #000;
    font-family: 'Sometimes Times', serif;
    font-weight: 300;
    opacity: 1;
    transition: opacity 200ms ease-in-out;
  }
  .sidemenu .menu li a:hover {
    opacity: .5;
  }
  #lang-switcher {
    flex: 1 0 calc(50% - 60px);
  }
  .home #wrap {
    margin-top: 180px;
  }

}


/* For devices with screen size lower than 768px */
@media only screen and (max-width: 767px) {
  
  #logo {
    margin: 0 auto;
    width: 640px;
  }
  body.menu_open #main-nav-wrapper { z-index: 1; }
  #wrap {
    margin: 15px auto;
    margin: 180px auto;
    overflow: hidden;
  }
  #wrap.fixd {
    margin-top: -102px;
  }
  .page #wrap,
  .search #wrap,
  .archive #wrap {
    margin-top: 0;
    padding-top: 200px;
    margin: 0 auto 0 auto;
  }
  #wrap .category-description { width: 90%;}

  .single .single-pinbin-copy { margin-top:0px; }

  h1 {
    font-size: 2em;
    line-height: 1;
  }
  .single h1 {
    font-size: 3.5em;
    padding: 20px 0;
    margin: 0 -5vw 0 -5vw;
    width: 90vw;
  }

  body #main-nav-wrapper,
  #modal #main-nav-wrapper {
    left: 0;
    min-height: 100px;
    width: 100vw;
  }
  .pinbin-copy .ready {display: none;}
  .single .post small.date,
  .single .post div.post-data {
    padding: 20px 20px 0 20px;
    width: inherit;
    display: block;
    margin: 0 0 20px 0;
    box-sizing: border-box;
    }

}


#menu-pad li#lang-switch a {color: #ccc;}
.indice {
    margin-bottom: 100px;
}
ul#ToC-list {
    list-style: none;
    margin: 0;
    padding: 0;
    font-style: normal;
}
.ToC-heading {
  font-size: 20px;
  font-style: normal;
}

ul#ToC-list li a {
    color: #2f2f2f;
    font-size: 18px;
    font-weight: 300;
    font-style: normal;
    line-height: 30px;
    padding: 0 2px;
    margin-right: 10px;
    cursor: pointer;
    display: inline;
    border-bottom: 1px solid #FFCC33;
    /* text-decoration: underline; */
}

ul#ToC-list li {
    padding: 3px 0;
    display: inline;
}



.single h1,
.archive h1,
.search h1,
.error404 h1 {
  color: #000;
  font-family: 'Sometimes Times', serif;
  font-weight: 300;
  text-align: center;
  font-size: 5em;
  line-height: 1.15em;
  margin: 0 -15vw 10px -15vw;
}


.single .single-pinbin-copy,
.page .pinbin-copy,
.error404 .pinbin-copy {
  padding: 0 5vw;
  color: #444;
  font-size: 15px;
  line-height: 18px;
  width: 100%;
  max-width: 1140px;
  margin: 0 auto;
  text-align: center;
  margin-top: 50px;
  box-sizing: border-box;
}
.single .single-pinbin-copy {
  width: 80vw;
  max-width: 550px;
  margin-top: 0;
  text-align: justify;
  box-sizing: content-box;
}
@media all and (min-width: 768px) {
  .single .single-pinbin-copy,
  .error404 .pinbin-copy {
    margin-top: 200px;
    background: #fff;
    z-index: 100;
    position: relative;
  }
}
.page .pinbin-copy h1,
.search .pinbin-copy h1 {
  text-align: center;
  margin: 0 0 50px 0;
  line-height: 1;
  font-family: 'Sometimes Times';
  font-weight: 700;
  letter-spacing: 1px;
}
.search-results .page-header {
  color: #000;
  margin: 0;
  max-width: 100vw;
  padding: 0 5vw;
  text-align: center;
  box-sizing: border-box;
}


.single .post small.date,
.single .post div.post-data,
.single .cfa_translations small.date,
.single .cfa_translations div.post-data {
  font-family: 'Sometimes Times', serif;
  text-align: center;
  width: 100%;
  display: inline-block;
  margin: 25px 0;
  text-rendering: optimizeLegibility;
  font-size: 21px;
}

.home .pinbin-copy p small,
.archive .pinbin-copy p small,
.search .pinbin-copy p small,
.append-posts .pinbin-copy p small {font-size: 1.1rem;}

.home .pinbin-copy p span,
.archive .pinbin-copy p span,
.search .pinbin-copy p span,
.append-posts .pinbin-copy p span {
  display: block;
  margin-top: 10px;
  font-family: 'NeueHaasGroteskDisp Std', sans-serif;
  font-size: 13px;
  line-height: 14px;
  text-transform: none;
  color: rgba(255,255,255,0.75);
}
.home .pinbin-copy p small,
.archive .pinbin-copy p small,
.search .pinbin-copy p small,
.append-posts .pinbin-copy p small {
    display: block;
    line-height: 14px;
    margin-top: 10px;
}
.home .pinbin-copy p strong,
.archive .pinbin-copy p strong,
.search .pinbin-copy p strong,
.append-posts .pinbin-copy p strong {
  font-weight: 300;
}
