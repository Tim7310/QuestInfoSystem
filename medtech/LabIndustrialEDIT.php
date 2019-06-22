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
	$data = $transac->fetch_data($id, $tid);
	$data2 = $lab->getData($id, $tid, "lab_microscopy");
	$data1 = $lab->getData($id, $tid, "lab_hematology");
	$data3 = $lab->getData($id, $tid, "lab_serology");
	$data4 = $lab->getData($id, $tid, "lab_toxicology");
if(is_array($data) or is_array($data1) or is_array($data3) or is_array($data4)){
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory Sciences Result</title>
	<link rel="icon" type="image/png" href="../assets/qpd.png">
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
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Edit Laboratory Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabIndustrialINSERT.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>Patient ID.: </label><br>
						<input type="hidden" name="id" value="<?php echo $data['PatientID'] ?>">
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction No.: </label><br>
						<input type="hidden" name="tid" value="<?php echo $data['TransactionID'] ?>">
						<b><?php echo $data['TransactionID'] ?></b>	
					</div>
					<div class="col col-md-auto">
						<label>Name:</label><br>
						<input type="hidden" name="lasnam" value="<?php echo $data['LastName'] ?>">
						<input type="hidden" name="firnam" value="<?php echo $data['FirstName'] ?>">
						<input type="hidden" name="midnam" value="<?php echo $data['MiddleName'] ?>">
						<p><b><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
					</div>
					<div class="col col-md-auto">
						<label>Company Name: </label><br>
						<input type="hidden" name="comnam" value="<?php echo $data['CompanyName'] ?>">
						<p><b><?php echo $data['CompanyName'] ?></b></p>
					</div>
					<div class="col col-md-auto">
						<label>Gender:</label><br>
						<p><b><?php echo $data['Gender'] ?></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
   <!--  <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT PACKAGE</b></center></div>
            <div class="card-block">
            	<div class="row">
            		<div class="col col-md-auto">
            			Package: <p><b><?php echo $data['PackName'] ?></b></p>
            		</div>
            		<div class="col col-md-auto">
            			Description: <p><b><?php echo $data['PackList'] ?></b></p>
            		</div>
            		<div class="col col-lg-2">
            			Transaction: <p><b><?php echo $data['trans_type'] ?></b></p>
            		</div>
				</div>
            </div>
        </div>
    </div>	 -->
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>LABORATORY SCIENCES RESULTS</b></center></div>
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
	            	<label for="RedBlood" class="col-3 col-form-label text-right">Red Blood Cells :</label>
	            	<div class="col-2">
	            		<input type="text" name="RedBlood" class="form-control" id="RedBlood" value="<?php echo $data1['CBCRBC'] ?>">
	            	</div>
	            	<label for="RedBlood" class="col-2 col-form-label">x10^9/L</label>
	            	<label for="RedBlood" class="col-2 col-form-label">4.23-11.07</label>
				</div>
				<div class="form-group row">
	            	<label for="Hemoglobin" class="col-3 col-form-label text-right">Hemoglobin :</label>
	            	<div class="col-2">
	            		<input type="text" name="Hemoglobin" class="form-control" id="Hemoglobin" value="<?php echo $data1['Hemoglobin'] ?>">
	            	</div>
	            	<label for="Hemoglobin" class="col-2 col-form-label">g/L</label>
	            	<div class="col-2">
	            		<input type="text" name="HemoNR" class="form-control" id="HemoNR" value="<?php echo $data1['HemoNR'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Hematocrit" class="col-3 col-form-label text-right">Hematocrit :</label>
	            	<div class="col-2">
	            		<input type="text" name="Hematocrit" class="form-control" id="Hematocrit" value="<?php echo $data1['Hematocrit'] ?>">
	            	</div>
	            	<label for="Hematocrit" class="col-2 col-form-label">VF</label>
	            	<div class="col-2">
				 		<input type="text" name="HemaNR" class="form-control" id="HemaNR" value="<?php echo $data1['HemaNR'] ?>">
	            	</div>
				</div>
				<!-- <div class="form-group row">
	            	<div class="col-3 ">
	            		<b>Differential Count</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Neutrophils" class="col-3 col-form-label text-right">Neutrophils :</label>
	            	<div class="col-2">
	            		<input type="text" name="Neutrophils" class="form-control" id="Neutrophils" value="<?php echo $data1['Neutrophils'] ?>">
	            	</div>
	            	<label for="Neutrophils" class="col-2 col-form-label">%</label>
	            	<label for="Neutrophils" class="col-2 col-form-label">34-71</label>
				</div>
				<div class="form-group row">
	            	<label for="Lymphocytes" class="col-3 col-form-label text-right">Lymphocytes :</label>
	            	<div class="col-2">
	            		<input type="text" name="Lymphocytes" class="form-control" id="Lymphocytes" value="<?php echo $data1['Lymphocytes'] ?>">
	            	</div>
	            	<label for="Lymphocytes" class="col-2 col-form-label">%</label>
	            	<label for="Lymphocytes" class="col-2 col-form-label">22-53</label>
				</div>
				<div class="form-group row">
	            	<label for="Monocytes" class="col-3 col-form-label text-right">Monocytes :</label>
	            	<div class="col-2">
	            		<input type="text" name="Monocytes" class="form-control" id="Monocytes" value="<?php echo $data1['Monocytes'] ?>">
	            	</div>
	            	<label for="Monocytes" class="col-2 col-form-label">%</label>
	            	<label for="Monocytes" class="col-2 col-form-label">5-12</label>
				</div> -->
				<div class="form-group row">
	            	<label for="CBCOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="CBCOt" class="form-control" id="CBCOt" value="<?php echo $data1['CBCOt'] ?>">
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
				 	 	<input type="text" name="UriColor" class="form-control" id="UriColor" value="<?php echo $data2['UriColor'] ?>">
	            	</div>
	            	<label for="RBC" class="col-3 col-form-label text-right">RBC :</label>
	            	<div class="col-1">
	            		<input type="text" name="RBC" class="form-control" id="RBC" value="<?php echo $data2['RBC'] ?>">
	            	</div>
	            	<label for="RBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="RBC" class="col-2 col-form-label">0-3</label>
				</div>
				<div class="form-group row">
	            	<label for="UriTrans" class="col-3 col-form-label text-right">Transparency :</label>
	            	<div class="col-2">
				 	 	<input type="text" name="UriTrans" class="form-control" id="UriTrans" value="<?php echo $data2['UriTrans'] ?>">
	            	</div>
	            	<label for="WBC" class="col-3 col-form-label text-right">WBC :</label>
	            	<div class="col-1">
	            		<input type="text" name="WBC" class="form-control" id="WBC" value="<?php echo $data2['WBC'] ?>">
	            	</div>
	            	<label for="WBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="WBC" class="col-2 col-form-label">0-5</label>
				</div>
				<div class="form-group row">
	            	<label for="UriPh" class="col-3 col-form-label text-right">pH :</label>
	            	<div class="col-2">
				 	 	<input type="text" name="UriPh" class="form-control" id="UriPh" value="<?php echo $data2['UriPh'] ?>">
	            	</div>
	            	<label for="ECells" class="col-3 col-form-label text-right">E.Cells:</label>
	            	<div class="col-2">
				 	 	<input type="text" name="ECells" class="form-control" id="ECells" value="<?php echo $data2['ECells'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriSp" class="col-3 col-form-label text-right">Sp. Gravity :</label>
	            	<div class="col-2">
				 	 	<input type="text" name="UriSp" class="form-control" id="UriSp" value="<?php echo $data2['UriSp'] ?>">
	            	</div>
	            	<label for="MThreads" class="col-3 col-form-label text-right">M.Threads:</label>
	            	<div class="col-2">
				 	 	<input type="text" name="MThreads" class="form-control" id="MThreads" value="<?php echo $data2['MThreads'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPro" class="col-3 col-form-label text-right">Protein :</label>
	            	<div class="col-2">
				 	 	<input type="text" name="UriPro" class="form-control" id="UriPro" value="<?php echo $data2['UriPro'] ?>">
	            	</div>
	            	<label for="Bac" class="col-3 col-form-label text-right">Bacteria:</label>
	            	<div class="col-2">
				 	 	<input type="text" name="Bac" class="form-control" id="Bac" value="<?php echo $data2['Bac'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriGlu" class="col-3 col-form-label text-right">Glucose :</label>
	            	<div class="col-2">
	            		<input type="text" name="UriGlu" class="form-control" id="UriGlu" value="<?php echo $data2['UriGlu'] ?>">
	            	</div>
	            	<label for="Amorph" class="col-3 col-form-label text-right">Amorphous:</label>
	            	<div class="col-2">
	            		<input type="text" name="Amorph" class="form-control" id="Amorph" value="<?php echo $data2['Amorph'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="UriOt" class="form-control" id="UriOt" value="<?php echo $data2['UriOt'] ?>">
	            	</div>

	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<input type="text" name="CoAx" class="form-control" id="CoAx" value="<?php echo $data2['CoAx'] ?>">
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
	            		<input type="text" name="Meth" class="form-control" id="Meth" value="<?php echo $data4['Meth'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Tetra" class="col-3 col-form-label text-right">TETRAHYDROCANABINOL:</label>
	            	<div class="col-2">
	            		<input type="text" name="Tetra" class="form-control" id="Tetra" value="<?php echo $data4['Tetra'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="DT" class="col-3 col-form-label text-right">DT RESULT:</label>
	            	<div class="col-2">
	            		<input type="text" name="DT" class="form-control" id="DT" value="<?php echo $data4['Drugtest'] ?>">
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
	            		<input type="text" name="HBsAg" class="form-control" id="HBsAg" value="<?php echo $data3['HBsAG'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="PregTest" class="col-3 col-form-label text-right">PREGNANCY TEST:</label>
	            	<div class="col-2">
	            		<input type="text" name="PregTest" class="form-control" id="PregTest" value="<?php echo $data2['PregTest'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="SeroOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="SeroOt" class="form-control" id="SeroOt" value="<?php echo $data3['SeroOt'] ?>">
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
	            		<input type="text" name="FecColor" class="form-control" id="FecColor" value="<?php echo $data2['FecColor'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-2">
	            		<input type="text" name="FecCon" class="form-control" id="FecCon" value="<?php echo $data2['FecCon'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-2">
	            		<input type="text" name="FecMicro" class="form-control" id="FecMicro" value="<?php echo $data2['FecMicro'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="FecOt" class="form-control" id="FecOt" placeholder="Presence of:" value="<?php echo $data2['FecOt'] ?>">
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
	            					if ($key['personnelID'] == $data2['MedID']){
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
	            				if ($key['personnelID'] == $data2['QualityID']){
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
	            				if ($key['personnelID'] == $data2['PathID']){
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
  	echo "<script>window.open('LabIndustrialADD.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabIndustrial.php','_self');</script>";
} ?></body>
</html>