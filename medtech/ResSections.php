<?php
include_once('../connection.php');
include_once('../classes/patient.php');
$patient = new Patient;
$patients = $patient->fetch_all();
?>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Results Sections</title>
		<link rel="icon" type="image/png" href="../assets/qpd.png">
	    <link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.min.css">
	    <link rel="stylesheet" href="style.css">
		<link href="../sorting/dataTables.bootstrap.css" rel="stylesheet">
	    <link href="../sorting/dataTables.responsive.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
		<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="../source/CDN/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/jszip.min.js"></script>
		<script type="text/javascript" src="../source/CDN/pdfmake.min.js"></script>
		<script type="text/javascript" src="../source/CDN/vfs_fonts.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.html5.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.print.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.colVis.min.js"></script>	
	</head>
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
		margin-top: 10px;
	}

	.col-3 button
	{
		background-color: #2c3e50; /* Blue */
		color: #ecf0f1;
		border-radius: 12px;
	    font-family: "Century Gothic";
	    font-weight: bolder;
	    font-size: 18px;
	    height: 70px;
	    width: 250px;
	    margin-top: 10px;
	}
	.col
	{
	    margin-top: 10px;
	}
</style>
<body>
<?php
include_once('labsidebar.php');
?>
<div class="col-md-10 offset-sm-1">
	<div class="card card-info" style="border-radius: 0px; margin-top: 10px;">
 		<div class="card-header"><center><b>Result Options</b></center></div>
		<div class="card-block">
			<div class="row">
				<div class="col-3">
					<button onclick="window.location.href='PEList.php'">PE FORM</button>
				</div>
				<div class="col">
					<p><b>*Industrial APE Physical Examination Form</b></p>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<button onclick="window.location.href='MCList.php'">MEDICAL CERTIFICATE</button>
				</div>
				<div class="col">
					<p><b>*Industrial APE Medical Certificate</b></p>
				</div>
			</div> 
			<div class="row">
				<div class="col-3">
					<button onclick="window.location.href='MicroscopyList.php'">CLINICAL MICROSCOPY</button>
				</div>
				<div class="col">
					<p><b>*URINALYSIS*FECALYSIS</b></p>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<button onclick="window.location.href='LabHemaList.php'">HEMATOLOGY</button>
				</div>
				<div class="col">
					<p><b>*COMPLETE BLOOD COUNT *RBC *PLATELET</b></p>
				</div>
			</div> 
			<div class="row">
				<div class="col-3">
					<button onclick="window.location.href='ChemList.php'">LABORATORY CHEMISTRY RESULTS</button>
				</div>
				<div class="col">
					<p><b>*FBS *BUA *BUN *CREA *CHOLE *TRIG *HDL *LDL *CHOLE HDL RATIO *VLDL *Sodium *Potassium *Chloride *SGPT *SGOT *HBA1C</b></p>
				</div>
			</div>
		</div>
	</div>
</div>	
</body>
</html> 