<style>
td{font-size:11px !important; }
</style>
<br>
<br>
<?php
if(isset($_GET['Delete'])){
$staffid = $_GET['Delete'];
$del = mysql_query("DELETE FROM personnel WHERE staffid='$staffid'") or die(mysql_error());

if(isset($del)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Staff Deleted ! </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
<?php }}

if(isset($_GET['Update'])){

include_once('updatestaff.php');
exit;
}else{

?>   
			
<h3 align="center">PERSONNEL</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <tr>
    <td>Name</td>
    <td>Designation</td>
    <td>Contact</td>
    
    <td>Department</td>
    <td>Last Salary(Total)</td>
    <td>Highest Cert</td>
    <td>Login</td>
    <td>Download CV</td>
  </tr>
</thead>
<tbody>
<?php

$getrg = mysql_query("SELECT * FROM personnel") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
    <td><?php $stname = $rg['surname']." ".$rg['firstname']." ".$rg['othernames']; echo $stname; ?></td>
    <td><?php echo $rg['designation']; ?></td>
    <td><?php echo $rg['phoneno']." ".$rg['email']; ?></td>
    <td><?php echo $rg['department']; ?></td>
	<td><?php echo $rg['salary']; ?></td>
    <td><?php echo $rg['highestcert']; ?></td>
	<td><?php echo $rg['password']." (".$rg['staffid'].")"; ?></td>

    <td><div class="btn-group">
	<a href="updatepersonnel.php?Update=<?php echo $rg['staffid']; ?>" class="btn-primary btn-sm btn-group">Update</a>
	<a href="images/<?php echo $staffid."/".$rg['cv']; ?>" class="btn-warning btn-sm btn-group">CV</a>
	<a href="payroll.php?Pay=<?php echo $rg['staffid']; ?>&amount=<?php echo $rg['salary']; ?>&stname=<?php echo $stname; ?>" class="btn-success btn-sm btn-group" target="_blank">Pay</a>
		<a href="?Delete=<?php echo $rg['staffid']; ?>" class="btn-danger btn-sm btn-group">Delete</a>
	</div></td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } ?>