<br />
<br />

<h3 align="center">ALL PENDING SERVICES </h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <tr>
    <td>Contact Name</td>
    <td>Job No</td>
    <td>Description</td>
    <td>Date</td>
	<td>Amount</td>
	<td>Status</td>
    <td>Cancel</td>
  </tr>
</thead>
<tbody>
<?php
$getrg = mysql_query("SELECT * FROM serviceorder ORDER BY sdate DESC") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
    <td><?php echo $rg['customerid']; ?></td>
    <td><?php echo $rg['jobno']; ?></td>
    <td><?php echo $rg['servicename']; ?></td>
	<td><?php echo $rg['sdate']; ?></td>

	<td><?php echo number_format($rg['amount'],2); ?></td>
	<td><?php echo $rg['status']; ?></td>
    <td><div class="btn-group">
	<a href="invoice2.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn btn-success btn-sm">Invoice</a>
	<a href="jobinstruction.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" class="btn btn-warning btn-sm">Job Instruction</a>
	</td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>