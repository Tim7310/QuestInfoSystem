<?php
include_once('../connection.php');
include_once('../classes/transVal.php');
include_once('../classes/patient.php');
include_once('../classes/qc.php');
include_once('../classes/lab.php');
date_default_timezone_set("Asia/Kuala_Lumpur");
$printdate = date("Y-m-d H:i:s");

$id = 8;
$lab = new lab;
$pat = new Patient;
$qclass = new qc;
$pd = $pat->fetch_data($id);
$ld = $lab->fetch_data2($pd['PatientID']);
$qc = $qclass->fetch_data($id);

// For CBC
$dataC = array(
			array("White Blood Cells", $ld['WhiteBlood']." x10^9/L"," 4.23~11.07"),
			array("Neutrophils", $ld['Neutrophils']. " %", "34.00~71.00"),
			array("Lymphocytes", $ld['Lymphocytes']. " %", "22.00~53.00"),
			array("Monocytes", $ld['Monocytes']. " %", "5.00~12.00"),
			array("Eosinophils", $ld['EOS']. " %", "1.00~7.00"),
			array("Basophils", $ld['BAS']. " %", "0.00~1. 00"),
			array("RBC", $ld['CBCRBC']. " X10 ^6/L", "4.32~5.72"),
			array("Hemoglobin", $ld['Hemoglobin']. " g/L", "M: 137.00~175.00", "F: 112.00~157.00"),
			array("Hematocrit", $ld['Hematocrit']. " Vol. Fraction", "M: 0.40~0.51", "F: 0.34~0.45"),
			array("PLATELET", $ld['PLT']. "x10^3/mm3", "150~400"),
			//array("BLOOD TYPE", ''),//add blood type to database
			);
$bt = $ld['BloodType'];
$bt = "A Positive";
$fmt = "300px";
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FORM</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
    <link href="../source/formstyle.css" media="all" rel="stylesheet"/>
	
</head>
<style type="text/css">
</style>

<body >
<div class="container-fluid ">
<div class="col-md-10" style="margin-top: 5px;">
	<img src="../assets/QPDHeader.jpg" height="100px" width="100%">
</div>
<div class="col-md-10">
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
	<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div>
	<div class="card-block">
	<div class="row">
	    <div class="col-1"><p class="labelName">Name:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $pd['LastName'] ?>,<?php echo $pd['FirstName'] ?> <?php echo $pd['MiddleName'] ?>
	        </span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Lab Number:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $ld['LabID'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col-1"><p class="labelName">Gender:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $pd['Gender'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">QuestID:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $pd['PatientID'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col-1"><p class="labelName">Age:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $pd['Age'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Clinician:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $ld['Clinician'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col col-sm-auto"><p class="labelName">Date Received:</p></div>
	    <div class="col col-sm-auto">
	        <u><?php echo $ld['CreationDate'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Reported:</p>
	    </div>
	    <div class="col col-sm-auto">
	        <u><?php echo $ld['DateUpdate'] ?></u>
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
<div style="position: absolute;margin-top: 750px;">
	<div class="col-md-10 ">
	<span style="font-size: 12px;">Note: Specimen rechecked, result/s verified.</span>
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-block" style="height: 1.3in;" >
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $ld['Received'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $qc['qc'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $ld['Printed'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $ld['RMTLIC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $qc['QCLIC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $ld['PATHLIC'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
					<div class="col"><center><p class="labelName">Quality Control</p></center></div>
					<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
				</div>
		</div>
	</div>
	</div>
	<div class="col-md-10">
		<img src="../assets/QPDFooter.jpg" height="50px" width="100%">
	</div>
</div>
<!-- Footer End -->
<div class="col-md-10 "><!-- Code for Urinalysis Form -->
	<div class="row resultlabel" >
			<div class="col-3">HEMATOLOGY</div>
			<div class="col-3">SI Units</div>
			<div class="col-2"></div>
			<div class="col-2"></div>
	</div>
	<div class="row">
		<div class="col-4 ml-4 mt-3 mb-2 LN"><span style="font-size: 20px;">COMPLETE BLOOD COUNT</span></div>
	</div>
			<div class="row">
				<?php
				for ($i=0; $i < count($dataC); $i++) { 
					for ($x=0; $x < 4; $x++) {
					if ($x == 0){
						$marL = "ml-5";
						$dustyle = "";$colnum = "col-3";	
					}else{
						$marL = "ml-3";$dustyle = "font-weight:bold;";$colnum = "col-3";
					}
					if (isset($dataC[$i][$x])) {
						$dCBC = $dataC[$i][$x];
					}else{
						$dCBC = "";
					}
			?>
				<div class="<?php echo $colnum;?>" style="<?php echo $dustyle; ?>">
					<span class="<?php echo $marL; ?>"><?php echo $dCBC;?></span>
				</div>
			<?php }}  ?>
			</div>
			<?php if ($bt != "") {
			?>
			<div class="row mt-4 ml-4" style="font-weight: bold;font-size: 20px">
				<div class="col-3" >BLOOD TYPE</div>
				<div class="col-3"><?php echo $bt; ?></div>
			</div>
			<?php } ?>
</div>
</div>
</body>
</html>