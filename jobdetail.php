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

td{padding:0px !important;
font-size:12px;
}
	</style>
<body onLoad="window.print()">
	<div class="page-break">
	<img src="images/KT.jpg" style="position:absolute relative; width:100% !important; top:0px; z-index:100">
	<div align="left" class="h3" style="margin-left:5%; margin-right:5%;">JOB ORDER DETAILS <strong style="float:right; font-size:13px;">Date: <?php echo date("dS M, Y"); ?></strong></div>


<?php 
if(isset($_GET['customerid'])){$customerid = $_GET['customerid']; $jobno = $_GET['jobno']; 
$getvd = mysql_query("SELECT * FROM jobextra WHERE jobno='$jobno'") or die(mysql_error());
while($vd = mysql_fetch_array($getvd)){
 ?> 

<?php 
	 $cinfo = mysql_query("SELECT * FROM contacts WHERE customerid ='$customerid'") or die(mysql_error());
  	while($cd = mysql_fetch_array($cinfo)){
	
	?>	
	<table width="100%" class="table table-striped" style="background-color:#FFFFFF; width:90%;" align="center">
	
<tr>
    <td align="right" colspan="4">


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
<?php  $ji = mysql_query("SELECT vregno,chasisno,modelname,vin FROM vehicles WHERE jobno='$jobno'") or die(mysql_error()); while($j = mysql_fetch_row($ji)){$detail = "Reg No: <strong>".$j[0]."</strong><br /> Chasis No: <strong>".$j[1]."</strong><br />Make: <strong>".$j[2]."</strong>"; ?>
  <tr>
    <td align="right"><strong>VEHICLE REG NO: </strong></td>
    <td><?php echo $j[0]; ?></td>
    <td align="right"><strong>MILEAGE READING </strong></td>
    <td><?php echo $j[3]; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>VIN/MODEL NO: </strong></td>
    <td><?php echo $j[2]; ?></td>
    <td align="right"><strong>VEHICLE MAKE: </strong></td>
    <td><?php echo $j[1]; ?></td>
  </tr>
<?php } ?>
</table>
<?php }  ?></td></tr>	

<tr>
<td colspan="4">
<table class="table table-striped">
<tr>
        <td>Customer Complain</td>
        <td>Problems</td>
      </tr>
<?php $gps = mysql_query("SELECT * FROM diagnosis WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); 
	  while($p = mysql_fetch_array($gps)){?>
      <tr>
        <td><?php echo $p['diagnosis']; ?></td>
       
        <td><?php echo $p['problems']; ?></td>
      </tr>
	  <?php } ?>
</table>
<table class="table table-striped">
<tr>
        <td>Job Details/Parts Used</td>
        <td>Quantity</td>
      </tr>
<?php $gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno' AND partsname!='Labour' AND partsname!='Discount'") or die(mysql_error()); 
	  while($p = mysql_fetch_array($gps)){?>
      <tr>
        <td><?php echo $p['partsname']; ?></td>
       
        <td><?php echo $p['quantity']; ?></td>
      </tr>
	  <?php } ?>
</table>
</td>
</tr>


  <tr>
    <td colspan="2"><strong>Predelivery Confirmation:</strong></td>
    <td colspan="2"><strong>Result Explanation</strong></td>
    </tr>
  <tr>
    <td colspan="2"><strong><?php echo $vd['predelivery']; ?></strong></td>
    <td colspan="2"><strong><?php echo $vd['resultexp']; ?></strong></td>
    </tr>
  <tr>
    <td width="31%" align="right" bgcolor="#F2AAAC">Job Completion Notification:</td>
    <td width="23%"><?php echo $vd['notificationtime']; ?></td>
    <td width="26%" align="right" bgcolor="#F2AAAC">Delivery Date/Time:</td>
    <td width="20%"><?php echo $vd['deliverytime']; ?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F2AAAC">Delivered To:</td>
    <td><?php echo $vd['deliveredto']; ?></td>
    <td align="right" bgcolor="#F2AAAC">PSFU (Plan) DateTime:</td>
    <td><?php echo $vd['fudatetime']; ?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F2AAAC">Contact Phone Number:</td>
    <td><?php echo $vd['phoneno']; ?></td>
    <td align="right" bgcolor="#F2AAAC">PSFU Name:</td>
    <td><?php echo $vd['funame']; ?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F2AAAC">Contact E-mail:</td>
    <td><?php echo $vd['email']; ?></td>
    <td align="right" bgcolor="#F2AAAC"><strong>PSFU (GJ):</strong></td>
    <td><?php echo $vd['psfu']; ?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#F2AAAC">Staff Name:</td>
    <td><?php echo $vd['staffname']; ?></td>
    <td align="right" bgcolor="#F2AAAC">Confirmed By:</td>
    <td><?php echo $vd['confirmedby']; ?></td>
  </tr>
</table>

<?php }}?>
            
					<img src="images/kfooter.jpg" style="position:absolute; bottom:0px !important; width:100% !important; z-index:-1;">

	</div>
	
</body>
</html>