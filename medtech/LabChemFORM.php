<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/qc.php');
include_once('../classes/lab.php');
include_once('../classes/patient.php');
$printdate = date("Y-m-d H:i:s");
$lab = new lab;
$qc = new qc;
$patient = new Patient;
$transac = new trans;
if (isset($_GET['id']) and isset($_GET['tid'])){
	$tid = $_GET['tid'];
	$id = $_GET['id'];
	$data = $lab->getData($id,$tid,"lab_chemistry");

$C = $data['Biller'];
$FBS = $data['FBS'];
$BUA = $data['BUA'];
$BUN = $data['BUN'];
$CREA = $data['CREA'];
$CHOL = $data['CHOL'];
$TRIG = $data['TRIG'];
$HDL = $data['HDL'];
$LDL = $data['LDL'];
$CH = $data['CH'];
$VLDL = $data['VLDL'];
$Na = $data['Na'];
$K = $data['K'];
$Cl = $data['Cl'];
$ALT = $data['ALT'];
$AST = $data['AST'];
$HB = $data['HB'];
date_default_timezone_set("Asia/Kuala_Lumpur");
$printdate = date("Y-m-d H:i:s");

$printCount = $lab->checkPrint($id, $tid, 'CHEMISTRY');
	$med = $lab->medtechByID($data['MedID']);
	$qc = $lab->medtechByID($data['QualityID']);
	$path = $lab->medtechByID($data['PathID']);
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LABORATORY CHEMISTRY FORM</title>
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<link href="../source/formstyle.css" media="all" rel="stylesheet"/>
     <script type="text/javascript" src="../source/jquery.min.js"></script>
    <script type="text/javascript" src="../source/jquery-confirm.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../source/jquery-confirm.min.css">
	<script type="text/javascript">
	// window.onload = function() 
	// { 
	// 	var x = "<?php echo $C ?>";
	// 	if ( x == "WALK-IN") 
	// 	{
	// 		//document.getElementById("Check").style.visibility = "hidden";
	// 	}
	// 	else if ( x == "") 
	// 	{
	// 		document.getElementById("CheckAgain").innerHTML = "-";
	// 	}

	// 	var FBS = "<?php echo $FBS ?>";
	// 	if ( FBS == "") 
	// 	{
	// 		var divOne = document.getElementById("CheckFBS");
	// 		divOne.remove();
	// 	}

	// 	var BUA = "<?php echo $BUA ?>";
	// 	if ( BUA == "") 
	// 	{
	// 		var divTwo = document.getElementById("CheckBUA");
	// 		divTwo.remove();
	// 	}

	// 	var BUN = "<?php echo $BUN ?>";
	// 	if ( BUN == "") 
	// 	{
	// 		var divThree = document.getElementById("CheckBUN");
	// 		divThree.remove();
	// 	}

	// 	var CREA = "<?php echo $CREA ?>";
	// 	if ( CREA == "") 
	// 	{
	// 		var divFour = document.getElementById("CheckCREA");
	// 		divFour.remove();
	// 	}

	// 	var CHOL = "<?php echo $CHOL ?>";
	// 	if ( CHOL == "") 
	// 	{
	// 		var divFive = document.getElementById("CheckCHOL");
	// 		divFive.remove();

	// 	}

	// 	var TRIG = "<?php echo $TRIG ?>";
	// 	if ( TRIG == "") 
	// 	{
	// 		var divSeven = document.getElementById("CheckTRIG");
	// 		divSeven.remove();
	// 	}

	// 	var HDL = "<?php echo $HDL ?>";
	// 	if ( HDL == "") 
	// 	{
	// 		var divEight = document.getElementById("CheckHDL");
	// 		divEight.remove();
	// 	}

	// 	var LDL = "<?php echo $LDL ?>";
	// 	if ( LDL == "") 
	// 	{
	// 		var divNine = document.getElementById("CheckLDL");
	// 		divNine.remove();
	// 	}

	// 	var CH = "<?php echo $CH ?>";
	// 	if ( CH == "") 
	// 	{
	// 		var divTen = document.getElementById("CheckCH");
	// 		divTen.remove();
	// 	}

	// 	var VLDL = "<?php echo $VLDL ?>";
	// 	if ( VLDL == "") 
	// 	{
	// 		var divEle = document.getElementById("CheckVLDL");
	// 		divEle.remove();
	// 	}

	// 	var Na = "<?php echo $Na ?>";
	// 	if ( Na == "") 
	// 	{
	// 		var divTwe = document.getElementById("CheckNa");
	// 		divTwe.remove();
	// 	}

	// 	var K = "<?php echo $K ?>";
	// 	if ( K == "") 
	// 	{
	// 		var divThi = document.getElementById("CheckK");
	// 		divThi.remove();
	// 	}

	// 	var Cl = "<?php echo $Cl ?>";
	// 	if ( Cl == "") 
	// 	{
	// 		var divFou = document.getElementById("CheckCl");
	// 		divFou.remove();
	// 	}

	// 	var ALT = "<?php echo $ALT ?>";
	// 	if ( ALT == "") 
	// 	{
	// 		var divFif = document.getElementById("CheckALT");
	// 		divFif.remove();
	// 	}

	// 	var AST = "<?php echo $AST ?>";
	// 	if ( AST == "") 
	// 	{
	// 		var divSixt = document.getElementById("CheckAST");
	// 		divSixt.remove();
	// 	}

	// 	var HB = "<?php echo $HB ?>";
	// 	if ( HB == "") 
	// 	{
	// 		var divSev = document.getElementById("CheckHB");
	// 		divSev.remove();
	// 	}

	// 	if(FBS == "" && BUA == "" && BUN == "" && CREA == "")
	// 	{
	// 		var LabelOne = document.getElementById("CHEM");
	// 		LabelOne.remove();
	// 	}

	// 	if(CHOL == "" && TRIG == "" && HDL == "" && LDL == "" && CH == "" && VLDL == "")
	// 	{
	// 		var LabelTwo = document.getElementById("LP");
	// 		LabelTwo.remove();
	// 	}
	// 	if(Na == "" && K == "" && Cl == "")
	// 	{
	// 		var LabelThree = document.getElementById("E");
	// 		LabelThree.remove();
	// 	}
	// 	if(ALT == "" && AST == "")
	// 	{
	// 		var LabelFour = document.getElementById("EN");
	// 		LabelFour.remove();
	// 	}



	// }		
	</script>
</head>
<style type="text/css">

.card-header
{
	font-family: "Times New Roman";
	font-size: 18px;
	color: white;
	background-color: #104E8B;
	padding: 0px;
	margin: 0px;
}

.line
{
	font-family: "Garamond";
	display: table-cell;
	min-width: 50px;
	height: 16px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height:22px;
	text-align: center;
	/*font-size: 18px;*/
	
}
.line2
{
	font-family: "Garamond";
	display: table-cell;
	height: 16px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height:22px;
	text-align: center;
	/*font-size: 18px;*/
	
}
.label
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:22px;

	
}
.lineName
{
	font-family: "Garamond";
	font-size: 20px;
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
	line-height: 18px;
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
	color:#104E8B;
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
hr
{
	background-color: #fff;
	border-top: 3px dashed #8c8b8b;
	line-height:1px;

}

</style>

<body >
<div class="container-fluid">
<div class="col-md-12" style="margin-top: 5px;">
	<img src="../assets/QPDHeader.jpg" height="100px" width="100%">
</div>
<div class="col-md-12" style="">
	<div class="card" style="border-radius: 0px; border:none; margin-top: 0px;">
	<!-- <div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div> -->
	<div class="card-block" style="padding-bottom: 0px ">
	<div class="row">
	    <div class="col-1"><p class="labelName">Name:</p></div>
	    <div class="col-5">
	        <span class="lineName"><?php echo $data['LastName'] ?>, <?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?>
	        </span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Lab Number:</p>
	    </div>
	    <div class="col-4">
	        <span class="lineName"><?php echo $data['TransactionID'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Gender:</p></div>
	    <div class="col-5">
	        <span class="lineName"><?php echo $data['Gender'] ?></span>
	    </div>
	    <?php 
			$notesData = explode(",", $data['Notes']);
			if(count($notesData) == 2){
		?>
			<div class="col-2 text-right">
				<p class="labelName">Ward:</p>
			</div>
			<div class="">
				<span class="lineName"><?php echo $notesData[0] ?></span>
			</div>
			<div class="col-2 text-right">
				<p class="labelName">Bed #:</p>
			</div>
			<div class="">
				<span class="lineName"><?php echo $notesData[1] ?></span>
			</div>
		<?php }else{ ?>
	    <div class="col-2 text-right">
	        <p class="labelName">QuestID:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['PatientID'] ?></span>
	    </div>
		<?php } ?>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Age:</p></div>
	    <div class="col-3">
	        <span class="lineName"><?php echo $data['Age'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Referred by:</p>
	    </div>
	    <div class="col-6" >
	        <span class="lineName">
	        <?php if ($data['CompanyName'] != "WALK-IN") {
	        	echo $data['CompanyName']; 
	        } ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col col-sm-auto"><p class="labelName">Date Received:</p></div>
	    <div class="col col-sm-auto">
	        <u><?php echo $data['TransactionDate'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Reported:</p>
	    </div>
	    <div class="col col-sm-auto">
			<u><?php echo $lab->creationDate($data['chemID'], "lab_chemistry", "chemID");
			?></u>
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
<div  style="position: absolute;margin-top: 810px;margin-left:-10px;">
	<div class="col-md-12 ">
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-block" style="height: 1.3in;" >
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $med['FirstName']." ".$med['MiddleName']." ".$med['LastName'].", ".$med['PositionEXT']?>	</b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $qc['FirstName']." ".$qc['MiddleName']." ".$qc['LastName'].", ".$qc['PositionEXT']?>	</b></span></center></div>
					<div class="col" style="padding-left: 0px">
						<div class="sig">
							<image src="../assets/Emil_Sig.png" width="300px;" >
						</div>
						<center><span class="Names"><br>
						<b><?php echo $path['FirstName']." ".$path['MiddleName']." ".$path['LastName'].", ".$path['PositionEXT']?>	</b></span></center></div>
				</div>
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $med['LicenseNO'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $qc['LicenseNO'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $path['LicenseNO'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
					<div class="col"><center><p class="labelName">Quality Control</p></center></div>
					<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
				</div>
		</div>
	</div>
	</div>
	<div class="col-md-12">
		<img src="../assets/QISFooter.png" height="50px" width="100%">
	</div>
</div>
<!-- Footer End -->

<div class="col-md-12" >
	<div class="card" style="border-radius: 0px; margin-top: 20px;border-width: 0px">
	<div class="card-header"><center><b>LABORATORY RESULTS</b></center></div>
	<div class="card-block" id="content">

	<div class="row">
	    <div class="col-3"><p class="label">TEST</p></div>
	    <div class="col-2"><p class="label"></p></div>
	    <div class="col-3"><p class="label">SI Units</p></div>
	    <div class="col-1"><p class="label"></p></div>
	    <div class="col-3"><p class="label">Conventional Units</p></div>
	</div>

	<hr>

	<!-- Blood -->
			<div class="row" id="CHEM">
			    <p class="label">CHEMISTRY</p><br>
			</div>
		<?php if($data['FBS'] != "" and $data['FBS'] != "N/A"){ ?>
			<div class="row" id="CheckFBS">
	            <label class="col-3"><p class="label">Fasting Blood Sugar</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['FBS'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 4.1-5.9</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['FBScon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl 75 -107</p>
	            </div>
			</div>
		<?php } ?>
		<?php if($data['RBS'] != "" and $data['RBS'] != "N/A"){ ?>
			<div class="row" >
	            <label class="col-3"><p class="label">Random Blood Sugar</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['RBS'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L < 7.7</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['RBScon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl < 140</p>
	            </div>
			</div>
		<?php } ?>
		<?php if($data['BUA'] != "" and $data['BUA'] != "N/A"){ ?>
			<div class="row" id="CheckBUA">
	            <label class="col-3"><p class="label">Uric Acid</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['BUA'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 155 - 428</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['BUAcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">
					<!-- mg/dl 3 - 7.1 -->
					mg/dl 2.60 - 7.18
					</p>
	            </div>
			</div>
		<?php } ?>	
		<?php if($data['BUN'] != "" and $data['BUN'] != "N/A"){ ?>
			<div class="row" id="CheckBUN">
	            <label class="col-3"><p class="label">Blood Urea Nitrogen</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['BUN'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 2.5 - 7.5</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['BUNcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl 7 - 21</p>
	            </div>
			</div>
		<?php } ?>
		<?php if($data['CREA'] != "" and $data['CREA'] != "N/A"){ ?>
			<div class="row" id="CheckCREA">
	            <label class="col-3"><p class="label">Creatinine</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['CREA'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">umol/L Female: 53 - 106</p>
	            	<p class="label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male: 71 - 115</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['CREAcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl &nbsp;Female: 0.60 - 1.20</p>
	            	<p class="label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male: 0.80 - 1.30</p><br>
	            </div>
			</div>
		<?php } ?>
		<?php if ($data['CHOL'] != "" and $data['CHOL'] or $data['TRIG'] != "" and  $data['TRIG'] != "N/A" or $data['HDL'] != "" and $data['HDL'] != "N/A" and $data['HDL'] != 0 and $data['HDL'] != "NAN" or $data['LDL'] != "" and $data['LDL'] != "N/A" and $data['LDL'] != 0 and $data['LDL'] != "NAN" or $data['CH'] != "" and $data['CH'] != "N/A" and $data['CH'] != 0 and $data['CH'] != "NAN" or $data['VLDL'] != "" and $data['VLDL'] != "N/A" and $data['VLDL'] != 0 and $data['VLDL'] != "NAN") {
		 ?>
		 <?php if ($data['CHOL'] != "" and $data['CHOL'] and $data['TRIG'] != "" and  $data['TRIG'] != "N/A" and $data['HDL'] != "" and $data['HDL'] != "N/A" and $data['HDL'] != 0 and $data['HDL'] != "NAN" and $data['LDL'] != "" and $data['LDL'] != "N/A" and $data['LDL'] != 0 and $data['LDL'] != "NAN" and $data['CH'] != "" and $data['CH'] != "N/A" and $data['CH'] != 0 and $data['CH'] != "NAN" and $data['VLDL'] != "" and $data['VLDL'] != "N/A" and $data['VLDL'] != 0 and $data['VLDL'] != "NAN") {
		 ?>
			<div class="row" id="LP">
			    <p class="label">LIPID PROFILE</p><br>
			</div>
			<?php }if($data['CHOL'] != "" and $data['CHOL'] != "N/A"){ ?>
			<div class="row" id="CheckCHOL">
	            <label class="col-3"><p class="label">Cholesterol</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['CHOL'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L < 5.17</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['CHOLcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl < 200</p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['TRIG'] != "" and $data['TRIG'] != "N/A"){ ?>
			<div class="row" id="CheckTRIG">
	            <label class="col-3"><p class="label">Triglycerides</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['TRIG'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 0.3-1.7</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['TRIGcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">
						<!-- mg/dl 27-150 -->
						mg/dl 26.54-150
					</p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['HDL'] != "" and $data['HDL'] != "N/A" and $data['HDL'] != 0 and $data['HDL'] != "NAN"){ ?>
			<div class="row" id="CheckHDL">
	            <label class="col-3"><p class="label">HDL</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['HDL'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 0.9-2.21</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['HDLcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">
						<!-- mg/dl 35-85.32 -->
						mg/dl 34.6-85
					</p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['LDL'] != "" and $data['LDL'] != "N/A" and $data['LDL'] != 0 and $data['LDL'] != "NAN"){ ?>
			<div class="row" id="CheckLDL">
	            <label class="col-3"><p class="label">LDL</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['LDL'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 2.5-4.1</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['LDLcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">
						<!-- mg/dl 96.52-158.30 -->
						mg/dl 96.15-157.70
					</p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['CH'] != "" and $data['CH'] != "N/A" and $data['CH'] != 0 and $data['CH'] != "NAN"){ ?>
			<div class="row" id="CheckCH">
	            <label class="col-3"><p class="label">Cholesterol/HDL Ratio</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['CH'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L < 4.40 </p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['VLDL'] != "" and $data['VLDL'] != "N/A" and $data['VLDL'] != 0 and $data['VLDL'] != "NAN"){ ?>
			<div class="row" id="CheckVLDL">
	            <label class="col-3"><p class="label">VLDL</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['VLDL'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 0.050-1.04</p><br>
	            </div>
			</div>
			<?php } }?>
			<?php if($data['Na'] != "" and $data['Na'] != "N/A" or $data['K'] != "" and $data['K'] != "N/A" or $data['Cl'] != "" and $data['Cl'] != "N/A"){ ?>
			<div class="row" id="E">
			   <p class="label">ELECTROLYTES</p><br>
			</div>
			<?php if($data['Na'] != "" and $data['Na'] != "N/A"){ ?>
			<div class="row" id="CheckNa">
	            <label class="col-3"><p class="label">Sodium</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['Na'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 135 - 153</p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['K'] != "" and $data['K'] != "N/A"){ ?>
			<div class="row" id="CheckK">
	            <label class="col-3"><p class="label">Potassium</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['K'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 3.50 - 5.30</p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['Cl'] != "" and $data['Cl'] != "N/A"){ ?>	
			<div class="row" id="CheckCl">
	            <label class="col-3"><p class="label">Chloride</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['Cl'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 98-107</p><br>
	            </div>
			</div>
			<?php } }?>
			<?php if($data['ALT'] != "" and $data['ALT'] != "N/A" or $data['AST'] != "" and $data['AST'] != "N/A" or $data['Amylase'] != "" and $data != "0" or $data['Lipase'] != "" and $data['Lipase'] != "0"){ ?>
			<div class="row" id="EN">
			    <p class="label">ENZYMES</p><br>
			</div>
			<?php if($data['ALT'] != "" and $data['ALT'] != "N/A"){ ?>
			<div class="row" id="CheckALT">
	            <label class="col-3"><p class="label">SGPT/ALT</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['ALT'] ?></span>
	            </div>
	            <div class="col-4">
	            	<p class="label">U/L Female: 5 - 31  Male: 10 - 41</p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['AST'] != "" and $data['AST'] != "N/A"){ ?>
			<div class="row" id="CheckAST">
	            <label class="col-3"><p class="label">	SGOT/AST</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['AST'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">U/L 0 - 40</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['Amylase'] != "" and $data['Amylase'] != "0"){ ?>
			<div class="row">
	            <label class="col-3"><p class="label">Amylase</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['Amylase'] ?></span>
	            </div>
	            <div class="col-4">
	            	<p class="label">U/L 22 - 80</p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['Lipase'] != "" and $data['Lipase'] != "0"){ ?>
			<div class="row">
	            <label class="col-3"><p class="label">Lipase</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $data['Lipase'] ?></span>
	            </div>
	            <div class="col-4">
	            	<p class="label">U/L 0 - 62</p>
	            </div>
			</div>
			<?php } ?>
			<?php }?>
			<?php if($data['HB'] != "" and $data['HB'] != "N/A"){ ?>
			<div class="row" id="CheckHB">
			    <div class="col-3"><p class="label">HBA1C</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['HB'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">% 4.3 - 6.3</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['ALP'] != '' and $data['ALP'] != 'N/A') {			
			?>
			<div class="row mt-3" >
			    <div class="col-3"><p class="label">Alkaline Phosphatase</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['ALP'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">U/L up to 105</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['PSA'] != '' and $data['PSA'] != 'N/A') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">PSA ( Prostate-Specific Antigen )</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['PSA'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">ng/mL 0-4</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['GGTP'] != '' and $data['GGTP'] != 'N/A') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">GGTP</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['GGTP'] ?></span>
	            </div>
			</div>			
			<?php } ?>
			<?php if ($data['chemNotes'] != '' and $data['chemNotes'] != 'N/A') {			
			?>
			<div class="row mt-1" >
			    <div class="col-3"><p class="label">Other Notes</p></div>
			    <div class="col-6">
	            	<span class="line2"><?php echo $data['chemNotes'] ?></span>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['LDH'] != '' and $data['LDH'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">LDH</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['LDH'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label">
						<!-- U/L 132-228 -->
		            	U/L 225-450
					</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['Calcium'] != '' and $data['Calcium'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">TOTAL CALCIUM</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['Calcium'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label">U/L 2.10-2.63</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['Protein'] != '' and $data['Protein'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">TOTAL PROTEIN</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['Protein'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label">U/L 66 - 83</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['InPhos'] != '' and $data['InPhos'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">Inoraganic Phosphorus</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['InPhos'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label">U/L 0.8 - 1.50</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['Albumin'] != '' and $data['Albumin'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">Albumin</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['Albumin'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label">U/L 38 - 51</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['Globulin'] != '' and $data['Globulin'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">Globulin</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['Globulin'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label">U/L 23 - 35</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if ($data['Magnesium'] != '' and $data['Magnesium'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">Magnesium</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['Magnesium'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label">mmol/L 0.70 - 0.98</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['OGTT1'] != "" and $data['OGTT1'] != "N/A" or $data['OGTT2'] != "" and $data['OGTT2'] != "N/A"){ ?>			
			<div class="row" id="EN">
			    <p class="label">Oral Glucose Tolerance Test (OGTT)</p><br>
			</div>
			<?php if($data['OGTT1'] != "" and $data['OGTT1'] != "0"){ ?>
			<div class="row">	
				<label class="col-3"><p class="label" style="font-size: 16px">OGTT 1 HR</p></label>
				<div class="col-2">
	            	<span class="line"><?php echo $data['OGTT1'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L < 11.0</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['OGTT1con'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl < 200</p>
	            </div>
	        </div>    
			<?php } ?>
			<?php if($data['OGTT2'] != "" and $data['OGTT2'] != "0"){ ?>
			<div class="row">
				<label class="col-3"><p class="label" style="font-size: 16px">OGTT 2 HR</p></label>
				<div class="col-2">
	            <span class="line"><?php echo $data['OGTT2'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmo/L < 7.7</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['OGTT2con'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl < 140</p>
	            </div>
	        </div>
			<?php } ?>
			<?php }?>
			<?php if ($data['OGCT'] != '' and $data['OGCT'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">Oral Glucose Challenge Test (OGCT)</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['OGCT'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label"> mmol/L < 7.7</p><br>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $data['OGCTcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl < 140</p>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['CPKMB'] != "" and $data['CPKMB'] != "N/A" or $data['CPKMM'] != "" and $data['CPKMM'] != "N/A" or $data['totalCPK'] != "" and $data['totalCPK'] != "N/A"){ ?>			
			<div class="row" id="EN">
			    <p class="label">Creatine Phosphokinase (CPK)</p><br>
			</div>
			<?php if($data['CPKMB'] != "" and $data['CPKMB'] != "0"){ ?>
			<div class="row">	
				<label class="col-3"><p class="label" style="font-size: 16px">CPK - MB </p></label>
				<div class="col-2">
	            	<span class="line"><?php echo $data['CPKMB'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">U/L 0 - 25</p>
	            </div>
	        </div>    
			<?php } ?>
			<?php if($data['CPKMM'] != "" and $data['CPKMM'] != "0"){ ?>
			<div class="row">	
				<label class="col-3"><p class="label" style="font-size: 16px">CPK - MM </p></label>
				<div class="col-2">
	            	<span class="line"><?php echo $data['CPKMM'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">U/L 25 - 170</p>
	            </div>
	        </div>    
			<?php } ?>
			<?php if($data['totalCPK'] != "" and $data['totalCPK'] != "0"){ ?>
			<div class="row">	
				<label class="col-3"><p class="label" style="font-size: 16px">TOTAL CPK  </p></label>
				<div class="col-2">
	            	<span class="line"><?php echo $data['totalCPK'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">U/L 25 - 195</p>
	            </div>
	        </div>    
			<?php } ?>
			<?php } ?>
			<?php if ($data['IonCalcium'] != '' and $data['IonCalcium'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">Ionized Calcium</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['IonCalcium'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label">mmol/L 0.93 - 1.32</p><br>
	            </div>
			</div>
			<?php } ?>
			<?php if($data['BILTotal'] != "" and $data['BILTotal'] != "N/A" or $data['BILDirect'] != "" and $data['BILDirect'] != "N/A" or $data['BILIndirect'] != "" and $data['BILIndirect'] != "N/A"){ ?>			
			<div class="row" >
			    <p class="label">BILIRUBIN</p><br>
			</div>
			<?php if($data['BILTotal'] != "" and $data['BILTotal'] != "0"){ ?>
			<div class="row">	
				<label class="col-3"><p class="label" style="font-size: 16px">Total ( Adult ) </p></label>
				<div class="col-2">
	            	<span class="line"><?php echo $data['BILTotal'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">
					<!-- umol/L 0 - 20 -->
					umol/L 5 - 21
					</p>
	            </div>
	        </div>    
			<?php } ?>
			<?php if($data['BILDirect'] != "" and $data['BILDirect'] != "0"){ ?>
			<div class="row">	
				<label class="col-3"><p class="label" style="font-size: 16px">Direct </p></label>
				<div class="col-2">
	            	<span class="line"><?php echo $data['BILDirect'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">
						<!-- umol/L 0 - 9 -->
						umol/L 0 - 6.9
					</p>
	            </div>
	        </div>    
			<?php } ?>
			<?php if($data['BILIndirect'] != "" and $data['BILIndirect'] != "0"){ ?>
			<div class="row">	
				<label class="col-3"><p class="label" style="font-size: 16px">Indirect  </p></label>
				<div class="col-2">
	            	<span class="line"><?php echo $data['BILIndirect'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">
						<!-- umol/L 0 - 11 -->
		            	umol/L 5 - 14.1
					</p>
	            </div>
	        </div>    
			<?php } ?>
			<?php } ?>
			<?php if ($data['AGRatio'] != '' and $data['AGRatio'] != '0') {			
			?>
			<div class="row mt-2" >
			    <div class="col-3"><p class="label">A/G Ratio</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $data['AGRatio'] ?></span>
	            </div>
	             <div class="col-3">
	            	<p class="label">1.5 - 3.0</p><br>
	            </div>
			</div>
			<?php } ?>


	</div>
	</div>
</div>
</div>
<div class="container-fluid" style="margin-top: 240px" id="container2">
<div class="col-md-12" style="margin-top: 5px;">
	<img src="../assets/QPDHeader.jpg" height="100px" width="100%">
</div>
<div class="col-md-12" style="">
	<div class="card" style="border-radius: 0px; border:none; margin-top: 0px;">
	<!-- <div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div> -->
	<div class="card-block" style="padding-bottom: 0px ">
	<div class="row">
	    <div class="col-1"><p class="labelName">Name:</p></div>
	    <div class="col-5">
	        <span class="lineName"><?php echo $data['LastName'] ?>, <?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?>
	        </span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Lab Number:</p>
	    </div>
	    <div class="col-4">
	        <span class="lineName"><?php echo $data['TransactionID'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Gender:</p></div>
	    <div class="col-5">
	        <span class="lineName"><?php echo $data['Gender'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">QuestID:</p>
	    </div>
	    <div class="col-4">
	        <span class="lineName"><?php echo $data['PatientID'] ?></span>
	    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
	    <div class="col-1"><p class="labelName">Age:</p></div>
	    <div class="col-3">
	        <span class="lineName"><?php echo $data['Age'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Referred by:</p>
	    </div>
	    <div class="col-6" >
	        <span class="lineName">
	        <?php if ($data['CompanyName'] != "WALK-IN") {
	        	echo $data['CompanyName']; 
	        } ?></span>
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
	        <u><?php echo $data['CreationDate'] ?></u>
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
<div  style="position: absolute;margin-top: 810px;margin-left:-10px;">
	<div class="col-md-12 ">
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-block" style="height: 1.3in;" >
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $med['FirstName']." ".$med['MiddleName']." ".$med['LastName'].", ".$med['PositionEXT']?>	</b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="Names"><br>
						<b><?php echo $qc['FirstName']." ".$qc['MiddleName']." ".$qc['LastName'].", ".$qc['PositionEXT']?>	</b></span></center></div>
					<div class="col" style="padding-left: 0px">
						<div class="sig">
							<image src="../assets/Emil_Sig.png" width="300px;" >
						</div>
						<center><span class="Names"><br>
						<b><?php echo $path['FirstName']." ".$path['MiddleName']." ".$path['LastName'].", ".$path['PositionEXT']?>	</b></span></center></div>
				</div>
				<div class="row">
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $med['LicenseNO'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $qc['LicenseNO'] ?></b></span></center></div>
					<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br>
						<b>LIC NO. <?php echo $path['LicenseNO'] ?></b></span></center></div>
				</div>
				<div class="row">
					<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
					<div class="col"><center><p class="labelName">Quality Control</p></center></div>
					<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
				</div>
		</div>
	</div>
	</div>
	<div class="col-md-12">
		<img src="../assets/QISFooter.png" height="50px" width="100%">
	</div>
</div>
<!-- Footer End -->

<div class="col-md-12" >
	<div class="card" style="border-radius: 0px; margin-top: 20px;border-width: 0px">
	<div class="card-header"><center><b>LABORATORY RESULTS</b></center></div>
	<div class="card-block" id="content2">

	<div class="row">
	    <div class="col-3"><p class="label">TEST</p></div>
	    <div class="col-2"><p class="label"></p></div>
	    <div class="col-3"><p class="label">SI Units</p></div>
	    <div class="col-1"><p class="label"></p></div>
	    <div class="col-3"><p class="label">Conventional Units</p></div>
	</div>

	<hr>

	<!-- Blood -->
		


	</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var pcount = "<?php echo $printCount; ?>";
		pcount = parseInt(pcount);
		if (pcount > 0) {
			$.confirm({
				title: 'Confirm',
				content: 'You have already printed this result '+pcount+' Time/s',
				theme: 'modern',
				buttons: {
					cancel: {
						text: 'cancel',
						btnClass: 'btn-primary',
						action: function(){
							window.location.href = "ChemList.php";
						}
					},
					yes: {
						text: 'yes',
						btnClass: 'btn-danger',
						action: function(){
							
						}
					}
				}
			});
		}
		window.onafterprint = function() {
			var tid = "<?php echo $tid; ?>";
			var pid = "<?php echo $id; ?>";
			var test = "CHEMISTRY";
		   $.post("PrintCount.php",{pid: pid, tid: tid, test: test},function(){
		   		window.location.href = "ChemList.php";
		   		
		   });   
		};
		// window.onbeforeprint = function() {
		// 	alert("This will be Count a");
		// };

		var content = $("#content").css( "height" );
		var cc = 0;
		var rowheight = 0;
		var thishtml = 0;
		$("#container2").hide();
		$("#content .row").each(function(){
			rowheight = rowheight + parseInt($(this).css("height"));
			if (rowheight > 700) {
				$("#container2").show();
				$(this).hide();
				thishtml = $(this).html();
				$("#content2").append("<div class='row'>"+ thishtml +"</div>")
			}
		});
	});
</script>

</body>
</html>
<?php } ?>