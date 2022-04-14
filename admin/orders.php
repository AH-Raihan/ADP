<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Orders List</h2>
    <?php if (isset($_REQUEST['updated'])) {
      echo "<p id='msg' style='background:#28d54d;'>Updated Successfully!</p>";
    } elseif (isset($_REQUEST['notupdated'])) {
      echo "<p id='msg' style='background:red;'>Update Faild!</p>";
    } ?>
    <div class="block overflow-auto">
      <table id="orderDatatable" class="data display datatable w-100" style="overflow-x: auto;">
        <thead>
          <tr>
            <td>SL</td>
            <td>Date & Time</td>
            <td>Book Name</td>
            <td>Payment Method</td>
            <td>bKash N</td>
            <td>Trx</td>
            <td>Transport</td>
            <td>QTY & Price</td>
            <td>Address & Action</td>
            <td>Order Id</td>
          </tr>
        </thead>
        <tbody>
          <?php require_once("../config.php");
          $ordersQ = "SELECT * FROM orders ORDER BY Cdate DESC";
          $orderQuery = mysqli_query($conn, $ordersQ);

          while ($orders = mysqli_fetch_array($orderQuery)) { ?>

            <tr>
              <td><?php echo $orders["id"]; ?> </td>
              <td class="Cdate"><?php
                                $Cdate = $orders["Cdate"];
                                $CdateOnlyDate = substr($Cdate, 0, 10);
                                $today = date("Y-m-d");
                                $yesterdatMatch = date("Y-m") . "-" . date("d") - 1;
                                if ($today === $CdateOnlyDate) {
                                  echo "Today";
                                } elseif ($yesterdatMatch === $CdateOnlyDate) {
                                  echo "YesterDay";
                                } else {
                                  echo $Cdate;
                                }
                                ?></td>
              <td><?php echo $orders["book_name"]; ?> </td>
              <td><?php echo $orders["paymentMethod"]; ?> </td>
              <td><?php echo $orders["bkashNumber"]; ?> </td>
              <td><?php echo $orders["trx"]; ?> </td>
              <td><?php echo $orders["transport"]; ?> </td>
              <td><?php echo $orders["quantity"]." PCS.";  echo $orders["total_price"]; ?> Tk. </td>
              <td>
                <span onclick="getAddr(<?php echo $orders['user_id']; ?>);" style="cursor: pointer;color:#0fa363;font-weight:600;">Details</span>
                <form action="orderaction.php">
                    <input type="hidden" name="orderid" value="<?php echo $orders['order_id']; ?>">
                    <select name="status" class="statuses" onchange="submit();" data-value="<?php echo $orders['order_status']; ?>">
                      <option value="Pending">Pending</option>
                      <option value="Waiting">Waiting</option>
                      <option value="Completed">Completed</option>
                      <option value="Cenceled">Cenceled</option>
                    </select>
                  </form>
              </td>
              <td><?php echo $orders["order_id"]; ?> </td>
            </tr>

          <?php } ?>
        </tbody>

      </table>
    </div>

    <div class="modal" id="modal">
      <div class="modalBody">
        <div class="closeModal"><span onclick="this.parentNode.parentNode.parentNode.style.display='none';">X</span></div>
        <table id="modalAddrTable" >
          
        </table>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  const statuses = document.getElementsByClassName('statuses');
  for (let i = 0; i < statuses.length; i++) {
    statuses[i].value = statuses[i].getAttribute('data-value');
  }
  $(document).ready(function() {
    setupLeftMenu();
    setSidebarHeight();
    $('#orderDatatable').dataTable({
      "aaSorting": [[ 0, "desc" ]]
    });
  });

  var modal = document.getElementById('modal');
  var modalAddrTable = document.getElementById('modalAddrTable');

  function getAddr(id) {
    var url=`<?php echo $ServerHost; ?>/admin/addrAjax.php?id=${id}`;
    axios.get(url,{userid:id})
    .then(function(response){
      modal.style.display="block";
      modalAddrTable.innerHTML=response.data;
    })
    .catch(function(error){
      alert(error);
    })
  }


  var msg = document.getElementById("msg");
  if(typeof(msg) != 'undefined' && msg != null){
     
  setTimeout(function() {
      msg.remove();
    window.history.replaceState("updated", "Order Update", "/admin/orders.php");
  }, 3000);
}
</script>
<?php include 'inc/footer.php'; ?>
