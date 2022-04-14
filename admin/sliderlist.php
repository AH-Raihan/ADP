<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Slider List</h2>
    <div class="block">
      <div class="bg-white text-dark content w-100 " style="overflow-x: auto;">
        <table class="data display datatable " style="overflow-x: auto;">
          <thead>
            <tr>
              <td>Image</td>
              <td>Slider Title</td>
              <td>Slider Status</td>
              <td>Slider Url</td>
<!--               <td>Edit</td> -->
              <td>Delete</td>
            </tr>
          </thead>
          <tbody>
          <?php require_once("../config.php");
          $ordersQ = "SELECT * FROM slider";
          $orderQuery = mysqli_query($conn, $ordersQ);

          while ($orders = mysqli_fetch_array($orderQuery)) { ?>
            
              <tr>
              <td><img loading="lazy" width="80px" src="<?php echo $orders["image"]; ?>" alt=""> </td>
                <td><?php echo $orders["title"]; ?> </td>
                <td><?php echo $orders["image"]; ?> </td>
                <td><?php echo $orders["status"]; ?> </td>
<!--                 <td><a onclick="return confirm('Are You Sure?')" href="sliderEdit.php?newsEditId=<?php echo $orders['id']; ?>">Edit</a></td> -->
                <td><a onclick="return confirm('Are You Sure?')" href="addNewCore.php?sliderDeleteId=<?php echo $orders['id']; ?>">Delete</a></td>
                
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
