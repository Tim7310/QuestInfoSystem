<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/patient.php');
$_GET['id'] = 4;
$_GET['tid'] = 0000000000004;
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);

$transac = new trans;
if (isset($_GET['id'])){
	$tid = $_GET['tid'];
	$id = $_GET['id'];
	$trans = $transac->fetch_data($id,$tid);

	//Get all items data from ID
	$itemID = $trans['ItemID'];
	$itemdata = $transac->each_item($itemID);
	//print_r($itemdata);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Record</title>
	<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
</head>
<style type="text/css">
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
	.labBtn{
		cursor: pointer;
		background-color: #5bc0de;
		color : white;
		text-transform: uppercase;
		z-index: -1;
	}
</style>
<body>
<?php
	include_once('../medtech/labsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Add Laboratory Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col col-md-auto">
						<label>Patient ID.: </label><br>
						<input type="hidden" name="id" value="<?php echo $data['PatientID'] ?>">
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction No.: </label><br>
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
	    <div class="col-md-10 offset-sm-1">
	        <div class="card" style="border-radius: 0px; margin-top: 10px;">
	            <div class="card-header card-inverse card-info"><center><b>Availed Items</b></center></div>
	            <div class="card-block">
	            	<div class="row">	            		
	            		<div class="col col-md-auto">
	            			Item Avail: <p><b><?php foreach ($itemdata as $key) {
	            				echo $key['ItemName']."<br/>"; } ?></b></p>
	            		</div>
	            		<div class="col col-md-auto">
	            			Description: <p><b><?php foreach ($itemdata as $key1) {
	            				echo $key1['ItemDescription']; } ?></b></p>
	            		</div>
	            		<div class="col col-md-auto">
	            			Transaction Type: <p><b><?php echo $trans['TransactionType'] ?></b></p>
	            		</div>
	          
					</div>
	            </div>
	        </div>
	    </div>	
	</div>
	<div class="row">
	    <div class="col-md-10 offset-sm-1">
	        <div class="card" style="border-radius: 0px; margin-top: 10px;">
	            <div class="card-header card-inverse card-info" style="background-color: white">
	            	<button class="btn labBtn" id="urine">Urinalysis</button>
	            	<button class="btn labBtn" id="feca">Fecalysis</button>
	            	<button class="btn labBtn" id="cbc">Complete Blood Count</button>
	            </div>
	            <div class="card-block">
	            		<div class="col col-md-auto" id="loadhere">
	            		</div>
	            </div>
	        </div>
	    </div>	
	</div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var activebtn = {"background-color": "white", "color": "#5bc0de","border-style": "solid" ,"border-color": "#5bc0de", "transform": "scale(1.2,1.2)",
		 "margin-left": "15px",  "margin-right": "15px"};
		var notactivebtn = {"background-color": "#5bc0de", "color": "white", "border-style": "none","transform": "scale(1,1)", "z-index": "-1",
	 	"margin-left": "0px",  "margin-right": "0px"};

		$("#urine").click(function(){
			$(".labBtn").css(notactivebtn);
			$(this).css(activebtn);
			$("#loadhere").load("AddUrinalysis.php",function(){

			});
		});
		$("#feca").click(function(){
			$(".labBtn").css(notactivebtn);
			$(this).css(activebtn);
			$("#loadhere").load("AddFecalysis.php",function(){

			});
		});
		$("#cbc").click(function(){
			$(".labBtn").css(notactivebtn);
			$(this).css(activebtn);
			$("#loadhere").load("AddCBC.php",function(){

			});
		});
		$("#urine").trigger("click");
	});
</script>
</html>
<?php
}}
?>