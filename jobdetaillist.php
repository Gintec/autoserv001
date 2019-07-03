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
    <td width="35%">Print</td>
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
	<td><?php echo $rg['amount']; ?></td>
    <td><div class="btn-group">
	<a href="jobestimate.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-success btn-sm">Estimate</a>
	<a href="invoice2.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-primary btn-sm">Invoice</a>	
	<a href="reciept2.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-warning btn-sm">Receipt</a>
	</div>
	</td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>