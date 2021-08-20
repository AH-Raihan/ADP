<?php
require_once("config.php");
if (isset($_REQUEST["emailaddr"]) && isset($_REQUEST["pwd"]) && isset($_REQUEST["birthday"]) && isset($_REQUEST["gender"]) && isset($_REQUEST["fullname"])) {
    $emailaddr=$_REQUEST["emailaddr"];
    $fullname=$_REQUEST["fullname"];
    $pwd=md5(sha1($_REQUEST["pwd"]));
    $birthday=$_REQUEST["birthday"];
    $gender=$_REQUEST["gender"];
    $authToken=md5(sha1($emailaddr.$fullname));
    
    $mathQuery="SELECT * FROM users WHERE email_addr='$emailaddr'";
    $runSelectQuery=mysqli_query($conn,$mathQuery);
    $checkCount=mysqli_num_rows($runSelectQuery);
    
    if ($checkCount===0) {
      $otp =rand(100000,999999);
        $insert="INSERT INTO users (usrauthToken,otp,email_addr,full_name,usr_pwd,birthday,gender) VALUES('$authToken','$otp','$emailaddr','$fullname','$pwd','$birthday','$gender')";
        $insertQuery=mysqli_query($conn,$insert);
        if ($insertQuery==true) {
          
          

          //$to = 'ttsasa599@gmail.com';
          $subject = 'Alor Dishari Publications';
          $from = 'armanmahmud5080@gmail.com';
           
          // To send HTML mail, the Content-type header must be set
          $headers  = 'MIME-Version: 1.0' . "\r\n";
          $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
           
          // Create email headers
          $headers .= 'From: '.$from."\r\n".
              'Reply-To: '.$from."\r\n" .
              'X-Mailer: PHP/' . phpversion();
           
          // Compose a simple HTML email message
          $message = '<html><body>';
          $message .= '<h1 style="color: white;
              background: #18cab2;
              padding: 30px 15px;
              font-size: 34px;
              text-align: center;
              margin: 0 auto;
              width: 60%;
              border-bottom: 5px dashed #f0f0f0;
              border-radius: 4px 4px 0 0;;">Alor Dishari Publications</h1>';
          $message .= '<p style="background: #f0f0f0;font-size: 14px;padding: 50px 15px;margin: 0 auto!important;width: 60%;border-radius: 0 0 4px 4px;">Hi ,<br> In order to protect your account security, we need to verify your identity. Please enter below mentioned 6 digit code into the Email Verification page. <span style="background: #fff;padding: 10px 30px;font-weight: 700;font-size: 27px;letter-spacing: 2px;border-radius: 5px;color: #11ae98;display: block;width: 15%;text-align: center;margin: 19px auto;">'.$otp.'</span><br>Thank you and have a nice day,<br>
          Team Alor Dishari Publications</p>';
          $message .= '</body></html>';
          $sendMail= mail($emailaddr, $subject, $message, $headers);

        header("location:otp.php?auth=$authToken");
        } else {
          header("location:signup.php");
        }
        
        
     
  } else {
      header("location:signup.php?emailUsed");
  }

} else {
    header("location:signup.php");
}


?>