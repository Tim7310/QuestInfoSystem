<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sales Report</title>
	<link rel="icon" type="image/png" href="../assets/qpd.png">
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script type="text/javascript" src="../source/jquery.min.js"></script>
	<link href="../source/switch.css" rel="stylesheet" />

</head>
<?php 
date_default_timezone_set("Asia/Kuala_Lumpur");
	$dateNow = date("Y-m-d");
	$dnSD = $dateNow." 05:00:00";
	$dnED = $dateNow." 20:00:00";
?>
<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}
	.card-header
	{
		font-family: "Calibri";
		font-size: 24px;
	}
	.card-block, .checkbox
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.card-block input
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.card-block select
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.col p
	{
		text-transform: uppercase;
	}
</style>
<body >
<?php
include_once('cashsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Generate Sales Report</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info bg-primary"><center><b>Sales Details</b></center></div>
            <div class="card-block">
            	<span class="switch">
				  <input type="checkbox" class="switch" id="switch-id">
				  <label for="switch-id" style="font-weight: bolder;"></label>
				</span>
            	<div class="row">
            		<div class="col">
	            		<center><label>Start Date</label>
		                <input class="form-control" type="text" name="SD" id="sd1" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS"></center>
		            </div>
	            	<div class="col">
	            		<center><label>End Date</label>
	                	<input class="form-control" type="text" name="ED" id="ed1" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS"></center>
	            	</div>
            	</div>            
				
            	<center>
            		<input type="submit" class="btn btn-success" value="Generate List for Uploading" name="eotdqc">
            		<input type="submit" class="btn btn-success" value="Generate Report" name="gen">
            		<input type="submit" class="btn btn-success" value="Generate End of the Day" name="eotd">
            		<input type="submit" class="btn btn-warning" value="Generate For PF" name="ca">
            		<input type="submit" class="btn btn-info" value="Generate For Billing" name="bl">
            	
            		<button class="btn btn-primary mt-2" type="button" name="tdReport" >Generate Today's Report</button>
            		<button class="btn btn-primary mt-2" type="button" name="eotdReport" >Generate End of the Day Report</button>
            		<button class="btn btn-primary mt-2" type="button" name="eotdQC" >Generate List for Uploading</button>
            	</center> 
            </div>
        </div>
    </div>
</div>



</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$( "#switch-id" ).trigger("click");
		var ttype;
		$( "#switch-id" ).change(function() {
		  var input = $( this );
			if (input.is(":checked")) {
				$(this).siblings("label").html("CASH");
				ttype = "CASH";
			}else{
				$(this).siblings("label").html("ACCOUNT");
				ttype = "ACCOUNT";
			}
		}).change();
		$("input[name='gen']").click(function(){
			var sd1 = $('#sd1').val();
			var ed1 = $('#ed1').val();
			window.open("SalesCSV.php?sd="+sd1+"&ed="+ed1+"&type="+ttype);
		});
		$("input[name='eotd']").click(function(){
			var sd1 = $('#sd1').val();
			var ed1 = $('#ed1').val();
			window.open("eotd.php?sd="+sd1+"&ed="+ed1+"&type="+ttype);
		});
		$("input[name='eotdqc']").click(function(){
			var sd1 = $('#sd1').val();
			var ed1 = $('#ed1').val();
			window.open("eotdqc.php?sd="+sd1+"&ed="+ed1+"&type="+ttype);
		});
		$("button[name='tdReport'").click(function(){
			var sd2 = "<?php echo $dnSD?>";
			var ed2 = "<?php echo $dnED?>";
			window.open("SalesCSV.php?sd="+sd2+"&ed="+ed2+"&type="+ttype);
		});
		$("button[name='eotdReport'").click(function(){
			var sd2 = "<?php echo $dnSD?>";
			var ed2 = "<?php echo $dnED?>";
			window.open("eotd.php?sd="+sd2+"&ed="+ed2+"&type="+ttype);
		});

		$("button[name='eotdQC'").click(function(){
			var sd2 = "<?php echo $dnSD?>";
			var ed2 = "<?php echo $dnED?>";
			window.open("eotdqc.php?sd="+sd2+"&ed="+ed2+"&type="+ttype);
		});

		$("input[name='ca']").click(function(){
			var sd1 = $('#sd1').val();
			var ed1 = $('#ed1').val();
			window.open("SalesCSV.php?sd="+sd1+"&ed="+ed1+"&type=");
		});

		$("input[name='bl']").click(function(){
			var sd1 = $('#sd1').val();
			var ed1 = $('#ed1').val();
			window.open("BillingCSV.php?sd="+sd1+"&ed="+ed1+"&type=");
		});
	});
</script>