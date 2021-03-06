<?php require_once("topFooter.php"); ?>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="<?php echo $host?>/js/aos.js"></script>
<script src="<?php echo $host?>/js/fontawesome.js"></script>
<script src="<?php echo $host?>/js/jquery.js"></script>
<script src="<?php echo $host?>/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>


<script type="text/javascript">
    jssor_1_slider_init();

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
<script>
    AOS.init({
        offset: 100, // offset (in px) from the original trigger point
        delay: 10, // values from 0 to 3000, with step 50ms
        duration: 1000, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: false, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
    });
</script>
	
</script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "3603cb71-347d-41f2-9e27-f2378e1fce39",
    });
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var mySidenav = document.getElementById("mySidenav");
    var userID = document.getElementById("userID").value;

    function openNav() {
        mySidenav.style.width = "300px";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        mySidenav.style.width = "0";
    }

    // ajax Requst=============================
    var cart = document.getElementById("cart");
    var body = document.querySelector("body");
    var alertBox = document.querySelector("#alertBox");
    //add to cart
    var addToCartBtn = document.getElementsByClassName("addToCartBtn");
    var deleteCartID = document.getElementsByClassName("deleteCartID");

    for (let btnl = 0; btnl < addToCartBtn.length; btnl++) {
        addToCartBtn[btnl].addEventListener('click', function() {
            var addCartBookIDdd = addToCartBtn[btnl].getAttribute("data-bookId");

            <?php if (isset($_COOKIE['PHPLGADP'])) { ?>
                $.post("<?php echo $host; ?>/add-to-cart.php", {
                    addCartBookID: addCartBookIDdd,
                    user_id: userID
                }, function(returnDataATC) {
                    mySidenav.innerHTML = returnDataATC;

                    var totalpriceslide = document.getElementById("totalpriceslide").value;
                    $.post("<?php echo $host; ?>/carticon.php", {
                        user_id: userID,
                        totalpriceslide: totalpriceslide
                    }, function(carticondataa) {
                        cart.innerHTML = carticondataa;
                        alertCon = document.getElementById("alertCon");
                        alertCon.style.transform = "translate(-50%,-1%)";
                        setTimeout(function() {
                            alertCon.style.transform = "translate(-50%,-160%)";
                            alertCon.remove();
                        }, 2500);
                    });
                });
            <?php } else { ?>
                window.location.assign('<?php echo $host; ?>/signin');
            <?php } ?>
        });
    }

    // delete to cart
    for (let btnld = 0; btnld < deleteCartID.length; btnld++) {
        deleteCartID[btnld].addEventListener('click', function() {
            var deleteCartIDd = deleteCartID[btnld].getAttribute("data-deleteCartID");


            $.post("deletecart.php", {
                deleteCartID: deleteCartIDd,
                user_id: userID
            }, function(returnDataDTC) {
                if (mySidenav == true) {
                    mySidenav.innerHTML = returnDataDTC;
                    //document.getElementsByClassName('deleteCartID')[btnld].remove();
                }


                var totalpriceslide = document.getElementById("totalpriceslide").value;
                $.post("<?php echo $host; ?>/carticon.php", {
                    user_id: userID,
                    totalpriceslide: totalpriceslide
                }, function(carticondatad) {
                    cart.innerHTML = carticondatad;
                });

                alertCon = document.getElementById("alertCon");
                alertCon.style.transform = "translate(-50%,-1%)";
                setTimeout(function() {
                    alertCon.style.transform = "translate(-50%,-160%)";
                    alertCon.remove();
                }, 2500);
                var addCartBookIDdd = addToCartBtn[btnl].getAttribute("data-bookId");
            });
            window.location.reload();
        });
    }



// service worker


    
    // Ensure that the browser supports the service worker API
if (navigator.serviceWorker) {
// Start registration process on every page load
window.addEventListener('load', () => {
	navigator.serviceWorker
		// The register function takes as argument
		// the file path to the worker's file
		.register('/serviceWorker.js')
		// Gives us registration object
		.then(reg => console.log('Service Worker Registered'))
		.catch(swErr => console.log(
				`Service Worker Installation Error: ${swErr}}`));
	});
}

    



</body>

</html>
