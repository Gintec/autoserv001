<?php
if(isset($_POST['JobOrder'])){ 
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$vregno = validateData($_POST['vregno']); 
$regdate = date("Y-m-d",strtotime($_POST['regdate']));
$modelname = validateData($_POST['modelname']);
$modelno = validateData($_POST['modelno']);
$frameno = validateData($_POST['frameno']);
$vins = validateData($_POST['vin']);
$unit = validateData($_POST['unit']);
$vin = number_format($vins).$unit;
$color = validateData($_POST['color']); 
$chasisno = validateData($_POST['chasisno']); 
$vcondition = validateData($_POST['vcondition']); 
$daterecieved = date("Y-m-d",strtotime($_POST['daterecieved']));

echo $checkj = mysql_result(mysql_query("SELECT jobno FROM vehicles ORDER BY jobno DESC LIMIT 1"),0);
echo $checkjv = mysql_result(mysql_query("SELECT jobno FROM jobs ORDER BY jobno DESC LIMIT 1"),0);

if($checkj>$checkjv){$jobno=$checkj+1;}elseif($checkjv>$checkj){$jobno=$checkjv+1;}elseif($checkjv==$checkj){$jobno=$checkj+1;}else{$jobno=1;}

$addvehicle = mysql_query("INSERT INTO vehicles VALUES ('$customerid','$jobno','$vregno','$regdate','$modelname','$modelno','$frameno','$vin','$color','$chasisno','$vcondition','$daterecieved')") or die(mysql_error());

if(isset($addvehicle)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Vehicle Information ! </b>Added <b>Successfully. </b>                    </div>
                </div>
                <!--end  Welcome -->
            </div>

<?php
include_once('joborderform.php'); 
exit; }}?>

<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">New Vehicle Diagnosis Questionaire </h1>
                </div>
                <!--End Page Header -->
            </div>
