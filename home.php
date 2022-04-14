<?php require_once("header.php"); ?>
<div class="clearboth"></div>
<div class="adver-banner">
    <div class="safeArea"><img loading="lazy" src="<?php echo $host;?>/images/banner@2x-1-scaled.png" alt="Add"></div>
</div>
<div class="clearboth"></div>

<div class="slideAndCatagory">
    <div class="safeArea">

        <!--<div class="catalog-menu-box">
            <div class="catalog-menu-wrap">
                <button id="hidemenutoggle">
                    <i class="fa fa-bars"></i>
                </button>
                <nav class="catalog-menu" role="navigation" aria-label="Catalog Menu">
                    <div class="catalog-menu">
                        <h3 class="catalog-menu-title">All Products</h3>
                        <ul class="cat-nav-menu">
                            <li class="menu-item"><a title="" href="#">Alor Dishari Hand Suggestion</a></li>
                            <li class="menu-item"><a title="" href="#">Alor Dishari Hand Note</a></li>
                        </ul>
                    </div>
                </nav> 
            </div> 
        </div> -->

        <script type="text/javascript">
          window.jssor_1_slider_init=function(){var s={$AutoPlay:1,$LazyLoading:1,$CaptionSliderOptions:{$Class:$JssorCaptionSlideo$,$Transitions:[[{b:-1,d:1,ls:.5},{b:0,d:1e3,y:5,e:{y:6}}],[{b:-1,d:1,ls:.5},{b:200,d:1e3,y:25,e:{y:6}}],[{b:-1,d:1,ls:.5},{b:400,d:1e3,y:45,e:{y:6}}],[{b:-1,d:1,ls:.5},{b:600,d:1e3,y:65,e:{y:6}}],[{b:-1,d:1,ls:.5},{b:800,d:1e3,y:85,e:{y:6}}],[{b:-1,d:1,ls:.5},{b:500,d:1e3,y:195,e:{y:6}}],[{b:0,d:2e3,y:30,e:{y:3}}],[{b:-1,d:1,rY:-15,tZ:100},{b:0,d:1500,y:30,o:1,e:{y:3}}],[{b:-1,d:1,rY:-15,tZ:-100},{b:0,d:1500,y:100,o:.8,e:{y:3}}],[{b:500,d:1500,o:1}],[{b:0,d:1e3,y:380,e:{y:6}}],[{b:300,d:1e3,x:80,e:{x:6}}],[{b:300,d:1e3,x:330,e:{x:6}}],[{b:-1,d:1,r:-110,sX:5,sY:5},{b:0,d:2e3,o:1,r:-20,sX:1,sY:1,e:{o:6,r:6,sX:6,sY:6}}],[{b:0,d:600,x:150,o:.5,e:{x:6}}],[{b:0,d:600,x:1140,o:.6,e:{x:6}}],[{b:-1,d:1,sX:5,sY:5},{b:600,d:600,o:1,sX:1,sY:1,e:{sX:3,sY:3}}]]},$ArrowNavigatorOptions:{$Class:$JssorArrowNavigator$},$BulletNavigatorOptions:{$Class:$JssorBulletNavigator$,$SpacingX:20,$SpacingY:20}},e=new $JssorSlider$("jssor_1",s),d=3e3;function o(){var s=e.$Elmt.parentNode.clientWidth;if(s){var i=Math.min(d||s,s);e.$ScaleWidth(i)}else window.setTimeout(o,30)}o(),$Jssor$.$AddEvent(window,"load",o),$Jssor$.$AddEvent(window,"resize",o),$Jssor$.$AddEvent(window,"orientationchange",o)};
        </script>

        <!-- start slider -->
        <div class="sliderContainer">
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1600px;height:560px;overflow:hidden;visibility:hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img loading="lazy" style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo $host?>/images/spin.svg" />
                </div>
                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1600px;height:560px;overflow:hidden;">
                   <?php 
                    $sliderSelect="SELECT * FROM slider WHERE status='1'";
                    $sliderQuery=mysqli_query($conn,$sliderSelect);
                         
                     if($sliderQuery==true){
                         while($slider=mysqli_fetch_array($sliderQuery)){ ?>
                    <div style="background-color:#d3890e;">
                        <img loading="lazy" alt="slide" data-u="image" style="opacity:1;" data-src="<?php echo $slider['image'];?>" />
                    </div>
                    
                    <?php } }?>
                </div>
                <!-- Bullet Navigator -->
                <div data-u="navigator" class="jssorb132" style="position:absolute;bottom:24px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                    <div data-u="prototype" class="i" style="width:12px;height:12px;">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                        </svg>
                    </div>
                </div>
                <!-- Arrow Navigator -->
                <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- end slider -->
    </div>
