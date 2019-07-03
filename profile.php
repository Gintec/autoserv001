<?php include_once('kmaccess.php'); ?>
<?php include_once('header.php'); ?>
        <?php include_once('topbar.php'); ?>
       <?php include_once('sidebarmenu.php'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
		<?php if($staffid!="kojoadmin"){include_once('updatestaffform2.php');}else{include_once('updatestaffform.php');} ?>
        </div>
        <!-- end page-wrapper -->
<?php include_once('footer.php'); ?>
    