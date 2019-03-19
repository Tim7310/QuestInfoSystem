<?php
include_once('../connection.php');
//include_once('../classes/transVal.php');
include_once('../classes/qc.php');
include_once('../classes/rad.php');
include_once('../classes/lab.php');
include_once('../classes/pe.php');
include_once('../classes/vital.php');
include_once('../classes/medhis.php');
include_once('../classes/patient.php');
include_once('../classes/trans.php');
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
$His = new His;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$his = $His->fetch_data($id, $tid);
$vital = new vital;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$vit = $vital->fetch_data($id, $tid);
$pe = new pe;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$pe = $pe->fetch_data($id, $tid);
$lab = new lab;
// if (isset($_GET['id'])){
// 	$id = $_GET['id'];
// 	$tid = $_GET['tid'];
// 	$lab = $lab->fetch_data($id, $tid);
$rad = new rad;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$rad = $rad->fetch_data($id, $tid);
$qc = new qc;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$qc = $qc->fetch_data($id, $tid);
$trans = new trans;
$trans2 = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$trans = $trans->fetch_data($id, $tid);
	

$data2 = $lab->getData($id, $tid, "lab_microscopy");
	$data1 = $lab->getData($id, $tid, "lab_hematology");
	$data3 = $lab->getData($id, $tid, "lab_serology");
	$data4 = $lab->getData($id, $tid, "lab_toxicology");
if(is_array($data) or is_array($data1) or is_array($data3) or is_array($data4)){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Patient Records Summary</title>
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
		font-family: "Calibri";
		font-size: 24px;
	}
	.card-block
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.col p
	{
		text-transform: uppercase;
	}
		.col-2
	{
		align-self: center;
	}
</style>

