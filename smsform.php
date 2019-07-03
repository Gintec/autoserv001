<br>
<br>
<div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header center">Messaging System </h1>
                </div>
                <!--End Page Header -->
</div>
			<table class="table table-striped">

  <tr>
    <td width="527"><form name="searchuser" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get"  style="float:left; width:480px;">

		<table  class="table table-striped">
  <tr>
    <td colspan="3" align="center" class="headtext">SEARCH FOR A CONTACT </td>
    </tr>
  <tr>
    <td width="174" class="labels">ACCOUNT NO/NAME:</td>
    <td width="208"><input name="searchkey" type="text" class="form-control" placeholder="Search CONTACT"/></td>
    <td width="74"><label>
      <input name="Go" type="submit" class="btn btn-sm btn-success" id="Go" value="Go" />
    </label></td>
  </tr>
</table>
</form></td>
    <td width="449"><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method=" get" name="filterCONTACT" id="filterCONTACT"style="float:left; width:480x;">

		<table  class="table table-striped">
  <tr>
    <td colspan="3" align="center" class="headtext">SEARCH FOR A CONTACT </td>
    </tr>
  <tr>
    <td width="135" class="labels">FILTER BY: </td>
    <td width="267">
	<?php 
$getfieldlist = mysql_query('SHOW COLUMNS FROM contacts') or die(mysql_error());
echo '<select name="filter" class="form-control" onChange="form.submit()">';
if(!isset($_GET['filter'])){echo '<option value="*" selected="Selected">--All--</option>';}
if(isset($_GET['filter'])){echo '<option value="'.$_GET['filter'].'" selected="Selected">'.$_GET['filter'].'</option>';}
while( $flrow = mysql_fetch_row($getfieldlist))
{
$fltype = $flrow[0];
echo '<option value="' .$flrow[0]. '">' . $flrow[0] . '</option>';
}
echo'</select>';
if(isset($_GET['filter'])){ 
$filter = $_GET['filter']; 
$getcolumnlist = mysql_query('SELECT DISTINCT '.$filter.' FROM contacts') or die(mysql_error());
echo '<select name="filtervalue" class="form-control"  onChange="form.submit()">';
if(isset($_GET['filtervalue'])){echo '<option value="'.$_GET['filtervalue'].'" selected="Selected">'.$_GET['filtervalue'].'</option>';}
while( $flrow = mysql_fetch_row($getcolumnlist))
{
$fltype = $flrow[0];
echo '<option value="' .$flrow[0]. '">' . $flrow[0] . '</option>';
}
echo'</select>';
}
  ?>	</td>
    <td width="54"><label><a href="messaging.php" class="btn btn-sm btn-primary">Show All</a> </label></td>
  </tr>
</table>
</form></td>
  </tr>
  <tr>
    <td colspan="2"><form action="http://ngn.rmlconnect.net/bulksms/bulksms" method="get" enctype="multipart/form-data" name="sms" target="_blank" id="sms">
					<input type="hidden" name="username" value="priyoorsms">
					<input type="hidden" name="password" value="s2zTMAGg">
					<input type="hidden" name="type" value="0">
					<input type="hidden" name="source" value="Kojo-Motors">
					<input type="hidden" name="dlr" value="1">
					
          <table align="center" cellspacing="2" class="table table-striped">
            <tr>
              <td colspan="5">
                <input name="destination" type="text" class="form-control textbox3" id="recipients" placeholder="enter numbers e.g. 2348033344455"/>
              </td>
              </tr>
            <tr>
              <td colspan="5">
                <textarea name="message" id="message" class="form-control"  placeholder="type your message, 160 characters = 1 page"></textarea>
              </td>
              </tr>
            <tr>
              <td width="35" class="labels">Page:</td>
              <td width="50" id="chars2">&nbsp;</td>
              <td width="112" class="labels">No of Character: </td>
              <td width="52" id="chars">&nbsp;</td>
              <td width="98"><label>
			  <input name="SEND" type="submit" class="btn btn-sm btn-success button3" id="SEND" value="SEND" />
              </label></td>
            </tr>
          </table>
        </form></td>
  </tr>
  <tr>
    <td colspan="2">LIST OF contacts USERS : SHOWING <?php 
		$CONTACTsc = mysql_query("SELECT * FROM contacts") or die(mysql_error());
		$totalCONTACTs = mysql_num_rows($CONTACTsc);
		if(isset($_GET['navigator']))
        { $navigator = $_GET['navigator']; } else{ $navigator = 0; }

		$sn = 0+$navigator;	
		$thispage ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		 echo $navigator+1; ?> TO <?php echo $navigator+40; ?> OF <?php echo $totalCONTACTs; ?></td>
  </tr>
  <tr>
    <td colspan="2">
	 
	<table width="980" border="1" align="center" cellspacing="0" style="font-size:12px !important;" class="table table-striped">
          <tr>
            <td width="31" bgcolor="#003366" class="text2">SELECT</td>
            <td width="264" bgcolor="#003366" class="text2">NAME</td>
            <td width="238" bgcolor="#003366" class="text2">PHONE NO </td>
            <td width="238" bgcolor="#003366" class="text2">ORGANIZATION </td>
            <td width="282" bgcolor="#003366" class="text2">CUSTOMER ID</td>
            <td width="84" bgcolor="#003366" class="text2">CATEGORY</td>
          </tr>
		  
		  <?php
		  $allphoneno="";
