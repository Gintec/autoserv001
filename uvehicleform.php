<br />
<br />
<?php
if(isset($_GET['Delete'])){
$vregno = $_GET['Delete'];
$del = mysql_query("DELETE FROM vehicles WHERE vregno='$vregno'") or die(mysql_error());

if(isset($del)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Vehicle Deleted ! </b>
						<a href="vehicles.php" class="btn-inline btn-primary btn-sm  btn-group">Click here to go back</a>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }} ?>


<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">New Vehicle Record</h1>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-lg-12">

<?php 

if(isset($_POST['Update'])){

$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$vregno = validateData($_POST['vregno']); 
$regdate = date("Y-m-d",strtotime($_POST['regdate']));
$modelname = validateData($_POST['modelname']);
$modelno = validateData($_POST['modelno']);
$frameno = validateData($_POST['frameno']);
$vin = validateData($_POST['vin']);
$color = validateData($_POST['color']); 
$chasisno = validateData($_POST['chasisno']); 
$vcondition = validateData($_POST['vcondition']); 
$daterecieved = date("Y-m-d",strtotime($_POST['daterecieved']));

mysql_query("DELETE FROM vehicles WHERE vregno='$vregno' AND jobno='$jobno'") or die(mysql_error());
$addvehicle = mysql_query("INSERT INTO vehicles VALUES ('$customerid','$jobno','$vregno','$regdate','$modelname','$modelno','$frameno','$vin','$color','$chasisno','$vcondition','$daterecieved')") or die(mysql_error());

if(isset($addvehicle)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Vehicle Information ! </b>Update <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
<a href="vehicles.php?searchkey=<?php echo $vregno; ?>" class="btn-inline btn-primary btn-sm  btn-group">Click here to go back</a>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }}

if(isset($_GET['UpdateVehicle'])){
$vregno = $_GET['UpdateVehicle'];
$jobno = $_GET['jobno'];
$vinfo = mysql_query("SELECT * FROM vehicles WHERE vregno='$vregno' AND jobno='$jobno'") or die(mysql_error());
while($vin = mysql_fetch_array($vinfo)){
?>				
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" name="contactform">
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer ID:</label>
<input name="customerid" type="text" class="form-control" placeholder="Customer name" maxlength="100" value="<?php echo $vin['customerid']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">ID: </label><?php echo $vin['jobno']; ?>
<input name="jobno" type="hidden" class="form-control" placeholder="Job No" maxlength="33" value="<?php echo $vin['jobno']; ?>">
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Vehicle Reg. No: </label>
<input name="vregno" type="text" class="form-control" placeholder="Vehicle Reg No" maxlength="50"  value="<?php echo $vin['vregno']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Date of Registration: </label>
<input name="regdate" type="text" class="form-control" placeholder="Date of Registration" maxlength="20" id="datepicker"  value="<?php echo $vin['regdate']; ?>">
</div>
</div> 

<div class="form-group">

<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Vehicle Make: </label>
<input name="modelname" type="text" class="form-control" placeholder="Model Name" maxlength="100" value="<?php echo $vin['modelname']; ?>">
</div>

<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Model No: </label>
<input name="modelno" type="text" class="form-control" placeholder="Model No" maxlength="50" value="<?php echo $vin['modelno']; ?>">
</div>

</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Engine No: </label>
<input name="frameno" type="text" class="form-control" placeholder="Engine No" maxlength="50"  value="<?php echo $vin['frameno']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Mileage: </label>
<input name="vin" type="text" class="form-control" placeholder="VIN" maxlength="100" value="<?php echo $vin['vin']; ?>">
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Color: </label>
<input name="color" type="text" class="form-control" placeholder="Color" maxlength="50" value="<?php echo $vin['color']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Chasis No/VIN: </label>
<input name="chasisno" type="text" class="form-control" placeholder="Chasis No" maxlength="100" value="<?php echo $vin['chasisno']; ?>">
</div>
</div>

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Vehicle Current Status: </label>
<input name="vcondition" type="text" class="form-control" placeholder="e.g. At the Garage, Delivered, At the Oven etc" maxlength="50"  value="<?php echo $vin['vcondition']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Date Recieved: </label>
<input name="daterecieved" type="text" class="form-control" placeholder="Date Recieved" maxlength="100" id="datepicker2" value="<?php echo $vin['daterecieved']; ?>">
</div>
</div>


<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-6">
<input name="Update" type="submit" value="Update Vehicle Details" class="btn btn-lg btn-primary btn-block" />
</div>
<div class="col-lg-6">
<?php if($_SESSION['designation']=="Administrator"){ ?>
<a href="?Delete=<?php echo $vin['vregno']; ?>" class="btn-inline btn-danger btn-sm  btn-group">Delete Vehicle</a>
<?php } ?>
</div>
</div>
</form>
<?php }} ?>

                   
                        </div>
                        </div>

                        
            