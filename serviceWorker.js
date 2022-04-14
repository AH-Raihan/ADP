const cacheName = 'ADP-cache';

// Cache all the files to make a PWA
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(cacheName).then(cache => {
      // Our application only has two files here index.html and manifest.json
      // but you can add more such as style.css as your app grows
      return cache.addAll([
	    'index.html',
	    'css/index.min.css',
	    'css/bootstrap.min.css',
	    'css/responsive.min.css',
	    'css/products-details.css',
	    'css/aos.css',
	    'css/other.css',
	    'js/fontawesome.js',
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



self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.open(cacheName).then(function(cache) {
      return cache.match(event.request).then(function (response) {
        return response || fetch(event.request).then(function(response) {
          cache.put(event.request, response.clone());
          return response;
        });
      });
    })
  );
});

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


self.addEventListener('push', function (event) {
    event.waitUntil(
        self.registration.showNotification('I am Web developer', {
            body: 'My name is Azizul Hasan Raihan'
        })
    );
});
