<br>
<?php
if(isset($_POST['paysalary'])){
$amount = validateData($_POST['amount']);
$staffidd = validateData($_POST['staffid']);
$paidto = validateData($_POST['staffid']);
$paymethod = validateData($_POST['amount']);
$allowances = validateData($_POST['allowances']);
$deductions = validateData($_POST['deductions']);
$month = validateData($_POST['month']);
$dated = date("Y-m-d");
$amt=($amount+$allowances)-$deductions;
$desc = $month."<br /> Basic Salary: ".$amount."<br /> Allowances: ".$allowances."<br /> Deductions: ".$deductions;
$description = validateData($_POST['month']);
$addexp = mysql_query("INSERT INTO expenditure VALUES ('$desc','$amt','$dated','$staffidd','CASH','$month','Salary','$paidto','0')") or die(mysql_error());

if(isset($addexp)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;<?php echo $staffidd."'s ".$description; ?> ! </b> successfully added to the list of <b>Paid Salary. </b><hr />

 <i class="fa  fa-pencil"></i>
Add new expenditure.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>           

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="salaryform">
<table width="100%" class="table table-condensed">
  <tr>
    <td>
	<select name="staffid" class="form-control">
<?php if(isset($_GET['Pay'])){?>
<option value="<?php echo $_GET['Pay']; ?>" selected="selected"><?php echo $_GET['stname']; ?></option>
<?php }
	  $mmsd = mysql_query("SELECT staffid, firstname, surname FROM personnel") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>"><?php echo $mbd[1]." ".$mbd[2]; ?></option>
	<?php } ?>
</select>
</td>
<td><input name="month" type="text" class="form-control" placeholder="Month"  value="<?php echo date("F, Y"); ?>"></td>
    <td>Amount: <input name="amount" type="number" class="form-control" value="<?php if(isset($_GET['amount'])){echo $_GET['amount']; }?>" placeholder="Amount"></td>
    <td>Allowances: <input name="allowances" type="number" class="form-control" placeholder="Allowances"></td>
    <td>Deductions: <input name="deductions" type="number" class="form-control" placeholder="Deductions"></td>
    <td><input name="paysalary" type="submit" value="Pay Salary" class="btn btn-success"></td>
  </tr>
</table>

</form>
<h3 align="center">PAYROLL<hr /></h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
   <tr>
    <td>Date</td>
	<td>Description</td>
	<td>Staff Name</td>
    <td>Amount</td>
    <td>Salary Slip</td>
  </tr>
</thead>
<tbody>
<?php
$ovtotal = 0;
$getrg = mysql_query("SELECT * FROM expenditure WHERE category='Salary' ORDER BY dated DESC") or die(mysql_error());
$tamount = 0;
while($rg = mysql_fetch_array($getrg)){
$spentby = $rg['spentby'];
$tamount+=$rg['amount'];
?>

  <tr>
  <td><?php echo $rg['dated']; ?></td>
      <td><?php echo $rg['description']; ?></td>
    <td><?php $staffid = $rg['spentby'];
	$mmsd = mysql_query("SELECT firstname, surname FROM personnel WHERE staffid='$staffid'") or die(mysql_error());
	while($mbd = mysql_fetch_row($mmsd)){
	$stname = $mbd[0]." ".$mbd[1];
	echo $stname;
	}
	?></td>
    <td><?php echo  number_format($rg['amount'],2); ?></td>
    
	<td><a href="salaryslip.php?expid=<?php echo $rg['expid']; ?>&stname=<?php echo $stname; ?>" class="btn-success btn-sm btn-group" target="_blank">Print Slip</a></td>
     </tr>
<?php } ?>

</tbody>
</table>
N<?php $ovtotal+=$tamount; echo "<h4>".number_format($tamount,2)."</h4>"; ?>

</div>