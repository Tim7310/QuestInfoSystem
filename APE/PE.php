<?php
include_once("classes.php");
include_once("dbConnect.php");
include_once('../classes/trans.php');

$trans = new trans;
$data = new apeData;
$patients = $trans->fetch_all();
?>
<html>
	<head>
		<title>Medical History and Vital Signs</title>
		
		
	</head>
<style type="text/css">
	button{
		width: 140px;
		text-align: center;
	}
</style>

<body>
<div class="container" >
<div class="card">
<div class="card-header card-header-primary">
  <h4 class="card-title">Medical History and Vital Sign</h4>  
</div>
<div class="card-body">
  <table id="example" class="table table-striped " cellspacing="0" width="100%">
	<thead>
    	<th>Transaction No.<button style="display: none" id="trigbtn"></button></th>
    	<th>Patient ID</th>
    	<!-- <th nowrap>Transaction Date</th> -->
		<th>Company Name</th>
		<th>Patient Name</th>
		<th>Action</th>
	</thead>
	<?php foreach  ($patients as $patient) {  ?>
	
	<tr>
			<td>
				<?php echo $patient['TransactionID']?>
			</td>
			<td>
				<?php echo $patient['PatientID']?>
			</td>
			<!-- <td>
				<?php echo $patient['TransactionDate']?>
			</td> -->
			<td>
				<?php echo $patient['CompanyName']?>
			</td>	
			<td nowrap>
				<?php echo $patient['LastName']?>,<?php echo $patient['FirstName']?> <?php echo $patient['MiddleName']?> 
			</td>
			<td width="100px"> 
				<?php 
					if ($data->checkPE($patient['TransactionID']) != 0) {
				?>
				 <a href="PE/MHVSVIEW.php?id=<?php echo  $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>" >
				<button type="button" class="btn btn-info">VIEW RECORD</button></a>
			<?php }else{ ?>
				 <a href="PE/MHVSADD.php?id=<?php echo  $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>" > 
					<button type="button" class="btn btn-primary addBtn">ADD RECORD</button> </a> 
			<?php } ?>
			</td>

	</tr>
	<?php  } 	?> 
    </table>
</div>
</div>
</div>

<script>
	$(document).ready(function() {

    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       700,
        scrollCollapse: true,
        "scrollX": true,
        paging: true,
        buttons: ['excel', 'pdf' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    
} );	
</script>	
</body>
</html> 