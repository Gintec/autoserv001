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
<br />
<br />
<br />
<?php
if(isset($_POST['Save'])){
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);

$staffname = validateData($_POST['staffname']);
$confirmedby = validateData($_POST['confirmedby']);
$psfuactual = validateData($_POST['psfuactual']);

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

$report = nl2br($_POST['report']);

$checkj = mysql_result(mysql_query("SELECT jobno FROM jobextra WHERE jobno='$jobno'"),0);
if($checkj===false){

mysql_query("DELETE FROM jobextra WHERE jobno='$jobno'") or die(mysql_query());
$insert = mysql_query("INSERT INTO jobextra VALUES('$customerid','$jobno','','','','','','','','','','$psfu','$staffname','$confirmedby','','','','','','$report','$psfuactual')") or die(mysql_error());

}else{
$insert = mysql_query("UPDATE jobextra SET psfuactual='$psfuactual', psfu='$psfu', staffname='$staffname', confirmedby='$confirmedby', report='$report' WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error());
}
if(isset($insert)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>Job PSFU Detail Updated ! </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>   
<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">PSFU FORM</h1>
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

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">PSFU (Actual) DateTime : </label>
<input name="psfuactual" type="text" class="form-control" maxlength="100" placeholder="PSFU (Actual) DateTime ">
<script type="text/javascript">
		$(function(){
			$('*[name=psfuactual]').appendDtpicker();
		});
	</script>
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">PSFU (GJ):</label><br />
<table width="88%" class="table table-condensed" style="width:100%;" align="center">

  <tr>
    <td width="50%" align="right">Fixed: </td>
    <td width="50%"><input name="gjfixed" type="checkbox" id="gjfixed" value="ok" /></td>
    </tr>
  <tr>
    <td align="right">Follow Up Again: </td>
    <td><input name="fuagain" type="checkbox" id="fuagain" value="ok" /></td>
    </tr>
  <tr>
    <td align="right">Not Fixed: </td>
    <td><input name="gjnotfixed" type="checkbox" id="gjnotfixed" value="ok" /></td>
    </tr>
 
</table>

</div>

<div class="form-group" style="background-color:#CCCCCC">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Staff Name (Actual) : </label>
<input name="staffname" type="text" class="form-control" id="staffname" maxlength="100" placeholder="Staff Name">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Confirmed By : </label>
<input name="confirmedby" type="text" class="form-control" id="confirmedby" maxlength="100" placeholder="Confirmed By">
</div>
</div>

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-12">
<h3>General Report : </h3>
<textarea name="report" cols="200" rows="5">Write a detail report</textarea>
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


                        
            