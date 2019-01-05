<?php
include_once('connection.php');
include_once('classes/qc.php');
include_once('classes/rad.php');
include_once('classes/lab.php');
include_once('classes/patient.php');
include_once('classes/pe.php');
include_once('classes/vital.php');
include_once('classes/medhis.php');
include_once('classes/transVal.php');
$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$trans = $trans->fetch_data($id,$tid);
$His = new His;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$his = $His->fetch_data($id,$tid);
$vital = new vital;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$vit = $vital->fetch_data($id,$tid);
$pe = new pe;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$pe = $pe->fetch_data($id, $tid);
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
$lab = new lab;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$res = $lab->fetch_data($id,$tid);

$rad = new rad;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$rad = $rad->fetch_data($id,$tid);
$qc = new qc;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$qc = $qc->fetch_data($id,$tid);
$printdate = date("m-d-Y");

if ($qc['MedicalClass'] == "CLASS A - Physically Fit")
{
	$patclass1 = "Class A - FIT TO WORK";
}
else if ($qc['MedicalClass'] == "CLASS B - Physically Fit but with minor condition curable within a short period of time, that will not adversely affect the workers efficiency")
{
	$patclass1 = "Class B - FIT TO WORK";
}
else if ($qc['MedicalClass'] == "CLASS C - With abnormal findings generally not accepted for employment.")
{
	$patclass1 = "CLASS C - With abnormal findings generally not accepted for employment.";
}
else if ($qc['MedicalClass'] == "CLASS D - Unemployable")
{
	$patclass1 = "Class D - UNEMPLOYABLE";
}
else
{
	$patclass1 = "PENDING";
}

$Notes = $qc['Notes'];
$HBSAG = $res['HBsAg'];
$PT = $res['PregTest'];
$METH = $res['Meth'];
$TETRA = $res['Tetra'];
$UriNotes = $res['UriOt'];
?>
<!DOCTYPE html>

