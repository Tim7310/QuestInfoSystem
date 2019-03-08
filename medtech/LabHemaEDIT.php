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
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Edit Laboratory CBC Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabHemaINSERTUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
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
						<p><b><?php echo $data['LastName'] ?>, <?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
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
	            	<input type="text" name="WhiteBlood"  class="form-control" id="WhiteBlood" value="<?php echo $data['WhiteBlood'] ?>">
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
	            	<input type="text" name="Neutrophils"  class="form-control" id="Neutrophils" value="<?php echo $data['Neutrophils'] ?>">
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
	            	<input type="text" name="Lymphocytes"  class="form-control" id="Lymphocytes" value="<?php echo $data['Lymphocytes'] ?>">
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
	            	<input type="text" name="Monocytes"  class="form-control" id="Monocytes" value="<?php echo $data['Monocytes'] ?>">
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
	            	<input type="text" name="EOS"  class="form-control" id="Eosinophils" value="<?php echo $data['EOS'] ?>">
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
	            	<input type="text" name="BAS"  class="form-control" id="Basophils" value="<?php echo $data['BAS'] ?>">
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
	            	<input type="text" name="CBCRBC"  class="form-control" id="RBC" value="<?php echo $data['CBCRBC'] ?>">
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
	            	<input type="text" name="Hemoglobin"  class="form-control" id="Hemoglobin" value="<?php echo $data['Hemoglobin'] ?>">
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
	            	<input type="text" name="Hematocrit"  class="form-control" id="Hematocrit" value="<?php echo $data['Hematocrit'] ?>">
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
	            	<input type="text" name="PLT"  class="form-control" id="PLATELET" value="<?php echo $data['PLT'] ?>">
	            </div>
	            <div class="col-2">
	            	x10^3/mm3
	            </div>
	            <div class="col-2">
	            	150~400
	            </div>
			</div>
			<div class="form-group row">
	            	<label for="CBCOt" class="col-3 col-form-label">OTHERS/NOTES :</label>
	            	<div class="col-5">
	            		<input type="text" name="CBCOt" class="form-control" id="CBCOt" value="<?php echo $data['CBCOt'] ?>">
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
	            	<input type="text" name="PTime"  class="form-control" id="PTime" value="<?php echo $data['PTime'] ?>">
	            </div>
	             <div class="col-1">
	            	SECS
	            </div>
	              <div class="col-1">
	            	NV :
	            </div>
	            <div class="col-2">
	            	<input type="text" name="PTimeNV"  class="form-control" id="PTimeNV" value="<?php echo $data['PTimeNV'] ?>">
	            </div>
	            <div class="col-2">
	            	SECS
	            </div>
			</div>
			<div class="form-group row">
	            <label for="PTControl" class="col-3 col-form-label">Control :</label>
	            <div class="col-2">
	            	<input type="text" name="PTControl"  class="form-control" id="PTControl" value="<?php echo $data['PTControl'] ?>">
	            </div>
	             <div class="col-1">
	            	SECS
	            </div>
	             <div class="col-1">
	            	NV :
	            </div>
	            <div class="col-2">
	            	<input type="text" name="PTControlNV"  class="form-control" id="PTControlNV" 
	            	value="<?php echo $data['PTControlNV'] ?>">
	            </div>
	            <div class="col-2">
	            	SECS
	            </div>
			</div>
			<div class="form-group row">
	            <label for="ActPercent" class="col-3 col-form-label">% Activity:</label>
	            <div class="col-2">
	            	<input type="text" name="ActPercent"  class="form-control" id="ActPercent" value="<?php echo $data['ActPercent'] ?>">
	            </div>
	            <div class="col-1">
	            	%
	            </div>
	           <div class="col-1">
	            	NV :
	            </div>
	            <div class="col-2">
	            	<input type="text" name="ActPercentNV"  class="form-control" id="ActPercentNV" value="<?php echo $data['ActPercentNV'] ?>">
	            </div>
	            <div class="col-2">
	            	%
	            </div>
			</div>
			<div class="form-group row">
	            <label for="INR" class="col-3 col-form-label">INR</label>
	            <div class="col-2">
	            	<input type="text" name="INR"  class="form-control" id="INR" value="<?php echo $data['INR'] ?>">
	            </div>
	             <div class="col-1">
	            	
	            </div>
	           <div class="col-1">
	            	NV :
	            </div>
	            <div class="col-2">
	            	<input type="text" name="INRNV"  class="form-control" id="INRNV" value="<?php echo $data['INRNV'] ?>">
	            </div>
			</div>
			<div class="form-group row">
	            <label for="PR1.31" class="col-3 col-form-label">PR1.31</label>
	            <div class="col-2">
	            	<input type="text" name="PR131"  class="form-control" id="PR1.31" value="<?php echo $data['PR131'] ?>">
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
	            	<input type="text" name="APTTime"  class="form-control" id="APTTime" value="<?php echo $data['APTTime'] ?>">
	            </div>
	           <div class="col-1">
	            	SECS
	            </div>
	              <div class="col-1">
	            	NV :
	            </div>
	            <div class="col-2">
	            	<input type="text" name="APTTimeNV"  class="form-control" id="APTTimeNV" value="<?php echo $data['APTTimeNV'] ?>">
	            </div>
	            <div class="col-2">
	            	SECS
	            </div>
			</div>
			<div class="form-group row">
	            <label for="APTControl" class="col-3 col-form-label">Control :</label>
	            <div class="col-2">
	            	<input type="text" name="APTControl"  class="form-control" id="APTControl" value="<?php echo $data['APTControl'] ?>">
	            </div>
	            <div class="col-1">
	            	SECS
	            </div>
	             <div class="col-1">
	            	NV :
	            </div>
	            <div class="col-2">
	            	<input type="text" name="APTControlNV"  class="form-control" id="APTControlNV" value="<?php echo $data['APTControlNV'] ?>">
	            </div>
	            <div class="col-2">
	            	SECS
	            </div>
			</div>
			<div class="form-group row">
	            <label for="MS" class="col-3 col-form-label"><b>Malarial Smear :</b></label>
	            <div class="col-2">
	            	<input type="text" name="MS"  class="form-control" id="MS" value="<?php echo $data['MS'] ?>">
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
<?php }else{
	echo "<script> alert('Error: No existing record found.'); </script>";
  	echo "<script>window.open('LabHemaADD.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabHema.php','_self');</script>";
} ?>
</body>
</html>