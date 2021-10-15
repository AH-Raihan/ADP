<?php require_once("config.php");
if(isset($_REQUEST["otp"])){
    $otp=$_REQUEST["otp"];
    $authToken=$_REQUEST["auth"];
    $mathQuery="SELECT * FROM users WHERE otp='$otp' AND usrauthToken='$authToken'";
    $runSelectQuery=mysqli_query($conn,$mathQuery);
    $checkCount=mysqli_num_rows($runSelectQuery);
    
    if ($checkCount===1) {
        setcookie("PHPLGADP",$authToken,time()+86400*360);
        header("location:index.php");
    }else{
        header("location:otp.php?auth=$authToken&wrongOtp");
    }
}
