<?php if(isset($_POST["new_pass"])){

    require_once("config.php");

    $authToken = $_COOKIE["PHPLGADP"];
    $selectUsr = "SELECT * FROM users WHERE usrauthToken='$authToken'";
    $runselectUsr = mysqli_query($conn, $selectUsr);
    while ($data = mysqli_fetch_array($runselectUsr)) {
        $user_id = $data["user_id"];
        $email = $data["email_addr"];
    }
    //$oldPass=$_POST["old_pass"];
    $newPass=md5(sha1($_POST["new_pass"]));
    $cNewPass=md5(sha1($_POST["c_new_pass"]));
 
    if ($newPass===$cNewPass) {
        $update="UPDATE users SET usr_pwd='$newPass' WHERE email_addr='$user_id'";
        $query=mysqli_query($conn,$update);
if ($query==true) {
    header("location:user.php?Changed");
} else {
    header("location:user.php?notChanged");
}


    } else {
        header("location:user.php?notMatch");
    }
    
    //$upadte="UPDATE users SET usr_pwd='$newPass' ";
    

}else{header("location:/");}?>
