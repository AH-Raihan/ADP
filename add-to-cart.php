<?php
$host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"] ;

if (isset($_REQUEST['addCartBookID']) && isset($_REQUEST['user_id'])) {

    require_once("config.php");
    $user_id = $_REQUEST['user_id'];



    if (!isset($_COOKIE["PHPLGADP"])) {
        //header("location:signin");
        echo "Sign In Please";
    } else {

        $book_id = $_REQUEST["addCartBookID"];


        $bookSelect = "SELECT * FROM books WHERE book_id='$book_id'";
        $bookSelectQuery = mysqli_query($conn, $bookSelect);
        while ($bookdata = mysqli_fetch_array($bookSelectQuery)) {
            $bookdataName = $bookdata["book_name"];
            $bookdataPrice = $bookdata["book_price"];
            $bookdataSalepricep = $bookdata["book_sale_price"];
            global $bookdataSalepricep;

            if ($bookdataSalepricep < 0) {
                $bookdataSaleprice = $bookdataSalepricep;
            } else {
                $bookdataSaleprice = $bookdataPrice;
            }



            $cartSelect = "SELECT * FROM cart WHERE book_id='$book_id'  AND user_id='$user_id'";
            $cartSelectQ = mysqli_query($conn, $cartSelect);
            $cartSelectcount = mysqli_num_rows($cartSelectQ);


            while ($cartData = mysqli_fetch_array($cartSelectQ)) {
                $quantity = $cartData["quantity"];
                $total_taka = $cartData["total_taka"];
                $price = $cartData["price"];
                global $book_id, $bookdataName, $bookdataSaleprice, $total_taka;
            }
            if ($cartSelectcount === 1) {
                $quantity += 1;
                $total_price = (int)$price * $quantity;

                $update = "UPDATE cart SET quantity='$quantity', total_taka='$total_price' WHERE book_id='$book_id'";
                $updateQ = mysqli_query($conn, $update);
            } else {
                $insertCart = "INSERT INTO cart (book_id,book_name,user_id,price,total_taka) VALUES('$book_id','$bookdataName','$user_id','$bookdataSaleprice','$bookdataSaleprice')";
                $cartInsertQuery = mysqli_query($conn, $insertCart);
            }
        }
    }


?>
    <span id="closecartslide" onclick="closeNav()">&times;</span>
    <h4 class="shopii">Shopping Cart :</h4>


    <?php
    $totalpriceslide = 0;
    $cartQuery = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
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
                    <img loading="lazy" src="<?php echo $host; ?>/images/<?php echo $cartbook["book_img"]; ?>" alt="cart image">
                </div>
                <div class="cartslidedetails">
                    <h3 class="cartSlide-book-title"><?php echo $cartbook["book_name"]; ?></h3>
                    <h4 class="cartSlide-book-writer"><?php echo $cartbook["book_writer"]; ?></h4>
                    <span class="cartSlide-book-present-price">TK. <span id="cartSlidePrice"><?php echo $totalTakaa; ?></span></span>
                    <button data-deleteCartID="<?php echo $cartinfo['cart_id']; ?>" class="deleteCartID text-danger close">&times;</button>
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
    <a href="<?php echo $host; ?>/cart" class="viewcartbtn btn bg-adp"><i class="fa fa-shopping-cart"></i> View Cart</a>

    </div>
    <div class="alertCon" id="alertCon">
        <div class="alertNotice" id="alertNotice">This Product Added To cart!</div>
    </div>

<?php }
?>