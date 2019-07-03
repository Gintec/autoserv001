<style>
td{font-size:11px !important; }
</style>

<br />
<br />
<?php
if(isset($_POST['Save'])){
$jobno = $_POST['jobno'];
$invoiceno = $_POST['invoiceno'];
mysql_query("UPDATE jobs SET jid='$invoiceno' WHERE jobno='$jobno'") or die(mysql_error());
}
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:100%;">
                                    <thead>
  <tr>
  <td width="4%">No</td>
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
$getrg = mysql_query("SELECT * FROM jobs WHERE status='Pending Estimate' ORDER BY dated DESC") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
  <td><?php echo $rg['jid']; ?></td>
    <td><?php $cid = $rg['customerid']; $ci = mysql_query("SELECT name,organization FROM contacts WHERE customerid='$cid'") or die(mysql_error()); while($c = mysql_fetch_row($ci)){echo $c[0]." (".$c[1].")"; }?></td>
    <td><?php echo $rg['description']; ?></td>
    <td><?php echo $rg['dated']; ?></td>
    <td><?php echo $rg['status']; ?>
	<?php if($_SESSION['designation']=="Cashier"){ ?>
	<br />
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" name="changeIN" style="position:relative;">
	<input name="jobno" type="hidden" value="<?php echo $rg['jobno']; ?>" />
	<input name="invoiceno" type="text" placeholder="Enter Invoice No" />
	<input name="Save" type="submit" value="Save" style="position:absolute; right:0px;" />
	</form>
	<?php } ?>
	</td>
	<td><?php echo $rg['amount']; ?></td>
    <td><div class="btn-group">
	<?php if($_SESSION['department']=="Front Desk"){ ?>
	<a href="editinstruction.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" class="btn-group btn-warning btn-sm">Prepare Estimate</a>
	<?php }else{?>
	<a href="jobinstruction.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" target="_blank" class="btn-group btn-primary btn-sm">Instruction</a> 
	
	<a href="editinstruction.php?jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $rg['customerid']; ?>" class="btn-group btn-warning btn-sm">Prepare Estimate</a>
	<?php } if($_SESSION['designation']=="Administrator"){ ?>
	<a href="reciept2.php?pay=Yes&jobno=<?php echo $rg['jobno']; ?>&customerid=<?php echo $cid; ?>" target="_blank" class="btn-group btn-sm btn-success"><i class="fa fa-dollar"></i>Pay?</a>
	<a href="?Canceljobno=<?php echo $rg['jobno']; ?>" class="btn-group btn-danger btn-sm">Cancel</a>
	<?php } ?>
	</div>
	</td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>