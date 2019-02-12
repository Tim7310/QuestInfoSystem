<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/qc.php');
include_once('../classes/rad.php');
include_once('../classes/lab.php');
include_once('../classes/pe.php');
include_once('../classes/vital.php');
include_once('../classes/medhis.php');
include_once('../classes/patient.php');
$patient = new Patient;
$tran = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
	$trans = $tran->Patient_Trans($id);
	$tid = $tran->RecentTransID($id);
	$tid = $tid['TransactionID'];
$His = new His;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$his = $His->fetch_data($id, $tid);
$vital = new vital;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$vit = $vital->fetch_data($id, $tid);
$pe = new pe;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$pe = $pe->fetch_data($id, $tid);
$lab = new lab;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$lab = $lab->fetch_data($id, $tid);
$rad = new rad;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$rad = $rad->fetch_data($id, $tid);
$qc = new qc;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$qc = $qc->fetch_data($id, $tid);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Records Summary</title>
	<link rel="icon" type="image/png" href="../assets/qpd.png">
	<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="../source/CDN/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../source/CDN/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="../source/CDN/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="../source/CDN/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="../source/CDN/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="../source/CDN/jszip.min.js"></script>
	<script type="text/javascript" src="../source/CDN/pdfmake.min.js"></script>
	<script type="text/javascript" src="../source/CDN/vfs_fonts.js"></script>
	<script type="text/javascript" src="../source/CDN/buttons.html5.min.js"></script>
	<script type="text/javascript" src="../source/CDN/buttons.print.min.js"></script>
	<script type="text/javascript" src="../source/CDN/buttons.colVis.min.js"></script>
	<script type="text/javascript" src="../source/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
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
	.card-block
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.col p
	{
		text-transform: uppercase;
	}
		.col-2
	{
		align-self: center;
	}
	button{
		cursor: pointer;
	}
</style>