<html>
<head>
	<title>Medical Examination Report</title>
	<link href="source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.4.3/fabric.min.js"></script>
	<!-- <script type="text/javascript" src="html2canvas.js"></script> -->
	<script type="text/javascript">

		function saveAspdf1() {

			html2canvas(document.getElementById("thishtml"),{
				onrendered: function (canvas){
					
					var x = "<?php echo $data['LastName']?>, <?php echo $data['FirstName']?> ";
					var img = canvas.toDataURL({format: 'jpeg', quality: 0.2});
					var pdf = new jsPDF('p', 'mm', [210, 590]);
					pdf.addImage(img, 'JPEG',0,0,210,590,'','FAST');
					pdf.save(x+'MEDICAL.pdf');


				}


			});
		}

	</script>
	<script type="text/javascript">
	window.onload = function() 
	{ 
		var x = "<?php echo $chkEmail ?>";
		if ( x == "-") 
		{
			document.getElementById("email").innerHTML = "-";
		}

		var y = "<?php echo $chkCon ?>";
		if ( y == "") 
		{
			document.getElementById("con").innerHTML = "-";
		}

		var asthma = "<?php echo $Asthma ?>";
		if ( asthma == "YES" ) 
		{
			document.getElementById("a").style.color = "red";
		}
		var b = "<?php echo $Tubercolosis ?>";
		if ( b == "YES") 
		{
			document.getElementById("tb").style.color = "red";
		}
		var c = "<?php echo $Diabetes ?>";
		if ( c == "YES") 
		{
			document.getElementById("c").style.color = "red";
		}
		var d = "<?php echo $HBP ?>";
		if ( d == "YES") 
		{
			document.getElementById("d").style.color = "red";
		}
		var e = "<?php echo $HP ?>";
		if ( e == "YES") 
		{
			document.getElementById("e").style.color = "red";
		}
		var f = "<?php echo $KP ?>";
		if ( f == "YES") 
		{
			document.getElementById("f").style.color = "red";
		}
		var g = "<?php echo $AH ?>";
		if ( g == "YES") 
		{
			document.getElementById("g").style.color = "red";
		}
		var h = "<?php echo $JBS ?>";
		if ( h == "YES") 
		{
			document.getElementById("h").style.color = "red";
		}
		var i = "<?php echo $PP ?>";
		if ( i == "YES") 
		{
			document.getElementById("i").style.color = "red";
		}
		var j = "<?php echo $MH ?>";
		if ( j == "YES") 
		{
			document.getElementById("j").style.color = "red";
		}
		var k = "<?php echo $FS ?>";
		if ( k == "YES") 
		{
			document.getElementById("k").style.color = "red";
		}
		var l = "<?php echo $ALLE ?>";
		if ( l == "YES") 
		{
			document.getElementById("l").style.color = "red";
		}
		var m = "<?php echo $CT ?>";
		if ( m == "YES") 
		{
			document.getElementById("m").style.color = "red";
		}
		var n = "<?php echo $HEP ?>";
		if ( n == "YES") 
		{
			document.getElementById("n").style.color = "red";
		}
		var o = "<?php echo $STD ?>";
		if ( o == "YES") 
		{
			document.getElementById("o").style.color = "red";
		}

		var aa  = "<?php echo $skin ?>";
		if ( aa == "NO") 
		{
			document.getElementById("aa").style.color = "red";
		}

		var bb = "<?php echo $hn ?>";
		if ( bb == "NO") 
		{
			document.getElementById("bb").style.color = "red";
		}

		var cc = "<?php echo $cbl ?>";
		if ( cc == "NO") 
		{
			document.getElementById("cc").style.color = "red";
		}

		var dd = "<?php echo $ch ?>";
		if ( dd == "NO") 
		{
			document.getElementById("dd").style.color = "red";
		}

		var ee = "<?php echo $abdo ?>";
		if ( ee == "NO") 
		{
			document.getElementById("ee").style.color = "red";
		}

		var ff = "<?php echo $extre ?>";
		if ( ff == "NO") 
		{
			document.getElementById("ff").style.color = "red";
		}

		var gg = "<?php echo $find ?>";
		if ( gg != "") 
		{
			document.getElementById("FINDINGS").style.color = "red";
		} 
		
		var x = "<?php echo $patclass1 ?>";
		if ( x == "Class D - UNEMPLOYABLE" || x == "CLASS C - With abnormal findings generally not accepted for employment.") 
		{
			document.getElementById("Class").style.color = "red";
		}
		var y = "<?php echo $Notes ?>";
		if ( y != "NORMAL" ) 
		{
			document.getElementById("Notes").style.color = "red";
		}
		var HBSAG = "<?php echo $HBSAG ?>";
		if ( HBSAG == "REACTIVE" ) 
		{
			document.getElementById("HBSAG").style.color = "red";
		}
		var PT = "<?php echo $PT ?>";
		if ( PT == "POSITIVE" ) 
		{
			document.getElementById("PT").style.color = "red";
		}
		var METH = "<?php echo $METH ?>";
		if ( METH == "POSITIVE" ) 
		{
			document.getElementById("DT1").style.color = "red";
		}
		var TETRA = "<?php echo $TETRA ?>";
		if ( TETRA == "POSITIVE" ) 
		{
			document.getElementById("DT2").style.color = "red";
		}
		var UriNotes = "<?php echo $UriNotes ?>";
		if ( UriNotes != "NORMAL") 
		{
			document.getElementById("UriNotes").style.color = "red";
		}
	}
	</script>
</head>
<style type="text/css" media="all">
.card-header
{
	font-family: "Times New Roman";
	font-size: 14px;
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
	height: 14px;
	line-height: 14px;
	font-size: 14px;
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
	height: 14px;
	line-height: 14px;
	font-size: 14px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}

.label
{
	font-family: "Garamond";
	font-size: 14px;
	color: #02005b;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:12px;

	
}
.lineName
{
	font-family: "Garamond";
	font-size: 14px;
	text-transform: uppercase;
	color: #000000;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height: 16px;
	
}
.labelName
{
	font-family: "Garamond";
	font-size: 14px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height: 16px;
}
.lineName1
{
	font-family: "Garamond";
	font-size: 16px;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}
