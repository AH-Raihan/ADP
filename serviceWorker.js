



const cacheName = 'ADP-cache';

// Cache all the files to make a PWA
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(cacheName).then(cache => {
      // Our application only has two files here index.html and manifest.json
      // but you can add more such as style.css as your app grows
      return cache.addAll([
 	    './',
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
      ]);
    })
  );
});

// Our service worker will intercept all fetch requests
// and check if we have cached the file
// if so it will serve the cached file
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.open(cacheName)
      .then(cache => cache.match(event.request, { ignoreSearch: true }))
      .then(response => {
        return response || fetch(event.request);
      })
  );
});




self.addEventListener('push', function (event) {
    event.waitUntil(
        self.registration.showNotification('I am Webdeveloper', {
            body: 'My name is Azizul Hasan Raihan'
        })
    );
});
