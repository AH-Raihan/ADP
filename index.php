<?php   $router=$_SERVER['REQUEST_URI'];
$sentex='/(\/\?)/';
$sentexProduct='/\/book\/([^\/]+)/';

if      ($router=='/')         { include("home.php"); }
elseif ($router=='/index.php') { include("home.php"); }
elseif ($router=='/cart')      { loginRedirect('cart.php'); }
elseif ($router=='/home')      { include("home.php"); }
elseif ($router=='/news')      { include("news.php"); }
elseif ($router=='/recipt')    { include("recipt.php"); }
elseif ($router=='/books')     { include("books.php"); }
elseif ($router=='/contact')   { include("contact.php"); }
elseif ($router=='/terms')     { include("terms.php"); }
elseif ($router=='/privacy')   { include("privacy.php"); }
elseif ($router=='/signin')    { include("signin.php"); }           elseif ($router=='/signin.php'){ include("signin.php"); }
elseif ($router=='/signup')    { include("signup.php"); }           elseif ($router=='/signup.php'){  include("signup.php"); }
//elseif ($router=='/check-out') { loginRedirect('check-out.php'); }  elseif ($router=='/check-out.php'){ loginRedirect('check-out.php');}
elseif ($router=='/myaccount') { include("user.php"); }
elseif ($router=='/myorders')  { include("userorder.php");}
elseif ($router=='/product-details.php')  { header('location:/wrong');}


elseif (preg_match($sentex,$router)){ include("home.php"); }

elseif (preg_match($sentexProduct,$router)){ include("product-details.php"); }

//other core
elseif ($router=='/otp.php') { homeRedirect('otp.php'); }

elseif ($router=='/admin')     { include("/admin/index.php"); }

else{  require_once("header.php");  echo "<p class='error404'>404</p> <p class='pageNotFound'>Page Not Found</p>"; require_once("footer.php"); }


function loginRedirect($url){
    if(!isset($_COOKIE["PHPLGADP"])){
        header("location:/signin");
    }else{ 
        include($url);
     }
}
function homeRedirect($url){
    if(!isset($_COOKIE["PHPLGADP"])){
        include($url);
    }else{ 
        header("location:/");
     }
}
?>
