<?php
require_once("../config.php");
$host = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'];
// $ =$_REQUEST[""]; insertNews="INSERT INTO news () VALUES()"; 
/*  $Query=mysqli_query($conn, );
    if(==true){
        header("location:newslist.php");
    }
*/ // News Add ////////////////////////

if (isset($_REQUEST['newsTitle'])) {
    $newsTitle = $_REQUEST["newsTitle"];
    $newsDate = $_REQUEST["newsDate"];
    $newsDescription = $_REQUEST["newsDescription"];
    $newsImageName = "news" . $_FILES["newsImage"]['name'];
    $newsImageTmpName = $_FILES["newsImage"]['tmp_name'];

    move_uploaded_file($newsImageTmpName, "../images/" . $newsImageName);

    $insertNews = "INSERT INTO news (news_title,news_discription,news_date,news_img) VALUES('$newsTitle','$newsDescription','$newsDate','$newsImageName')";
    $insertNewsQuery = mysqli_query($conn, $insertNews);
    if ($insertNewsQuery == true) {
        header("location:newslist.php");
    }
}

// product  Add /////////////////////

elseif (isset($_REQUEST['bookName'])) {
    $bookName = $_REQUEST["bookName"];
    $bookWriter = $_REQUEST["bookWriter"];
    $bookPrice = $_REQUEST["bookPrice"];
    $bookSalePrice = $_REQUEST["bookSalePrice"];
    $bookType = $_REQUEST["bookType"];
    $bookImageName = "book" . $_FILES["bookImg"]['name'];
    $bookImageTmpName = $_FILES["bookImg"]['tmp_name'];

    move_uploaded_file($bookImageTmpName, "../images/" . $bookImageName);
    $insertBook = "INSERT INTO books (book_name,book_writer,book_price,book_sale_price,book_type,book_img) VALUES ('$bookName','$bookWriter','$bookPrice','$bookSalePrice','$bookType','$bookImageName')";
    $insertBookQuery = mysqli_query($conn, $insertBook);
    if ($insertBookQuery == true) {
        header("location: productlist.php");
    } else {
        echo "<br>gg";
    }
}

*/ // Slider Add ////////////////////////

if (isset($_REQUEST['sliderTitle'])) {
    $sliderTitle = $_REQUEST["sliderTitle"];
   
    
    $sliderImage = $_REQUEST["sliderImage"];
    $sliderImageUrl = $_REQUEST["sliderImageUrl"];
    $sliderImageName = "slider" . $_FILES["sliderImage"]['name'];
    $sliderImageTmpName = $_FILES["sliderImage"]['tmp_name'];

    move_uploaded_file($newsImageTmpName, "../images/" . $sliderImageName);
 
    if (isset($_REQUEST['sliderImageUrl'])) {
         $sliderImageText=$sliderImageUrl;
    }else{
        $sliderImageText= $host.$sliderImageName;
    }
    
    
    $insertSlider = "INSERT INTO slider (title,image) VALUES('$sliderTitle','$sliderImageText')";
    $insertSliderQuery = mysqli_query($conn, $insertSlider);
    if ($insertSliderQuery == true) {
        header("location:sliderlist.php");
    }
}

// news Edit ///////////////////////

elseif (isset($_REQUEST['newsEditId'])) {
    $news_id = $_REQUEST['newsEditId'];
    $newsTitle = $_REQUEST["newsEditTitle"];
    $newsDate = $_REQUEST["newsDate"];
    $newsDescription = $_REQUEST["newsDescription"];

    $updateBook = "UPDATE news SET news_title='$newsTitle', news_discription='$newsDescription', news_date='$newsDate' WHERE id='$news_id'";
    $updateBookQuery = mysqli_query($conn, $updateBook);

    if (isset($_FILES["newsImage"])) {
        $news_id = $_REQUEST["newsEditId"];
        $newsImageName = "news" . $_FILES["newsImage"]['name'];
        $newsImageTmpName = $_FILES["newsImage"]['tmp_name'];

        move_uploaded_file($newsImageTmpName, "../images/" . $newsImageName);

        $newsImage = "UPDATE news SET news_img='$newsImageName' WHERE id='$news_id'";
        $updateNewsImgQuery = mysqli_query($conn, $newsImage);
    }
    if ($updateNewsImgQuery == true) {
        header("location: newslist.php");
    }
}

// product Edit
elseif (isset($_REQUEST['bookEditTitle'])) {
    $book_id = $_REQUEST["book_id"];
    $bookName = $_REQUEST["bookEditTitle"];
    $bookWriter = $_REQUEST["bookWriter"];
    $bookPrice = $_REQUEST["bookPrice"];
    $bookSalePrice = $_REQUEST["bookSalePrice"];
    $bookType = $_REQUEST["bookType"];

    $updateBook = "UPDATE books SET book_name='$bookName', book_writer='$bookWriter',book_price='$bookPrice',book_sale_price='$bookSalePrice',book_type='$bookType' WHERE book_id='$book_id'";
    $updateBookQuery = mysqli_query($conn, $updateBook);

    if (isset($_FILES["bookImg"])) {
        $book_id = $_REQUEST["book_id"];
        $bookEditImageName = "book" . $_FILES["bookImg"]['name'];
        $bookEditImageTmpName = $_FILES["bookImg"]['tmp_name'];

        move_uploaded_file($bookEditImageTmpName, "../images/" . $bookEditImageName);

        $updateBookImg = "UPDATE books SET book_img='$bookEditImageName' WHERE book_id='$book_id'";
        $updateBookImgQuery = mysqli_query($conn, $updateBookImg);
    }
    if ($updateBookQuery == true) {
        header("location: productlist.php");
    }
}

// News Delete
elseif (isset($_REQUEST['newsDeleteId'])) {
    $newsDeleteId = $_REQUEST['newsDeleteId'];

    $newsDelete = "DELETE FROM news WHERE id='$newsDeleteId'";
    $newsDeleteQuery = mysqli_query($conn, $newsDelete);
    if ($newsDeleteQuery == true) {
        header("location:newslist.php");
    }
}
// Book Delete
elseif (isset($_REQUEST['bookDeleteId'])) {
    $bookDeleteId = $_REQUEST['bookDeleteId'];

    $bookDelete = "DELETE FROM books WHERE book_id='$bookDeleteId'";
    $bookDeleteQuery = mysqli_query($conn, $bookDelete);
    if ($bookDeleteQuery == true) {
        header("location:productlist.php");
    }
}


else {
    header("location:index.php");
}
