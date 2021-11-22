<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Post List</h2>
    <?php if (isset($_REQUEST['updated'])) {
      echo "<p id='msg' style='position:fixed;top:10px;right:40%;display:inline-block;color:white;background:#28d54d;font-size:17px;border-radius:28px;padding:10px;margin:2px'>Updated Successfully!</p>";
    } elseif (isset($_REQUEST['notupdated'])) {
      echo "<p id='msg' style='position:fixed;top:10px;right:40%;display:inline-block;color:white;background:red;font-size:17px;border-radius:28px;padding:10px;margin:2px'>Update Faild!</p>";
    } ?>
    <div class="block overflow-auto">
      <table class="data display datatable w-100"  id="" style="overflow-x: auto;">
        <thead>
          <tr>
            <td>Id</td>
            <td>Date & Time</td>
            <td>Book Name</td>
            <td>Payment Method</td>
            <td>bKash N</td>
            <td>Trx</td>
            <td>Transport</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Address</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          <?php require_once("../config.php");
          $ordersQ = "SELECT * FROM orders ORDER BY Cdate DESC";
          $orderQuery = mysqli_query($conn, $ordersQ);

          while ($orders = mysqli_fetch_array($orderQuery)) { ?>

            <tr>
              <td><?php echo $orders["order_id"]; ?> </td>
              <td><?php echo $orders["Cdate"]; ?> </td>
              <td><?php echo $orders["book_name"]; ?> </td>
              <td><?php echo $orders["paymentMethod"]; ?> </td>
              <td><?php echo $orders["bkashNumber"]; ?> </td>
              <td><?php echo $orders["trx"]; ?> </td>
              <td><?php echo $orders["transport"]; ?> </td>
              <td><?php echo $orders["quantity"]; ?> </td>
              <td><?php echo $orders["total_price"]; ?> Tk.</td>
              <td><a href="addr.php?user_id=<?php echo $orders['user_id']; ?> " class="text-info">View Details</a></td>
              <td>
                <form action="orderaction.php">
                  <input type="hidden" name="orderid" value="<?php echo $orders['order_id']; ?>">
                  <select name="status" id="statuses" onchange="submit();">
                    <option value="Pending">Pending</option>
                    <option value="Waiting">Waiting</option>
                    <option value="Completed">Completed</option>
                    <option value="Cenceled">Cenceled</option>
                  </select>
                  <script>
                    var statuses=document.getElementById('statuses');
                    statuses.value="<?php echo $orders['order_status']; ?>";
                  </script>
                </form>
              </td>
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
    //$('.datatable').dataTable({ order:[[1,'desc']]});
    $('.datatable').dataTable({"order":false});
    setSidebarHeight();
  });
   var msg=document.getElementById("msg");
   setTimeout(function(){ 
     msg.remove();
     window.history.replaceState("updated","Order Update","/admin/orders.php");
   }, 3000);
</script>
<?php include 'inc/footer.php'; ?>
