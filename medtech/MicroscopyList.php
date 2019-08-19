<?php
include_once('../connection.php');
include_once('../classes/lab.php');
$lab = new lab;
if (!isset($_GET['month'])) {
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$year = date("Y");
	$month = date("m");
}else{
	$year = $_GET['year'];
	$month = $_GET['month'];
}
$data = $lab->fetchlabByDate("lab_microscopy",$month,$year);


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
		<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
	</head>
<body>
<?php
include_once('labsidebar.php');
?>
<div class="container-fluid" style="margin-top: 10px;">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
                    	<th>Transaction ID</th>
                    	<th nowrap>Last Update</th>
						<th>Company Name</th>
						<th nowrap>Patient Name</th>
						<th>Action</th>
					</thead>
					<?php foreach  ($data as $patient) {  
						$transID = $patient['TransactionID'];
					?>
					
					<tr>
							<td>
								<?php echo $transID?>
							</td>
							<td>
								<?php echo $patient['CreationDate']?>
							</td>
							<td>
								<?php echo $patient['CompanyName']?>
							</td>	
							<td nowrap>
								<?php echo $patient['LastName']?>,<?php echo $patient['FirstName']?> <?php echo $patient['MiddleName']?> 
							</td>
							<td > 
								<?php 
									$pid = $patient['PatientID'];
									$tid = $transID[0];
									$count = $lab->checkPrint($pid, $tid, 'MICROSCOPY');
									if ($count > 0) {
										$class = "btn-warning";
									}else{
										$class = "btn-info";
									}

								?>
								<button type="button" class="btn <?php echo $class; ?>" onclick="document.location = 'LabMicroscopyFORM.php?id=<?php echo $patient['PatientID']."&tid=".$transID?>';">View Certificate</button>
							</td>

					</tr>
					<?php  } 	?> 
    </table>
</div>


<script>
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       500,
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
						   window.location.href = 
						   "MicroscopyList.php?month=1&year=<?php echo $year ?>";
                        }
                    },
                    {
                        text: 'February',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=2&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'March',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=3&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'April',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=4&year=<?php echo $year ?>";
                        }
                    },
                    {
                        text: 'May',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=5&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'June',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=6&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'July',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=7&year=<?php echo $year ?>";
                        }
                    },
                    {
                        text: 'August',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=8&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'September',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=9&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'October',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=10&year=<?php echo $year ?>";
                        }
                    },
                    {
                        text: 'November',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=11&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'December',
                        action: function ( e, dt, node, config ) {
						   window.location.href = 
						   "MicroscopyList.php?month=12&year=<?php echo $year ?>";
                        }
            		}
            		]
           }
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );	
</script>	
</body>
</html> 