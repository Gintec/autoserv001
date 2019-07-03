<?php include_once('kmaccess.php'); ?>
<?php
if(isset($_GET['expid'])){$expid=$_GET['expid'];}
$getdq = mysql_query("SELECT * FROM expenditure WHERE expid ='$expid'") or die(mysql_error());
  while($dq = mysql_fetch_array($getdq)){
  
?>

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

td{padding:0px !important;padding-left:5px;
font-size:12px;
}
	</style>
<body onLoad="window.print()">
	<div class="page-break">
	<img src="images/KT.jpg" style="position:absolute relative; width:100% !important; top:0px; z-index:100">
	<div align="left" class="h3" style="margin-left:5%; margin-right:5%;">PAY SLIP <strong style="float:right;">Date: <?php echo date("dS M, Y", strtotime($dq['dated'])); ?></strong></div>
	<table width="100%" align="center" class="table table-condensed table-bordered" style="width:90%; z-index:1000000000; background-color:#FFFFFF;">

  
  <tr>
    <td colspan="5" class="h6"><div align="center">PERSONNEL INFO</div></td>
  </tr>
  <tr>
    <td colspan="5">
	<?php 
	$staffidd=$dq['spentby'];
	 $cinfo = mysql_query("SELECT * FROM personnel WHERE staffid ='$staffidd'") or die(mysql_error());
  	while($cd = mysql_fetch_array($cinfo)){?>
	<table width="100%" class="table table-striped table-condensed" align="center";>
  <tr>
    <td width="22%" align="right"><strong>STAFF NAME: </strong></td>
    <td width="28%"><?php echo $cd['surname']." ".$cd['firstname']." ".$cd['othernames']." / ".$cd['staffid']; ?></td>
    <td width="17%" align="right"><strong>DEPARTMENT:</strong></td>
    <td width="33%"><?php echo $cd['department']; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>TEL. NO: </strong></td>
    <td><?php echo $cd['phoneno']; ?></td>
    <td align="right"><strong>E-MAIL:</strong></td>
    <td><?php echo $cd['email']; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>ADDRESS:</strong></td>
    <td><?php echo $cd['address']; ?></td>
    <td align="right"><strong>UNIT:</strong></td>
    <td><?php echo $cd['designation']; ?></td>
  </tr>
</table>
<?php }  ?>	</td>
  </tr>

  <tr>
    <td colspan="5">DESCRIPTION</td>
	</tr>
  <tr>
    <td colspan="5"><?php echo $dq['description']; ?></td>
  </tr>
  <tr>
    <td colspan="5"><strong>Total Salary: NGN<?php echo number_format($dq['amount'],2); ?> </strong></td>
  </tr>
  <tr>
    <td colspan="5"><strong>Amount in Words:</strong> <?php echo convert_number_to_words($dq['amount']); ?> Naira Only</td></td>
  </tr>
</table>
	<?php } ?>

		<img src="images/kfooter.jpg" style="position:absolute; bottom:0px !important; width:100% !important; z-index:-1;">

	</div>
	
</body>
</html>