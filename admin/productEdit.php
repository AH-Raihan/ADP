<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div class="block">
        <?php require_once("../config.php");

        $bookId=$_REQUEST["book_id"];
            $ordersQ = "SELECT * FROM books WHERE book_id='$bookId'";
            $orderQuery = mysqli_query($conn, $ordersQ);

            while ($orders = mysqli_fetch_array($orderQuery)) { ?>            
         <form action="addNewCore.php" method="post" enctype="multipart/form-data">
            <table class="form">
            <input type="hidden" name="book_id" value="<?php echo $orders['book_id']; ?>">
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Product Name..." value="<?php echo $orders['book_name']; ?>" name="bookEditTitle" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Writer Name</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Writer Name..." value="<?php echo $orders['book_writer']; ?>" name="bookWriter" class="medium" />
                    </td>
                </tr>
				<!-- <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="select">
                            <option>Select Category</option>
                            <option value="1">Category One</option>
                            <option value="2">Category Two</option>
                            <option value="3">Category Three</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="select">
                            <option>Select Brand</option>
                            <option value="1">Brand One</option>
                            <option value="2">Brand Two</option>
                            <option value="3">Brand Three</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce"></textarea>
                    </td>
                </tr> -->
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." name="bookPrice" value="<?php echo $orders['book_price']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Sale Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Sale Price..." value="<?php echo $orders['book_sale_price']; ?>" name="bookSalePrice" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="bookImg"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select"  name="bookType">
                            <option value="<?php echo $orders['book_type']; ?>"><?php echo $orders['book_type']; ?></option>
                            <option value="subject">Subject</option>
                            <option value="suggetion">Suggetion</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


