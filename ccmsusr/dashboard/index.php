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
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" />
		<title>My webpage</title>
		<link href="/ccmsusr/_css/custodiancms.css" rel="stylesheet" />
		<link href="/ccmsusr/_css/mmenu.css" rel="stylesheet" />
	</head>
	<body>
		<div id="my-page">
			<div id="my-header">
				<a href="#my-menu">Open the menu</a>
				<nav id="my-menu">
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
			</div>
			<div id="my-content">
				...
			</div>
		</div>
		<script src="/ccmsusr/_js/mmenu.js"></script>
		<script>
			document.addEventListener("DOMContentLoaded", () => {
				new Mmenu( "#my-menu", {
					"extensions": [
						"pagedim-black",
						"position-right"
					], "iconbar": {
						"use": true,
						"top": [
							"<a href='#/'><i class='fa fa-home'></i></a>",
							"<a href='#/'><i class='fa fa-user'></i></a>"
						], "bottom": [
							"<a href='#/'><i class='fa fa-twitter'></i></a>",
							"<a href='#/'><i class='fa fa-facebook'></i></a>",
							"<a href='#/'><i class='fa fa-linkedin'></i></a>"
						]
					}
				});
			});
		</script>
	</body>
</html>
