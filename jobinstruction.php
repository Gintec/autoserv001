<?php include_once('kmaccess.php'); ?>
<?php
if(isset($_POST['Save'])){
//Store to variales
$jobno = validateData($_POST['jobno']);
$vregno = validateData($_POST['vregno']);
$discount = validateData($_POST['discount']);
$customerid = validateData($_POST['customerid']);
$parts = $_POST['parts'];
$services = $_POST['services'];
$labour = validateData(str_replace(",","",$_POST['labour']));
$jid = validateData($_POST['jid']);
if($jid==""){$jid=0;}
$pdate = date("Y-m-d");
$s = 0;
$tamount=0;

//Store each parts in the parts order table
foreach( $parts as $pts => $partdesc ) {
$qtyo = str_replace(",","",$_POST['qty'][$s]);
$amt = str_replace(",","",$_POST['amt'][$s]);
$ammt = $qtyo*$amt;
  $partinfo = mysql_query("SELECT * FROM inventory WHERE partdesc ='$partdesc'") or die(mysql_error());
  if(mysql_num_rows($partinfo)<1){
  if($ammt=="0"){
  $amount = 0;
  }else{$amount = $ammt;}
  $tamount+=$amount;
  $order = mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','$partdesc','-','$qtyo','$ammt','$pdate','0','Pending')") or die(mysql_error());
  
  }else{
  while($pd = mysql_fetch_array($partinfo)){
  
  $partd = $pd['partdesc'];
  $partno = $pd['partno'];
  $ucost = $pd['unitprice'];
  $iqty = $pd['quantity'];
  if($ammt=="0"){
  $amount = $ucost*$qtyo;
  }else{$amount = $ammt;}
  $tamount+=$amount;
  $order = mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','$partd','$partno','$qtyo','$amount','$pdate','0','Pending')") or die(mysql_error());
  }}
  $s++;
  }
  
  foreach( $services as $service => $serviced) {
  $serinfo = mysql_query("SELECT * FROM services WHERE servicename ='$serviced'") or die(mysql_error());
  if(mysql_num_rows($serinfo)<1){
  
  $servi = mysql_query("INSERT INTO serviceorder VALUES('$customerid','$jobno','$serviced','$serviced','-','$pdate','0','Pending')") or die(mysql_error());
  
  }else{
  $sinfo = mysql_query("SELECT * FROM services WHERE servicename ='$serviced'") or die(mysql_error());
  while($sd = mysql_fetch_array($sinfo)){
  $servicename = $sd['servicename'];
  $description = $sd['description'];
  $cost = $sd['cost'];  
  $sorder = mysql_query("INSERT INTO serviceorder VALUES('$customerid','$jobno','$servicename','$description','$cost','$pdate','0','Pending')") or die(mysql_error());
  }
  }
  }
  
  mysql_query("DELETE FROM partsorder WHERE customerid='$customerid' AND jobno='$jobno' AND partsname='Labour' OR partsname='Discount'") or die(mysql_error());
//Store the Labour also
mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','Labour','-','0','$labour','$pdate','0','Pending')") or die(mysql_error());
if($discount=="0"){}else{
mysql_query("INSERT INTO partsorder VALUES('$customerid','$jobno','Discount','-','0','$discount','$pdate','0','Pending')") or die(mysql_error());
}

 $cdinfo = mysql_query("SELECT sundry,vat FROM contacts WHERE customerid ='$customerid'") or die(mysql_error());
  	while($cds = mysql_fetch_row($cdinfo)){
	$sundry = $cds[0];
	$vatc = $cds[1];
	}
	
	
$vat = (($tamount+$labour+$sundry)/100)*$vatc;  

if($discount=="0"){
$discountedl=0;
}else{
$discountedl = (($tamount+$labour+$sundry+$vat)/100)*$discount;
}

//Get the total charge including VAT and Sundry
$ototal = ($tamount+$labour+$vat+$sundry)-$discountedl;

//Get the Vehicle Information
$ji = mysql_query("SELECT vregno,chasisno,modelname,vin FROM vehicles WHERE vregno='$vregno'") or die(mysql_error()); while($j = mysql_fetch_row($ji)){ $description = "Reg No: <strong>".$j[0]."</strong><br /> Chasis No: <strong>".$j[1]."</strong><br />Make: <strong>".$j[2]."</strong> Odometer Reading: <strong>".$j[3]."</strong>"; }

  mysql_query("DELETE FROM jobs WHERE customerid='$customerid' AND jobno='$jobno'") or die(mysql_error());
//Store the jobs on the job order table
mysql_query("INSERT INTO jobs VALUES('$customerid','$jobno','$description','$pdate','Pending','$ototal','$jid')") or die(mysql_error());

 mysql_query("DELETE FROM partsorder WHERE partsname=''") or die(mysql_error());  
}
if(!isset($jobno)){$jobno=$_GET['jobno'];}
if(!isset($customerid)){$customerid=$_GET['customerid'];}
$getdq = mysql_query("SELECT * FROM diagnosis WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error());
  while($dq = mysql_fetch_array($getdq)){
  $diagnosis = $dq['diagnosis'];
  $problems = $dq['problems'];
  $causes = $dq['causes'];  
$request = $dq['request'];
  $deliverydate = $dq['deliverydate'];
  $status = $dq['status'];  
$instructions = $dq['instructions'];
$remarks = $dq['remarks'];
$did = $dq['did'];
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOJO MOTORS | ERP SYSTEM</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
	<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
<style media="print">
input{border:1px #ccc solid; }
	@media all {
	div.page-break	{ display: none; size: 8.5in 11in; page-break-after: always;  /* width height */}
}

@media print {
	div.page-break	{ display: block; page-break-after: always; page-break-inside: avoid; size: 8.5in 11in; margin:auto;  /* width height */ }
}

td{padding:0px !important;
font-size:11px;
}
	</style>
<body onLoad="window.print()">
	 <div class="page-break">
	<img src="images/KT.jpg" style="position:absolute relative; width:100% !important; top:0px; z-index:100">
	<div align="left" class="h3" style="margin-left:5%; margin-right:5%;">JOB INSTRUCTION <strong style="float:right;font-size:13px;">ID (<?php echo $jobno;?>)::::: Date: <?php echo date("dS M, Y"); ?></strong></div>
	<table width="100%" align="center" class="table table-condensed table-bordered" style="width:90%; background-color:#FFFFFF;">
  

 
  
  <tr>
    <td class="h6"><div align="center">CUSTOMER DETAILS</div></td>
  </tr>
  <tr>
    <td>
	<?php 
	 $cinfo = mysql_query("SELECT * FROM contacts WHERE customerid ='$customerid'") or die(mysql_error());
  	while($cd = mysql_fetch_array($cinfo)){ ?>
	<table width="100%" class="table table-striped table-condensed" align="center";>
  <tr>
    <td width="18%" align="right"><strong>Customer Name/ID: </strong></td>
    <td width="31%"><?php echo $cd['name']." / ".$cd['customerid']; ?></td>
    <td width="17%" align="right"><strong>Organization:</strong></td>
    <td width="34%"><?php echo $cd['name']." / ".$cd['organization']; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>Phone No: </strong></td>
    <td><?php echo $cd['telephoneno']; ?></td>
    <td align="right"><strong>E-mail:</strong></td>
    <td><?php echo $cd['email']; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>Address:</strong></td>
    <td colspan="3"><?php echo $cd['address']; ?></td>    
  </tr>
  <?php  $ji = mysql_query("SELECT vregno,chasisno,modelname,vin FROM vehicles WHERE vregno='$remarks'") or die(mysql_error()); while($j = mysql_fetch_row($ji)){ ?>
  <tr>
    <td align="right"><strong>VEHICLE REG NO: </strong></td>
    <td><?php echo $j[0]; $vregno = $j[0]; ?></td>
    <td align="right"><strong>ODOMETER READING </strong></td>
    <td><?php echo $j[3]; ?></td>
  </tr>
  <tr>
    <td align="right"><strong>VIN/MODEL NO: </strong></td>
    <td><?php echo $j[2]; ?></td>
    <td align="right"><strong>VEHICLE MAKE: </strong></td>
    <td><?php echo $j[1]; ?></td>
  </tr>
 <?php  $ji = mysql_query("SELECT deliverydate FROM diagnosis WHERE remarks='$vregno' AND jobno='$jobno'") or die(mysql_error()); while($d = mysql_fetch_row($ji)){?> 
  <tr>
    <td align="right"><strong>Received On: </strong></td>
    
    <td colspan="3"><?php echo $d[0]; ?></td>
  </tr>
<?php } } ?>
</table>
<?php }  ?>	</td>
  </tr>
  
<tr>
    <td class="style2"></td>
  </tr>

  <tr>
    <td class="h5"><strong>Services to be carried out: </strong></td>
  </tr>
  <tr>
    <td>
	<table width="80%" align="center"  class="table table-striped table-bordered  table-condensed">
      <tr>
        <td class="h5"><strong>Service </strong></td>
        <td class="h5"><strong>Description</strong></td>
        </tr>
	  <?php $so = mysql_query("SELECT * FROM serviceorder WHERE customerid ='$customerid' AND jobno='$jobno'") or die(mysql_error()); 
	  while($s = mysql_fetch_array($so)){?>
      <tr>
        <td><?php echo $s['servicename']; ?></td>
        <td><?php echo $s['description']; ?></td>
        </tr>
	  <?php } ?>
    </table>	</td>
  </tr>
  <tr>
    <td>
	<table width="80%" align="center" class="table table-striped table-bordered  table-condensed">
      <tr>
        <td width="52%" class="h5"><strong>Job Detail /  Description </strong></td>
        <td width="10%" class="h5"><strong>Part No </strong></td>
        <td width="11%" class="h5"><strong>Quantity</strong></td>
        <td width="27%" class="h5"><strong>Remarks</strong></td>
      </tr>
	  <?php $gps = mysql_query("SELECT * FROM partsorder WHERE customerid ='$customerid' AND jobno='$jobno' AND partsname!='Labour' AND partsname!='Discount'") or die(mysql_error()); 
	  while($p = mysql_fetch_array($gps)){?>
      <tr>
        <td><?php echo $p['partsname']; ?></td>
        <td><?php echo $p['partsno']; ?></td>
        <td><?php echo $p['quantity']; ?></td>
        <td></td>
      </tr>
	  <?php } ?>
    </table></td>
  </tr>
  
  
</table>
<table width="100%" style="font-size:7px !important; width:95%" class="table table-condensed" align="center" border="1">
 <tr>
    <td colspan="2"><img src="images/v.jpg" alt="VEHICLE" width="200" height="120"></td>
    <td colspan="3"><table cellspacing="0" cellpadding="0" style="font-size:7px !important; width:98%">
      <tr>
        <td align="right" width="50%">Additional Job Completionn : </td>
        <td width="50%"><input name="jobdetails2" id="jobdetails2" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">Value : </td>
        <td><input name="feeexp2" id="feeexp2" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">Project Estimatew/Explanationr: </td>
        <td><input name="resultconf2" id="resultconf2" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">Car Was Needed?  : </td>
        <td><input name="walkaround2" id="walkaround2" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">Replaced Part Keep: </td>
        <td><input name="walkaround22" id="walkaround22" value="ok" type="checkbox"></td>
      </tr>
    </table></td>
    </tr>
  <tr>
  <tr>
    <td width="43%"><table width="120" cellpadding="0" cellspacing="0" style="font-size:7px !important; width:98%">
      <tr>
        <td>1</td>
        <td></td>
        <td>2</td>
      </tr>
      <tr>
        <td><input name="cleanness" value="ok" type="checkbox"></td>
        <td align="right" width="92%">
        Cleanness (Exterior/Interior): </td>
        <td width="8%"><input name="cleanness" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td><input name="cleanness" value="ok" type="checkbox"></td>
        <td align="right">Courtesy Items Removal: </td>
        <td><input name="courtesy" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td><input name="cleanness" value="ok" type="checkbox"></td>
        <td align="right">Outer Mirror Position / Seat Position: </td>
        <td><input name="position" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td><input name="cleanness" value="ok" type="checkbox"></td>
        <td align="right">Clock Adjustment / Radio Sitting: </td>
		<td><input name="position" value="ok" type="checkbox"></td>
      </tr>

      <tr>
        <td></td>
        <td align="right">Job Completion Notificxation:</td>
        <td><input name="position2" value="ok" type="checkbox"></td>
      </tr>
      
        
      
    </table>    </td>
    <td width="11%">
    </p> <small><em>Signed 1</em></small>
      <p>Date:________<br>
      Time: _______</p>

      <small><em>Signed 2</em></small>
      <p>Date:________<br>
      Time: _______</p>
    </td>
    <td><table cellspacing="0" cellpadding="0" style="font-size:7px !important; width:98%">
      <tr>
        <td align="right" width="93%">Job Details Explanation : </td>
        <td width="7%"><input name="jobdetails" id="jobdetails" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">Fee Explanation : </td>
        <td><input name="feeexp" id="feeexp" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">Result Confirmation with Customer: </td>
        <td><input name="resultconf" id="resultconf" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">Walk-Around Check : </td>
        <td><input name="walkaround" id="walkaround" value="ok" type="checkbox"></td>
      </tr>
      
    </table>    </td>
    <td>
	<table width="179" style="font-size:7px !important; width:98%">
	<tr>
        <td width="78%" align="right">Fixed:</td>
        <td width="22%"><input name="fixed" id="fixed" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">Level Up: </td>
        <td><input name="fixed" id="fixed" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">No Fixed: </td>
        <td><input name="nofixed" id="nofixed" value="ok" type="checkbox"></td>
      </tr>
      <tr>
        <td align="right">PSFU(Plan)</td>
		<td><input name="nofixed" id="nofixed" value="ok" type="checkbox"></td>
      </tr>
	</table>	</td>
    <td><p>Delivery: Dtae:______________</p>
      <p>&nbsp;</p>
      <p>Time:_________</p>
      <p>Customer:___________________ </p>      </td>
  </tr>
  
  <tr>
    <td colspan="2"><strong>Change of Delivery Time: </strong></td>
    <td colspan="3"><strong>Job Time: </strong></td>
  </tr>
  <tr>
    <td colspan="2" valign="bottom"><p>Additional Jobs /Job Stoppage/Others</p>
      <p>Completion Changed: ______________________________</p></td>
    <td colspan="3" valign="bottom"><p>Job Start: Date __________________ Time ______________ </p>
      <p>Job Completion: Date: _______________ Time: ___________</p>
      </td>
  </tr>
  <tr>
    <td height="30" colspan="2" valign="bottom">Other Findings : </td>
    <td width="28%" valign="bottom">Actual Hours Clocked: __________ </td>
    <td width="8%" valign="bottom">Technician Name:<br>
      <br> 
      __________________ </td>
    <td width="10%" valign="bottom">Quality Control Staff: <br>
      <br>
      _________________ </td>
    </tr>
  
  <!--
  <tr>
    <td colspan="5" valign="bottom">

       Pre-Delivery Conformation:
      <input type="checkbox" name="checkbox" value="checkbox"> 
      Cleanliness(Exterior/Interior)  
       
      <input type="checkbox" name="checkbox2" value="checkbox">
      Courtesy Items Removal 
      
      <input type="checkbox" name="checkbox3" value="checkbox">
      Outer Mirror Position / Seat Position 
       
      <input type="checkbox" name="checkbox4" value="checkbox">
      Clock Adustment / Radio Setting      </td>
    </tr>

-->
  <tr>
    <td height="30" colspan="2" valign="bottom">Job Completion Notification: Date:___________ Time: ______________ </td>
    <td colspan="3" valign="bottom">Delivered to Owner / Family / Other ( ______________ ) </td>
  </tr>
  <tr>
    <td colspan="2" valign="bottom">P.S.F.U. (Plan): <br>
      <br>
      Date: 
      ____________ Time: ______________</td>
    <td colspan="3" valign="bottom"><p>Contact Info: <br>
      Telephone No: _______________________________ (Home/Business/Mobile) </p>
      <p>Email: ___________________________________________ </p></td>
  </tr>
  <tr>
    <td colspan="2" valign="bottom">P.S.F.U (Actual): <br>
      <br>
      Date: _________________ Time _____________________ </td>
    <td colspan="3" valign="bottom">Customer:  
      Owner / Family / Other ( ____________________ ) </td>
  </tr>
  <tr>
    <td colspan="2" valign="bottom"><p>P.S.F.U (GJ) :<br>
        <input type="checkbox" name="checkbox5" value="checkbox"> 
        Fixed
        <br>
        <input type="checkbox" name="checkbox6" value="checkbox"> 
        Followup Status (Follow up Again <br>
        <br>
        Date: ________________ Time: ______________________<br>
        <input type="checkbox" name="checkbox7" value="checkbox"> 
        Not Fixed (Appointment Date/Time) <br>
        <br>
        Date:________________ Time: ____________________</p>      </td>
    <td colspan="3" valign="bottom">Staff Name: ______________________________________ <br>
      
      <br>
      Confirmed By: ______________________________________ <br>
<br>
Supplied By: ______________________________________ <br>
Issued By: ______________________________________ <br>
Order By: <?php echo $_SESSION['name']; ?></td>
  </tr>
</table>



	</div>
	
</body>
</html>