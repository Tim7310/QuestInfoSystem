<?php
include_once('../connection.php');
include_once('../classes/trans.php');
$transac = new trans;
$trans = $transac->fetch_allCash();
?>
<html>
	<head>
		<title>Transactions Lists CASH</title>
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
include_once('cashsidebar.php');
?>
<div class="container" style="margin-top: 10px;">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
 <thead>
						<th>Date/Time</th>
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
					
						<?php foreach  ($trans as $trans) {  ?>
					<tr>
							<td>
								<?php echo $trans['TransactionDate']?>
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
								<?php echo $trans['LastName']?>,&nbsp;<?php echo $trans['FirstName']?> <?php echo $trans['MiddleName']?> 
							</td>
							<td>
								<?php echo $trans['CompanyName']?>
							</td>
							<td>
								<?php echo $trans['Age']?>/<?php echo $trans['Gender']?>
							</td>
							<td>
								<?php echo $trans['ContactNo']?>
							</td>
							
							<td style="word-wrap: break-word;">
								<?php 
									$items = $transac->each_item($trans['ItemID']);
									foreach ($items as $key) {
									
								?>
								<b><?php echo $key['ItemName']; 
								if ($key['ItemDescription'] != " ") {
										# code...
									
								?></b> 
								(<?php echo $key['ItemDescription']?>)
								<?php
												
									
								 } 
								 $itemEnd = end($items);
								 if ($key[0] != $itemEnd[0]) {
								 	echo ", ";
								 }}
								 ?>
							</td>
							<td > 
								<button type="button" class="btn btn-primary" onclick="document.location = 'Receipt.php?patID=<?php echo $trans['PatientID']?>&transID=<?php echo $trans['TransactionID']?>';">Reprint Receipt</button>
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
        buttons: ['excel', 'pdf', 'colvis' ],
        "columnDefs": [
            {
                "targets": [ 7 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 6 ],
                "visible": false
            },
            {
                "targets": [ 1 ],
                "visible": false
            }
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );	
</script>
</body>
</html>