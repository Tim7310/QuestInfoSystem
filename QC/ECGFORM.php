<script type="text/javascript">
	window.onload = function() 
	{ 
		window.print(); 
	}
</script>
<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/patient.php');

$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);

$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$trans = $trans->fetch_data($id,$tid);
?>

<!DOCTYPE html>
<html>
<head>
	<title>ECG REPORT</title>
	<link rel="icon" type="image/png" href="../assets/qpd.png">
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
</head>
<style type="text/css">
.card-header
{
	font-family: "Times New Roman";
	font-size: 18px;
	color: white;
	background-color: #104E8B;
	padding: 0px;
	margin: 0px;
}
.card-block
{
	padding-top: 0px;
	padding-bottom: 0px;
}
.line
{
	font-family: "Garamond";
	display: table-cell;
	width: 1000px;
	height: 24px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;	
}
.label
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:16px;
	
}
.lineName
{
	font-family: "Garamond";
	font-size: 20px;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height: 50px;
	
}
.labelName
{
	font-family: "Garamond";
	font-size: 20px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height: 50px;
}
.para
{
	font-family: "Garamond";
	font-size: 14px;
	color:#104E8B;
	line-height: 14px;
	padding: 0px;
	margin: 0px;
}
.Names
{
	font-family: "Garamond";
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height:18px;
	color: #000000;
}
.lineNameSig
{
	font-family: "Garamond";
	display: table-cell;
	width: 500px;
	height: 16px;
	border-bottom: 1px solid black;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 1px;
	margin: 1px;
	line-height:3px;
	color: #000000;	
}
.label1
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:0px;	

}
.col, .col-1, .col-2, .col-3, .col-4, .col-5 .col-6
{
	padding-left: 0px;
	margin-left: 0px;
}

.col u
{
	font-family: "Garamond";
	text-transform: uppercase;
	font-weight: bolder;
	
}
.dashedhr
{
	background-color: #fff;
	border-top: 2px dashed #8c8b8b;
	line-height: 2px;

}
</style>
<body>			
<div class="container-fluid">
<div class="row">
	<div class="col-sm-12" style="margin-top: 5px;">
		<img src="../assets/QPDHeader.jpg" height="100px" width="100%">
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><center><b>Patient Data Information</b></center></div>
		<div class="card-block" style="height: 2in;">
			<div class="row">
			    <div class="col-2"><p class="labelName">Company:</p></div>
			    <div class="col-5">
			        <span class="lineName"><?php echo $data['CompanyName'] ?></span>
			    </div>
			    <div class="col-2 text-right">
			        <p class="labelName">Date:</p>
			    </div>
			    <div class="col">
			        <span class="lineName"><?php echo $trans['TransactionDate'] ?></span>
			    </div>
			</div>
			<div class="row">
			    <div class="col-2"><p class="labelName">Name:</p></div>
			    <div class="col-5">
			        <span class="lineName"><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></span>
			    </div>
			    <div class="col-2 text-right">
			        <p class="labelName">QuestID:</p>
			    </div>
			    <div class="col">
			        <span class="lineName"><?php echo $data['PatientID'] ?></span>
			    </div>
			</div>
			<div class="row">
			    <div class="col-2"><p class="labelName">Age/Gender:</p></div>
			    <div class="col-5">
			        <span class="lineName" style="white-space: nowrap;"><?php echo $data['Age'] ?>/<?php echo $data['Gender'] ?></span>
			    </div>
			    <div class="col-2 text-right">
			        <p class="labelName">Procedure:</p>
			    </div>
			    <div class="col">
			        <span class="lineName">Electrocardiography</span>
			    </div>
			</div>

			</div>
		</div>
	</div>
</div>
<div class="row">
<div class="col-sm-12" >
		<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><center><b>ELECTROCARDIOGRAPHIC REPORT</b></center></div>
		<div class="card-block" style="height: 8.7in;">
			<div class="row" style="padding: 15px;">
			    <div class="col-sm-2">
			    	<p class="lineName">Rhythm:</p>
			    </div>
			    <div class="col-sm-4">
			        <span class="lineName">______________</span>
			    </div>
			    <div class="col-sm-2">
			        <p class="lineName">Axis:</p>
			    </div>
			    <div class="col-sm-4">
			        <span class="lineName">______________</span>
			    </div>
			</div>

			<div class="row" style="padding: 15px;">
			    <div class="col-sm-2">
			    	<p class="lineName">PR Interval:</p>
			    </div>
			    <div class="col-sm-4">
			        <span class="lineName">______________</span>
			    </div>
			    <div class="col-sm-2">
			        <p class="lineName">P-Wave:</p>
			    </div>
			    <div class="col-sm-4">
			        <span class="lineName">______________</span>
			    </div>
			</div>

			<div class="row" style="padding: 15px;">
			    <div class="col-sm-2">
			    	<p class="lineName">Rate Atrial:</p>
			    </div>
			    <div class="col-sm-4">
			        <span class="lineName">______________</span>
			    </div>
			    <div class="col-sm-2">
			        <p class="lineName">Ventricular:</p>
			    </div>
			    <div class="col-sm-4">
			        <span class="lineName">______________</span>
			    </div>
			</div>
			<br>
			<div class="row" style="padding: 15px;">
			    <div class="col-sm-2">
			    	<p class="lineName">INTERPRETATION:</p>
			    </div>
			    <div class="col-sm-4">
			        <span class="lineName"></span>
			    </div>
			    <div class="col-sm-2">
			        <p class="lineName"></p>
			    </div>
			    <div class="col-sm-4">
			        <span class="lineName"></span>
			    </div>
			</div>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="row">
			    <div class="col-sm-5">
			    	<p class="lineName" style="line-height: 20px">FROILAN CANLAS, MD</p>
			    	<p class="lineName" style="line-height: 20px">License:82498</p>
			    	<p class="lineName" style="line-height: 20px">Internal Medicine</p>
			    </div>

			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<img src="../assets/QISFooter.png" height="50px" width="100%">
	</div>
</div>
<?php }} ?>
</div>
</body>
</html>