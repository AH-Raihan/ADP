<?php include 'inc/header.php'; ?>

<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
  <div class="box round first grid">
    <h2> Dashbord</h2>
    <div class="block">
      <div class="totalOrderDashboard" style="background: #4c4c4c;color: white;padding: 10px;font-size: 20px; font-weight: 700;display: inline-block;border-radius:8px;">
        Total Orders :
        <?php
        require_once("../config.php");

        $selectOrdersQuery = "SELECT * FROM orders";
        $queryRun = mysqli_query($conn, $selectOrdersQuery);
        echo mysqli_num_rows($queryRun);
        ?>
      </div>


      <div class="totalOrderDashboard" style="background: #4c4c4c;color: white;padding: 10px;font-size: 20px; font-weight: 700;display: inline-block;border-radius:8px;">
        Completed Orders :
        <?php
        $selectOrdersQuery = "SELECT * FROM orders WHERE order_status='Completed'";
        $queryRun = mysqli_query($conn, $selectOrdersQuery);
        echo mysqli_num_rows($queryRun);
        ?>
      </div>

      <div class="totalOrderDashboard" style="background: #4c4c4c;color: white;padding: 10px;font-size: 20px; font-weight: 700;display: inline-block;border-radius:8px;">
        Cancel Orders :
        <?php
        $selectOrdersQuery = "SELECT * FROM orders WHERE order_status='Cenceled'";
        $queryRun = mysqli_query($conn, $selectOrdersQuery);
        echo mysqli_num_rows($queryRun);
        ?>
      </div>

    </div>
  </div>
</div>
<?php include 'inc/footer.php'; ?>