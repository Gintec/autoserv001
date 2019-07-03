<br />
<br />
<?php
if(isset($_POST['Save'])){
$issuedby = validateData($_POST['issuedby']);
$receivedby = validateData($_POST['receivedby']);
$approvedby = validateData($_POST['approvedby']);
$dated = date("Y-m-d",strtotime($_POST['dated']));
$customerid = validateData($_POST['customerid']);
$jobno = validateData($_POST['jobno']);
$jid = validateData($_POST['jid']);

$qry = mysql_query("INSERT INTO inreport VALUES('$issuedby','$approvedby','$receivedby','$dated','$jobno','$customerid','$jid')") or die(mysql_error());

$gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); 
	  while($p = mysql_fetch_array($gps)){
	  $qtyo = $p['quantity'];
mysql_query("UPDATE IGNORE inventory SET quantity = quantity - $qtyo WHERE  partdesc ='$partd'") or die(mysql_error());
}
 if(isset($qry)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Spare Parts Confirmation Saved ! </b></div></div><!--end  Welcome --></div>
			<?php }}?>
<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">CONFIRM PARTS RELEASE</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
<?php if(isset($_GET['jobno'])){
$jobno = $_GET['jobno'];
$customerid = $_GET['customerid'];
?>	
<h3 class="center">(JOB NO: <?php echo mysql_result(mysql_query("select jid FROM jobs WHERE jobno='$jobno' and customerid='$customerid' LIMIT 1"),0); ?>)</h3>			
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" name="contactform">
<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Customer Name:</label>
<input name="customerid" type="hidden" value="<?php echo $customerid; ?>">
<input name="jobno" type="hidden" value="<?php echo $jobno; ?>">
<input name="jid" type="hidden" value="<?php echo mysql_result(mysql_query("select jid FROM jobs WHERE jobno='$jobno' and customerid='$customerid' LIMIT 1"),0); ?>" />
<?php echo mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0); ?>
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Approvedby: </label>
<input name="approvedby" type="text" class="form-control" placeholder="Approved by" maxlength="50">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Received by: </label>
<input name="receivedby" type="text" class="form-control" maxlength="100" placeholder="Recieved by">
</div>
</div> 

<div class="form-group">
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Issued by: </label>
<input name="issuedby" type="text" class="form-control" placeholder="Issued By" maxlength="33">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Date Issued: </label>
<input name="dated" type="text" class="form-control" id="datepicker" maxlength="150" placeholder="Date Issued">
</div>
</div>
<div class="col-lg-6"> 
<input name="Save" type="submit" value="Save" class="btn btn-primary" />
</div>
</form>
<?php } ?>
</div>
</div>

                        
            