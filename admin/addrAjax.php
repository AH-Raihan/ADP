    <?php
    require_once('../config.php');
    $user_id = $_REQUEST["id"];
    $userDQ = "SELECT * FROM users WHERE user_id='$user_id'";
    $userDQuery = mysqli_query($conn, $userDQ);

    while ($userD = mysqli_fetch_array($userDQuery)) { ?>

            <tr> <td>Id</td> <td><?php echo $userD["user_id"]; ?> </td></tr>
            <tr> <td>Name</td> <td><?php echo $userD["full_name"]; ?> </td> </tr>
            <tr><td>Email Address</td>  <td><?php echo $userD["email_addr"]; ?> </td></tr>
            <tr><td>Address</td> <td><?php echo $userD["addr1"]; ?> </td></tr>
            <tr><td>Mobile</td>  <td><?php echo $userD["mobile"]; ?> </td></tr>
            <tr><td>Transport name</td> <td><?php echo $userD["transport"]; ?> </td></tr>
            <tr><td>Region</td> <td><?php echo $userD["Region"]; ?> </td></tr>
            <tr><td>City</td> <td><?php echo $userD["City"]; ?> </td></tr>
            <tr><td>Area</td> <td><?php echo $userD["Area"]; ?> </td></tr>
            <tr><td>birthday</td> <td><?php echo $userD["birthday"]; ?> </td></tr>
            <tr><td>gender</td> <td><?php echo $userD["gender"]; ?> </td></tr>

    <?php } ?>