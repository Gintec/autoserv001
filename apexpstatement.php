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
	<body><br>

	<div align="center"><img src="images/logo2.png" alt="KOJO MOTORS" width="403" height="62"></div>
<h3 align="center">EXPENDITURE REPORT SHEET<hr />
</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
<?php
if(isset($_POST['Pay'])){
$expid = $_POST['expid'];
$paymethod = $_POST['paymethod'];
$particulars = $_POST['particulars'];

$pay = mysql_query("UPDATE expenditure SET paymethod='$paymethod', particulars='$particulars', spentby='Administrator' WHERE expid='$expid'") or die(mysql_error());
if(isset($pay)){?>
 <div class="row hideit">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>Payment Made Successfully! </b><hr />

 <i class="fa  fa-pencil"></i>
<a href="apexpstatement.php" class="btn-inline btn-primary btn-sm  btn-group">Back to Expenses Report</a>
                    </div>
                </div>
                <!--end  Welcome -->
</div>
			<?php exit;}} ?>
								
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
$getrg = mysql_query("SELECT * FROM expenditure WHERE spentby='adminkojo1 (Approved)' ORDER BY category DESC, dated ASC") or die(mysql_error());
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
	if($spentby=='Not Approved' || $spentby=='Administrator'|| $spentby=='adminkojo1 (Approved)')
	{echo $spentby; }else{
	$mmsd = mysql_query("SELECT firstname, surname FROM personnel WHERE staffid='$spentby'") or die(mysql_error());
	while($mbd = mysql_fetch_row($mmsd)){
	echo $mbd[0]." ".$mbd[1];
	}}
	?></td>
    <td><?php echo $rg['paymethod']; ?></td>
    <td><?php echo $rg['particulars']; ?></td>
	<td><?php echo number_format($rg['amount'],2); ?></td>
	<td><?php if($_SESSION['designation']=="Cashier" || $_SESSION['designation']=="Administrator"){?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" name="changeIN" style="position:relative;" target="_blank">
<input name="expid" type="hidden" value="<?php echo $rg['expid']; ?>" />
	
	<table style="font-size:8px;" class="table table-condensed">
	<tr>
	  <td><select name="paymethod">
	  
  <option value="Cash">Cash</option>
  <option value="Bank Deposit">Bank Deposit</option>
  <option value="POS">POS</option>
  <option value="Online Transfer">Online Transfer</option>
  <option value="Mobile Banking">Mobile Banking</option>
  <option value="Cheque">Cheque</option>
</select></td>
	  <td>Particulars: <input name="particulars" type="text" placeholder="Particulars" required /></td>
	  <td><input name="Pay" type="submit" value="Pay" /></td>
	  </tr>
	</table>
	</form>
<?php } ?></td>
     </tr>
<?php } ?>
<tr><td colspan="7" class="h3" align="right">Sub Total</td><td><?php $ovtotal+=$tamount; echo "<h4>".number_format($tamount,2)."</h4>"; ?> </td></tr>

<tr><td colspan="7" class="h3" align="right">Overall Total</td><td><?php echo "<h4>".number_format($ovtotal,2)."</h4>"; ?> </td></tr>
</tbody>
</table>

</div>
</body>
</html>