</div>
<!-- end slider section -->
<div class="clearboth"></div>
<!-- start e-commerce section -->

<div class="e-commerce-container bangla-font">

<!-- start subject section -->

<h4 class="m-3 safeArea bg-secendary text-white p-3 bg-secondary header-title">
            <b>বিষয় ভিত্তিক বই</b>
        </h4>
    <div class="safeArea products-container">
        
        <div class="row">
            <div class="owl-carousel owl-theme">
                <?php

                $selectBook = "SELECT * FROM books";
                $bookQuery = mysqli_query($conn, $selectBook);

                if ($bookQuery == true) {
                    while ($books = mysqli_fetch_array($bookQuery)) { ?>

                        <div class="products w-75 item">
                            <button data-bookId="<?php echo $books['book_id']; ?>" class="add-to-cart addToCartBtn"><i class="fa fa-cart-plus"></i> Add To Cart</button>
                            <div class="product-thumbnail-img "><img loading="lazy" class="productImage" src="<?php echo $host?>/images/<?php echo $books["book_img"]; ?>" alt="<?php echo $books['book_name']; ?>"></div>
                            <?php $salePrice = $books["book_sale_price"];
                            if ($salePrice > 0) {
                                echo "<div class='sale'><img loading='lazy' src='$host/images/sale.png' alt='sale'></div>";
                            }
                            ?>

                            <div class="book-details">
                                <h3 class="book-title productTitle"><?php echo $books["book_name"]; ?></h3>
                                <h4 class="book-writer"><?php echo $books["book_writer"]; ?></h4>
                                <div class="prices">
                                
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
                            </div>
                            <a class="book-view" href="<?php echo $host ?>/book/<?php 
                            $sentexBookUrl='/(\s+)/';
                            $book_nameUrl=$books['book_name'];
                            echo preg_replace($sentexBookUrl,'-',$book_nameUrl );
                            
                            ?>">View Details</a>
                        </div>

                <?php    }
                } ?>


            </div>

        </div>

    </div>
    <!-- end subject section -->

    

</div>
    <!-- end e-commerce section -->

    <!-- start newsEvent section -->
    <div class="newsEventSection bangla-font">
        <div class="safeArea newsEventContainer">
            <div class="row">
                <?php
                $selectNews = "SELECT * FROM news LIMIT 3";
                $newsQuery = mysqli_query($conn, $selectNews);

                if ($newsQuery == true) {
                    while ($news = mysqli_fetch_array($newsQuery)) { ?>

                        <div class="col-sm-4 news-con" data-aos="zoom-in">
                            <div class="news">
                                <div class="news-thumbnail-img"><img loading="lazy" src="<?php echo $host?>/images/<?php echo $news['news_img']; ?> " alt="<?php echo $news['news_title']; ?>"></div>
                                <p class="news-time"><i class="fa fa-clock"></i> <?php echo $news['news_date']; ?> </p>
                                <h3 class="news-title"><?php echo $news['news_title']; ?> </h3>
                                <p class="news-description"><?php echo $news['news_discription']; ?></p>
                                <a class="readmorepost bg-glass" href="<?php echo $host ?>/post/<?php 
                                $sentexNewsUrl='/(\s+)/';
                                $name_newsUrl=$news['news_title'];
                                echo preg_replace($sentexNewsUrl,'-',$name_newsUrl); ?>">Read More...</a>

                            </div>
                        </div>

                <?php    }
                } ?>

            </div>
        </div>
    </div>
    <!-- end newsEvent section -->

    <?php require_once("footer.php"); ?>
