<?php
if(isset($_REQUEST["nextUrl"]) && isset($_REQUEST["stars"]) && isset($_REQUEST["message"]) && isset($_REQUEST["bookId"]) && isset($_REQUEST["userId"])){
    require_once("config.php");
   $nextUrl =$_REQUEST["nextUrl"];
$stars =$_REQUEST["stars"];
$message =$_REQUEST["message"];
$bookId =$_REQUEST["bookId"];
$userId  =$_REQUEST["userId"];  

$insertQuery="INSERT INTO reviews (book_id,user_id,stars,message) VALUES('$bookId','$userId','$stars','$message')";
$query=mysqli_query($conn,$insertQuery);

if($query==true){
    header("location: product-details.php?$nextUrl");
}else{
    header("location:/adp");
}

}

?>