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

const cacheName='v10';

self.addEventListener('install', e => {
	console.log('Service Worker: Installed');
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
self.addEventListener('activate', function(event) {
	event.waitUntil(
		caches.keys().then(function(cacheNames) {
			return Promise.all(
				cacheNames.filter(function(cacheName) {
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
