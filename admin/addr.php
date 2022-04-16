<?php include 'inc/header.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>User Information</h2>
        <div class="block">

            <table class="data display datatable table-striped w-100" style="overflow-x: auto;">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email Address</td>
                        <td>Address</td>
                        <td>Mobile</td>
                        <td>Transport name</td>
                        <td>Region</td>
                        <td>City</td>
                        <td>Area</td>
                        <td>birthday</td>
                        <td>gender</td>
                    </tr>
                    <thead>
                    <tbody>
                        <?php require_once("../config.php");

                        $user_id = $_REQUEST["user_id"];
                        $userDQ = "SELECT * FROM users WHERE user_id='$user_id'";
                        $userDQuery = mysqli_query($conn, $userDQ);

                        while ($userD = mysqli_fetch_array($userDQuery)) { ?>
                   
                        <tr>
                            <td><?php echo $userD["user_id"]; ?> </td>
                            <td><?php echo $userD["full_name"]; ?> </td>
                            <td><?php echo $userD["email_addr"]; ?> </td>
                            <td><?php echo $userD["addr1"]; ?> </td>
                            <td><?php echo $userD["mobile"]; ?> </td>
                            <td><?php echo $userD["transport"]; ?> </td>
                            <td><?php echo $userD["Region"]; ?> </td>
                            <td><?php echo $userD["City"]; ?> </td>
                            <td><?php echo $userD["Area"]; ?> </td>
                            <td><?php echo $userD["birthday"]; ?> </td>
                            <td><?php echo $userD["gender"]; ?> </td>
                        </tr>
                
                <?php } ?>
                <tbody>

            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>