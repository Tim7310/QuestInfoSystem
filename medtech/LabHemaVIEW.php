<?php
include_once('../connection.php');
include_once('../classes/patient.php');
include_once('../classes/trans.php');
include_once('../classes/qc.php');
include_once('../classes/lab.php');
$lab = new lab;
$qc = new qc;
$transac = new trans;
$patient = new Patient;
if (isset($_GET['id']) and isset($_GET['tid'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	// $data = $lab->fetch_data($id,$tid);
	// $data1 = $qc->fetch_data($id,$tid);
	// $trans = $transac->fetch_data($id,$tid);
	// $pat = $patient->fetch_data($id);
	$data =  $lab->getData($id, $tid, "lab_hematology");
if (is_array($data)) {
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory CBC</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
    <script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
</head>
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
		font-size: 14px;
		font-weight: bold;
	}
	.card-block select
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.col p
	{
		text-transform: uppercase;
		font-weight: bolder;
	}
	.col-2 p
	{
		font-weight: bolder;
	}
	.col-1 p
	{
		font-weight: bolder;
	}
	.col-2, .col-1, .col-5
	{
		align-self: center;
		font-weight: bolder;
	}
</style>

<body >
<?php
include_once('labsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">View Laboratory CBC Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            	<div class="row">
            		<div class="col col-md-auto">
						<label>Patient ID.: </label><br>
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<b><?php echo $data['TransactionID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction Date: </label><br>
						<b><?php echo $data['CreationDate'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Name:</label><br>
						<p><b><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
					</div>
					<div class="col col-md-auto">
						<label>Company Name: </label><br>
						<p><b><?php echo $data['CompanyName'] ?></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT PACKAGE</b></center></div>
            <div class="card-block">
            	<div class="row">
            		<?php
            			$itemids = $data['ItemID'];
            			$itemID = explode(',', $itemids);
            			$Package = "";$Description = "";
            			foreach ($itemID as $key) {
            				$items = $transac->fetch_item($key);
            				$Package .= "[".$items['ItemName']."] ";
            				$Description .= "[".$items['ItemDescription']."] ";
            				
            			}
            		?>
            		<div class="col col-md-auto">
            			Package: <p><b><?php echo $Package ?></b></p>
            		</div>
            		<div class="col col-md-auto">
            			Description: <p><b><?php echo $Description ?></b></p>
            		</div>
            		<div class="col col-lg-2">
            			Transaction: <p><b><?php echo $data['TransactionType'] ?></b></p>
            		</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>LABORATORY SCIENCES RESULTS</b></center></div>
            <div class="card-block">
            <div class="form-group row">
				<div class="col"><center>Clinician/Walk-In</center></div>
	            <div class="col"><center>Date Received</center></div>
	            <div class="col"><center>Date Reported</center></div>
			</div>
			<div class="form-group row">
				<div class="col">
	            	<center><p><?php echo $data['Biller'] ?></p></center>
	            </div>
	            <div class="col">
	            	<center><p><?php echo $data['CreationDate'] ?></p></center>
	            </div>
	            <div class="col">
	            	<center><p><?php echo $data['DateUpdate'] ?></p></center>
	            </div>
			</div>
			<hr>

            <div class="row">
	            <div class="col-3">
	            	<b>HEMATOLOGY</b>
	            </div>
	            <div class="col-2">
	            	<b>SI Units</b>
	            </div>
			</div>
			<div class="row">
	            <div class="col">
	            	<b>Complete Blood Count</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="WhiteBlood" class="col-3 col-form-label">White Blood Cells :</label>
	            <div class="col-2">
	            	<?php echo $data['WhiteBlood'] ?>
	            </div>
	            <div class="col-2">
	            	%x10^9/L
	            </div>
	            <div class="col-1">
	            	4.23~11.07
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Neutrophils" class="col-3 col-form-label">Neutrophils :</label>
	            <div class="col-2">
	            	<?php echo $data['Neutrophils'] ?>
	            </div>
	            <div class="col-2">
	            	%
	            </div>
	            <div class="col-1">
	            	34.00~71.00
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Lymphocytes" class="col-3 col-form-label">Lymphocytes :</label>
	            <div class="col-2">
	            	<?php echo $data['Lymphocytes'] ?>
	            </div>
	            <div class="col-2">
	            	%
	            </div>
	            <div class="col-1">
	            	22.00~53.00
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Monocytes" class="col-3 col-form-label">Monocytes :</label>
	            <div class="col-2">
	            	<?php echo $data['Monocytes'] ?>
	            </div>
	            <div class="col-2">
	            	%
	            </div>
	            <div class="col-1">
	            	5.00~12.00
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Eosinophils" class="col-3 col-form-label">Eosinophils :</label>
	            <div class="col-2">
	            	<?php echo $data['EOS'] ?>
	            </div>
	            <div class="col-2">
	            	%
	            </div>
	            <div class="col-1">
	            	1.00~7.00
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Basophils" class="col-3 col-form-label">Basophils :</label>
	            <div class="col-2">
	            	<?php echo $data['BAS'] ?>
	            </div>
	            <div class="col-2">
	            	%
	            </div>
	            <div class="col-1">
	            	0.00~1.00
	            </div>
			</div>
			<div class="form-group row"></div>
			<div class="form-group row">
	            <label for="RBC" class="col-3 col-form-label">RBC :</label>
	            <div class="col-2">
	            	<?php echo $data['CBCRBC'] ?>
	            </div>
	            <div class="col-2">
	            	X10 ^6/L
	            </div>
	            <div class="col-1">
	            	4.32~5.72
	            </div>
			</div>
			<div class="form-group row"></div>
			<div class="form-group row">
	            <label for="Hemoglobin" class="col-3 col-form-label">Hemoglobin :</label>
	            <div class="col-2">
	            	<?php echo $data['Hemoglobin'] ?>
	            </div>
	            <div class="col-2">
	            	g/L
	            </div>
	            <div class="col-2">
	            	M: 137.00~175.00
	            </div>
	            <div class="col-2">
	            	F: 112.00~157.00
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Hematocrit" class="col-3 col-form-label">Hematocrit :</label>
	            <div class="col-2">
	            	<?php echo $data['Hematocrit'] ?>
	            </div>
	            <div class="col-2">
	            	Vol. Fraction
	            </div>
	            <div class="col-2">
	            	M: 0.40~0.51
	            </div>
	            <div class="col-2">
	            	F: 0.34~0.45
	            </div>
			</div>
			<div class="form-group row"></div>
			<div class="form-group row">
	            <label for="PLATELET" class="col-3 col-form-label">PLATELET :</label>
	            <div class="col-2">
	            	<?php echo $data['PLT'] ?>
	            </div>
	            <div class="col-2">
	            	x10^3/mm3
	            </div>
	            <div class="col-2">
	            	150~400
	            </div>
			</div>
			<div class="form-group row">
	            <label for="PLATELET" class="col-3 col-form-label">Other Notes :</label>
	            <div class="col-5">
	            	<?php echo $data['CBCOt'] ?>
	            </div>
			</div>
			<div class="row">
	            <div class="col">
	            	<b>PROTHROMBIN TIME</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="PTime" class="col-3 col-form-label">Patient Time :</label>
	            <div class="col-2">
	            	<?php echo $data['PTime'] ?>
	            </div>
	            <div class="col-2">
	            	SECS
	            </div>
	            <div class="col-2">
	            	<?php echo $data['PTimeNV'] ?> SECS
	            </div>
			</div>
			<div class="form-group row">
	            <label for="PTControl" class="col-3 col-form-label">Control :</label>
	            <div class="col-2">
	            	<?php echo $data['PTControl'] ?>
	            </div>
	            <div class="col-2">
	            	SECS
	            </div>
	            <div class="col-2">
	            	<?php echo $data['PTControlNV'] ?> SECS
	            </div>
			</div>
			<div class="form-group row">
	            <label for="ActPercent" class="col-3 col-form-label">% Activity:</label>
	            <div class="col-2">
	            	<?php echo $data['ActPercent'] ?>
	            </div>
	            <div class="col-2">
	            	%
	            </div>
	            <div class="col-2">
	            	<?php echo $data['ActPercentNV'] ?> %
	            </div>
			</div>
			<div class="form-group row">
	            <label for="INR" class="col-3 col-form-label">INR</label>
	            <div class="col-2">
	            	<?php echo $data['INR'] ?>
	            </div>
	             <div class="col-2">
	            	
	            </div>
	            <div class="col-2">
	            	<?php echo $data['ActPercentNV'] ?> 
	            </div>
			</div>
			<div class="form-group row">
	            <label for="PR1.31" class="col-3 col-form-label">PR1.31</label>
	            <div class="col-2">
	            	<?php echo $data['PR131'] ?>
	            </div>
			</div>
			<div class="row">
	            <div class="col">
	            	<b>APTT</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="APTTime" class="col-3 col-form-label">Patient Time :</label>
	            <div class="col-2">
	            	<?php echo $data['APTTime'] ?>
	            </div>
	            <div class="col-2">
	            	SECS
	            </div>
	             <div class="col-2">
	            	<?php echo $data['APTTimeNV'] ?> SECS
	            </div>
			</div>
			<div class="form-group row">
	            <label for="APTControl" class="col-3 col-form-label">Control :</label>
	            <div class="col-2">
	            	<?php echo $data['APTControl'] ?>
	            </div>
	            <div class="col-2">
	            	SECS
	            </div>
	             <div class="col-2">
	            	<?php echo $data['APTControlNV'] ?> SECS
	            </div>
			</div>
			<div class="form-group row">
	            <label for="MS" class="col-3 col-form-label"><b>Malarial Smear :</b></label>
	            <div class="col-2">
	            	<?php echo $data['MS'] ?>
	            </div>
			</div>
			<div class="row mb-2">
	            <div class="col">
	            	<b>Erythrocyte Sedimentation Rate</b>
	            </div>
			</div>
			<div class="form-group row ">
	            <label for="ESR" class="col-3 col-form-label" >ESR :</label>
	            <div class="col-2">
	            	<?php echo $data['ESR'] ?>
	            </div>
	            <div class="col-2">
	            	mm/hr
	            </div>
	            <div class="col-2">
	            	M: 0~15 mm/hr
	            </div>
	            <div class="col-2">
	            	F: 1~20 mm/hr
	            </div>
						
	            <label for="ESRMethod" class="col-3 col-form-label" >ESR Method:</label>
	            <div class="col-3">
	            	<?php echo $data['ESRMethod'] ?>
	            </div>
	         </div>


<!-- NAMES -->
		<hr>
			<div class="form-group row">
				<div class="col-3">Medical Technologist:</div>
				<div class="col">
	            	<p>
	            	<?php $rec = $lab->medtechByID($data['MedID']);
	            	echo $rec['FirstName']." ". $rec['MiddleName'] ." ". $rec['LastName'] ?> 
	            	/ <?php echo $rec['LicenseNO'] ?>
	            	</p>
	            </div>
			</div>
			<div class="form-group row">
				<div class="col-3">Quality Control:</div>
	            <div class="col">
	            	<p>
	            	<?php $qc = $lab->medtechByID($data['QualityID']);
	            	echo $qc['FirstName']." ". $qc['MiddleName'] ." ". $qc['LastName'] ?> 
	            	/ <?php echo $qc['LicenseNO'] ?>
	            	</p>
	            </div>
			</div>
			<div class="form-group row">
	            <div class="col-3">Pathologist:</div>
	            <div class="col">
	            	<p>
		            	<?php $path = $lab->medtechByID($data['PathID']);
		            	echo $path['FirstName']." ". $path['MiddleName'] ." ". $path['LastName'] ?> 
		            	/ <?php echo $path['LicenseNO'] ?>
	            	</p>
	            </div>
			</div>
		<hr>


		<center><button type="button" class="btn btn-primary" onclick="document.location = 'LabHemaEDIT.php?id=<?php echo $data['PatientID']."&tid=".$data['TransactionID']?>';">UPDATE RECORD</button></center>

            </div>
        </div>
    </div>	
</div>
	
</div>
<?php }else{
	echo "<script> alert('Error: No existing record found.'); </script>";
  	echo "<script>window.open('LabHemaADD.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabHema.php','_self');</script>";
} ?></body>
</html>