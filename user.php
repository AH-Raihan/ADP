<?php require_once("header.php");
require_once("config.php");

$authToken = $_COOKIE["PHPLGADP"];
$selectUsr = "SELECT * FROM users WHERE usrauthToken='$authToken'";
$runselectUsr = mysqli_query($conn, $selectUsr);
while ($data = mysqli_fetch_array($runselectUsr)) {
    $user_id = $data["user_id"];
}

$userDQ = "SELECT * FROM users WHERE user_id='$user_id'";
$userDQuery = mysqli_query($conn, $userDQ);

while ($userD = mysqli_fetch_array($userDQuery)) { ?>

    <div class="w-100 bg-light">
        <div class="safeArea">
            <?php if (isset($_REQUEST['Changed'])) {
                echo "<p id='msg' style='z-index:11;position:fixed;top:38px;right:40%;display:inline-block;color:white;background:#28d54d;font-size:17px;border-radius:28px;padding:10px;margin:2px'>Changed Successfully!</p>";
            } elseif (isset($_REQUEST['notChanged'])) {
                echo "<p id='msg' style='z-index:11;position:fixed;top:35px;right:40%;display:inline-block;color:white;background:red;font-size:17px;border-radius:28px;padding:10px;margin:2px'>Change Faild!</p>";
            } elseif (isset($_REQUEST['notMatch'])) {
                echo "<p id='msg' style='z-index:11;position:fixed;top:35px;right:40%;display:inline-block;color:white;background:red;font-size:17px;border-radius:28px;padding:10px;margin:2px'>Password Not Match!</p>";
            } ?>
            <div class="row">

                <div class="col-sm-3 my-3">
                    <div style="width: 98%;margin:auto;">
                        <div class="border shadow p-3 mb-5 bg-white list-group">
                            <p style="text-align: center;">Hello <b><?php echo $userD["full_name"]; ?></b></p>
                            <a href="/logout.php" style="display: inline-block; text-align:center; ">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></a>
                        </div>

                        <div class="border shadow bg-white list-group">

                            <a href="myaccount" class="list-group-item list-group-item-action">My account</a>
                            <a href="myorders" class="list-group-item list-group-item-action">My Orders</a>
                        </div>

                    </div>
                </div>
                <div class="col-sm-9 my-3">
                    <div style="width: 98%;margin:auto;" class="border shadow mb-5 bg-white p-3">
                        <div class="personal-inf">
                            <span class="text">Personal Information</span><a href="edituser.php" class="text-primary ml-4">Change Information</a>
                            <hr>
                            <div class="row">

                                <div class="col-12">
                                    <label for="name" class="form-label pb-1">Name</label>
                                    <input type="text" name="name" class="form-control personal p-4 name" value="<?php echo $userD['full_name']; ?>" disabled="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="dob" class="form-label pb-1">Your Date of Birth</label>
                                    <input type="text" name="dob" class="form-control personal p-4 date-of-birth" value="<?php echo $userD['birthday']; ?>" disabled="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="dob" class="form-label pb-1">Gender</label>
                                    <input type="text" name="dob" class="form-control personal p-4 date-of-birth" value="<?php echo $userD['gender']; ?>" disabled="">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="mobile row">
                            <div class="col-12">
                                <label for="dob" class="form-label pb-1">Mobile</label>
                                <input type="text" name="dob" class="form-control personal p-4 date-of-birth" value="<?php echo $userD['mobile']; ?>" disabled="">
                            </div>
                        </div>
                        <hr>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <label for="dob" class="form-label pb-1">Email Address</label>
                                <input type="text" name="dob" class="form-control personal p-4 date-of-birth" value="<?php echo $userD['email_addr']; ?>" disabled="">
                            </div>
                        </div>
                        <hr>

                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="dob" class="form-label pb-1">Password</label><a href="javascript:void(0)" onclick="openPopup();" class="text-primary ml-4">Change Password</a>
                                    <input type="password" name="dob" class="form-control personal p-4 date-of-birth" value="********" disabled="">
                                </div>
                                <div class="popup-password container" id="popupPassword" style="z-index:111;display:none;background: rgb(0 0 0 / 69%);width: 70%;color: white;height:auto;position: fixed;top: 50%;left: 50%;text-align: center;transform: translate(-50%, -50%);border-radius: 7px;">
                                    <div class="row">
                                        <div class="col-12 p-4">
                                            <form action="userpassword.php" method="POST" onsubmit="return confirm('Are You Sure?')">
                                                <label for="dob" class="form-label pb-1">Change Your Password</label><button type="reset" onclick="closePopup();" style="font-size:38px;color:#ff8c8c;position: absolute;top:3px;right:15px;cursor:pointer;background: none;border: none;outline: none;">&times;</button>

                                                <!-- <div class="emailAddress"><input type="text" name="old_pass" class="form-control personal p-4" placeholder="Old Password" required></div> -->
                                                <div class="emailAddress"><input type="text" name="new_pass" class="form-control personal p-4" placeholder="New Password" minlength="8" required></div>
                                                <div class="emailAddress"><input type="text" name="c_new_pass" class="form-control personal p-4" placeholder="Confirm Password" minlength="8" required></div>
                                                <div class="signupBtn"> <input type="submit" value="Save"></div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        var popupPassword = document.getElementById("popupPassword");

        function openPopup() {
            popupPassword.style.display = "block";
        }

        function closePopup() {
            popupPassword.style.display = "none";
        }
        var msg = document.getElementById("msg");
        setTimeout(function() {
            msg.remove();
        }, 3000);
    </script>
<?php }
require_once("footer.php"); ?>