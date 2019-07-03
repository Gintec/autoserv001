<?php include_once('kmaccess.php'); ?>
	
<?php include_once('header2.php'); ?>

        <?php include_once('topbar.php'); ?>
       <?php include_once('sidebarmenu.php'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
		<?php include_once('smsform.php'); ?>
        </div>
        <!-- end page-wrapper -->
<script type="text/javascript">
 $(document).ready(function(){
$(".sconfirm").delay(3200).fadeOut(300);

var values=[];
$(".ccheck").change(function(){
    if($(this).is(":checked"))
       values.push($(this).val());
    else{
       var x = values.indexOf($(this).val());
       values.splice(x,1);
    }
    var input = $('.textbox3');
	if(input.val()==''){ 
	input.val(values);
	}else{
	input.val(values + ',');	
	}   
});

	//textarea countdown starts
	
	var minLength = 0;
	var pages = 0;
	var maxLength = 160;
    $('textarea').keyup(function() {
        var length = $(this).val().length;
        var pages = Math.ceil(length/160);
		if(pages==0){pages =1; }
		var incrlength = length+minLength;
		var charleft = minLength+length;
		if(length>160*pages){ charleft = 160*pages-length;}
				
        $('#chars').text(charleft);
		$('#chars2').text(pages);
		
		

		document.cookie = "pages="+pages;

	
    });
// textarea countdown ends
    
});
</script> 
<?php include_once('footer.php'); ?>