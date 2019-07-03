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
<h3 align="center">LIST OF DEBTORS<hr />

</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <tr>
  <td>Date</td>
    <td>Customerid</td>
	<td>Invoice No</td>
	<td>Title</td>
    <td>Actual<br>Amount</td>
    <td>Amount Paid</td>
    <td>Balance</td>
    <td>Category</td>
	<td>PayMethod</td>
	<td>Action</td>
  </tr>
</thead>
<tbody>
<?php
$totalpaid = 0;
$totalnpaid = 0;



$getrg = mysql_query("SELECT * FROM payments WHERE credit='Part Payment' ORDER BY dated ASC") or die(mysql_error());
$tamount = 0;
while($rg = mysql_fetch_array($getrg)){
$jobno = $rg['jobno'];
$customerid = $rg['customerid'];
$rid = $rg['rid'];
?>

  <tr>
  <td><?php echo $rg['dated']; ?></td>
  <td><?php echo mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0)." (".$rg['customerid'].")"; ?></td>
      <td><?php echo $rg['invoiceno']; ?></td>
    <td><?php echo $rg['title']; ?></td>
    <td><?php echo number_format($rg['amount'],2); ?></td>
	<td><?php echo number_format($rg['amountpaid'],2); $totalpaid+=$rg['amountpaid']; ?></td>
	<td><?php echo number_format(($rg['amount']-$rg['amountpaid']),2); $balance =$rg['amount']-$rg['amountpaid']; $totalnpaid+=$balance; ?></td>
	<td><?php echo $rg['credit']; ?></td>
	<td><?php echo $rg['paymethod']." ".$rg['particulars']; ?></td>
	
	<td>
	<?php if($_SESSION['designation']=="Cashier" || $_SESSION['designation']=="Administrator" && $rg['credit']!="Not Credit"){?>
<form action="reciept2.php" method="post" enctype="multipart/form-data" name="changeIN" style="position:relative;">
	<input name="pay" type="hidden" value="Yes" />
	<input name="rid" type="hidden" value="<?php echo $rg['rid']; ?>" />
	<input name="jobno" type="hidden" value="<?php echo $rg['jobno']; ?>" />
	<input name="customerid" type="hidden" value="<?php echo $rg['customerid']; ?>" />
	<input name="invoiceno" type="hidden" value="<?php echo $rg['invoiceno']; ?>" />
	<input name="amount" type="hidden" value="<?php echo $balance; ?>" />
	<table style="font-size:8px;" class="table table-condensed">
	<tr>
	<td><input name="amountpaid" type="text" placeholder="Amount Paid" value="<?php echo $balance; ?>" style="width:70px; margin-left:20px;" /></td>
	<td><input name="title" type="text" placeholder="Payment Title" value="Balance payment for <?php echo $rg['title']; ?>" />
	</td>
	<td><input name="Pay-Balance" type="submit" value="Pay-Balance" /></td>
	</tr>
	<tr>
	  <td><select name="paymethod">
	  <option value="NIL" selected="selected">Pay Method</option>
  <option value="Cash">Cash</option>
  <option value="Bank Deposit">Bank Deposit</option>
  <option value="POS">POS</option>
  <option value="Online Transfer">Online Transfer</option>
  <option value="Mobile Banking">Mobile Banking</option>
  <option value="Cheque">Cheque</option>
</select></td>
	  <td><input name="particulars" type="text" placeholder="Particulars" /></td>
	  <td>&nbsp;</td>
	  </tr>
	</table>
	</form>
<?php }else{ ?>
	<a href="reciept2.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>&rid=<?php echo $rg['rid']; ?>" target="_blank" class="btn-group btn-warning btn-sm">Receipt</a>
	<?php } ?>
</td>
    
     </tr>
<?php }  ?>


<tr><td colspan="6" class="h3" align="right">Total Debt</td><td><?php echo "<h4>".number_format($totalnpaid,2)."</h4>"; ?> </td>
<td></td>
<td></td>
<td></td>
</tr>

</tbody>
</table>


</div>
</body>
</html>