<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">UPDATE PROFILE</h1>
                </div>
                <!--End Page Header -->
            </div>
<?php
if(isset($_POST['save1'])){
$firstname=validateData($_POST['firstname']);
$surname=validateData($_POST['surname']);
$othernames=validateData($_POST['othernames']);
$spassword=validateData($_POST['spassword']);
$designation=validateData($_POST['designation']);
$department=validateData($_POST['department']);
$phoneno=validateData($_POST['phoneno']);
$address=validateData($_POST['address']);
$email=validateData($_POST['email']);
$salary=validateData($_POST['salary']);
$highestcert=validateData($_POST['highestcert']);
$picture=$_FILES['picture']['name'];
$cv=$_FILES['cv']['name'];

$guarantor=validateData($_POST['guarantor']);
$empdate=date("Y-m-d",strtotime($_POST['empdate']));
$maritalstatus=validateData($_POST['maritalstatus']);
$stateoforigin=validateData($_POST['stateoforigin']);
$staffid=validateData($_POST['staffid']);
$dob=date("Y-m-d",strtotime($_POST['dob']));

if($picture!=""){
$new = "images/$staffid/";
$filename = $_FILES['picture']['name'];
$filename2 = $_FILES['cv']['name'];

$picture = str_replace(' ', '_', $filename);
$cv = str_replace(' ', '_', $filename2);

uploadSermon($cv,$new);
uploadPic($picture,$new);
}else{
$cv=validateData($_POST['ocv']);
$picture=validateData($_POST['opicture']);
}

mysql_query("DELETE FROM personnel WHERE staffid='$staffid'") or die(mysql_error());

$addfile = mysql_query("INSERT INTO personnel VALUES('$surname','$firstname','$othernames','$designation','$phoneno','$email','$address','$department','$salary','$highestcert','$spassword','$guarantor','$staffid','$cv','$dob','$stateoforigin','$maritalstatus','$empdate','$picture')") or die(mysql_error());

if(isset($addfile)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;<?php echo $firstname." ".$surname; ?> ! </b>has been added to the Staff Database <b>Successfully. </b><hr /> <i class="fa  fa-pencil"></i>Add new one.</div></div><!--end  Welcome --></div>
			<?php }}?>            

            <div class="row">
                <div class="col-lg-12">
<?php
if(isset($_GET['Update'])){
$staffid = $_GET['Update'];
}else{
$staffid = $_SESSION['staffid'];
}
$getrg = mysql_query("SELECT * FROM personnel WHERE staffid='$staffid'") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" name="contactform">

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Firstname:</label>
<input name="firstname" type="text" class="form-control" id="firstname" maxlength="50" placeholder="Firstname" value="<?php echo $rg['firstname']; ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Surname: </label>
<input name="surname" type="text" class="form-control" placeholder="Surname" maxlength="50" value="<?php echo $rg['surname']; ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Othernames: </label>
<input name="othernames" type="text" class="form-control" placeholder="othernames" maxlength="50" value="<?php echo $rg['othernames']; ?>">
</div>
</div>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Date of Birth: </label>
<input name="dob" type="text" class="form-control" placeholder="Date of Birth" maxlength="50" id="datepicker" value="<?php echo $rg['dob']; ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">State of Origin:</label>
<input name="stateoforigin" list="state" class="form-control" id="state" maxlength="50" placeholder="State of Origin"  value="<?php echo $rg['stateoforigin']; ?>">
<datalist id="state">
<option value="Abia">
<option value="Adamawa">
<option value="Akwa Ibom">
<option value="Anambra">
<option value="Bauchi">
<option value="Bayelsa">
<option value="Benue">
<option value="Borno">
<option value="Cross River">
<option value="Delta">
<option value="Ebonyi">
<option value="Edo">
<option value="Ekiti">
<option value="Enugu">
<option value="Federal Capital Territory">
<option value="Gombe">
<option value="Imo">
<option value="Jigawa">
<option value="Kaduna">
<option value="Kano">
<option value="Katsina">
<option value="Kebbi">
<option value="Kogi">
<option value="Kwara">
<option value="Lagos">
<option value="Nasarawa">
<option value="Niger">
<option value="Ogun">
<option value="Ondo">
<option value="Osun">
<option value="Oyo">
<option value="Plateau">
<option value="Rivers">
<option value="Sokoto">
<option value="Taraba">
<option value="Yobe">
<option value="Zamfara"></datalist>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Marital Status: </label>
<select name="maritalstatus" class="form-control">
  <option value="Single">Single</option>
  <option value="Married">Married</option>
  <option  value="<?php echo $rg['maritalstatus']; ?>"><?php echo $rg['maritalstatus']; ?></option>
  
</select>
</div>
</div>

