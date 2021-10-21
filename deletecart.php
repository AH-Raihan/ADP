<?php 

if(isset($_REQUEST['deleteCartID']) && isset($_REQUEST['user_id'])){
require_once("config.php");  
$cartdeleteid=$_REQUEST['deleteCartID'];
$userID=$_REQUEST['user_id'];
$deletecart="DELETE FROM cart WHERE cart_id='$cartdeleteid' AND user_id='$userID'";
    $deletequery=mysqli_query($conn,$deletecart);
    if($deletecart==true){
        ?>
        <span id="closecartslide" onclick="closeNav()">&times;</span>
    <h4 class="shopii">Shopping Cart :</h4>


    <?php
    $totalpriceslide = 0;
    $cartQuery = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$userID'");
    while ($cartinfo = mysqli_fetch_array($cartQuery)) {
        $book_ida = $cartinfo["book_id"];
        $quantitya = $cartinfo["quantity"];
        $totalTakaa = $cartinfo["total_taka"];
        $selectcartBook = "SELECT * FROM books WHERE book_id='$book_ida'";
        $bookcartQuery = mysqli_query($conn, $selectcartBook);
        while ($cartbook = mysqli_fetch_array($bookcartQuery)) {
            if ($bookcartQuery == true) {
                $totalpriceslide += $totalTakaa;
            } else {
                $totalpriceslide = 0;
            }
    ?>

            <div class="cartslideitems">
                <div class="cartSlideThumb">
                    <img loading="lazy" src="images/<?php echo $cartbook["book_img"]; ?>" alt="cart image">
                </div>
                <div class="cartslidedetails">
                    <h3 class="cartSlide-book-title"><?php echo $cartbook["book_name"]; ?></h3>
                    <h4 class="cartSlide-book-writer"><?php echo $cartbook["book_writer"]; ?></h4>
                    <span class="cartSlide-book-present-price">TK. <span id="cartSlidePrice"><?php echo $totalTakaa; ?></span></span>
                    <button class="deleteCartID" onclick="return confirm('Are you Sure?');" data-deleteCartID="<?php echo $cartinfo['cart_id']; ?>" class="closecartitem btn btn-danger">&times;</button>
                </div>
            </div>
    <?php    }
    }  ?>

    <div class="cartslisetoo">
    <input type="hidden" id="totalpriceslide" value="<?php echo  $totalpriceslide; ?>">
        <p class="cart-Slide-toatal">Total</p>
        <p class="cart-Slide-toatalf"><span id="cartSlideTotalPrice"><?php echo  $totalpriceslide; ?></span> Taka</p>
    </div>
    <div class="clearboth"></div>
    <!-- <a href="shipping.html" class="shippingcartbtn btn btn-dark">Proces to checkOut</a> -->
    <a href="cart" class="viewcartbtn btn bg-adp"><i class="fa fa-shopping-cart"></i> View Cart</a>

    </div>

        <div class="alertCon" id="alertCon">
        <div class="alertNotice" id="alertNotice">This Product Deleted To cart!</div>
    </div>

    <?php
    }
}
?>