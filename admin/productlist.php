<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Post List</h2>
    <div class="block">
      <table class="data display datatable table-striped w-100" style="overflow-x: auto;">
        <thead>
          <tr>
            <td>Id</td>
            <td>Image</td>
            <td>Book Name</td>
            <td>Book Writer</td>
            <td>Pice</td>
            <td>Sale Price</td>
            <td>Type</td>
            <td>View</td>
            <td>Edit</td></td>
            <td>Delete</td>
          </tr>
          <thead>
          <tbody>
            <?php require_once("../config.php");
            $ordersQ = "SELECT * FROM books";
            $orderQuery = mysqli_query($conn, $ordersQ);

            while ($orders = mysqli_fetch_array($orderQuery)) { ?>
          
            <tr>
              <td><?php echo $orders["book_id"]; ?> </td>
              <td><img loading="lazy" width="60px" src="../images/<?php echo $orders['book_img']; ?>" alt=""> </td>
              <td><?php echo $orders["book_name"]; ?> </td>
              <td><?php echo $orders["book_writer"]; ?> </td>
              <td><?php echo $orders["book_price"]; ?> </td>
              <td><?php echo $orders["book_sale_price"]; ?> </td>
              <td><?php echo $orders["book_type"]; ?> </td>
              <td><a href="../product-details.php?book_name=<?php echo $orders['book_name']; ?> " class="text-info">View Details</a></td>
              <td><a href="productEdit.php?book_id=<?php echo $orders['book_id']; ?> " class="text-info">Edit</a></td>
              <td><a onclick="return confirm('Are You Sure?')" href="addNewCore.php?bookDeleteId=<?php echo $orders['book_id']; ?>">Delete</a></td>
            </tr>
        
        <?php } ?>
        </tbody>

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