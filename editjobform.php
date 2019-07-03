<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">New Job Instruction </h1>
                </div>
                <!--End Page Header -->
            </div>

<?php
if(isset($_POST['save2'])){
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$diagnosis = validateData($_POST['diagnosis']);
$problems = validateData($_POST['problems']);
$causes = validateData($_POST['causes']);
$request = validateData($_POST['request']);
$deliverydate = date("Y-m-d",strtotime($_POST['deliverydate']));
$status = validateData($_POST['status']);
$instructions = validateData($_POST['instructions']);
$remarks = validateData($_POST['remarks']);
$did=strtoupper("DKJ".substr(number_format(time() * rand(),0,'',''),0,6));

$adddq = mysql_query("INSERT INTO diagnosis VALUES ('$customerid','$jobno','$diagnosis','$problems','$causes','$request','$deliverydate','$status','$instructions','$remarks','$did')") or die(mysql_error());

if(isset($adddq)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Diagnosis Question ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
Prepare job instructions.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php exit;}}
			if(isset($_POST['savenext'])){
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$diagnosis = validateData($_POST['diagnosis']);
$problems = validateData($_POST['problems']);
$causes = validateData($_POST['causes']);
$request = validateData($_POST['request']);
$deliverydate = validateData($_POST['deliverydate']);
$status = validateData($_POST['status']);
$instructions = validateData($_POST['instructions']);
$remarks = validateData($_POST['remarks']);
$did=strtoupper("DKJ".substr(number_format(time() * rand(),0,'',''),0,6));

$adddq = mysql_query("INSERT INTO diagnosis VALUES ('$customerid','$jobno','$diagnosis','$problems','$causes','$request','$deliverydate','$status','$instructions','$remarks','$did')") or die(mysql_error());

if(isset($adddq)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Diagnosis Question ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
Prepare job instructions.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>            
           

            <div class="row">
                <div class="col-lg-12">
				
<form action="jobinstruction.php" method="post" enctype="multipart/form-data" name="contactform">
<datalist id="parts">
 <?php 
	  $mmsd = mysql_query("SELECT partdesc FROM inventory") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>">
	<?php } ?>
</datalist>
	
<datalist id="services">
 <?php 
	  $mmsd = mysql_query("SELECT servicename FROM services") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>">
	<?php } ?>
</datalist>
	
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer ID:</label>
<input name="customerid" type="text" class="form-control" placeholder="Customer ID" value="<?php echo $customerid; ?>"  maxlength="100">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Job No: </label>
<input name="jobno" type="text" class="form-control" placeholder="Job No" maxlength="33" value="<?php echo $jobno; ?>" >
</div>
</div> 

<div class="form-group">
<div class="col-lg-12">
<div class="input_fields_wrap">
<label class="control-label col-lg-12" for="content">Select Parts to be Used: </label>
<div class="col-lg-10"><input list="parts" type="text" name="parts[]" class="form-control"></div><div class="col-lg-2"><input type="text" name="qty[]" class="form-control" placeholder="Quantity"></div>

</div>
<div class="col-lg-12">
	    <button class="add_field_button btn btn-success">Add More Parts</button>
</div>
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<div class="input_fields_wrap2">
<label class="control-label col-lg-12" for="content">Services to carried out: </label>
    <input list="services" type="text" name="services[]" class="form-control">

</div>
<div class="col-lg-12">
	    <button class="add_field_button2 btn btn-success">Add More Services</button>
</div>
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content"></label>
<input name="labour" type="number" class="form-control" placeholder="Labour" maxlength="10">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">.</label>
<input name="Save" type="submit" class="btn btn-primary btn-lg btn-block" value="Save and Print">
</div>
</div>
                   
                        </div>
                        </div>                        
            