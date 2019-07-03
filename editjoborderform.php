

<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Modify Customer Order Form</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
<?php
if(!isset($jobno)){$jobno=$_GET['jobno'];}
if(!isset($customerid)){$customerid=$_GET['customerid'];}
$getdq = mysql_query("SELECT * FROM diagnosis WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error());
  while($dq = mysql_fetch_array($getdq)){
  $diagnosis = $dq['diagnosis'];
  $problems = $dq['problems'];
  $causes = $dq['causes'];  
$request = $dq['request'];
  $deliverydate = $dq['deliverydate'];
  $status = $dq['status'];  
$instructions = $dq['instructions'];
$remarks = $dq['remarks'];
$did = $dq['did'];
  }
?>
				
<form action="newinstruction.php" method="post" enctype="multipart/form-data" name="contactform">
<input name="customerid" type="hidden" value="<?php echo $customerid; ?>">
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer ID:</label>
<?php echo $customerid; ?>
</div>
<div class="col-lg-2">
<label class="control-label col-lg-12" for="content">ID: </label>
<input name="jobno" type="text" class="form-control" placeholder="Job No" value="<?php echo $jobno; ?>" maxlength="33">
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
<input name="daterecieved" type="text" class="form-control" placeholder="Date Recieved" maxlength="50" value="<?php echo substr($deliverydate,0,14); ?>">
<script type="text/javascript">
		$(function(){
			$('*[name=daterecieved]').appendDtpicker();
		});
	</script>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Expected Delivery Time: </label>
<input name="deliverydate" type="text" class="form-control" placeholder="Delivery Date" maxlength="20" value="<?php echo substr($deliverydate,-14); ?>">
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
<textarea name="request" rows="5" cols="100" style="width:100%; min-height:100px;" placeholder='Auto-Expanding Textarea' class="form-contol"><?php echo $request; ?></textarea>
</div>
</div>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Vehicle Reg No: </label>
<input name="remarks" type="text" class="form-control" placeholder="Vehicle Reg No" maxlength="200" value="<?php echo $remarks; ?>">
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
$getvin = mysql_result(mysql_query("SELECT chasisno FROM vehicles WHERE vregno='$remarks' LIMIT 1"),0); 
$getscc = mysql_result(mysql_query("SELECT vin FROM scc WHERE vin='$getvin' LIMIT 1"),0);
if($getscc!=""){echo "<div class='alert alert-info'><strong>SSC Information:</strong> The Takata Airbag Inflator Replacement Necessary. <em><small>Please Create another Warranty Customer Order for this job</small></em></div><br />
<a href='joborder.php?type=SSC Warranty' class='btn btn-sm btn-warning'>Create an SSC Warranty Order </a>";}else{
echo "SSC Warranty: None"; }?>
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Comment: </label>
<input name="comment" type="text" class="form-control" placeholder="Comment" maxlength="200" value="<?php echo $instructions; ?>">
</div>
</div>
<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-6">
<input name="Update" type="submit" value="Update Customer Order" class="btn btn-lg btn-primary btn-block" />
</div>

</div>
</form>


                   
                        </div>
                        </div>

                        
            