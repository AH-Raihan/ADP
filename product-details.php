<?php
if($_SERVER['REQUEST_URI']==='/product-details.php'){
 header('location:/');
}
require_once("header.php");
require_once("config.php");
$server= $_SERVER["QUERY_STRING"];
$sentex="/url\=book\/([^\/]+)/";
preg_match_all($sentex,$server,$result);
$book_nameUrl=$result[1][0];
$sentexUrl='/(-+)/';
$book_name = preg_replace($sentexUrl,' ',$book_nameUrl);
?> 

<div class="product-details-container">
    <div class="safeArea ">
        <?php

        if (preg_match($sentex,$server)) {

            $selectQuery = "SELECT * FROM books WHERE book_name='$book_name'";
            
            $Query = mysqli_query($conn, $selectQuery);
            if(mysqli_num_rows($Query)===0){
                echo "<script>window.location.replace('/404');</script>";
            }

            if ($Query == true) {
                while ($Sbooks = mysqli_fetch_array($Query)) {
                    $book_id = $Sbooks["book_id"]; ?>

                    <div class="products-details clearfix bg-glass">
                        <div class="product-details-thumbnail-img-container col-sm-3">
                            <div class="product-details-thumbnail-img"><img loading="lazy" src="<?php echo $host; ?>/images/<?php echo $Sbooks["book_img"]; ?>" alt=""></div>
                            <?php $salePrice = $Sbooks["book_sale_price"];
                            if ($salePrice > 0) {
                                echo "<div class='sale'><img loading='lazy' src='$host/images/sale.png' alt='sale'></div>";
                            }
                            ?>
                        </div>
                        <div class="products-details-book-details bangla-font col-sm-8">

                            <h3 class="products-details-book-title"><?php echo $Sbooks["book_name"]; ?></h3>
                            <h4 class="products-details-book-writer"><?php echo $Sbooks["book_writer"]; ?></h4>

                            <?php $salePrice = $Sbooks["book_sale_price"];
                            if ($salePrice > 0) { ?>

                                <span class="products-details-book-previous-price"><del>TK. <?php echo $Sbooks["book_price"]; ?></del></span>

                            <?php  } else { ?>
                                <span class="products-details-book-present-price">TK. <?php echo $Sbooks["book_price"]; ?></span>
                            <?php } ?>
                            <?php $salePrice = $Sbooks["book_sale_price"];
                            if ($salePrice > 0) { ?>
                                <span class="products-details-book-present-price">TK. <?php echo $Sbooks["book_sale_price"]; ?></span>

                            <?php  } ?>

                            <!-- <a href="#" class="products-details-open-book">একটু পড়ে দেখুন</a> -->
                            <button data-bookId="<?php echo $Sbooks['book_id'];  ?>" class="products-details-add-to-cart bg-adp addToCartBtn"><i class="fa fa-cart-plus"></i> Add To Cart</button>
                            <!-- <a href="#" class="products-details-add-to-wishlist"><i class="fa fa-heart"></i> Add To WishList</a> -->
                        </div>

            <?php }
            }else {
                header("location:/");
            }
        } else {
            header("location:/");
        }
            ?>
                    </div>
                    <div class="review-container bg-glass">
                        <?php
                        $selectreview = "SELECT * FROM reviews WHERE book_id='$book_id'";
                        $runselectreview = mysqli_query($conn, $selectreview);
                        $reviewMainSts = 0;
                        $runselectreviewCount = mysqli_num_rows($runselectreview);
                        if ($runselectreviewCount > 0) {
                            while ($reviewMainStarss = mysqli_fetch_assoc($runselectreview)) {
                                $reviewMainSts += $reviewMainStarss['stars'];
                            }



                            $average = $reviewMainSts / $runselectreviewCount;
                            $reviewMainStarsPluss = floor($average);
                            $reviewMainStarsPlus = str_replace(' ', '', $reviewMainStarsPluss);
                        } else {
                            $reviewMainStarsPlus = "0";
                            $average = "0";
                        } ?>
                        <div class="main-stars">
                            <?php if ($reviewMainStarsPlus === "0") { ?>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                            <?php } ?>
                            <?php if ($reviewMainStarsPlus === "1") { ?>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                            <?php } ?>
                            <?php if ($reviewMainStarsPlus === "2") { ?>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                            <?php } ?>
                            <?php if ($reviewMainStarsPlus === "3") { ?>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star"></span>
                            <?php } ?>
                            <?php if ($reviewMainStarsPlus === "4") { ?>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star"></span>
                            <?php } ?>
                            <?php if ($reviewMainStarsPlus === "5") { ?>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                                <span class="fa fa-star reviewChecked"></span>
                            <?php } ?>


                            <span><?php echo round($average, 1); ?></php> / 5</span>
                            </div>

                            <?php 
                             $ordersQ = "SELECT * FROM orders WHERE user_id='$user_id' AND book_id='$book_id' ";
                             $orderQuery = mysqli_query($conn, $ordersQ);
                             $countorder=mysqli_num_rows($orderQuery);
                             if($countorder > 0){
                                $order=mysqli_fetch_assoc($orderQuery);
                                 if( $order["order_status"] ==="Completed"){ ?>

                            
                        <form class="writeReview" action="review.php" method="post">
                            <input type="hidden" name="nextUrl" value="<?php echo $_SERVER['QUERY_STRING'];?>">
                            <input type="hidden" name="userId" value="<?php echo $user_id;?>">
                            <input type="hidden" name="bookId" value="<?php echo $book_id;?>">
                            <div class="starsInput">
                                <div class="starInputRadio" style="display: none;">
                                    <input type="radio" name="stars" class="rwsi" value="1">
                                    <input type="radio" name="stars" class="rwsi" value="2">
                                    <input type="radio" name="stars" class="rwsi" value="3">
                                    <input type="radio" name="stars" class="rwsi" value="4">
                                    <input type="radio" name="stars" class="rwsi" value="5" checked>
                                </div>
                                <span class="reviewWI reviewChecked" data-valu="1"><i class="fa fa-star"></i></span>
                                <span class="reviewWI reviewChecked" data-valu="2"><i class="fa fa-star "></i></span>
                                <span class="reviewWI reviewChecked" data-valu="3"><i class="fa fa-star "></i></span>
                                <span class="reviewWI reviewChecked" data-valu="4"><i class="fa fa-star "></i></span>
                                <span class="reviewWI reviewChecked" data-valu="5"><i class="fa fa-star "></i></span>
                            </div>

                            <script>
                                var reviewWI = document.getElementsByClassName("reviewWI");
                                var rwsi = document.getElementsByClassName("rwsi");

                                for (let i = 0; i < reviewWI.length; i++) {
                                    reviewWI[i].addEventListener("click", function() {
                                        var rws = this.getAttribute('data-valu');
                                        reviewWI[0].classList.remove("reviewChecked");
                                        reviewWI[1].classList.remove("reviewChecked");
                                        reviewWI[2].classList.remove("reviewChecked");
                                        reviewWI[3].classList.remove("reviewChecked");
                                        reviewWI[4].classList.remove("reviewChecked");

                                        rwsi[rws-1].checked = true;
                                        console.log(rws);

                                        for (let index = 0; index < rws; index++) {
                                            reviewWI[index].classList.add("reviewChecked");
                                        }
                                    });

                                }
                            </script>

                            <textarea name="message" cols="30"></textarea>
                            <input type="submit" value="Submit">
                        </form>
                        <?php }} ?>
                        <?php

                        $selectreview = "SELECT * FROM reviews WHERE book_id='$book_id'";
                        $runselectreview = mysqli_query($conn, $selectreview);
                        while ($reviews = mysqli_fetch_array($runselectreview)) {
                            $starUsr = $reviews["stars"]; ?>

                            <div class="reviews">
                                <?php
                                if ($starUsr === "1") { ?><div class="stars"><span class="fa fa-star reviewChecked"></span><span class="fa fa-star "></span><span class="fa fa-star "></span><span class="fa fa-star "></span><span class="fa fa-star"></span></div>
                                <?php }
                                if ($starUsr === "2") { ?><div class="stars"><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span><span class="fa fa-star "></span><span class="fa fa-star "></span> <span class="fa fa-star"></span></div>
                                <?php }
                                if ($starUsr === "3") { ?><div class="stars"><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span><span class="fa fa-star "></span> <span class="fa fa-star"></span></div>
                                <?php }
                                if ($starUsr === "4") { ?><div class="stars"><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span><span class="fa fa-star "></span> </div>
                                <?php }
                                if ($starUsr === "5") { ?><div class="stars"><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span><span class="fa fa-star reviewChecked"></span> </div>
                                <?php } ?>


                                <p>by <?php $reviewUsr = $reviews["user_id"];
                                        $selectUserReview = "SELECT * FROM users WHERE user_id='$reviewUsr'";
                                        $runReviewUsr = mysqli_query($conn, $selectUserReview);
                                        $reviewUsrName = mysqli_fetch_assoc($runReviewUsr);
                                        echo $reviewUsrName["full_name"]; ?></p>
                                <p><?php echo $reviews["message"]; ?></p>
                            </div>

                        <?php
                        }
                        ?>
                    </div>

    </div>
</div>
<div class="clearboth"></div>
<?php require_once("footer.php"); ?>
