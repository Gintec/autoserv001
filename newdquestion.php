<?php include_once('kmaccess.php'); ?>
<?php include_once('header.php'); ?>
<script type="text/javascript" src="jquery.simple-dtpicker.js"></script>
	<link type="text/css" href="jquery.simple-dtpicker.css" rel="stylesheet" />
	<script src="tinymce/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
        <?php include_once('topbar.php'); ?>
       <?php include_once('sidebarmenu.php'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
		<?php include_once('dquestionform.php'); ?>
        </div>
        <!-- end page-wrapper -->

<?php include_once('footer.php'); ?> 