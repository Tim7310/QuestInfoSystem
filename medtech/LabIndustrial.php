<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/lab.php');
$trans = new trans;
$lab = new lab;
if (!isset($_GET['year'])) {
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$year = date("Y");
}else{
	$year = $_GET['year'];
}
$month = $_GET['month'];
$patients = $trans->fetchByMonth($month,$year,"refund");


?>
<html>
	<head>
		<title>INDUSTRIAL</title>
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
		<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/cosmo-bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
	</head>
	<style type="text/css">
		p
		{
			font-family: "Century Gothic";
			font-size: 36px;
			color: black;
			font-weight: bolder;
		}
	</style>
<body>
<?php
include_once('labsidebar.php');
?>
<div class="container-fluid" style="margin-top: 10px;">
<center><p>LABORATORY INDUSTRIAL</p></center>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
                    	<th>Transaction No.</th>
                    	<th>Patient ID</th>
                    	<th>Transaction Date</th>
						<th>Company Name</th>
						<th>Patient Name</th>
						<th>Package</th>
						<th>Action</th>
					</thead>
					<?php foreach  ($patients as $patient) { 
						$indus = 0;
						$items = explode(",", $patient['ItemID']);
						foreach ($items as $item) {
						 	$itemdata = $trans->fetch_item($item);
						 	if ($itemdata['ItemType'] == 'CashIndustrial' or $itemdata['ItemType'] == 'INDUSTRIAL' or $itemdata["ItemType"] == 'AccountIndustrial') {
						 		$indus++;
						 	}
						 }
						 if ($indus != 0) {
						   
						$pid = $patient['PatientID'];
						$tid = $patient['TransactionID'];
						$data = $lab->getData($pid, $tid, "lab_microscopy");
						$data1 = $lab->getData($pid, $tid, "lab_hematology");
						$data3 = $lab->getData($pid, $tid, "lab_serology");
						$data4 = $lab->getData($pid, $tid, "lab_toxicology");
					?>
						
					<tr>
							<td>
								<?php echo $patient['TransactionID']?>
							</td>
							<td>
								<?php echo $patient['PatientID']?>
							</td>
							<td>
								<?php echo $patient['TransactionDate']?>
							</td>
							<td>
								<?php echo $patient['CompanyName']?>
							</td>	
							<td nowrap>
								<?php echo $patient['LastName']?>,<?php echo $patient['FirstName']?> <?php echo $patient['MiddleName']?> 
							</td>
							<td style="word-wrap: break-word;">
								<?php 
									$items = $trans->each_item($patient['ItemID']);
									foreach ($items as $key) {
									
								?>
								<b><?php echo $key['ItemName']; 
								if ($key['ItemDescription'] != " ") {
										# code...
									
								?></b> 
								
								<?php
												
									
								 } 
								 $itemEnd = end($items);
								 if ($key[0] != $itemEnd[0]) {
								 	echo ", ";
								 }}
								 ?>
							</td>
							<td nowrap>
							<?php 
							if(is_array($data) or is_array($data1) or is_array($data3) or is_array($data4)){
							?>

								<button type="button" class="btn btn-success" onclick="document.location = 'LabIndustrialVIEW.php?id=<?php echo $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>';">VIEW RECORD</button>
							<?php }else{ ?>
								<button type="button" class="btn btn-primary" onclick="document.location = 'LabIndustrialADD.php?id=<?php echo $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>';">ADD RECORD</button>
							<?php } ?>	
							</td>

					</tr>
					<?php  } 
				}	?> 
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
        "order": [[0,"desc"]],
        buttons: ['excel', 'pdf', 'colvis', 
        {
                extend: 'collection',
                text: 'Month',
                buttons: [
                    {
                        text: 'January',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=1&year=<?php echo $year ?>";
                        }
                    },
                    {
                        text: 'February',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=2&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'March',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=3&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'April',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=4&year=<?php echo $year ?>";
                        }
                    },
                    {
                        text: 'May',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=5&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'June',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=6&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'July',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=7&year=<?php echo $year ?>";
                        }
                    },
                    {
                        text: 'August',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=8&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'September',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=9&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'October',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=10&year=<?php echo $year ?>";
                        }
                    },
                    {
                        text: 'November',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=11&year=<?php echo $year ?>";
                        }
            		},
            		{
                        text: 'December',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "LabIndustrial.php?month=12&year=<?php echo $year ?>";
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