<?php if(isset($_POST['save2'])){

$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$vregno = validateData($_POST['vregno']); 
$regdate = date("Y-m-d",strtotime($_POST['regdate']));
$modelname = validateData($_POST['modelname']);
$modelno = validateData($_POST['modelno']);
$frameno = validateData($_POST['frameno']);
$vins = validateData($_POST['vin']);
$unit = validateData($_POST['unit']);
$vin = number_format($vins).$unit;
$color = validateData($_POST['color']); 
$chasisno = validateData($_POST['chasisno']); 
$vcondition = validateData($_POST['vcondition']); 
$daterecieved = date("Y-m-d",strtotime($_POST['daterecieved']));

$checkjn = mysql_result(mysql_query("SELECT jobno FROM vehicles WHERE jobno='$jobno' LIMIT 1"),0);
if($checkjn===false){}else{$jobno=$checkjn+1;}

$addvehicle = mysql_query("INSERT INTO vehicles VALUES ('$customerid','$jobno','$vregno','$regdate','$modelname','$modelno','$frameno','$vin','$color','$chasisno','$vcondition','$daterecieved')") or die(mysql_error());

if(isset($addvehicle)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Vehicle Information ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
Record the Diagnosis Questions and Answers.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			
			<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <a href="joborder.php?vregno=<?php echo $vregno; ?>&customerid=<?php echo $customerid; ?>" class="btn btn-sm btn-warning" >GO TO CUSTOMER ORDER FORM </a>
                </div>
                <!--End Page Header -->
</div>
			<?php exit;}}elseif(isset($_POST['savenext'])){

$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$vregno = validateData($_POST['vregno']); 
$regdate = date("Y-m-d",strtotime($_POST['regdate']));
$modelname = validateData($_POST['modelname']);
$modelno = validateData($_POST['modelno']);
$frameno = validateData($_POST['frameno']);
$vins = validateData($_POST['vin']);
$unit = validateData($_POST['unit']);
$vin = number_format($vins).$unit;
$color = validateData($_POST['color']); 
$chasisno = validateData($_POST['chasisno']); 
$vcondition = validateData($_POST['vcondition']); 
$daterecieved = date("Y-m-d",strtotime($_POST['daterecieved']));

$checkjn = mysql_result(mysql_query("SELECT jobno FROM vehicles WHERE jobno='$jobno' LIMIT 1"),0);
if($checkjn===false){}else{$jobno=$checkjn+1;}

$addvehicle = mysql_query("INSERT INTO vehicles VALUES ('$customerid','$jobno','$vregno','$regdate','$modelname','$modelno','$frameno','$vin','$color','$chasisno','$vcondition','$daterecieved')") or die(mysql_error());

if(isset($addvehicle)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Vehicle Information ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
<a href="joborder.php?vregno=<?php echo $vregno; ?>&customerid=<?php echo $customerid; ?>" class="btn btn-sm btn-warning" >GO TO CUSTOMER ORDER FORM </a>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>           
           

            <div class="row">
                <div class="col-lg-12">
<?php 
if(isset($_GET['vregno'])){$customerid = $_GET['customerid']; $vregno = $_GET['vregno'];
			
$checkj = mysql_result(mysql_query("SELECT CAST(jobno AS UNSIGNED) FROM vehicle ORDER BY jobno DESC LIMIT 1"),0);
$jobno=$checkj+1;

} ?> 				
<form action="newinstruction.php" method="post" enctype="multipart/form-data" name="contactform">
<input name="customerid" type="hidden" value="<?php echo $customerid; ?>">
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer ID:</label>
<?php echo $customerid; ?>
</div>
<div class="col-lg-2">
<label class="control-label col-lg-12" for="content">ID: </label>
<input name="jobno" type="hidden" class="form-control" placeholder="Job No" maxlength="33" value="<?php echo $jobno; ?>">
<?php echo $jobno; ?>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Order Category: </label>
<input name="jobcategory" list="services" class="form-control" value="<?php if(isset($_GET['type'])){echo $_GET['type']; }else{echo "Routine Service/Maintenance";} ?>" />
<datalist id="services">
 <?php 
	  $mmsd = mysql_query("SELECT servicename FROM services") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>">
	<?php } ?>
</datalist>
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Date Received: </label>
<input name="daterecieved" type="text" class="form-control" placeholder="Date Recieved" maxlength="50">
<script type="text/javascript">
		$(function(){
			$('*[name=daterecieved]').appendDtpicker();
		});
	</script>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Expected Delivery Time: </label>
<input name="deliverydate" type="text" class="form-control" placeholder="Delivery Date" maxlength="20">
<script type="text/javascript">
		$(function(){
			$('*[name=deliverydate]').appendDtpicker();
		});
	</script>
</div>
</div> 

<div class="form-group">
<div class="col-lg-12">
<h4>Customer's Complain / Job Details:</h4>
<textarea name="request" rows="5" cols="100" style="width:100%; min-height:100px;" placeholder='Auto-Expanding Textarea' class="form-contol">Please carry out a routine maintenance and general check of the vehicle.</textarea>
</div>
</div>

<div class="form-group">
<div class="col-lg-9">
<h3>Inspection Details: </h3>
<textarea name="problems" cols="" rows="" class="form-control">Inspection Details</textarea>
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">(TA) Technician Name: </label>
<input name="ta" type="text" class="form-control" placeholder="(TA) Technician Name" maxlength="50">
</div>
</div>

<div class="form-group">
<div class="col-lg-9">
<h3>Result of Diagnosis: </h3>
<textarea name="diagnosis" cols="" rows="" class="form-control">Result of Diagnosis</textarea>
<input name="diagnosisr" type="text" class="form-control" placeholder="Diagnosis and Inspection Result" maxlength="200">
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">(DMT) Technician Name: </label>
<input name="dmt" type="text" class="form-control" placeholder="(DMT) Technician Name" maxlength="50">
</div>
</div>



<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Vehicle Reg No: </label>
<input name="remarks" type="text" class="form-control" placeholder="Vehicle Reg No" maxlength="200" value="<?php echo $vregno; ?>">
</div>
<div class="col-lg-8">
<label class="control-label col-lg-12" for="content">Customer Type: </label>
<table width="100%" border="1">
  <tr>
    <td><input name="type[]" type="checkbox" value="Walk-in" /> Walkin-in    -   <input name="type[]" type="checkbox" value="Appointment" /> Appointment</td>
    <td><input name="waiting[]" type="checkbox" value="Customer Waiting" /> Customer Waiting    -   <input name="waiting[]" type="checkbox" value="Repeat Repair" /> Repeat Repair</td>
  </tr>
</table>



</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Walk-Round Check: </label>
<table width="100%" border="1" style="font-size:11px;">
  <tr>
    <td width="28%" rowspan="2"><img src="images/v.jpg" alt="V" width="250" height="160" /></td>
    <td colspan="2">Cofirmation</td>
    <td width="14%">Courtesy Items </td>
    <td width="16%">Parts Prepared </td>
  </tr>
  <tr>
    <td width="24%"><input type="checkbox" name="walkround[]2" value="Additional Job Confirmation" />
Additional Job Confirmation<br />
<input type="checkbox" name="walkround[]2" value="Valuables" />
Valuables<br />
<input type="checkbox" name="walkround[]2" value="Present Estimate w / Explanation" />
Present Estimate w / Explanation </td>
    <td width="18%"><p>
      <input type="checkbox" name="walkround[]" value="Car Was Needed" />
      Car Wash Needed <br />
      <input type="checkbox" name="walkround[]" value="Keep Replaced Parts" />
      Keep Replaced Parts </p>      </td>
    <td><input type="checkbox" name="walkround[]" value="Seat Cover" />
      Seat Cover<br />
      <input type="checkbox" name="walkround[]" value="Floor Mat" />
      Floor Mat </td>
    <td><p>
      <input type="checkbox" name="partsready[]" value="Parts Prepared (<?php echo date("H:i:s"); ?>)" title="<?php echo date("H:i:s"); ?>" />
      Prepared<br />
	  <input type="checkbox" name="partsready[]" value="Parts Not Prepared (<?php echo date("H:i:s"); ?>)" title="<?php echo date("H:i:s"); ?>" />
      Not Prepared </p>      </td>
  </tr>
</table>

</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<?php 
$getvin = mysql_result(mysql_query("SELECT chasisno FROM vehicles WHERE vregno='$vregno' LIMIT 1"),0); 
$getscc = mysql_result(mysql_query("SELECT vin FROM scc WHERE vin='$getvin' LIMIT 1"),0);
if($getscc!=""){echo "<div class='alert alert-info'><strong>SSC Information:</strong> The Takata Airbag Inflator Replacement Necessary. <em><small>Please Create another Warranty Customer Order for this job</small></em></div><br />
<a href='joborder.php?type=SSC Warranty' class='btn btn-sm btn-warning'>Create an SSC Warranty Order </a>";}else{
echo "SSC Warranty: None"; }?>
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Comment: </label>
<input name="comment" type="text" class="form-control" placeholder="Comment" maxlength="200">
</div>
</div>
<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-4">
<a href="printdiaq.php?vregno=<?php echo $vregno; ?>&jobbo=<?php echo $jobno; ?>&customerid=<?php echo $customerid; ?>" target="_blank" class="btn btn-lg btn-warning btn-block">Print Questionaire</a>
</div>
<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-4">
<input name="save4" type="submit" value="Save Customer Order" class="btn btn-lg btn-primary btn-block" />
</div>
<div class="col-lg-4">
<input value="Next: Job Instruction"  class="btn btn-lg btn-success btn-block"  name="savenext2" type="submit" />
</div>
</div>
</form>                  
                        </div>
                        </div>

                        
            