<?php 
require_once("../config.php");
$orderid=$_REQUEST["orderid"];
$status=$_REQUEST["status"];

$update="UPDATE orders SET order_status='$status' WHERE order_id='$orderid'";
$upadteQuery=mysqli_query($conn,$update);

if($upadteQuery==true){
  header("location:orders.php?updated");
}else{
    header("location:orders.php?notupdated");
}

?>