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
	<title>Laboratory Chemistry</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
    <script type="text/javascript" src="../source/jquery.min.js"></script>
<script>
    
</script>
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
	}
	.col-3, .col-4
	{
		padding-top: 7px;
	}
	select[name="MedTechID"], select[name="qcID"], select[name="pathID"]{
		font-size: 14px;
		font-weight: bold;
		cursor: pointer;
	}
</style>

<body >
<?php
include_once('labsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Edit Laboratory Chemistry Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabChemINSERTUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<input type="hidden" name="tid" value="<?php echo $data['TransactionID'] ?>">
						<b><?php echo $data['TransactionID'] ?></b>
					</div>
					<div class="col">
						<label>Name:</label><br>
						<input type="hidden" name="lasnam" value="<?php echo $data['LastName'] ?>">
						<input type="hidden" name="firnam" value="<?php echo $data['FirstName'] ?>">
						<input type="hidden" name="midnam" value="<?php echo $data['MiddleName'] ?>">
						<p><b><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
						<input type="hidden" name="PatientID" value="<?php echo $data['PatientID'] ?>">
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
            			foreach ($itemID as $key) {
            				$items = $transac->fetch_item($key);
            			
            			
            		?>
            		<div class="col col-md-auto">
            			Package: <p><b><?php echo $items['ItemName'] ?></b></p>
            		</div>
            		<div class="col col-md-auto">
            			Description: <p><b><?php echo $items['ItemDescription'] ?></b></p>
            		</div>
            		<?php } ?>
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

			<div class="form-group row">
	            <label for="FBS" class="col-3 col-form-label">Fasting Blood Sugar :</label>
	            <div class="col-2">
	            	<input type="text" name="FBS"  class="form-control" id="FBS" value="<?php echo $data['FBS'] ?>" >
	            </div>
	            <div class="col-3">
	            	mmol/L 4.1-5.9
	            </div>
	            <div class="col-1">
	            	<input type="text" name="FBScon" class="form-control" id="FBScon" value="<?php echo $data['FBScon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 75 -107
	            </div>
			</div>
			<div class="form-group row">
	            <label  class="col-3 col-form-label">Random Blood Sugar :</label>
	            <div class="col-2">
	            	<input type="text" name="RBS"  class="form-control" id="RBS" value="<?php echo $data['RBS']?>" >
	            </div>
	            <div class="col-3">
	            	mmol/L < 7.7
	            </div>
	            <div class="col-1">
	            	<input type="text" name="RBScon" class="form-control" id="RBScon" value="<?php echo $data['RBScon']?>">
	            </div>
	            <div class="col-3">
	            	mg/dl < 140
	            </div>
			</div>
			<div class="form-group row">
	            <label for="BUA" class="col-3 col-form-label">Uric Acid :</label>
	            <div class="col-2">
	            	<input type="text" name="BUA"  class="form-control" id="BUA" value="<?php echo $data['BUA'] ?>" >
	            </div>
	            <div class="col-3">
	            	mmol/L 155 - 428
	            </div>
	            <div class="col-1">
	            	<input type="text" name="BUAcon" class="form-control" id="BUAcon" value="<?php echo $data['BUAcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 3 - 7.1
	            </div>
			</div>
			<div class="form-group row">
	            <label for="BUN" class="col-3 col-form-label">Blood Urea Nitrogen :</label>
	            <div class="col-2">
	            	<input type="text" name="BUN"  class="form-control" id="BUN" value="<?php echo $data['BUN'] ?>" >
	            </div>
	            <div class="col-3">
	            	mmol/L 2.5 - 7.5
	            </div>
	            <div class="col-1">
	            	<input type="text" name="BUNcon" class="form-control" id="BUNcon" value="<?php echo $data['BUNcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 7 - 21
	            </div>
			</div>
			<div class="form-group row">
	            <label for="CREA" class="col-3 col-form-label">Creatinine :</label>
	            <div class="col-2">
	            	<input type="text" name="CREA"  class="form-control" id="CREA" value="<?php echo $data['CREA'] ?>" >
	            </div>
	            <div class="col-3">
	            	umol/L Female: 53 - 106
	            </div>
	            <div class="col-1">
	            	<input type="text" name="CREAcon" class="form-control" id="CREAcon" value="<?php echo $data['CREAcon'] ?>">
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
			<div class="row">
	            <div class="col">
	            	<b>LIPID PROFILE</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="CHOL" class="col-3 col-form-label">Cholesterol :</label>
	            <div class="col-2">
	            	<input type="text" name="CHOL"  class="form-control" id="CHOL" value="<?php echo $data['CHOL'] ?>" >
	            </div>
	            <div class="col-3">
	            	mmol/L < 5.17
	            </div>
	            <div class="col-1">
	            	<input type="text" name="CHOLcon" class="form-control" id="CHOLcon" value="<?php echo $data['CHOLcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl < 200
	            </div>
			</div>
			<div class="form-group row">
	            <label for="TRIG" class="col-3 col-form-label">Triglycerides :</label>
	            <div class="col-2">
	            	<input type="text" name="TRIG"  class="form-control" id="TRIG" value="<?php echo $data['TRIG'] ?>" >
	            </div>
	            <div class="col-3">
	            	mmol/L 0.3-1.7
	            </div>
	            <div class="col-1">
	            	<input type="text" name="TRIGcon" class="form-control" id="TRIGcon" value="<?php echo $data['TRIGcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 27-150
	            </div>
			</div>
			<div class="form-group row">
	            <label for="HDL" class="col-3 col-form-label">HDL :</label>
	            <div class="col-2">
	            	<input type="text" name="HDL"  class="form-control" id="HDL" value="<?php echo $data['HDL'] ?>" >
	            </div>
	            <div class="col-3">
	            	mmol/L 0.9-2.21
	            </div>
	            <div class="col-1">
	            	<input type="text" name="HDLcon" class="form-control" id="HDLcon" value="<?php echo $data['HDLcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 35-85.32
	            </div>
			</div>
			<div class="form-group row">
	            <label for="LDL" class="col-3 col-form-label">LDL :</label>
	            <div class="col-2">
	            	<input type="text" name="LDL"  class="form-control" id="LDL" value="<?php echo $data['LDL'] ?>">
	            </div>
	            <div class="col-3">
	            	mmol/L 2.5-4.1
	            </div>
	            <div class="col-1">
	            	<input type="text" name="LDLcon" class="form-control" id="LDLcon" value="<?php echo $data['LDLcon'] ?>" >
	            </div>
	            <div class="col-3">
	            	mg/dl 96.52-158.30
	            </div>
			</div>
			<div class="form-group row">
	            <label for="CH" class="col-3 col-form-label"> CHOLESTEROL/HDL.RATIO :</label>
	            <div class="col-2">
	            	<input type="text" name="CH"  class="form-control" id="CH" value="<?php echo $data['CH'] ?>" >
	            </div>
	            <div class="col-3">
	            	mmol/L < 4.40 
	            </div>
			</div>
			<div class="form-group row">
	            <label for="VLDL" class="col-3 col-form-label">VLDL :</label>
	            <div class="col-2">
	            	<input type="text" name="VLDL"  class="form-control" id="VLDL" value="<?php echo $data['VLDL'] ?>" >
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
	            	<input type="text" name="Na"  class="form-control" id="Na" value="<?php echo $data['Na'] ?>">
	            </div>
	            <div class="col-3">
	            	mmol/L 135 - 153
	            </div>
			</div>
			<div class="form-group row">
	            <label for="K" class="col-3 col-form-label">Potassium :</label>
	            <div class="col-2">
	            	<input type="text" name="K"  class="form-control" id="K" value="<?php echo $data['K'] ?>">
	            </div>
	            <div class="col-3">
	            	mmol/L 3.50 - 5.30
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Cl" class="col-3 col-form-label">Chloride :</label>
	            <div class="col-2">
	            	<input type="text" name="Cl"  class="form-control" id="Cl" value="<?php echo $data['Cl'] ?>">
	            </div>
	            <div class="col-3">
	            	mmol/L 98-107
	            </div>
			</div>
			<div class="row">
	            <div class="col">
	            	<b>ENZYMES</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="ALT" class="col-3 col-form-label">SGPT/ALT :</label>
	            <div class="col-2">
	            	<input type="text" name="ALT"  class="form-control" id="ALT" value="<?php echo $data['ALT'] ?>">
	            </div>
	            <div class="col-4">
	            	U/L Female: 5 - 31  Male: 10 - 41
	            </div>
			</div>
			<div class="form-group row">
	            <label for="AST" class="col-3 col-form-label">SGOT/AST :</label>
	            <div class="col-2">
	            	<input type="text" name="AST"  class="form-control" id="AST" value="<?php echo $data['AST'] ?>">
	            </div>
	            <div class="col-4">
	            	U/L 0 - 40
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Amylase" class="col-3 col-form-label">Amylase:</label>
	            <div class="col-2">
	            	<input type="text" name="Amylase"  class="form-control" id="Amylase" value="<?php echo $data['Amylase'] ?>">
	            </div>
	            <div class="col-4">
	            	U/L 22 - 80
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Lipase" class="col-3 col-form-label">Lipase:</label>
	            <div class="col-2">
	            	<input type="text" name="Lipase"  class="form-control" id="Lipase" value="<?php echo $data['Lipase'] ?>" >
	            </div>
	            <div class="col-4">
	            	U/L 0 - 62
	            </div>
			</div>
			<div class="form-group row">
	            <label for="HB" class="col-3 col-form-label"><b>HBA1C :</b></label>
	            <div class="col-2">
	            	<input type="text" name="HB"  class="form-control" id="HB" value="<?php echo $data['HB'] ?>">
	            </div>
	            <div class="col-4">
	            	% 4.3 - 6.3
	            </div>
			</div>
			<div class="form-group row">
	            <label for="ALP" class="col-3 col-form-label"><b>ALP :</b></label>
	            <div class="col-2">
	            	<input type="text" name="ALP"  class="form-control" id="ALP" value="<?php echo $data['ALP'] ?>">
	            </div>
	            <div class="col-4">
	            	U/L up to 105
	            </div>
			</div>
			<!-- <div class="form-group row">
	            <label for="PSA" class="col-3 col-form-label"><b>PSA :</b></label>
	            <div class="col-2">
	            	<input type="text" name="PSA"  class="form-control" id="PSA" value="<?php echo $data['PSA'] ?>">
	            </div>
	            <div class="col-4">
	            	ng/mL 0-4
	            </div>
			</div> -->
			<div class="form-group row">
	            <label class="col-3 col-form-label"><b>GGTP :</b></label>
	            <div class="col-2">
	            	<input type="text" name="GGTP"  class="form-control" id="GGTP" value="<?php echo $data['GGTP']?>">
	            </div>
	        </div>
	        <button class="btn btn-info mb-2" type="button" data-toggle="collapse" data-target="#collapseMore" aria-expanded="false" aria-controls="collapseMore" id="more" style="padding-top: 0px;padding-bottom: 0px;">
		    	More Test &nbsp;<i class='fas fa-arrow-alt-circle-right'></i>
		  	</button>
			<div class="collapse" id="collapseMore">				
				<div class="form-group row">
		            <label for="LDH" class="col-3 col-form-label"><b>LDH :</b></label>
		            <div class="col-2">
		            	<input type="text" name="LDH"  class="form-control" id="LDH" value="<?php echo $data['LDH'] ?>">
		            </div>
		            <div class="col-4">
		            	U/L 132-228
		            </div>
				</div>	
				<div class="form-group row">
		            <label for="Calcium" class="col-3 col-form-label"><b>TOTAL CALCIUM :</b></label>
		            <div class="col-2">
		            	<input type="text" name="Calcium"  class="form-control" id="Calcium" value="<?php echo $data['Calcium'] ?>">
		            </div>
		            <div class="col-4">
		            	mmo/L 2.10-2.63
		            </div>
				</div>	
				<div class="form-group row">
		            <label for="Protein" class="col-3 col-form-label"><b>TOTAL PROTEIN :</b></label>
		            <div class="col-2">
		            	<input type="text" name="Protein"  class="form-control" id="Protein" value="<?php echo $data['Protein'] ?>">
		            </div>
		            <div class="col-4">
		            	g/L 66-83
		            </div>
				</div>
				<div class="form-group row">
		            <label for="InPhos" class="col-3 col-form-label"><b>Inorganic Phosphorus :</b></label>
		            <div class="col-2">
		            	<input type="text" name="InPhos"  class="form-control" id="InPhos" value="<?php echo $data['InPhos'] ?>">
		            </div>
		            <div class="col-4">
		            	mmo/L 0.8-1.50
		            </div>
				</div>
				<div class="form-group row">
		            <label for="Albumin" class="col-3 col-form-label"><b>Albumin :</b></label>
		            <div class="col-2">
		            	<input type="text" name="Albumin"  class="form-control" id="Albumin" value="<?php echo $data['Albumin'] ?>">
		            </div>
		            <div class="col-4">
		            	g/L 38-51
		            </div>
				</div>	
				<div class="form-group row">
		            <label for="Globulin" class="col-3 col-form-label"><b>Globulin :</b></label>
		            <div class="col-2">
		            	<input type="text" name="Globulin"  class="form-control" id="Globulin" value="<?php echo $data['Globulin'] ?>">
		            </div>
		            <div class="col-4">
		            	g/L 23-35
		            </div>
				</div>
				<div class="form-group row">
		            <label for="Magnesium" class="col-3 col-form-label"><b>Magnesium :</b></label>
		            <div class="col-2">
		            	<input type="text" name="Magnesium"  class="form-control" id="Magnesium" value="<?php echo $data['Magnesium'] ?>">
		            </div>
		            <div class="col-4">
		            	mmol/L 0.70 - 0.98
		            </div>
				</div>
				<div class="row mb-3">
		            <div class="col">
		            	<b>Oral Glucose Tolerance Test (OGTT)</b>
		            </div>
				</div>
				<div class="form-group row">
		            <label for="OGTT1" class="col-3 col-form-label ">&nbsp;&nbsp;OGTT 1 HR :</label>
		            <div class="col-2">
		            	<input type="text" name="OGTT1"  class="form-control" id="OGTT1" value="<?php echo $data['OGTT1'] ?>">
		            </div>
		            <div class="col-3">
		            	mmol/L < 11.0
		            </div>
		            <div class="col-1">
	            	<input type="text" name="OGTT1con" class="form-control" id="OGTT1con" value="<?php echo $data['OGTT1con'] ?>">
		            </div>
		            <div class="col-3">
		            	mg/dl < 200
		            </div>
				</div>
				<div class="form-group row">
		            <label for="OGTT2" class="col-3 col-form-label ">&nbsp;&nbsp;OGTT 2 HR :</label>
		            <div class="col-2 ">
		            	<input type="text" name="OGTT2"  class="form-control" id="OGTT2" value="<?php echo $data['OGTT2'] ?>">
		            </div>
		            <div class="col-3">
		            	mmo/L < 7.7
		            </div>
		            <div class="col-1">
	            	<input type="text" name="OGTT2con" class="form-control" id="OGTT2con" value="<?php echo $data['OGTT2con'] ?>">
		            </div>
		            <div class="col-3">
		            	mg/dl < 140
		            </div>
				</div>
				<div class="form-group row">
		            <label for="OGCT" class="col-3 col-form-label"><b>OGCT (50G) :</b></label>
		            <div class="col-2">
		            	<input type="text" name="OGCT"  class="form-control" id="OGCT" value="<?php echo $data['OGCT'] ?>">
		            </div>
		            <div class="col-3">
		            	mmol/L < 7.7
		            </div>
		            <div class="col-1">
	            	<input type="text" name="OGCTcon" class="form-control" id="OGCTcon" value="<?php echo $data['OGCTcon'] ?>">
		            </div>
		            <div class="col-3">
		            	mg/dl < 140
		            </div>
				</div>
				<div class="row mb-3">
		            <div class="col">
		            	<b>Creatine phosphokinase (CPK)</b>
		            </div>
				</div>
				<div class="form-group row">
		            <label for="CPKMB" class="col-3 col-form-label ">&nbsp;&nbsp;CPK - MB :</label>
		            <div class="col-2 ">
		            	<input type="text" name="CPKMB"  class="form-control" id="CPKMB" value="<?php echo $data['CPKMB'] ?>">
		            </div>
		            <div class="col-3">
		            	U/L 0 - 25
		            </div>
				</div>
				<div class="form-group row">
		            <label for="CPKMM" class="col-3 col-form-label ">&nbsp;&nbsp;CPK - MM :</label>
		            <div class="col-2 ">
		            	<input type="text" name="CPKMM"  class="form-control" id="CPKMM" value="<?php echo $data['CPKMM'] ?>">
		            </div>
		            <div class="col-3">
		            	U/L 25 - 170
		            </div>
				</div>
				<div class="form-group row">
		            <label for="totalCPK" class="col-3 col-form-label ">&nbsp;&nbsp;TOTAL CPK :</label>
		            <div class="col-2 ">
		            	<input type="text" name="totalCPK"  class="form-control" id="totalCPK" value="<?php echo $data['totalCPK'] ?>">
		            </div>
		            <div class="col-3">
		            	U/L 25 - 195
		            </div>
				</div>
				<div class="form-group row">
		            <label for="IonCalcium" class="col-3 col-form-label"><b>Ionized Calcium :</b></label>
		            <div class="col-2">
		            	<input type="text" name="IonCalcium"  class="form-control" id="IonCalcium" value="<?php echo $data['IonCalcium'] ?>">
		            </div>
		            <div class="col-4">
		            	mmol/L 0.93 - 1.32
		            </div>
				</div>
				<div class="row mb-3">
		            <div class="col">
		            	<b>BILIRUBIN</b>
		            </div>
				</div>
				<div class="form-group row">
		            <label for="BILTotal" class="col-3 col-form-label">&nbsp;&nbsp; Total ( Adult ) :</label>
		            <div class="col-2">
		            	<input type="text" name="BILTotal"  class="form-control" id="BILTotal" value="<?php echo $data['BILTotal'] ?>">
		            </div>
		            <div class="col-4">
		            	umol/L 0 - 20
		            </div>
				</div>
				<div class="form-group row">
		            <label for="BILDirect" class="col-3 col-form-label">&nbsp;&nbsp; Direct :</label>
		            <div class="col-2">
		            	<input type="text" name="BILDirect"  class="form-control" id="BILDirect" value="<?php echo $data['BILDirect'] ?>">
		            </div>
		            <div class="col-4">
		            	umol/L 0 - 9
		            </div>
				</div>
				<div class="form-group row">
		            <label for="BILIndirect" class="col-3 col-form-label">&nbsp;&nbsp; Indirect :</label>
		            <div class="col-2">
		            	<input type="text" name="BILIndirect"  class="form-control" id="BILIndirect" value="<?php echo $data['BILIndirect'] ?>">
		            </div>
		            <div class="col-4">
		            	umol/L 0 - 11
		            </div>
				</div>
				<div class="form-group row">
		            <label for="AGRatio" class="col-3 col-form-label"><b>A/G Ratio :</b></label>
		            <div class="col-2">
		            	<input type="text" name="AGRatio"  class="form-control" id="A/GRatio" value="<?php echo $data['AGRatio'] ?>">
		            </div>
		            <div class="col-4">
		            	1.5 - 3.0
		            </div>
				</div>				
			</div>

			<div class="form-group row">
				<div class="col">
						<?php if($data['TransactionType'] == 'CASH'){ ?>
						<input type="text" name="Clinician" class="form-control" value ='<?php echo $data['Biller'] ?> '>
					<?php }else{ ?>  
						<input type="text" name="Clinician" class="form-control" value ='' placeholder="Clinician/Walk-In">
					<?php } ?>
	            </div>
	            <div class="col">
	            	<select class="form-control" name="MedTechID">
	            		<?php  
	            			$medtech = $lab->medtech();
	            				foreach ($medtech as $key) {
	            					if ($key['personnelID'] == $data['MedID']){
		            				$select = 'selected';
		            				}else{
		            					$select = '';
		            				}
	            				
	            		?>
						<option value="<?php echo $key['personnelID'] ?>" <?php echo $select;?>>
							<?php echo $key['FirstName']." ".$key['MiddleName']." ".$key['LastName'].", ".$key['PositionEXT']?>	
						</option>
					<?php } ?>
					</select>
	            	
	            </div>
	            <div class="col">
	            	<select class="form-control" name="qcID">
	            		<?php  
	            			foreach ($medtech as $key) {
	            				if ($key['personnelID'] == $data['QualityID']){
	            				$select = 'selected';
	            				}else{
	            					$select = '';
	            				}
	            				
	            		?>
						<option value="<?php echo $key['personnelID'] ?>" <?php echo $select;?>>
							<?php echo $key['FirstName']." ".$key['MiddleName']." ".$key['LastName'].", ".$key['PositionEXT']?>	
						</option>
					<?php } ?>
					</select>
	            </div>
	            <div class="col">
	            	<select class="form-control" name="pathID">
	            		<?php  
	            			foreach ($medtech as $key) {
	            				if ($key['personnelID'] == $data['PathID']){
	            				$select = 'selected';
	            				}else{
	            					$select = '';
	            				}        				
	            		?>
						<option value="<?php echo $key['personnelID'] ?>" <?php echo $select;?>>
							<?php echo $key['FirstName']." ".$key['MiddleName']." ".$key['LastName'].", ".$key['PositionEXT']?>	
						</option>
					<?php } ?>
					</select>
	            </div>
			</div>
			<div class="form-group row">
				<div class="col" style="font-weight: bold; padding-top: 0px;"><center>Clinician/Walk-In</center></div>
	            <div class="col" style="font-weight: bold; padding-top: 0px;"><center>Medical Technologist</center></div>
	            <div class="col" style="font-weight: bold; padding-top: 0px;"><center>Quality Control</center></div>
	            <div class="col" style="font-weight: bold; padding-top: 0px;"><center>Pathologist</center></div>
			</div>


			<center><input type="submit" class="btn btn-primary" value="SUBMIT" ></center>

			</form>
            </div>
        </div>
    </div>	
</div>
	
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#collapseMore').on('hide.bs.collapse', function () {
		  $("#more").html("More Test &nbsp; <i class='fas fa-arrow-alt-circle-right'></i>");
		});
		$('#collapseMore').on('show.bs.collapse', function () {
		  $("#more").html("Hide Test &nbsp; <i class='fas fa-arrow-alt-circle-up'></i>");
		})
		function chemCalc(divide, id, id2){
			var idName = "#" + id;
			var idName2 = "#" + id2;
			$(idName).keyup(function(){
				var results = $(this).val();
				var myResult = results / divide;
				myResult = parseFloat(Math.round(myResult * 100) / 100).toFixed(2);
				if (myResult == 0) {
					$(idName2).val("");
				}else{
					$(idName2).val(myResult);
				}			
			});		
		}
		chemCalc("0.055","FBS","FBScon");
		chemCalc("0.055","RBS","RBScon");
		chemCalc("59.48","BUA","BUAcon");
		chemCalc("0.357","BUN","BUNcon");
		chemCalc("88.4","CREA","CREAcon");
		chemCalc("0.0259","CHOL","CHOLcon");
		chemCalc("0.0113","TRIG","TRIGcon");
		chemCalc("0.0259","HDL","HDLcon");
		chemCalc("0.0259","LDL","LDLcon");
		chemCalc("0.055","OGTT1","OGTT1con");
		chemCalc("0.055","OGTT2","OGTT2con");
		chemCalc("0.055","OGCT","OGCTcon");
	$("#HDL, #TRIG, #CHOL").keyup(function(){
		var chole = $("#CHOL").val();
		var trig = $("#TRIG").val();
		var hdl = $("#HDL").val();
		var ldlval =  chole - (trig / 2.175) - hdl;
		ldlval = parseFloat(Math.round(ldlval * 100) / 100).toFixed(2);
		ldlval2 = ldlval / 0.0259;
		var chdl = chole / hdl;
		var vldl = trig / 2.175;
		vldl = parseFloat(Math.round(vldl * 100) / 100).toFixed(2);
		chdl = parseFloat(Math.round(chdl * 100) / 100).toFixed(2);
		if (chole != "" && trig != "" & hdl != "") {
			if (chdl != "Infinity") {
				$("#CH").val(chdl);
			}		
			$("#VLDL").val(vldl);
			$("#LDLcon").val(ldlval2);
			$("#LDL").val(ldlval);
		}else{
			$("#VLDL").val("");
			$("#LDLcon").val("");
			$("#LDL").val("");
			$("#CH").val("");
		}

	});

	});
</script>
</html>
<?php }else{
	echo "<script> alert('Error: No existing record found.'); </script>";
  	echo "<script>window.open('LabHemaADD.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabHema.php','_self');</script>";
} ?>