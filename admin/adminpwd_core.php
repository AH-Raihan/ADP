<?php 
 if (!isset($_COOKIE["PHPADLGADP"])) {
    header("location:login.php");
}
$oldpwd =md5(sha1($_REQUEST["oldpwd"]));
$newpwd =md5(sha1($_REQUEST["newpwd"]));
$cnewpwd =md5(sha1($_REQUEST["cnewpwd"]));

if(isset($_POST["oldpwd"]) && ($newpwd===$cnewpwd)){
    require_once("../config.php");
$auth= $_COOKIE["PHPADLGADP"];

$mathQuery="SELECT * FROM admin WHERE admin_auth='$auth' AND password='$oldpwd'";
    $runQuery=mysqli_query($conn,$mathQuery);
    $checkCount=mysqli_num_rows($runQuery);
    if ($runQuery==true) {
        if ($checkCount===1) {
            
            $updatepwd="UPDATE admin SET password='$newpwd' WHERE admin_auth='$auth'";
            $qupdate=mysqli_query($conn,$updatepwd);
            if ($qupdate==true) {
                header("location:changepassword.php?action=Password changed!");
            } else {
                header("location:changepassword.php?action=Not changed!");
            }
            
        } else {
           header("location:changepassword.php?action=Wrong Password!");
        }
    }
    

}else{
     header("location:changepassword.php?action=Password Not Mathching!");
}
?>