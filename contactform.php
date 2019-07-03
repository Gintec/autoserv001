<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">New Contact/Customer</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
				
<form action="newvehicle.php" method="post" enctype="multipart/form-data" name="contactform">
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer Name:</label>
<input name="name" type="text" class="form-control" id="name" maxlength="100" placeholder="Enter customer name">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Telephone No: </label>
<input name="telephoneno" type="text" class="form-control" placeholder="Telephone Number" maxlength="33">
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">E-mail Address: </label>
<input name="email" type="email" class="form-control" placeholder="E-mail Address" maxlength="50">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Company Name: </label>
<input name="organization" type="text" class="form-control" id="organization" maxlength="100" placeholder="Company/Organization Name">
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Address: </label>
<input name="address" type="text" class="form-control" id="address" maxlength="150" placeholder="Address">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Category: </label>
<select name="remarks" class="form-control">
<option value="Credit Customer">Credit Customer</option>
  <option value="Vehicle Sales">Vehicle Sales</option>
  <option value="Service" selected="selected">Service</option>
   <option value="Spare Parts">Spare Parts</option>
  <option value="Enquiry">Enquiry</option>
  <option value="Others">Others</option>
</select>
</div>
</div> 


<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Sundry Charges: </label>
<select name="sundry" class="form-control">
  <option value="0">0</option>
  <option value="2500" selected="selected">2500</option>
  <option value="5000">5000</option>
</select>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">VAT Percentage: </label>
<select name="vat" class="form-control">
  <option value="0">0%</option>
  <option value="5" selected="selected">5%</option>
  <option value="10">10%</option>
</select>
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Customer Class: </label>
<select name="class" class="form-control">
<option value="Credit Customer">Credit Customer</option>
  <option value="Non-Credit Customer" selected="selected">Non-Credit Customer</option>

</select>
</div>
</div> 

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-6">
<input name="save1" type="submit" value="Save Contact" class="btn btn-lg btn-primary btn-block" />
</div>
<div class="col-lg-6">
<input value="Next: Vehicle Details"  class="btn btn-lg btn-success btn-block"  name="savenext" type="submit" />
</div>
</div>
</form>


                   
                        </div>
                        </div>

                        
            