<body >
<?php
include_once('qcsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Patient Summary Records</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Personal Information</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
						<label>Company Name: </label><br>
						<p><b><?php echo $data['CompanyName'] ?></b></p>
						<label>Applied Position: </label><br>
						<p><b><?php echo $data['Position'] ?></b></p>
						<label>Name:</label><br>
						<p><b><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
						<label>Address: </label><br>
						<p><b><?php echo $data['Address'] ?></b></p>
					</div>
					<div class="col">
						<label>Birthdate: </label><br>
						<p><b><?php echo $data['Birthdate'] ?></b></p>
						<label>Age: </label><br>
						<p><b><?php echo $data['Age'] ?></b></p>
						<label>Gender: </label><br>
						<p><b><?php echo $data['Gender'] ?></b></p>
						<label>Contact No.: </label><br>
						<p><b><?php echo $data['ContactNo'] ?></b></p>
						<label>Email Address: </label><br>
						<p><b><?php echo $data['Email'] ?></b></p>
					</div>
					<div class="col">
						<label>LOE: </label><br>
						<p><b><!-- <?php echo $trans['LOE'] ?> --></b></p>
						<label>AN: </label><br>
						<p><b><!-- <?php echo $trans['AN'] ?> --></b></p>
						<label>AC: </label><br>
						<p><b><!-- <?php echo $trans['AC'] ?> --></b></p>
						<label>Senior ID: </label><br>
						<p><b><!-- <?php echo $trans['SID'] ?> --></b></p>
						<label>Comment: </label><br>
						<p><b><!-- <?php echo $data['Notes'] ?> --></b></p>
						<p><b><!-- <?php echo $trans['Notes'] ?> --></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Transaction</b></center></div>
            <div class="card-block">
            	
					<table  class="table table-striped " style="width: 100%" id="table">
						<THEAD>
							<th>SR No</th>
							<th>Date</th>
							<th>Availed</th>
							<th>Transaction Type</th>							
							<th>Action</th>
						</THEAD>
						<?php 
								foreach ($trans as $key) {
			
						?>
						<tr>
							<td><?php echo $key['TransactionID']?></td>
							<td><?php echo $key['TransactionDate']?></td>
							<td><?php $ids = explode(",", $key['ItemID']);
								foreach ($ids as $id) {
									$item = $tran->fetch_item($id);
									echo $item['ItemName']."<br/>";
								}
							?></td>
							<td><?php echo $key['TransactionType']." - ".$key['SalesType']?></td>
							<td>
								<?php
									if ($key['SalesType'] == 'sales') {
										
								?>
								<button class="btn btn-primary resultbtn">Result</button>
								<input type="hidden" name="transaction" value="<?php echo $key['TransactionID']?>">
								<input type="hidden" name="patient" value="<?php echo $key['PatientID']?>">
								<?php } ?>
							</td>
						</tr>
						<?php } ?>
					</table>
					
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Medical History</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
						<label class="col-12 col-form-label text-right">Significant Past Illness</label>
					</div>
					<div class="col">
						<label class="col-12 col-form-label">YES / NO</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Asthma:</label>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['asth']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Tuberculosis:</label>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['tb']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Diabetes:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['dia']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">High Blood Pressure:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['hb']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Heart Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['hp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Kidney Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['kp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Abdominal/Hernia:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['ab']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Joint/Back/Scoliosis:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['jbs']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Psychiatric Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['pp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Migraine/Headache:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['mh']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Fainting/Seizure:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['fs']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Allergies:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['alle']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Cancer/Tumor:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['ct']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Hepatitis:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['hep']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">STD:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['std']?></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Vital Signs</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
						<label>Height:</label>
						<b><?php echo $vit['height']?></b>
					</div>
					<div class="col">
						<label>Weight:</label>
						<b><?php echo $vit['weight']?></b>
					</div>
					<div class="col">
						<label>BMI:</label>
						<b><?php echo $vit['bmi']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>BP:</label>
						<b><?php echo $vit['bp']?></b>
					</div>
					<div class="col">
						<label>PR:</label>
						<b><?php echo $vit['pr']?></b>
					</div>
					<div class="col">
						<label>RR:</label>
						<b><?php echo $vit['rr']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 col-form-label text-center" ><b>VISUAL ACUITY</b></label>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label><b>Uncorrected</b></label>
					</div>
					<div class="col">
						<label>OD:</label>
						<b><?php echo $vit['uod']?></b>
					</div>
					<div class="col">
						<label>OS:</label>
						<b><?php echo $vit['uos']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label><b>Corrected</b></label>
					</div>
					<div class="col">
						<label>OD:</label>
						<b><?php echo $vit['cod']?></b>
					</div>
					<div class="col">
						<label>OS:</label>
						<b><?php echo $vit['cos']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Ishihara Test:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['cv']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Hearing:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['hearing']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Hospitalization:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['hosp']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Operations:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['opr']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Present Medications:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['pm']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Smoker(sticks/packs/years):</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['smoker']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Alcoholic Drinker:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['ad']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Last Menstrual Period:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['lmp']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Others/Notes:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['Notes']?></b>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Physical Examinations</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
					</div>
					<div class="col">
						<label>NORMAL</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
					</div>
					<div class="col">
						<label>YES/NO</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Skin:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['skin']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Head and Neck:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['hn']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Chest/Breast/Lungs:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['cbl']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Cardiac/Heart:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['ch']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Abdomen:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['abdo']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Extremities:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['extre']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Others/Notes:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['ot']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Findings:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['find']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Physican:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['Doctor']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">License:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['License']?><br></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Patient Results</h4>
      </div>
      <div class="modal-body">
      	<div id="loader"></div>
      </div>
    </div>

  </div>
</div>
<center><button type="button" class="btn btn-primary m-2" onclick="document.location = 'ListOfPatients.php';">BACK
</button></center>
</div>

</body>
</html>
<script>
	$(document).ready(function() {
    var table = $('#table').DataTable( {
        lengthChange: false,
        scrollY:       500,
        scrollCollapse: true,
        "scrollX": true,
        paging:         false,
        "searching": false,
        "info": false,
    } );
 	$(".resultbtn").click(function(){
 		var id = $(this).siblings("input[name='patient']").val();
 		var tid = $(this).siblings("input[name='transaction']").val();
 		$("#loader").load("RecordResult.php",{id: id, tid: tid}, function(){
 			$("#myModal").modal('toggle');
 		});
 	});
   
} );	
</script>
<?php }}}}}}} ?>