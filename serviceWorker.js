const cacheName = 'ADP-cache';

// Cache all the files to make a PWA
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(cacheName).then(cache => {
      // Our application only has two files here index.html and manifest.json
      // but you can add more such as style.css as your app grows
      return cache.addAll([
	     'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
	      'https://kit.fontawesome.com/743da73c93.js',
	    '/index.html',
	    'css/index.min.css',
	    'css/bootstrap.min.css',
	    'css/responsive.min.css',
	    'css/products-details.css',
	    'css/aos.css',
	    'css/other.css',
	      
	      '/js/jssor.slider-28.0.0.min.js',
	      'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
	      'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css',
	      'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js',
	      'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
	      'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
	      'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
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



self.addEventListener("fetch", event => {
    if (event.request.url ==="/") {
        // or whatever your app's URL is
        event.respondWith(
            fetch(event.request).catch(err =>
                self.cache.open(cacheName).then(cache => cache.match("/index.html"))
            )
        );
    } else {
        event.respondWith(
            fetch(event.request).catch(err =>
                caches.match(event.request).then(response => response)
            )
        );
    }
});

self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheName) {
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
