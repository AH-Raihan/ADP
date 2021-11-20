<?php 

require_once("config.php");

if(isset($_REQUEST["quantity"])){


$cartId=$_REQUEST["cartId"];
$quantity=$_REQUEST["quantity"];
$price=$_REQUEST["price"]*$quantity;

$update="UPDATE cart SET quantity='$quantity', total_taka='$price' WHERE cart_id='$cartId'";
$updateQ=mysqli_query($conn,$update);

if($updateQ==true){
 
}
}else{
    header("location:/cart");
}
?>