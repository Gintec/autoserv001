<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Job Instruction/Estimate Form </h1>
                </div>
                <!--End Page Header -->
</div>

<?php
if(isset($_POST['Update'])){
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$instructions = validateData($_POST['comment']);

$types = isset($_POST['type']) ? $_POST['type'] : array();
foreach($types as $type) {
if($type==""){}else{$jobtype = $type.": &#x2713;";}
}

$waitings = isset($_POST['waiting']) ? $_POST['waiting'] : array();
foreach($waitings as $waiting) {
if($waiting==""){}else{$waiting = $waiting.": &#x2713;";}
}

$walk="";
$walkrounds = isset($_POST['walkround']) ? $_POST['walkround'] : array();
foreach($walkrounds as $walkround) {
if($walkround==""){}else{$walk=$walk." ".$walkround.": &#x2713;<br>"; }
}

$partsreadys = isset($_POST['partsready']) ? $_POST['partsready'] : array();
foreach($partsreadys as $partsready) {
if($partsready==""){}else{$partsready = $partsready.": &#x2713;";}
}


$diagnosis = $walk;
$problems = $type."<br>".$waiting."<br>".$partsready;
$causes = "";

$request = mysql_real_escape_string($_POST['request']);
$ddate = ($_POST['deliverydate']);
$daterecieved = ($_POST['daterecieved']);

$deliverydate = $daterecieved." - Expected Delivery Date:".$ddate;

$status = "Pending Estimate";
$remarks =  validateData($_POST['remarks']);
$did=strtoupper("DKJ".substr(number_format(time() * rand(),0,'',''),0,6));

mysql_query("DELETE FROM diagnosis WHERE jobno='$jobno' AND customerid='$customerid'") or die(mysql_error());
$adddq = mysql_query("INSERT INTO diagnosis VALUES ('$customerid','$jobno','$diagnosis','$problems','$causes','$request','$deliverydate','$status','$instructions','$remarks','$did')") or die(mysql_error());

//Get the Vehicle Information
$ji = mysql_query("SELECT vregno,chasisno,modelname,vin FROM vehicles WHERE vregno='$remarks'") or die(mysql_error()); while($j = mysql_fetch_row($ji)){ $description = "Reg No: <strong>".$j[0]."</strong><br /> Chasis No: <strong>".$j[1]."</strong><br />Make: <strong>".$j[2]."</strong> Odometer Reading: <strong>".$j[3]."</strong>"; }

//Store the jobs on the job order table
mysql_query("UPDATE jobs SET description='$description' where jobno='$jobno' AND customerid='$customerid'") or die(mysql_error());

if(isset($adddq)){?>
 <div class="row hideit">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Job Order ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
Prepare job estimate.
                    </div>
                </div>
                <!--end  Welcome -->
</div>
			<?php exit;}}

