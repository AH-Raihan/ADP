<?php
require_once("config.php"); 
$name=$_REQUEST["name"];
$birtday=$_REQUEST["birtday"];
$gender=$_REQUEST["gender"];
$mobile=$_REQUEST["mobile"];
$email=$_REQUEST["email"];

$authToken = $_COOKIE["PHPLGADP"];
$selectUsr = "SELECT * FROM users WHERE usrauthToken='$authToken'";
$runselectUsr = mysqli_query($conn, $selectUsr);
while ($data = mysqli_fetch_array($runselectUsr)) {
    $user_id = $data["user_id"];
}
    
$update="UPDATE users SET full_name='$name', birthday='$birtday', gender='$gender', mobile='$mobile', email_addr='$email' WHERE user_id='$user_id'";
$updateQuery=mysqli_query($conn,$update);

if ($updateQuery==true) {
    header("location:user.php?changed");
} else {
    header("location:user.php?notChanged");
}

?>