.labelName1
{
	font-family: "Garamond";
	font-size: 16px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
}
.para
{
	font-family: "Garamond";
	font-size: 12px;
	color: #104E8B;
	line-height: 12px;
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
	line-height:14px;
	color: #000000;
}
.lineNameSig
{
	font-family: "Garamond";
	display: table-cell;
	width: 500px;
	height: 12px;
	border-bottom: 1px solid black;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 1px;
	margin: 1px;
	line-height:3px;
	font-size: 12px;
	color: #000000;
	
}


.label1
{
	font-family: "Garamond";
	font-size: 14px;
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
	font-size: 18px;
	color: #104E8B;
	font-weight: bolder;
	line-height: 18px;
}

.cert u
{
	color: black;
}

</style>
<body onload="javascript:saveAspdf1()"   style="height: 22in; width: 8.5in;padding: 0px;margin: 0px;">
	<!-- onload="javascript:saveAspdf1()" style="height: 11in; width: 11in;padding: 0px;margin: 0px;" -->
<!-- <a href="javascript:saveAspdf1()"/>Save</a> -->
<div class="container-fluid"   id="thishtml">
<div class="row">
	<div class="col-sm-12" style="margin-top: 5px;">
		<img src="assets/QPDHeader.jpg" height="100px" width="100%">
	</div>
