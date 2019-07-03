<style>
td{padding:1px !important;
font-size:12px;
}
body{background-image:url(images/invoicebg.jpg); background-position:center; background-repeat:no-repeat; background-size:full;}
</style>
<?php include_once('kmaccess.php'); ?>
<?php
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
	<body onLoad="window.print()">
<table width="100%" align="center" class="table table-condensed table-bordered" style="width:90%;">
  <tr>
    <td height="100" colspan="4"><div align="center"><img src="images/logo.png" alt="KOJO MOTORS" width="403" height="62"></div></td>
  </tr>
  
  <tr>
    <td colspan="4"><div align="center" class="h4">RECIEPT</div></td>
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
</table>
<?php }  ?>	</td>
  </tr>
  <tr>
    <td colspan="4" class="h5"><strong>Payment for the following parts and services:</strong></td>
  </tr>
  <tr>
    <td colspan="4"><table width="80%" align="center" class="table table-striped table-bordered  table-condensed">
      <tr>
        <td width="34%" class="h5"><strong>Part Description </strong></td>
        <td width="11%" class="h5"><strong>Part No </strong></td>
        <td width="11%" class="h5"><strong>Quantity</strong></td>
		<td width="19%" class="h5"><strong>Unit Cost </strong></td>
        <td width="25%" class="h5"><strong>Amount (Naira) </strong></td>
      </tr>
	  <?php $gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); $tamount = 0;
	  while($p = mysql_fetch_array($gps)){
	  $cost = $p['amount'];
	  $qy = $p['quantity'];
	  $tcost = $cost*$qy;
	  $tamount+=$tcost;
	  ?>
      <tr>
        <td><?php echo $p['partsname']; ?></td>
        <td><?php echo $p['partsno']; ?></td>
        <td><?php echo $p['quantity']; ?></td>
		<td><?php echo number_format($p['amount'],2); ?></td>
		<td><?php echo number_format($tcost,2); ?></td>
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
	  <?php $so = mysql_query("SELECT * FROM serviceorder WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); 
	  while($s = mysql_fetch_array($so)){
	   $tamount+=$s['amount']; 
	  ?>
      <tr>
        <td width="35%"><?php echo $s['servicename']; ?></td>
        <td width="40%"><?php echo $s['description']; ?></td>
        <td width="25%"><?php echo number_format($s['amount'],2); ?></td>
      </tr>
	  <?php } ?> 
      <tr>
        <td colspan="2">&nbsp;</td>
        <td class="h3"><?php echo number_format($tamount,2); ?></td>
      </tr>
      <tr>
        <td colspan="3"><strong>Amount in Words:</strong> <?php echo convert_number_to_words($tamount); ?></td>
        </tr>
    </table>	</td>
  </tr>
  <tr>
    <td class="h5"><strong>Paid:  </strong></td>
    <td class="h5">&nbsp;</td>
    <td class="h5">Balance</td>
    <td class="h5">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="middle">Customer Sign: </td>
    <td align="center" valign="middle"><img src="images/sign.jpg" alt="Signature" width="50" height="50"></td>
    <td align="right" valign="middle">Manager Sign: </td>
    <td align="center"><img src="images/sign.jpg" alt="Signature" width="50" height="50"></td>
  </tr>
</table>
<?php } ?>
</body>
</html>