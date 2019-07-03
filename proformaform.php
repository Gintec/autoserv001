<?php 
if(isset($_GET['Proforma'])){$customerid = $_GET['customerid']; 
$checkj = mysql_result(mysql_query("SELECT jobno FROM jobs ORDER BY jobno DESC LIMIT 1"),0);
$jobno=$checkj+1;
} ?>
<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Proforma Invoice  Form </h1>
                </div>
                <!--End Page Header -->
</div>
            <div class="row">
                <div class="col-lg-12">
<?php 
	 $cinfo = mysql_query("SELECT * FROM contacts WHERE customerid ='$customerid'") or die(mysql_error());
  	while($cd = mysql_fetch_array($cinfo)){
	$name = $cd['name'];
	$organization = $cd['organization'];
	}
	?>				
<form action="proformaInvoice.php" method="post" enctype="multipart/form-data" name="contactform" target="_blank" class="hideit">
<input name="customerid" type="hidden" value="<?php echo $customerid; ?>" />
<datalist id="parts">
 <?php 
	  $mmsd = mysql_query("SELECT partdesc FROM inventory") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>">
	<?php } ?>
</datalist>
	
<datalist id="services">
 <?php 
	  $mmsd = mysql_query("SELECT servicename FROM services") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>">
	<?php } ?>
</datalist>
	
<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Customer:</label>
<?php echo $name." (".$organization.")";	?>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">No: </label>
<input name="jobno" type="text" class="form-control" placeholder="Job No" maxlength="33" value="<?php echo $jobno; ?>" >
</div>
</div> 

<div class="form-group">
<div class="col-lg-12">
<div class="input_fields_wrap">
<label class="control-label col-lg-12" for="content">Select Parts to be Used: </label>
<div class="col-lg-8"><input list="parts" type="text" name="parts[]" class="form-control"></div><div class="col-lg-2">Quantity: <input type="number" name="qty[]" class="form-control" placeholder="Quantity"></div><div class="col-lg-2">Unit Price: <input type="text" name="amt[]" class="form-control" placeholder="Unit Price"></div>

</div>
<div class="col-lg-12">
	    <button class="add_field_button btn btn-success">Add More Parts</button>
</div>
</div>
</div>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">% Discount</label>
<input name="discount" type="number" class="form-control" placeholder="% Percentage Discount" maxlength="10" value="0">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">% VAT</label>
<input name="vatc" type="number" class="form-control" placeholder="% VAT" maxlength="10" value="5">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">.</label>
<input name="Save" type="submit" class="btn btn-primary btn-lg btn-block hider" onclick="clearForm(this.form);" value="Save and Print">
</div>
</div>
                   
                        </div>
                        </div>                        
            