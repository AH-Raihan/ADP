<?php
require_once("google-api/vendor/autoload.php");
$gClient = new Google_Client();
$gClient->setClientId("370160254615-3rlctd9r9314jb55oehl2i1l3lp6k4l6.apps.googleusercontent.com");
$gClient->setClientSecret("jjxJzUMODApQ3mZT6YNRSwZY");
$gClient->setApplicationName("Alor Dishari Publications");
$gClient->setRedirectUri("http://localhost:8080/adp/controller.php");
$gClient->addScope("https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/plus.me");

// login URL
$login_url = $gClient->createAuthUrl();
?>