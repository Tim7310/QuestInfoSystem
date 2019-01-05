<?php
include_once('connection.php');
include_once('classes/patient.php');
include_once('classes/lab.php');
$lab = new lab;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$res = $lab->fetch_data($id);
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Referral Form</title>

<link rel="stylesheet" media="all" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php
include_once('sidebar.php');
?>

<body >
<div class="container" style="padding-left: 200px">
<div class="Col-sm-12" style="background-image: url(MedCert101.jpg); height: 1100px; width: 850px; border: 1px solid black; background-repeat: no-repeat; background-position: top;">
	<div class="col-sm-12"><br><br><br><br>
		<div class="col-sm-6"><br><br></div>
		<div class="col-sm-6" style="padding-left: 0px; padding-bottom: 0px; text-transform: uppercase;">
			<?php echo $data['lasnam'] ?>, <?php echo $data['firnam'] ?> <?php echo $data['midnam'] ?> <b><i><?php echo $data['Code'] ?></i></b>
		</div>
	</div>
		<div class="col-sm-12">
		<div class="col-sm-6"></div>
		<div class="col-sm-6" style="padding-left: 50px; padding-bottom: 0px"><?php echo $data['comnam'] ?></div>
	</div>
	<font face="Consolas" size="1px" color="black">
		<div class="col-sm-12"><br><br><br><br><br><br><br><br><br><br><br>
			<div class="col-sm-4" style="padding-left: 6px; padding-bottom: 0px; letter-spacing: 0px ">
				HEMATOLOGY<br>
				<div class="col-sm-7" style="padding-left: 0px; padding-bottom: 0px; letter-spacing: 0px ">
				Complete Blood Count
				</div>
				<div class="col-sm-5">
				Normal Range
				</div>
				<div class="col-sm-4" style="padding-left: 0px; position: left">
				WhiteBlood:
				</div>
				<div class="col-sm-8" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['WhiteBlood'] ?></u>&nbsp;x10^9/L&nbsp;&nbsp; 4.23-11.07
				</div>
				<div class="col-sm-4" style="padding-left: 0px; position: left">
				Hemoglobin:
				</div>
				<div class="col-sm-8" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['Hemoglobin'] ?></u>&nbsp;&nbsp;&nbsp;g/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; M:137-175
				</div>
				<div class="col-sm-4" style="padding-left: 0px; position: left">
				Hematocrit:
				</div>
				<div class="col-sm-8" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['Hematocrit'] ?></u>&nbsp;&nbsp;VF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; M:0.40-0.51
				</div>
				<div class="col-sm-12" style="padding-left: 0px; padding-bottom: 0px; letter-spacing: 0px ">
				Diffirential Count
				</div>
				<div class="col-sm-4" style="padding-left: 0px; position: left">
				Neutrophils:
				</div>
				<div class="col-sm-8" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['Neutrophils'] ?></u>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 34-71
				</div>
				<div class="col-sm-4" style="padding-left: 0px; position: left">
				Lymphocytes:
				</div>
				<div class="col-sm-8" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['Lymphocytes'] ?></u>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 22-53
				</div>
				<div class="col-sm-4" style="padding-left: 0px; position: left">
				Monocytes:
				</div>
				<div class="col-sm-8" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['Monocytes'] ?></u>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5-12
				</div>
				<div class="col-sm-12" style="padding-left: 0px; padding-bottom: 0px; letter-spacing: 0px ">
				DRUG SCREENING
				</div>
				<div class="col-sm-7" style="padding-left: 0px; position: left">
				METHAMPETHAMINE:
				</div>
				<div class="col-sm-5" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['Meth'] ?></u>
				</div>
				<div class="col-sm-7" style="padding-left: 0px; position: left">
				TETRAHYDROCANABINOL:
				</div>
				<div class="col-sm-5" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['Tetra'] ?></u>
				</div>
			</div>
			<div class="col-sm-2" style="padding-left: 6px; padding-bottom: 0px; letter-spacing: 0px ">
			SEROLOGY
				<div class="col-sm-12" style="padding-left: 0px; position: left">
				HBsAg:
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['HBsAg'] ?></u>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
				PREGNANCY TEST:
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['PregTest'] ?></u>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
				FECALISYS<br>
				COLOR:
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['FecColor'] ?></u>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
				CONSISTENCY:
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['FecCon'] ?></u>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
				MICROSCOPIC FINDINGS:
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: center; letter-spacing: 0px; font-weight: bold; ">
				<u><?php echo $res['FecMicro'] ?></u>
				</div>
			</div>
			<div class="col-sm-3" style="padding-left: 6px; padding-bottom: 0px; letter-spacing: 0px ">
			CLINICAL MICROSCOPY<br>
			Complete Urinalysis<br>
			Physical/Chemical<br>
				<div class="col-sm-12" style="padding-left: 0px; padding-right: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">Color:</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['UriColor'] ?></u></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">Transparency:</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['UriTrans'] ?></u></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">ph</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['UriPh'] ?></u></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">Sp.Gravity</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['UriSp'] ?></u></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">Protein</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['UriPro'] ?></u></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">Glucose</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['UriGlu'] ?></u></div>
				</div>
			</div>
			<div class="col-sm-3" style="padding-left: 6px; padding-bottom: 0px; letter-spacing: 0px "><br><br>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">Micro</div>
					<div class="col-sm-6" style="padding-left: 40px">Normal</div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">RBC</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['RBC'] ?></u>/hpf 0-3</div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">WBC</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['WBC'] ?></u>/hpf 0-5<br><br><br></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">E.Cells</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['ECells'] ?></u></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">Amorphous</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['Amorph'] ?></u></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">M.Threads</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['MThreads'] ?></u></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">Bacteria</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['Bac'] ?></u></div>
				</div>
				<div class="col-sm-12" style="padding-left: 0px; position: left">
					<div class="col-sm-6" style="padding-left: 0px; position: left">CoAx</div>
					<div class="col-sm-6" style="padding-left: 0px; position: left"><u><?php echo $res['CoAx'] ?></u></div>
				</div>


			</div>





		</div>
	</font>
</div>
</div>
<?php }?>
<?php }?>
</body>
</html>