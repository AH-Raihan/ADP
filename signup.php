<?php if(isset($_COOKIE["PHPLGADP"])){
    header("location:index.php");
} 
require_once("g_config.php");
require_once("header.php");
?><div class="signupMainContainer">
    <div class="safeArea">
        <div class="headsignupcontainer">
            <h2 class="createaccount">Create your Account</h2>
            <p class="alredyaccount">Already member? <a href="signin.php">Login</a> here.</p>
        </div>
        <div class="clearboth"></div>
        <div class="signupcontainer">
            
                <div class="leftSide col-sm-6">
                <form action="signup_core.php" method="post">
                    <div class="emailAddress">
                        <p>Email Address *</p><input type="email" name="emailaddr"
                            placeholder="Please Enter Your Email address" required>
                    </div>
                    <!-- <div class="EmailVerficationCode">
                        <p>Email Verfication Code *</p><input type="text" placeholder="Email Verfication Code">
                </div> --><div class="Password">
                    <p>Password *</p><input type="password" minlength="8" name="pwd" placeholder="Please Enter Your Password" required>
                </div>
                <div class="Birthday">
                    <p>Birthday</p><input type="date" name="birthday" placeholder="Month/Date/Year" >
                </div>
                <div class="Gender">
                    <p>Gender</p><select name="gender" id="">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
        </div>
        <div class="rightSide col-sm-6">
            <div class="Fullname">
                <p>Full name *</p><input type="text" name="fullname" placeholder="Please Enter Your Full Name" required>
            </div>
            <div class="signupBtn"><input type="submit" value="Sign Up"></div>
            
           </form>
            <p>Or,
                sign up with</p>
            <!-- <div class="facebooksignup"><button><i class="fa fa-facebook-f"></i>acebook</button></div> -->
            <div class="googlesignup" style="width: 100%;"><button  onclick="window.location = '<?php echo $login_url; ?>'"><i class="fa fa-google"></i>oogle</button></div>
        </div>
        <?php 
          if (isset($_REQUEST["emailUsed"])) {
             echo '<div style="color: red;font-weight:700;margin:10px;text-align:center;">This Email Is Already Used</div>';
          }
          
          ?>
    </div>
</div>
</div>
<div class="clearboth"></div><?php require_once("footer.php");
?>