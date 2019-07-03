<?php include_once('kmaccess.php'); ?>
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
<?php
if(!isset($shid)){$shid=$_GET['shid'];}
if(!isset($customerid)){$customerid=$_GET['customerid'];}
$getdq = mysql_query("SELECT * FROM schedule WHERE customerid ='$customerid' AND shid='$shid'") or die(mysql_error());
  while($dq = mysql_fetch_array($getdq)){
  $customerid = $dq['customerid'];
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
	<body onLoad="window.print()">
<table width="100%" align="center" class="table table-condensed table-bordered" style="width:90%;">
  <tr>
    <td height="100" colspan="4"><div align="center"><img src="images/logo2.png" alt="KOJO MOTORS" width="376" height="85"></div></td>
  </tr>
  
  <tr>
    <td colspan="4"><div align="center" class="h4">SCHEDULE/APPOINTMENT</div></td>
  </tr>
 
  <tr>
    <td width="23%" align="right" class="h6">Appointment Dat e:</td>
    <td width="27%"><?php echo $dq['nextappointment']; ?></td>
    <td width="23%" align="right" class="h6">Job No: </td>
    <td width="27%"><?php echo $dq['jobno']; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="h6"><div align="center">CUSTOMER DETAILS</div></td>
  </tr>
  <tr>
    <td colspan="4">
	<?php 
	 $cinfo = mysql_query("SELECT * FROM contacts WHERE customerid ='$customerid'") or die(mysql_error());
  	while($cd = mysql_fetch_array($cinfo)){?>
	<table width="100%" class="table table-striped table-condensed" align="center";>
  <tr>
    <td width="18%" align="right"><strong>Customer Name/ID: </strong></td>
    <td width="32%"><?php echo $cd['name']." / ".$cd['customerid']; ?></td>
    <td width="15%" align="right"><strong>Organization:</strong></td>
    <td width="35%"><?php echo $cd['organization']; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>Phone No: </strong></td>
    <td><?php echo $cd['telephoneno']; ?></td>
    <td align="right"><strong>E-mail:</strong></td>
    <td><?php echo $cd['email']; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>Address:</strong></td>
    <td><?php echo $cd['address']; ?></td>
    <td align="right"><strong>Notes:</strong></td>
    <td><?php echo $cd['remarks']; ?></td>
  </tr>
</table>
<?php }  ?>	</td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Schedule Type :</strong></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $dq['scheduletype']; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Location/Address :</strong></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $dq['location']; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Description:</strong></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $dq['description']; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Services to be carried out: </strong></td>
  </tr>
  <tr>
    <td colspan="4">
	<?php echo $dq['services']; ?>
	</td>
  </tr>
  <tr>
    
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="right" valign="middle">Signed By: </td>
    <td align="center"><img src="images/sign.jpg" alt="Signature" width="50" height="50"></td>
  </tr>
</table>
<?php } ?>
</body>
</html>