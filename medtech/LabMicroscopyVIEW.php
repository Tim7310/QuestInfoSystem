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
	$check =  $lab->getData($id, $tid, "lab_microscopy");
if (is_array($check)) {
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory Sciences Result</title>
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
<center><p style="font-size: 36px; font-family: 'Century Gothic';">View Laboratory Results</p></center>
<div class="container-fluid">
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<b><?php echo $check['TransactionID'] ?></b>
					</div>
					<div class="col">
						<label>Name:</label><br>
						<p><b><?php echo $check['LastName'] ?>,<?php echo $check['FirstName'] ?> <?php echo $check['MiddleName'] ?></b></p>
					</div>
					<div class="col">
						<label>Company Name: </label><br>
						<p><b><?php echo $check['CompanyName'] ?></b></p>
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
            			$itemids = $check['ItemID'];
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
            			Transaction: <p><b><?php echo $check['TransactionType'] ?></b></p>
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
	            	<center><p><?php echo $check['Biller'] ?></p></center>
	            </div>
	            <div class="col">
	            	<center><p><?php echo $check['CreationDate'] ?></p></center>
	            </div>
	            <div class="col">
	            	<center><p><?php echo $check['DateUpdate'] ?></p></center>
	            </div>
			</div>
			<hr>
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
	            		<b><?php echo $check['UriColor'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-3 col-form-label text-right">RBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $check['RBC'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="RBC" class="col-2 col-form-label">0-3</label>
				</div>
				<div class="form-group row">
	            	<label for="UriTrans" class="col-3 col-form-label text-right">Transparency :</label>
	            	<div class="col-2">
	            		<b><?php echo $check['UriTrans'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-3 col-form-label text-right">WBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $check['WBC'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="WBC" class="col-2 col-form-label">0-5</label>
				</div>
				<div class="row">
	            	<div class="col-3 ">
	            		<b>Urine Chemical</b>
	            	</div>
	            	<div class="col-3 "></div>
	            	<div class="col-2 ">
	            		<b></b>
	            	</div>
	            	<div class="col-2 "></div>
	            	<div class="col-2 ">
	            		<b></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPh" class="col-3 col-form-label text-right">pH :</label>
	            	<div class="col-2">
	            		<b><?php echo $check['UriPh'] ?></b>
	            	</div>
	            	<label for="ECells" class="col-3 col-form-label text-right">E.Cells:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['ECells'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriSp" class="col-3 col-form-label text-right">Sp. Gravity :</label>
	            	<div class="col-2">
	            		<b><?php echo $check['UriSp'] ?></b>
	            	</div>
	            	<label for="Mthreads" class="col-3 col-form-label text-right">M.Threads:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['MThreads'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPro" class="col-3 col-form-label text-right">Protein :</label>
	            	<div class="col-2">
	            		<b><?php echo $check['UriPro'] ?></b>
	            	</div>
	            	<label for="Bac" class="col-3 col-form-label text-right">Bacteria:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['Bac'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriGlu" class="col-3 col-form-label text-right">Glucose :</label>
	            	<div class="col-2">
	            		<b><?php echo $check['UriGlu'] ?></b>
	            	</div>
	            	<label for="Amorph" class="col-3 col-form-label text-right">Amorphous:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['Amorph'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="LE" class="col-3 col-form-label text-right">Leukocyte Esterase:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['LE'] ?></b>
	            	</div>
	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['CoAx'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="NIT" class="col-3 col-form-label text-right">Nitrite:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['NIT'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="URO" class="col-3 col-form-label text-right">Urobilinogen:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['URO'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BLD" class="col-3 col-form-label text-right">Blood:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['BLD'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="KET" class="col-3 col-form-label text-right">Ketone:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['KET'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BIL" class="col-3 col-form-label text-right">Bilirubin:</label>
	            	<div class="col-2">
	            		<b><?php echo $check['BIL'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $check['UriOt'] ?></b>
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
	            	<div class="col-4">
	            		<b><?php echo $check['FecColor'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-4">
	            		<b><?php echo $check['FecCon'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-4">
	            		<b><?php echo $check['FecMicro'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-4">
	            		<b><?php echo $check['FecOt'] ?></b>
	            	</div>
				</div>
<!-- Pregnancy Test -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>PREGNANCY TEST</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecColor" class="col-3 col-form-label text-right">Pregnancy Test Result:</label>
	            	<div class="col-4">
	            		<b><?php echo $check['PregTest'] ?></b>
	            	</div>
				</div>
<!-- AFB -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>AFB</b>
	            	</div>
	            	<div class="col-2"><center><b>Specimen 1</center></b></div>
	            	<div class="col-2"><center><b>Specimen 2</center></b></div>
				</div>
				<div class="form-group row">					
					<label for="FecColor" class="col-3 text-right">Visual Appearance:</label>	            	
	            	<div class="col-2">
	            		<center><b><?php echo $check['AFBVA1'] ?></b></center>
	            	</div>
	            	<div class="col-2">
	            		<center><b><?php echo $check['AFBVA2'] ?></b></center>
	            	</div>
				</div>
				<div class="form-group row">					
					<label for="FecColor" class="col-3 text-right">Reading:</label>	            	
	            	<div class="col-2">
	            		<center><b><?php echo $check['AFBR1'] ?></b></center>
	            	</div>
	            	<div class="col-2">
	            		<center><b><?php echo $check['AFBR2'] ?></b></center>
	            	</div>
				</div>
				<div class="form-group row">					
					<label for="FecColor" class="col-3 text-right">Reading:</label>	            	
	            	<div class="col-4">
	            		<center><b><?php echo $check['AFBD'] ?></b></center>
	            	</div>	  
				</div>
<!-- NAMES -->
		<hr>
			<div class="form-group row">
				<div class="col-3">Medical Technologist:</div>
				<div class="col">
	            	<p>
	            	<?php $rec = $lab->medtechByID($check['MedID']);
	            	echo $rec['FirstName']." ". $rec['MiddleName'] ." ". $rec['LastName'] ?> 
	            	/ <?php echo $rec['LicenseNO'] ?>
	            	</p>
	            </div>
			</div>
			<div class="form-group row">
				<div class="col-3">Quality Control:</div>
	            <div class="col">
	            	<p>
	            	<?php $qc = $lab->medtechByID($check['QualityID']);
	            	echo $qc['FirstName']." ". $qc['MiddleName'] ." ". $qc['LastName'] ?> 
	            	/ <?php echo $qc['LicenseNO'] ?>
	            	</p>
	            </div>
			</div>
			<div class="form-group row">
	            <div class="col-3">Pathologist:</div>
	            <div class="col">
	            	<p>
		            	<?php $path = $lab->medtechByID($check['PathID']);
		            	echo $path['FirstName']." ". $path['MiddleName'] ." ". $path['LastName'] ?> 
		            	/ <?php echo $path['LicenseNO'] ?>
	            	</p>
	            </div>
			</div>
		<hr>
				<center><button type="button" class="btn btn-primary" onclick="document.location = 'LabMicroscopyEDIT.php?id=<?php echo $check['PatientID']."&tid=".$check['TransactionID']?>';">UPDATE RECORD</button></center>
            </div>
        </div>
    </div>	
</div>
	
</div>
<?php }else{
	echo "<script> alert('Error: No existing record found.'); </script>";
  	echo "<script>window.open('LabMicroscopyADD.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabMicroscopy.php','_self');</script>";
} ?>
</body>
</html>