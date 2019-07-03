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
	<body onLoad="window.print()"><br>

	<div align="center"><img src="images/logo2.png" alt="KOJO MOTORS" width="403" height="62"></div>
<h3 align="center">EXPENDITURE REPORT SHEET<hr />
<?php
if(isset($_POST['Print-Report'])){
$from = date("Y-m-d",strtotime($_POST['from']));
$to = date("Y-m-d",strtotime($_POST['to']));
?>
<?php echo "Duration| From: ".$from." To: ".$to; ?>
</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <tr>
	<td>Paid To</td>
	<td>Date</td>
	<td>Category</td>
    <td>Description</td>
    <td>Approved By</td>
    <td>Payment Method</td>
    <td>Particulars</td>
	<td>Amount</td>
	<td>Approval</td>
  </tr>
</thead>
<tbody>
<?php
$ovtotal = 0;
foreach($_POST['subcategory'] as $salesdesc){
$getrg = mysql_query("SELECT * FROM expenditure WHERE category='$salesdesc' AND dated BETWEEN '$from' AND '$to' ORDER BY category DESC, dated DESC") or die(mysql_error());
$tamount = 0;
while($rg = mysql_fetch_array($getrg)){
$spentby = $rg['spentby'];
$tamount+=$rg['amount'];
$description = $rg['description'];
?>

  <tr>
  <td><?php echo $rg['paidto']; ?></td>
      <td><?php echo $rg['dated']; ?></td>
    <td><?php echo $rg['category']; ?></td>
    <td><?php echo $rg['description']; ?></td>
    <td><?php
	if($spentby=='Not Approved' || $spentby=='Administrator' || $spentby=='adminkojo1 (Approved)')
	{echo $spentby;}else{
	$mmsd = mysql_query("SELECT firstname, surname FROM personnel WHERE staffid='$spentby'") or die(mysql_error());
	while($mbd = mysql_fetch_row($mmsd)){
	echo $mbd[0]." ".$mbd[1];
	}} ?>
</td>
    <td><?php echo $rg['paymethod']; ?></td>
    <td><?php echo $rg['particulars']; ?></td>
	<td><?php echo number_format($rg['amount'],2); ?></td>
	<td><?php  if($spentby=='Not Approved'){?> <a href="newexp.php?Approved=Yes&expid=<?php echo $rg['expid']; ?>" class="btn btn-sm btn-primary">Approve</a> <?php }else{echo "Approved"; } ?></td>
     </tr>
<?php } ?>
<tr><td colspan="7" class="h3" align="right">Sub Total</td><td><?php $ovtotal+=$tamount; echo "<h4>".number_format($tamount,2)."</h4>"; ?> </td></tr>
<?php } ?>
<tr><td colspan="7" class="h3" align="right">Overall Total</td><td><?php echo "<h4>".number_format($ovtotal,2)."</h4>"; ?> </td></tr>
</tbody>
</table>
<?php } ?>

</div>
</body>
</html>