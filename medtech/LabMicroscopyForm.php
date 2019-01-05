<?php
	include_once('../connection.php');
	include_once('../classes/trans.php');
	include_once('../classes/qc.php');
	include_once('../classes/lab.php');
	include_once('../classes/patient.php');
	$printdate = date("Y-m-d H:i:s");
	$lab = new lab;
	$tid = $_GET['tid'];
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$data = $lab->fetch_data($id,$tid);

	$qc = new qc;
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$data1 = $qc->fetch_data($id,$tid);

	$transac = new trans;
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$trans = $transac->fetch_data($id,$tid);

	$patient = new Patient;
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$pat = $patient->fetch_data($id);


	$FecColor = $data['FecColor'];
	$FecCon = $data['FecCon'];
	$FecMicro = $data['FecMicro'];

	// $qc = new qc;
	// if (isset($_GET['id'])){
	// 	$id = $_GET['id'];
	// 	$data1 = $qc->fetch_data($id,$tid);	
	//$pd = $pat->fetch_data($id);
	//$ld = $lab->fetch_data2($pd['PatientID']);
	//$qc = $qclass->fetch_data($id, $tid);
?>
<style type="text/css" media="all">
.card-header
{
	font-family: "Times New Roman";
	font-size: 18px;
	color: white;
	background-color: #104E8B;
	padding: 0px;
	margin: 0px;
}

.card-block
{
	padding-top: 0px;
	padding-bottom: 0px;
}

.line
{
	font-family: "Garamond";
	display: table-cell;
	width: 1000px;
	height: 24px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}
.lineRes
{
	font-family: "Garamond";
	display: table-cell;
	width: 50px;
	height: 18px;
	line-height: 18px;
	font-size: 18px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}
.lineRes1
{
	font-family: "Garamond";
	display: table-cell;
	width: 300px;
	height: 18px;
	line-height: 18px;
	font-size: 18px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}

.label
{
	font-family: "Garamond";
	font-size: 18px;
	color: #02005b;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:16px;

	
}
.lineName
{
	font-family: "Garamond";
	font-size: 18px;
	text-transform: uppercase;
	color: #000000;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height: 18px;
	
}
.labelName
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height: 18px;
}
.para
{
	font-family: "Garamond";
	font-size: 14px;
	color: #104E8B;
	line-height: 14px;
	padding: 0px;
	margin: 0px;
}
.Names
{
	font-family: "Garamond";
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height:18px;
	color: #000000;
}
.lineNameSig
{
	font-family: "Garamond";
	display: table-cell;
	width: 500px;
	height: 16px;
	border-bottom: 1px solid black;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 1px;
	margin: 1px;
	line-height:3px;
	color: #000000;
	
}


.label1
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:0px;
	

}
.col, .col-1, .col-2, .col-3, .col-4, .col-5 .col-6
{
	padding-left: 0px;
	margin-left: 0px;
}

.col u
{
	font-family: "Garamond";
	text-transform: uppercase;
	font-weight: bolder;
	
}
.dashedhr
{
	background-color: #fff;
	border-top: 2px dashed #8c8b8b;
	line-height: 2px;

}
.cert
{
	font-family: "Garamond";
	font-size: 24px;
	color: #104E8B;
	font-weight: bolder;
	line-height: 24px;
}

.cert u
{
	color: black;
}
</style>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lab Microscopy Form</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
    <link href="../source/formstyle.css" media="all" rel="stylesheet"/>
<!-- 	<script type="text/javascript">
	window.onload = function() 
	{ 

		var FecColor = "<?php echo $FecColor ?>";
		var FecCon = "<?php echo $FecCon ?>";
		var FecMicro = "<?php echo $FecMicro ?>";
		if ( FecCon == "") 
		{
			var div = document.getElementById("checkFecalysis");
			div.remove();
		}

	

}
		
	</script> -->
</head>
<style type="text/css">
</style>

<body >
<div class="container-fluid ">
<div class="col-md-14" style="margin-top: 5px;">
	<img src="../assets/QPDHeader.jpg" height="100px" width="100%">
