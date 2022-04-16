<?php include 'inc/header.php';?>
 
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update News</h2>
        <hr>
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
                        <input type="text" placeholder="Enter News Title..." name="newsEditTitle" class="medium form-control"  value="<?php echo $orders['news_title']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Date & Time</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Example : January 8, 2021" name="newsDate" class="medium  form-control" value="<?php echo $orders['news_date']; ?>" />
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
                        <textarea class="medium" id="editor" name="newsDescription" style="width: 55%;" cols="4" rows="15" ><?php echo $orders['news_discription']; ?></textarea>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image (372x205 px)</label>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="newsImage"/>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" class="btn btn-success" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php include 'inc/footer.php';?>