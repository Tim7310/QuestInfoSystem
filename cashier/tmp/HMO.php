<?php
include_once('../connection.php');
include_once('../classes/hmo.php');
$trans = new trans;
$trans = $trans->fetch_all();
?>
<html>
	<head>
		<title>HMO Account</title>
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
	include_once('accountsidebar.php');
	?>
	<div class="container">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<th>Date/Time</th>
						<th>HMO</th>
						<th>ID</th>
						<th>Transaction Type</th>
						<th>Transaction No.</th>
						<th>Customer Name</th>
						<th>Company</th>
						<th>Age/Gender</th>
						<th>Contact No.</th>
						<th>Package</th>
						<th>ACTION</th>
					</thead>
						
						<?php 
						foreach  ($trans as $trans) {  
							?>
					<tr>
							<td>
								<?php echo $trans['TransactionDate']?>
							</td>
							<td>
								<?php echo $trans['Biller']?>
							</td>
							<td>
								<?php echo $trans['TransactionID']?>
							</td>
							<td>
								<?php echo $trans['TransactionType']?>
							</td>
							<td>
								<?php echo $trans['PatientID']?>
							</td>	
							<td nowrap>
								<?php echo $trans[23][0]['LastName']?>,<?php echo $trans[23][0]['FirstName']?> 
								<?php echo $trans[23][0]['MiddleName']?> 
							</td>
							<td>
								<?php echo $trans[23][0]['CompanyName']?>
							</td>
							<td>
								<?php echo $trans[23][0]['Age']?>/<?php echo $trans[23][0]['Gender']?>
							</td>
							<td>
								<?php echo $trans[23][0]['ContactNo']?>
							</td>
							<td nowrap>
								<b><?php echo $trans['ItemName']?></b> (<?php echo $trans['ItemDescription']?>)
							</td>
							<td nowrap> 
								<button type="button" class="btn btn-primary" onclick="document.location = 'ForREPrintAccount.php?id=<?php echo $trans['PatientID']?>&tid=<?php echo $trans['TransactionID']?>';">Reprint Receipt</button>
								<button type="button" class="btn btn-primary" onclick="document.location = 'HMOEdit.php?id=<?php echo $trans[23][0]['PatientID']?>&tid=<?php echo $trans['TransactionID']?>';">UPDATE</button>
							</td>


							<?php  }	?> 
					</tr>
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
