<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>News List</h2>
    <div class="block">
      <div class="bg-white text-dark content w-100 " style="overflow-x: auto;">
        <table class="data display datatable " style="overflow-x: auto;">
          <thead>
            <tr>
              <td>Image</td>
              <td>News Title</td>
              <td>News Discription</td>
              <td>Date & Time</td>
              <td>Edit</td>
              <td>Delete</td>
            </tr>
          </thead>
          <tbody>
          <?php require_once("../config.php");
          $ordersQ = "SELECT * FROM news";
          $orderQuery = mysqli_query($conn, $ordersQ);

          while ($orders = mysqli_fetch_array($orderQuery)) { ?>
            
              <tr>
              <td><img width="80px" src="../images/<?php echo $orders["news_img"]; ?>" alt=""> </td>
                <td><?php echo $orders["news_title"]; ?> </td>
                <td><?php echo $orders["news_discription"]; ?> </td>
                <td><?php echo $orders["news_date"]; ?> </td>
                <td><a onclick="return confirm('Are You Sure?')" href="newsEdit.php?newsEditId=<?php echo $orders['id']; ?>">Edit</a></td>
                <td><a onclick="return confirm('Are You Sure?')" href="addNewCore.php?newsDeleteId=<?php echo $orders['id']; ?>">Delete</a></td>
                
              </tr>
            
          <?php } ?>
          </tbody>

        </table>
      </div>
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