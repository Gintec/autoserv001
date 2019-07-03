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
<style media="print">
	@media all {
	div.page-break	{ display: none; size: 8.5in 11in; page-break-after: always;  /* width height */}
}

@media print {
	div.page-break	{ display: block; page-break-after: always; page-break-inside: avoid; size: 8.5in 11in; margin:auto;  /* width height */ }
}

td{padding:5px !important;
font-size:14px;
}
	</style>
<body onLoad="window.print()">
	<div class="page-break">
	<img src="images/KT.jpg" style="position:absolute relative; width:100% !important; top:0px; z-index:100">
	<div align="left" class="h3" style="margin-left:5%; margin-right:5%;"><strong style="float:right; font-size:13px;">Date: <?php echo date("dS M, Y"); ?></strong></div>


<?php
if(isset($_POST['Go'])){
$jobno = $_POST['jobno'];
$customerid = $_POST['customerid'];
$title = $_POST['title'];

$getrg = mysql_query("SELECT * FROM contacts WHERE customerid='$customerid'") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){?>

<table width="60%" border="0" align="center">
  <tr>
    <td><?php echo $_POST['title']; ?><br>
      <?php echo $rg['address']; ?></td>
    <td>&nbsp;</td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><h3>JOB COMPLETION CERTIFICATE </h3></td>
    </tr>
  <tr>
    <td colspan="3">I <?php echo strtoupper($rg['name']); ?> Certify that the job carried out on <?php echo strtoupper($organization); ?>'s vehicle with the following details is complete and satisfactory.</td>
  </tr>
  <?php  $ji = mysql_query("SELECT vregno,chasisno,modelname,vin FROM vehicles WHERE jobno='$jobno'") or die(mysql_error()); while($j = mysql_fetch_row($ji)){ ?>
  <tr>
    <td colspan="3">VEHICLE MAKE: <?php echo strtoupper($j[2]); ?></td>
  </tr>
  <tr>
    <td colspan="3">VIN. NO: <?php echo strtoupper($j[1]); ?></td>
  </tr>
  <tr>
    <td colspan="3">VEHICLE REG. NO: <?php echo strtoupper($j[0]); ?></td>
  </tr>
  <tr>
    <td colspan="3">JOB DESCRIPTION: <?php echo strtoupper(mysql_result(mysql_query("SELECT description FROM payments WHERE jobno='$jobno' LIMIT 1"),0)); ?></td>
  </tr>
  <tr>
    <td colspan="3">DELIVERY DATE:  <?php echo strtoupper(mysql_result(mysql_query("SELECT deliverytime FROM jobextra WHERE jobno='$jobno' LIMIT 1"),0)); ?></td>
  </tr>
  <tr>
    <td colspan="3">PHONE NO: <?php echo $rg['telephoneno']; ?></td>
  </tr>
  <tr>
    <td width="28%"><p>&nbsp;</p>
      <p><strong>_______________<br>
      DRIVER</strong></p></td>
    <td width="42%">&nbsp;</td>
    <td><p><strong><br>
      _________________<br>
      SERVICE ADVISOR </strong></p>      </td>
  </tr>
</table>
<?PHP }}}?>

	</div>
	
</body>
</html>