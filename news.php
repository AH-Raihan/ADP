<?php require_once("header.php");require_once("config.php"); ?> 

 <!-- start newsEvent section -->
 <div class="newsEventSection bangla-font">
        <div class="safeArea newsEventContainer">
            <div class="row">
                <?php
                $selectNews = "SELECT * FROM news";
                $newsQuery = mysqli_query($conn, $selectNews);

                if ($newsQuery == true) {
                    while ($news = mysqli_fetch_array($newsQuery)) { ?>

                        <div class="col-sm-4 news-con" data-aos="zoom-in">
                            <div class="news">
                                <div class="news-thumbnail-img"><img loading="lazy" src="images/<?php echo $news['news_img']; ?> " alt=""></div>
                                <p class="news-time"><i class="fa fa-clock"></i> <?php echo $news['news_date']; ?> </p>
                                <h3 class="news-title"><?php echo $news['news_title']; ?> </h3>
                                <p class="news-description"><?php echo $news['news_discription']; ?></p>
                                <a class="readmorepost bg-glass" href="post-details.php?post_title=<?php echo $news['news_title']; ?>">Read More...</a>

                            </div>
                        </div>

                <?php    }
                } ?>

            </div>
        </div>
    </div>
    <!-- end newsEvent section -->    


<?php require_once("footer.php"); ?>