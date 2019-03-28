<?php
include_once('../connection.php');
include_once('../classes/transVal.php');
include_once('../classes/patient.php');
include_once('../classes/qc.php');
include_once('../classes/lab.php');
date_default_timezone_set("Asia/Kuala_Lumpur");
$printdate = date("Y-m-d H:i:s");

$id = 4;
$lab = new lab;
$pat = new Patient;
$qclass = new qc;
$pd = $pat->fetch_data($id);
//$ld = $lab->fetch_data2($pd['PatientID']);
//$qc = $qclass->fetch_data($id);

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FORM</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
    <link href="../source/formstyle.css" media="all" rel="stylesheet"/>
	
</head>
<style type="text/css">
</style>

<body >
<div class="container-fluid ">
<div class="col-md-10" style="margin-top: 5px;">
	<img src="../assets/QPDHeader.jpg" height="100px" width="100%">
</div>
<div class="col-md-10">
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
	<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div>
	<div class="card-block">
	<div class="row">
	    <div class="col-1"><p class="labelName">Name:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $pd['LastName'] ?>,<?php echo $pd['FirstName'] ?> <?php echo $pd['MiddleName'] ?>
	        </span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Lab Number:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $ld['LabID'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col-1"><p class="labelName">Gender:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $pd['Gender'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">QuestID:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $pd['PatientID'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col-1"><p class="labelName">Age:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $pd['Age'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Clinician:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $ld['Clinician'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col col-sm-auto"><p class="labelName">Date Received:</p></div>
	    <div class="col col-sm-auto">
	        <u><?php echo $ld['CreationDate'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Reported:</p>
	    </div>
	    <div class="col col-sm-auto">
	        <u><?php echo $ld['DateUpdate'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Printed:</p>
	    </div>
	    <div class="col col-sm-auto">
	        <u><?php echo $printdate ?></u>
	    </div>
	</div>
	</div>
	</div>
</div>
<!--Footer-->
<div style="position: absolute;margin-top: 750px;">
	<div class="col-md-10 ">
	<span style="font-size: 12px;">Note: Specimen rechecked, result/s verified.</span>
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-block" style="height: 1.3in;" >
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $ld['Received'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $qc['qc'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $ld['Printed'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $ld['RMTLIC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $qc['QCLIC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $ld['PATHLIC'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
					<div class="col"><center><p class="labelName">Quality Control</p></center></div>
					<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
				</div>
		</div>
	</div>
	</div>
	<div class="col-md-10">
		<img src="../assets/QPDFooter.jpg" height="50px" width="100%">
	</div>
</div>
<!-- Footer End -->
<div class="col-md-10 ">
			<div class="row">

				<div class="col-md-4">
				
					<span style="font-size: 16px;"><b>Source:</b>&nbsp&nbsp&nbsp<b>Cervival</b> &nbsp&nbsp&nbsp<b>Vaginal</b></span>	
				
						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;"><b>SPECIMEN ADEQUACY:</b></span>
						</div>	

						<div class="row" >
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Satisfactory for evaluation</span>
						</div>

						<div class="row" >
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Satisfactory but limited by:</span>
						</div>


						<div class="row" >
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Unsatisfactory due to:</span>
						</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Lack of clinical data</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Obscuring blood</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Obscuring inflammation</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Contaminants</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Absence of endocervical cells</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Poor fixation	</span>
							</div>



						<br><div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;"><b>GENERAL CATEGORIZATION:</b></span>
						</div>	

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Within normal limits</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Benign cellular changes</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Epithelial cell abnormalities</span>
							</div>

						<br><div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;"><b>DESCRIPTIVE DIAGNOSIS</b></span>
						</div>	

						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;"><b>BENIGN CELLULAR CHANGES</b></span>
						</div>	

						<div class="row" >
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Infection</span>
						</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">TRichomonas vaginalis</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Fungus consistent with Candida sp.</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">H.simplex changes</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Coccobacilli consistent with G. vaginalis</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Others:</span>
							</div>

						
				</div>

				<div class="col-md-4">

						<div class="row" >
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Reactive changes</span>
						</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Non specific inflammation</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Atrophy with inflammation</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Radiation</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">IUD</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Squamous metaplasia</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Others: </span>
								</div>

						<br><div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;"><b>EPITHELIAL CELL ABNORMALITIES</b></span>
						</div>		

						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;"><b>SQUAMOUS CELLS</b></span>
						</div>		

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Atypical cells of undetermined significance</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Low grade intraepithelial lesion</span>
							</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">HPV associative changes</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">CIN 1 (Mild dysplasia)</span>
								</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">High grade intraepithelial -lesion</span>
							</div>	


								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">CIN 2 (Moderate dysplasia)</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">CIN 3 (Severe dysplasia)</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Carcinoma-in-situ</span>
								</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Squamous cell carcinoma</span>
							</div>	
									
							<br><div class="row">
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;"><b>GRANDULAR CELLS:</b></span>
							</div>	

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Benign endometrial cells in menopause</span>
								</div>	

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Atypical cells of undetermined significance</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Endocervical adenocarcinoma</span>
								</div>

								<div class="row" >
								&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Endometrial adenocarcinoma</span>
								</div>

				</div>		

				<div class="col-md-4">	

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Extra-uterine adenocarcinoma</span>
							</div>

							<div class="row" >
							&nbsp&nbsp&nbsp&nbsp<span style="font-size: 14px; font-family:Century Gothic;">Not able to specify</span>
							</div>

							

						<br><div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;"><b>HORMONAL EVALUATION</b></span>
						</div>		

						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;"><b>MATURATION INDEX:&nbsp _%/&nbsp _%/ &nbsp_%/</b></span>
						</div>	

						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">Compatible with age and history</span>
						</div>	

						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">Incompatible with age and history</span>
						</div>	

						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">Evaluation not possible due to:</span>
						</div>	

							<div class="row">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">Cervical specimen</span>
							</div>	

							<div class="row">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">Inflammation</span>
							</div>	

							<div class="row">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">Obscuring blood</span>
							</div>	

							<div class="row">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">Lack of clinical data</span>
							</div>	

							<div class="row">
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">Others </span>
							</div>	

						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">Maturation index is not warranted;</span>
						</div>	

						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">&nbsp&nbsp<b>Cellular proportion is:</b></span>
						</div>	

						<div class="row">
						&nbsp&nbsp&nbsp&nbsp<span style="font-size: 15px; font-family:Century Gothic;">&nbsp0 Parabasal &nbsp +2 Intermediate &nbsp +3 Superficial</span>
						</div>	


	
				</div>	

	
		
</div>
</div>
</body>
</html>