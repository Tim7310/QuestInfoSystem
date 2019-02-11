<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/lab.php');
$trans = new trans;
$lab = new lab;
$patients = $trans->recentTrans();

?>
<html>
	<head>
		<title>CLINICAL MICROSCOPY</title>
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
<div class="container" style="margin-top: 10px;">
<center><p>LABORATORY CLINICAL MICROSCOPY</p></center>
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
						$pid = $patient['PatientID'];
						$tid = $patient['TransactionID'];
						$data = $lab->getData($pid, $tid, "lab_microscopy");
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
							<td nowrap> 
								<?php if(is_array($data)){ ?>
								<button type="button" class="btn btn-success" onclick="document.location = 'LabMicroscopyVIEW.php?id=<?php echo $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>';">VIEW RECORD</button>
								<?php }else{ ?>
								<button type="button" class="btn btn-primary" onclick="document.location = 'LabMicroscopyADD.php?id=<?php echo $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>';">ADD RECORD</button>
								<?php } ?>
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
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );	
</script>	
</body>
</html> 