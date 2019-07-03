<br>
<br>
<?php
if(isset($_GET['Delete'])){
$vregno = $_GET['Delete'];
$del = mysql_query("DELETE FROM vehicles WHERE vregno='$vregno'") or die(mysql_error());

if(isset($addpart)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Staff Deleted ! </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }}?>   
			
<h3 align="center">VEHICLES</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:12px;">
                                    <thead>
  <tr>
    <td width="37">Name</td>
    <td width="46">No</td>
    <td width="101">Vehicle Reg. No</td>
    <td width="95">Model name/no</td>
    <td width="28">VIN</td>
    <td width="40">Chasis</td>
    <td width="37">Status</td>
    <td width="56">Date Recieved</td>
    <td width="142">Delete</td>
  </tr>
</thead>
<tbody>
<?php
if(isset($_GET['searchkey'])){$searchkey = substr($_GET['searchkey'],0,10); $filters = "WHERE customerid LIKE '%$searchkey%' OR jobno LIKE '%$searchkey%' OR vregno LIKE '%$searchkey%'";}else{$filters=""; }

$getrg = mysql_query("SELECT * FROM vehicles $filters") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
$customerid = $rg['customerid'];
?>

  <tr>
    <td><?php echo mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0); ?></td>
    <td><?php echo $rg['jobno']; ?></td>
   
    <td><?php echo $rg['vregno']; ?></td>
    <td><?php echo $rg['modelname']."/".$rg['modelno']; ?></td>
	<td><?php echo $rg['vin']; ?></td>
    <td><?php echo $rg['chasisno']; ?></td>
	<td><?php echo $rg['vcondition']; ?></td>
    <td><?php echo $rg['daterecieved']; ?></td>
	<td>
	<div class="btn-group">
	<a href="editvehicle.php?UpdateVehicle=<?php echo $rg['vregno']; ?>&jobno=<?php echo $rg['jobno']; ?>" class="btn-sm btn-warning btn-group">Update</a>
	<a href="newdquestion.php?vregno=<?php echo $rg['vregno']; ?>&customerid=<?php echo $rg['customerid']; ?>" class="btn-sm btn-success btn-group">Diagnosis</a>
	<a href="joborder.php?vregno=<?php echo $rg['vregno']; ?>&customerid=<?php echo $rg['customerid']; ?>" class="btn-sm btn-primary btn-group">New Order</a>
	</div>
	</td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>