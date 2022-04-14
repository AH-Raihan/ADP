
<?php
require_once("config.php");
include('smtp/PHPMailerAutoload.php');


if (isset($_REQUEST["emailaddr"]) && isset($_REQUEST["pwd"]) && isset($_REQUEST["birthday"]) && isset($_REQUEST["gender"]) && isset($_REQUEST["fullname"])) {
  $emailaddr = $_REQUEST["emailaddr"];
  $fullname = $_REQUEST["fullname"];
  $pwd = md5(sha1($_REQUEST["pwd"]));
  $birthday = $_REQUEST["birthday"];
  $gender = $_REQUEST["gender"];
  $authToken = md5(sha1($emailaddr . $fullname));

  $mathQuery = "SELECT * FROM users WHERE email_addr='$emailaddr'";
  $runSelectQuery = mysqli_query($conn, $mathQuery);
  $checkCount = mysqli_num_rows($runSelectQuery);

  if ($checkCount === 0) {
    $otp = rand(100000, 999999);
    $insert = "INSERT INTO users (usrauthToken,otp,email_addr,full_name,usr_pwd,birthday,gender) VALUES('$authToken','$otp','$emailaddr','$fullname','$pwd','$birthday','$gender')";
    $insertQuery = mysqli_query($conn, $insert);
    if ($insertQuery == true) {
      $subject = "Alor Dishari Publications OTP";
      $message = '<html><body>';
      $message .= '<h1 style="color: white;
              background: linear-gradient(-45deg, #8CC63F 0%, #8CC63F 33%, #0B9444 100%);
              padding: 30px 15px;
              font-size: 34px;
              text-align: center;
              margin: 0 auto;
              width: 60%;
              border-bottom: 5px dashed #f0f0f0;
              border-radius: 4px 4px 0 0;;">Alor Dishari Publications</h1>';
      $message .= '<p style="background: #f0f0f0;font-size: 14px;padding: 50px 15px;margin: 0 auto!important;width: 60%;border-radius: 0 0 4px 4px;">Hi ,<br> In order to protect your account security, we need to verify your identity. Please enter below mentioned 6 digit code into the Email Verification page. <span style="background: #fff;padding: 10px 30px;font-weight: 700;font-size: 27px;letter-spacing: 2px;border-radius: 5px;color: #8CC63F;display: block;width: 15%;text-align: center;margin: 19px auto;">' . $otp . '</span><br>Thank you and have a nice day,<br>
          Team Alor Dishari Publications</p>';
      $message .= '</body></html>';

      echo smtp_mailer($emailaddr, $subject, $message);


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



function smtp_mailer($to, $subject, $msg)
{
  $mail = new PHPMailer();
  // $mail->SMTPDebug=3;
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'type';
  $mail->Host = "smtp.gmail.com";
  $mail->Port = "587";
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  $mail->Username = "web.ahraihan@gmail.com";
  $mail->Password = '*raihan123#@2022';
  $mail->SetFrom("web.ahraihan@gmail.com");
  $mail->Subject = $subject;
  $mail->Body = $msg;
  $mail->AddAddress($to);
  $mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
  ));
  if (!$mail->Send()) {
    echo $mail->ErrorInfo;
  } else {
    echo 'Sent';
  }
}
