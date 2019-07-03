<br>
<br>
<?php
if(isset($_POST['Update'])){
$tamount = 0;
$amount = $_POST['amount'];
$partno = $_POST['partno'];
$quantity = $_POST['quantity'];
$pid = $_POST['pid'];
$jobno = $_GET['jobno'];
$customerid = $_GET['customerid'];

if($_POST['quantity']=="0"){$ammt= $amount;}else{
$ammt = $amount*$quantity;
}

$upd = mysql_query("UPDATE partsorder SET amount='$ammt', partsno='$partno',quantity='$quantity' WHERE pid='$pid' AND customerid='$customerid'") or die(mysql_error());

$tamount = mysql_result(mysql_query("SELECT SUM(amount) FROM partsorder WHERE jobno='$jobno' AND partsname!='Discount' AND customerid='$customerid' LIMIT 1"),0);
$discount = mysql_result(mysql_query("SELECT amount FROM partsorder WHERE jobno='$jobno' AND partsname='Discount' AND customerid='$customerid' LIMIT 1"),0);

$cdinfo = mysql_query("SELECT sundry,vat FROM contacts WHERE customerid ='$customerid'") or die(mysql_error());
  	while($cds = mysql_fetch_row($cdinfo)){
	$sundry = $cds[0];
	$vatc = $cds[1];
	}

$tamount+=$sundry;
 $vat = ($tamount/100)*$vatc;
 $tamount+=$vat;
 
$disc = ($tamount/100)*$discount; $tamount-=$disc;

$upd = mysql_query("UPDATE jobs SET amount='$tamount' WHERE jobno='$jobno' AND customerid='$customerid'") or die(mysql_error());

if(isset($upd)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Part No <?php echo $partno; ?> Updated Successfully! <a href="jobestimate.php?jobno=<?php echo $jobno; ?>&customerid=<?php echo $customerid; ?>" target="_blank" class="btn-group btn-default btn-sm">Print Estimate</a></b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }}
if(isset($_GET['deletepart'])){
$pid = $_GET['deletepart'];
$del = mysql_query("DELETE FROM partsorder WHERE pid='$pid'") or die(mysql_error());

if(isset($addpart)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Part(s) Deleted ! </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }}?>

<?php
if(isset($_GET['deleteservice'])){
$sid = $_GET['deleteservice'];
$del = mysql_query("DELETE FROM serviceorder WHERE sid='$sid'") or die(mysql_error());

if(isset($addpart)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Service(s) Deleted ! </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }}?>   


<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Update Job Estimate</h1>
                </div>
                <!--End Page Header -->
</div>          
<?php
if(!isset($jobno)){$jobno=$_GET['jobno'];}
if(!isset($customerid)){$customerid=$_GET['customerid'];
}
?>
<table width="80%" align="center" class="table table-striped table-bordered  table-condensed">
      <tr>
        <td width="52%" class="h5"><strong>Part Description </strong></td>
        <td width="21%" class="h5"><strong>Part No </strong></td>
        <td width="27%" class="h5"><strong>Quantity</strong></td>
		<td width="27%" class="h5"><strong>Edit</strong></td>
		<td width="27%" class="h5"><strong>Remove</strong></td>
      </tr>
	  <?php $gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); 
	  while($p = mysql_fetch_array($gps)){?>
      <tr>
        <td><?php echo $p['partsname']; ?></td>
        <td><?php echo $p['partsno']; ?></td>
        <td><?php echo $p['quantity']; ?></td>
		<td>
		<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?jobno=<?php echo $jobno; ?>&customerid=<?php echo $customerid; ?>">
		<input name="pid" type="hidden" id="pid" value="<?php echo $p['pid']; ?>" />
		<input name="customerid" type="hidden" id="pid" value="<?php echo $customerid; ?>" />
		<table width="200" class="table table-condensed">
  <tr>
    <td>
      Unit Price
      <input name="amount" type="text" id="amount" value="<?php  if($p['quantity']=="0"){echo $p['amount'];}else{echo $p['amount']/$p['quantity']; }  ?>" />
    </td>
    <td>Part No
      <input name="partno" type="text" id="partno" value="<?php echo $p['partsno']; ?>"  /></td>
    <td>Quantity
      <input name="quantity" type="text" id="quantity" value="<?php if($p['quantity']==""){echo "0";}else{echo $p['quantity'];} ?>" /></td>
    <td><label>
      <input name="Update" type="submit" id="Update" value="Update" />
    </label></td>
  </tr>
</table>

        </form>
		</td>
		<td><a href="?deletepart=<?php echo $p['pid']; ?>&jobno=<?php echo $jobno; ?>&customerid=<?php echo $customerid; ?>"  class="btn-inline btn-sm btn-danger">Remove</a></td>
      </tr>
	  <?php } ?>
   
    </table>
	<strong>Services to be carried out: </strong>
