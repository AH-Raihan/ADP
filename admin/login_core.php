<?php 
 if (!isset($_COOKIE["PHPADLGADP"])) {
    header("location:login.php");
}
require_once("../config.php");
if (isset($_REQUEST["emailaddr"]) && isset($_REQUEST["pwd"])){
    $emailaddr=$_REQUEST["emailaddr"];
    $pwd=md5(sha1($_REQUEST["pwd"]));

    $mathQuery="SELECT * FROM admin WHERE username='$emailaddr' AND password='$pwd'";
    $runQuery=mysqli_query($conn,$mathQuery);
    $checkCount=mysqli_num_rows($runQuery);
    if ($runQuery==true) {
        if ($checkCount===1) {
            while($data = mysqli_fetch_array($runQuery)){
             $authToken=$data["admin_auth"];
            }
            setcookie("PHPADLGADP",$authToken,time()+86400*360);
            header("location:index.php");
        } else {
            header("location:login.php?wrongUsrPwd");
        }
    }
    
   
    
}else{ 
    header("location:login.php");
}

?>