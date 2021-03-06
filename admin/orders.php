<?php include 'inc/header.php'; ?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Orders List</h2>
    <?php if (isset($_REQUEST['updated'])) {
      echo "<p id='msg' class='alert alert-success' role='alert'>Updated Successfully!</p>";
    } elseif (isset($_REQUEST['notupdated'])) {
      echo "<p id='msg' class='alert alert-danger' role='alert'>Update Faild!</p>";
    } ?>
    <div class="block overflow-auto">
      <table id="orderDatatable" class="data ctable display datatable w-100 table table-striped table-bordered" style="overflow-x: auto;" border="1">
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
              <td><?php echo $orders["quantity"] . " PCS.<br>";
                  echo $orders["total_price"]; ?> Tk. </td>
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


    <!-- Modal -->
    <div class="modal fade" id="usrDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">
            <h5 class="m-4">Details</h5>
            <table id="modalAddrTable" class="table table-sm table-striped table-hover w-100">

            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-primary" data-dismiss="usrDetailsModal">Done</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal End -->
  </div>
</div>
</div>


<script type="text/javascript">
  const statuses = document.getElementsByClassName('statuses');
  for (let i = 0; i < statuses.length; i++) {
    statuses[i].value = statuses[i].getAttribute('data-value');
  }


  var modalAddrTable = document.getElementById('modalAddrTable');

  function getAddr(id) {
    var url = `<?php echo $ServerHost; ?>/admin/addrAjax.php?id=${id}`;
    axios.get(url, {
        userid: id
      })
      .then(function(response) {
        $('#usrDetailsModal').modal('show');
        modalAddrTable.innerHTML = response.data;
      })
      .catch(function(error) {
        alert(error);
      })
  }


  var msg = document.getElementById("msg");
  if (typeof(msg) != 'undefined' && msg != null) {

    setTimeout(function() {
      msg.remove();
      window.history.replaceState("updated", "Order Update", "/admin/orders.php");
    }, 3000);
  }
</script>
<?php include 'inc/footer.php'; ?>