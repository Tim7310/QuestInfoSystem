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
	$check =  $lab->getData($id, $tid, "lab_microscopy");
if (!is_array($check)) {
	

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory Clinical Microscopy</title>
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
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Add Laboratory Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabMicroscopyINSERTUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<input type="hidden" name="tid" value="<?php echo $trans['TransactionID'] ?>">
						<b><?php echo $trans['TransactionID'] ?></b>
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
	            		<b>Physical/Macroscopic</b>
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
	            		<SELECT class="form-control" name="UriColor" id="UriColor">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="STRAW">STRAW</OPTION>
				 	 		<OPTION value="LIGHT YELLOW">LIGHT YELLOW</OPTION>
				 	 		<OPTION value="YELLOW">YELLOW</OPTION>
				 	 		<OPTION value="DARK YELLOW">DARK YELLOW</OPTION>
				 	 		<OPTION value="RED">RED</OPTION>
				 	 		<OPTION value="ORANGE">ORANGE</OPTION>
				 	 		<OPTION value="AMBER">AMBER</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="RBC" class="col-3 col-form-label text-right">RBC :</label>
	            	<div class="col-1">
	            		<input type="text" name="RBC" class="form-control" id="RBC">
	            	</div>
	            	<label for="RBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="RBC" class="col-2 col-form-label">0-3</label>
				</div>
				<div class="form-group row">
	            	<label for="UriTrans" class="col-3 col-form-label text-right">Transparency :</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="UriTrans" id="UriTrans">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="CLEAR">CLEAR</OPTION>
				 	 		<OPTION value="HAZY">HAZY</OPTION>
				 	 		<OPTION value="SL. TURBID">SL. TURBID</OPTION>
				 	 		<OPTION value="TURBID">TURBID</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="WBC" class="col-3 col-form-label text-right">WBC :</label>
	            	<div class="col-1">
	            		<input type="text" name="WBC" class="form-control" id="WBC">
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
	            		<SELECT class="form-control" name="UriPh" id="UriPh">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="5.0">5.0</OPTION>
				 	 		<OPTION value="6.0">6.0</OPTION>
				 	 		<OPTION value="6.5">6.5</OPTION>
				 	 		<OPTION value="7.0">7.0</OPTION>
				 	 		<OPTION value="7.5">7.5</OPTION>
				 	 		<OPTION value="8.0">8.0</OPTION>
				 	 		<OPTION value="8.5">8.5</OPTION>
				 	 		<OPTION value="9.0">9.0</OPTION>
				 	 		<OPTION value="9.5">9.5</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="ECells" class="col-3 col-form-label text-right">E.Cells:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="ECells" id="ECells">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriSp" class="col-3 col-form-label text-right">Sp. Gravity :</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="UriSp" id="UriSp">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="1.000">1.000</OPTION>
				 	 		<OPTION value="1.005">1.005</OPTION>
				 	 		<OPTION value="1.010">1.010</OPTION>
				 	 		<OPTION value="1.015">1.015</OPTION>
				 	 		<OPTION value="1.020">1.020</OPTION>
				 	 		<OPTION value="1.025">1.025</OPTION>
				 	 		<OPTION value="1.030">1.030</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="MThreads" class="col-3 col-form-label text-right">M.Threads:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="MThreads" id="MThreads">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPro" class="col-3 col-form-label text-right">Protein :</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="UriPro">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="Bac" class="col-3 col-form-label text-right">Bacteria:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="Bac" id="Bac">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriGlu" class="col-3 col-form-label text-right">Glucose :</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="UriGlu" id="UriGlu">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="Amorph" class="col-3 col-form-label text-right">Amorphous:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="Amorph" id="Amorph">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="LE" class="col-3 col-form-label text-right">Leukocyte Esterase:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="LE" id="LE">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="CoAx" id="CoAx">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="NIT" class="col-3 col-form-label text-right">Nitrite:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="NIT" id="NIT">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Positive">Positive</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="URO" class="col-3 col-form-label text-right">Urobilinogen:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="URO" id="URO">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BLD" class="col-3 col-form-label text-right">Blood:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="BLD" id="BLD">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="KET" class="col-3 col-form-label text-right">Ketone:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="KET" id="KET">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BIL" class="col-3 col-form-label text-right">Bilirubin:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="BIL" id="BIL">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="UriOt" class="form-control" id="UriOt">
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
	            		<SELECT class="form-control" name="FecColor" id="FecColor">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="GREEN">GREEN</OPTION>
				 	 		<OPTION value="YELLOW">YELLOW</OPTION>
				 	 		<OPTION value="LIGHT BROWN">LIGHT BROWN</OPTION>
				 	 		<OPTION value="BROWN">BROWN</OPTION>
				 	 		<OPTION value="DARK BROWN">DARK BROWN</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-4">
	            		<SELECT class="form-control" name="FecCon" id="FecColor">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="FORMED">FORMED</OPTION>
				 	 		<OPTION value="SEMI-FORMED">SEMI-FORMED</OPTION>
				 	 		<OPTION value="SOFT">SOFT</OPTION>
							<OPTION value="WATERY">WATERY</OPTION>
				 	 		<OPTION value="SLIGHTLY MUCOID">SLIGHTLY MUCOID</OPTION>
				 	 		<OPTION value="MUCOID">MUCOID</OPTION>
				 	 		
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-4">
	            		<input type="text" name="FecMicro" class="form-control" id="FecMicro">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-4">
	            		<input type="text" name="FecOt" class="form-control" id="FecOt" placeholder="Presence of:">
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>PREGNANCY TEST</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">Pregnancy Test Result : </label>
	            	<div class="col-4">
	            		<input type="text" name="pregTest" class="form-control" >
	            	</div>
				</div>
				<!-- AFB Stain -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>AFB</b>
	            	</div>
	            	<div class="col-2"><center><b>Specimen 1</b></center></div>
	            	<div class="col-2"><center><b>Specimen 2</b></center></div>
				</div>
				<div class="form-group row">
	            	<label class="col-3 col-form-label text-right">Visual Appearance : </label>
	            	<div class="col-2">
	            		<input type="text" name="AFBVA1" class="form-control" >
	            	</div>
	            	<div class="col-2">
	            		<input type="text" name="AFBVA2" class="form-control" >
	            	</div>
				</div>
				<div class="form-group row">
	            	<label class="col-3 col-form-label text-right">Reading : </label>
	            	<div class="col-2">
	            		<input type="text" name="AFBR1" class="form-control" >
	            	</div>
	            	<div class="col-2">
	            		<input type="text" name="AFBR2" class="form-control" >
	            	</div>
				</div>
				<div class="form-group row">
					<label class="col-3 col-form-label text-right">Diagnosis : </label>
	            	<div class="col-4">
	            		<input type="text" name="AFBD" class="form-control" >
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="OccultBLD" class="col-3 col-form-label "><b>Occult Blood Test: </b></label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="OccultBLD" id="OccultBLD">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Positive">Positive</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
			<div class="form-group row">
				<div class="col">
					<?php if($trans['TransactionType'] == 'CASH'){ ?>
						<input type="text" name="Clinician" class="form-control" value ='<?php echo $trans['Biller'] ?> '>
					<?php }else{ ?>  
						<input type="text" name="Clinician" class="form-control" value ='' placeholder="Clinician/Walk-In">
					<?php } ?>  
	            </div>
	            <div class="col">
	            	<select class="form-control" name="MedTechID">
	            		<?php  
	            			$medtech = $lab->medtech();
	            				foreach ($medtech as $key) {
	            				
	            		?>
						<option value="<?php echo $key['personnelID'] ?>">
							<?php echo $key['FirstName']." ".$key['MiddleName']." ".$key['LastName'].", ".$key['PositionEXT']?>	
						</option>
					<?php } ?>
					</select>
	            	
	            </div>
	            <div class="col">
	            	<select class="form-control" name="qcID">
	            		<?php  
	            				foreach ($medtech as $key) {
	            				
	            		?>
						<option value="<?php echo $key['personnelID'] ?>">
							<?php echo $key['FirstName']." ".$key['MiddleName']." ".$key['LastName'].", ".$key['PositionEXT']?>	
						</option>
					<?php } ?>
					</select>
	            </div>
	            <div class="col">
	            	<select class="form-control" name="pathID">
	            		<?php  
	            				foreach ($medtech as $key) {
			            			if($key['LicenseNO'] == '0073345'){
			            				$select = 'selected';
	        	    				}else{
	        	    					$select = '';
	        	    				}
	            				
	            		?>
						<option value="<?php echo $key['personnelID'] ?>" <?php echo $select ?>>
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
<?php }else{
	echo "<script> alert('Error: This patient was already had record.'); </script>";
  	echo "<script>window.open('LabMicroscopyView.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabMicroscopy.php','_self');</script>";
}

 ?>
</body>
</html>