<?php include_once('kmaccess.php'); ?>
<?php
if(isset($_POST['Print-Report'])){
$from = date("Y-m-d",strtotime($_POST['from']));
$to = date("Y-m-d",strtotime($_POST['to']));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOJO MOTORS | ERP SYSTEM</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
	<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
	<body onLoad="window.print()"><br>

	<div align="center"><img src="images/logo2.png" alt="KOJO MOTORS" width="403" height="62"></div>
<h3 align="center">REPORT SHEET<hr />
<?php echo "Duration| From: ".$from." To: ".$to; ?>
</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <tr>
    <td>Date</td>
	<td>Client</td>
    <td>Description</td>
    <td>Quantity</td>
    <td>Amount</td>
    <td>Particulas</td>
  </tr>
</thead>
<tbody>
<?php
$ovtotal = 0;
foreach($_POST['subcategory'] as $salesdesc){

$getrg = mysql_query("SELECT * FROM sales WHERE salesdesc='$salesdesc' AND datesold BETWEEN '$from' AND '$to' ORDER BY salesdesc DESC") or die(mysql_error());
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
    <td><?php echo number_format($rg['amount'],2); ?></td>
    <td><?php echo $rg['particulars']."(".$rg['paymethod'].")"; ?></td>
     </tr>
<?php } ?>
<tr><td colspan="5" class="h3" align="right">Sub Total</td><td><?php $ovtotal+=$tamount; echo "<h4>".number_format($tamount,2)."</h4>"; ?> </td></tr>
<?php } ?>
<tr><td colspan="5" class="h3" align="right">Overall Total</td><td><?php echo "<h4>".number_format($ovtotal,2)."</h4>"; ?> </td></tr>
</tbody>
</table>
<?php } ?>

</div>
</body>
</html>