<div class="row center"><h4>Contact Information</h4></div>
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Phone No: </label>
<input name="phoneno" type="text" class="form-control" placeholder="Phone Number" maxlength="50" value="<?php echo $rg['phoneno']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">E-mail:</label>
<input name="email" type="email" class="form-control" id="titLe" maxlength="100" placeholder="E-mail" value="<?php echo $rg['email']; ?>">
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Address: </label>
<input name="address" type="text" class="form-control" placeholder="Address" maxlength="100" value="<?php echo $rg['address']; ?>">
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Guarantor's Name: </label>
<input name="guarantor" type="text" class="form-control" placeholder="Guarantor Name" maxlength="50" value="<?php echo $rg['guarantor']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Guarantors Phone Number:</label>
<input name="gphoneno" type="text" class="form-control" maxlength="100" placeholder="Guarantor Phone Numer">
</div>
</div>

<div class="row center"><h4>Educational Information</h4></div>
<div class="form-group">
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">Highest Certificate: </label>
<input name="highestcert" list="cert" class="form-control" placeholder="Highest Certificate" maxlength="50" value="<?php echo $rg['highestcert']; ?>">
<datalist id="cert">
<option value="O'Level">
<option value="OND">
<option value="ND">
<option value="HND">
<option value="Bsc">
<option value="PHd">
<option value="Msc">
<option value="LLB">
<option value="B.Eng">
<option value="M.Eng">
</option>
</div>
<div class="col-lg-7">
<label class="control-label col-lg-12" for="content">School Obtained:</label>
<input name="school" type="text" class="form-control" maxlength="100" placeholder="School Obtained">
</div>
<div class="col-lg-2">
<label class="control-label col-lg-12" for="content">Year: </label>
<input name="year" type="text" class="form-control" placeholder="Year" maxlength="20">
</div>
</div>

<div class="row center"><h4>Official Information</h4></div>
<div class="form-group">
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">Date Employed: </label>
<input name="empdate" type="text" class="form-control" placeholder="Date Employed" id="datepicker2" maxlength="50" value="<?php echo $rg['empdate']; ?>">
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">Department:</label>
<select name="department" class="form-control">
  <option  value="<?php echo $rg['department']; ?>" selected="selected"><?php echo $rg['department']; ?></option>
  <option value="Admin">Admin</option>
  <option value="Front Desk">Front Desk</option>
  <option value="Spare Parts / Store">Spare Parts / Store</option>
  <option value="Workshop">Workshop</option>
  <option value="Security">Security</option>
  <option value="Body Work">Body Work</option>
  <option value="Finance">Finance</option>
</select>
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">Unit/Designation: </label>
<select name="designation" class="form-control">
  <option  value="<?php echo $rg['designation']; ?>" selected="selected"><?php echo $rg['designation']; ?></option>
  <option value="Service Advisors">Service Advisors</option>
  <option value="Customer Service">Customer Service</option>
  <option value="Procurement/Logistics">Procurement/Logistics</option>
  <option value="Accountant">Accountant</option>
  <option value="Cashier">Cashier</option>
  <option value="Workshop Manager">Workshop Manager</option>
  <option value="Part Supervisor">Part Supervisor</option>
  <option value="Store Keeper">Store Keeper</option>
  <option value="Marketer/OTC">Marketer/OTC</option>
   <option value="Electrical">Electrical</option>
  <option value="Mechanical">Mechanical</option>
  <option value="Car Wash">Car Wash</option>
  <option value="Cleaner">Cleaner</option>
  <option value="Security">Security</option>
  <option value="Others">Others</option>
  <option value="Quality Control">Quality Control</option>
  <option value="Tire Service">Tire Service</option>
    <option value="Panel Beater">Panel Beater</option>
  <option value="Painter">Painter</option>
</select>
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">Basic Salary: </label>
<input name="salary" type="text" class="form-control" placeholder="salary" maxlength="30" value="<?php echo $rg['salary']; ?>">
</div>
</div> 

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Passport: </label>
<input name="picture" type="file" class="form-conrol" />
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Upload CV: </label>
<input name="cv" type="file" class="form-conrol" />
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Password: </label>
<input name="spassword" type="text" class="form-control" placeholder="Password" maxlength="50" value="<?php echo $rg['password']; ?>">
</div>
</div> 
<input name="staffid" type="hidden" value="<?php echo $rg['staffid']; ?>" />
<input name="opicture" type="hidden" value="<?php echo $rg['picture']; ?>" />
<input name="ocv" type="hidden" value="<?php echo $rg['cv']; ?>" />

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">. </label>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">.</label>
<input name="save1" type="submit" value="Update" class="btn btn-lg btn-primary btn-block" />
</div>
</div>
</form>

<?php }  ?>
                   
                        </div>
                        </div>

                        
            