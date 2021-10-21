<?php
if(isset($_REQUEST["user_id"]) && isset($_REQUEST["totalpriceslide"])){
?>
<div class="cart"><img loading="lazy" src="images/carticon.png" width="40px" alt="" id="cartslideshow" onclick="openNav()">
<?php 
require_once("config.php");
$user_id=$_REQUEST["user_id"];
$totalpriceslide=$_REQUEST["totalpriceslide"];
$cartQuery = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$user_id'");
while ($cartinfo = mysqli_fetch_array($cartQuery)) {
    $cartcount = mysqli_num_rows($cartQuery);
    if ($cartcount == "0") {
        echo "0";
    } else {
        echo "<span>" . $cartcount . "</span>";
    }
}

?> </div>
<div class="totalamount"><span class="totalamounttext">Total</span><span class="totalamountvalue">৳
                            <?php echo  $totalpriceslide; ?></span></div>
<?php
}
?>
