<br>
<br>
<style>
td{font-size:12px;}
</style>
<h3 align="center">ALL CONTACTS/CUSTOMERS</h3>
<a href="contacts.php" class="btn-inline btn-primary btn-sm  btn-group">View All Contacts</a>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:12px; width:100%;">
                                    <thead>
  <tr>
    <td>Contact Name</td>
    <td>Organinzation</td>
    <td>Tel. No</td>
    <td>E-mail</td>
    <td>Customer ID</td>
    <td>Category</td>
    <td>View/Edit</td>
  </tr>
</thead>
<tbody>
<?php

if(isset($_GET['searchkey'])){$searchkey = substr($_GET['searchkey'],0,10); $filters = "WHERE name LIKE '%$searchkey%' OR organization LIKE '%$searchkey%' OR customerid LIKE '%$searchkey%'";}else{$filters=""; }

$getrg = mysql_query("SELECT * FROM contacts $filters") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
    <td><?php echo $rg['name']; ?></td>
    <td><?php echo $rg['organization']; ?></td>
    <td><?php echo $rg['telephoneno']; ?></td>
    <td><?php echo $rg['email']; ?></td>
    <td><?php echo $rg['customerid']; ?></td>
    <td><?php echo $rg['remarks']; ?></td>
    <td>
	<div class="btn-group">
	<?php if($_SESSION['department']=="Front Desk" || $_SESSION['designation']=="Administrator"){ ?>
	<a href="editcontact.php?UpdateCustomer=<?php echo $rg['customerid']; ?>" class="btn-inline btn-primary btn-sm  btn-group">Update</a>
	<?php } ?>
	<?php if($_SESSION['department']=="Spare Parts / Store" || $_SESSION['designation']=="Administrator"){ ?>
	<a href="newproforma.php?customerid=<?php echo $rg['customerid']; ?>&Proforma=Proforma" class="btn-inline btn-success btn-sm  btn-group">Proforma</a>
	
	<?php } ?>
	<a href="customerjobs.php?customerid=<?php echo $rg['customerid']; ?>" class="btn-inline btn-warning btn-sm  btn-group" target="_blank">Jobs</a>
	<a href="newschedule.php?customerid=<?php echo $rg['customerid']; ?>" class="btn-inline btn-danger btn-sm  btn-group" >Schedule</a>
	<a href="vehicles.php?searchkey=<?php echo $rg['customerid']; ?>" class="btn-inline btn-warning btn-sm  btn-group">Vehicles</a>
	<a href="newvehicle.php?customerid=<?php echo $rg['customerid']; ?>" class="btn-inline btn-primary btn-sm  btn-group">New Job/Vehicle</a>	

	</div>	
	</td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>