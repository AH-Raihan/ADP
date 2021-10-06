<?php
if (!isset($_COOKIE["PHPLGADP"])) {
    header("location:signin");
}
require_once("header.php");
require_once("config.php");  ?>
<form action="check-out.php" method="post">
    <div class="cartcontainer bangla-font">
        <div class="safeArea row" style="background: #fff;">

            <div class="col-sm-8" style="overflow-x: auto;">
                <div class="totalhishab" style="background: white;width: 100%;height: 49px;margin: 10px auto;">
                    <table class="cartTable" style="background: white;">
                        <tr>
                            <th>My Cart (<?php if (isset($_COOKIE["PHPLGADP"])) {
                                                $authToken = $_COOKIE["PHPLGADP"];
                                                $selectUsr = "SELECT * FROM users WHERE usrauthToken='$authToken'";
                                                $runselectUsr = mysqli_query($conn, $selectUsr);

                                                while ($usriddata = mysqli_fetch_array($runselectUsr)) {
                                                    $user_id = $usriddata["user_id"];
                                                }
                                                global $user_id;
                                                $cartQuery = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
                                                while ($cartinfo = mysqli_fetch_array($cartQuery)) {
                                                    $cartcount = mysqli_num_rows($cartQuery);
                                                }
                                                global $cartcount;
                                                if ($cartcount == "0") {
                                                    echo "0";
                                                } else {
                                                    echo "<span>" . $cartcount . "</span>";
                                                }
                                            } ?> Item)</th>
                            <th style="text-align: right;">Total: <span id="totaltop"><?php
                                                                                        $totalpriceslide = 0;
                                                                                        global $user_id;
                                                                                        $cartQuery = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
                                                                                        if ($cartQuery == true) {
                                                                                            while ($cartinfo = mysqli_fetch_array($cartQuery)) {
                                                                                                $user_id = $cartinfo["user_id"];
                                                                                                $book_id = $cartinfo["book_id"];
                                                                                                $quantity = $cartinfo["quantity"];

                                                                                                if ($cartinfo == true) {
                                                                                                    $totalpriceslide += $cartinfo["total_taka"];
                                                                                                } else {
                                                                                                    $totalpriceslide = 0;
                                                                                                }

                                                                                                $selectcartBook = "SELECT * FROM books WHERE book_id='$book_id'";
                                                                                                $bookcartQuery = mysqli_query($conn, $selectcartBook);
                                                                                                while ($cartbookt = mysqli_fetch_array($bookcartQuery)) {
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        echo $totalpriceslide;
                                                                                        ?></span> Tk.</th>
                        </tr>
                    </table>
                </div>
                <table class="cartTable">
                    <?php
                    $authToken = $_COOKIE["PHPLGADP"];
                    $selectUsr = "SELECT * FROM users WHERE usrauthToken='$authToken'";
                    $runselectUsr = mysqli_query($conn, $selectUsr);
                    while ($data = mysqli_fetch_array($runselectUsr)) {
                        $user_id = $data["user_id"];
                    }
                    $selectcart = "SELECT * FROM cart WHERE user_id='" . $user_id . "'";
                    $cartQuery = mysqli_query($conn, $selectcart);

                    if ($cartQuery == true) {
                        while ($cartinfo = mysqli_fetch_array($cartQuery)) {
                            $book_id = $cartinfo["book_id"];
                            $cart_id = $cartinfo["cart_id"];
                            $quantity = $cartinfo["quantity"];

                            $selectcartBook = "SELECT * FROM books WHERE book_id='$book_id'";
                            $bookcartQuery = mysqli_query($conn, $selectcartBook);

                            while ($cartbook = mysqli_fetch_array($bookcartQuery)) {  ?>
                                <tr>
                                    <?php global $cart_id; ?>
                                    <td><img width="80px" src="images/<?php echo $cartbook["book_img"]; ?>" alt="Book Image" title=""></td>
                                    <td><span class="producttitle"><?php echo $cartbook["book_name"]; ?></span><br><span class="productwriter"><?php echo $cartbook["book_writer"]; ?></span></td>
                                    <td class="productprice"><span id="totalPrice"><?php echo $cartinfo["total_taka"]; ?></span> <input class="productquantity" type="number" oninput="quant(this.value,<?php echo $cart_id; ?>,<?php echo $cartinfo['price']; ?>);" id="quantity" value="<?php echo $quantity; ?>" min="1" max="10" maxlength="2" required></td>
                                    <td><button class="deletecart deleteCartID close" onclick="return confirm('Are you Sure?');" data-deleteCartID="<?php echo $cartinfo['cart_id']; ?>">&times;</button> </td>
                                    <td><input id="check" type="checkbox" value="<?php echo $cartinfo["total_taka"]; ?>" name="price[]"></td>
                                    <input type="hidden" name="<?php echo "orderCart" . $cart_id; ?>" value="<?php echo $cartbook["book_name"]; ?>">

                                </tr>
                    <?php   }
                        }
                    } ?>
                    <input type="hidden" name="" value="">
                </table>
            </div>
            <div class="col-sm-4">
                <div class="carttotaldetils">
                    <h4>Checkout Summary</h4>
                    <table class="table">
                        <tr>
                            <td>Subtotal</td>
                            <td style="text-align: right"><input type="hidden" name="Subtotal" id="Subtotal" value="<?php echo $totalpriceslide; ?>"> <?php echo $totalpriceslide; ?> Tk.</td>
                        </tr>
                        <!-- <tr>
                        <td>Gift Wrap</td>
                        <td style="text-align: right">20 Tk.</td>
                    </tr><tr>
                        <td>Shipping</td>
                        <td style="text-align: right"><input type="hidden" id="Shipping" name="Shipping" value="Free"> 50 Tk. Free</td>
                    </tr> -->

                        <tr>
                            <td>Total</td>
                            <td style="text-align: right"><input type="hidden" id="Total" name="Total" value="<?php echo $totalpriceslide; ?>"> <?php echo $totalpriceslide; ?> Tk.</td>
                        </tr>
                        <!-- <tr>
                        <td>Payable Total</td>
                        <td style="text-align: right"><?php // echo $totalpriceslide+50*1.9 ; 
                                                        ?> Tk.</td>
                    </tr> -->
                    </table>
                    <hr>
                    <!-- <label class="gifwrapcontainer">Gift Wrap for Tk. 20
                    <input type="checkbox" name="giftwrap" value="giftwrapchecked">
                    <span class="checkmark"></span>
                </label> -->
                    <button type="submit" class="btn bg-adp" style="width: 100%;">Check Out</button>

                </div>
            </div>

        </div>
    </div>
</form>


<div class="clearboth"></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function quant(quantity, cartId, price) {
        //var cartId=document.getElementById("cartId").value;


        $.post("quantity.php", {
                cartId: cartId,
                quantity: quantity,
                price: price

            },
            function(data, status) {
                location.reload();
            });

    };
    var deletecart = document.getElementsByClassName
</script>
<?php require_once("footer.php"); ?>
