<?php include 'inc/header.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New News</h2>
        <hr>
        <div class="block">               
         <form action="addNewCore.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>News Title</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="Enter News Title..." name="newsTitle" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Date & Time</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="Example : January 8, 2021" name="newsDate" class="medium" />
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
                    <!-- class="tinymce" -->
                        <textarea id="editor" name="newsDescription" style="width: 55%;" cols="4" rows="15"></textarea>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image (372x205 px)</label>
                    </td>
                    <td>
                    <input type="file"  class="form-control" name="newsImage"/>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" class="btn btn-success" Value="Publish" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<!-- <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


