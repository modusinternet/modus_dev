<?php
  header("Content-Type: text/css; charset=UTF-8");
  require_once $_SERVER["DOCUMENT_ROOT"] . "/" . $CFG["LIBDIR"] . "/modusinternet.php";
?>/* open-sans-300 - latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'),
       url('../_css/fonts/open-sans-v15-latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek-300.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('../_css/fonts/open-sans-v15-latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek-300.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

/* open-sans-regular - latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans Regular'), local('OpenSans-Regular'),
       url('../_css/fonts/open-sans-v15-latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek-regular.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('../_css/fonts/open-sans-v15-latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek-regular.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

/* open-sans-italic - latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek */
@font-face {
  font-family: 'Open Sans';
  font-style: italic;
  font-weight: 400;
  src: local('Open Sans Italic'), local('OpenSans-Italic'),
       url('../_css/fonts/open-sans-v15-latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek-italic.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('../_css/fonts/open-sans-v15-latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek-italic.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

/* open-sans-300italic - latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek */
@font-face {
  font-family: 'Open Sans';
  font-style: italic;
  font-weight: 300;
  src: local('Open Sans Light Italic'), local('OpenSans-LightItalic'),
       url('../_css/fonts/open-sans-v15-latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek-300italic.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('../_css/fonts/open-sans-v15-latin_cyrillic-ext_vietnamese_cyrillic_latin-ext_greek-ext_greek-300italic.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

:root {
  --header-background: none;
  --header-div-a-img-height: 64px;
  --header-div-a-img-height-scroll: 48px;
  --header-z-index: 1;
  --nav-background: #ccc;
  --nav-text-color: #fff;
  /* --nav-a-text-align: {CCMS_LIB:modusinternet.php;FUNC:lng_dir_right_go_left_left_go_right}; */
  --nav-a-text-align: <?=lng_dir_right_go_left_left_go_right();?>;
  --nav-submenu-button-color: #fff;
  --nav-hover-background: #999;
  --nav-hover-dropdown-background: #999;
  --nav-hover-dropdown-a-background: #666;
}

*, ::after, ::before {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  color: #666;
  font: 100 1.8em/1.8em 'Open Sans',sans-serif;
	/* padding: 20px; */
	-webkit-font-smoothing: antialiased; /* Fix for webkit rendering */
	-webkit-text-size-adjust: 100%;
}

main {
  margin: 20px;
  position: absolute;
  top: 100px;
}

h1, h2, h3, h4, h5, h6 {
  color: #4F9F43;
  font-weight: 100;
  line-height: 1.1em;
  margin-bottom: 20px;
  text-align: center;
}

header {
  background: var(--header-background);
  left: 0;
  position: fixed;
  right: 0;
  top: 0;
  z-index: var(--header-z-index);
  -webkit-transition: all 1.0s ease-in-out;
  -moz-transition: all 1.0s ease-in-out;
  -o-transition: all 1.0s ease-in-out;
  transition: all 1.0s ease-in-out;
}

.header-scroll { height: 60px; }
header a { text-decoration: none; }

header > div > a > img {
  height: var(--header-div-a-img-height);
  margin: 10px;
  -webkit-filter: drop-shadow({CCMS_LIB:modusinternet.php;FUNC:shadow_direction_x}px 12px 12px rgba(0,0,0,.5));
  -moz-filter: drop-shadow({CCMS_LIB:modusinternet.php;FUNC:shadow_direction_x}px 12px 12px rgba(0,0,0,.5));
  -ms-filter: drop-shadow({CCMS_LIB:modusinternet.php;FUNC:shadow_direction_x}px 12px 12px rgba(0,0,0,.5));
  -o-filter: drop-shadow({CCMS_LIB:modusinternet.php;FUNC:shadow_direction_x}px 12px 12px rgba(0,0,0,.5));
  filter: drop-shadow({CCMS_LIB:modusinternet.php;FUNC:shadow_direction_x}px 12px 12px rgba(0,0,0,.5));
  -webkit-transition: all 1.0s ease-in-out;
  -moz-transition: all 1.0s ease-in-out;
  -o-transition: all 1.0s ease-in-out;
  transition: all 1.0s ease-in-out;
}

.header-div-a-img-scroll { height: var(--header-div-a-img-height-scroll); }

header > div > button {
  background: transparent;
  border: none;
  cursor: pointer;
  display: block;
  float: {CCMS_LIB:modusinternet.php;FUNC:lng_dir_left_go_right_right_go_left};
  font-size: .8em;
  line-height: 1;
  outline: none;
  padding: 24px 34px;
  -webkit-transition: all 1.0s ease-in-out;
  -moz-transition: all 1.0s ease-in-out;
  -o-transition: all 1.0s ease-in-out;
  transition: all 1.0s ease-in-out;
}

.header-div-button-scroll { padding: 18px 30px; }

nav {
  background: var(--nav-background);
  height: 80%;
  {CCMS_LIB:modusinternet.php;FUNC:lng_dir_right_go_left_left_go_right}: -100%;
  overflow-y: auto;
  position: fixed;
  width: 80%;
  box-shadow: {CCMS_LIB:modusinternet.php;FUNC:shadow_direction_x}px 12px 12px rgba(0,0,0,0.2);
  -webkit-transition: all 1.0s ease-in-out;
  -moz-transition: all 1.0s ease-in-out;
  -o-transition: all 1.0s ease-in-out;
  transition: all 1.0s ease-in-out;
}

nav a {
  display: block;
  text-align: var(--nav-a-text-align);
  text-decoration: none;
}

nav a:hover, nav .submenu:hover { background: var(--nav-hover-background); }
nav > .submenu > .dropdown:hover { background: var(--nav-hover-dropdown-background); }
nav > .submenu > .dropdown a:hover { background: var(--nav-hover-dropdown-a-background); }

nav .submenu {
  cursor: pointer;
  -webkit-transition: all 1.0s ease-in-out;
  -moz-transition: all 1.0s ease-in-out;
  -o-transition: all 1.0s ease-in-out;
  transition: all 1.0s ease-in-out;
}

nav .submenu button {
  background: inherit;
  border: none;
  cursor: pointer;
  font: inherit;
  outline: none;
}

nav a, nav .submenu button {
  color: var(--nav-text-color);
  padding: 14px 10px;
}

nav .submenu .dropdown {
  background: inherit !important;
  display: none;
  padding: 0 35px;
}

.nav-show { {CCMS_LIB:modusinternet.php;FUNC:lng_dir_right_go_left_left_go_right}: 0; }
.nav-hide { {CCMS_LIB:modusinternet.php;FUNC:lng_dir_right_go_left_left_go_right}: -100%; }
.active-sub, .medium-color-background { background: var(--nav-hover-dropdown-background) !important; }
.active { background: var(--nav-hover-dropdown-a-background) !important; }

.cssgrid .sidebar { grid-area: sidebar; }
.cssgrid .sidebar2 { grid-area: sidebar2; }
.cssgrid .content { grid-area: content; }
.cssgrid .header { grid-area: header; }
.cssgrid .footer { grid-area: footer; }

.cssgrid {
  color: #444;
  background-color: #fff;
}

.cssgrid {
  display: grid;
  grid-gap: 1em;
  grid-template-areas:
    "header"
    "sidebar"
    "content"
    "sidebar2"
    "footer";
}

.cssgrid .box {
  background-color: #444;
  color: #fff;
  border-radius: 5px;
  padding: 10px;
  overflow: hidden;
}

.cssgrid .header, .cssgrid .footer { background-color: #999; }

.cssgrid .sidebar2 {
  background-color: #ccc;
  color: #444;
}

/* 400px or larger. */
@media only screen and (min-width: 400px) {
  .cssgrid {
    grid-template-columns: 20% auto;
    grid-template-areas:
      "header header"
      "sidebar content"
      "sidebar2 sidebar2"
      "footer footer";
  }
}

/* 769px or larger. */
@media only screen and (min-width: 769px) {
  header > div > button { display: none; }

  nav {
    background: var(--nav-background);
    height: unset;
    {CCMS_LIB:modusinternet.php;FUNC:lng_dir_right_go_left_left_go_right}: unset !important;
    overflow-y: unset;
    padding: 0;
    position: fixed;
    {CCMS_LIB:modusinternet.php;FUNC:lng_dir_left_go_right_right_go_left}: 0;
    top: 0;
    width: unset;
  }

  nav > a, nav .submenu { float: {CCMS_LIB:modusinternet.php;FUNC:lng_dir_right_go_left_left_go_right}; }

  nav .submenu .dropdown {
    box-shadow: {CCMS_LIB:modusinternet.php;FUNC:shadow_direction_x}px 12px 12px rgba(0,0,0,0.2);
    display: none;
    position: absolute;
  }

  nav .dropdown-position-reverse { {CCMS_LIB:modusinternet.php;FUNC:lng_dir_left_go_right_right_go_left}: 0; }

  .cssgrid {
    grid-gap: 20px;
    grid-template-columns: 120px auto 120px;
    grid-template-areas:
      "header header header"
      "sidebar content sidebar2"
      "footer footer footer";
  }
}
