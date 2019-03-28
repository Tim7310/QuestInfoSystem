<?php
	include_once('../connection.php');
	include_once('../classes/trans.php');
	include_once('../classes/qc.php');
	include_once('../classes/lab.php');
	include_once('../classes/patient.php');
	$printdate = date("Y-m-d H:i:s");
	$lab = new lab;
	$qc = new qc;
	$patient = new Patient;
	$transac = new trans;
	if (isset($_GET['id']) and isset($_GET['tid'])){
		$tid = $_GET['tid'];
		$id = $_GET['id'];
		$data = $lab->getData($id,$tid,"lab_hematology");
		// $data1 = $qc->fetch_data($id,$tid);
		// $trans = $transac->fetch_data($id,$tid);
		// $pat = $patient->fetch_data($id);


$printCount = $lab->checkPrint($id, $tid, 'HEMATOLOGY');

	$med = $lab->medtechByID($data['MedID']);
	$qc = $lab->medtechByID($data['QualityID']);
	$path = $lab->medtechByID($data['PathID']);
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
	width: 100px;
	height: 18px;
	line-height: 18px;
	font-size: 18px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	text-align: center;
	
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
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FORM</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
    <link href="../source/formstyle.css" media="all" rel="stylesheet"/>
    <script type="text/javascript" src="../source/jquery.min.js"></script>
    <script type="text/javascript" src="../source/jquery-confirm.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../source/jquery-confirm.min.css">
	
</head>
<style type="text/css">
</style>

<body >
<div class="container-fluid ">
<div class="col-md-14" style="margin-top: 5px;">
	<img src="../assets/QPDHeader.jpg" height="100px" width="100%">
</div>
<div class="col-md-14" style="">
	<div class="card" style="border-radius: 0px; border:none; margin-top: 10px;">
	<!-- <div class="card-header" sty></center></div> -->
	<div class="card-block" style="padding-bottom: 0px ">
	<div class="row">
	    <div class="col-1"><p class="labelName">Name:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $data['LastName'] ?>, <?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?>
	        </span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Lab Number:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['TransactionID'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Gender:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $data['Gender'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">QuestID:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['PatientID'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Age:</p></div>
	    <div class="col-3">
	        <span class="lineName"><?php echo $data['Age'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Referred by:</p>
	    </div>
	    <div class="col-6">
	        <span class="lineName"><?php 
	        if ($data['CompanyName'] != "WALK-IN") {
	        	echo $data['CompanyName']; 
	        } ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;"
	`1>
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
<div style="position: absolute;margin-top: 785px;margin-left:-10px;">
	<div class="col-md-12 ">
	<span style="font-size: 12px;">Note: Specimen rechecked, result/s verified.</span>
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-block" style="height: 1.3in;" >
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $med['FirstName']." ".$med['MiddleName']." ".$med['LastName'].", ".$med['PositionEXT']?>	</b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $qc['FirstName']." ".$qc['MiddleName']." ".$qc['LastName'].", ".$qc['PositionEXT']?>	</b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $path['FirstName']." ".$path['MiddleName']." ".$path['LastName'].", ".$path['PositionEXT']?>	</b></span></center></div>
				</div>
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $med['LicenseNO'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $qc['LicenseNO'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $path['LicenseNO'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
					<div class="col"><center><p class="labelName">Quality Control</p></center></div>
					<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
				</div>
		</div>
	</div>
	</div>
	<div class="col-md-12">
		<img src="../assets/QISFooter.png" height="50px" width="100%">
	</div>
</div>
<!-- Footer End -->
<div class="col-sm-22" style="border-radius: 0px; color: black; margin-top: 20px;">
	<div class="card-header"><center><b>LABORATORY RESULTS</b></center></div>
	   
          
<div class="card-block col-md-22" style="margin-top: 0px;">
	<div class="row">
	    <div class="col-3"><p class="label">TEST</p></div>
	    <div class="col-2"><p class="label"></p></div>
	    <div class="col-3"><p class="label">SI Units</p></div>
	    <div class="col-1"><p class="label"></p></div>
	    <div class="col-3"><p class="label">Conventional Units</p></div>
	</div>
	<hr>

          
<div class="container-fluid" style="">
<!-- U/A -->	
				<div class="row">
	            	<div class="col-4 ">
	            		<b>HEMATOLOGY</b>
	            		
	            	</div>
	            	<div class="col-2 ">

	            		<b>SI Units</b>
	            	</div>
				</div>
			<?php if($data['WhiteBlood'] != '' and $data['WhiteBlood'] != 'N/A'){
			?>
				<div class="row" style="margin-top: 10px;">
	            	<div class="col-3 ">
	            		<b>Complete Blood Count</b>
	            	</div>
				</div>
			<div class="col-22" style="margin: 0px;">
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">White Blood Cells</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['WhiteBlood'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x10^9/L</p></div>
					<div class="col"><p class="labelName">4:23~11.07</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Neutrophilis</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['Neutrophils'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col"><p class="labelName">34.00~71.00</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Lymphocytes</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['Lymphocytes'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col"><p class="labelName">22.00~53.00</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Monocytes</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['Monocytes'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col"><p class="labelName">5.00~12.00</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Eosinophils</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['EOS'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col"><p class="labelName">1.00~7.00</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Basophils</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['BAS'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col"><p class="labelName">0.00~1.00</p></div>
				</div>
				<div class="row" style="margin: 10px;"></div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">RBC</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['CBCRBC'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col"><p class="labelName">4.32~5.72</p></div>
				</div>
				<div class="row" style="margin: 10px;"></div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Hemoglobin</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['Hemoglobin'] ?></p></div>
					<div class="col-2"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col-2"><p class="labelName" style="font-size: 16px">M: 137.00~175.00</p></div>
					<div class="col-2"><p class="labelName" style="font-size: 16px">F: 112.00~157.00</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Hematocrit</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['Hematocrit'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col-2"><p class="labelName" style="font-size: 16px">M: 0.40~0.51</p></div>
					<div class="col-2"><p class="labelName" style="font-size: 16px">F: 0.34~0.45</p></div>
				</div>
				<div class="row" style="margin: 10px;"></div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Platelet</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['PLT'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col"><p class="labelName">150~400</p></div>
				</div>
				</div>
				<?php }
				if ($data['PTime'] != "" and $data['PTime'] != "N/A") {
					
				?>
				<div class="row" style="margin-top: 10px;">
	            	<div class="col-3 ">
	            		<b>PROTHROMBIN TIME</b>
	            	</div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Patient Time :</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['PTime'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SECS</p></div>
					<div class="col"><p class="labelName"><?php echo $data['PTimeNV'] ?> SECS</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Control :</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['PTControl'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SECS</p></div>
					<div class="col"><p class="labelName"><?php echo $data['PTControlNV'] ?> SECS</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">% Activity:</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['ActPercent'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</p></div>
					<div class="col"><p class="labelName"><?php echo $data['ActPercentNV'] ?> %</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">INR:</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['INR'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></div>
					<div class="col"><p class="labelName"><?php echo $data['INRNV'] ?> </p></div>
				</div>
				<?php if($data["PR131"] != "" and $data["PR131"] != "N/A"){?>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">PR1.31:</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['PR131'] ?></p></div>
				</div>
				<?php }} ?>
				<?php if ($data['APTTime'] != "" and $data['APTTime'] != "N/A") {
					
				?>
				<div class="row" style="margin-top: 10px;">
	            	<div class="col-3 ">
	            		<b>APTT</b>
	            	</div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Patient Time :</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['APTTime'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SECS</p></div>
					<div class="col"><p class="labelName"><?php echo $data['APTTimeNV'] ?> SECS</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Control :</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['APTControl'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SECS</p></div>
					<div class="col"><p class="labelName"><?php echo $data['APTControlNV'] ?> SECS</p></div>
				</div>
				<?php } 
				if ($data['MS'] != '' and $data['MS'] != 'N/A') {
				?>
				<div class="row" style="margin-top: 10px;">
	            	<div class="col-3 ">
	            		<b>Malarial Smear</b>
	            	</div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">Results:</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['MS'] ?></p></div>
				</div>
				<?php
					}
				?>
				<?php  
				if ($data['ESR'] != '' and $data['ESR'] != 'N/A') {
				?>
				<div class="row" style="margin-top: 10px;">
	            	<div class="col-3 ">
	            		<b>Erythrocyte Sedimentation Rate</b>
	            	</div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">ESR:</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['ESR'] ?></p></div>
					<div class="col"><p class="labelName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mm/hr</p></div>
					<div class="col"><p class="labelName">M: 0~15 mm/hr &nbsp;&nbsp; F: 1~20 mm/hr</p></div>
				</div>
				<div class="row" style="margin: 10px;">
					<div class="col-4"><p class="labelName">ESR Method:</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['ESRMethod'] ?></p></div>
				</div>
				<?php
					}
				?>
				
				<!-- <div class="row">

					<div class="col-5">
						<br><br><br>
						<p class="labelName">Blood Type</p></div>
					<div class=""><p class="lineRes"><?php echo $data['PLT'] ?>&nbsp;%</p></div> 
				</div> -->

			</div>

			

</div>
<!--Footer-->

	<!-- <div class="col-sm-14 " style="margin-top: 75px;">
	<span style="font-size: 15px;">Note: Specimen rechecked, result/s verified.</span>
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-block" style="height: 1.3in;" >
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $data['Received'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $data['QC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $data['Printed'] ?></b></span></cent	er></div>
				</div>
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $data['RMTLIC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $data['QCLIC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $data['PATHLIC'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
					<div class="col"><center><p class="labelName">Quality Control</p></center></div>
					<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
				</div>
		</div>
	</div>
	</div>
	<div class="col-md-14" style="margin-top: 24px;">
		<img src="../assets/QISFooter.png" height="50px" width="100%">
	</div>
</div>

 -->

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
							window.location.href = "LabHemaList.php";
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
			var test = "HEMATOLOGY";
		   $.post("PrintCount.php",{pid: pid, tid: tid, test: test},function(){
		   		window.location.href = "LabHemaList.php";
		   });   
		};
		// window.onbeforeprint = function() {
		// 	alert("This will be Count a");
		// };
	});
</script>
<?php } ?>