<table width="80%" align="center"  class="table table-striped table-bordered  table-condensed">
      <tr>
        <td class="h5"><strong>Service </strong></td>
        <td class="h5"><strong>Description</strong></td>
		<td class="h5"><strong>Remove</strong></td>
        </tr>
	  <?php $so = mysql_query("SELECT * FROM serviceorder WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); 
	  while($s = mysql_fetch_array($so)){?>
      <tr>
        <td><?php echo $s['servicename']; ?></td>
        <td><?php echo $s['description']; ?></td>
		<td><a href="?deleteservice=<?php echo $s['sid']; ?>&jobno=<?php echo $jobno; ?>&customerid=<?php echo $customerid; ?>"  class="btn-danger btn-inline btn-sm">Remove</a></td>
        </tr>
	  <?php } ?>
    </table>
<div class="row">
<div class="col-lg-12">
				
<form action="jobinstruction.php" method="post" enctype="multipart/form-data" name="contactform" target="_blank">
<input name="vregno" type="hidden" value="<?php $ji = mysql_query("SELECT vregno FROM vehicles WHERE  customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); while($j = mysql_fetch_row($ji)){ echo $j[0]; } ?>" />

<input name="jid" type="hidden" value="<?php echo mysql_result(mysql_query("select jid FROM jobs WHERE jobno='$jobno' and customerid='$customerid' LIMIT 1"),0); ?>" />

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
<label class="control-label col-lg-12" for="content">Customer ID:</label>
<input name="customerid" type="text" class="form-control" placeholder="Customer ID" value="<?php echo $customerid; ?>"  maxlength="100">
</div>
<div class="col-lg-6">
<label class="control-label col-lg-12" for="content">Job No: </label>
<input name="jobno" type="text" class="form-control" placeholder="Job No" maxlength="33" value="<?php echo $jobno; ?>" >
</div>
</div> 

<div class="form-group">
<div class="col-lg-12">
<div class="input_fields_wrap">
<label class="control-label col-lg-12" for="content">Add Parts to be Used: </label>
<div class="col-lg-8"><input list="parts" type="text" name="parts[]" class="form-control"></div><div class="col-lg-2">Quantity: <input type="text" name="qty[]" class="form-control" placeholder="Quantity"></div><div class="col-lg-2">Unit Price: <input type="text" name="amt[]" class="form-control" placeholder="Amount" value="0"></div>

</div>
<div class="col-lg-12">
	    <button class="add_field_button btn btn-success">Add More Parts</button>
</div>
</div>
</div>

<div class="form-group">

<div class="input_fields_wrap2">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Add Services to carried out: </label>
    <input list="services" type="text" name="services[]" class="form-control">
</div>
</div>
<div class="col-lg-12">
	    <button class="add_field_button2 btn btn-success">Add More Services</button>
</div>
</div>


<div class="form-group">
<div class="col-lg-4">
Labour
<input name="labour" type="text" class="form-control" placeholder="Labour" maxlength="10" value="<?php echo mysql_result(mysql_query("SELECT amount FROM partsorder WHERE jobno='$jobno' AND partsname='Labour' LIMIT 1"),0); ?>">
</div>
<div class="col-lg-4">
Discount
<input name="discount" type="number" step="0.01"  class="form-control" placeholder="% Percentage Discount" maxlength="4" value="<?php echo mysql_result(mysql_query("SELECT amount FROM partsorder WHERE jobno='$jobno' AND partsname='Discount' LIMIT 1"),0); ?>">
</div>
<div class="col-lg-4">
<label class="control-label col-lg-12" for="content">.</label>
<input name="Save" type="submit" class="btn btn-primary btn-lg btn-block" onClick="clearform();" value="Save and Print">
</div>
</div>
                   
                        </div>
                        </div>                        
            