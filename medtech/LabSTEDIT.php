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
            <form action="LabSTINSERTUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<input type="hidden" name="tid" value="<?php echo $trans['TransactionID'] ?>">
						<b><?php echo $trans['TransactionID'] ?></b>
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
            			$itemids = $trans['ItemID'];
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
            <div class="col-6">            	
            	<div class="form-group row">
	            	<div class="col-6 ">
	            		<b>DRUG SCREENING</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Meth" class="col-6 col-form-label text-right">METHAMPHETHAMINE:</label>
	            	<div class="col-4">
	            		<input type="text" name="Meth" class="form-control" id="Meth" value="<?php echo $check['Meth'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Tetra" class="col-6 col-form-label text-right">TETRAHYDROCANABINOL:</label>
	            	<div class="col-4">
	            		<input type="text" name="Tetra" class="form-control" id="Tetra" value="<?php echo $check['Tetra'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="DT" class="col-6 col-form-label text-right">DT RESULT:</label>
	            	<div class="col-4">
	            		<input type="text" name="DT" class="form-control" id="DT" value="<?php echo $check['Drugtest'] ?>">
	            	</div>
				</div>
            </div>
            <div class="col-6">
            	<div class="form-group row">
	            	<div class="col-6 ">
	            		<b>SEROLOGY</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="HBsAg" class="col-6 col-form-label text-right">HBsAg:</label>
	            	<div class="col-4">
	            		<input type="text" name="HBsAg" class="form-control" id="HBsAg" value="<?php echo $check2['HBsAG'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="HBsAg" class="col-6 col-form-label text-right">Anti-HAV:</label>
	            	<div class="col-4">
	            		<input type="text" name="aHav" class="form-control" id="aHav" value="<?php echo $check2['AntiHav'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="SeroOt" class="col-6 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-4">
	            		<input type="text" name="SeroOt" class="form-control" id="SeroOt" value="<?php echo $check2['SeroOt'] ?>">
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
	            					if (is_array($check)) {
					            	 	$dataID = $check['MedID'];	  
					            	 }else{
					            	 	$dataID = $check2['MedID'];
					            	 } 	 
	            					if ($key['personnelID'] == $dataID){
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
	            				if (is_array($check)) {
					            	 	$dataID = $check['QualityID'];	  
					            	 }else{
					            	 	$dataID = $check2['QualityID'];
					            	 } 	 
	            				if ($key['personnelID'] == $dataID){
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
	            				if (is_array($check)) {
					            	 	$dataID = $check['PathID'];	  
					            	 }else{
					            	 	$dataID = $check2['PathID'];
					            	 } 
	            				if ($key['personnelID'] == $dataID){
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

</script>
</html>
<?php }else{
	echo "<script> alert('Error: No existing record found.'); </script>";
  	echo "<script>window.open('LabSeroToxiADD.php?id=$id&tid=$tid','_self');</script>";
}
}else{
	echo "<script> alert('Error: Credential Error'); </script>";
  	echo "<script>window.open('LabSeroToxi.php','_self');</script>";
} ?>