<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New News</h2>
        <div class="block">    
        <?php require_once("../config.php");

$newsId=$_REQUEST["newsEditId"];
    $ordersQ = "SELECT * FROM news WHERE id='$newsId'";
    $orderQuery = mysqli_query($conn, $ordersQ);

    while ($orders = mysqli_fetch_array($orderQuery)) { ?>                    
         <form action="addNewCore.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="newsEditId" value="<?php echo $orders['id']; ?>">
            <table class="form">
               
                <tr>
                    <td>
                        <label>News Title</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter News Title..." name="newsEditTitle" class="medium"  value="<?php echo $orders['news_title']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Date & Time</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Example : January 8, 2021" name="newsDate" class="medium" value="<?php echo $orders['news_date']; ?>" />
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
                </tr><tr>
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
                </tr> -->
				
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>News Description</label>
                    </td>
                    <td>
                        <textarea class="medium" name="newsDescription" style="width: 55%;" cols="4" rows="15" ><?php echo $orders['news_discription']; ?></textarea>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image (372x205 px)</label>
                    </td>
                    <td>
                        <input type="file" name="newsImage"/>
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