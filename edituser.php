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
            <div class="row">

                <div class="col-sm-3 my-3">
                    <div style="width: 98%;margin:auto;">
                        <div class="border shadow p-3 mb-5 bg-white list-group">
                            <p style="text-align: center;">Hello <b><?php echo $userD["full_name"]; ?></b></p>
                        </div>

                        <div class="border shadow bg-white list-group">

                            <a href="myaccount" class="list-group-item list-group-item-action">My account</a>
                            <a href="myorders" class="list-group-item list-group-item-action">My Orders</a>
                        </div>

                    </div>
                </div>
                <div class="col-sm-9 my-3">
                    <form action="useredit_core.php" method="post">
                        <div style="width: 98%;margin:auto;" class="border shadow mb-5 bg-white p-3">
                            <div class="personal-inf">
                                <span class="text">Personal Information</span>
                                <hr>
                                <div class="row">

                                    <div class="col-12">
                                        <label for="name" class="form-label pb-1">Name</label>
                                        <input type="text" name="name" class="form-control personal p-4 name" value="<?php echo $userD['full_name']; ?>" name="name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="dob" class="form-label pb-1">Your Date of Birth</label>
                                        <input type="date" class="form-control personal p-4" value="<?php echo $userD['birthday']; ?>" name="birtday" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="dob" class="form-label pb-1">Gender</label>
                                        <select name="gender" id="" class="custom-select" required>
                                            <option value="Male" selected>Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <label for="dob" class="form-label pb-1">Mobile</label>
                                    <input type="text" class="form-control personal p-4 date-of-birth" value="<?php echo $userD['mobile']; ?>" maxlength="11" name="mobile" required>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="dob" class="form-label pb-1">Email Address</label>
                                    <input type="text" class="form-control personal p-4 date-of-birth" value="<?php echo $userD['email_addr']; ?>" name="email"  required>
                                </div>
                            </div>
                            <hr>
                            <input type="submit" class="form-control bg-warning ">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
<?php }
require_once("footer.php"); ?>