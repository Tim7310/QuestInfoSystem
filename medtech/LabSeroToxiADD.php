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
	
if (!is_array($check) and !is_array($check2)) {


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
	select,input{
		font-size: 14px !important;
		font-weight: bold;
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
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Add Laboratory Chemistry Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabSTINSERTUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>Patient ID.: </label><br>
						<input type="hidden" name="PatientID" value="<?php echo $data['PatientID'] ?>">
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<input type="hidden" name="tid" value="<?php echo $trans['TransactionID'] ?>">
						<b><?php echo $trans['TransactionID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction Date.: </label><br>
						<input type="hidden" value="<?php echo $trans['TransactionDate'] ?>">
						<b><?php echo $trans['TransactionDate'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Name:</label><br>
						<!-- <input type="hidden" name="pid" value="<?php echo $data['PatientID'] ?>"> -->
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
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-8">            	
            	<div class="form-group row">
	            	<div class="col-6 ">
	            		<b>DRUG SCREENING</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Meth" class="col-5 col-form-label text-right">METHAMPHETHAMINE:</label>
	            	<div class="col-4">
	            		<SELECT class="form-control" name="Meth" id="Meth">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Tetra" class="col-5 col-form-label text-right">TETRAHYDROCANABINOL:</label>
	            	<div class="col-4">
	            		<SELECT class="form-control" name="Tetra" id="Tetra">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="DT" class="col-5 col-form-label text-right">DT RESULT:</label>
	            	<div class="col-4">
	            		<SELECT class="form-control" name="DT" id="DT">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
            </div>
    	</div>
    </div>
    <div class="container-fluid">
    	<div class="form-group row">
        	<div class="col-6 ">
        		<b>SEROLOGY</b>
        	</div>
		</div>
        <div class="row">
            <div class="col-6">
				<div class="form-group row">
	            	<label for="HBsAg" class="col-5 col-form-label text-right"><b>HBsAg:</b></label>
	            	<div class="col-4">
	            		<SELECT class="form-control" name="HBsAg" id="HBsAg">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NONREACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="HBsAg" class="col-5 col-form-label text-right"><b>Anti-HAV:</b></label>
	            	<div class="col-4">
	            		<SELECT class="form-control" name="aHav" id="aHav">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NONREACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="HBsAg" class="col-5 col-form-label text-right"><b>VDRL/RPR:</b></label>
	            	<div class="col-4">
	            		 <SELECT class="form-control" name="VDRL" id="VDRL">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NONREACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
		            <label for="PSA" class="col-5 col-form-label text-right"><b>PSA :</b></label>
		            <div class="col-3">
		            	<input type="text" name="PSA"  class="form-control" id="PSA">
		            </div>
		            <div class="col-4">
		            	ng/mL 0-4
		            </div>
				</div>
				<!-- added -->
				<div class="form-group row">
					<label  class="col-3 col-form-label"><b>TYPHIDOT :</b></label>
	            	<label for="TYDOTIgM" class="col-2 col-form-label text-right">IgM :</label>
	            	<div class="col-4">
	            		<SELECT class="form-control" name="TYDOTIgM" id="TYDOTIgM">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
	            	</div>	    
				</div>
				<div class="form-group row">
					<label for="TYDOTIgG" class="col-5 col-form-label text-right">IgG :</label>
	            	<div class="col-4">	       
	            		<SELECT class="form-control" name="TYDOTIgG" id="TYDOTIgG">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
		            <label for="CEA" class="col-5 col-form-label text-right"><b>CEA:</b></label>
		            <div class="col-3">
		            	<input type="text" name="CEA"  class="form-control" id="CEA">
		            </div>
		            <div class="col-4">
		            	ng/mL 0-5
		            </div>
				</div>
				<div class="form-group row">
		            <label for="AFP" class="col-5 col-form-label text-right"><b>AFP:</b></label>
		            <div class="col-3">
		            	<input type="text" name="AFP"  class="form-control" id="AFP">
		            </div>
		            <div class="col-4">
		            	IU/mL 0.5-5.5
		            </div>
				</div>
				<div class="form-group row">
		            <label for="CA125" class="col-5 col-form-label text-right"><b>CA125:</b></label>
		            <div class="col-3">
		            	<input type="text" name="CA125"  class="form-control" id="CA125">
		            </div>
		            <div class="col-4">
		            	U/mL 0-35
		            </div>
				</div>
				<div class="form-group row">
		            <label for="CA19" class="col-5 col-form-label text-right"><b>CA19-9:</b></label>
		            <div class="col-3">
		            	<input type="text" name="CA19"  class="form-control" id="CA19">
		            </div>
		            <div class="col-4">
		            	U/mL 0-39
		            </div>
				</div>
				<div class="form-group row">
		            <label for="CA15" class="col-5 col-form-label text-right"><b>CA15-3:</b></label>
		            <div class="col-3">
		            	<input type="text" name="CA15"  class="form-control" id="CA15">
		            </div>
		            <div class="col-4">
		            	U/mL 0-25
		            </div>
				</div>
				<div class="form-group row">
	            	<label for="SeroOt" class="col-6 col-form-label text-right"><b>OTHERS/NOTES :</b></label>
	            	<div class="col-4">
	            		<input type="text" name="SeroOt" class="form-control" id="SeroOt">
	            	</div>
				</div>
            </div>
            <div class="col-6">           	
            	<div class="form-group row">
	            	<label for="AntiHBS" class="col-6 col-form-label text-right"><b>Anti-HBS:</b></label>
	            	<div class="col-4">
	            		 <SELECT class="form-control" name="AntiHBS" id="AntiHBS">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NON-REACTIVE">NON-REACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>	
				<div class="form-group row">
	            	<label for="HBeAG" class="col-6 col-form-label text-right"><b>HBeAG:</b></label>
	            	<div class="col-4">
	            		 <SELECT class="form-control" name="HBeAG" id="HBeAG">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NONREACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>	
				<div class="form-group row">
	            	<label for="AntiHBE" class="col-6 col-form-label text-right"><b>Anti-Hbe:</b></label>
	            	<div class="col-4">
	            		 <SELECT class="form-control" name="AntiHBE" id="AntiHBE">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NONREACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="AntiHBC" class="col-6 col-form-label text-right"><b>Anti-Hbc:</b></label>
	            	<div class="col-4">
	            		 <SELECT class="form-control" name="AntiHBC" id="AntiHBC">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NONREACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="row ">
					<label  class="col-4 col-form-label mt-4"><b>THYROID :</b></label>
				</div>
				<div class="form-group row">
		            <label for="TSH" class="col-5 col-form-label text-right">TSH:</label>
		            <div class="col-3">
		            	<input type="text" name="TSH"  class="form-control" id="TSH">
		            </div>
		            <div class="col-4">
		            	uIU/mL 0.4-5.0
		            </div>
				</div>
				<div class="form-group row">
		            <label for="FT3" class="col-5 col-form-label text-right">FT3:</label>
		            <div class="col-3">
		            	<input type="text" name="FT3"  class="form-control" id="FT3">
		            </div>
		            <div class="col-4">
		            	<!-- ng/dL 1.4-4.2 -->
						ng/dL 0.52 - 1.85
		            </div>
				</div>
				<div class="form-group row">
		            <label for="FT4" class="col-5 col-form-label text-right">FT4:</label>
		            <div class="col-3">
		            	<input type="text" name="FT4"  class="form-control" id="FT4">
		            </div>
		            <div class="col-4">
		            	<!-- ng/dL 0.8-4.2 -->
						ng/dL 4.4 - 11.6
		            </div>
				</div>
				<div class="row ">
					<label  class="col-12 col-form-label "><b>C-Reactive Protein :</b></label>
				</div>
				<div class="form-group row">
		            <label for="CRPDil" class="col-5 col-form-label text-right">Dilution:</label>
		            <div class="col-3">
		            	<input type="text" name="CRPDil"  class="form-control" id="CRPDil">
		            </div>
				</div>
				<div class="form-group row">
		            <label for="CRPRes" class="col-5 col-form-label text-right">Result:</label>
		            <div class="col-3">
		            	<input type="text" name="CRPRes"  class="form-control" id="CRPRes">
		            </div>
		             <div class="col-4">
		            	< 6 mg/L
		            </div>
				</div>
				<div class=" row">
	            	<label class="col-6 col-form-label"><b>Human Immunodeficiency Viruses ( HIV ):</b></label>	  
				</div>
				<div class="form-group row">
	            	<label for="HIV1" class="col-5 col-form-label text-right">Test 1:</label>
	            	<div class="col-4">
	            		 <SELECT class="form-control" name="HIV1" id="HIV1">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NONREACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="HIV2" class="col-5 col-form-label text-right">Test 2:</label>
	            	<div class="col-4">
	            		 <SELECT class="form-control" name="HIV2" id="HIV2">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NONREACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
            </div>
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
</body>
<script type="text/javascript">
	$(document).ready(function(){
		

	});
</script>
</html>
<?php }else{
	echo "<script> alert('Error: This patient was already had record.'); </script>";
  	echo "<script>window.open('LabSTView.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabSeroToxi.php','_self');</script>";
}