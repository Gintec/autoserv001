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
<?php
if(isset($_POST['Save'])){
$jobno = validateData($_POST['jobno']);
$customerid = validateData($_POST['customerid']);
$parts = $_POST['parts'];
$services = $_POST['services'];
$pdate = date("Y-m-d");
$s = 0;
foreach( $parts as $pts => $partdesc ) {
$qtyo = $_POST['qty'][$s];
  $partinfo = mysql_query("SELECT * FROM inventory WHERE partdesc ='$partdesc'") or die(mysql_error());
  while($pd = mysql_fetch_array($partinfo)){
  $partd = $pd['partdesc'];
  $partno = $pd['partno'];
  $ucost = $pd['unitcost'];
  $iqty = $pd['quantity'];
  $amount = $ucost*$qtyo;
  
  $order = mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','$partd','$partno','$qtyo','$amount','$pdate','0','Not Purchased')") or die(mysql_error());
  }
  $s++;
  }
  
  foreach( $services as $service => $serviced) {
  $sinfo = mysql_query("SELECT * FROM services WHERE servicename ='$serviced'") or die(mysql_error());
  while($sd = mysql_fetch_array($sinfo)){
  $servicename = $sd['servicename'];
  $description = $sd['description'];
  $cost = $sd['cost'];  
  $sorder = mysql_query("INSERT INTO serviceorder VALUES('$customerid','$jobno','$servicename','$description','$cost','$pdate','0','Not Purchased')") or die(mysql_error());
  }
}
}
if(!isset($jobno)){$jobno=$_GET['jobno'];}
if(!isset($customerid)){$customerid=$_GET['customerid'];}
$getdq = mysql_query("SELECT * FROM diagnosis WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error());
  while($dq = mysql_fetch_array($getdq)){
  $diagnosis = $dq['diagnosis'];
  $problems = $dq['problems'];
  $causes = $dq['causes'];  
$request = $dq['diagnosis'];
  $deliverydate = $dq['deliverydate'];
  $status = $dq['causes'];  
$instructions = $dq['instructions'];
$remarks = $dq['remarks'];
$did = $dq['did'];
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
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<body onLoad="window.print()">
<table width="100%" align="center" class="table table-condensed table-bordered" style="width:90%;">
  <tr>
    <td height="100" colspan="4"><div align="center"><img src="images/logo2.png" alt="KOJO MOTORS" width="403" height="62"></div></td>
  </tr>
  
  <tr>
    <td colspan="4"><div align="center" class="h4">JOB INSTRUCTION</div><a href="invoice2.php?jobno=<?php echo $jobno; ?>&customerid=<?php echo $customerid; ?>" target="_blank" class="btn btn-success btn-sm"><li class="fa fa-print"></li></a></td>
  </tr>
 
  <tr>
    <td width="23%" align="right" class="h6">Delivery Date:</td>
    <td width="27%"><?php echo $deliverydate; ?></td>
    <td width="23%" align="right" class="h6">Job No: </td>
    <td width="27%"><?php echo $jobno; ?></td>
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
    <td width="35%"><?php echo $cd['name']." / ".$cd['organization']; ?></td>
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
    <td colspan="4" class="h5"><strong>Inspection/Observation:</strong></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $diagnosis; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Problems:</strong></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $problems; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Causes:</strong></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $causes; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="style2">Customer Request: </td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $request; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Parts to be Used:</strong></td>
  </tr>
  <tr>
    <td colspan="4"><table width="80%" align="center" class="table table-striped table-bordered  table-condensed">
      <tr>
        <td width="52%" class="h5"><strong>Part Description </strong></td>
        <td width="21%" class="h5"><strong>Part No </strong></td>
        <td width="27%" class="h5"><strong>Quantity</strong></td>
      </tr>
	  <?php $gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); 
	  while($p = mysql_fetch_array($gps)){?>
      <tr>
        <td><?php echo $p['partsname']; ?></td>
        <td><?php echo $p['partsno']; ?></td>
        <td><?php echo $p['quantity']; ?></td>
      </tr>
	  <?php } ?>
   
    </table></td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Services to be carried out: </strong></td>
  </tr>
  <tr>
    <td colspan="4">
	<table width="80%" align="center"  class="table table-striped table-bordered  table-condensed">
      <tr>
        <td class="h5"><strong>Service </strong></td>
        <td class="h5"><strong>Description</strong></td>
        </tr>
	  <?php $so = mysql_query("SELECT * FROM serviceorder WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); 
	  while($s = mysql_fetch_array($so)){?>
      <tr>
        <td><?php echo $s['servicename']; ?></td>
        <td><?php echo $s['description']; ?></td>
        </tr>
	  <?php } ?>
    </table>	</td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Instructions: </strong></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $instructions; ?></td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Other Notes:  </strong></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $remarks; ?></td>
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