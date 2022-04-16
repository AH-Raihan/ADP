<?php include 'inc/header.php'; ?>
  <div class="box round first grid">
  <a href="addnews.php" class="btn btn-info my-3"><i class="fa fa-plus-circle"></i>  Add News</a>
    <h2>News List</h2>
    <div class="block">
      <div class="bg-white text-dark content w-100 " style="overflow-x: auto;">
        <table class="data display datatable table table-striped table-bordered" style="overflow-x: auto;">
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
              <td><img loading="lazy" width="80px" src="../images/<?php echo $orders["news_img"]; ?>" alt=""> </td>
                <td><?php echo $orders["news_title"]; ?> </td>
                <td><?php echo substr($orders["news_discription"],0,450)."...."; ?> </td>
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

<?php include 'inc/footer.php'; ?>