<body >
<?php
include_once('doctorsidebar.php');
?>
<div class="container-fluid">
	<form action="DocClassInsert.php" method="post" autocomplete="off" enctype="multipart/form-data">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Patient Summary Records</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Personal Information</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
						<label>Company Name: </label><br>
						<p><b><?php echo $data['CompanyName'] ?></b></p>
						<label>Applied Position: </label><br>
						<p><b><?php echo $data['Position'] ?></b></p>
						<label>Name:</label><br>
						<p><b><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
						<label>Address: </label><br>
						<p><b><?php echo $data['Address'] ?></b></p>
					</div>
					<div class="col">
						<label>Birthdate: </label><br>
						<p><b><?php echo $data['Birthdate'] ?></b></p>
						<label>Age: </label><br>
						<p><b><?php echo $data['Age'] ?></b></p>
						<label>Gender: </label><br>
						<p><b><?php echo $data['Gender'] ?></b></p>
						<label>Contact No.: </label><br>
						<p><b><?php echo $data['ContactNo'] ?></b></p>
						<label>Email Address: </label><br>
						<p><b><?php echo $data['Email'] ?></b></p>
					</div>
					<div class="col">
						<label>LOE: </label><br>
						<!-- <p><b><?php echo $trans['LOE'] ?></b></p> -->
						<label>AN: </label><br>
						<!-- <p><b><?php echo $trans['AN'] ?></b></p> -->
						<label>AC: </label><br>
						<!-- <p><b><?php echo $trans['AC'] ?></b></p> -->
						<label>Senior ID: </label><br>
						<!-- <p><b><?php echo $trans['SID'] ?></b></p> -->
						<label>Comment: </label><br>
						<!-- <p><b><?php echo $data['Notes'] ?></b></p>
						<p><b><?php echo $trans['Notes'] ?></b></p> -->
					</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Transaction</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<p><b><?php echo $trans['TransactionID'] ?></b></p>
						<p><b><input type="hidden" name="tid" value="<?php echo $trans['TransactionID'] ?>"></b></p>
						<p><b><input type="hidden" name="id" value="<?php echo $data['PatientID'] ?>"></b></p>
					</div>
					<div class="col col-md-auto	">
						<label>Availed: </label><br>
						<p><b><?php 
						$itemID = $trans['ItemID'];
						$items = $trans2->each_item($itemID);
							foreach ($items as $item) {
								echo $item['ItemName']." ";
							}
						 ?></b></p>
					</div>
					<div class="col">
						<label>Description: </label><br>
						<p><b><?php foreach ($items as $item) {
								echo $item['ItemDescription']." ";
							} ?></b></p> 
					</div>
					<div class="col col-md-auto">
						<label>Transaction Type: </label><br>
						<p><b><?php echo $trans['TransactionType'] ?></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Medical History</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
						<label class="col-12 col-form-label text-right">Significant Past Illness</label>
					</div>
					<div class="col">
						<label class="col-12 col-form-label">YES / NO</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Asthma:</label>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['asth']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Tuberculosis:</label>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['tb']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Diabetes:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['dia']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">High Blood Pressure:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['hb']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Heart Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['hp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Kidney Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['kp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Abdominal/Hernia:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['ab']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Joint/Back/Scoliosis:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['jbs']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Psychiatric Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['pp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Migraine/Headache:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['mh']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Fainting/Seizure:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['fs']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Allergies:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['alle']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Cancer/Tumor:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['ct']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Hepatitis:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['hep']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">STD:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['std']?></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Vital Signs</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
						<label>Height:</label>
						<b><?php echo $vit['height']?></b>
					</div>
					<div class="col">
						<label>Weight:</label>
						<b><?php echo $vit['weight']?></b>
					</div>
					<div class="col">
						<label>BMI:</label>
						<b><?php echo $vit['bmi']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>BP:</label>
						<b><?php echo $vit['bp']?></b>
					</div>
					<div class="col">
						<label>PR:</label>
						<b><?php echo $vit['pr']?></b>
					</div>
					<div class="col">
						<label>RR:</label>
						<b><?php echo $vit['rr']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 col-form-label text-center" ><b>VISUAL ACUITY</b></label>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label><b>Uncorrected</b></label>
					</div>
					<div class="col">
						<label>OD:</label>
						<b><?php echo $vit['uod']?></b>
					</div>
					<div class="col">
						<label>OS:</label>
						<b><?php echo $vit['uos']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label><b>Corrected</b></label>
					</div>
					<div class="col">
						<label>OD:</label>
						<b><?php echo $vit['cod']?></b>
					</div>
					<div class="col">
						<label>OS:</label>
						<b><?php echo $vit['cos']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Ishihara Test:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['cv']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Hearing:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['hearing']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Hospitalization:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['hosp']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Operations:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['opr']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Present Medications:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['pm']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Smoker(sticks/packs/years):</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['smoker']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Alcoholic Drinker:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['ad']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Last Menstrual Period:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['lmp']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Others/Notes:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['Notes']?></b>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Physical Examinations</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
					</div>
					<div class="col">
						<label>NORMAL</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
					</div>
					<div class="col">
						<label>YES/NO</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Skin:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['skin']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Head and Neck:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['hn']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Chest/Breast/Lungs:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['cbl']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Cardiac/Heart:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['ch']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Abdomen:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['abdo']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Extremities:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['extre']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Others/Notes:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['ot']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Findings:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['find']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Physican:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['Doctor']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">License:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['License']?><br></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Laboratory Results</b></center></div>
            <div class="card-block">
            	<!-- CBC -->
            	<div class="row">
	            	<div class="col">
	            		<b>HEMATOLOGY</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col-3">
	            		<b>Complete Blood Count</b>
	            	</div>
	            	<div class="col-2">
	            		
	            	</div>
	            	<div class="col-2">
	            		
	            	</div>
	            	<div class="col-2 ">
	            		<b>Normal Range</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="WhiteBlood" class="col-3 col-form-label text-right">White Blood Cells :</label>
	            	<div class="col-2">
	            		<b><?php echo $data1['WhiteBlood'] ?></b>
	            	</div>
	            	<label for="WhiteBlood" class="col-2 col-form-label">x10^9/L</label>
	            	<label for="WhiteBlood" class="col-2 col-form-label">4.23-11.07</label>
				</div>
				<div class="form-group row">
	            	<label for="Hemoglobin" class="col-3 col-form-label text-right">Hemoglobin :</label>
	            	<div class="col-2">
	            		<b><?php echo $data1['Hemoglobin'] ?></b>
	            	</div>
	            	<label for="Hemoglobin" class="col-2 col-form-label">g/L</label>
	            	<div class="col-2">
	            		<b><?php echo $data1['HemoNR'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Hematocrit" class="col-3 col-form-label text-right">Hematocrit :</label>
	            	<div class="col-2">
	            		<b><?php echo $data1['Hematocrit'] ?></b>
	            	</div>
	            	<label for="Hematocrit" class="col-2 col-form-label">VF</label>
	            	<div class="col-2">
	            		<b><?php echo $data1['HemaNR'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>Differential Count</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Neutrophils" class="col-3 col-form-label text-right">Neutrophils :</label>
	            	<div class="col-2">
	            		<b><?php echo $data1['Neutrophils'] ?></b>
	            	</div>
	            	<label for="Neutrophils" class="col-2 col-form-label">%</label>
	            	<label for="Neutrophils" class="col-2 col-form-label">34-71</label>
				</div>
				<div class="form-group row">
	            	<label for="Lymphocytes" class="col-3 col-form-label text-right">Lymphocytes :</label>
	            	<div class="col-2">
	            		<b><?php echo $data1['Lymphocytes'] ?></b>
	            	</div>
	            	<label for="Lymphocytes" class="col-2 col-form-label">%</label>
	            	<label for="Lymphocytes" class="col-2 col-form-label">22-53</label>
				</div>
				<div class="form-group row">
	            	<label for="Monocytes" class="col-3 col-form-label text-right">Monocytes :</label>
	            	<div class="col-2">
	            		<b><?php echo $data1['Monocytes'] ?></b>
	            	</div>
	            	<label for="Monocytes" class="col-2 col-form-label">%</label>
	            	<label for="Monocytes" class="col-2 col-form-label">5-12</label>
				</div>
				<div class="form-group row">
	            	<label for="CBCOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $data1['CBCOt'] ?></b>
	            	</div>
				</div>
<!-- U/A -->	
				<div class="row">
	            	<div class="col-3 ">
	            		<b>CLINICAL MICROSCOPY</b>
	            	</div>
				</div>
				<div class="row">
	            	<div class="col-3 ">
	            		<b>Complete Urinalysis</b>
	            	</div>
				</div>
				<div class="row">
	            	<div class="col-3 ">
	            		<b>Physical/Chemical</b>
	            	</div>
	            	<div class="col-3 "></div>
	            	<div class="col-2 ">
	            		<b>Microscopic</b>
	            	</div>
	            	<div class="col-2 "></div>
	            	<div class="col-2 ">
	            		<b>Normal Range</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriColor" class="col-3 col-form-label text-right">Color :</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['UriColor'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-3 col-form-label text-right">RBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $data2['RBC'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="RBC" class="col-2 col-form-label">0-3</label>
				</div>
				<div class="form-group row">
	            	<label for="UriTrans" class="col-3 col-form-label text-right">Transparency :</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['UriTrans'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-3 col-form-label text-right">WBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $data2['WBC'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="WBC" class="col-2 col-form-label">0-5</label>
				</div>
				<div class="form-group row">
	            	<label for="UriPh" class="col-3 col-form-label text-right">pH :</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['UriPh'] ?></b>
	            	</div>
	            	<label for="ECells" class="col-3 col-form-label text-right">E.Cells:</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['ECells'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriSp" class="col-3 col-form-label text-right">Sp. Gravity :</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['UriSp'] ?></b>
	            	</div>
	            	<label for="Mthreads" class="col-3 col-form-label text-right">M.Threads:</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['MThreads'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPro" class="col-3 col-form-label text-right">Protein :</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['UriPro'] ?></b>
	            	</div>
	            	<label for="Bac" class="col-3 col-form-label text-right">Bacteria:</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['Bac'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriGlu" class="col-3 col-form-label text-right">Glucose :</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['UriGlu'] ?></b>
	            	</div>
	            	<label for="Amorph" class="col-3 col-form-label text-right">Amorphous:</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['Amorph'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['UriOt'] ?></b>
	            	</div>

	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['CoAx'] ?></b>
	            	</div>
				</div>


<!-- Drug Test -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>DRUG SCREENING</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Meth" class="col-3 col-form-label text-right">METHAMPHETHAMINE:</label>
	            	<div class="col-2">
	            		<b><?php echo $data4['Meth'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Tetra" class="col-3 col-form-label text-right">TETRAHYDROCANABINOL:</label>
	            	<div class="col-2">
	            		<b><?php echo $data4['Tetra'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="DT" class="col-3 col-form-label text-right">DT RESULT:</label>
	            	<div class="col-2">
	            		<b><?php echo $data4['Drugtest'] ?></b>
	            	</div>
				</div>
<!-- Serology -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>SEROLOGY</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="HBsAg" class="col-3 col-form-label text-right">HBsAg:</label>
	            	<div class="col-2">
	            		<b><?php echo $data3['HBsAG'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="PregTest" class="col-3 col-form-label text-right">PREGNANCY TEST:</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['PregTest'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="SeroOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $data3['SeroOt'] ?></b>
	            	</div>
				</div>
<!-- FECALYSIS -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>FECALYSIS</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecColor" class="col-3 col-form-label text-right">Color:</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['FecColor'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['FecCon'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['FecMicro'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $data2['FecOt'] ?></b>
	            	</div>
				</div>
				<div class="form-group row"><hr></div>

				<div class="row">
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b>
					<?php $rec = $lab->medtechByID($data2['MedID']);
	            	echo $rec['FirstName']." ". $rec['MiddleName'] ." ". $rec['LastName'].", ".$rec['PositionEXT'] ?> 
	            </b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b>
					<?php $qc1 = $lab->medtechByID($data2['QualityID']);
	            	echo $qc1['FirstName']." ". $qc1['MiddleName'] ." ". $qc1['LastName'].", ".$qc1['PositionEXT'] ?>	     
	            	</b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b>
					<?php $path = $lab->medtechByID($data2['PathID']);
		            	echo $path['FirstName']." ". $path['MiddleName'] ." ". $path['LastName'].", ".$path['PositionEXT'] ?> </b></span></center></div>
				</div>
				<div class="form-group row">
	            	<div class="col">
	            		<center>Medical Technologist</center>
	            	</div>
	            	<div class="col">
	            		<center>Quality Control</center>
	            	</div>
	            	<div class="col">
	            		<center>Pathologist</center>
	            	</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Radiology Report</b></center></div>
            <div class="card-block">
				<div class="row">
					<div class="col">
						<label class="col-1">Comment:</label><br>
					</div>
					<div class="col-10">
						<p style="padding-left: 20px;"><b><?php echo $rad['Comment']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-1">Impressions:</label><br>
					</div>
					<div class="col-10">
						<p style="padding-left: 20px;"><b><?php echo $rad['Impression']?><br></b></p>
					</div>
				</div>
				<div class="row">
	            	<div class="col">
	            		<center><b><?php echo $rad['QA'] ?></b></center>
	            	</div>
	            	<div class="col">
	            		<center><b><?php echo $rad['Radiologist'] ?></b></center>
	            	</div>
				</div>
				<div class="row">
	            	<div class="col">
	            		<center>Quality Assurance</center>
	            	</div>
	            	<div class="col">
	            		<center>Radiologist</center>
	            	</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Classification</b></center></div>
            <div class="card-block">
				<div class="row">
					<div class="col">
						<label class="col-1">Class:</label><br>
					</div>
					<div class="col-10">
						<p style="padding-left: 20px;"><b><?php echo $qc['MedicalClass']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-1">Notes:</label><br>
					</div>
					<div class="col-10">
						<p style="padding-left: 20px;"><b><?php echo $qc['Notes']?><br></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Modify Classification of <?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></center></div>
            <div class="card-block">
				<div class="row">
					<div class="col-3">
						<label class="col-1">Classification:</label><br>
					</div>
					<div class="col-8">
						<SELECT name="Patclass" class="form-control">
							<option> Select Patient Classification</option>
							<option value="CLASS A - Physically Fit">CLASS A - Physically Fit</option>
							<option value="CLASS B - Physically Fit but with minor condition curable within a short period of time, that will not adversely affect the workers efficiency">CLASS B - Physically Fit but with minor condition curable within a short period of time, that will not adversely affect the workers efficiency.</option>
							<option value="CLASS C - With abnormal findings generally not accepted for employment.">CLASS C - With abnormal findings generally not accepted for employment.</option>
							<option value="CLASS D - Unemployable">CLASS D - Unemployable</option>
							<option value="Pending - These are cases that are equivocal as to the classification and are being evaluated further. After a certain period of time these cases will be classified whether fit or unfit fot employment">Pending - These are cases that are equivocal as to the classification and are being evaluated further. After a certain period of time these cases will be classified whether fit or unfit fot employment</option>
						</SELECT>
					</div>
				</div>
	            <div class="row">
	            	<div class="col-3">
						<label class="col">Overall Findings: </label><br>
					</div>
					<div class="col-8">
						<input type="text" name="ot" class="form-control" placeholder="Input Normal/Findings">
					</div>
	            </div>
	            <div class="row">
	            	<div class="col">
						
					</div>
					<div class="col">
						<center><input type="submit" class="btn btn-primary" value="SUBMIT"></button></center>
					</div>
					<div class="col">
						
					</div>
	            </div>
        </div>
    </div>
</div>

</form>
</div>
<?php }}}}}}}}?>
</body>
</html>