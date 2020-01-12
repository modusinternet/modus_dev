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
		<style>
			svg{max-width:2rem}

			svg path{fill:#337ab7}
		</style>
	</head>
	<body>
		<div id="my-page">
			<div id="my-header">
				<a href="#my-menu"><svg aria-label="title desc" class="svg-nav-icon" role="img" viewBox="0 -53 384 384" xmlns="https://www.w3.org/2000/svg"><title>Open Menu</title><desc>An icon used to open the navigation menu.</desc><a xlink:href="#"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></a></svg></a>
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
						"position-left"
					], "iconbar": {
						"use": true,
						"top": [
							'<a href="/{CCMS_LIB:_default.php;FUNC:ccms_lng}/?ccms_token={CCMS_LIB:_default.php;FUNC:ccms_token}"><svg aria-label="title desc" class="svg-nav-icon" role="img" viewBox="0 0 512 512" xmlns="https://www.w3.org/2000/svg"><title>Back to Home</title><desc>An icon used to return back to the homepage.</desc><a xlink:href="#"><path d="M503.401,228.884l-43.253-39.411V58.79c0-8.315-6.741-15.057-15.057-15.057H340.976c-8.315,0-15.057,6.741-15.057,15.057 v8.374l-52.236-47.597c-10.083-9.189-25.288-9.188-35.367-0.001L8.598,228.885c-8.076,7.36-10.745,18.7-6.799,28.889 c3.947,10.189,13.557,16.772,24.484,16.772h36.689v209.721c0,8.315,6.741,15.057,15.057,15.057h125.913 c8.315,0,15.057-6.741,15.057-15.057V356.931H293v127.337c0,8.315,6.741,15.057,15.057,15.057h125.908 c8.315,0,15.057-6.741,15.056-15.057V274.547h36.697c10.926,0,20.537-6.584,24.484-16.772 C514.147,247.585,511.479,236.245,503.401,228.884z M433.965,244.433c-8.315,0-15.057,6.741-15.057,15.057v209.721h-95.793 V341.874c0-8.315-6.742-15.057-15.057-15.057H203.942c-8.315,0-15.057,6.741-15.057,15.057v127.337h-95.8V259.49 c0-8.315-6.741-15.057-15.057-15.057H36.245l219.756-200.24l74.836,68.191c4.408,4.016,10.771,5.051,16.224,2.644 c5.454-2.41,8.973-7.812,8.973-13.774V73.847h74.002v122.276c0,4.237,1.784,8.276,4.916,11.13l40.803,37.18H433.965z"/></a></svg></a>',
							'<a href="/en/user/user_profile/"><svg aria-label="title desc" class="svg-nav-icon" role="img" viewBox="0 0 32 32" xmlns="https://www.w3.org/2000/svg"><title>User Profile</title><desc>An icon used to indicate the user profile portion of the navigation bar.</desc><a xlink:href="#"><path d="M31.11,28.336c-0.201-0.133-3.848-2.525-9.273-3.699c1.99-2.521,3.268-5.912,3.811-8.169 c0.754-3.128,0.461-9.248-2.543-13.062C21.349,1.177,18.892,0,16,0c-2.892,0-5.349,1.178-7.104,3.406 C5.892,7.219,5.6,13.339,6.353,16.467c0.543,2.257,1.82,5.648,3.811,8.169c-5.425,1.174-9.072,3.566-9.272,3.699  c-0.733,0.488-1.061,1.4-0.805,2.242C0.341,31.422,1.12,32,2,32h28c0.881,0,1.658-0.578,1.914-1.422  C32.171,29.736,31.843,28.824,31.11,28.336z M20.267,23.398l-0.326,0.414c-2.385,2.74-5.495,2.74-7.879,0l-0.327-0.414 c-2.785-3.529-4.167-8.197-3.572-12.65C8.708,6.469,11.16,2,16,2c4.84,0,7.293,4.47,7.838,8.749 C24.431,15.204,23.054,19.867,20.267,23.398z M2,30c0.138-0.092,3.526-2.314,8.586-3.408l2.484-0.537C13.957,26.637,14.93,27,16,27 c1.071,0,2.043-0.363,2.93-0.945l2.484,0.537c5.02,1.086,8.396,3.283,8.586,3.408H2z"/></a></svg></a>'
						], "bottom": [
							'<a href="/en/user/login.html?logout=1"><svg aria-label="title desc" class="svg-nav-icon" role="img" viewBox="0 0 128 128" xmlns="https://www.w3.org/2000/svg"><title>Logout</title><desc>An icon used to logout of the user area and return back to the homepage.</desc><a xlink:href="#"><path d="m13.076 97.083a1.75 1.75 0 0 0 1.75-1.75v-28.666a1.75 1.75 0 0 0 -3.5 0v28.666a1.75 1.75 0 0 0 1.75 1.75z"/><path d="m122.38 64.97c.027-.041.046-.085.069-.128a1.037 1.037 0 0 0 .146-.348c.015-.051.035-.1.045-.152a1.755 1.755 0 0 0 0-.685c-.01-.053-.03-.1-.045-.152a1.733 1.733 0 0 0 -.054-.174 1.692 1.692 0 0 0 -.092-.174c-.023-.042-.042-.086-.069-.127a1.75 1.75 0 0 0 -.22-.269l-12.509-12.509a1.75 1.75 0 0 0 -2.475 2.475l9.524 9.523h-53.276a1.75 1.75 0 0 0 0 3.5h53.276l-9.523 9.523a1.75 1.75 0 1 0 2.475 2.475l12.508-12.509a1.75 1.75 0 0 0 .22-.269z"/><path d="m95.424 72.25a1.75 1.75 0 0 0 -1.75 1.75v36.9h-45.041v-93.8h45.041v36.9a1.75 1.75 0 1 0 3.5 0v-38.65a1.75 1.75 0 0 0 -1.75-1.75h-46.791v-7.1a1.75 1.75 0 0 0 -2.461-1.6l-39.807 17.693a1.751 1.751 0 0 0 -1.039 1.6v79.615a1.751 1.751 0 0 0 1.039 1.6l39.807 17.692a1.75 1.75 0 0 0 2.461-1.6v-7.1h46.791a1.75 1.75 0 0 0 1.75-1.75v-38.65a1.75 1.75 0 0 0 -1.75-1.75zm-50.291 46.558-36.307-16.138v-77.34l36.307-16.138z"/></a></svg></a>'
						]
					}
				});
			});
		</script>
	</body>
</html>
