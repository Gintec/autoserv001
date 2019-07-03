<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Add Stock to Inventory </h1>
                </div>
                <!--End Page Header -->
            </div>


<?php
if(isset($_POST['save1'])){
$partdesc = validateData($_POST['partdesc']);
$partno = validateData($_POST['partno']);
$unitprice = validateData($_POST['unitprice']);
$costprice = validateData($_POST['costprice']);
$qpurchased = validateData($_POST['qpurchased']);
$location = validateData($_POST['location']);
$datesupplied = date("Y-m-d",strtotime($_POST['datesupplied']));
$remarks = validateData($_POST['remarks']);

$addpart = mysql_query("INSERT INTO inventory VALUES ('$partdesc','$partno','$unitprice','$qpurchased','$qpurchased','$costprize','$location','$datesupplied','$remarks','0')") or die(mysql_error());

if(isset($addpart)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;<?php echo $partdesc; ?> ! </b> successfully added to the list of <b>spareparts inventory. </b><hr />

 <i class="fa  fa-pencil"></i>
Add new service.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>           
		   
            <div class="row">
                <div class="col-lg-12">
				
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" name="contactform">
<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Description of Part :</label>
<input name="partdesc" type="text" class="form-control" id="description" maxlength="200" placeholder="Description">
</div>
</div>
<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Part No: </label>
<input name="partno" type="text" class="form-control" placeholder="Part Number" maxlength="33">
</div> 
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Cost Price: </label>
<input name="costprice" type="text" class="form-control" placeholder="Unit Price" maxlength="50">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Unit Price: </label>
<input name="unitprice" type="text" class="form-control" placeholder="Unit Price" maxlength="50">
</div>

</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Quantity Purchased: </label>
<input name="qpurchased" type="number" class="form-control" maxlength="150" placeholder="Quantity Purchased">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Location: </label>
<input name="location" type="text" class="form-control" placeholder="Location" maxlength="200">
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Date Supplied: </label>
<input name="datesupplied" type="text" class="form-control" id="datepicker" maxlength="150" placeholder="Date Supplied">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Remarks: </label>
<input name="remarks" type="text" class="form-control" placeholder="Remarks" maxlength="200">
</div>
</div> 

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-6">
<input value="Cancel"  class="btn btn-lg btn-success btn-block"  name="savenext" type="reset" />
</div>
<div class="col-lg-6">
<input name="save1" type="submit" value="Save" class="btn btn-lg btn-primary btn-block" />
</div>
</div>
</form>


                   
                        </div>
                        </div>

                        
            