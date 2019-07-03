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
<?php
if(isset($_POST['Save'])){
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$notificationtime = validateData($_POST['notificationtime']);

$jobctime = validateData($_POST['jobctime']);
$jobstime = validateData($_POST['jobstime']);
$actualhours = validateData($_POST['actualhours']);
$technician = validateData($_POST['technician']);
$qcontrol = validateData($_POST['qcontrol']);

if ( isset($_POST['cleanness']) ) {
    $checkcl = "Cleanness (Exterior/Interior): &#x2713;";
} else { 
    $checkcl = "Cleannes (Exterior/Interior): &#x1f5d9;";
}

if ( isset($_POST['courtesy']) ) {
    $checkco = "Courtesy Items Removal: &#x2713;";
} else { 
    $checkco = "Cleannes Items Removal: &#x1f5d9;";
}

if ( isset($_POST['position']) ) {
    $checkpo = "Outer Mirror Position/Seat Position: &#x2713;";
} else { 
    $checkpo = "Outer Mirror Position/Seat Position : &#x1f5d9;";
}

if ( isset($_POST['clock']) ) {
    $checkclo = "Clock Adjustment/Radio Setting: &#x2713;";
} else { 
    $checkclo = "Clock Adjustment/Radio Setting: &#x1f5d9;";
}

$predelivery  = $checkcl."<br>".$checkco."<br>".$checkpo."<br>".$checkclo;



if ( isset($_POST['jobdetails']) ) {
    $checkjd = "Job Details Explanation: &#x2713;";
} else { 
    $checkjd = "Job Details Explanation: &#x1f5d9;";
}

if ( isset($_POST['feeexp']) ) {
    $checkfe = "Fee Explanation: &#x2713;";
} else { 
    $checkfe = "Fee Explanation: &#x1f5d9;";
}

if ( isset($_POST['resultconf']) ) {
    $checkrc = "Result Confirmation with Customer: &#x2713;";
} else { 
    $checkrc = "Result Confirmation with Customer: &#x1f5d9;";
}

if ( isset($_POST['walkaround']) ) {
    $checkwa = "Walk-Around Check: &#x2713;";
} else { 
    $checkwa = "Walk-Around Check: &#x1f5d9;";
}

if ( isset($_POST['fixed']) ) {
    $checkfxd = "Fixed: &#x2713;";
} else { 
    $checkfxd = "Fixed: &#x1f5d9;";
}

if ( isset($_POST['levelup']) ) {
    $checklu = "Level Up: &#x2713;";
} else { 
    $checklu = "Level Up: &#x1f5d9;";
}

if ( isset($_POST['notfixed']) ) {
    $checknf = "Not Fixed: &#x2713;";
} else { 
    $checknf = "Not Fixed: &#x1f5d9;";
}

if ( isset($_POST['psfuplan']) ) {
    $checkps = "P.S.F.U (Plan): &#x2713;";
} else { 
    $checkps = "P.S.F.U (Plan): &#x1f5d9;";
}

$resultexp  = $checkjd."<br>".$checkfe."<br>".$checkrc."<br>".$checkwa."<br>".$checkfxd."<br>".$checklu."<br>".$checknf."<br>".$checkps;

$dtime = validateData($_POST['dtime']);
$psfudate = validateData($_POST['psfudate']);
$dtime = validateData($_POST['dtime']);
$psfudate = validateData($_POST['psfuactual']);
$phoneno = validateData($_POST['phoneno']);
$email = validateData($_POST['email']);
$funame = validateData($_POST['funame']);

$staffname = validateData($_POST['staffname']);
$confirmedby = validateData($_POST['confirmedby']);

if ( isset($_POST['gjfixed']) ) {
    $checkgjf = "Fixed: &#x2713;";
} else { 
    $checkgjf = "Fixed: &#x1f5d9;";
}

if ( isset($_POST['fuagain']) ) {
    $checkgjfa = "Follow Up Again: &#x2713;";
} else { 
    $checkgjfa = "Follow Up Again: &#x1f5d9;";
}

if ( isset($_POST['gjnotfixed']) ) {
    $checkgjnf = "No Fixed: &#x2713;";
} else { 
    $checkgjnf = "Not Fixed: &#x1f5d9;";
}


$psfu = $checkgjf."<br>".$checkgjfa."<br>".$checkgjnf;

$deliveredto = validateData($_POST['deliveredto']);

$report = validateData($_POST['report']);

mysql_query("DELETE FROM jobextra WHERE jobno='$jobno'") or die(mysql_query());
$insert = mysql_query("INSERT INTO jobextra VALUES('$customerid','$jobno','$predelivery','$notificationtime','$resultexp','$dtime','$deliveredto','$psfudate','$phoneno','$email','$funame','$psfu','$staffname','$confirmedby','$jobstime','$jobctime','$actualhours','$technician','$qcontrol','$report','')") or die(mysql_error());

if(isset($insert)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>Job Detail Updated ! </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>   
<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">JOB DETAILS</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
<?php 
if(isset($_GET['customerid'])){$customerid = $_GET['customerid']; $jobno = $_GET['jobno']; } ?> 
				
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" name="contactform">
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer Name : <?php echo $customerid; ?></label>
<input name="customerid" type="hidden" value="<?php echo $customerid; ?>">

</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Job No : <?php echo $jobno; ?></label>
<input name="jobno" type="hidden" value="<?php echo $jobno; ?>" >

</div>
</div>
<table class="table table-striped">
<tr>
        <td>Job Details/Parts Used</td>
        <td>Quantity</td>
      </tr>
<?php $gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno' AND partsname!='Labour' AND partsname!='Discount'") or die(mysql_error()); 
	  while($p = mysql_fetch_array($gps)){?>
      <tr>
        <td><?php echo $p['partsname']; ?></td>
       
        <td><?php echo $p['quantity']; ?></td>
      </tr>
	  <?php } ?>
</table>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Job Start DateTime: </label>
<input name="jobstime" type="text" class="form-control" id="customerid" maxlength="100" placeholder="JOb Start DateTime" >
<script type="text/javascript">
		$(function(){
			$('*[name=jobstime]').appendDtpicker();
		});
	</script>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Job Completion Date/Time: </label>
<input name="jobctime" type="text" class="form-control" id="confirmedby" maxlength="100" placeholder="Job Completion Date/Time" >
<script type="text/javascript">
		$(function(){
			$('*[name=jobctime]').appendDtpicker();
		});
	</script>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Actual Hours Clocked: </label>
<input name="actualhours" type="text" class="form-control" id="confirmedby" maxlength="100" placeholder="Actual Hours">
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Technician Name: </label>
<input name="technician" type="text" class="form-control" maxlength="100" placeholder="Technician Name">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Quality Control Staff: </label>
<input name="qcontrol" type="text" class="form-control" maxlength="100" placeholder="Quality Control Staff">
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Predelivery Confirmation:</label><br />
<table width="88%" class="table table-condensed" style="width:100%;" align="center">
  
  <tr>
    <td width="50%" align="right">Cleanness (Exterior/Interior): </td>
    <td width="50%"><input name="cleanness" type="checkbox" value="ok" /></td>
    </tr>
  <tr>
    <td align="right">Courtesy Items Removal: </td>
    <td><input name="courtesy" type="checkbox" value="ok" /></td>
    </tr>
  <tr>
    <td align="right">Outer Mirror Position / Seat Position: </td>
    <td><input name="position" type="checkbox" value="ok" /></td>
    </tr>
  <tr>
    <td align="right">Clock Adjustment / Radio Sitting: </td>
    <td><input name="clock" type="checkbox" value="ok" /></td>
    </tr>
</table>

</div>
</div> 

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content"></label>
<table width="88%" class="table table-condensed" style="width:100%;" align="center">
  <tr>
    <td colspan="2"><strong>Job Result Explanation  </strong></td>
    </tr>
  <tr>
    <td width="50%" align="right">Job Details Explanation : </td>
    <td width="50%"><input name="jobdetails" type="checkbox" id="jobdetails" value="ok" /></td>
    </tr>
  <tr>
    <td align="right">Fee Explanation : </td>
    <td><input name="feeexp" type="checkbox" id="feeexp" value="ok" /></td>
    </tr>
  <tr>
    <td align="right">Result Confirmation with Customer: </td>
    <td><input name="resultconf" type="checkbox" id="resultconf" value="ok" /></td>
    </tr>
  <tr>
    <td align="right">Walk-Around Check : </td>
    <td><input name="walkaround" type="checkbox" id="walkaround" value="ok" /></td>
    </tr>
  <tr>
    <td align="right">Fixed:</td>
    <td><input name="fixed" type="checkbox" id="fixed" value="ok" /></td>
  </tr>
  <tr>
    <td align="right">Level Up: </td>
    <td><input name="fixed" type="checkbox" id="fixed" value="ok" /></td>
  </tr>
  <tr>
    <td align="right">No Fixed: </td>
    <td><input name="nofixed" type="checkbox" id="nofixed" value="ok" /></td>
  </tr>
  <tr>
    <td align="right">PSFU(Plan)</td>
    <td><input name="psfuplan" type="checkbox" id="psfuplan" value="ok" /></td>
  </tr>
</table>
</div>
</div>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Job Completion Notification: </label>
<input name="notificationtime" type="text" class="form-control" id="notificationtime" maxlength="33" placeholder="Job Completion Notification">
<script type="text/javascript">
		$(function(){
			$('*[name=notificationtime]').appendDtpicker();
		});
	</script>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Delivery Date/Time : </label>
<input name="dtime" type="text" class="form-control" id="dtime" maxlength="100" placeholder="Delivery Time">
<script type="text/javascript">
		$(function(){
			$('*[name=dtime]').appendDtpicker();
		});
	</script>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Delivered To : </label>
<select name="deliveredto" class="form-control">
  <option value="Owner">Owner</option>
  <option value="Family">Family</option>
  <option value="Others">Others</option>
</select>
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">PSFU (Plan) DateTime : </label>
<input name="psfudate" type="text" class="form-control" maxlength="100" placeholder="PSFU (Plan) DateTime">
<script type="text/javascript">
		$(function(){
			$('*[name=psfudate]').appendDtpicker();
		});
	</script>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Contact Phone Number : </label>
<input name="phoneno" type="text" class="form-control"  maxlength="100" placeholder="Phone Number">
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">PSFU Customer Name : </label>
<input name="funame" type="text" class="form-control" maxlength="100" placeholder="PSFU Name">
</div>

<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer Contact E-mail : </label>
<input name="email" type="email" class="form-control" maxlength="100" placeholder="Contact E-mail">
</div>
</div>

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-12">
<input name="Save" type="submit" class="btn btn-lg btn-primary btn-block" id="Save" value="Save" />
</div>
</div>
</div>
</form>

                   
              </div>


                        
            