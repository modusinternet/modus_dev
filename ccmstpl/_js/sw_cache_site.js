/*
const cacheName='v1';

// Call Install Event
self.addEventListener('install', e => {
	console.log('Service Worker: Installed');
});

// Call Activate Event
self.addEventListener('activate', e => {
	console.log('Service Worker: Activated');
	// clear old cache
	e.waitUntil(
		caches.keys().then(cacheNames => {
			return Promise.all(
				cacheNames.map(cache => {
					if(cache !== cacheName) {
						console.log('Service Worker: Clearing Old Cache');
						return caches.delete(cache);
					}
				})
			);
		})
	);
});

// Call Fetch Event
self.addEventListener('fetch', e => {
	console.log('Service Worker: Fetching');
	e.respondWith(
		fetch(e.request).then(res => {
			// Make clone of response
			const resClone = res.clone();
			// Open cahce
			caches.open(cacheName).then(cache => {
				// Add response to cache
				cache.put(e.request, resClone);
			});
			return res;
		}).catch(err => caches.match(e.request).then(res => res))
	);
});
*/








// 1) how to make sure new versions of this file are downloaded?
// 2) What is the expire time for a service worker?
// 3) Why do console.log comments not always appear, are certian functions just not run?
// 4) What is the best way to include responces or errors in console.logs?
// 5) Is filter() depricated and is map() a better function?



const cacheName='v4';
/*
self.addEventListener('install', e => {
	console.log('Service Worker: Installed');
});
*/
/*
self.addEventListener('install', function(event) {
	event.waitUntil(
		caches.open(cacheName).then(function(cache) {
			return cache.addAll(
				[
					'/ccmstpl/_css/style-ltr-min.css',
					'/ccmsusr/_js/jquery-3.3.1.min.js',
					'/ccmsusr/_js/jquery-validate-1.19.0.min.js',
					'/ccmsusr/_js/jquery-validate-additional-methods-1.19.0.min.js',
					'/ccmstpl/_js/main.js'
				]
			);
		})
	);
});
*/
// Default files to always cache
var cacheFiles = [
	'/ccmstpl/_css/style-ltr-min.css',
	'/ccmsusr/_js/jquery-3.3.1.min.js',
	'/ccmsusr/_js/jquery-validate-1.19.0.min.js',
	'/ccmsusr/_js/jquery-validate-additional-methods-1.19.0.min.js',
	'/ccmstpl/_js/main.js'
]
self.addEventListener('install', e => {
	console.log('[ServiceWorker] Installed');
	// e.waitUntil Delays the event until the Promise is resolved
	e.waitUntil(
		// Open the cache
		caches.open(cacheName).then(cache => {
			// Add all the default files to the cache
			console.log('[ServiceWorker] Caching cacheFiles');
			return cache.addAll(cacheFiles);
		})
	); // end e.waitUntil
});

/*
self.addEventListener('activate', e => {
	console.log('Service Worker: Activated');
	// clear old cache
	e.waitUntil(
		caches.keys().then(cacheNames => {
			return Promise.all(
				cacheNames.map(cache => {
					if(cache !== cacheName) {
						console.log('Service Worker: Clearing Old Cache');
						return caches.delete(cache);
					}
				})
			);
		})
	);
});
*/
/*
self.addEventListener('activate', function(event) {
	event.waitUntil(
		caches.keys().then(function(cacheNames) {
			return Promise.all(cacheNames.filter(function(cacheName) {
					// Return true if you want to remove this cache,
					// but remember that caches are shared across
					// the whole origin
				}).map(function(cacheName) {
					return caches.delete(cacheName);
				})
			);
		})
	);
});
*/
self.addEventListener('activate', e => {
	console.log('[ServiceWorker] Activated');
	e.waitUntil(
		// Get all the cache keys (cacheName)
		caches.keys().then(cacheNames => {
			return Promise.all(cacheNames.map(thisCacheName => {
				// If a cached item is saved under a previous cacheName
				if (thisCacheName !== cacheName) {
					// Delete that cached file
					console.log(`[ServiceWorker] Removing Cached Files from Cache: ${thisCacheName}`);
					return caches.delete(thisCacheName);
				}
			}));
		})
	); // end e.waitUntil
});


/*
self.addEventListener('fetch', e => {
	console.log('Service Worker: Fetching');
	e.respondWith(
		fetch(e.request).then(res => {
			// Make clone of response
			const resClone = res.clone();
			// Open cahce
			caches.open(cacheName).then(cache => {
				// Add response to cache
				cache.put(e.request, resClone);
			});
			return res;
		}).catch(err => caches.match(e.request).then(res => res))
	);
});
*/
/*
self.addEventListener('fetch', function(event) {
	event.respondWith(
		caches.open(cacheName).then(function(cache) {
			return fetch(event.request).then(function(response) {
				cache.put(event.request, response.clone());
				return response;
			});
		})
	);
});
*/
/*
self.addEventListener('fetch', function(e) {
	console.log('[ServiceWorker] Fetch', e.request.url);
	// e.respondWidth Responds to the fetch event
	e.respondWith(
		// Check in cache for the request being made
		caches.match(e.request).then(function(response) {
			// If the request is in the cache
			if (response) {
				console.log("[ServiceWorker] Found in Cache", e.request.url, response);
				// Return the cached version
				return response;
			}
			// If the request is NOT in the cache, fetch and cache
			var requestClone = e.request.clone();
			return fetch(requestClone).then(function(response) {
				if ( !response ) {
					console.log("[ServiceWorker] No response from fetch ")
					return response;
				}
				var responseClone = response.clone();
				// Open the cache
				caches.open(cacheName).then(function(cache) {
					// Put the fetched response in the cache
					cache.put(e.request, responseClone);
					console.log('[ServiceWorker] New Data Cached', e.request.url);
					// Return the response
					return response;
				}); // end caches.open
			}).catch(function(err) {
				console.log('[ServiceWorker] Error Fetching & Caching New Data', err);
			});
		}) // end caches.match(e.request)
	); // end e.respondWith
});
*/
self.addEventListener('fetch', e => {
	//console.log('[ServiceWorker] Fetch', e.request.url);
	console.log(`[ServiceWorker] Fetch: ${e.request.url}`);
	// e.respondWidth Responds to the fetch event
	e.respondWith(
		// Check in cache for the request being made
		caches.match(e.request).then(response => {
			// If the request is in the cache
			if (response) {
				//console.log("[ServiceWorker] Found in Cache", e.request.url, response);
				console.log(`[ServiceWorker] Found in Cache: ${e.request.url}, ${response}`);
				// Return the cached version
				return response;
			}
			// If the request is NOT in the cache, fetch and cache
			var requestClone = e.request.clone();
			//return fetch(requestClone).then(response => {
			return fetch(e.request).then(response => {
				if ( !response ) {
					console.log("[ServiceWorker] No response from fetch ")
					return response;
				}
				var responseClone = response.clone();
				// Open the cache
				caches.open(cacheName).then(cache => {
					// Put the fetched response in the cache
					cache.put(e.request, responseClone);
					console.log('[ServiceWorker] New Data Cached', e.request.url);
					// Return the response
					return response;
				}); // end caches.open
			}).catch(err => {
				console.log('[ServiceWorker] Error Fetching & Caching New Data', err);
			});
		}) // end caches.match(e.request)
	); // end e.respondWith
});
