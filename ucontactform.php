<br />
<br />
<?php
if(isset($_GET['Delete'])){
$customerid = $_GET['Delete'];
$del = mysql_query("DELETE FROM contacts WHERE customerid='$customerid'") or die(mysql_error());

if(isset($del)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Customer Deleted ! </b>
						<a href="contacts.php" class="btn-inline btn-primary btn-sm  btn-group">Click here to go back</a>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }} ?>

<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Contact Update</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
<?php 
if(isset($_POST['Update'])){
$name = validateData($_POST['name']);
$telephoneno = validateData($_POST['telephoneno']);
$email = validateData($_POST['email']);
$organization = validateData($_POST['organization']);
$address = validateData($_POST['address']);
$customerid = validateData($_POST['customerid']);
$remarks = validateData($_POST['remarks']);
$class = validateData($_POST['class']);
if($class=='Credit Customer'){$remarks = "Credit Customer";}

$vat = validateData($_POST['vat']);
$sundry = validateData($_POST['sundry']);
mysql_query("DELETE FROM contacts WHERE customerid='$customerid'") or die(mysql_error());
$addcontact = mysql_query("INSERT INTO contacts VALUES ('$name','$telephoneno','$email','$organization','$address','$customerid','$remarks','$sundry','$vat')") or die(mysql_error());

if(isset($addcontact)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b><?php echo $name; ?>'s Contact Information ! </b>Updated <b>Successfully. </b><hr />

 <i class="fa  fa-pencil"></i>
<a href="contacts.php?searchkey=<?php echo $customerid; ?>" class="btn-inline btn-primary btn-sm  btn-group">Click here to go back</a>                   </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }}

if(isset($_GET['UpdateCustomer'])){
$customerid = $_GET['UpdateCustomer'];
$cinfo = mysql_query("SELECT * FROM contacts WHERE customerid='$customerid'") or die(mysql_error());
while($cin = mysql_fetch_array($cinfo)){
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" name="contactform">
<input name="customerid" type="hidden" value="<?php echo $cin['customerid']; ?>" />
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer Name:</label>
<input name="name" type="text" class="form-control" id="name" maxlength="100" placeholder="Enter customer name" value="<?php echo $cin['name']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Telephone No: </label>
<input name="telephoneno" type="text" class="form-control" placeholder="Telephone Number" maxlength="33"  value="<?php echo $cin['telephoneno']; ?>">
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">E-mail Address: </label>
<input name="email" type="email" class="form-control" placeholder="E-mail Address" maxlength="50" value="<?php echo $cin['email']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Company Name: </label>
<input name="organization" type="text" class="form-control" id="organization" maxlength="100" placeholder="Company/Organization Name"  value="<?php echo $cin['organization']; ?>">
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Address: </label>
<input name="address" type="text" class="form-control" id="address" maxlength="150" placeholder="Address" value="<?php echo $cin['address']; ?>">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Category: </label>
<select name="remarks" class="form-control">
<option value="<?php echo $cin['remarks']; ?>" selected="selected"><?php if($cin['remarks']=='Credit Customer'){echo "Sales";}else{echo $cin['remarks'];} ?></option>

  <option value="Sales">Sales</option>
  <option value="Service">Service</option>
  <option value="Enquiry">Enquiry</option>
  <option value="Others">Others</option>
</select>
</div>
</div> 

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Sundry Charges: </label>
<select name="sundry" class="form-control">
<option value="<?php echo $cin['sundry']; ?>" selected="selected"><?php echo $cin['sundry']; ?></option>
  <option value="0">0</option>
  <option value="2500">2500</option>
  <option value="5000">5000</option>
</select>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">VAT Percentage: </label>
<select name="vat" class="form-control">
<option value="<?php echo $cin['vat']; ?>" selected="selected"><?php echo $cin['vat']; ?></option>
  <option value="0">0%</option>
  <option value="5">5%</option>
  <option value="10">10%</option>
</select>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Customer Class: </label>
<select name="class" class="form-control">
<option value="<?php echo $cin['remarks']; ?>" selected="selected"><?php if($cin['remarks']!='Credit Customer'){echo "Non-Credit Customer";}else{echo $cin['remarks'];}?></option>
<option value="Credit Customer">Credit Customer</option>
  <option value="Non-Credit Customer">Non-Credit Customer</option>

</select>
</div>
</div> 

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-6">
<input name="Update" type="submit" value="Update Contact" class="btn btn-lg btn-primary btn-block" />
</div>
<div class="col-lg-6">
<?php if($_SESSION['designation']=="Administrator"){ ?>
<a href="?Delete=<?php echo $cin['customerid']; ?>" class="btn-inline btn-danger btn-sm  btn-group">Delete Customer</a>
<?php } ?>
</div>
</div>
</form>

<?php }}?>
                   
                        </div>
                        </div>

                        
            