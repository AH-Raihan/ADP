<?php 

//$request
  $router=$_SERVER['REQUEST_URI'];
//$router=str_replace( '/','',$request);

if ($router=='/'){
  include("home.php");
}elseif ($router=='/index.php'){
    include("home.php");
}elseif ($router=='/cart'){
    include("cart.php");
}
elseif ($router=='/news'){
    include("news.php");
}
elseif ($router=='/recipt'){
    include("recipt.php");
}
elseif ($router=='/books'){
    include("books.php");
}
elseif ($router=='/terms'){
    include("terms.php");
}
elseif ($router=='/privacy'){
    include("privacy.php");
}
elseif ($router=='/signin'){
    include("signin.php");
}
elseif ($router=='/signup'){
    include("signup.php");
}
elseif ($router=='/check-out'){
    include("check-out.php");
}
elseif ($router=='/myaccount'){
    include("user.php");
}
elseif ($router=='/myorders'){
    include("userorder.php");
}

?>
