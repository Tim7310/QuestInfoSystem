<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
include_once('../connection.php');
include_once('../classes/rad.php');

$rad = new rad;
	if (isset($_GET["from"]) and isset($_GET['to'])) {
		$films = $rad->filmInventory($_GET["from"],$_GET["to"]);
		//print_r($films);
	}else{
		die("Varialbles Not Set");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Film Inventory Table</title>
</head>
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
<body>
<div class="container-fluid" style="margin-top: 10px;">
<center><b><p>XRAY FILM INVENTORY</p></b></center>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
                    	<th >Transaction No.</th>          
                    	<th >Transaction Date</th>
						<th>Company Name</th>
						<th >Patient Name</th>
						<th >Film Size</th>
					</thead>
				<?php 	$f1 = 0;$f2 = 0;$f3 = 0;$f4 = 0;$f5 = 0;$all = 0;
				foreach($films as $film){
					$all++; 
					if($film['xrayFilm'] == "11x14"){
						$f1++;
					}else if ($film['xrayFilm'] == "10x12") {
						$f2++;
					}else if ($film['xrayFilm'] == "14x14") {
						$f3++;
					}else if ($film['xrayFilm'] == "14x17") {
						$f4++;
					}else if ($film['xrayFilm'] == "8x10") {
						$f5++;
					}
				?>				
					<tr>
						<td>
							<?php echo $film['TransactionID']?>
						</td>
						<td>
							<?php echo $film['TransactionDate']?>
						</td>
						<td>
							<?php echo $film['CompanyName']?>
						</td>	
						<td nowrap>
							<?php echo $film['LastName']?>, <?php echo $film['FirstName']?> <?php echo $film['MiddleName']?> 
						</td>
						<td>
							<?php echo $film['xrayFilm']?>
						</td>	
					</tr>
				<?php } ?>
				<tr>
						<td></td><td></td><td></td><td></td><td></td>	
					</tr>
					<tr>
						<td></td><td></td><td></td>	
						<td>11x14 Film Count:</td>
						<td><?php echo $f1 ?></td>	
					</tr>
					<tr>
						<td></td><td></td><td></td>	
						<td>10x12 Film Count:</td>
						<td><?php echo $f2 ?></td>	
					</tr>
					<tr>
						<td></td><td></td><td></td>	
						<td>14x14 Film Count:</td>
						<td><?php echo $f3 ?></td>	
					</tr>
					<tr>
						<td></td><td></td><td></td>	
						<td>14x17 Film Count:</td>
						<td><?php echo $f4 ?></td>	
					</tr>
					<tr>
						<td></td><td></td><td></td>	
						<td>8x10 Film Count:</td>
						<td><?php echo $f5 ?></td>	
					</tr>
					<tr>
						<td></td><td></td><td></td>	
						<td>All Film Count:</td>
						<td><?php echo $all ?></td>	
					</tr>
    </table>
</div>
</body>
</html>
<script>
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       400,
        scrollCollapse: true,
        "scrollX": true,
        paging:         false,
        "order": [[0,"desc"]],
        buttons: ['excel', 'pdf', 'colvis']
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );	
</script>