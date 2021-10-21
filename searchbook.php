<?php require_once("header.php") ?>

<div class="clearboth"></div>
<!-- start e-commerce section -->

<div class="e-commerce-container bangla-font">
<h4 class="m-3 safeArea bg-secendary text-white p-3 bg-secondary" style="text-align: left;color: #fafafa !important;background-image: linear-gradient(-45deg, #8CC63F 0%, #8CC63F 33%, #0B9444 100%);border: 1px solid #ffffff;box-shadow: 0 1px 5px 0px #767373;margin: 10px auto !important;"> <u><b>বিষয় ভিত্তিক বই</b></u></h4>
    <div class="safeArea products-container bangla-font">

        <div class="row">
            <?php
            $book_name=$_REQUEST["book_name"];
            $selectBook = "SELECT * FROM books WHERE book_name LIKE'%$book_name%'  OR book_writer LIKE'%$book_name%'";
            $bookQuery = mysqli_query($conn, $selectBook);

            if ($bookQuery == true) {
                while ($books = mysqli_fetch_array($bookQuery)) { ?>

                    <div class="products col-sm-3 item">
                        <a id="add-to-cart" href="add-to-cart.php?book_id=<?php echo $books['book_id']; ?>&book_name=<?php echo $books['book_name']; ?>&book_price=<?php $salePrice = $books["book_sale_price"];
                                                                                                                                                                    if ($salePrice > 0) {
                                                                                                                                                                        echo $books["book_sale_price"];
                                                                                                                                                                    } else {
                                                                                                                                                                        echo $books["book_price"];
                                                                                                                                                                    } ?>" class="add-to-cart addToCartBtn"><i class="fa fa-cart-plus"></i> Add To Cart</a>
                        <div class="product-thumbnail-img"><img loading="lazy" class="productImage" src="images/<?php echo $books["book_img"]; ?>" alt=""></div>
                        <?php $salePrice = $books["book_sale_price"];
                        if ($salePrice > 0) {
                            echo "<div class='sale'><img loading="lazy" src='images/sale.png' alt='sale'></div>";
                        }
                        ?>

                        <div class="book-details">
                            <h3 class="book-title productTitle"><?php echo $books["book_name"]; ?></h3>
                            <h4 class="book-writer"><?php echo $books["book_writer"]; ?></h4>
                            <?php $salePrice = $books["book_sale_price"];
                            if ($salePrice > 0) { ?>

                                <span class="book-previous-price"><del>TK. <?php echo $books["book_price"]; ?></del></span>

                            <?php  } else { ?>
                                <span class="book-present-price">TK. <span class="productPrice"><?php echo $books["book_price"]; ?></span></span>
                            <?php } ?>
                            <?php $salePrice = $books["book_sale_price"];
                            if ($salePrice > 0) { ?>
                                <span class="book-present-price">TK. <span class="productPrice"><?php echo $books["book_sale_price"]; ?></span></span>

                            <?php  } ?>

                        </div>
                        <a class="book-view" href="product-details.php?book_name=<?php echo $books['book_name']; ?>">View Details</a>
                    </div>

            <?php    }
            } ?>


        </div>

    </div>

</div>
<!-- end e-commerce section -->
<div class="clearboth"></div>
<?php require_once("footer.php") ?>