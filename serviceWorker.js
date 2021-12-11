var myCache = 'static-cache';
var cacheUrls =[
    '.',
    'index.php',
    'css/index.min.css',
    'css/bootstrap.min.css',
    'css/responsive.min.css',
    'css/products-details.css',
    'css/aos.css',
    'css/other.css',
    'js/aos.js',
    'js/jssor.slider-28.0.0.min.js',
    'js/jquery.js',
    'js/custom.js',
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

self.addEventListener('install',function(event){
    event.waitUntil(
        caches.open(myCache)
        .then(function(cache){
            return cache.addAll(cacheUrls);
        })
    );
});

self.addEventListener('fetch',function(event){
    event.respondWith(
        caches.match(event.request)
        .then(function(resonse){
            return resonse || fetch.event.request;
        })
    )
});




self.addEventListener('activate', function (event) {
    // some
});


self.addEventListener('sync', function (event) {
    if (event.tag === 'foo') {
        //    event.waitUntil(doSomething());
    }
});

self.addEventListener('push', function (event) {
    event.waitUntil(
        self.registration.showNotification('I am Webdeveloper', {
            body: 'My name is Azizul Hasan Raihan'
        })
    );
});