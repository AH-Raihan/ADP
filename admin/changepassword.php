<?php include 'inc/header.php';?>
 
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">               
         <form method="post" action="adminpwd_core.php" >
            <table class="form">					
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="oldpwd" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newpwd" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Confirm New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="confirm New Password..." name="cnewpwd" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td style="color: #ff8c6a;font-weight: 900;">
                       <?php
                       if(isset($_REQUEST["action"])){
                        echo $_REQUEST["action"]; 
                       } ?>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>