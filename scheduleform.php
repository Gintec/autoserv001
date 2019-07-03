
<script src="tinymce/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
  <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">New Schedule/Appointment Form</h1>
                </div>
                <!--End Page Header -->
            </div>

<?php
if(isset($_POST['Save'])){
$jobno = validateData($_POST['jobno']);
$customerid = validateData($_POST['customerid']);
$vregno = validateData($_POST['vregno']);
$services = $_POST['services'];
$nextappointment = date("Y-m-d H:m:s",strtotime($_POST['nextappointment']));
$description = mysql_real_escape_string($_POST['description']);
$location = validateData($_POST['location']);
$phoneno = validateData($_POST['phoneno']);
$tservice = "-";
$scheduletype=validateData($_POST['frequency'])." / ".validateData($_POST['type']);
  
  foreach( $services as $service => $serviced) {
$tservice=$tservice." <br>-".$serviced;
}

$inssch = mysql_query("INSERT INTO schedule VALUES('$customerid','$jobno','$vregno','$scheduletype','$nextappointment','$description','$tservice','$location','0','$phoneno')") or die(mysql_error());

if(isset($inssch)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Schedule for Maintenance/Service Created ! </b> successfully.<hr />

 <i class="fa  fa-pencil"></i>
Add new Schedule?.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}
?>
            <div class="row">
                <div class="col-lg-12">
				
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" name="contactform">
<datalist id="services">
 <?php 
	  $mmsd = mysql_query("SELECT servicename FROM services") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>">
	<?php } ?>
</datalist>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Customer ID:</label>
<input name="customerid" type="text" class="form-control" id="name" maxlength="100" placeholder="Customer ID"  value="<?php if(isset($_GET['customerid'])){ echo $_GET['customerid']; $customerid = $_GET['customerid'];  }else{echo strtoupper("KJ".substr(number_format(time() * rand(),0,'',''),0,6)); } ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Schedule No: </label>
<input name="jobno" type="text" class="form-control" placeholder="Job No" maxlength="33"  value="<?php if(isset($_GET['jobno'])){ echo $_GET['jobno']; }else{ echo strtoupper("JK".substr(number_format(time() * rand(),0,'',''),0,8));} ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Vehicle Registrationn No: </label>
<input name="vregno" type="text" class="form-control" placeholder="Vregno" maxlength="50">
</div>
</div>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Type: </label>
<select name="type" class="form-control">
  <option value="Recurrent">Recurrent</option>
  <option value="Once">Once</option>
</select>
</div>

<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Frequency: </label>
<input name="frequency" type="text" class="form-control" placeholder="e.g. Every 10 Days" maxlength="100">
</div>

<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Next Appointment: </label>
<input name="nextappointment" type="text" class="form-control" placeholder="Next Appointment Date" maxlength="20" >
<script type="text/javascript">
		$(function(){
			$('*[name=nextappointment]').appendDtpicker();
		});
	</script>
</div>
</div> 

<div class="form-group">
<div class="col-lg-12">
<h3>Description: </details>
<textarea name="description" cols="" rows="" class="form-control">What will be done on this schedule</textarea>
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<div class="input_fields_wrap">
<label class="control-label col-lg-12" for="content">Services to be carried out: </label>
    <input list="services" type="text" name="services[]" class="form-control">

</div>
<div class="col-lg-12">
	    <button class="add_field_button btn btn-success">Add More Services</button>
</div>
</div>
</div>

<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Location: </label>
<input name="location" type="text" class="form-control" placeholder="Remarks" maxlength="200" value="<?php if(isset($_GET['customerid'])){ echo  mysql_result(mysql_query("SELECT address FROM contacts WHERE customerid='$customerid' LIMIT 1"),0); }?>">
</div>
</div> 

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-6">
<input name="phoneno" type="text" class="form-control" placeholder="Phone Number" maxlength="30" value="<?php if(isset($_GET['customerid'])){ echo mysql_result(mysql_query("SELECT telephoneno FROM contacts WHERE customerid='$customerid' LIMIT 1"),0); }?>">
</div>
<div class="col-lg-6">
<input value="Save Schedule"  class="btn btn-lg btn-success btn-block"  name="Save" type="submit" />
</div>
</div>
</form>


                   
                        </div>
                        </div>

                        
            