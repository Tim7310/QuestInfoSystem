<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/rad.php');
$rad = new rad;
$trans = new trans;
$patients = $trans->fetch_all();
$partsArray = array("CHEST PA", 
					"CHEST AP LATERAL", 
					"PELVIMETRY",
					"LUMBOSACRAL",
					"SKULL",
					"ZYGOMATIC BONE",
					"NASAL BONE",
					"PARANASAL SINUSES",
					"TEMPORAL BONE",
					"MANDIBLE",
					"SHOULDER JOINT",
					"HUMERUS",
					"ELBOW JOINT",
					"FOREARM",
					"WRIST",
					"HAND",
					"HIP JOINT",
					"FEMUR",
					"CALCANEUS",
					"KNEE JOINT",
					"LEG ANKLE JOINT",
					"FOOT",
					"CERVICAL SPINE",
					"THORACIC SPINE",
					"COCCYX",
					"LUMBAR SPINE",
					"PELVIS");
?>


<html>
	<head>
		<title>Radiology Marker Printing</title>
		<link rel="icon" type="image/png" href="../assets/qpd.png">
		<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="../source/CDN/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/jszip.min.js"></script>
		<script type="text/javascript" src="../source/CDN/pdfmake.min.js"></script>
		<script type="text/javascript" src="../source/CDN/vfs_fonts.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.html5.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.print.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.colVis.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
		
	</head>
<style type="text/css">
	button{
		cursor: pointer
	}
	.form-control{
		font-size: 14px !important;

	}
</style>
	<body>
	<?php
	include_once('radsidebar.php');
	?>

	<div class="container-fluid" style="margin-top: 10px;">
	<div class="row">
		<div class="col-md-10">
	
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	           <thead>
	            	<th nowrap>Transaction No.</th>
	            	<th>Patient ID</th>
	            	<th nowrap>Transaction Date</th>
					<th>Company Name</th>
					<th nowrap>Patient Name</th>
					<th>Action</th>
				</thead>
				<?php foreach  ($patients as $patient) {  
						$havexray = 0;
						$items = $trans->each_item($patient['ItemID']);
						foreach ($items as $item) {
							$xcount = $trans->itemXray($item['ItemID']);
							$havexray = $xcount + $havexray;

						}
						if ($havexray > 0 ) {
							//echo $havexray;
						
					?>
				

					<tr>
						<form method = "get" action = "PrintMarker.php">
						<td>
							<?php echo $patient['TransactionID']?>
							<input type = "hidden" name = "tid" value = "<?php echo $patient['TransactionID']?>">
						</td>
						<td>
							<?php echo $patient['PatientID']?>
							<input type = "hidden" name = "id" value = "<?php echo $patient['PatientID']?>">

						</td>
						<td>
							<?php echo $patient['TransactionDate']?>
						</td>
						<td>
							<?php echo $patient['CompanyName']?>
						</td>	
						<td nowrap>
							<?php echo $patient['LastName' ].", ".$patient['FirstName'] ." ". $patient['MiddleName']?> 
						</td>
						<td > 
							<select type="button" class="btn btn-primary" name = "filmSize"  required> 
								<option value=""  selected disabled>Film Size</option>
								<option value = "11x14"> 11x14 </option>
								<option value = "10x12"> 10x12 </option>
								<option value = "14x14"> 14x14 </option>
								<option value = "14x17"> 14x17 </option>
								<option value = "8x10"> 8x10 </option>
							</select>
							<select type="button" class="btn btn-primary " name = "RadTech" required> 
								<option value=""  selected disabled>Radtech</option>
								<option value = "JORGE"> JORGE </option>
								<option value = "ARBY"> ARBY </option>
							</select>
							<select type="button" class="btn btn-primary mt-2" name = "Part"  required> 
								<option value=""  selected disabled>Body Part</option>
								<?php foreach ($partsArray as $key)
								{ ?>
									<option value = "<?php echo $key?>"> <?php echo $key?></option>
								<?php } ?>

							</select>
							<button type="submit" name="submit" class = "btn btn-secondary mt-2">
								Print
							</button>
						</td>
						</form>
					</tr>
				
				<?php  } }	?> 
		    </table>
		</div>
	
	<div class="col-md-2 ">
		<div class="row mt-2">
			<div class="col-md-11  p-2" style="background-color: #2980B9; color: white; font-weight: bolder">PRINT STICKERS</div>
		</div>
		<form action="sticker.php" method="get" target="_blank" >
		<div class="row ">
			<div class="col-md-11" class="form-control">
				<label style="font-weight: bold"> By Date:</label> 
			</div>
			<div class="col-md-11 mb-1">
				<input type="text" name="startdate" class="form-control" placeholder="yyyy:mm:dd hh:mm:ss" required="">
			</div>
			<div class="col-md-11 mb-1">
				<input type="text" name="enddate" class="form-control" placeholder="yyyy:mm:dd hh:mm:ss" required="">
			</div>
			<div class="col-md-11 mb-1" class="form-control">
				<center><button class="btn btn-primary pb-1 pt-1">PRINT</button></center>
			</div>
		</div>
		</form>
		<form action="sticker.php" method="get" target="_blank" >
		<div class="row">
			<div class="col-md-11" class="form-control">
				<label style="font-weight: bold"> By IDs:</label> 
			</div>
			<div class="col-md-11 mb-1">
				<input type="text" name="id1" class="form-control" placeholder="Transaction ID 1" required="">
			</div>
			<div class="col-md-11 mb-1">
				<input type="text" name="id2" class="form-control" placeholder="Transaction ID 2" required="">
			</div>
			<div class="col-md-11 mb-1" class="form-control">
				<center><button class="btn btn-primary pb-1 pt-1">PRINT</button></center>
			</div>
		</div>
		</form>
	</div>
	</div>
</div>

		<script type="text/javascript">
			$(document).ready(function() {
		    var table = $('#example').DataTable( {
		        lengthChange: false,
		        scrollY:       500,
		        scrollCollapse: true,
		        "scrollX": true,
		        paging:         false,
		        buttons: ['excel', 'pdf', 'colvis' ], 
		        "order": [[ 0, "desc" ]]
		    } );
		 
		    table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
			
		} );	
		</script>	
	</body>
</html> 