if(isset($_POST['save4'])){
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$instructions = validateData($_POST['comment']);

$types = isset($_POST['type']) ? $_POST['type'] : array();
foreach($types as $type) {
if($type==""){}else{$jobtype = $type.": &#x2713;";}
}

$waitings = isset($_POST['waiting']) ? $_POST['waiting'] : array();
foreach($waitings as $waiting) {
if($waiting==""){}else{$waiting = $waiting.": &#x2713;";}
}

$walk="";
$walkrounds = isset($_POST['walkround']) ? $_POST['walkround'] : array();
foreach($walkrounds as $walkround) {
if($walkround==""){}else{$walk=$walk." ".$walkround.": &#x2713;<br>"; }
}

$partsreadys = isset($_POST['partsready']) ? $_POST['partsready'] : array();
foreach($partsreadys as $partsready) {
if($partsready==""){}else{$partsready = $partsready.": &#x2713;";}
}


$diagnosis = $walk;
$problems = $type."<br>".$waiting."<br>".$partsready;
$causes = "";

$request = mysql_real_escape_string($_POST['request']);
$ddate = ($_POST['deliverydate']);
$daterecieved = ($_POST['daterecieved']);

$deliverydate = $daterecieved." - Expected Delivery Date:".$ddate;

$status = "Pending Estimate";
$remarks =  validateData($_POST['remarks']);
$did=strtoupper("DKJ".substr(number_format(time() * rand(),0,'',''),0,6));

$checkjn = mysql_result(mysql_query("SELECT jobno FROM diagnosis WHERE jobno='$jobno' LIMIT 1"),0);
if($checkjn===false){}else{$jobno=$checkjn+1;}

$adddq = mysql_query("INSERT INTO diagnosis VALUES ('$customerid','$jobno','$diagnosis','$problems','$causes','$request','$deliverydate','$status','$instructions','$remarks','$did')") or die(mysql_error());

//Get the Vehicle Information
$ji = mysql_query("SELECT vregno,chasisno,modelname,vin FROM vehicles WHERE vregno='$remarks'") or die(mysql_error()); while($j = mysql_fetch_row($ji)){ $description = "Reg No: <strong>".$j[0]."</strong><br /> Chasis No: <strong>".$j[1]."</strong><br />Make: <strong>".$j[2]."</strong> Odometer Reading: <strong>".$j[3]."</strong>"; }

  mysql_query("DELETE FROM jobs WHERE customerid='$customerid' AND jobno='$jobno'") or die(mysql_error());
//Store the jobs on the job order table
mysql_query("INSERT INTO jobs VALUES('$customerid','$jobno','$description','$daterecieved','Pending Estimate','0','0')") or die(mysql_error());

if(isset($adddq)){?>
 <div class="row hideit">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Job Order ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
Prepare job estimate.
                    </div>
                </div>
                <!--end  Welcome -->
</div>
			<?php exit;}}

if(isset($_POST['savenext2'])){
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$instructions = validateData($_POST['comment']);

$types = isset($_POST['type']) ? $_POST['type'] : array();
foreach($types as $type) {
if($type==""){}else{$jobtype = $type.": &#x2713;";}
}

$waitings = isset($_POST['waiting']) ? $_POST['waiting'] : array();
foreach($waitings as $waiting) {
if($waiting==""){}else{$waiting = $waiting.": &#x2713;";}
}

$walk="";
$walkrounds = isset($_POST['walkround']) ? $_POST['walkround'] : array();
foreach($walkrounds as $walkround) {
if($walkround==""){}else{$walk=$walk." ".$walkround.": &#x2713;<br>"; }
}

$partsreadys = isset($_POST['partsready']) ? $_POST['partsready'] : array();
foreach($partsreadys as $partsready) {
if($partsready==""){}else{$partsready = $partsready.": &#x2713;";}
}


$diagnosis = $walk;
$problems = $type."<hr />".$waiting."<hr />".$partsready;

$prb = mysql_real_escape_string($_POST['problems']);
$ta = validateData($_POST['ta']);

$dia = mysql_real_escape_string($_POST['diagnosis']);
$diar = validateData($_POST['diagnosisr']);
$dmt = validateData($_POST['dmt']);
$causes = "<strong>Inspection Details </strong>".$prb." <strong>Technician Name: ".$ta."</strong><br> <strong>Result of Diagnosis: </strong> ".$dia." <br> <strong>(DMT) Technician Name:</strong> ".$dmt."<br> <strong>Diagnosis and Inspection Result: </strong>".$diar;

$request = mysql_real_escape_string($_POST['request']);
$ddate = ($_POST['deliverydate']);
$daterecieved = ($_POST['daterecieved']);

$deliverydate = $daterecieved." - Expected Delivery Date:".$ddate;

$status = "Pending";
$remarks =  validateData($_POST['remarks']);
$did=strtoupper("DKJ".substr(number_format(time() * rand(),0,'',''),0,6));

$checkjn = mysql_result(mysql_query("SELECT jobno FROM diagnosis WHERE jobno='$jobno' LIMIT 1"),0);
if($checkjn===false){}else{$jobno=$checkjn+1;}

$adddq = mysql_query("INSERT INTO diagnosis VALUES ('$customerid','$jobno','$diagnosis','$problems','$causes','$request','$deliverydate','$status','$instructions','$remarks','$did')") or die(mysql_error());

if(isset($adddq)){?>
 <div class="row hideit">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Job Order ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
Prepare job estimate.
                    </div>
                </div>
                <!--end  Welcome -->
</div>
			<?php }}


