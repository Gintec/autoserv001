<br />
<br />

<h3 align="center">ALL PENDING ORDERS</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <tr>
    <td><strong>Contact Name</strong></td>
    <td><strong>Job No</strong></td>
    <td><strong>Parts</strong></td>
    <td><strong>Part No</strong></td>
    <td><strong>Quantity</strong></td>
    <td><strong>Date</strong></td>
	<td><strong>Status</strong></td>
  </tr>
</thead>
<tbody>
<?php
$getrg = mysql_query("SELECT * FROM partsorder WHERE status='Not Purchased' ORDER BY pdate DESC") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
    <td><?php echo $rg['customerid']; ?></td>
    <td><?php echo $rg['jobno']; ?></td>
    <td><?php echo $rg['partsname']; ?></td>
    <td><?php echo $rg['partsno']; ?></td>
    <td><?php echo $rg['quantity']; ?></td>
	<td><?php echo $rg['pdate']; ?></td>
    <td><?php echo $rg['status']; ?></td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>