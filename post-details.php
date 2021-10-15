<?php require_once("header.php");
require_once("config.php");
$post_title = $_REQUEST["post_title"];
?>


<!-- end header -->
<div class="safeArea bangla-font">

    <?php if (isset($_REQUEST["post_title"])) {

        $selectQuery = "SELECT * FROM news WHERE news_title='$post_title'";
        $Query = mysqli_query($conn, $selectQuery);

        if ($selectQuery == true) {
            while ($Snews = mysqli_fetch_array($Query)) { ?>

                <div class=" news-con" data-aos="zoom-in">
                    <div class="news">
                        <div class="news-thumbnail-img"><img src="images/<?php echo $Snews['news_img']; ?>" alt=""></div>
                        <p class="news-time"><i class="fa fa-clock"></i> <?php echo $Snews['news_date']; ?></p>
                        <h3 class="news-title"> <?php echo $Snews['news_title']; ?></h3>
                        <p class="news-description" style="height: auto;"><?php echo $Snews['news_discription']; ?></p>

                    </div>
                </div>

    <?php }
        } else {
            header("location:index.php");
        }
    } else {
        header("location:index.php");
    } ?>
</div>

<?php require_once("footer.php"); ?>