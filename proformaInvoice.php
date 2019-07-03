<?php include_once('kmaccess.php'); ?>
<?php
if(isset($_POST['Save'])){
//Store to variales
$jobno = validateData($_POST['jobno']);
$vregno = "Proformer Invoice";
$discount = validateData($_POST['discount']);
$vatc = validateData($_POST['vatc']);
$customerid = validateData($_POST['customerid']);
$parts = $_POST['parts'];

$pdate = date("Y-m-d");
$s = 0;
$tamount=0;

//Store each parts in the parts order table
foreach( $parts as $pts => $partdesc ) {
$qtyo = str_replace(",","",$_POST['qty'][$s]);
$amt = str_replace(",","",$_POST['amt'][$s]);
$ammt = $qtyo*$amt;
  $partinfo = mysql_query("SELECT * FROM inventory WHERE partdesc ='$partdesc'") or die(mysql_error());
  if(mysql_num_rows($partinfo)<1){
  if($ammt==""){
  $amount = 0;
  }else{$amount = $ammt;}
  $tamount+=$amount;
  $order = mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','$partdesc','-','$qtyo','$ammt','$pdate','0','Pending')") or die(mysql_error());
  
  }else{
  while($pd = mysql_fetch_array($partinfo)){
  
  $partd = $pd['partdesc'];
  $partno = $pd['partno'];
  $ucost = $pd['unitcost'];
  $iqty = $pd['quantity'];
  if($ammt==""){
  $amount = $ucost*$qtyo;
  }else{$amount = $ammt;}
  $tamount+=$amount;
  $order = mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','$partd','$partno','$qtyo','$amount','$pdate','0','Pending')") or die(mysql_error());
  }}
  $s++;
  }
  

mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','Discount','-','0','$discount','$pdate','0','Pending')") or die(mysql_error());

$dtamount_value = ($tamount/100)*$discount;
$dtamount = $tamount - $dtamount_value;

$vat = (($dtamount)/100)*$vatc;  

//Get the total charge including VAT and Sundry
$ototal = $dtamount+$vat;
$description = "Proforma Invoice"; }

  mysql_query("DELETE FROM jobs WHERE customerid='$customerid' AND jobno='$jobno'") or die(mysql_error());
//Store the jobs on the job order table
mysql_query("INSERT INTO jobs VALUES('$customerid','$jobno','$description','$pdate','Pending','$ototal','0')") or die(mysql_error());

 mysql_query("DELETE FROM partsorder WHERE partsname=''") or die(mysql_error());  


if(!isset($jobno)){$jobno=$_GET['jobno'];}
if(!isset($customerid)){$customerid=$_GET['customerid'];}?>

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
	<div align="left" class="h3" style="margin-left:5%; margin-right:5%;">PROFORMA INVOICE  <strong style="float:right;font-size:13px;">Date: <?php echo date("dS M, Y"); ?></strong></div>
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
<?PHP 	  $discount = mysql_result(mysql_query("SELECT amount FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno' AND partsname='Discount' LIMIT 1"),0); ?>
  <tr>
    <td colspan="5">
	<table width="80%" align="center" class="table table-striped table-bordered  table-condensed">
      <tr>
        <td width="34%" class="h5"><strong>S/NO </strong></td>
		<td width="34%" class="h5"><strong>DESCRIPTION / SPARE PARTS </strong></td>
        <td width="11%" class="h5"><strong>QTY</strong></td>
        <td width="20%" class="h5"><strong>UNIT PRICE </strong></td>
		<td width="20%" class="h5"><strong><?php echo $discount; ?>%<br>DISCOUNT </strong></td>
		<td width="20%" class="h5"><strong>UNIT PRICE <br>AFTER DISCOUNT </strong></td>
		<td class="h5"><strong>AMOUNT</strong></td>
        
      </tr>
	  <?php 
	  $sn=0; 
	  $tamount = 0;
	  $gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno' AND partsname!='Discount'") or die(mysql_error()); $tamount = 0;
	  while($p = mysql_fetch_array($gps)){
	  $cost = $p['amount'];
	  $qy = $p['quantity'];
	  $status = $p['status'];
	  if($cost && $qy>0){
	  $ucost = $cost/$qy;
	  }else{$ucost="-"; }
	  
	  $sn++;
	  ?>
      <tr>
	  <td><?php echo $sn; ?></td>
        <td><?php echo $p['partsname']; ?></td>
        <td><?php if($p['quantity']<1){echo "";}else{ echo $p['quantity'];} ?></td>
        <td><?php echo number_format($ucost,2); ?></td>
		<td><?php $idiscountcheck = ($ucost*$discount)/100;  echo number_format($idiscountcheck,2); ?></td>
		<td><?php $ducost = $ucost-$idiscountcheck; echo number_format($ducost,2);  ?></td>
		
		<td><?php $realcost = $ducost*$qy; echo number_format($realcost,2); $tamount+=$realcost; ?></td>
		
      </tr>

      
	  <?php } ?>
	  <tr>
        <td colspan="6">SUB TOTAL</td>
        <td><?php echo number_format($tamount,2); ?></td>
		
      </tr>
	  <tr>
        <td colspan="6">VAT (5%)</td>
        <td><?php $vat = ($tamount/100)*5; echo number_format($vat,2); $tamount+=$vat; ?></td>
		
      </tr>
	  	  <tr>
        <td colspan="6" class="h4">Total</td>
        <td class="h4"><?php echo number_format($tamount,2); ?></td>
      </tr>
      <tr>
        <td colspan="6"><strong>Amount in Words:</strong> <?php echo strtoupper(convert_number_to_words($tamount));  if (strpos($tamount, '.') !== false) {
    echo " KOBO";}else{echo " NAIRA"; } ?> ONLY</td>
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