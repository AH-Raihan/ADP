<?php
if(isset($_COOKIE["PHPLGADP"])){
    header("location:index.php");
} 
require_once("g_config.php");
require_once("config.php");
require_once("header.php");

?>
   

  <div class="signupMainContainer">
      <div class="safeArea">
       <div class="headsignupcontainer">
        <h2 class="createaccount">Create your Account</h2>
         <p class="alredyaccount">New member? <a href="signup.php">Register</a> here.</p>
          </div>
         <div class="clearboth"></div>
        <div class="signupcontainer">
         
         
         
          <div class="leftSide col-sm-6 clearFix">
          <form action="signin_core.php" method="post">
              <div class="emailAddress">
                  <p>Email Address *</p>
                  <input type="text" placeholder="Please Enter Your Email address" name="emailaddr" required>
              </div>
              <div class="Password">
                  <p>Password *</p>
                  <input type="password" placeholder="Please Enter Your Password" name="pwd" required>
              </div>
              
          </div>
          
          <div class="rightSide col-sm-6 clearFix">
              <div class="signupBtn">
                  <input type="submit" value="Login">
              </div>
              </form>
              <p>Or, sign in with</p>
              <!-- <div class="facebooksignup">
                  <button><i class="fa fa-facebook-f"></i> Facebook</button>
              </div> -->
              <div class="googlesignup" style="width: 100%;">
                  <button onclick="window.location = '<?php echo $login_url; ?>'"><i class="fa fa-google"></i>oogle</button>
              </div>
          </div>
          
          
          <?php 
          if (isset($_REQUEST["wrongUsrPwd"])) {
             echo '<div style="color: red;font-weight:700;margin:10px;text-align:center;">Wrong User Or Password!</div>';
          }
          
          ?>
          
      </div></div>
  </div>
  
  
  
  <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
<div class="clearboth"></div>
<script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }
    </script>
<?php 
require_once("footer.php");
?>
