<?php require_once("header.php");
require_once("config.php");
$authToken = $_COOKIE["PHPLGADP"];
$selectUsr = "SELECT * FROM users WHERE usrauthToken='$authToken'";
$runselectUsr = mysqli_query($conn, $selectUsr);
while ($data = mysqli_fetch_array($runselectUsr)) {
    $user_id = $data["user_id"];
}
?>
<div class="w-100 bg-light">
    <div class="safeArea">
        <div class="row">

            <div class="col-sm-3 my-3">
                <div style="width: 98%;margin:auto;">
                    <div class="border shadow p-3 mb-5 bg-white list-group">
                        <p class="lead" style="text-align: center;">Hello <b><?php $findname = "SELECT * FROM users WHERE user_id='$user_id'";
                                                                                $findQuery = mysqli_query($conn, $findname);

                                                                                while ($name = mysqli_fetch_array($findQuery)) {
                                                                                    echo $name['full_name'];
                                                                                } ?></b></p>
                                                                                
                            <a href="/logout.php" style="display: inline-block; text-align:center; ">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </div>

                    <div class="border shadow bg-white list-group">

                        <a href="myaccount" class="list-group-item list-group-item-action">My account</a>
                        <a href="myorders" class="list-group-item list-group-item-action">My Orders</a>
                    </div>

                </div>
            </div>
            <div class="col-sm-9 my-3">
                <div style="width: 98%;margin:auto;" class="border shadow mb-3 bg-white p-3">
                    <p class="h5">My Orders</p>
                    <span>Your Total Order: <span id="totalord">0</span></span>
                    <hr>
                    <!-- <form action="">
                        Order Id: <input type="text" placeholder="Order Id" style="padding: 8.5px 14px;outline: 0;border: 1px solid #08c6a3;width: 20%;"> Status: <select name="status" id="" class="ml-1" style="padding: 8.5px 14px;outline: 0;border: 1px solid #08c6a3;width: 15%;">
                            <option value="processing">processing</option>
                            <option value="processing">processing</option>
                            <option value="processing">processing</option>
                            <option value="processing">processing</option>
                        </select>
                        <input type="submit" class="ml-1" style="padding: 7px 14px;color:white;outline: 0;background: #08c6a3 ;width: 20%;margin: 10px 0;border-radius: 3px;border:none;">
                    </form> -->
                </div>
                <div style="width: 98%;margin:auto;" class="border row shadow mb-5 bg-white p-3 clearfix">

                    <?php
                    $ordersQ = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY Cdate DESC";
                    $orderQuery = mysqli_query($conn, $ordersQ);
                    while ($orders = mysqli_fetch_array($orderQuery)) { ?>
                        <input type="hidden" id="totalorder" value="<?php echo mysqli_num_rows($orderQuery); ?>">


                        <?php
                        $book_id = $orders["book_id"];
                        $selectcartBook = "SELECT * FROM books WHERE book_id='$book_id'";
                        $bookcartQuery = mysqli_query($conn, $selectcartBook);
                        while ($books = mysqli_fetch_array($bookcartQuery)) { ?>

                            <div class="border p-3 m-3 col-sm-3">
                                <p>Order Id : <span class="text-danger"><?php echo $orders["order_id"]; ?></span> </p>
                                <a href="/book/<?php
                                $sentexBookUrl='/(\s+)/';
                                $book_nameUrl=$orders["book_name"];
                                echo preg_replace($sentexBookUrl,'-',$book_nameUrl );
                                ?>">
                                    <div class="product-thumbnail-img"><img loading="lazy" class="productImage" src="images/<?php echo $books['book_img']; ?>" alt=""></div>
                                    <div class="book-details">
                                        <h3 class="book-title productTitle"><?php echo $orders["book_name"]; ?></h3>
                                        <h4 class="book-present-price">Quantity: <?php echo $orders["quantity"]; ?></h4>
                                        <h4 class="book-present-price">order status: <?php $orderStatus= $orders["order_status"]; 
                                        if($orderStatus==="Completed"){
                                            echo '<span class="text-success">'.$orderStatus.' <i class="fas fa-check-circle"></i> </span>';
                                        }
                                        if($orderStatus==="Pending"){
                                            echo '<span class="text-info">'.$orderStatus.' <i class="fas fa-clock"></i> </span>';
                                        }
                                        if($orderStatus==="Waiting"){
                                            echo '<span class="text-warning">'.$orderStatus.' <i class="fas fa-spinner"></i> </span>';
                                        }
                                        if($orderStatus==="Cenceled"){
                                            echo '<span class="text-danger">'.$orderStatus.' <i class="fa fa-times-circle"></i>  </span>';
                                        }
                                        
                                        ?></h4>
                                        <span class="book-present-price">TK. <span class="productPrice"><?php echo $orders["total_price"]; ?></span></span>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>


                    <?php } ?>

                    <!-- start orders -->

                    <!-- end orders -->
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    var totalorderval = document.getElementById("totalorder").value;
    var totalorder = document.getElementById("totalord").innerHTML = totalorderval;
</script>
<?php require_once("footer.php"); ?>