<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/patient.php');
include_once('../classes/qc.php');
include_once('../classes/lab.php');
date_default_timezone_set("Asia/Kuala_Lumpur");
$printdate = date("Y-m-d H:i:s");
$_GET['id'] = 1;
$_GET['tid'] = 0000000000004;
$tid = $_GET['tid'];

$lab = new lab;
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$data = $lab->fetch_data($id,$tid);

$qc = new qc;
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$data1 = $qc->fetch_data($id,$tid);


$transac = new trans;
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$trans = $transac->fetch_data($id,$tid);

// for Urinalysis
$dataU = array( 
			"Physical/Macroscopic",
			array('Color',$data['UriColor']),
			array('Transparency',$data['UriTrans']),
			"Urine Chemical",
			array('pH',$data['UriPh']),
			array('Specific Gravity',$data['UriSp']),
			array('Protein',$data['UriPro']),
			array('Glucose',$data['UriGlu']),
			array('Leukocyte Esterase',$data['LE']),
			array('Nirite',$data['NIT']),
			array('Urobilinogen',$data['URO'],'mg/dl','0.2~0.9 mg/dl'),
			array('Blood',$data['BLD']),
			array('Ketone',$data['KET']),
			array('Bilirubin',$data['BIL']),
			"Microscopic",
			array('RBC',$data['RBC'],'/hpf','0-3'),
			array('WBC',$data['WBC'],'/hpf','0-5'),
			array('Epithelial Cells',$data['ECells']),
			);
// for fecalysis
$dataF = array(			
			array('Color',$data['FecColor']),
			array('Consistency',$data['FecCon']),
			array('Microscopic Findings',$data['FecMicro']),
			array('Pus Cells','')
			);
// For CBC
$dataC = array(
			array("White Blood Cells", $data['WhiteBlood']),
			array("Neutrophils", $data['Neutrophils']),
			array("Lymphocytes", $data['Lymphocytes']),
			array("Monocytes", $data['Monocytes']),
			array("Eosinophils", $data['EOS']),
			array("Basophils", $data['BAS']),
			array("RBC", $data['CBCRBC']),
			array("Hemoglobin", $data['Hemoglobin']),
			array("Hematocrit", $data['Hematocrit']),
			array("PLATELET", $data['PLT']),
			array("BLOOD TYPE", ''),//add blood type to database
			);
// display data or not
$ddn = 1; //if fecalysis and urinalysis form
//$ddn = 2; //if only urinalysis
//$ddn = 3; //if only fecalysis
//$ddn = 4; //if only CBC
if ($ddn == 1) {
	if ($dataU[1][1] != "" && $dataF[0][1] != "") {
	//$fmt = "50px";
	$bohU = "block";$bohF = "block";
	}else if($dataU[1][1] != ""){
		//$fmt = "220px";
		$bohU = "block";$bohF = "none";
	}else if ($dataF[1][1] != "") {
	//$fmt = "550px";
	$bohU = "none";$bohF = "block";
}
}
//$fmt = "1170px";
if ($ddn == 2) {
	# code...
}

//816*1056
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
	<div class="card" style="border-radius: 0px; ">
	<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div>
	<div class="card-block">
	<div class="row">
	    <div class="col-1"><p class="labelName">Name:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $trans['LastName'] ?>,<?php echo $trans['FirstName'] ?> <?php echo $trans['MiddleName'] ?>
	        </span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Lab Number:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['LabID'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col-1"><p class="labelName">Gender:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $trans['Gender'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">QuestID:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $trans['PatientID'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col-1"><p class="labelName">Age:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $trans['Age'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Clinician:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['Clinician'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col col-sm-auto"><p class="labelName">Date Received:</p></div>
	    <div class="col col-sm-auto">
	        <u><?php echo $data['CreationDate'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Reported:</p>
	    </div>
	    <div class="col col-sm-auto">
	        <u><?php echo $data['DateUpdate'] ?></u>
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
						<b><?php echo $data['Received'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $data1['QC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $data['Printed'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $data['RMTLIC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $data1['QCLicense'] ?></b></span></center></div>
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
	<div class="col-md-10">
		<img src="../assets/QPDFooter.jpg" height="50px" width="100%">
	</div>
</div>
<!-- Footer End -->
<div class="col-md-10 "><!-- Code for Urinalysis Form -->
	<div style="display: <?php echo $bohU;?>">
	<div class="row resultlabel" >
			<div class="col-4">TEST</div>
			<div class="col-2">RESULT</div>
			<div class="col-2">UNIT REFERENCE</div>
			<div class="col-2">RANGES</div>
			<div class="col-2">COMMENTS</div>
	</div>
	<div class="row">
		<div class="col-4 ml-4 mt-1 LN" >
			<span style="font-size: 16px;">CLINICAL MICROSCOPY</span>
		</div>
	</div>
	<div class="row">
		<div class="col-4 ml-4 LN"><span style="font-size: 15px;">COMPLETE URINALYSIS</span></div>
	</div>
			<?php 
			for ($i=0; $i < count($dataU) ; $i++) {
			//$fmt = $fmt - 25; 				
			if (is_array($dataU[$i]) == false) {	
			?>
			<div class="col-12 ml-3 LN"><span style="font-size: 16px;"><?php echo $dataU[$i]?></span></div>
			
			<?php }else	{ ?>
			<div class="row">
				<?php
					for ($x=0; $x < 4; $x++) {
					if ($x == 0){
						$cn = 4;$marL = "ml-5";
						$dustyle = "";	
					}else{
						$cn = 2;$marL = "";$dustyle = "font-weight:bold;";
					}
					if (isset($dataU[$i][$x])) {
						$dUrin = $dataU[$i][$x];
					}else{
						$dUrin = "";
					}
					if ($dataU[$i][1] != "" or $dataU[$i][1] != "N/A") {
					
			?>
				<div class="col-<?php echo $cn;?>" style="<?php echo $dustyle; ?>">
					<span class="<?php echo $marL; ?>"><?php echo $dUrin;?></span></div>
			<?php  
			}}?>
			</div>
			<?php }}  ?>
	</div>
	<!-- Code for Fecalysis Form -->
	<div style="display: <?php echo $bohF;?>; ">
	<div class="row resultlabel mt-1" >
		<div class="col-6">TEST</div>
		<div class="col-6">RESULT</div>
	</div>
	<div class="row">
		<div class="col-4 ml-4 LN"><span style="font-size: 17px;">ROUTINE FECALYSIS</span></div>
	</div>
		<?php for ($y=0; $y < count($dataF); $y++) {
		if ($dataF[$y][1] != "" ) {
		?>
		<div class="row" style="font-size: 16px;">
			<div class="col-6"><span class="ml-4"><?php echo $dataF[$y][0]?></span></div>
			<div class="col-6" style="font-weight: bolder"><?php echo $dataF[$y][1]?></div>	
		</div>	
		<?php }} }}}
		?>
	</div>
</div>
	
</div>
</body>
</html>