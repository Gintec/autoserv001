<style>
td{font-size:11px !important; }
</style>

<br />
<br />
<?php if($_SESSION['designation']=="Cashier"){?>
<div class="col-lg-12">
                    <h3 class="center">
Expenditures Approved By MD: <a href="apexpstatement.php" class="btn btn-default btn-sm" target="_blank"><?php echo mysql_num_rows(mysql_query("SELECT * FROM expenditure WHERE spentby='adminkojo1 (Approved)' ORDER BY category DESC")); ?>
 View All</h3> </a>
                </div>
<?php
}
if(isset($_GET['CancelJob'])){
$jobno = $_GET['CancelJob'];
mysql_query("DELETE FROM jobs WHERE jobno='$jobno'") or die(mysql_error());
mysql_query("DELETE FROM partsorder WHERE jobno='$jobno'") or die(mysql_error());
mysql_query("DELETE FROM diagnosis WHERE jobno='$jobno'") or die(mysql_error());
?>
<br>
<br>
<div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <i class="fa fa-folder-open"></i>Job Deleted!<b></b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>	
<?php }
if(isset($_POST['Save'])){
$jobno = $_POST['jobno'];
$invoiceno = $_POST['invoiceno'];

$check = mysql_result(mysql_query("SELECT jid FROM jobs WHERE jid='$invoiceno' LIMIT 1"),0);
if($check!=$invoiceno){
mysql_query("UPDATE jobs SET jid='$invoiceno' WHERE jobno='$jobno'") or die(mysql_error());
}else{?>
<br>
<br>
<div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <i class="fa fa-folder-open"></i>ERROR!<b>You can not use the same invoice number more than once </b> Please change
                    </div>
                </div>
                <!--end  Welcome -->
            </div>	
<?php }}
if(isset($_GET['Canceljobno'])){
$jobno = $_GET['Canceljobno'];
$del = mysql_query("DELETE FROM jobs WHERE jobno='$jobno'") or die(mysql_error());

 mysql_query("DELETE FROM partsorder WHERE jobno='$jobno'") or die(mysql_error());
mysql_query("DELETE FROM serviceorder WHERE jobno='$jobno'") or die(mysql_error());

if(isset($del)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Job No :<?php echo $jobno; ?> Deleted ! </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }} ?>

<h3 align="center">ALL PENDING ORDERS</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
(Last Job No: <?php echo mysql_result(mysql_query("SELECT CAST(jid  AS UNSIGNED) FROM jobs WHERE description!='Proforma Invoice' ORDER BY CAST(jid  AS UNSIGNED) DESC LIMIT 1"),0); ?> )
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;">
                                    <thead>
  <tr>
  <td width="4%">I/(ID)</td>
    <td width="17%">Contact Name</td>
    <td width="25%">Vehicle Description</td>
    <td width="7%">Date</td>
	<td width="15%">Status</td>
	<td width="4%">Amount</td>
    <td width="28%">Invoice/Cancel</td>
  </tr>
</thead>
<tbody>
<?php
$getrg = mysql_query("SELECT * FROM jobs WHERE status='Pending' AND description!='Proforma Invoice' ORDER BY CAST(jobno  AS UNSIGNED) DESC") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
  <td><?php echo $rg['jid'];?> (<?php echo $rg['jobno']; ?>)</td>
    <td><?php $cid = $rg['customerid']; $ci = mysql_query("SELECT name,organization,remarks FROM contacts WHERE customerid='$cid'") or die(mysql_error()); while($c = mysql_fetch_row($ci)){echo $c[0]." (".$c[1].")"; }?></td>
    <td><?php echo $rg['description']; ?></td>
    <td><?php echo $rg['dated']; ?></td>
    <td><?php echo $rg['status']; ?>
	
	<?php if($rg['jid']==0  && $_SESSION['department']=="Front Desk" || $_SESSION['designation']=="Administrator"){?><br />
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" name="changeIN" style="position:relative;">
	<input name="jobno" type="hidden" value="<?php echo $rg['jobno']; ?>" />
	<input name="invoiceno" type="text" placeholder="Enter Invoice No" />
	<input name="Save" type="submit" value="Save" style="position:absolute; right:0px;" />
	</form>
	<?php }else{}?>
	</td>
	<td><?php echo number_format($rg['amount'],2); ?></td>
    <td><div class="btn-group">
	<?php if($_SESSION['designation']=="Customer Service" || $_SESSION['designation']=="Administrator"){?>
	<a href="jobextra.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-primary btn-sm">Job Update</a>
	<a href="jobdetail.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-info btn-sm">Job Order</a>
	<?php } ?>
	<a href="editorder.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-danger btn-sm">Edit Order</a>
	<?php if($_SESSION['department']=="Spare Parts / Store" || $_SESSION['department']=="Front Desk" || $_SESSION['designation']=="Administrator"){?>

	<a href="editinstruction.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" class="btn-group btn-success btn-sm">Edit</a>
	
	<?php } ?>
		<a href="jobinstruction.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-warning btn-sm">Instruction</a> 
	<a href="jobestimate.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-default btn-sm">Estimate</a>

<?php if($rg['jid']!="0"){?>
	<a href="invoice2.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-primary btn-sm">Invoice</a>
<?php } ?>
	
<?php if($_SESSION['designation']=="Administrator"){?>
	<a href="?Canceljobno=<?php echo $rg['jobno']; ?>" class="btn-group btn-danger btn-sm">Cancel</a>
<?php } ?>
	</div>
	<?php if($_SESSION['designation']=="Cashier" || $_SESSION['designation']=="Administrator" && $rg['jid']!=0){?>
<form action="reciept2.php?pay=Yes" method="post" enctype="multipart/form-data" name="changeIN" style="position:relative;" target="_blank">
<input name="rid" type="hidden" value="<?php echo $rg['rid']; ?>" />
	<input name="pay" type="hidden" value="Yes" />
	<input name="jobno" type="hidden" value="<?php echo $rg['jobno']; ?>" />
	<input name="customerid" type="hidden" value="<?php echo $rg['customerid']; ?>" />
	<input name="invoiceno" type="hidden" value="<?php echo $rg['jid']; ?>" />
	<input name="amount" type="hidden" value="<?php echo $rg['amount']; ?>" />
	<table style="font-size:8px;" class="table table-condensed">
	<tr>
	<td><input name="amountpaid" type="text" placeholder="Amount Paid" value="<?php echo $rg['amount']; ?>" style="width:70px; margin-left:20px;" /></td>
	<td><input name="title" type="text" placeholder="Payment Title" value="Routine Maintenance" />
	<?php if($c[1]=="Credit Customer"){?><input name="credit" type="checkbox" title="Credit Customer?" style="position:absolute; left:0px;" value="Credit" checked="checked"/><?php } ?></td>
	<td><input name="Pay" type="submit" value="Pay" /></td>
	</tr>
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
	  <td>&nbsp;</td>
	  </tr>
	</table>
	</form>
<?php } ?>

	</td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>