</div>
<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-12">
			<div class="card" style="border-radius: 0px; margin-top: 10px;">
			<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS MEDICAL EXAMINATION REPORT</b></center></div>
			<div class="card-block">
				<div class="row">
				    <div class="col-1"><p class="labelName1">Company:</p></div>
				    <div class="col-6">
				        <span class="lineName1"><?php echo $data['CompanyName'] ?></span>
				    </div>
				    <div class="col-2 text-right">
				        <p class="labelName1">Date:</p>
				    </div>
				    <div class="col">
				        <span class="lineName1"><?php echo $trans['TransactionDate'] ?></span>
				    </div>
				</div>
				<div class="row">
				    <div class="col-1"><p class="labelName1">Name:</p></div>
				    <div class="col-6">
				        <span class="lineName1"><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></span>
				    </div>
				    <div class="col-2 text-right">
				        <p class="labelName1">QuestID:</p>
				    </div>
				    <div class="col">
				        <span class="lineName1"><?php echo $data['PatientID'] ?></span>
				    </div>
				</div>
				<div class="row">
				    <div class="col-1"><p class="labelName1">Address:</p></div>
				    <div class="col-6">
				        <span class="lineName1"><?php echo $data['Address'] ?></span>
				    </div>
				    <div class="col-2 text-right">
				        <p class="labelName1">Gender:</p>
				    </div>
				    <div class="col">
				        <span class="lineName1"><?php echo $data['Gender'] ?></span>
				    </div>
				</div>
				<div class="row">
				    <div class="col-1"><p class="labelName1">Email:</p></div>
				    <div class="col-6">
				        <span class="lineName1"><?php echo $data['Email'] ?></span>
				    </div>
				    <div class="col-2 text-right">
				        <p class="labelName1">Age:</p>
				    </div>
				    <div class="col">
				        <span class="lineName1"><?php echo $data['Age'] ?></span>
				    </div>
				</div>
				<div class="row">
				    <div class="col-1"><p class="labelName1">Mobile:</p></div>
				    <div class="col-6">
				        <span class="lineName1"><?php echo $data['ContactNo'] ?></span>
				    </div>
				    <div class="col-2 text-right">
				        <p class="labelName1">Birthdate:</p>
				    </div>
				    <div class="col">
				        <span class="lineName1"><?php echo $data['Birthdate'] ?></span>
				    </div>
				</div>
				</div>
			</div>		
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6" >
			<div class="card" style="border-radius: 0px; margin-top: 10px;">
			<div class="card-header"><center><b>MEDICAL HISTORY</b></center></div>
			<div class="card-block" style="height: 4.5in;">
			<div class="row">
				<div class="col"><p class="labelName1">Significant Past Illness</p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Asthma</p></div>
				<div class="col-4"><p class="lineName1" id="a"><?php echo $his['asth']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Tuberculosis</p></div>
				<div class="col-4"><p class="lineName1" id="tb"><?php echo $his['tb']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Diabetes</p></div>
				<div class="col-4"><p class="lineName1" id="c"><?php echo $his['dia']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">High Blood Pressure</p></div>
				<div class="col-4"><p class="lineName1" id="d"><?php echo $his['hb']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Heart Problem</p></div>
				<div class="col-4"><p class="lineName1" id="e"><?php echo $his['hp']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Kidney Problem</p></div>
				<div class="col-4"><p class="lineName1" id="f"><?php echo $his['kp']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Abdominal/Hernia</p></div>
				<div class="col-4"><p class="lineName1" id="g"><?php echo $his['ab']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Joint/Back/Scoliosis</p></div>
				<div class="col-4"><p class="lineName1" id="h"><?php echo $his['jbs']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Psychiatric Problem</p></div>
				<div class="col-4"><p class="lineName1" id="i"><?php echo $his['pp']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Migraine/Headache</p></div>
				<div class="col-4"><p class="lineName1" id="j"><?php echo $his['mh']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Fainting/Seizure</p></div>
				<div class="col-4"><p class="lineName1" id="k"><?php echo $his['fs']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Allergies</p></div>
				<div class="col-4"><p class="lineName1" id="l"><?php echo $his['alle']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Cancer/Tumor</p></div>
				<div class="col-4"><p class="lineName1" id="m"><?php echo $his['ct']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">Hepatitis</p></div>
				<div class="col-4"><p class="lineName1" id="n"><?php echo $his['hep']?></p></div>
			</div>
			<div class="row">
				<div class="col-8"><p class="labelName1">STD</p></div>
				<div class="col-4"><p class="lineName1" id="o"><?php echo $his['std']?></p></div>
			</div>


			</div>
			</div>
		</div>
		<div class="col-sm-6" >
			<div class="card" style="border-radius: 0px; margin-top: 10px;">
			<div class="card-header"><center><b>VITAL SIGNS</b></center></div>
			<div class="card-block" style="height: 4.5in;">
			<div class="row">
				<div class="col"><p class="labelName1">Height</p></div>
				<div class="col"><p class="lineName1" style="text-transform: lowercase;"><?php echo $vit['height']?></p></div>
				<div class="col"><p class="labelName1">Weight</p></div>
				<div class="col"><p class="lineName1" style="text-transform: lowercase;"><?php echo $vit['weight']?></p></div>
				<div class="col"><p class="labelName1">BMI</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['bmi']?></p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName1">BP</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['bp']?></p></div>
				<div class="col"><p class="labelName1">PR</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['pr']?></p></div>
				<div class="col"><p class="labelName1">RR</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['rr']?></p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName1">Visual Acuity Uncorrected</p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName1">OD</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['uod']?></p></div>
				<div class="col"><p class="labelName1">OS</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['uos']?></p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName1">Visual Acuity Corrected</p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName1">OD</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['cod']?></p></div>
				<div class="col"><p class="labelName1">OS</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['cos']?></p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName1">Color Vision/Ishihara</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['cv']?></p></div>
			</div>
			<div class="row">
				<div class="col-4"><p class="labelName1">Hearing</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['hearing']?></p></div>
			</div>
			<div class="row">
				<div class="col-4"><p class="labelName1">Hospitalization</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['hosp']?></p></div>
			</div>
			<div class="row">
				<div class="col-4"><p class="labelName1">Operation</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['opr']?></p></div>
			</div>
			<div class="row">
				<div class="col-4"><p class="labelName1">Medication</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['pm']?></p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName1">Smoker,Sticks/Year</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['smoker']?></p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName1">Alcoholic Drinker</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['ad']?></p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName1">Last Menstrual Period</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['lmp']?></p></div>
			</div>
			<div class="row">
				<div class="col-4"><p class="labelName1">Others/Notes</p></div>
				<div class="col"><p class="lineName1"><?php echo $vit['Notes']?></p></div>
			</div>


			</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12" >
			<div class="card" style="border-radius: 0px; margin-top: 10px;">
			<div class="card-header"><center><b>PHYSICAL EXAMINATION</b></center></div>
			<div class="card-block" style="height: 4in;">
			<div class="row">
				<div class="col">
					<div class="row">
						<div class="col-sm-6"><p class="labelName1"></p></div>
						<div class="col-sm-6"><p class="labelName1">NORMAL</p></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><p class="labelName1"></p></div>
						<div class="col-sm-6"><p class="labelName1">YES/NO</p></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><p class="labelName1">Skin</p></div>
						<div class="col-sm-6"><p class="lineName1" id="aa"><?php echo $pe['skin']?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><p class="labelName1">Neck</p></div>
						<div class="col-sm-6"><p class="lineName1" id="bb"><?php echo $pe['hn']?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><p class="labelName1">Chest/Breast/Lungs</p></div>
						<div class="col-sm-6"><p class="lineName1" id="cc"><?php echo $pe['cbl']?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><p class="labelName1">Cardiac/Heart</p></div>
						<div class="col-sm-6"><p class="lineName1" id="dd"><?php echo $pe['ch']?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><p class="labelName1">Abdomen</p></div>
						<div class="col-sm-6"><p class="lineName1" id="ee"><?php echo $pe['abdo']?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><p class="labelName1">Extremities</p></div>
						<div class="col-sm-6"><p class="lineName1" id="ff"><?php echo $pe['extre']?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><p class="labelName1">Others/Notes</p></div>
						<div class="col-sm-6"><p class="lineName1"><?php echo $pe['ot']?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-11"><p class="para">(Scalp, Eyes, Ears, Nose, Sinuses, Mouth, Throat, Thyroid, Axilla, Back, Anus-rectum, G-U System, Inguinals, Genitals, others)</p></div>
					</div>
				</div>
				<div class="col">
					<div class="row" style="margin-top: 28px;">
						<div class="col"><p class="labelName1">FINDINGS</p></div>
					</div>
					<div class="row">
						<div class="col-sm-1"><p class="labelName1"></p></div>
						<div class="col-sm-11"><p class="line" id="FINDINGS"><?php echo $pe['find']?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-1"><p class="labelName1"></p></div>
						<div class="col-sm-11"><p class="line"></p></div>
					</div>
					<div class="row">
						<div class="col-sm-1"><p class="labelName1"></p></div>
						<div class="col-sm-11"><p class="line"></p></div>
					</div>
					<div class="row">
						<div class="col-sm-1"><p class="labelName1"></p></div>
						<div class="col-sm-11"><p class="line"></p></div>
					</div>
					<div class="row">
						<div class="col-sm-1"><p class="labelName1"></p></div>
						<div class="col-sm-11"><p class="line"></p></div>
					</div>
					<div class="row">
						<div class="col-sm-1"><p class="labelName1"></p></div>
						<div class="col-sm-11"><p class="line"></p></div>
					</div>
					<div class="row">
						<div class="col-sm-1"><p class="labelName1"></p></div>
						<div class="col-sm-11"><p class="lineName1"></p></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-2"><p class="labelName1">Physician:</p></div>
						<div class="col-sm-10"><p class="lineName1"><?php echo $pe['Doctor']?></p></div>
					</div>
					<div class="row">
						<div class="col-sm-2"><p class="labelName1" style="line-height: 1px;">License:</p></div>
						<div class="col-sm-10"><p class="lineName1" style="line-height: 1px;"><?php echo $pe['License']?></p></div>
					</div>
				</div>
			</div>
			<hr class="dashedhr">
			<div class="row">
				<div class="col-sm-2"><p class="labelName1"></p></div>
				<div class="col-sm-10"><p class="lineName1" style="line-height: 1px;">Patient Signature</p></div>
			</div>
			<div class="row">
				<div class="col align-center"><p class="para"><br>I hereby authorized QPD and its physicians to furnish information that the company may need pertaining to my health status and do hereby release them from any and all legal responsibility be doing so, I certify that the medical history is true of my knowledge and any false statement will disqualify me from my employment benefits and claims.</p></div>
			</div>

			</div>
			</div>
		</div>
	</div>





