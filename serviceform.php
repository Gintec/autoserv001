<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Create Services</h1>
                </div>
                <!--End Page Header -->
            </div>

<?php
if(isset($_POST['Save'])){
$servicename = validateData($_POST['servicename']);
$description = validateData($_POST['description']);
$cost = validateData($_POST['cost']);
$addservice = mysql_query("INSERT INTO services VALUES ('$servicename','$description','$cost','0')") or die(mysql_error());

if(isset($addservice)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;<?php echo $servicename; ?> ! </b> successfully added to the list of <b>Services. </b><hr />

 <i class="fa  fa-pencil"></i>
Add new service.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?>           
           

            <div class="row">
                <div class="col-lg-12">
				
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" name="serviceform">

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="servicename">Service Name: </label>
<input name="servicename" type="text" class="form-control input-lg" placeholder="e.g. Changing of Oil" maxlength="50" id="servicename">
</div>
</div>
<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Service Decription: </label>
<input name="description" type="text" class="form-control input-lg" placeholder="Describe the Service" maxlength="120">
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Cost: </label>
<input name="cost" type="text" class="form-control input-lg" placeholder="Cost" maxlength="30">
</div>

<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">.</label>
<button class="btn btn-lg btn-primary btn-block" type="submit" name="Save"><i class="fa fa-save fa-fw"></i> Save Service</button>

</div>
</div>

</form>


                   
                        </div>
                        </div>

                        
            