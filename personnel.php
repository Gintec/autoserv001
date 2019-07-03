<?php include_once('kmaccess.php'); ?>
	
<?php include_once('header2.php'); ?>

        <?php include_once('topbar.php'); ?>
       <?php include_once('sidebarmenu.php'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
		<?php if($staffid!="KS27042431"){include_once('personnellist.php');}else{ echo "You have no permission to view this page!";} ?>
        </div>
        <!-- end page-wrapper -->
 
<?php include_once('footer.php'); ?>