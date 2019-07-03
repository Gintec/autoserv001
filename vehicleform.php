<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Vehicle Info</h1>
                </div>
                <!--End Page Header -->
            </div>

<?php
if(isset($_POST['save1'])){
$name = validateData($_POST['name']);
$telephoneno = validateData($_POST['telephoneno']);
$email = validateData($_POST['email']);
$organization = validateData($_POST['organization']);
$address = validateData($_POST['address']);
$customerid = strtoupper("KJ".substr(number_format(time() * rand(),0,'',''),0,6));
$remarks = validateData($_POST['remarks']);
$class = validateData($_POST['class']);
if($class=='Credit Customer'){$remarks = "Credit Customer";}
$vat = validateData($_POST['vat']);
$sundry = validateData($_POST['sundry']);

$checkj = mysql_result(mysql_query("SELECT CAST(jobno AS UNSIGNED) FROM vehicles ORDER BY CAST(jobno AS UNSIGNED) DESC LIMIT 1"),0);
$checkjv = mysql_result(mysql_query("SELECT CAST(jobno AS UNSIGNED) FROM jobs ORDER BY CAST(jobno AS UNSIGNED) DESC LIMIT 1"),0);

if($checkj>$checkjv){$jobno=$checkj+1;}elseif($checkjv>$checkj){$jobno=$checkjv+1;}elseif($checkjv==$checkj){$jobno=$checkj+1;}else{$jobno=1;}

$addcontact = mysql_query("INSERT INTO contacts VALUES ('$name','$telephoneno','$email','$organization','$address','$customerid','$remarks','$sundry','$vat')") or die(mysql_error());

if(isset($addcontact)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Contact Information ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
You can add a new vehicle information associated with this contact.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php exit;}}elseif(isset($_POST['savenext'])){
$name = validateData($_POST['name']);
$telephoneno = validateData($_POST['telephoneno']);
$email = validateData($_POST['email']);
$organization = validateData($_POST['organization']);
$address = validateData($_POST['address']);
$customerid = strtoupper("KJ".substr(number_format(time() * rand(),0,'',''),0,6));
$remarks = validateData($_POST['remarks']);
$vat = validateData($_POST['vat']);
$sundry = validateData($_POST['sundry']);

$checkj = mysql_result(mysql_query("SELECT CAST(jobno AS UNSIGNED) FROM vehicles ORDER BY CAST(jobno AS UNSIGNED) DESC LIMIT 1"),0);
$checkjv = mysql_result(mysql_query("SELECT CAST(jobno AS UNSIGNED) FROM jobs ORDER BY CAST(jobno AS UNSIGNED) DESC LIMIT 1"),0);

if($checkj>$checkjv){$jobno=$checkj+1;}elseif($checkjv>$checkj){$jobno=$checkjv+1;}elseif($checkjv==$checkj){$jobno=$checkj+1;}else{$jobno=1;}

$addcontact = mysql_query("INSERT INTO contacts VALUES ('$name','$telephoneno','$email','$organization','$address','$customerid','$remarks','$sundry','$vat')") or die(mysql_error());

if(isset($addcontact)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Contact Information ! </b>Added <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
You can add a new vehicle information associated with this contact.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>           
            <div class="row">
                <div class="col-lg-12">
 				
<form action="newdquestion.php" method="post" enctype="multipart/form-data" name="contactform">
<input name="customerid" type="hidden" value="<?php echo $customerid; ?>">
<input name="vcondition" type="hidden" value="JOB ORDER" />
<input name="daterecieved" type="hidden" value="<?php echo date("Y-m-d"); ?>" />
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer ID:</label>
<?php echo $customerid; ?>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">ID: </label>
<input name="jobno" type="hidden" class="form-control" placeholder="Job No" maxlength="33" value="<?php echo $jobno; ?>">
ID: <?php echo $jobno; ?>
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Vehicle Reg. No: </label>
<input name="vregno" type="text" class="form-control" placeholder="Vehicle Reg No">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Date of Registration: </label>
<input name="regdate" type="text" class="form-control" placeholder="Date of Registration" id="datepicker">

</div>
</div> 

<div class="form-group">

<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Vehicle Make: </label>

<select name="modelname" class="form-control">
<option value="Toyota Yaris">Toyota Yaris</option>
<option value="Toyota Corolla">Toyota Corolla</option>
<option value="Toyota Avensis">Toyota Avensis</option>
<option value="Toyota Camry">Toyota Camry</option>
<option value="Toyota RAV 4">Toyota RAV 4</option>
<option value="Toyota Previa">Toyota Previa</option>
<option value="Toyota Landcruiser Prado">Toyota Landcruiser Prado</option>
<option value="Toyota Landcruiser">Toyota Landcruiser</option>
<option value="Toyota Hiace">Toyota Hiace</option>
<option value="Toyota Hilux">Toyota Hilux</option>
<option value="Toyota Coaster">Toyota Coaster</option>
<option value="Toyota Avanza">Toyota Avanza</option>
<option value="Toyota Dyna">Toyota Dyna</option>
<option value="Toyota Sequoia">Toyota Sequoia</option>
<option value="Toyota Tundra">Toyota Tundra</option>
<option value="Toyota FJ Cruiser">Toyota FJ Cruiser</option>
<option value="Toyota Lexus">Toyota Lexus</option>
<option value="Toyota Matrix">Toyota Matrix</option>
<option value="Toyota Highlander">Toyota Highlander</option>
<option value="Toyota Venza">Toyota Venza</option>
<option value="Toyota 4Runner">Toyota 4Runner</option>
<option value="Toyota Fortuner">Toyota Fortuner</option>
<option value="Toyota Solara">Toyota Solara</option>
<option value="Toyota Condor">Toyota Condor</option>
<option value="Toyota Echo">Toyota Echo</option>
<option value="Toyota Carina">Toyota Carina</option>
<option value="Mercedez">Mercedez</option>
<option value="Pajero">Pajero</option>
<option value="Honda">Honda</option>
<option value="Sienna">Sienna</option>
<option value="Nissan">Nissan</option>
<option value="FJ Cruiser">FJ Cruiser</option>


</select>
</div>

<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Model No/Series: </label>
<input name="modelno" type="text" class="form-control" placeholder="Model No"  pattern=".{12,14}" title="12 to 14 characters">
</div>

</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Engine No: </label>
<input name="frameno" type="text" class="form-control" placeholder="Engine No" pattern=".{9,11}" title="9 to 11 characters">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Odometer Reading: </label>
<input name="vin" type="text" class="form-control" placeholder="Mile/Kilometer" maxlength="10">
</div>
<div class="col-lg-2">
<label class="control-label col-lg-12" for="content">Unit: </label>
<select name="unit" class="form-control">
  <option value="Mi">Mi</option>
  <option value="Ki">Km</option>
</select></div>

</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Color: </label>
<input name="color" type="text" class="form-control" placeholder="Color" maxlength="50">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Chasis No/VIN: </label>
<input name="chasisno" type="text" class="form-control" placeholder="Chasis No/VIN"  pattern=".{17,18}" title="17 to 18 characters">
</div>
</div>

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-4">
<input name="save2" type="submit" value="Save Vehicle Details" class="btn btn-lg btn-primary btn-block" />
</div>
<div class="col-lg-4">
<input name="JobOrder" type="submit" value="Go to Customer Order" class="btn btn-lg btn-warning btn-block" />
</div>
<div class="col-lg-4">
<input value="Next: Diagnosis Questionaire"  class="btn btn-lg btn-success btn-block"  name="savenext" type="submit" />
</div>
</div></form>


                   
                        </div>
                        </div>
<?php }} ?>

            <div class="row">
                <div class="col-lg-12">
