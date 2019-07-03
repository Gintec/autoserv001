<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">New Sales</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
				
<form action="reciept3.php" method="post" enctype="multipart/form-data" name="contactform">

<datalist id="parts">
 <?php 
	  $mmsd = mysql_query("SELECT partdesc FROM inventory") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>">
	<?php } ?>
</datalist>

<datalist id="jobnos">
 <?php 
 if(isset($_GET['customerid'])){$customerid = $_GET['customerid']; $mmsd = mysql_query("SELECT jobno FROM vehicles WHERE customerid='$customerid'") or die(mysql_error()); }else{
	  $mmsd = mysql_query("SELECT jobno FROM vehicles") or die(mysql_error());}
	  while($mbd = mysql_fetch_row($mmsd)){ $jobno = $mbd[0]; ?>
		<option value="<?php echo $mbd[0]; ?>">
	<?php } ?>
</datalist>

<div class="form-group">
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Customer Name:</label>
<input name="name" type="text" class="form-control" id="name" maxlength="100" placeholder="Enter customer name" value="<?php if(isset($_GET['customerid'])){ $customerid = $_GET['customerid']; echo $customername = mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0); }?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Customer ID: </label>
<input name="customerid" type="text" class="form-control" placeholder="Customerid" maxlength="33" value="<?php if(isset($_GET['customerid'])){ echo $_GET['customerid']; }else{ echo strtoupper("KJ".substr(number_format(time() * rand(),0,'',''),0,6));} ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">Sales No: </label>
<input name="jobno" list="jobnos" class="form-control" placeholder="Job No" maxlength="50" value="<?php if(isset($jobno)){ echo $jobno; }else{ echo strtoupper("JK".substr(number_format(time() * rand(),0,'',''),0,8));} ?>">
</div>
</div>

<div class="form-group">
<div class="col-lg-12">
<div class="input_fields_wrap">
<label class="control-label col-lg-12" for="content">Parts Description/Quantity: </label>
<div class="col-lg-8"><input list="parts" type="text" name="parts[]" class="form-control"></div><div class="col-lg-2"><input type="number" name="qty[]" class="form-control" placeholder="Quantity" value="1"></div><div class="col-lg-2"><input type="number" name="amount[]" class="form-control" placeholder="Unit Price" value="1"></div>

</div>
<div class="col-lg-12">
	    <button class="add_field_button btn btn-success">Add More Parts</button>
</div>
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Amount Paid: </label>
<input name="amount" type="text" class="form-control" id="amount" maxlength="150" placeholder="in figures only(no commas)">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Date Sold: </label>
<input name="datesold" type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" maxlength="30" id="datepicker">
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Payment Method: </label>
<select name="paymethod" class="form-control">
  <option value="Cash">Cash</option>
  <option value="Bank Deposit">Bank Deposit</option>
  <option value="POS">POS</option>
  <option value="Online Transfer">Online Transfer</option>
  <option value="Mobile Banking">Mobile Banking</option>
  <option value="Cheque">Cheque</option>
</select>
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Payment Particulars: </label>
<input name="particulars" type="text" class="form-control" placeholder="e.g. Ref No/Teller No etc" maxlength="100">
</div>
</div> 

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-6">
<input name="save1" type="submit" value="Save Sales" class="btn btn-lg btn-primary btn-block" />
</div>
<div class="col-lg-6">
<input value="Print Reciept"  class="btn btn-lg btn-success btn-block"  name="savenext" type="submit" />
</div>
</div>
</form>


                   
                        </div>
                        </div>

                        
            