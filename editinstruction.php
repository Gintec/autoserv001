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
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
	
    var wrapper2         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button2      = $(".add_field_button2"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-lg-12"><div class="col-lg-8"><input list="parts" type="text" name="parts[]"  class="form-control"/></div><div class="col-lg-2"><input type="text" name="qty[]"  class="form-control"  placeholder="Quantity"/></div><div class="col-lg-2"><input type="text" name="amt[]" class="form-control" placeholder="Amount"></div><a href="#" class="remove_field btn btn-warning col-lg-2">Remove</a></div>'); //add input box
        }
    });
	
	$(add_button2).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper2).append('<div class="col-lg-12"><div class="col-lg-10"><input list="services" type="text" name="services[]"  class="form-control"/></div><a href="#" class="remove_field2 btn btn-warning col-lg-2">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	$(wrapper2).on("click",".remove_field2", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});</script>
        <?php include_once('topbar.php'); ?>
       <?php include_once('sidebarmenu.php'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
		<?php include_once('editinstructionform.php'); ?>
        </div>
        <!-- end page-wrapper --> 
<?php include_once('footer.php'); ?>    