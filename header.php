<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOJO MOTORS | ERP SYSTEM</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
	<link href="assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
	<script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
	<script src="assets/scripts/jquery-ui-1.10.4.min.js"></script>
	<script>
  $( function() {
    $( "#datepicker,#datepicker2,#datepicker3").datepicker({
	changeMonth: true,
	yearRange: "-100:+0",
	altFormat: 'dd-mm-yy',
	dateFormat: "dd-mm-yy",
  
  altField
            : "#alt-date",
  changeYear: true
	});
 
  } );
  
   $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
  </script>
	<style>
	.control-label, btn{
	margin-top:20px !important;
	font-size:18px;
	}
	.form-control{
	border:2px solid #993300;
	margin:5px;
	}
	.btn{
	margin:5px;
	}
	btn-sm{padding:1px !important; }
	header, section, footer, aside, nav, main, article, figure {
    display: block;
}
	</style>

   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">