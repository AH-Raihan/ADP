<?php   $router=$_SERVER['REQUEST_URI'];
$sentex='/(\/\?fbclid=+[A-Za-z0-9_-]+)/';
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


elseif (preg_match($sentex,$router)){ include("home.php"); }

//other core
elseif ($router=='/otp.php') { homeRedirect('otp.php'); }

elseif ($router=='/admin')     { include("/admin/index.php"); }

else{  
require_once("header.php");
    echo "<p style='font-size:100px;text-align:center;padding-top:50px;'>404</p>";
    echo "<p style='text-align:center;>Page Not Found</p>";
    
require_once("footer.php");
}


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
