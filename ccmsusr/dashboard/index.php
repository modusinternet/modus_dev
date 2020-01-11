<?php
header("Content-Type: text/html; charset=UTF-8");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if($_SERVER["SCRIPT_NAME"] != "/ccmsusr/index.php") {
	echo "This script can NOT be called directly.";
	die();
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Dashboard</title>
		<meta name="description" content="" />
		{CCMS_TPL:header-head.html}
		<script>
			var navActiveArray = ["dashboard"];
		</script>
	</head>
	<body>
		<nav id="mm-menu">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/work">Our work</a></li>
				<li><span>About us</span>
					<ul>
						<li><a href="/about/history">History</a></li>
						<li><span>The team</span>
							<ul>
								<li><a href="/about/team/management">Management</a></li>
								<li><a href="/about/team/sales">Sales</a></li>
								<li><a href="/about/team/development">Development</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><span>Services</span>
					<ul>
						<li><a href="/services/design">Design</a></li>
						<li><a href="/services/development">Development</a></li>
						<li><a href="/services/marketing">Marketing</a></li>
					</ul>
				</li>
				<li><a href="/contact">Contact</a></li>
			</ul>
		</nav>


		<script>
			function loadFirst(e,t){var a=document.createElement("script");a.async = true;a.readyState?a.onreadystatechange=function(){("loaded"==a.readyState||"complete"==a.readyState)&&(a.onreadystatechange=null,t())}:a.onload=function(){t()},a.src=e,document.body.appendChild(a)}

			var l = document.createElement('link'); l.rel = 'stylesheet';
			l.href = "/ccmsusr/_css/mmenu.css";
			var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);

			function loadJSResources() {
				loadFirst("/ccmsusr/_js/jquery-3.4.1.min.js", function() { /* JQuery is loaded */
					loadFirst("/ccmsusr/_js/mmenu.js", function() { /* mmenu is loaded */
						//loadFirst("/ccmsusr/_js/bootstrap-3.3.7.min.js", function() { /* Bootstrap is loaded */
						//loadFirst("/ccmsusr/_js/metisMenu-2.4.0.min.js", function() { /* MetisMenu JavaScript */
							/*loadFirst("/ccmsusr/_js/custodiancms.js", function() { /* CustodianCMS JavaScript */
							//loadFirst("/ccmsusr/_js/custodiancms.min.js", function() { /* CustodianCMS JavaScript */

								//navActiveArray.forEach(function(s) {$("#"+s).addClass("active");});

								// Load MetisMenu
								//$('#side-menu').metisMenu();

								// Fade in web page.
								//$("#no-fouc").delay(200).animate({"opacity": "1"}, 500);

								//$("#menu-toggle").click(function(e) {
									//e.preventDefault();
									//$("#wrapper").toggleClass("toggled");
									//$("#wrapper.toggled").find("#sidebar-wrapper").find(".collapse").collapse("hide");
									//$("#sidebar-wrapper").toggle();
								//});


							//});
						//});
					//});


						/*
						document.addEventListener(
							"DOMContentLoaded", () => {
								new Mmenu( "#mm-menu", {
									"extensions": [
										"pagedim-black",
										"position-right"
									],
									"iconbar": {
										"use": true,
										"top": [
											"<a href='#/'><i class='fa fa-home'></i></a>",
											"<a href='#/'><i class='fa fa-user'></i></a>"
										],
										"bottom": [
											"<a href='#/'><i class='fa fa-twitter'></i></a>",
											"<a href='#/'><i class='fa fa-facebook'></i></a>",
											"<a href='#/'><i class='fa fa-linkedin'></i></a>"
										]
									}
								});
							}
						);
						*/


						document.addEventListener(
							"DOMContentLoaded", () => {
								// Fire the plugin
								const menu = new Mmenu( "#my-menu", {
									extensions: [ "pagedim-black", "position-right" ],
									iconbar: {
									use: true,
									top: [
										"<a href='#/'><i class='fa fa-home'></i></a>",
										"<a href='#/'><i class='fa fa-user'></i></a>"
									]},
									sidebar: {
										collapsed: {
											use: '(min-width: 450px)',
											hideNavbar: false
										},
										expanded: {
											use: '(min-width: 992px)'
										}
									}
								);

								// Get the API
								const api = menu.API;

								// Invoke a method
								const panel = document.querySelector( "#my-panel" );
								api.openPanel( panel );
							}
						);




					});
				});
			}

			if (window.addEventListener)
				window.addEventListener("load", loadJSResources, false);
			else if (window.attachEvent)
				window.attachEvent("onload", loadJSResources);
			else window.onload = loadJSResources;
		</script>
	</body>
</html>
