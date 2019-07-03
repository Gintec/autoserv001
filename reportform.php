<div class="col-sm-12" style="margin-top:30px;">
<div class="panel panel-default">
<div class="panel-heading h3 text-center text-uppercase" style="margin-top:0px;">
PRINT REPORT SHEET<br />
<h5>FILTER STATEMENT OF ACTIVITIES BY CATEGORIES </h5>
</div>
<div class="panel-body">
<form action="statement.php" method="post" enctype="multipart/form-data" name="Activities Generator" target="_blank">
<table align="center" cellspacing="4" class="table table-bordered">
            
            <tr>
              <td width="126" height="33" align="right"><h4>Select Duration</h4></td>
              <td width="239" align="right"><input type="text" name="from" class="form-control" id="datepicker" placeholder="From" /></td>
              <td width="226"><input type="text" name="to" class="form-control" id="datepicker2" placeholder="To" /></td>
              <td width="139">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="4" class="labels"><h4>Parts 
                </h4>
                <hr /> 
                <?php $getsubcat = mysql_query("SELECT DISTINCT partsname FROM partsorder") or die(mysql_error());
		while($subcat = mysql_fetch_array($getsubcat)){?>
                <input type="checkbox" name="subcategory[]" value="<?php echo $subcat['partsname']; ?>"> <?php echo $subcat['partsname']; ?></br>
        <?php } ?></td>
            </tr>
            <tr>
              <td colspan="2" class="labels">&nbsp;</td>
              <td colspan="2" class="labels"><input name="Print-Report" type="submit" class="btn btn-info btn-sm" id="Print-Report" value="Print Report" /></td>
            </tr>
        </table>
</form>
</div>
</div>
</div>