if(isset($_POST['save2'])){
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$instructions = validateData($_POST['comment']);

$types = isset($_POST['type']) ? $_POST['type'] : array();
foreach($types as $type) {
if($type==""){}else{$jobtype = $type.": &#x2713;";}
}

$waitings = isset($_POST['waiting']) ? $_POST['waiting'] : array();
foreach($waitings as $waiting) {
if($waiting==""){}else{$waiting = $waiting.": &#x2713;";}
}

$walk="";
$walkrounds = isset($_POST['walkround']) ? $_POST['walkround'] : array();
foreach($walkrounds as $walkround) {
if($walkround==""){}else{$walk=$walk." ".$walkround.": &#x2713;<br>"; }
}

$partsreadys = isset($_POST['partsready']) ? $_POST['partsready'] : array();
foreach($partsreadys as $partsready) {
if($partsready==""){}else{$partsready = $partsready.": &#x2713;";}
}


$diagnosis = $walk;
$problems = $type."<br>".$waiting."<br>".$partsready;

$prb = mysql_real_escape_string($_POST['problems']);
$ta = validateData($_POST['ta']);

$dia = mysql_real_escape_string($_POST['diagnosis']);
$diar = validateData($_POST['diagnosisr']);
$dmt = validateData($_POST['dmt']);

$causes = "<strong>Inspection Details </strong>".$prb." <strong>Technician Name: ".$ta."</strong><br> <strong>Result of Diagnosis: </strong> ".$dia." <br> <strong>(DMT) Technician Name:</strong> ".$dmt."<br> <strong>Diagnosis and Inspection Result: </strong>".$diar; 

$request = mysql_real_escape_string($_POST['request']);
$ddate = ($_POST['deliverydate']);
$daterecieved = ($_POST['daterecieved']);

$deliverydate = $daterecieved." - Expected Delivery Date:".$ddate;

$status = "Pending Estimate";
$remarks =  validateData($_POST['remarks']);
$did=strtoupper("DKJ".substr(number_format(time() * rand(),0,'',''),0,6));

$checkjn = mysql_result(mysql_query("SELECT jobno FROM diagnosis WHERE jobno='$jobno' LIMIT 1"),0);
if($checkjn===false){}else{$jobno=$checkjn+1;}
$adddq = mysql_query("INSERT INTO diagnosis VALUES ('$customerid','$jobno','$diagnosis','$problems','$causes','$request','$deliverydate','$status','$instructions','$remarks','$did')") or die(mysql_error());

//Get the Vehicle Information
$ji = mysql_query("SELECT vregno,chasisno,modelname,vin FROM vehicles WHERE vregno='$remarks'") or die(mysql_error()); while($j = mysql_fetch_row($ji)){ $description = "Reg No: <strong>".$j[0]."</strong><br /> Chasis No: <strong>".$j[1]."</strong><br />Make: <strong>".$j[2]."</strong> Odometer Reading: <strong>".$j[3]."</strong>"; }

  mysql_query("DELETE FROM jobs WHERE customerid='$customerid' AND jobno='$jobno'") or die(mysql_error());
//Store the jobs on the job order table
mysql_query("INSERT INTO jobs VALUES('$customerid','$jobno','$description','$daterecieved','Pending Estimate','0','0')") or die(mysql_error());

if(isset($adddq)){?>
 <div class="row hideit">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Diagnosis Question ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
Prepare job estimate.
                    </div>
                </div>
                <!--end  Welcome -->
</div>
			<?php exit;}}
			if(isset($_POST['savenext'])){
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$instructions = validateData($_POST['comment']);

$types = isset($_POST['type']) ? $_POST['type'] : array();
foreach($types as $type) {
if($type==""){}else{$jobtype = $type.": &#x2713;";}
}

$waitings = isset($_POST['waiting']) ? $_POST['waiting'] : array();
foreach($waitings as $waiting) {
if($waiting==""){}else{$waiting = $waiting.": &#x2713;";}
}

$walk="";
$walkrounds = isset($_POST['walkround']) ? $_POST['walkround'] : array();
foreach($walkrounds as $walkround) {
if($walkround==""){}else{$walk=$walk." ".$walkround.": &#x2713;<br>"; }
}

$partsreadys = isset($_POST['partsready']) ? $_POST['partsready'] : array();
foreach($partsreadys as $partsready) {
if($partsready==""){}else{$partsready = $partsready.": &#x2713;";}
}


$diagnosis = $walk;
$problems = $type."<br>".$waiting."<br>".$partsready;

$prb = mysql_real_escape_string($_POST['problems']);
$ta = validateData($_POST['ta']);

$dia = mysql_real_escape_string($_POST['diagnosis']);
$diar = validateData($_POST['diagnosisr']);
$dmt = validateData($_POST['dmt']);

$causes = "<strong>Inspection Details </strong>".$prb." <strong>Technician Name: ".$ta."</strong><br> <strong>Result of Diagnosis: </strong> ".$dia." <br> <strong>(DMT) Technician Name:</strong> ".$dmt."<br> <strong>Diagnosis and Inspection Result: </strong>".$diar; 

$request = mysql_real_escape_string($_POST['request']);
$ddate = ($_POST['deliverydate']);
$daterecieved = ($_POST['daterecieved']);

$deliverydate = $daterecieved." - Expected Delivery Date:".$ddate;

$status = "Pending Estimate";
$remarks =  validateData($_POST['remarks']);
$did=strtoupper("DKJ".substr(number_format(time() * rand(),0,'',''),0,6));

$checkjn = mysql_result(mysql_query("SELECT jobno FROM diagnosis WHERE jobno='$jobno' LIMIT 1"),0);
if($checkjn===false){}else{$jobno=$checkjn+1;}
$adddq = mysql_query("INSERT INTO diagnosis VALUES ('$customerid','$jobno','$diagnosis','$problems','$causes','$request','$deliverydate','$status','$instructions','$remarks','$did')") or die(mysql_error());


if(isset($adddq)){?>
 <div class="row hideit">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Diagnosis Question ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
Prepare job estimate.
                    </div>
                </div>
                <!--end  Welcome -->
</div>

			<?php }}?>            
           