<?php 
if(isset($_GET['customerid'])){$customerid = $_GET['customerid']; 
			
$checkj = mysql_result(mysql_query("SELECT CAST(jobno AS UNSIGNED) FROM vehicles ORDER BY CAST(jobno AS UNSIGNED) DESC LIMIT 1"),0);
$checkjv = mysql_result(mysql_query("SELECT CAST(jobno AS UNSIGNED) FROM jobs ORDER BY CAST(jobno AS UNSIGNED) DESC LIMIT 1"),0);

if($checkj>$checkjv){$jobno=$checkj+1;}elseif($checkjv>$checkj){$jobno=$checkjv+1;}elseif($checkjv==$checkj){$jobno=$checkj+1;}else{$jobno=1;}

 ?> 				
<form action="newdquestion.php" method="post" enctype="multipart/form-data" name="contactform">
<input name="customerid" type="hidden" value="<?php echo $customerid; ?>">
<input name="vcondition" type="hidden" value="RECORDED" />
<input name="daterecieved" type="hidden" value="<?php echo date("Y-m-d"); ?>" />
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer ID:</label>
<?php echo $customerid; ?>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">ID: </label>
<input name="jobno" type="hidden" class="form-control" placeholder="Job No" maxlength="33" value="<?php echo $jobno; ?>">
ID: <?php echo $jobno; ?>
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Vehicle Reg. No: </label>
<input name="vregno" type="text" class="form-control" placeholder="Vehicle Reg No" maxlength="50" required>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Date of Registration: </label>
<input name="regdate" type="text" class="form-control" placeholder="Date of Registration" maxlength="20" id="datepicker">
</div>
</div> 

<div class="form-group">

<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Vehicle Make: </label>
<select name="modelname" class="form-control">
<option value="Toyota Yaris">Toyota Yaris</option>
<option value="Toyota Corolla">Toyota Corolla</option>
<option value="Toyota Avensis">Toyota Avensis</option>
<option value="Toyota Camry">Toyota Camry</option>
<option value="Toyota RAV 4">Toyota RAV 4</option>
<option value="Toyota Previa">Toyota Previa</option>
<option value="Toyota Landcruiser Prado">Toyota Landcruiser Prado</option>
<option value="Toyota Landcruiser">Toyota Landcruiser</option>
<option value="Toyota Hiace">Toyota Hiace</option>
<option value="Toyota Hilux">Toyota Hilux</option>
<option value="Toyota Coaster">Toyota Coaster</option>
<option value="Toyota Avanza">Toyota Avanza</option>
<option value="Toyota Dyna">Toyota Dyna</option>
<option value="Toyota Sequoia">Toyota Sequoia</option>
<option value="Toyota Tundra">Toyota Tundra</option>
<option value="Toyota FJ Cruiser">Toyota FJ Cruiser</option>
<option value="Toyota Lexus">Toyota Lexus</option>
<option value="Toyota Matrix">Toyota Matrix</option>
<option value="Toyota Highlander">Toyota Highlander</option>
<option value="Toyota Venza">Toyota Venza</option>
<option value="Toyota 4Runner">Toyota 4Runner</option>
<option value="Toyota Fortuner">Toyota Fortuner</option>
<option value="Toyota Solara">Toyota Solara</option>
<option value="Toyota Condor">Toyota Condor</option>
<option value="Toyota Echo">Toyota Echo</option>
<option value="Toyota Carina">Toyota Carina</option>
</select>
</div>

<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Model No: </label>
<input name="modelno" type="text" class="form-control" placeholder="Model No" maxlength="50">
</div>

</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Engine No: </label>
<input name="frameno" type="text" class="form-control" placeholder="Engine No" maxlength="50">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Odometer Reading: </label>
<input name="vin" type="text" class="form-control" placeholder="Mile/Kilometer" maxlength="100">
</div>
<div class="col-lg-2">
<label class="control-label col-lg-12" for="content">Unit: </label>
<select name="unit" class="form-control">
  <option value="Mi">Mi</option>
  <option value="Km">Km</option>
</select></div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Color: </label>
<input name="color" type="text" class="form-control" placeholder="Color" maxlength="50">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Chasis No/VIN: </label>
<input name="chasisno" type="text" class="form-control" placeholder="Chasis No" maxlength="100">
</div>
</div>


<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-4">
<input name="save2" type="submit" value="Save Vehicle Details" class="btn btn-lg btn-primary btn-block" />
</div>
<div class="col-lg-4">
<input name="JobOrder" type="submit" value="Go to Job Order" class="btn btn-lg btn-warning btn-block" />
</div>
<div class="col-lg-4">
<input value="Next: Diagnosis Questionaire"  class="btn btn-lg btn-success btn-block"  name="savenext" type="submit" />
</div>
</div>
</form>


                   
                        </div>
                        </div>

<?php } ?>
                        
            