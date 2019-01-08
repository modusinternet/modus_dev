<?
header("Content-Type: application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>{
	"short_name": "Modus",
	"name": "Modus Internet",
	"icons": [
		{
			"src": "/ccmstpl/_img/ico/android-chrome-192x192.png",
			"sizes": "192x192",
			"type": "image/png"
		},
		{
			"src": "/ccmstpl/_img/ico/android-chrome-512x512.png",
			"sizes": "512x512",
			"type": "image/png"
		}
	],
	"start_url": "/{CCMS_LIB:_default.php;FUNC:ccms_lng}/",
	"theme_color": "#ffffff",
	"background_color": "#ffffff",
	"display": "standalone",
	"scope": "/"
}
