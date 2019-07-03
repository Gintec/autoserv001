<br />
<br />

<h3 align="center">ALL JOBS DONE</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;">
                                    <thead>
  <tr>
  <td width="6%">I.No</td>
    <td width="14%">Contact Name</td>
    <td width="21%">Vehicle Description</td>
    <td width="6%">Date</td>
	<td width="11%">Status</td>
	<td width="7%">Amount</td>
    <td width="35%">Action</td>
  </tr>
</thead>
<tbody>
<?php
$getrg = mysql_query("SELECT * FROM jobs WHERE status='Done' ORDER BY dated DESC") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
  <td><?php echo $rg['jid']; ?></td>
    <td><?php $cid = $rg['customerid']; $ci = mysql_query("SELECT name,organization FROM contacts WHERE customerid='$cid'") or die(mysql_error()); while($c = mysql_fetch_row($ci)){echo $c[0]." (".$c[1].")"; }?></td>
    <td><?php echo $rg['description']; ?></td>
    <td><?php echo $rg['dated']; ?></td>
    <td>
	<?php echo $rg['status']; ?>
	</td>
	<td><?php echo number_format($rg['amount'],2); ?></td>
    <td><div class="btn-group">
	<?php if($_SESSION['designation']=="Spare Parts / Store"){?>
	<a href="confirminventory.php?jobno=<?php $jobno = $rg['jobno']; echo $rg['jobno']; ?>&customerid=<?php $customerid=$rg['customerid']; echo $rg['customerid']; ?>" class="btn-group btn-success btn-sm">Confirm Parts</a>
	
	<?php } ?>
	
	<a href="jobestimate.php?jobno=<?php $jobno = $rg['jobno']; echo $rg['jobno']; ?>&customerid=<?php $customerid=$rg['customerid']; echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-success btn-sm">Estimate</a>
	<a href="invoice2.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-primary btn-sm">Invoice</a>	
	<a href="reciept2.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>&rid=<?php echo $rid = mysql_result(mysql_query("SELECT rid FROM payments WHERE customerid='$customerid' AND jobno='$jobno' LIMIT 1"),0); ?>" target="_blank" class="btn-group btn-warning btn-sm">Receipt</a>
	<?php if($_SESSION['designation']=="Customer Service" || $_SESSION['designation']=="Administrator" && $rg['jid']!=0){
	$checkj = mysql_result(mysql_query("SELECT jobno FROM jobextra WHERE jobno='$jobno'"),0);
if($checkj==$jobno){echo "<small>PSFU Done</small>";}else{?>	
		<a href="psfu.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-info btn-sm">PSFU</a>
		
		<?php } ?>
		<a href="jobextra.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-primary btn-sm">Job Update</a>
	<a href="jobdetail.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-info btn-sm">Detail</a>
	<a href="jobinstruction.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-warning btn-sm">Instruction</a>
	
	<?php } 
	if($_SESSION['department']=="Front Desk" || $_SESSION['designation']=="Administrator"){ ?>
	<form action="certificate.php" method="post" enctype="multipart/form-data" name="certificate" target="_blank">
	<input name="jobno" type="hidden" value="<?php echo $rg['jobno']; ?>" />
	<input name="customerid" type="hidden" value="<?php echo $rg['customerid']; ?>" />
	<input name="title" type="text" placeholder="Cert. Receiver Title" />
<input name="Go" type="submit" value="Go" />	</form>
	<?php } ?>
	</div>
	</td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>