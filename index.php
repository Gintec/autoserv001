<?php include_once('kmaccess.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOJO MOTORS | ERP SYSTEM</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<style>
		.btn-sm{font-size:10px; padding:3px; }
	</style>
	<!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>
	
	<link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
		});
    </script>
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <?php include_once('topbar.php'); ?>
       <?php include_once('sidebarmenu.php'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
<?php if($staffid=="adminkojo1"){include_once('statsheet.php');}elseif($_SESSION['department']=="Front Desk"){include_once('schedulelist.php');}elseif($_SESSION['department']=="Spare Parts / Store" || $_SESSION['designation']=="Cashier" || $_SESSION['designation']=="Workshop Manager"){include_once('partsorderlistp.php');}else{include_once('memos.php');}; ?>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    

</body>

</html>
