<br>
<br>

<?php
$staffid = $_SESSION['staffid'];
				if(isset($_GET['mid'])){$mid = $_GET['mid'];
				$getrs = mysql_query("SELECT * FROM reports WHERE reciever='$staffid' AND mid='$mid'") or die(mysql_error());
						while($mrs = mysql_fetch_array($getrs)){
						$sender = $mrs['sender']; $senderr = mysql_result(mysql_query("SELECT surname FROM personnel WHERE staffid='$sender' LIMIT 1"),0);
						echo "<b>".$mrs['title']." /Dated: ".$mrs['dated']." /Sender: ".$senderr."</b><hr />";
						echo $mrs['description']."<hr />";
						mysql_query("UPDATE reports SET status='Read' WHERE mid='$mid'") or die(mysql_error());?>
						
						<h3 class="center">REPLY TO SENDER</h3>
						
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" name="contactform">
<div class="form-group">
<div class="col-lg-3">
<label class="control-label col-lg-6" for="content">Sender:</label>
<input name="sender" type="text" class="form-control" value="<?php if(isset($_SESSION['staffid'])){echo $_SESSION['staffid']; }else{echo "Admin"; } ?>" disabled="disabled">
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">To: </label>
<select name="reciever" class="form-control">


		<option value="<?php echo $sender; ?>"><?php echo $sender; ?></option>

</select>
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">Date: </label>
<input name="dated" type="text" class="form-control" id="datepicker" maxlength="33">
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">Category: </label>
<select name="category" class="form-control">
  <option value="Activity Report">Activity Report</option>
  <option value="Expenses">Expenses</option>
  <option value="Complain">Complain</option>
  <option value="Request">Request</option>
  <option value="Mesage">Message</option>

</select>
</div>
</div> 

<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Title: </label>
<input name="title" type="text" class="form-control" maxlength="93">
</div>
</div>
<div class="form-group">
<div class="col-lg-12">
<label class="control-label col-lg-12" for="content">Body: </label>
<div style="clear:both"></div>
<textarea name="description" cols="" rows="" class="form-contol"></textarea>
</div>
</div> 

<div class="form-group" style="margin-top:20px !important;">
<div class="col-lg-6">
.
</div>
<div class="col-lg-6">
<input value="Send"  class="btn btn-lg btn-success btn-block"  name="Send" type="submit" />
</div>
</div>
</form>
						
						
				<?php }} ?>
<h3 align="center">MEMOS</h3>
<div class="table-responsive"  style="background-color:#FFFFFF; padding:10px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
  <tr>
    <td>Title</td>
    <td>Details</td>
    <td>Sender</td>
    <td>Receiver</td>
    <td>Dated</td>
    <td>Status</td>
  </tr>
</thead>
<tbody>
<?php

if(isset($_GET['searchkey'])){$searchkey = substr($_GET['searchkey'],0,10); $filters = "WHERE title LIKE '%$searchkey%' OR description LIKE '%$searchkey%' OR dated LIKE '%$searchkey%'";}else{$filters=" WHERE reciever='$staffid'"; }

$getrs = mysql_query("SELECT * FROM reports $filters") or die(mysql_error());
						
while($rgd = mysql_fetch_array($getrs)){
?>

  <tr>
    <td><a href="memo.php?mid=<?php echo $rgd['mid']; ?>"><?php echo $rgd['title']; ?></a></td>
    <td><?php echo $rgd['description']; ?></td>
    <td><?php $sender = $rgd['sender']; echo mysql_result(mysql_query("SELECT surname FROM personnel WHERE staffid='$sender' LIMIT 1"),0); ?></td>
    <td><?php echo $rgd['reciever']; ?></td>
    <td><?php echo $rgd['dated']; ?></td>
    <td> <?php echo $rgd['status']; ?> </tr>
	
<?php } ?>
</tbody>
</table>
</div>