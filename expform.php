<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">NEW EXPENDITURE</h1>
                </div>
                <!--End Page Header -->
            </div>

<?php
if(isset($_POST['Save'])){
$paidto = validateData($_POST['paidto']);
$amount = validateData($_POST['amount']);
$spentby = validateData($_POST['spentby']);
$paymethod = validateData($_POST['paymethod']);
$particulars = validateData($_POST['particulars']);
$category = validateData($_POST['category']);
$dated = date("Y-m-d",strtotime($_POST['dated']));
$description = validateData($_POST['description']);
$addexp = mysql_query("INSERT INTO expenditure VALUES ('$description','$amount','$dated','$spentby','$paymethod','$particulars','$category','$paidto','0')") or die(mysql_error());

if(isset($addexp)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;<?php echo $description; ?> ! </b> successfully added to the list of <b>Expenditure. </b><hr />

 <i class="fa  fa-pencil"></i>
Add new expenditure.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>           
<?php
if(isset($_POST['Approval'])){
$paidto = validateData($_POST['paidto']);
$amount = validateData($_POST['amount']);
$spentby = validateData($_POST['spentby']);
$paymethod = validateData($_POST['paymethod']);
$particulars = validateData($_POST['particulars']);
$category = validateData($_POST['category']);
$dated = date("Y-m-d",strtotime($_POST['dated']));
$description = validateData($_POST['description']);
$addexp = mysql_query("INSERT INTO expenditure VALUES ('$description','$amount','$dated','$spentby','$paymethod','$particulars','$category','$paidto','0')") or die(mysql_error());

if(isset($addexp)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;<?php echo $description; ?> ! </b> successfully added to the list of <b>Expenditure. </b><hr />

 <i class="fa  fa-pencil"></i>
Add new expenditure.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>       
			
<?php
if(isset($_POST['Approve'])){
$expid = validateData($_POST['expid']);
$paidto = validateData($_POST['paidto']);
$amount = validateData($_POST['amount']);
$spentby = validateData($_POST['spentby'])." (Approved)";
$paymethod = validateData($_POST['paymethod']);
$particulars = validateData($_POST['particulars']);
$category = validateData($_POST['category']);
$dated = date("Y-m-d",strtotime($_POST['dated']));
$description = validateData($_POST['description']);
mysql_query("DELETE FROM expenditure WHERE expid='$expid'") or die(mysql_error());
$addexp = mysql_query("INSERT INTO expenditure VALUES ('$description','$amount','$dated','$spentby','$paymethod','$particulars','$category','$paidto','0')") or die(mysql_error());

if(isset($addexp)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;<?php echo $description; ?> ! </b> successfully added to the list of <b>Expenditure. </b><hr />

 <i class="fa  fa-pencil"></i>
Add new expenditure.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>            

            <div class="row">
                <div class="col-lg-12">
<?php
if(isset($_GET['expid'])){
$expid = $_GET['expid'];
$getrg = mysql_query("SELECT * FROM expenditure WHERE expid='$expid'") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
$spentby = $rg['spentby'];
?>




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" name="serviceform">
<input name="expid" type="hidden" value="<?php echo $expid; ?>">
<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="servicename">Paid To: </label>
<input name="paidto" type="text" class="form-control input-lg" placeholder="Paid To" value="<?php echo $rg['paidto']; ?>">
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="servicename">Details of Expenditure: </label>
<textarea name="description" cols="" rows="" class="form-control"><?php echo $rg['description']; ?></textarea>
</div>
</div>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Amount: </label>
<input name="amount" type="number" step="0.01" class="form-control" placeholder="Amount" maxlength="20" value="<?php echo $rg['amount']; ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Date: </label>
<input name="dated" type="text" class="form-control" id="datepicker" maxlength="30" value="<?php echo $rg['dated']; ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Approved: </label>
<select name="spentby" class="form-control">
<option value="<?php echo $rg['spentby']; ?>" selected="selected"><?php echo $rg['spentby']; ?></option>
<?php  
	  $mmsd = mysql_query("SELECT staffid, firstname, surname FROM personnel") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>"><?php echo $mbd[1]." ".$mbd[2]; ?></option>
	<?php } ?>
</select>
</div>
</div> 

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Payment method: </label>
<select name="paymethod" class="form-control">
  <option value="<?php echo $rg['paymethod']; ?>" selected="selected"><?php echo $rg['paymethod']; ?></option>
  <option value="Not Selected">Not Selected</option>
  <option value="Cash">Cash</option>
  <option value="Bank Deposit">Bank Deposit</option>
  <option value="POS">POS</option>
  <option value="Online Transfer">Online Transfer</option>
  <option value="Mobile Banking">Mobile Banking</option>
  <option value="Cheque">Cheque</option>
</select>

</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Particulars: </label>
<input name="particulars" type="text" class="form-control input-lg" maxlength="50" value="<?php echo $rg['particulars']; ?>" placeholder="e.g Cheque, Voucher, Teller no etc">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Expenditure Category: </label>
<select name="category" class="form-control">
 <option value="<?php echo $rg['category']; ?>"><?php echo $rg['category']; ?></option>
  <option value="Consumables">Consumables</option>
  <option value="Fuel/Diesel">Fuel/Diesel</option>
  <option value="Salary">Salary</option>
  <option value="IOU">IOU</option>
  <option value="Welfare">Welfare</option>
  <option value="Parts Purchase">Parts Purchase</option>
  <option value="Contractor Payment">Contractor Payment</option>
  <option value="Telephone Bill">Telephone Bill</option>
  <option value="Electricity Bill">Electricity Bill</option>
  <option value="Water Bill">Water Bill</option>
  <option value="Miscellaneous">Miscellaneous</option>
</select>
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content"></label>
<button class="btn btn-lg btn-primary btn-block" type="submit" name="Approve"><i class="fa fa-save fa-fw"></i>Approve</button>
</div>
</div>

</form>




<?php } }else{?>
				
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" name="serviceform">
<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="servicename">Paid To: </label>
<input name="paidto" type="text" class="form-control input-lg" placeholder="Paid To">
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="servicename">Details of Expenditure: </label>
<textarea name="description" cols="" rows="" class="form-control"></textarea>
</div>
</div>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Amount: </label>
<input name="amount" type="number" step="0.01" class="form-control" placeholder="Amount" maxlength="20">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Date: </label>
<input name="dated" type="text" class="form-control" id="datepicker" maxlength="30" value="<?php echo date("Y-m-d"); ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Approved: </label>
<select name="spentby" class="form-control">
<option value="Not Approved" selected="selected">Not Approved</option>
<?php  
	  $mmsd = mysql_query("SELECT staffid, firstname, surname FROM personnel") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>"><?php echo $mbd[1]." ".$mbd[2]; ?></option>
	<?php } ?>
</select>
</div>
</div> 

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Payment method: </label>
<select name="paymethod" class="form-control">
  <option value="Not Selected" selected="selected">Not Selected</option>
  <option value="Cash">Cash</option>
  <option value="Bank Deposit">Bank Deposit</option>
  <option value="POS">POS</option>
  <option value="Online Transfer">Online Transfer</option>
  <option value="Mobile Banking">Mobile Banking</option>
  <option value="Cheque">Cheque</option>
</select>

</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Particulars: </label>
<input name="particulars" type="text" class="form-control input-lg" maxlength="50" placeholder="e.g Cheque, Voucher, Teller no etc">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Expenditure Category: </label>
<select name="category" class="form-control">
  <option value="Consumables">Consumables</option>
  <option value="Fuel/Diesel">Fuel/Diesel</option>
  <option value="Salary">Salary</option>
  <option value="IOU">IOU</option>
  <option value="Welfare">Welfare</option>
  <option value="Parts Purchase">Parts Purchase</option>
  <option value="Contractor Payment">Contractor Payment</option>
  <option value="Telephone Bill">Telephone Bill</option>
  <option value="Electricity Bill">Electricity Bill</option>
  <option value="Water Bill">Water Bill</option>
  <option value="Miscellaneous">Miscellaneous</option>
</select>
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content"></label>
<button class="btn btn-lg btn-primary btn-block" type="submit" name="Approval"><i class="fa fa-save fa-fw"></i>Request Approval</button>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content"></label>
<button class="btn btn-lg btn-primary btn-block" type="submit" name="Save"><i class="fa fa-save fa-fw"></i>Record Expendiure</button>
</div>
</div>

</form>

<?php } ?>
                   
                        </div>
                        </div>

                        
            