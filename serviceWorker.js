var myCache = 'cacheName';
var cacheAssets =[
    '.',
    'offline.html',
    'css/index.min.css',
    'css/bootstrap.min.css',
    'css/responsive.min.css',
    'css/products-details.css',
    'css/aos.css',
    'css/other.css',
    'images/disharilogo.png',
    'images/banner@2x-1-scaled.png',
    'images/banner3.jpg',
    'images/banner2.jpg',
    'images/banner1.jpg',
    'images/banner-1500x850-1.png',
    'images/banner-1500x850-3.png',
    'images/logo.png',
    'images/payment.png',
    'images/bkash.jpg',
    'images/rocket.jpg'
];




// Call install Event
self.addEventListener('install', e => {
    // Wait until promise is finished 
    e.waitUntil(
        caches.open(cacheName)
        .then(cache => {
            console.log(`Service Worker: Caching Files: ${cache}`);
            cache.addAll(cacheAssets)
                // When everything is set
                .then(() => self.skipWaiting())
        })
    );
})


// Call Activate Event
self.addEventListener('activate', e => {
	console.log('Service Worker: Activated');
	// Clean up old caches by looping through all of the
	// caches and deleting any old caches or caches that
	// are not defined in the list
	e.waitUntil(
		caches.keys().then(cacheNames => {
			return Promise.all(
				cacheNames.map(
					cache => {
						if (cache !== cacheName) {
							console.log('Service Worker: Clearing Old Cache');
							return caches.delete(cache);
						}
					}
				)
			)
		})
	);
})


// Call Fetch Event
self.addEventListener('fetch', e => {
	console.log('Service Worker: Fetching');
	e.respondWith(
		fetch(e.request)
		.then(res => {
			// The response is a stream and in order the browser
			// to consume the response and in the same time the
			// cache consuming the response it needs to be
			// cloned in order to have two streams.
			const resClone = res.clone();
			// Open cache
			caches.open(cacheName)
				.then(cache => {
					// Add response to cache
					cache.put(e.request, resClone);
				});
			return res;
		}).catch(
			err => caches.match(e.request)
			.then(res => res)
		)
	);
});


self.addEventListener('push', function (event) {
    event.waitUntil(
        self.registration.showNotification('I am Webdeveloper', {
            body: 'My name is Azizul Hasan Raihan'
        })
    );
});
