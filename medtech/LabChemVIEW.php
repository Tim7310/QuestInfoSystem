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
	$data =  $lab->getData($id, $tid, "lab_chemistry");
if (is_array($data)) {
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory Chemistry Results</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
</head>
<style type="text/css" media="all">

	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}
	.card-header
	{
		font-family: "Century Gothic";
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
	.col-2
	{
		align-self: center;
	}

</style>

<body >
<?php
include_once('labsidebar.php');
?>
<center><p style="font-size: 36px; font-family: 'Century Gothic';">View Laboratory Chemistry Results</p></center>
<div class="container-fluid">
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<input type="hidden" name="id" value="<?php echo $data['PatientID'] ?>">
						<b><?php echo $data['TransactionID'] ?></b>
					</div>
					<div class="col">
						<label>Name:</label><br>
						<input type="hidden" name="lasnam" value="<?php echo $data['LastName'] ?>">
						<input type="hidden" name="firnam" value="<?php echo $data['FirstName'] ?>">
						<input type="hidden" name="midnam" value="<?php echo $data['MiddleName'] ?>">
						<p><b><?php echo $data['LastName'] ?>, <?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
					</div>
					<div class="col">
						<label>Company Name: </label><br>
						<input type="hidden" name="comnam" value="<?php echo $data['CompanyName'] ?>">
						<p><b><?php echo $data['CompanyName'] ?></b></p>
					</div>
					<div class="col col-lg-2">
						<label>Gender:</label><br>
						<p><b><?php echo $data['Gender'] ?></b></p>
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
	            	<b>TEST</b>
	            </div>
	            <div class="col-2">
	            	<b>RESULTS</b>
	            </div>
	            <div class="col-7">
	            	<CENTER><b>REFERENCE RANGES/COMMENTS</b></CENTER>
	            </div>
			</div>

			<div class="row">
	            <div class="col-3">
	            	<b>Chemistry</b>
	            </div>
	            <div class="col-2">
	            	<b></b>
	            </div>
	            <div class="col-3">
	            	<b>SI Units</b>
	            </div>
	            <div class="col-1">
	            	<CENTER><b></b></CENTER>
	            </div>
	            <div class="col-3">
	            	<b>Conventional Units</b>
	            </div>
			</div>
<!-- Blood -->
			<div class="form-group row">
	            <label for="FBS" class="col-3 col-form-label">Fasting Blood Sugar :</label>
	            <div class="col-2">
	            	<p><?php echo $data['FBS'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 4.1-5.9
	            </div>
	            <div class="col-1">
	            	<p><?php echo $data['FBScon'] ?></p>
	            </div>
	            <div class="col-3">
	            	mg/dl 75 -107
	            </div>
			</div>
			<div class="form-group row">
	            <label for="RBS" class="col-3 col-form-label">Fasting Blood Sugar :</label>
	            <div class="col-2">
	            	<p><?php echo $data['RBS'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L < 7.7
	            </div>
	            <div class="col-1">
	            	<p><?php echo $data['RBScon'] ?></p>
	            </div>
	            <div class="col-3">
	            	mg/dl < 140
	            </div>
			</div>
			<div class="form-group row">
	            <label for="BUA" class="col-3 col-form-label">Uric Acid :</label>
	            <div class="col-2">
	            	<p><?php echo $data['BUA'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 155 - 428
	            </div>
	            <div class="col-1">
	            	<p><?php echo $data['BUAcon'] ?></p>
	            </div>
	            <div class="col-3">
	            	mg/dl 3 - 7.1
	            </div>
			</div>
			<div class="form-group row">
	            <label for="BUN" class="col-3 col-form-label">Blood Urea Nitrogen :</label>
	            <div class="col-2">
	            	<p><?php echo $data['BUN'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 2.5 - 7.5
	            </div>
	            <div class="col-1">
	            	<p><?php echo $data['BUNcon'] ?></p>
	            </div>
	            <div class="col-3">
	            	mg/dl 7 - 21
	            </div>
			</div>
			<div class="form-group row">
	            <label for="CREA" class="col-3 col-form-label">Creatinine :</label>
	            <div class="col-2">
	            	<p><?php echo $data['CREA'] ?></p>
	            </div>
	            <div class="col-3">
	            	umol/L Female: 53 - 106
	            </div>
	            <div class="col-1">
	            	<p><?php echo $data['CREAcon'] ?></p>
	            </div>
	            <div class="col-3">
	            	mg/dl Female: 0.60 - 1.20
	            </div>
			</div>
			<div class="form-group row">
				<div class="col-3"></div>
	            <div class="col-2"></div>
	            <div class="col-3" style="padding-top: 0px;">
	            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male: 71 - 115
	            </div>
	            <div class="col-1"></div>
	            <div class="col-3" style="padding-top: 0px;">
	            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male: 0.80 - 1.30
	            </div>
			</div>
<!-- LIPID -->
			<div class="row">
	            <div class="col">
	            	<b>LIPID PROFILE</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="CHOL" class="col-3 col-form-label">Cholesterol :</label>
	            <div class="col-2">
	            	<p><?php echo $data['CHOL'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L < 5.17
	            </div>
	            <div class="col-1">
	            	<p><?php echo $data['CHOLcon'] ?></p>
	            </div>
	            <div class="col-3">
	            	mg/dl < 200
	            </div>
			</div>
			<div class="form-group row">
	            <label for="TRIG" class="col-3 col-form-label">Triglycerides :</label>
	            <div class="col-2">
	            	<p><?php echo $data['TRIG'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 0.3-1.7
	            </div>
	            <div class="col-1">
	            	<p><?php echo $data['TRIGcon'] ?></p>
	            </div>
	            <div class="col-3">
	            	mg/dl 27-150
	            </div>
			</div>
			<div class="form-group row">
	            <label for="HDL" class="col-3 col-form-label">HDL :</label>
	            <div class="col-2">
	            	<p><?php echo $data['HDL'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 0.9-2.21
	            </div>
	            <div class="col-1">
	            	<p><?php echo $data['HDLcon'] ?></p>
	            </div>
	            <div class="col-3">
	            	mg/dl 35-85.32
	            </div>
			</div>
			<div class="form-group row">
	            <label for="LDL" class="col-3 col-form-label">LDL :</label>
	            <div class="col-2">
	            	<p><?php echo $data['LDL'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 2.5-4.1
	            </div>
	            <div class="col-1">
	            	<p><?php echo $data['LDLcon'] ?></p>
	            </div>
	            <div class="col-3">
	            	mg/dl 96.52-158.30
	            </div>
			</div>
			<div class="form-group row">
	            <label for="CH" class="col-3 col-form-label"> CHOLESTEROL/HDL.RATIO :</label>
	            <div class="col-2">
	            	<p><?php echo $data['CH'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L < 4.40 
	            </div>
			</div>
			<div class="form-group row">
	            <label for="VLDL" class="col-3 col-form-label">VLDL :</label>
	            <div class="col-2">
	            	<p><?php echo $data['VLDL'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 0.050-1.04
	            </div>
			</div>
			<div class="row">
	            <div class="col">
	            	<b>ELECTROLYTES</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Na" class="col-3 col-form-label">Sodium:</label>
	            <div class="col-2">
	            	<p><?php echo $data['Na'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 135 - 153
	            </div>
			</div>
			<div class="form-group row">
	            <label for="K" class="col-3 col-form-label">Potassium :</label>
	            <div class="col-2">
	            	<p><?php echo $data['K'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 3.50 - 5.30
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Cl" class="col-3 col-form-label">Chloride :</label>
	            <div class="col-2">
	            	<p><?php echo $data['Cl'] ?></p>
	            </div>
	            <div class="col-3">
	            	mmol/L 98-107
	            </div>
			</div>
<!-- ENZYMES -->
			<div class="row">
	            <div class="col">
	            	<b>ENZYMES</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="ALT" class="col-3 col-form-label">SGPT/ALT :</label>
	            <div class="col-2">
	            	<p><?php echo $data['ALT'] ?></p>
	            </div>
	            <div class="col-4">
	            	U/L Female: 5 - 31  Male: 10 - 41
	            </div>
			</div>
			<div class="form-group row">
	            <label for="AST" class="col-3 col-form-label">SGOT/AST :</label>
	            <div class="col-2">
	            	<p><?php echo $data['AST'] ?></p>
	            </div>
	            <div class="col-4">
	            	U/L 0 - 40
	            </div>
			</div>
			<div class="form-group row">
	            <label for="HB" class="col-3 col-form-label"><b>HBA1C :</b></label>
	            <div class="col-2">
	            	<p><?php echo $data['HB'] ?></p>
	            </div>
	            <div class="col-4">
	            	% 4.3 - 6.3
	            </div>
			</div>
			<div class="form-group row">
	            <label for="ALP" class="col-3 col-form-label"><b>ALP :</b></label>
	            <div class="col-2">
	            	<p><?php echo $data['ALP'] ?></p>
	            </div>
	            <div class="col-4">
	            	U/L up to 105
	            </div>
			</div>
			<div class="form-group row">
	            <label for="PSA" class="col-3 col-form-label"><b>PSA :</b></label>
	            <div class="col-2">
	            	<b><?php echo $data['PSA']; ?></b>
	            </div>
	            <div class="col-4">
	            	ng/mL 0-4
	            </div>
			</div>
			<div class="form-group row">
	            <label for="PSA" class="col-3 col-form-label"><b>GGTP :</b></label>
	            <div class="col-2">
	            	<b><?php echo $data['GGTP']; ?></b>
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
				<center><button type="button" class="btn btn-primary" onclick="document.location = 'LabChemEDIT.php?id=<?php echo $data['PatientID']."&tid=".$data['TransactionID']?>';">UPDATE RECORD</button></center>
            </div>
        </div>
    </div>	
</div>
	
</div>
</body>
</html>
<?php }else{
	echo "<script> alert('Error: No existing record found.'); </script>";
  	echo "<script>window.open('LabChemADD.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabChem.php','_self');</script>";
} ?></body>