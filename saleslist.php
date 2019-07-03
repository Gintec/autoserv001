<br>
<br>
<h3 align="center">ALL PARTS SALES</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <tr>
    <td>Date</td>
	<td>Customer/ID/JobNo</td>
    <td>Description</td>
    <td>Quantity</td>
    <td>Amount</td>
    <td>Particulas</td>
    
  </tr>
</thead>
<tbody>
<?php
$getrg = mysql_query("SELECT * FROM sales WHERE salesdesc!='Labour' AND salesdesc!='Discount' ORDER BY DATE(datesold) DESC") or die(mysql_error());
$tamount = 0;
while($rg = mysql_fetch_array($getrg)){
$customerid = $rg['customerid'];
$tamount+=$rg['amount'];
?>

  <tr>
      <td><?php echo $rg['datesold']; ?></td>
    <td><?php echo $customername = mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0)." (".$rg['customerid']." / ".$rg['jobid'].")"; ?></td>
    <td><?php echo $rg['salesdesc']." (".$rg['partno'].")"; ?></td>
    <td><?php echo $rg['quantity']; ?></td>
    <td><?php echo $rg['amount']; ?></td>
    <td><?php echo $rg['particulars']."(".$rg['paymethod'].")"; ?></td>
    
  </tr>
<?php } ?>
</tbody>
</table>
<?php echo "<hr /><h4>Total Sales Amount: <strike>N</strike>".$tamount."</h4>"; ?> 

</div>