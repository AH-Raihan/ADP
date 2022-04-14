<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
        <div class="block">               
         <form action="addNewCore.php" method="post" enctype="multipart/form-data">
            <table class="form">	
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Slider Title</label>
                    </td>
                    <td>
                    <input type="text" class="medium" name="sliderTitle"/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image (1600x550 px) or URL</label>
                    </td>
                    <td>
                    <input type="file" class="custom-file-input" name="sliderImage"/>
                    <input type="text" class="medium" name="sliderImageUrl"/>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Publish" />
                    </td>
                </tr>
            </table>
            </form>
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
