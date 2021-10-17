<?php
if (!isset($_COOKIE["PHPLGADP"])) {
    header("location:/");
}
require_once("config.php");

$authToken = $_COOKIE["PHPLGADP"];
$selectUsr = "SELECT * FROM users WHERE usrauthToken='$authToken'";
$runselectUsr = mysqli_query($conn, $selectUsr);
while ($data = mysqli_fetch_array($runselectUsr)) {
    $user_id = $data["user_id"];
}

$orderCartDelete =$_REQUEST["orderCartDelete"];
$addr =$_REQUEST["addr"];
$mobile =$_REQUEST["MobileNumber"];
$transport =$_REQUEST["transport"];
$region =$_REQUEST["Region"];
$city =$_REQUEST["City"];
$area =$_REQUEST["Area"];

$paymentMethod =$_REQUEST["paymentMethod"];
$bkashNumber=$_REQUEST["bkashNumber"];
$trx =$_REQUEST["trxid"];

$insertAddr="UPDATE users SET addr1='$addr', mobile='$mobile' ,transport='$transport' , Region='$region' , City='$city' , Area='$area'  WHERE user_id='$user_id'";
$insertAddrQuery=mysqli_query($conn,$insertAddr);
 
if ($insertAddrQuery==true) {
   

$selectCart = "SELECT * FROM cart WHERE user_id='$user_id' AND cart_id IN($orderCartDelete)";
$selectCartQuery = mysqli_query($conn, $selectCart);
while ($carts = mysqli_fetch_array($selectCartQuery)) {
    echo $cart_id = $carts["cart_id"] ."<br>";
    global $user_id;
    $book_id = $carts["book_id"];
    $quantity = $carts["quantity"];
    $total_taka = $carts["total_taka"];
    $book_name = $carts["book_name"];
    $orderid=rand(100000000000,999999999999);
    $patableTotal=$_REQUEST["patableTotal"];

    $order = "INSERT INTO orders(order_id,user_id,book_id,transport,quantity,book_name,total_price,patableTotal,paymentMethod,bkashNumber,trx) VAlUES('$orderid','$user_id','$book_id','$transport','$quantity','$book_name','$total_taka','$patableTotal','$paymentMethod','$bkashNumber','$trx')";
    $orderQuery = mysqli_query($conn, $order);

}
if ($selectCartQuery == true) {
    echo $orderCartDelete;
    $deleteCart = "DELETE FROM cart WHERE cart_id IN($orderCartDelete)";
    $deleteCartQuery = mysqli_query($conn, $deleteCart);
} else {
    header("location:/?error");
}
} else {
    header("location:/?");
}
