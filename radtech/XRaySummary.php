<?php
include_once('../connection.php');
include_once('../classes/rad.php');
$rads = new rad;
if (!isset($_GET['year'])) {	
	$year = date("Y");
}else{
	$year = $_GET['year'];
}
if (!isset($_GET['month'])) {
	$month = date("m");
}else{
	$month = $_GET['month'];
}
$rad= $rads->fetchByMonth($month,$year);
?>
<html>
	<head>
		<title>List Of Patients</title>
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
		<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/flatly-bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
	</head>
	<style type="text/css">
		thead
		{
			white-space: nowrap;
		}
		button{
			cursor: pointer;
			width: 200px !important;
			margin-bottom: 2px !important;
		}
	</style>
<body>
<?php
include_once('radsidebar.php');
?>
<div class="container-fluid" style="margin-top: 10px;">
	<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" style="overflow-x:scroll;">
		<thead>
                    	<th>ID</th>
                    	<th>Date</th>
						<th>Company Name</th>
						<th>Patient Name</th>
						<!-- <th>Comment</th> -->
						<th>Impression</th>
						<th>Radiologist</th>
						<th>Quality Assurance</th>
						<th>Action</th>
					</thead>
					<?php foreach  ($rad as $rad) {  ?>
					<tr>
							<td>
								<?php echo $rad['TransactionID']?>
							</td>
							<td>
								<?php echo $rad['TransactionDate']?>
							</td>
							<td>
								<?php echo $rad['CompanyName']?>
							</td>	
							<td>
								<?php echo $rad['LastName']?>,<?php echo $rad['FirstName']?> <?php echo $rad['MiddleName']?> 
							</td>
							<!-- <td>
								<?php echo $rad['Comment']?>
							</td> -->
							<td>
								<?php echo $rad['Impression']?>
							</td>
							<td>
								<?php echo $rad['Radiologist']?>
							</td>
							<td>
								<?php echo $rad['QA']?>
							</td>
							<td>
								<button type="button" class="btn btn-info" onclick="document.location = 'XRayEDIT.php?id=<?php echo $rad['PatientID']?>&tid=<?php echo $rad['TransactionID']?>';">UPDATE RECORD</button>
								<button type="button" class="btn btn-primary" onclick="document.location = 'XRayResult.php?id=<?php echo $rad['PatientID']?>&tid=<?php echo $rad['TransactionID']?>';">PRINT RESULT</button>
							</td>

					</tr>
					<?php  } 	?> 
				</table>
</div>


<script>
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       400,
        scrollCollapse: true,
        "scrollX": true,
        paging:         false,
		buttons: ['excel', 'pdf', 'colvis',
		{
        		extend: 'collection',
                text: 'Month',
                buttons: [
		{
			text: 'January',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=1&year=<?php echo $year ?>";
			}
		},
		{
			text: 'February',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=2&year=<?php echo $year ?>";
			}
		},
		{
			text: 'March',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=3&year=<?php echo $year ?>";
			}
		},
		{
			text: 'April',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=4&year=<?php echo $year ?>";
			}
		},
		{
			text: 'May',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=5&year=<?php echo $year ?>";
			}
		},
		{
			text: 'June',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=6&year=<?php echo $year ?>";
			}
		},
		{
			text: 'July',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=7&year=<?php echo $year ?>";
			}
		},
		{
			text: 'August',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=8&year=<?php echo $year ?>";
			}
		},
		{
			text: 'September',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=9&year=<?php echo $year ?>";
			}
		},
		{
			text: 'October',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=10&year=<?php echo $year ?>";
			}
		},
		{
			text: 'November',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=11&year=<?php echo $year ?>";
			}
		},
		{
			text: 'December',
			action: function ( e, dt, node, config ) {
				window.location.href = "XRaySummary.php?month=12&year=<?php echo $year ?>";
			}
		}
	]}
		], 
        "order": [[ 0, "desc", ]]
    } );

    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );	
</script>	
</body>
</html>