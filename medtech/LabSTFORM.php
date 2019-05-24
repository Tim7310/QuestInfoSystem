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
	$data1 = $lab->getData($id,$tid,"lab_toxicology");
	$data2 = $lab->getData($id,$tid,"lab_serology");
	if (is_array($data1)) {
		$data = $lab->getData($id,$tid,"lab_toxicology");
	}else{
		$data = $lab->getData($id,$tid,"lab_serology");
	}

date_default_timezone_set("Asia/Kuala_Lumpur");
$printdate = date("Y-m-d H:i:s");

// $printCount = $lab->checkPrint($id, $tid, 'CHEMISTRY');
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
	width: 50px;
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
.seroname{
	font-family: "Garamond";
	margin-top: 8px;
	font-size: 20px;
	font-weight: bold;
	color: #104E8B;
}
.serores{
	font-family: "Garamond";
	font-size: 20px;
	font-weight: bolder;
	border-bottom: 1px solid black;
	text-align: center;
	height: 30px;	

}
.resunit{
	font-weight: bold;
	margin-top: 5px;
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
	        	<?php 
	        if ($data['CompanyName'] != "WALK-IN") {
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
	<div class="card-block" style="height: 7in;">
	<!--Serology-->
	<?php if(is_array($data2)){ ?>
	<div class="container-fluid" id="serology">
		<div class="row">
			<div class="col-12 labelName">
				SEROLOGY
			</div>
		</div>
		<?php if( $data2['HBsAG'] != '' and $data2['HBsAG'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-5 seroname" >
				HBsAG
			</div>		
			<div class="col-3 serores" >
				<?php echo $data2['HBsAG'] ?>
			</div>				
		</div>
		<?php } ?>
		<?php if( $data2['AntiHav'] != '' and $data2['AntiHav'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-5 seroname" >
				Anti Hav
			</div>
			<div class="col-3 serores">
				<?php echo $data2['AntiHav'] ?>
			</div>
		</div>
		<?php } ?>	
		<?php if( $data2['VDRL'] != '' and $data2['VDRL'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-5 seroname" >
				VDRL/RPR Screening
			</div>
			<div class="col-3 serores">
				<?php echo $data2['VDRL'] ?>
			</div>
		</div>
		<?php } ?>
		
		
		<?php if( $data2['AntiHBS'] != '' and $data2['AntiHBS'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-5 seroname" >
				Anti-HBS
			</div>
			<div class="col-3 serores">
				<?php echo $data2['AntiHBS'] ?>
			</div>		
		</div>
		<?php } ?>
		<?php if( $data2['HBeAG'] != '' and $data2['HBeAG'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-5 seroname">
				Anti-HBS
			</div>
			<div class="col-3 serores">
				<?php echo $data2['HBeAG'] ?>
			</div>		
		</div>
		<?php } ?>
		<?php if( $data2['AntiHBE'] != '' and $data2['AntiHBE'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-5 seroname" >
				Anti-HBS
			</div>
			<div class="col-3 serores">
				<?php echo $data2['AntiHBE'] ?>
			</div>		
		</div>
		<?php } ?>
		<?php if( $data2['AntiHBC'] != '' and $data2['AntiHBC'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-5 seroname" >
				Anti-HBC
			</div>
			<div class="col-3 serores">
				<?php echo $data2['AntiHBC'] ?>
			</div>		
		</div>
		<?php } ?>
		<?php if( $data2['TYDOTIgM'] != '' and $data2['TYDOTIgM'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-4 seroname" >
				TYPHIDOT
			</div>
			<div class="col-1 resunit">
				IgM: 
			</div>
			<div class="col-3  serores">
				<?php echo $data2['TYDOTIgM'] ?>
			</div>	
		</div>
		<div class="row">
			<div class="col-4 seroname" >
				
			</div>
			<div class="col-1 resunit">
				IgG: 
			</div>
			<div class="col-3 serores">
				<?php echo $data2['TYDOTIgG'] ?>
			</div>		
		</div>
		<?php } ?>
		<?php if ($data2['PSAnti'] != '' and $data2['PSAnti'] != 'N/A') {			
			?>
			<div class="row " >
			    <div class="col-5 seroname">PSA ( Prostate-Specific Antigen )</div>
			    <div class="col-2 serores">
	            	<?php echo $data2['PSAnti'] ?>
	            </div>
	            <div class="col-1"></div>
	            <div class="col-2">
	            	<p class="resunit">ng/mL 0-4</p>
	            </div>
			</div>
		<?php } ?>
		<?php if ($data2['CEA'] != '' and $data2['CEA'] != 'N/A') {			
			?>
			<div class="row" >
			    <div class="col-5 seroname">Carcinoembryonic Antigen (CEA)</div>
			    <div class="col-2 serores">
	            	<?php echo $data2['CEA'] ?>
	            </div>
	            <div class="col-1"></div>
	             <div class="col-2">
	            	<p class="resunit">ng/mL 0 - 5</p>
	            </div>
			</div>
		<?php } ?>
		<?php if ($data2['AFP'] != '' and $data2['AFP'] != 'N/A') {			
			?>
			<div class="row" >
			    <div class="col-5 seroname">Alpha-fetoprotein (AFP)</div>
			    <div class="col-2 serores">
	            	<?php echo $data2['AFP'] ?>
	            </div>
	            <div class="col-1"></div>
	             <div class="col-2">
	            	<p class="resunit">IU/mL 0.5 - 5.5</p>
	            </div>
			</div>
		<?php } ?>
		<?php if ($data2['CA125'] != '' and $data2['CA125'] != 'N/A') {			
			?>
			<div class="row" >
			    <div class="col-5 seroname">Cancer Antigen 125 (CA 125)</div>
			    <div class="col-2 serores">
	            	<?php echo $data2['CA125'] ?>
	            </div>
	            <div class="col-1"></div>
	             <div class="col-2">
	            	<p class="resunit">U/mL 0 - 35</p>
	            </div>
			</div>
		<?php } ?>
		<?php if ($data2['CA19'] != '' and $data2['CA19'] != 'N/A') {			
			?>
			<div class="row" >
			    <div class="col-5 seroname">CA 19-9</div>
			    <div class="col-2 serores">
	            	<?php echo $data2['CA19'] ?>
	            </div>
	            <div class="col-1"></div>
	             <div class="col-2">
	            	<p class="resunit">U/mL 0 - 39</p>
	            </div>
			</div>
		<?php } ?>
		<?php if ($data2['CA15'] != '' and $data2['CA15'] != 'N/A') {			
			?>
			<div class="row" >
			    <div class="col-5 seroname">Cancer Antigen 15-3 (CA 15-3)</div>
			    <div class="col-2 serores">
	            	<?php echo $data2['CA15'] ?>
	            </div>
	            <div class="col-1"></div>
	             <div class="col-2">
	            	<p class="resunit">U/mL 0 - 25</p>
	            </div>
			</div>
		<?php } ?>
		<?php if ($data2['TSH'] != '' and $data2['TSH'] != 'N/A') {			
			?>
			<div class="row" >
			    <div class="col-5 seroname">Thyroid Stimulating Hormone (TSH)</div>
			    <div class="col-2 serores">
	            	<?php echo $data2['TSH'] ?>
	            </div>
	            <div class="col-1"></div>
	             <div class="col-2">
	            	<p class="resunit">uIU/mL 0.40 - 4.0</p>
	            </div>
			</div>
		<?php } ?>
		<?php if ($data2['FT3'] != '' and $data2['FT3'] != 'N/A') {			
			?>
			<div class="row" >
			    <div class="col-5 seroname">Free Triiodothyronine (FT3)</div>
			    <div class="col-2 serores">
	            	<?php echo $data2['FT3'] ?>
	            </div>
	            <div class="col-1"></div>
	             <div class="col-2">
	            	<p class="resunit">ng/dL 1.4-4.2</p>
	            </div>
			</div>
		<?php } ?>
		<?php if ($data2['FT4'] != '' and $data2['FT4'] != 'N/A') {			
			?>
			<div class="row" >
			    <div class="col-5 seroname">Free Thyroxine (FT4)</div>
			    <div class="col-2 serores">
	            	<?php echo $data2['FT4'] ?>
	            </div>
	            <div class="col-1"></div>
	             <div class="col-2">
	            	<p class="resunit">ng/dL 0.8-4.2</p>
	            </div>
			</div>
		<?php } ?>
		<?php if( $data2['CRPRes'] != '' and $data2['CRPRes'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-4 seroname" >
				C-Reactive Protein (CRP)
			</div>
			<div class="col-1 resunit">
				Dilution: 
			</div>
			<div class="col-2  serores">
				<?php echo $data2['CRPdil'] ?>
			</div>	
		</div>
		<div class="row">
			<div class="col-4 seroname" >
				
			</div>
			<div class="col-1 resunit">
				Result: 
			</div>
			<div class="col-2 serores">
				<?php echo $data2['CRPRes'] ?>
			</div>	
			 <div class="col-1"></div>
			<div class="col-2">
            	<p class="resunit">< 6 mg/L</p>
            </div>	
		</div>
		<?php } ?>
		<?php if( $data2['HIV1'] != '' and $data2['HIV1'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-4 seroname" >
				Human Immunodeficiency Viruses ( HIV )
			</div>
		</div>
		<div class="row">
			<div class="col-5 seroname">
				TEST 1
			</div>
			<div class="col-3 serores">
				<?php echo $data2['HIV1'] ?>
			</div>		
		</div>
		<div class="row">
			<div class="col-5 seroname">
				TEST 2
			</div>
			<div class="col-3 serores">
				<?php echo $data2['HIV2'] ?>
			</div>		
		</div>
		<?php } ?>
		<?php if( $data2['SeroOt'] != '' and $data2['SeroOt'] != 'N/A'){ ?>
		<div class="row">
			<div class="col-5 seroname" >
				OTHER NOTES
			</div>
			<div class="col-5 serores">
				<?php echo $data2['SeroOt'] ?>
			</div>		
		</div>
		<?php } ?>	
</div>
	<?php } ?>
	<?php if(is_array($data1)){ 
		// if ($data1['Meth'] != 'N/A' and $data['Tetra'] ) {
			# code...
		
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 labelName pt-5">
				DRUG TEST SCREENING
			</div>
		</div>
		<div class="row">
			<div class="col-5 names p-4" style="font-size: 20px">
				Methamphethamine
			</div>
			<div class="col-4 line p-4" >
				<?php echo $data1['Meth'] ?>
			</div>		
		</div>
		<div class="row">
			<div class="col-5 names p-4" style="font-size: 20px">
				Tetrahydrocanabinol
			</div>
			<div class="col-4 line p-4 " >
				<?php echo $data1['Tetra'] ?>
			</div>		
		</div>
		<div class="row">
			<div class="col-5 names p-4" style="font-size: 25px">
				DRUG TEST RESULT
			</div>
			<div class="col-4 line p-4 " style="font-size: 25px">
				<?php echo $data1['Drugtest'] ?>
			</div>		
		</div>
		
	</div>
	<?php } ?>
	</div>
	</div>
</div>

<script type="text/javascript">
	// $(document).ready(function(){
	// 	var pcount = "<?php echo $printCount; ?>";
	// 	pcount = parseInt(pcount);
	// 	if (pcount > 0) {
	// 		$.confirm({
	// 			title: 'Confirm',
	// 			content: 'You have already printed this result '+pcount+' Time/s',
	// 			theme: 'modern',
	// 			buttons: {
	// 				cancel: {
	// 					text: 'cancel',
	// 					btnClass: 'btn-primary',
	// 					action: function(){
	// 						window.location.href = "ChemList.php";
	// 					}
	// 				},
	// 				yes: {
	// 					text: 'yes',
	// 					btnClass: 'btn-danger',
	// 					action: function(){
							
	// 					}
	// 				}
	// 			}
	// 		});
	// 	}
	// 	window.onafterprint = function() {
	// 		var tid = "<?php echo $tid; ?>";
	// 		var pid = "<?php echo $id; ?>";
	// 		var test = "CHEMISTRY";
	// 	   $.post("PrintCount.php",{pid: pid, tid: tid, test: test},function(){
	// 	   		window.location.href = "ChemList.php";
		   		
	// 	   });   
	// 	};
	
	// });
</script>
</div>
</body>
</html>
<?php } ?>