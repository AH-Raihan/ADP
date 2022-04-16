<?php
require_once("google-api/vendor/autoload.php");
$gClient = new Google_Client();
$gClient->setClientId("754003558572-08tg25lc1emvg3ti4a73lb18hoqgml3q.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("Alor Dishari Publications");
$gClient->setRedirectUri("http://alordishari.herokuapp.com/controller.php");
$gClient->addScope("https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/plus.me");

// login URL
$login_url = $gClient->createAuthUrl();
?>