if(!isset($filter) && $filter==""){$filters = "";}else{$filter = "name"; $filtervalue = ""; $filters = " WHERE ".$filter." != '$filtervalue'";}
if(isset($_GET['filtervalue'])){$filter = $_GET['filter']; $filtervalue = $_GET['filtervalue']; 
$filters = "WHERE ".$filter." ='$filtervalue'";}
if(isset($_GET['searchkey'])){$searchkey = $_GET['searchkey']; $filters = "WHERE name LIKE '%$searchkey%' OR organization LIKE '%$searchkey%' OR customerid LIKE '%$searchkey%'";}

		  $CONTACTs = mysql_query("SELECT * FROM contacts $filters ORDER BY name ASC") or die(mysql_error()); 
		  $alln = mysql_query("SELECT telephoneno FROM contacts $filters") or die(mysql_error());
		  while($nno = mysql_fetch_row($alln)){
		  $allphoneno = $allphoneno."".$nno[0].",";
		  }
		  ?>
		  
		  Select All: <input name="phoneno" type="checkbox" value="<?php echo $allphoneno; ?>" class="ccheck">
		  
		  <?php
		  while($CONTACT = mysql_fetch_array($CONTACTs)){
		  $name = $CONTACT['name'];
		  $customerid = $CONTACT['customerid'];
		  $recipient = $CONTACT['telephoneno'];
		  $organization = $CONTACT['organization'];
		 $category = $CONTACT['remarks'];
		 
		 $recipient = trim(preg_replace("/[\n]*/", '', $recipient));
		$recipient = preg_replace('/[^0-9]/', '', $recipient);
		$rlength = strlen($recipient);
		if($rlength>20){continue;}
		if($rlength<9){continue;}
		//Arrange Contact Correctly
		if(substr( $recipient, 0, 1 ) == "0" && substr( $recipient, 0, 3 ) != "009"){$recipient = "234".substr($recipient,1);}elseif(substr( $recipient, 0, 3 ) == "234"){$recipient = $recipient;}elseif(substr( $recipient, 0, 1 ) == "+"){$recipient = substr($recipient,1);}elseif(substr( $recipient, 0, 1 ) == " "){ continue;}elseif(substr( $recipient, 0, 3 ) == "009"){$recipient= substr( $recipient, 3 );}elseif($rlength<7 || $rlength>18){continue;}else{$recipient = $recipient; }

		  $sn++;
		  ?>
		  
          <tr style="font-size:13px !important;background-color:<?php if($sn%2=="0"){echo '#F7F7F7;';}else{echo '#fff;'; } ?>">
            <td><input name="phoneno" type="checkbox" value="<?php echo $recipient; ?>" class="ccheck"></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $recipient; ?></td>
            <td><?php echo $organization; ?></td>
            <td><?php echo $customerid; ?></td>
            <td><?php echo $category; ?></td>
          </tr>
		  <? } ?>
        </table>	</td>
  </tr>
  <tr>
    <td colspan="2">
	<?php 

 if(isset($_GET['navigator']) && ($_GET['navigator'])>0){$previous = $_GET['navigator']-40; echo '<a href="'.$thispage.'&navigator='.$previous.'"><div class="button3" style="float:right;"><<--Previous</div></a>'; }else{} ?> </td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
</table>
