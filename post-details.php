<?php
if($_SERVER['REQUEST_URI']==='/post-details.php'){
    header('location:/');
   }
require_once("header.php");
require_once("config.php");
$server= $_SERVER["QUERY_STRING"];
$sentex="/url\=post\/([^\/]+)/";
preg_match_all($sentex,$server,$result);
$post_titleUrl = $result[1][0];
$sentexUrl='/(-+)/';
$post_title = preg_replace($sentexUrl,' ',$post_titleUrl);
?>


<!-- end header -->
<div class="safeArea bangla-font">

    <?php if (preg_match($sentex,$server)) {

        $selectQuery = "SELECT * FROM news WHERE news_title='$post_title'";
        $Query = mysqli_query($conn, $selectQuery);

        if ($selectQuery == true) {
            while ($Snews = mysqli_fetch_array($Query)) { ?>

                <div class=" news-con" data-aos="zoom-in">
                    <div class="news">
                        <div class="news-thumbnail-img"><img loading="lazy" src="<?php echo $ServerHost; ?>/images/<?php echo $Snews['news_img']; ?>" alt=""></div>
                        <p class="news-time"><i class="fa fa-clock"></i> <?php echo $Snews['news_date']; ?></p>
                        <h3 class="news-title"> <?php echo $Snews['news_title']; ?></h3>
                        <p class="news-description" style="height: auto;"><?php echo $Snews['news_discription']; ?></p>

                    </div>
                </div>

    <?php }
        } else {
            header("location:/");
        }
    } else {
        header("location:/");
    } ?>
</div>

<?php require_once("footer.php"); ?>