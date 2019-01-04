/* Make sure sw are supported */
if(navigator.serviceWorker){
	/* You could use a function call like function() but we us ES6 arrow functions below to reduce syntax, () => {} */
	window.addEventListener('load', () => {
		navigator.serviceWorker
		.register('/ccmstpl/_js/sw_cached_site.js')
		.then(reg => console.log('Service Worker: Registered (Site)'))
		.catch(err => console.log(`Service Worker: Error: ${err}`));
	});
} else {
		console.log('Service Worker not supported.');
}
