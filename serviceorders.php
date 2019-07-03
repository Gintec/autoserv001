<style>
td{padding:1px !important;
font-size:12px;
}
.style2 {
	color: inherit;
	font-family: inherit;
	line-height: 1.1;
	font-weight: bold;
}
.style3 {line-height: 1.1; color: inherit; font-family: inherit;}
body{background-image:url(images/invoicebg.jpg); background-position:center; background-repeat:no-repeat; background-size:full;}
</style>
<?php include_once('kmaccess.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOJO MOTORS | ERP SYSTEM</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
	<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
	<body onLoad="window.print()"><br>

	<div align="center"><img src="images/logo2.png" alt="KOJO MOTORS" width="403" height="62"></div>
<?php include_once('serviceorderlist.php'); ?>
</body>
</html>