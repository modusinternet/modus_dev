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
		<title>Dashboard</title>
		<style>
			{CCMS_TPL:/_css/header.html}





		</style>
	</head>
	<body>
		<div id="my-page">
			<div id="my-header">
				<a href="#my-menu"><svg aria-label="title desc" class="svg-nav-icon" role="img" viewBox="0 -53 384 384" xmlns="https://www.w3.org/2000/svg"><title>Open Menu</title><desc>An icon used to open the navigation menu.</desc><a xlink:href="#"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></a></svg></a>
				<nav id="my-menu" style="display:none">
					<ul>
						<li><a href="/en/user/dashboard/">Dashboard</a></li>
						<li><span>Admin</span>
							<ul>
								<li><a href="/en/user/admin/user_privileges/">User Privileges</a></li>
								<li><a href="/en/user/admin/language_support/">Language Support</a></li>
								<li><a href="/en/user/admin/blacklist_settings/">Blacklist Settings</a></li>
							</ul>
						</li>
						<li><a href="/en/user/content_manager/">Content Manager</a></li>
						<li><a href="/en/user/content_groups/">Content Groups</a></li>
						<li><a href="/en/user/github/">GitHub</a></li>
					</ul>
				</nav>
				<img class="logo" src="/ccmsusr/_img/ccms-535x107.png">
			</div>

			<div id="my-content">
				<h1>Dashboard</h1>
				<div class="panel panel-danger">
					<div class="panel-heading">
						Notice
					</div>
					<div class="panel-body">
						<p>This section of the Custodian CMS admin is currently under development.</p>
					</div>
				</div>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec ligula id nisl fringilla finibus. Vestibulum rhoncus, felis at fringilla ullamcorper, ante mi tincidunt nunc, ac ultrices odio odio vitae lorem. Morbi quis elit id urna efficitur aliquam ut et sapien. Fusce porttitor vel ligula faucibus tempor. Pellentesque tincidunt imperdiet enim, id lobortis ipsum tempus id. In facilisis elementum dictum. Donec suscipit ornare tortor, sed volutpat mauris volutpat at. Pellentesque porttitor ut augue at ultrices. Proin egestas semper lorem quis suscipit. Vivamus eget magna tincidunt, semper sem eu, molestie quam. Praesent nisl velit, ultricies ac malesuada id, dapibus in dui. Mauris luctus velit non mi condimentum rhoncus. Nullam sit amet aliquet turpis, id malesuada nulla. Ut sit amet nisl nec ante commodo eleifend.






			</div>
		</div>

		<script>

			function loadFirst(e,t){var a=document.createElement("script");a.async="true";a.readyState?a.onreadystatechange=function(){("loaded"==a.readyState||"complete"==a.readyState)&&(a.onreadystatechange=null,t())}:a.onload=function(){t()},a.src=e,document.body.appendChild(a)}

			var l=document.createElement('link');l.rel="stylesheet";
			l.href="/ccmsusr/_css/mmenu.css";
			var h=document.getElementsByTagName('head')[0];h.parentNode.insertBefore(l,h);

			function loadJSResources(){
				loadFirst("/ccmsusr/_js/jquery-3.4.1.min.js",function(){
					loadFirst("/ccmsusr/_js/mmenu.js", function() { /* mmenu JavaScript */






						{CCMS_TPL:/_js/footer.html}
					});
				});
			};

			if(window.addEventListener){window.addEventListener("load",loadJSResources,false)}
			else if(window.attachEvent){window.attachEvent("onload",loadJSResources)}
			else{window.onload=loadJSResources}
		</script>
	</body>
</html>