</div>
<div class="col-md-14">
	<div class="card" style="border-radius: 0px; border: 3px solid #104E8B; margin-top: 10px;">
	<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div>
	<div class="card-block" >
	<div class="row" >
	    <div class="col-1" ><p class="labelName">Name:</p></div>
	    <div class="col-6"  >
	        <span class="lineName" ><?php echo $pat['LastName'] ?>,<?php echo $pat['FirstName'] ?> <?php echo $pat['MiddleName'] ?>
	        </span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Lab Number:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['LabID'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Gender:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $pat['Gender'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">QuestID:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $pat['PatientID'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Age:</p></div>
	    <div class="col-6" style="margin-top: 10px;">
	        <span class="lineName"><?php echo $pat['Age'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Clinician:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['Clinician'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col col-sm-auto"><p class="labelName">Date Received:</p></div>
	    <div class="col col-sm-auto">
	        <u><?php echo $data['CreationDate'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Reported:</p>
	    </div>
	    <div class="col col-sm-auto">
	        <u><?php echo $data['DateUpdate'] ?></u>
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
<div class="col-sm-20" style="border-radius: 0px; margin-top: 7px; color: black; ">

	  
	  
	    <div class="card-header"><center><b>LABORATORY RESULTS</b></center></div>
	   
          
<div class="card-block col-md-20" style="margin-top: 0px;">
	<div class="row">
	    <div class="col-3"><p class="label">TEST</p></div>
	    <div class="col-2"><p class="label"></p></div>
	    <div class="col-3"><p class="label">SI Units</p></div>
	    <div class="col-1"><p class="label"></p></div>
	    <div class="col-3"><p class="label">Conventional Units</p></div>
	</div>
	<hr>
<!-- U/A -->	
				<div class="row" style="margin-top: 5px;">
	            	<div class="col-3 ">
	            		<b>CLINICAL MICROSCOPY</b>
	            	</div>
				</div>
				<div class="row" style="margin-top: 5px;">
	            	<div class="col-3 ">
	            		<b>Complete Urinalysis</b>
	            	</div>
				</div>
			<div class="col-12" style="margin-top: 5px;">
				<div class="row">
					<div class="col-5"><p class="labelName">Color</p></div>
					<div class=""><p class="lineRes"><?php echo $data['UriColor'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Transparency</p></div>
					<div class=""><p class="lineRes"><?php echo $data['UriTrans'] ?></p></div>
				</div>
			</div>

			<div class="row" style="margin-top: 10px;">
	            	<div class="col-3 ">
	            		<b>Urine Chemical</b>
	            	</div>
			</div>
			<div class="col-12" style="margin-top: 5px;">
				<div class="row" style="margin-top: 5px;">
					<div class="col-5" ><p class="labelName">pH</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['UriPh'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Specific Gravity</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['UriSp'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Protein</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['UriPro'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Glucose</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['UriGlu'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Leukocyte Esterase</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['LE'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Nitrite</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['LE'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Urobilinogen</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['URO'] ?></p></div>
					<div class="col-3"><p class="labelName">mg/dl</p></div>
					<div class="col-2"><p class="labelName">0.2~0.9 mg/dl</p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Blood</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['BLD'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Ketone</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['KET'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Bilirubin</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['BIL'] ?></p></div>
				</div>
			</div>

			<div class="row" style="margin-top: 10px;">
	            	<div class="col-3 ">
	            		<b>Microscopic</b>
	            	</div>
			</div>
			<div class="col-12" style="margin-top: 5px;">
				<div class="row" >
					<div class="col-5"><p class="labelName">RBC</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['RBC'] ?></p></div>
					<div class="col-3"><p class="labelName">/hpf</p></div>
					<div class="col-2"><p class="labelName">0~3</p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">WBC</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['WBC'] ?></p></div>
					<div class="col-3"><p class="labelName">/hpf</p></div>
					<div class="col-2"><p class="labelName">0~5</p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">E.Cells</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['ECells'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">M.Threads</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['MThreads'] ?></p></div>
				</div>
				<div class="row" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Bacteria</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $data['Bac'] ?></p></div>
				</div>
			</div>

			<hr>
<div id="checkFecalysis" >
			<?php 
				if($data['FecColor'] != ""){


			 ?>
			<div class="row" style="margin-top: 10px;" >
	            	<div class="col-3 ">
	            		<b>ROUTINE FECALYSIS</b>
	            	</div>
			</div>
	
			<div class="col-12"  style="margin-top: 5px;" id="checkResult">
				<?php 

					if ($data['FecColor'] != "") {
				 ?>
				<div class="row" id="checkFecColor">
					<div class="col-5"><p class="labelName">Color</p></div>
					<div class="col-2"><p class="lineRes" id="FecColortxt"><?php echo $data['FecColor'] ?></p></div>

				</div>
				<?php 
					}
					if ($data['FecCon'] != "") {
				 ?>


				<div class="row" id="checkFecCon" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Consistency</p></div>
					<div class="col-2"><p class="lineRes" id="FecContxt"><?php echo $data['FecCon'] ?></p></div>
				</div>
				<?php 
					}
					if ($data['FecMicro'] != "") {
				 ?>
				<div class="row" id="checkFecMicro" style="margin-top: 5px;">
					<div class="col-5"><p class="labelName">Microscopic Findings</p></div>
					<div class="col-2"><p class="lineRes" id="FecMicrotxt"><?php echo $data['FecMicro'] ?></p></div>
				</div>
				<?php }} ?>
			</div>
</div>
</div>
<!--Footer-->

	<div class="col-sm-14 " style="margin-top: 0px;">
	<span style="font-size: 15px;">Note: Specimen rechecked, result/s verified.</span>
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-block" style="height: 1.3in;" >
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $data['Received'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $data1['QC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $data['Printed'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $data['RMTLIC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $data['QCLIC'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $data['PATHLIC'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
					<div class="col"><center><p class="labelName">Quality Control</p></center></div>
					<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
				</div>
		</div>
	</div>
	</div>
	<div class="col-md-14" style="margin-top: 24px; position: fixed;">
		<img src="../assets/QISFooter.png" height="50px" width="100%">
	</div>
</div>



</body>

<?php }}}} ?>