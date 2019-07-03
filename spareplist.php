<br>
<br>
<style>
td{font-size:12px;}
</style>
<h3 align="center">SPARE PARTS ISSUE CONFIRMATION</h3>

<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:12px; width:100%;">
                                    <thead>
  <tr>
    <td>Dated</td>
    <td>Issued by</td>
    <td>Approved by</td>
    <td>Received by</td>
    <td>Customer ID</td>
    <td>Job No</td>
  </tr>
</thead>
<tbody>
<?php

if(isset($_GET['searchkey'])){$searchkey = substr($_GET['searchkey'],0,10); $filters = "WHERE issuedby LIKE '%$searchkey%' OR approvedby LIKE '%$searchkey%' OR customerid LIKE '%$searchkey%'";}else{$filters=""; }

$getrg = mysql_query("SELECT * FROM inreport $filters") or die(mysql_error());
while($rg = mysql_fetch_array($getrg)){
?>

  <tr>
  <td><?php echo $rg['dated']; ?></td>
    <td><?php echo $rg['issuedby']; ?></td>
    <td><?php echo $rg['approvedby']; ?></td>
    <td><?php echo $rg['recievedby']; ?></td>
    
    <td><?php $customerid =$rg['customerid']; echo mysql_result(mysql_query("SELECT name FROM contacts WHERE customerid='$customerid' LIMIT 1"),0)." (".$rg['customerid'].")"; ?></td>
    <td><?php echo $rg['irid']; ?></td>
    
  </tr>
<?php } ?>
</tbody>
</table>
</div>