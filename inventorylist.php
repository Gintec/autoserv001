<br>
<br>
<?php
if(isset($_GET['Delete'])){
$partid = $_GET['Delete'];
$del = mysql_query("DELETE FROM inventory WHERE partid='$partid'") or die(mysql_error());

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
<?php }}

if(isset($_GET['Update'])){

include_once('updateinventoryform.php');
exit;
}else{

?>   
			
<h3 align="center">INVENTORY/STOCK</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <tr>
    <td>Description</td>
    <td>Part No</td>
    <td>Unit Cost</td>
    <td>Qty Remaining</td>
    <td>Quantity Purchased</td>
    <td>Location</td>
    <td>Supplied</td>
    <td>Notes</td>
    <td>Update/Delete</td>
  </tr>
</thead>
<tbody>
<?php

$getrg = mysql_query("SELECT * FROM inventory ORDER by partdesc ASC, datesupplied DESC ") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
    <td><?php echo $rg['partdesc']; ?></td>
    <td><?php echo $rg['partno']; ?></td>
    <td><?php echo $rg['unitprice']; ?></td>
    <td><?php echo $rg['quantity']; ?></td>
    <td><?php echo $rg['quantitypurchased']; ?></td>
	<td><?php echo $rg['location']; ?></td>
    <td><?php echo $rg['datesupplied']; ?></td>
	<td><?php echo $rg['remarks']; ?></td>

    <td><div class="btn-group"><a href="inventory.php?Update=<?php echo $rg['partid']; ?>" class="btn btn-success btn-sm  btn-group">Update</a><a href="inventory.php?Delete=<?php echo $rg['partid']; ?>" class="btn btn-warning btn-sm  btn-group">Delete</a>
	</div></td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } ?>