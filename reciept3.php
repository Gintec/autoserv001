<?php include_once('kmaccess.php'); ?>
<?php
if(isset($_POST['save1'])){
$name = validateData($_POST['name']);
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$paymethod = validateData($_POST['paymethod']);
$particulars = validateData($_POST['particulars']);
$datesold = date("Y-m-d",strtotime($_POST['datesold']));
$parts = $_POST['parts'];
$partcount = 0;
$s=0;
foreach( $parts as $pts => $partdesc ) {
$qtyo = $_POST['qty'][$s];
$amt = $_POST['amount'][$s];
$ammt = $qtyo*$amt;
  $partinfo = mysql_query("SELECT * FROM inventory WHERE partdesc ='$partdesc'") or die(mysql_error());
  if(mysql_num_rows($partinfo)<1){
  
  $order = mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','$partdesc','-','$qtyo','$ammt','$datesold','0','Pending')") or die(mysql_error());
  
  }else{
  while($pd = mysql_fetch_array($partinfo)){
  $partd = $pd['partsname'];
  $partno = $pd['partno'];

  $iqty = $pd['quantity'];
  $amount = $pd['amount'];
  
  mysql_query("UPDATE IGNORE inventory SET quantity = quantity - $iqty WHERE  partdesc ='$partdesc'") or die(mysql_error());
  $ucost = $amount/$iqty;
  
  $addsales = mysql_query("INSERT INTO sales VALUES('$customerid','$jobno','$partd','$partno','$iqty','$amount','$datesold','$paymethod','$particulars','0')") or die(mysql_error());
}
}
}
if(isset($addsales)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Sales </b>recorded <b>successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
Add a new one.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }	include_once('newsales.php'); exit;}elseif(isset($_POST['savenext'])){

$name = validateData($_POST['name']);
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$paymethod = validateData($_POST['paymethod']);
$particulars = validateData($_POST['particulars']);
$datesold = date("Y-m-d",strtotime($_POST['datesold']));
$parts = $_POST['parts'];
$partcount = 0;
$s=0;
foreach( $parts as $pts => $partdesc ) {
$qtyo = $_POST['qty'][$s];
$amt = $_POST['amount'][$s];
$ammt = $qtyo*$amt;
  $partinfo = mysql_query("SELECT * FROM inventory WHERE partdesc ='$partdesc'") or die(mysql_error());
  if(mysql_num_rows($partinfo)<1){
  
  $order = mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','$partdesc','-','$qtyo','$ammt','$datesold','0','Pending')") or die(mysql_error());
  
  }else{
  while($pd = mysql_fetch_array($partinfo)){
  $partd = $pd['partsname'];
  $partno = $pd['partno'];

  $iqty = $pd['quantity'];
  $amount = $pd['amount'];
  
  mysql_query("UPDATE IGNORE inventory SET quantity = quantity - $iqty WHERE  partdesc ='$partdesc'") or die(mysql_error());
  $ucost = $amount/$iqty;
  
  $addsales = mysql_query("INSERT INTO sales VALUES('$customerid','$jobno','$partd','$partno','$iqty','$amount','$datesold','$paymethod','$particulars','0')") or die(mysql_error());
}
}
}
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
    <td width="23%" align="right" class="h6"></td>
    <td width="27%"></td>
    <td width="23%" align="right" class="h6">Job No: </td>
    <td width="27%"><?php echo $jobno; ?></td>
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
$getrg = mysql_query("SELECT SUM(amount) FROM sales WHERE status='Done' AND jobno='$jobno'") or die(mysql_error());
while($rg = mysql_fetch_row($getrg)){
?>
  <tr>
    <td width="18%" align="right"><strong>The Sum of: </strong></td>
    <td width="32%"><?php echo convert_number_to_words($rg[0])." (".number_format($rg[0]).")"; ?></td>
</tr>
 <tr>
    <td width="18%" align="right"><strong>Being payment for: </strong></td>
    <td width="32%"> Job No <?php echo $rg['jobno']; ?></td>
</tr>
<?php }  ?>	
</table>
</td>
</tr>
	 
      <tr>
        <td align="right">Paid:</td>
        <td>&nbsp;</td>
        <td align="right">Balance:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Customer Sign: </strong></td>
        <td>&nbsp;</td>
        <td align="right"><strong>Manager's Sign:</strong> </td>
        <td><img src="images/sign.jpg" alt="Signature" width="50" height="50"></td>
      </tr>
    </table>	
  <?php } ?>
<img src="images/kjfooter.jpg" style="bottom:0px !important; width:100% !important; z-index:-1; margin-top:20px;">

	</div>
	
</body>
</html>