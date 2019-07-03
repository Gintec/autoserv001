<style>
td{padding:1px !important;
font-size:12px;
}
body{background-image:url(images/invoicebg.jpg); background-position:center; background-repeat:no-repeat; background-size:full;}
</style>
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
	<body onLoad="window.print()">
<table width="100%" align="center" class="table table-condensed table-bordered" style="width:98%;">
  <tr>
    <td width="100%" height="100"><div align="center"><img src="images/logo2.png" alt="KOJO MOTORS" width="403" height="62"></div></td>
  </tr>
  
  <tr>
    <td>

	<div align="center" class="h4">CUSTOMER INFORMATION</div></td>
  </tr>
  <tr>
    <td>
	<?php 
	$customerid=$_GET['customerid'];
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
    <td class="h5"><strong>JOBS DONE/PENDING</strong></td>
  </tr>
  <tr>
    <td>
	
	<br />
<br />

<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;">
                                    <thead>
  <tr>
  <td width="6%">I.No</td>
    
    <td width="21%">Vehicle Description</td>
    <td width="6%">Date</td>
	<td width="11%">Status</td>
	<td width="7%">Amount</td>
    <td width="35%">Action</td>
  </tr>
</thead>
<tbody>
<?php
$getrg = mysql_query("SELECT * FROM jobs WHERE customerid='$customerid' ORDER BY dated DESC") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
  <td><?php echo $rg['jid']; ?></td>
    
    <td><?php echo $rg['description']; ?></td>
    <td><?php echo $rg['dated']; ?></td>
    <td>
	<?php echo $rg['status']; ?>
	</td>
	<td><?php echo $rg['amount']; ?></td>
    <td><div class="btn-group">
	
	<a href="jobinstruction.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-warning btn-sm">Instruction</a>
	<a href="jobestimate.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-success btn-sm">Estimate</a>
	<a href="invoice2.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-primary btn-sm">Invoice</a>	
	<a href="reciept2.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-warning btn-sm">Receipt</a>
	<a href="jobextra.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-info btn-sm">Job Update</a>
	<a href="jobdetail.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-info btn-sm">Detail</a>
	</div>
	</td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>
	
	</td>
  </tr>
  
 
</table>

</body>
</html>