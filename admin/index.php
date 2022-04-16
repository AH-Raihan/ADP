<?php include 'inc/header.php'; ?>

  <div class="container-fluid">
    <h2> Dashbord</h2>
    <div class="row">
      <div class="totalOrderDashboard col-sm-4" style="background: #4c4c4c;">
        Total Orders <br>
        <?php
        require_once("../config.php");

        $selectOrdersQuery = "SELECT * FROM orders";
        $queryRun = mysqli_query($conn, $selectOrdersQuery);
        echo mysqli_num_rows($queryRun);
        ?>
      </div>


      <div class="totalOrderDashboard col-sm-4" style="background: #00a712;">
        Completed Orders <br>
        <?php
        $selectOrdersQuery = "SELECT * FROM orders WHERE order_status='Completed'";
        $queryRun = mysqli_query($conn, $selectOrdersQuery);
        echo mysqli_num_rows($queryRun);
        ?>
      </div>

      <div class="totalOrderDashboard col-sm-4" style="background: #056a9f;">
        Pending Orders <br>
        <?php
        $selectOrdersQuery = "SELECT * FROM orders WHERE order_status='Pending'";
        $queryRun = mysqli_query($conn, $selectOrdersQuery);
        echo mysqli_num_rows($queryRun);
        ?>
      </div>

      <div class="totalOrderDashboard col-sm-4" style="background: #e9c106;">
        Waiting Orders <br>
        <?php
        $selectOrdersQuery = "SELECT * FROM orders WHERE order_status='Waiting'";
        $queryRun = mysqli_query($conn, $selectOrdersQuery);
        echo mysqli_num_rows($queryRun);
        ?>
      </div>

      <div class="totalOrderDashboard col-sm-4" style="background: #f95d5d;">
        Cancel Orders <br>
        <?php
        $selectOrdersQuery = "SELECT * FROM orders WHERE order_status='Cenceled'";
        $queryRun = mysqli_query($conn, $selectOrdersQuery);
        echo mysqli_num_rows($queryRun);
        ?>
      </div>

    </div>
  </div>
<?php include 'inc/footer.php'; ?>
