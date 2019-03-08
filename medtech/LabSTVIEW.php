<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/patient.php');
include_once('../classes/lab.php');
$lab = new lab();
$transac = new trans;
$patient = new Patient;
if (isset($_GET['id']) and isset($_GET['tid'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$data = $patient->fetch_data($id);
	$trans = $transac->fetch_data($id,$tid);
	$check =  $lab->getData($id, $tid, "lab_toxicology");
	$check2 =  $lab->getData($id, $tid, "lab_serology");
if (is_array($check) or is_array($check2)) {
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory Serology/Toxicology</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
    <script type="text/javascript" src="../source/jquery.min.js"></script>
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
						<b><?php echo $trans['TransactionID'] ?></b>
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
            <div class="form-group row">
				<div class="col"><center>Clinician/Walk-In</center></div>
	            <div class="col"><center>Date Received</center></div>
	            <div class="col"><center>Date Reported</center></div>
			</div>
			<div class="form-group row">
				<div class="col">
	            	<center><p><?php echo $trans['Biller'] ?></p></center>
	            </div>
	            <div class="col">
	            	<center><p><?php echo $data['CreationDate'] ?></p></center>
	            </div>
	            <div class="col">
	            	<center><p><?php echo $data['DateUpdate'] ?></p></center>
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
	            		<b><?php echo $check['Meth'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Tetra" class="col-3 col-form-label text-right">TETRAHYDROCANABINOL:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['Tetra'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="DT" class="col-3 col-form-label text-right">DT RESULT:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['Drugtest'] ?></b>
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
	            		<b><?php echo $check2['HBsAG'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="PregTest" class="col-3 col-form-label text-right">anti-HAV:</label>
	            	<div class="col-2">
	            		<b><?php echo $check2['AntiHav'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label class="col-3 col-form-label text-right">VDRL/RPR:</label>
	            	<div class="col-2">
	            		<b><?php echo $check2['VDRL'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="SeroOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $check2['SeroOt'] ?></b>
	            	</div>
				</div>
<!-- NAMES -->
		<hr>
			<div class="form-group row">
				<div class="col-3">Medical Technologist:</div>
				<div class="col">
	            	<p>
	            	<?php
	            	if (is_array($check)) {
	            	 	$rec = $lab->medtechByID($check['MedID']);	  
	            	 }else{
	            	 	$rec = $lab->medtechByID($check2['MedID']);
	            	 } 	            		
	            	echo $rec['FirstName']." ". $rec['MiddleName'] ." ". $rec['LastName'] ?> 
	            	/ <?php echo $rec['LicenseNO'] ?>
	            	</p>
	            </div>
			</div>
			<div class="form-group row">
				<div class="col-3">Quality Control:</div>
	            <div class="col">
	            	<p>
	            	<?php 
	            	if (is_array($check)) {
	            	 	$qc = $lab->medtechByID($check['QualityID']);
	            	 }else{
	            	 	$qc = $lab->medtechByID($check2['QualityID']);
	            	 } 

	            	echo $qc['FirstName']." ". $qc['MiddleName'] ." ". $qc['LastName'] ?> 
	            	/ <?php echo $qc['LicenseNO'] ?>
	            	</p>
	            </div>
			</div>
			<div class="form-group row">
	            <div class="col-3">Pathologist:</div>
	            <div class="col">
	            	<p>
		            	<?php
		            	if (is_array($check)) {
	            	 		$path = $lab->medtechByID($check['PathID']);
		            	 }else{
		            	 	$path = $lab->medtechByID($check2['PathID']);
		            	 }  
		            	
		            	echo $path['FirstName']." ". $path['MiddleName'] ." ". $path['LastName'] ?> 
		            	/ <?php echo $path['LicenseNO'] ?>
	            	</p>
	            </div>
			</div>
		<hr>
				<center><button type="button" class="btn btn-primary" onclick="document.location = 'LabSTEDIT.php?id=<?php echo $data['PatientID']."&tid=".$trans['TransactionID']?>';">UPDATE RECORD</button></center>
            </div>
        </div>
    </div>	
</div>
	
</div>
</body>
</html>
<?php }else{
	echo "<script> alert('Error: No existing record found.'); </script>";
  	echo "<script>window.open('LabSeroToxiADD.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabSeroToxi.php','_self');</script>";
} ?>