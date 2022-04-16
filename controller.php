<?php
require_once "config.php";
require_once "g_config.php";

//Step 3 : Get the authorization  code
$code = isset($_GET['code']) ? $_GET['code'] : NULL;

//Step 4: Get access token
if(isset($code)) {

    try {

         $token = $gClient->fetchAccessTokenWithAuthCode($code);
         $gClient->setAccessToken($token);

    }catch (Exception $e){
        echo $e->getMessage();
    }




    try {
         $pay_load = $gClient->verifyIdToken();
        
        $emailaddr=$pay_load["email"];
        $fullname=$pay_load["name"];
        $authToken=md5(sha1($emailaddr.'raihan123'));
        
        $mathQuery="SELECT * FROM users WHERE email_addr='$emailaddr'";
        $runSelectQuery=mysqli_query($conn,$mathQuery);
        $checkCount=mysqli_num_rows($runSelectQuery);
        while($datausr=mysqli_fetch_array($runQuery)){
          $platform=$dataurs["platform"];
          $authTokenusr=$datausr["usrauthToken"];
        }

    if ($checkCount===0) {
        $insert="INSERT INTO users(usrauthToken,email_addr,full_name, platform) VALUES('$authToken','$emailaddr','$fullname','google')";
        $insertQuery=mysqli_query($conn,$insert);

        if ($insertQuery==true) {
            setcookie("PHPLGADP",$authToken,time()+86400*360);
            header("location:/");
        } else {
            header("location:signin");
        }
    }else{
        setcookie("PHPLGADP",$authTokenusr,time()+86400*360);
        header("location:/");
    }


    }catch (Exception $e) {
        echo $e->getMessage();
    }

} else{
    $pay_load = null;
}

if(isset($pay_load)){


    

}
?>
