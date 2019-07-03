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
	<td>Status</td>
  </tr>
</thead>
<tbody>
<?php
$getrg = mysql_query("SELECT * FROM partsorder ORDER BY pdate DESC") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
    <td><?php echo $rg['customerid']; ?></td>
    <td><?php echo $rg['jobno']; ?></td>
    <td><?php echo $rg['servicename']; ?></td>
	<td><?php echo $rg['pdate']; ?></td>
	<td><?php echo number_format($rg['amount'],2); ?></td>
	<td><?php echo $rg['status']; ?></td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>