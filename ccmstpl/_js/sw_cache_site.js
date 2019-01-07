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



const cacheName='v9';

// Default files to always cache
var cacheFiles = [
	'/ccmsusr/_js/jquery-3.3.1.min.js',
	'/ccmsusr/_js/jquery-validate-1.19.0.min.js',
	'/ccmsusr/_js/jquery-validate-additional-methods-1.19.0.min.js',
	'/ccmstpl/404.html',
	'/ccmstpl/offline.html'
]

self.addEventListener('install', e => {
	console.log('[ServiceWorker] Installed');
	// e.waitUntil Delays the event until the Promise is resolved
	// this portion of code is best used to store things like static resource files,
	// namely: jquery, css and 404 error templates.	Simply add them to the cacheFiles array above
	// and uncomment the e.waitUntil code below.
	e.waitUntil(
		// Open the cache
		caches.open(cacheName).then(cache => {
			// Add all the default files to the cache
			console.log('[ServiceWorker] Caching cacheFiles');
			return cache.addAll(cacheFiles);
		})
	); // end e.waitUntil
});

self.addEventListener('activate', e => {
	console.log('[ServiceWorker] Activated');
	e.waitUntil(
		// Get all the cache keys (cacheName)
		caches.keys().then(keyList => {
			return Promise.all(keyList.map(key => {
				// If a cached item is saved under a previous cacheName
				if (key !== cacheName) {
					// Delete that cached file
					console.log(`[ServiceWorker] Removing Cached Files from Cache: ${key}`);
					return caches.delete(key);
				}
			}));
		})
	); // end e.waitUntil
});

/*
self.addEventListener('fetch', e => {
	console.log(`[ServiceWorker] Fetching: ${e.request.url}`);
	// e.respondWidth Responds to the fetch event
	e.respondWith(
		// Check in cache for the request being made
		caches.match(e.request).then(response => {
			// If the request is in the cache
			if (response) {
				console.log(`[ServiceWorker] Found in Cache: ${e.request.url}, ${response}`);
				// Return the cached version
				return response;
			}
			// If the request is NOT in the cache, fetch and cache
			return fetch(e.request).then(response => {
				if (!response || response.status === 404) {
					console.log("[ServiceWorker] No response from fetch ")
					//return response;
					return caches.match('/ccmstpl/404.html');
				}
				// Open the cache
				caches.open(cacheName).then(cache => {
					// Put the fetched response in the cache
					cache.put(e.request, response);
					console.log(`[ServiceWorker] New Data Cached: ${e.request.url}`);
					// Return the response
					return response;
				}); // end caches.open
			}).catch(err => {
				console.log(`[ServiceWorker] Error Fetching & Caching New Data: ${err}`);
			});
		}) // end caches.match(e.request)
	); // end e.respondWith
});
*/
/*
self.addEventListener('fetch', e => {
	e.respondWith(
		// Try the cache
		caches.match(e.request).then(response => {
			if (response) {
				return response;
			}
			return fetch(e.request).then(response => {
				if (response.status === 404) {
					return caches.match('/ccmstpl/404.html');
				}
				return response
			});
		}).catch(function() {
			// If both fail, show a generic fallback:
			return caches.match('/ccmstpl/offline.html');
		})
	);
});
*/

// Send a request to the network and the cache.
// The cache will most likely respond first and, if the network data has not already been received, we update the page with the data in the response. When the network responds we update the page again with the latest information.
/*
var networkDataReceived = false;
var networkUpdate;
self.addEventListener('fetch', function(e) {
	startSpinner();
	e.respondWith(
		// fetch fresh data
		networkUpdate = fetch(e.request).then(function(response) {
			cache.put(e.request, response.clone());
			return response;
		}).then(function(data) {
			networkDataReceived = true;
			updatePage(data);
		})

		// fetch cached data
		caches.match(e.request).then(function(response) {
			if (!response) throw Error("No data");
			return response;
		}).then(function(data) {
			// don't overwrite newer network data
			if (!networkDataReceived) {
				updatePage(data);
			}
		}).catch(function() {
			// we didn't get cached data, the network is our last hope:
			return networkUpdate;
		}).catch(showErrorMessage).then(stopSpinner());
	);
});
*/
var networkDataReceived = false;

startSpinner();

// fetch fresh data
var networkUpdate = fetch('/data.json').then(function(response) {
  return response.json();
}).then(function(data) {
  networkDataReceived = true;
  updatePage(data);
});

// fetch cached data
caches.match('/data.json').then(function(response) {
  if (!response) throw Error("No data");
  return response.json();
}).then(function(data) {
  // don't overwrite newer network data
  if (!networkDataReceived) {
    updatePage(data);
  }
}).catch(function() {
  // we didn't get cached data, the network is our last hope:
  return networkUpdate;
}).catch(showErrorMessage).then(stopSpinner());
