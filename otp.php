<?php
if (isset($_COOKIE["PHPLGADP"])) {
    header("location:index.php");
}
require_once("header.php");
?>
<div class="signupMainContainer clearFix">
    <div class="safeArea">
        <div class="col-sm-4 mx-auto bg-white p-3">
            <form action="otp_core.php" method="POST">
                <div class="EmailVerficationCode">
                    <p>Email Verfication Code *</p><input type="text" name="otp" placeholder="Email Verfication Code">
                </div>
                <input type="hidden" name="auth" value="<?php echo $_REQUEST["auth"]; ?>">
                <?php if (isset($_REQUEST["wrongOtp"])) {
                    echo '<p style="color: red;text-align:center;">Wrong Verfication Code! </p>';
                } ?>
                <div class="signupBtn"><input type="submit" value="Submit OTP"></div>
            </form>
        </div>
    </div>
</div>
<?php require_once("footer.php"); ?>