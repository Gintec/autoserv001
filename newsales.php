<?php include_once('kmaccess.php'); ?>
<?php include_once('header.php'); ?>
<style>
* {
  .border-radius(0) !important;
}

#field {
    margin-bottom:10px;
}
</style>
<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-lg-12"><div class="col-lg-8"><input list="parts" type="text" name="parts[]"  class="form-control"/></div><div class="col-lg-2"><input type="number" name="qty[]" value="1"  class="form-control"  placeholder="Quantity"/></div><div class="col-lg-2"><input type="number" name="amount[]" value="1"  class="form-control"  placeholder="Unit Price"/></div><a href="#" class="remove_field btn btn-warning col-lg-2">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	
});</script>
        <?php include_once('topbar.php'); ?>
       <?php include_once('sidebarmenu.php'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
		<?php include_once('salesform.php'); ?>
        </div>
        <!-- end page-wrapper --> 
<?php include_once('footer.php'); ?>    