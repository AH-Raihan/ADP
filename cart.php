<?php
if (!isset($_COOKIE["PHPLGADP"])) {
    header("location:signin");
}
require_once("header.php");
require_once("config.php");  ?>
<div class="loader" id="loader" style="position: fixed;top:50%;left:50%;z-index:1111;transform:translate(-50%,-50%);font-size:50px; display:none;">
    <i class="fas fa-cog fa-spin"></i>
</div>
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
                                                    global $cartcount;
                                                }
                                                
                                                if ($cartcount == "0") {
                                                    echo "0";
                                                } else {
                                                    echo "<span>" . $cartcount . "</span>";
                                                }
                                            } ?> Item)</th>
                            <th style="text-align: right;">Total: <span id="totaltop">
                                    <?php
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
                            global $cart_id;

                            $selectcartBook = "SELECT * FROM books WHERE book_id='$book_id'";
                            $bookcartQuery = mysqli_query($conn, $selectcartBook);

                            while ($cartbook = mysqli_fetch_array($bookcartQuery)) {  ?>
                                <tr>
                                    <td><img width="80px" src="images/<?php echo $cartbook["book_img"]; ?>" alt="Book Image" title=""></td>
                                    <td><span class="producttitle"><?php echo $cartbook["book_name"]; ?></span><br><span class="productwriter"><?php echo $cartbook["book_writer"]; ?></span></td>
                                    <td class="productprice"><span id="totalPrice" class="totalPrice"><?php echo $cartinfo["total_taka"]; ?></span> <input class="productquantity" type="number" data-cartId="<?php echo $cartinfo['cart_id']; ?>" data-price="<?php echo $cartinfo['price']; ?>" id="quantity" value="<?php echo $quantity; ?>" min="1" max="10" maxlength="2" required></td>
                                    <td><button class="deletecart deleteCartID close" onclick="return confirm('Are you Sure?');" data-deleteCartID="<?php echo $cartinfo['cart_id']; ?>">&times;</button> </td>
                                    <td><input id="check" class="checkProducts" type="checkbox" checked id="totalTakaSubmit" value="<?php echo $cartinfo["total_taka"]; ?>" name="price[]"></td>
                                    <input type="hidden" name="<?php echo "orderCart" . $cart_id; ?>" value="<?php echo $cartbook["book_name"]; ?>">

                                </tr>
                    <?php   }
                        }
                    } ?>
                </table>
            </div>
            <div class="col-sm-4">
                <div class="carttotaldetils">
                    <h4>Checkout Summary</h4>
                    <table class="table">
                        <tr>
                            <td>Subtotal</td>
                            <td style="text-align: right"><input type="hidden" name="Subtotal" id="Subtotal" value="<?php echo $totalpriceslide; ?>"> <span id="SubtotalInner"><?php echo $totalpriceslide; ?></span> Tk.</td>
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
                            <td style="text-align: right"><input type="hidden" id="Total" name="Total" value="<?php echo $totalpriceslide; ?>"> <span id="TotalInner"><?php echo $totalpriceslide; ?></span> Tk.</td>
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
                    <button type="submit" id="submit" class="btn bg-adp" style="width: 100%;">Check Out</button>

                </div>
            </div>

        </div>
    </div>
</form>


<div class="clearboth"></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.getElementById('mySidenav').remove();
    document.getElementById('cart').remove();
    var loader=document.getElementById("loader");

    var productquantity=document.getElementsByClassName("productquantity");
    var totalPrice=document.getElementsByClassName("totalPrice");
    var checkProducts=document.getElementsByClassName("checkProducts");
    var check=document.getElementsByClassName("check");

    var Subtotal=document.getElementById("Subtotal");
    var Total=document.getElementById("Total");
    var totaltop=document.getElementById("totaltop");
    var SubtotalInner=document.getElementById("SubtotalInner");
    var TotalInner=document.getElementById("TotalInner");
    var totalTakaSubmit=document.getElementById("totalTakaSubmit");
    
    

    for(let i=0;i< productquantity.length;i++){
        productquantity[i].addEventListener('input',function quant() {
            loader.style.display="block";

            var quantity=this.value;
            var price=this.getAttribute('data-price');
            var cartId=this.getAttribute('data-cartId');


        $.post("quantity.php", {
                cartId: cartId,
                quantity: quantity,
                price: price

            },
            function(data, status) {
               totalPrice[i].innerHTML=quantity*price;
                //location.reload();
                totalPriceV=0;
                for(let u=0;u <totalPrice.length;u++){
                    //alert(totalPrice[u].innerHTML) ;
                    if(checkProducts[u].checked){
                    totalPriceV += parseInt(totalPrice[u].innerHTML) ;
                    }
                   
                }
                Subtotal.value= totalPriceV ;
                SubtotalInner.innerHTML = totalPriceV ;
                Total.value = totalPriceV ;
                TotalInner.innerHTML = totalPriceV ;
                totaltop.innerHTML = totalPriceV ;

                loader.style.display="none";

        });

    });
    }
    
    for(let x=0; x< totalPrice.length;x++){
        checkProducts[x].addEventListener('click',function(){
            var prices=productquantity[x].getAttribute('data-price');

                totalPriceV=0;
                for(let y=0;y <totalPrice.length;y++){
                    //alert(totalPrice[u].innerHTML) ;
                    if(checkProducts[y].checked){
                    totalPriceV += parseInt(totalPrice[y].innerHTML) ;
                    }
                   
                }
                Subtotal.value= totalPriceV ;
                SubtotalInner.innerHTML = totalPriceV ;
                Total.value = totalPriceV ;
                TotalInner.innerHTML = totalPriceV ;
                totaltop.innerHTML = totalPriceV ;
                totalTakaSubmit.value = totalPriceV ;
        })
    }

    $('#submit').click(function() {
        checked = $("input[type=checkbox]:checked").length;

        if (!checked) {
            alert("You must check at least one product.");
            return false;
        }

    });
</script>
<?php require_once("footer.php"); ?>