<div class="row showit">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Job Order/Estimate! </b>Saved <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
<a class="btn btn-sm btn-primary" href="ordersp.php">Click Here to Go Back</a>.
                    </div>
                </div>
                <!--end  Welcome -->
</div>
            <div class="row">
                <div class="col-lg-12">
				
<form action="jobinstruction.php" method="post" enctype="multipart/form-data" name="contactform" target="_blank" class="hideit">
<input name="vregno" type="hidden" value="<?php echo $remarks; ?>" />
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
<label class="control-label col-lg-12" for="content">No: </label>
<input name="jobno" type="hidden" value="<?php echo $jobno; ?>" >
<?php echo $jobno; ?>
</div>
</div> 

<div class="form-group">
<div class="col-lg-12">
<div class="input_fields_wrap">
<label class="control-label col-lg-12" for="content">Select Parts to be Used: </label>
<div class="col-lg-8"><input list="parts" type="text" name="parts[]" class="form-control"></div><div class="col-lg-2">Quantity: <input type="number" name="qty[]" class="form-control" placeholder="Quantity"></div><div class="col-lg-2">Unit Price: <input type="text" name="amt[]" class="form-control" placeholder="Unit Price"  value="0"></div>

</div>
<div class="col-lg-12">
	    <button class="add_field_button btn btn-success">Add More Parts</button>
</div>
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<label class="control-label" for="content">Services to be carried out: </label>
<div class="input_fields_wrap2">

<input list="services" type="text" name="services[]" class="form-control" value="Routine Service/Maintenance">

</div>
<div class="col-lg-12">
	    <button class="add_field_button2 btn btn-success">Add More Services</button>
</div>
</div>
</div>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Labour</label>
<input name="labour" type="number" class="form-control" placeholder="Labour" maxlength="10" value="0">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">% Discount</label>
<input name="discount" type="number" step="0.01" class="form-control" placeholder="% Percentage Discount" maxlength="4" value="0">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">.</label>
<input name="Save" type="submit" class="btn btn-primary btn-lg btn-block hider" onclick="clearForm(this.form);" value="Save and Print">
</div>
</div>
                   
                        </div>
                        </div>                        
            