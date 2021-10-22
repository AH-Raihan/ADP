<?php require_once("header.php") ?>

<div class="clearboth"></div>
<!-- start e-commerce section -->

<div class="e-commerce-container bangla-font">
    <h4 class="m-3 safeArea bg-secendary text-white p-3 bg-secondary header-title" > <b>বিষয় ভিত্তিক বই</b></h4>
    <div class="safeArea products-container bangla-font">

        <div class="row">
            <?php
            $selectBook = "SELECT * FROM books";
            $bookQuery = mysqli_query($conn, $selectBook);

            if ($bookQuery == true) {
                while ($books = mysqli_fetch_array($bookQuery)) { ?>

                    <div class="products col-sm-2 item" data-aos="zoom-in">
                    <button data-bookId="<?php echo $books['book_id']; ?>" class="add-to-cart addToCartBtn"><i class="fa fa-cart-plus"></i> Add To Cart</button>
                        <div class="product-thumbnail-img"><img loading="lazy" class="productImage" src="images/<?php echo $books["book_img"]; ?>" alt=""></div>
                        <?php $salePrice = $books["book_sale_price"];
                        if ($salePrice > 0) {
                            echo "<div class='sale'><img loading='lazy' src='images/sale.png' alt='sale'></div>";
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
