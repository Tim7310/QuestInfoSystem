<?php
include_once('../connection.php');
include_once('../classes/rad.php');
if (isset($_GET['dateto']) and isset($_GET['datefrom'])) {
	$rad = new rad;
	$films = $rad->filmInventory($_GET["datefrom"],$_GET["dateto"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xray Inventory</title>
</head>
<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}
	.card-header
	{
        background-color: #2980B9 !important;
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
<body>
<?php
	include_once('radsidebar.php');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-10 offset-1 mt-5">
			<div class="card">
			  <div class="card-header card-inverse card-info">
			   <center>Xray Film Inventory</center>	
			  </div>
			  <div class="card-body">
			  	<form method="get" >
		   		<div class="row form-group">
		   			<div class="col-3">
		   				<label><b>Date From:</b></label>
		   				<input type="date" name="datefrom" class="form-control" >
		   			</div>
		   			<div class="col-3">
		   				<label><b>Date To:</b></label>
		   				<input type="date" name="dateto" class="form-control">
		   			</div>
		   			<div class="col-2">
		   				<input type="submit" class="btn btn-primary" value="Generate Table" style="margin-top: 30px" id="genTable">
		   			</div>	
		   			<div class="col-3">
		   				<input type="submit" class="btn btn-info" value="Generate Film Counts" style="margin-top: 30px" id="geCount">
		   			</div>			   			
		   		</div>
		   		</form>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php 
	if (isset($_GET['dateto']) and isset($_GET['datefrom'])) {
	$films = $rad->filmInventory($_GET["datefrom"],$_GET["dateto"]);
	$f1 = 0;$f2 = 0;$f3 = 0;$f4 = 0;$f5 = 0;$all = 0;
	foreach ($films as $film) {
		$all++;
		if($film['xrayFilm'] == "11x14"){
			$f1++;
		}else if ($film['xrayFilm'] == "10x12") {
			$f2++;
		}else if ($film['xrayFilm'] == "14x14") {
			$f3++;
		}else if ($film['xrayFilm'] == "14x17") {
			$f4++;
		}else if ($film['xrayFilm'] == "8x10") {
			$f5++;
		}

	}
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-10 offset-1 mt-5">
			<div class="card">
			  <div class="card-header card-inverse card-info">
			   <center>Xray Film Count</center>	
			  </div>
			  <div class="card-body">
			  	   <h5><b>Xray Film used between <?php echo $_GET["datefrom"]; ?> and <?php echo $_GET["dateto"]; ?> count:</b></h5>
			  	   <h4><b>11x14 Film: <?php echo $f1; ?></b></h4>
			  	   <h4><b>10x12 Film: <?php echo $f2 ?></b></h4>
			  	   <h4><b>14x14 Film: <?php echo $f3; ?></b></h4>
			  	   <h4><b>14x17 Film: <?php echo $f4; ?></b></h4>
			  	   <h4><b>8x10 Film: <?php echo $f5; ?></b></h4>
			  	   <h4><b>All Film: <?php echo $all; ?></b></h4>
			  </div>
			</div>
		</div>
		</div>
	</div>
<?php } ?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$("#genTable").click(function(e){
			e.preventDefault();
			var from = $("input[name='datefrom']").val();
			var to = $("input[name='dateto']").val();
			window.open("FilmInvTable.php?from="+from+"&to="+to);
		});
	});
</script>