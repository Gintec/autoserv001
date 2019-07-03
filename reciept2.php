<?php include_once('kmaccess.php'); ?>

<?php
if(isset($_POST['Pay-Balance'])){
$rid=$_POST['rid']; 
$jobno=$_POST['jobno']; 
$customerid=$_POST['customerid'];
$tamount=$_POST['amount'];
$amountpaid=$_POST['amountpaid'];
$balance = $tamount-$amountpaid;
$title=$_POST['title'];
$invoiceno=$_POST['invoiceno'];
$paymethod=$_POST['paymethod'];
$particulars=$_POST['particulars'];
$datesold = date("Y-m-d");
if(isset($_POST['credit'])){$credit=$_POST['credit'];}elseif($balance>0){$credit="Part Payment";}else{$credit="Not Credit";}

 mysql_query("UPDATE payments SET credit = 'Not Credit' WHERE  rid ='$rid'") or die(mysql_error());
$addsales = mysql_query("INSERT INTO payments VALUES('$customerid','$jobno','$invoiceno','$title','$tamount','$amountpaid','$datesold','$credit','$paymethod','$particulars','0')") or die(mysql_error());
 }

if(isset($_POST['Pay'])){
$jobno=$_POST['jobno']; 
$customerid=$_POST['customerid'];
$tamount=$_POST['amount'];
$amountpaid=$_POST['amountpaid'];
$balance = $tamount-$amountpaid;
$title=$_POST['title'];
$invoiceno=$_POST['invoiceno'];
$paymethod=$_POST['paymethod'];
$particulars=$_POST['particulars'];
if(isset($_POST['credit'])){$credit=$_POST['credit'];}elseif($balance>0){$credit="Part Payment";}else{$credit="Not Credit";}

if(isset($_POST['pay']) && ($_POST['pay']=="Yes")){
	
$gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno' AND status='Pending'") or die(mysql_error()); 
	  while($p = mysql_fetch_array($gps)){
	  $cost = $p['amount'];
	  $qtyo = $p['quantity'];
	  $amount = $p['amount'];
	  
$name = mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0);
$customerid = $p['customerid'];
$jobno = $p['jobno'];
$partd = $p['partsname'];
$partno = $p['partsno'];
$datesold = date("Y-m-d");

  
  $addsales = mysql_query("INSERT INTO sales VALUES('$customerid','$jobno','$partd','$partno','$qtyo','$amount','$datesold','$paymethod','$particulars','0')") or die(mysql_error());
  
 }
 mysql_query("UPDATE partsorder SET status = 'Done' WHERE  jobno ='$jobno'") or die(mysql_error());
 mysql_query("UPDATE jobs SET status = 'Done' WHERE  jobno ='$jobno'") or die(mysql_error()); 
  $addsales = mysql_query("INSERT INTO payments VALUES('$customerid','$jobno','$invoiceno','$title','$tamount','$amountpaid','$datesold','$credit','$paymethod','$particulars','0')") or die(mysql_error());
  
}
}	
if(!isset($_POST['Pay'])){
$jobno = $_GET['jobno'];
$customerid = $_GET['customerid'];
}
if(isset($_POST['Pay-Balance'])){
$jobno = $_POST['jobno'];
$customerid = $_POST['customerid'];
$rid=$_POST['rid']; 
}		
?>
<style>
td{padding:1px !important;
font-size:12px;
}
body{background-image: background-position:center; background-repeat:no-repeat; background-size:full;}
</style>
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
	div.page-break	{ display: none; size: 8.5in 5.5in; page-break-after: always; background-image:url(images/kjfooter.jpg); background-position:bottom; background-repeat:none; background-size:full;  /* width height */}
}

@media print {
	div.page-break	{ display: block; page-break-after: always; page-break-inside: avoid; size: 8.5in 5.5in; margin:auto;  /* width height */ }
}

td{padding:0px !important;padding-left:5px;
font-size:12px;
}
	</style>
<body onLoad="window.print()">
	<div class="page-break">
	<img src="images/kjheader.jpg" style="position:absolute relative; width:100% !important; top:0px; z-index:100">
	<div align="left" class="h3" style="margin-left:5%; margin-right:5%;">RECEIPT <strong style="float:right;">Date: <?php  $datesold = mysql_result(mysql_query("SELECT dated FROM jobs WHERE customerid='$customerid' AND jobno='$jobno' LIMIT 1"),0); echo $datesold; ?></strong></div>
<table width="100%" align="center" class="table table-condensed table-bordered" style="width:90%; background-color:#FFFFFF;">
  
  <tr>
    <td width="23%" align="right" class="h6">Receipt No:</td>
    <td width="27%"><?php echo $jobno; ?></td>
    <td width="23%" align="right" class="h6">Invoice No: </td>
    <td width="27%"><?php echo $invoiceno = mysql_result(mysql_query("SELECT jid FROM jobs WHERE customerid='$customerid' AND jobno='$jobno' LIMIT 1"),0); ?></td>
  </tr>
 
  <tr>
    <td colspan="4">
	<table width="100%" class="table table-striped table-condensed" align="center";>
	<?php 
	 $cinfo = mysql_query("SELECT * FROM contacts WHERE customerid ='$customerid'") or die(mysql_error());
  	while($cd = mysql_fetch_array($cinfo)){?>
	
  <tr>
    <td width="18%" align="right"><strong>Recieved From: </strong></td>
    <td width="32%"><?php echo $cd['name']." / ".$cd['customerid']; ?></td>
</tr>
<?php } ?>
<?php 
$filter="";
if(isset($_GET['rid'])){ $rid = $_GET['rid']; $filter=" AND rid='$rid'";}else{$rid = $_POST['rid']; $filter=" AND rid!='$rid'";} 
	 $cinfo2 = mysql_query("SELECT * FROM payments WHERE customerid ='$customerid' AND jobno='$jobno' $filter") or die(mysql_error());
  	while($cd2 = mysql_fetch_array($cinfo2)){
	$tamount=$cd2['amount'];
$amountpaid=$cd2['amountpaid'];
$title=$cd2['title'];
$invoiceno=$cd2['invoiceno'];
$paymethod=$cd2['paymethod'];
$particulars=$cd2['particulars'];
	?>
  <tr>
    <td width="18%" align="right"><strong>The Sum of: </strong></td>
    <td width="32%"><?php echo strtoupper(convert_number_to_words(round($amountpaid,2)))." NAIRA ONLY. (NGN".number_format($amountpaid).")"; ?></td>
</tr>
 <tr>
    <td width="18%" align="right"><strong>Being payment for: </strong></td>
    <td width="32%"><?php echo $title; ?></td>
</tr>

</table>
</td>
</tr>
	 
      <tr>
        <td align="right">Paid:</td>
        <td><?php echo number_format($amountpaid,2); ?> Naira</td>
        <td align="right">Balance:</td>
        <td><?php echo number_format($tamount - $amountpaid,2); ?> Naira</td>
      </tr>
	  <tr>
        <td align="right">Paymethod:</td>
        <td><?php echo $paymethod; ?></td>
        <td align="right">Payment Particulars:</td>
        <td><?php echo $particulars; ?></td>
      </tr>
      <tr>
        <td align="right"><strong>Customer Sign: </strong></td>
        <td>&nbsp;</td>
        <td align="right"><strong>Manager's Sign:</strong> </td>
        <td><img src="images/sign.jpg" alt="Signature" width="50" height="50"></td>
      </tr>
    </table>	
  <?php }  ?>
<img src="images/kjfooter.jpg" style="bottom:0px !important; width:100% !important; z-index:-1; margin-top:20px;">

	</div>
	
</body>
</html>