
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
	<div align="left" class="h3" style="margin-left:5%; margin-right:5%;">SERVICE ESTIMATE <strong style="float:right;font-size:13px;">Date:  <?php echo mysql_result(mysql_query("SELECT dated FROM jobs WHERE jobno='$jobno' LIMIT 1"),0); ?></strong></div>
	<table width="100%" align="center" class="table table-condensed table-bordered" style="width:90%; z-index:1000000000; background-color:#FFFFFF;">

  
  <tr>
    <td colspan="5" class="h6"><div align="center">CUSTOMER DETAILS</div></td>
  </tr>
  <tr>
    <td colspan="5">
	<?php 
	 $cinfo = mysql_query("SELECT * FROM contacts WHERE customerid ='$customerid'") or die(mysql_error());
  	while($cd = mysql_fetch_array($cinfo)){
	$sundry = $cd['sundry'];
	$vatc = $cd['vat'];
	?>
	<table width="100%" class="table table-striped table-condensed" align="center";>
  <tr>
    <td width="22%" align="right"><strong>CUSTOMER NAME: </strong></td>
    <td width="28%"><?php echo $cd['name']." / ".$cd['customerid']; ?></td>
    <td width="17%" align="right"><strong>ORGANIZATION:</strong></td>
    <td width="33%"><?php echo $cd['name']." / ".$cd['organization']; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>TEL. NO: </strong></td>
    <td><?php echo $cd['telephoneno']; ?></td>
    <td align="right"><strong>E-MAIL:</strong></td>
    <td><?php echo $cd['email']; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>ADDRESS:</strong></td>
    <td><?php echo $cd['address']; ?></td>
    <td align="right"><strong>REMARKS:</strong></td>
    <td><?php echo $cd['remarks']; ?></td>
  </tr>
<?php  $jobno; $ji = mysql_query("SELECT vregno,chasisno,modelname,vin,modelno FROM vehicles WHERE vregno='$remarks'") or die(mysql_error()); while($j = mysql_fetch_row($ji)){ ?>
  <tr>
    <td align="right"><strong>VEHICLE REG NO: </strong></td>
    <td><?php echo $j[0]; ?></td>
    <td align="right"><strong>MILEAGE READING </strong></td>
    <td><?php echo $j[3]; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>VIN/CHASIS NO: </strong></td>
    <td><?php echo $j[1]; ?></td>
    <td align="right"><strong>VEHICLE MAKE: </strong></td>
    <td><?php echo $j[2]; ?> (M.No: <?php echo $j[4]; ?>)</td>
  </tr>
<?php } ?>
</table>
<?php }  ?>	</td>
  </tr>

  <tr>
    <td colspan="5">
	<table width="80%" align="center" class="table table-striped table-bordered  table-condensed">
      <tr>
        <td width="34%" class="h5"><strong>DESCRIPTION / SPARE PARTS </strong></td>
        <td width="11%" class="h5"><strong>QTY</strong></td>
        <td width="20%" class="h5"><strong>UNIT PRICE </strong></td>
		<td class="h5"><strong>AMOUNT</strong></td>
        <td class="h5"><strong>REMARKS</strong></td>
      </tr>
	  <?php $gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno' AND partsname!='Discount' AND partsname!='Labour'") or die(mysql_error()); $tamount = 0;
	  while($p = mysql_fetch_array($gps)){
	  $cost = $p['amount'];
	  $qy = $p['quantity'];
	  $status = $p['status'];
	  if($cost && $qy>0){
	  $ucost = $cost/$qy;
	  }else{$ucost="-"; }
	  $tamount+=$cost;
	  ?>
      <tr>
        <td><?php echo $p['partsname']; ?></td>
        <td><?php if($p['quantity']<1){echo "";}else{ echo $p['quantity'];} ?></td>
        <td><?php if($ucost=="-"){echo "";}else{echo number_format($ucost,2);} ?></td>
		<td><?php echo number_format($cost,2); ?></td>
		<td>&nbsp;</td>
      </tr>

      
	  <?php } ?>
	  <tr>
        <td colspan="3">Sundry</td>
        <td><?php $tamount+=$sundry; echo number_format($sundry,2); ?></td>
		<td>&nbsp;</td>
      </tr>
	  	<tr>
        <td colspan="3">Labour </td>
        <td><?php echo $lb= mysql_result(mysql_query("SELECT amount FROM partsorder WHERE jobno='$jobno' AND partsname='Labour' AND customerid='$customerid' LIMIT 1"),0); $tamount+=$lb; ?></td>
		<td>&nbsp;</td>
      </tr>
	  
	  <tr>
        <td colspan="3">VAT (<?php echo $vatc; ?>%)</td>
        <td><?php $vat = ($tamount/100)*$vatc; echo number_format($vat,2); $tamount+=$vat; ?></td>
		<td>&nbsp;</td>
      </tr>
	  <?php 
	  $discount = mysql_result(mysql_query("SELECT amount FROM partsorder WHERE jobno='$jobno' AND partsname='Discount' AND customerid='$customerid' LIMIT 1"),0); if($discount!="0"){?>
	  <tr>
        <td colspan="3">Discount  (<?php echo $discount; ?>%)</td>
        <td><?php $disc = ($tamount/100)*$discount; echo number_format($disc,2); $tamount-=$disc; ?></td>
		<td>&nbsp;</td>
      </tr>
	  <?php } ?>
	  	  <tr>
        <td colspan="3" class="h4">Total</td>
        <td class="h4"><?php echo number_format($tamount,2); ?></td>
		<td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5"><strong>Amount in Words:</strong> <?php echo strtoupper(convert_number_to_words(round($tamount,2)));  if (strpos($tamount, '.') !== false) {
    echo " KOBO";}else{echo " NAIRA"; } ?> ONLY
</td>
        </tr>
    </table>	</td>
  </tr>
  <tr style="border:none !important;">
    <td colspan="4" valign="bottom" class="h5"><p>&nbsp;</p>
      <strong style="float:left">SERVICE MANAGER: ...........................................</strong>
      <strong style="float:right;">CUSTOMER NAME:
      .............................................</strong> </td>
    </tr>
  <tr>
    <td colspan="4" align="right" class="h5"><p>&nbsp;</p>
      <strong style="float:right">SIGNATURE / DATE: 
      .............................................</strong></td>
    </tr>
  <tr>
    <td colspan="4"><strong>TERMS OF PAYMENT:</strong> CASH OR CHEQUE/DRAFT IN FAVOUR OF <strong>KOJO AUTO SERVICE CENTRE LTD</strong> </td>
  </tr>
  <tr>
    <td colspan="4"><strong>VALIDITY:</strong> THIS INVOICE/ESTIMATE IS VALID FOR <strong>7 DAYS</strong> FROM DATE OF RECEIPT </td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="middle"><p><strong>ACCOUNT DETAILS:</strong></p>
      <p>ACCOUNT NAME: <strong>Kojo Auto Service Centre Ltd<br>
  </strong>ACCOUNT NUMBER:<strong> 1012747804<br>
  </strong>BANK NAME:<strong> Zenith Bank<br>
  </strong>SORT CODE:<strong> 057080183<br>
  </strong>TIN NUMBER:<strong> 11190736-0001</strong></p></td>
  </tr>
</table>
<?php } ?>

		<img src="images/kfooter2.jpg" style="position:absolute; bottom:0px !important; width:100% !important; z-index:-1;">

	</div>
	
</body>
</html>