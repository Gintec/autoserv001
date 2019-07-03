<?php
if(isset($_POST['Send'])){

$sender = validateData($_POST['sender']);
$reciever = validateData($_POST['reciever']);
$title = validateData($_POST['title']);
$description = nl2br($_POST['description']);
$category = validateData($_POST['category']);
$dated = date("Y-m-d",strtotime($_POST['dated']));
$addexp = mysql_query("INSERT INTO reports VALUES ('$sender','$reciever','$dated','$category','$title','$description','Unread','0')") or die(mysql_error());

if(isset($addexp)){?>
 <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>Memo Saved for &nbsp;<?php echo $reciever; ?> ! </b><hr />

 <i class="fa  fa-pencil"></i>
Send a new one.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
			<?php }}?> 
<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">New Memo</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
				
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" name="contactform">
<div class="form-group">
<div class="col-lg-3">
<label class="control-label col-lg-6" for="content">Sender:</label>
<input name="sender" type="text" class="form-control" value="<?php if(isset($_SESSION['staffid'])){echo $_SESSION['staffid']; }else{echo "Admin"; } ?>" disabled="disabled">
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">To: </label>
<select name="reciever" class="form-control">
<option value="Admin" selected="selected">Admin</option>
<?php 
	  $mmsd = mysql_query("SELECT staffid, firstname, surname FROM personnel") or die(mysql_error());
	  while($mbd = mysql_fetch_row($mmsd)){?>
		<option value="<?php echo $mbd[0]; ?>"><?php echo $mbd[1]." ".$mbd[2]; ?></option>
	<?php } ?>
</select>
</div>
<div class="col-lg-3">
<label class="control-label col-lg-12" for="content">Date: </label>
<input name="dated" type="text" class="form-control" id="datepicker" maxlength="33" value="<?php echo date("Y-m-d"); ?>">
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
<textarea name="description" cols="200" rows="7" class="form-contol">Details</textarea>
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


                   
                        </div>
                        </div>

                        
            