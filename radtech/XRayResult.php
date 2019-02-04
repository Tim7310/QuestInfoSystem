<?php
	include_once('../connection.php');
	include_once('../classes/trans.php');
	include_once('../classes/qc.php');
	include_once('../classes/lab.php');
	include_once('../classes/rad.php');
	include_once('../classes/patient.php');
	$printdate = date("Y-m-d H:i:s");
	$lab = new lab;
	$rad = new rad;
	$tid = $_GET['tid'];
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$data = $rad->fetch_data($id,$tid);

	$qc = new qc;
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$data1 = $qc->fetch_data($id,$tid);

	$transac = new trans;
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$trans = $transac->fetch_data($id,$tid);

	$patient = new Patient;
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$pat = $patient->fetch_data($id);


	$printCount = $lab->checkPrint($id, $tid, 'XRAY');
	// $qc = new qc;
	// if (isset($_GET['id'])){
	// 	$id = $_GET['id'];
	// 	$data1 = $qc->fetch_data($id,$tid);	
	//$pd = $pat->fetch_data($id);
	//$ld = $lab->fetch_data2($pd['PatientID']);
	//$qc = $qclass->fetch_data($id, $tid);
?>
<style type="text/css" media="all">
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
.lineRes
{
	font-family: "Garamond";
	display: table-cell;
	/*width: 50px;*/
	height: 18px;
	line-height: 18px;
	font-size: 18px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}
.lineRes1
{
	font-family: "Garamond";
	display: table-cell;
	width: 300px;
	height: 18px;
	line-height: 18px;
	font-size: 18px;
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
	color: #02005b;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:16px;

	
}
.lineName
{
	font-family: "Garamond";
	font-size: 18px;
	text-transform: uppercase;
	color: #000000;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height: 18px;
	
}
.labelName
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height: 18px;
}
.para
{
	font-family: "Garamond";
	font-size: 14px;
	color: #104E8B;
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
.cert
{
	font-family: "Garamond";
	font-size: 24px;
	color: #104E8B;
	font-weight: bolder;
	line-height: 24px;
}

.cert u
{
	color: black;
}
</style>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lab Microscopy Form</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
    <link href="../source/formstyle.css" media="all" rel="stylesheet"/>
    <script type="text/javascript" src="../source/jquery.min.js"></script>
    <script type="text/javascript" src="../source/jquery-confirm.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../source/jquery-confirm.min.css">
<!-- 	<script type="text/javascript">
	window.onload = function() 
	{ 

		var FecColor = "<?php echo $FecColor ?>";
		var FecCon = "<?php echo $FecCon ?>";
		var FecMicro = "<?php echo $FecMicro ?>";
		if ( FecCon == "") 
		{
			var div = document.getElementById("checkFecalysis");
			div.remove();
		}

	

}
		
	</script> -->
</head>
<style type="text/css">
</style>

<body >
<div class="container-fluid ">
<div class="col-md-12" style="margin-top: 5px;">
	<img src="../assets/QPDHeader.jpg" height="100px" width="100%">
</div>
<div class="col-md-12">
	<div class="card" style="border-radius: 0px; border: 3px solid #104E8B; margin-top: 10px;">
	<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div>
	<div class="card-block" >
	<div class="row" >
	    <div class="col-1" ><p class="labelName">Name:</p></div>
	    <div class="col-6"  >
	        <span class="lineName" ><?php echo $pat['LastName'] ?>,<?php echo $pat['FirstName'] ?> <?php echo $pat['MiddleName'] ?>
	        </span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">X-Ray Number:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['XrayID'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Gender:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $pat['Gender'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">QuestID:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $pat['PatientID'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Age:</p></div>
	    <div class="col-6" style="">
	        <span class="lineName"><?php echo $pat['Age'] ?></span>
	    </div>
	   
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col col-sm-auto"><p class="labelName">Date Received:</p></div>
	    <div class="col col-sm-auto">
	        <u><?php echo $data['CreationDate'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Reported:</p>
	    </div>
	    <div class="col col-sm-auto">
	        <u><?php echo $data['CreationDate'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Printed:</p>
	    </div>
	    <div class="col col-sm-auto">
	        <u><?php echo $printdate ?></u>
	    </div>
	</div>
	</div>
	</div>
</div>
<!--Footer-->
<div style="position: absolute;margin-top: 745px;margin-left:-10px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="float-right" 
				style="margin-bottom: 100px;text-align: center;font-family: Garamond;font-weight: bold; font-size: 20px; margin-right: 150px">
					<div class="row">
						<div class="col-md-12">
							<?php echo $data['Radiologist']?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="background-color: black"></div>
					</div>
					<div class="row">
						<div class="col-md-12" style="">
							RADIOLOGIST
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<img src="../assets/QISFooter.png" height="50px" width="100%">
			</div>
		</div>
	</div>
</div>
<!--Footer End-->
<div class="container-fluid">
	<div class="row">
		<div class="col-12 mt-1">
			<div class="card-header"><center><b>RADIOGRAPHIC REPORT</b></center></div>
		</div>
	</div>
	<div class="row ml-2" style="margin-top: 180px">
		<div class="col-2 " style="font-size: 22px; font-weight: bolder; font-family: Garamond">COMMENT:</div>
		<div class="col-9 mt-5" style="font-size:20px;text-align: left">
			<?php echo $data['Comment']?>
		</div>
	</div>
	<div class="row mt-4 ml-2">
		<div class="col-2" style="font-size: 22px; font-weight: bolder; font-family: Garamond">IMPRESSION:</div>
		<div class="col-6 mt-5" style="font-size:20px;text-align: left;font-weight: bolder">
			<?php echo $data['Impression']?>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var pcount = "<?php echo $printCount; ?>";
		pcount = parseInt(pcount);
		if (pcount > 0) {
			$.confirm({
				title: 'Confirm',
				content: 'You have already printed this result '+pcount+' Time/s',
				theme: 'modern',
				buttons: {
					cancel: {
						text: 'cancel',
						btnClass: 'btn-primary',
						action: function(){
							window.location.href = "XRaySummary.php";
						}
					},
					yes: {
						text: 'yes',
						btnClass: 'btn-danger',
						action: function(){
							
						}
					}
				}
			});
		}
		window.onafterprint = function() {
			var tid = "<?php echo $tid; ?>";
			var pid = "<?php echo $id; ?>";
			var test = "XRAY";
		   $.post("PrintCount.php",{pid: pid, tid: tid, test: test},function(){
		   		window.location.href = "XRaySummary.php";
		   });   
		};
		// window.onbeforeprint = function() {
		// 	alert("This will be Count a");
		// };
	});
</script>
<?php }}}} ?>