<div class="col-sm-12">
	<div class="row">
		<div class="card" style="border-radius: 0px; margin-top: 10px; border: 3px solid #104E8B;">
		<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS MEDICAL CERTIFICATE</b></center></div>
		<div class="card-block" style="height: 2in;">
			<center><p class="para">
				<b>Medical Examination Rating System</b> (DOH, Bureau of Licensing and Regulation; Administrative Code no. 85-A series 1990)
			</p></center><br>
			<div class="row">
				<div class="col">
					<center>
						<p class="cert">I certify that I have examined <u><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></u> and found applicant of <u><?php echo $data['CompanyName'] ?></u> with a classification of <u id="Class"><?php echo $patclass1 ?></u> as of <u><?php echo $qc['CreationDate'] ?></u>.</p>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2"><p class="labelName">Others/Notes:</p></div>
				<div class="col-sm-4"><p class="line" id="Notes"><?php echo $qc['Notes']?></p></div>
				<div class="col-sm-2"><p class="labelName">Physician:</p></div>
				<div class="col-sm-4"><p class="line"><?php echo $pe['Doctor'] ?></p></div>
			</div>
			<div class="row">
				<div class="col-sm-2"><p class="labelName"></p></div>
				<div class="col-sm-4"><p class="lineName"></p></div>
				<div class="col-sm-2"><p class="labelName">License:</p></div>
				<div class="col-sm-4"><p class="lineName"><?php echo $pe['License'] ?></p></div>
			</div>				
		</div>
		</div>		
	</div>
	<div class="row">
		<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><center><b>LABORATORY SCIENCES RESULT</b></center></div>
		<div class="card-block" style="height: 5.5in;">
		<div class="row" style="padding-left: 13px;">
			<div class="col">
				<div class="row">
					<div class="col"><p class="labelName">HEMATOLOGY</p></div>
				</div>
				<div class="row">
					<div class="col"><p class="labelName">Complete Blood Count</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">White Blood</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['WhiteBlood'] ?></p></div>
					<div class="col-2"><p class="labelName">x10^9/L</p></div>
					<div class="col-3"><p class="labelName">4.23-11.07</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Hemoglobin</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Hemoglobin'] ?></p></div>
					<div class="col-2"><p class="labelName">g/L</p></div>
					<div class="col-3"><p class="labelName"><?php echo $res['HemoNR'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Hematocrit</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Hematocrit'] ?></p></div>
					<div class="col-2"><p class="labelName">VF</p></div>
					<div class="col-3"><p class="labelName"><?php echo $res['HemaNR'] ?></p></div>
				</div>
				<div class="row">
					<div class="col"><p class="labelName">Differential Count</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Neutrophils</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Neutrophils'] ?></p></div>
					<div class="col-2"><p class="labelName">%</p></div>
					<div class="col-3"><p class="labelName">34-71</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Lymphocytes</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Lymphocytes'] ?></p></div>
					<div class="col-2"><p class="labelName">%</p></div>
					<div class="col-3"><p class="labelName">22-53</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Monocytes</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Monocytes'] ?></p></div>
					<div class="col-2"><p class="labelName">%</p></div>
					<div class="col-3"><p class="labelName">5-12</p></div>
				</div>
				<br>
				<div class="row">
					<div class="col"><p class="labelName">SEROLOGY</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">HBsAg</p></div>
					<div class="col"><p class="lineRes1" id="HBSAG"><?php echo $res['HBsAg'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Pregnancy Test</p></div>
					<div class="col"><p class="lineRes1" id="PT"><?php echo $res['PregTest'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Others/Notes</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['SeroOt'] ?></p></div>
				</div>
				<br>
				<div class="row">
					<div class="col"><p class="labelName">DRUG TESTING</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Methamphethamine</p></div>
					<div class="col"><p class="lineRes1" id="DT1"><?php echo $res['Meth'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Tetrahydrocanabinol</p></div>
					<div class="col"><p class="lineRes1" id="DT2"><?php echo $res['Tetra'] ?></p></div>
				</div>
				<br>
				<div class="row">
					<div class="col"><p class="labelName">FECALYSIS</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Color</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['FecColor'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Consistency</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['FecCon'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Microscopic Findings</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['FecMicro'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Others/Notes</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['FecOt'] ?></p></div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col"><p class="labelName">CLINICAL MICROSCOPY</p></div>
				</div>
				<div class="row">
					<div class="col"><p class="labelName">Complete Urinalysis</p></div>
				</div>
				<div class="row">
					<div class="col"><p class="labelName">Physical/Chemical</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Color</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriColor'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Transparency</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriTrans'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">pH</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriPh'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Sp.Gravity</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriSp'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Protein</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriPro'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Glucose</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriGlu'] ?></p></div>
				</div>
				<br>
				<div class="row">
					<div class="col-8"><p class="labelName">Microscopic</p></div>
					<div class="col-4"><p class="labelName">Normal Range</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">RBC</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['RBC'] ?></p></div>
					<div class="col-2"><p class="labelName">/hpf</p></div>
					<div class="col"><p class="labelName">0-3</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">WBC</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['WBC'] ?></p></div>
					<div class="col-2"><p class="labelName">/hpf</p></div>
					<div class="col"><p class="labelName">0-5</p></div>
				</div>
				<br>
				<div class="row">
					<div class="col-5"><p class="labelName">E.Cells</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['ECells'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">M.Threads</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['MThreads'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Amorphous</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['Amorph'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Bacteria</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['Bac'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">CaOx</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['CoAx'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Others/Notes</p></div>
					<div class="col-2"><p class="lineRes1" id="UriNotes"><?php echo $res['UriOt'] ?></p></div>
				</div>
			</div>
		</div>
		<br><br>
			<div class="row">
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $res['Received'] ?></b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $qc['QC'] ?></b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $res['Printed'] ?></b></span></center></div>
			</div>
			<div class="row">
				<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
				<div class="col"><center><p class="labelName">Quality Control</p></center></div>
				<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
			</div>
		</div>
	</div>
	</div>
</div>
<div class="col-sm-12">
	<div class="row">
		<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><center><b>RADIOLOGY REPORT</b></center></div>
		<div class="card-block" style="height: 2.1in;">
			<div class="row">
				<div class="col"><p class="lineName" style="padding-top: 10px;"><?php echo $rad['Comment'] ?></p></div>
			</div>
			<div class="row">
				<div class="col"><p class="labelName" style="padding-top: 10px;">IMPRESSION:</p></div>
			</div>
			<div class="row">
				<div class="col-2"><p class="lineName" style="padding-top: 10px;"></p></div>
				<div class="col-10"><p class="lineName" style="padding-top: 10px;"><?php echo $rad['Impression'] ?></p></div>
			</div>
			<br>
			<div class="row">
				<div class="col-6" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $rad['QA'] ?></b></span></center></div>
				<div class="col-6" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $rad['Radiologist'] ?></b></span></center></div>
			</div>
			<div class="row">
				<div class="col-6" style="padding-top: 0px"><center><span class="labelName"><b>Quality Assurance</b></span></center></div>
				<div class="col-6" style="padding-top: 0px"><center><span class="labelName"><b>Radiologist</b></span></center></div>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<img src="assets/QPDFooter.jpg" height="50px" width="100%">
	</div>
</div>
</div>
<?php }}}}}  }}}?>
</body>
</html>