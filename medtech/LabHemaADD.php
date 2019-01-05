<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/patient.php');
$tid = $_GET['tid'];
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id,$tid);

$transac = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$trans = $transac->fetch_data($id, $tid);
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory CBC</title>
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
</style>

<body >
<?php
include_once('labsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Add Laboratory CBC Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabHemaINSERTUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<b><?php echo $trans['TransactionID'] ?></b>
						<input type="hidden" name="id" value="<?php echo $trans['TransactionID'] ?>">
						
					</div>
					<div class="col">
						<label>Name:</label><br>
						<input type="hidden" name="PatientID" value="<?php echo $data['PatientID'] ?>">
						<p><b><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
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
            			$itemids = $trans['ItemID'];
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
            			Transaction: <p><b><?php echo $trans['TransactionType'] ?></b></p>
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
	            	<input type="text" name="WhiteBlood"  class="form-control" id="WhiteBlood">
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
	            	<input type="text" name="Neutrophils"  class="form-control" id="Neutrophils">
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
	            	<input type="text" name="Lymphocytes"  class="form-control" id="Lymphocytes">
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
	            	<input type="text" name="Monocytes"  class="form-control" id="Monocytes">
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
	            	<input type="text" name="EOS"  class="form-control" id="Eosinophils">
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
	            	<input type="text" name="BAS"  class="form-control" id="Basophils">
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
	            	<input type="text" name="CBCRBC"  class="form-control" id="RBC">
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
	            	<input type="text" name="Hemoglobin"  class="form-control" id="Hemoglobin">
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
	            	<input type="text" name="Hematocrit"  class="form-control" id="Hematocrit">
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
	            	<input type="text" name="PLT"  class="form-control" id="PLATELET">
	            </div>
	            <div class="col-2">
	            	x10^3/mm3
	            </div>
	            <div class="col-2">
	            	150~400
	            </div>
			</div>



			<div class="form-group row">
				<div class="col">
	            	<input type="text" name="Clinician" class="form-control" placeholder="Clinician/Walk-In">
	            </div>
	            <div class="col">
	            	<input type="text" name="Received" class="form-control" value ='Jayanara May S. Capulong,RMT' placeholder=" Medical Technologist">
	            </div>
	            <div class="col">
	            	<input type="text" name="qc" class="form-control" value ='Althea Joy S. Padios,RMT' placeholder=" Quality Control">
	            </div>
	            <div class="col">
	            	<input type="text" name="Printed" class="form-control" value="Emiliano Dela Cruz,MD">
	            </div>
			</div>
			<div class="form-group row">
				<div class="col">
	            	
	            </div>
	            <div class="col">
	            	<input type="text" name="RMTLIC" class="form-control" value ='0075119' placeholder=" Medical Technologist License">
	            </div>
	            <div class="col">
	            	<input type="text" name="QCLIC" class="form-control" value =' 0076211' placeholder="Quality Control License">
	            </div>
	            <div class="col">
	            	<input type="text" name="PATHLIC" class="form-control" value="0073345" placeholder="Pathologist License">
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
<?php }} ?>
</body>
</html>