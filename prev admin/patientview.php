<?php
include_once('connection.php');
include_once('classes/patient.php');
$patient = new Patient;
$patients = $patient->fetch_all();
?>
<html>
	<head>
		<title>Admin Panel</title>
   		<link href="sorting/bootstrap.css" rel="stylesheet">
    	<link href="sorting/dataTables.bootstrap.css" rel="stylesheet">
    	<link href="sorting/dataTables.responsive.css" rel="stylesheet">
	</head>
<body>
<?php
include_once('sidebar.php');
?>
<br><br>	
<div class="container-fluid">
	<div class="col-sm-12 ">
	<div class=" panel panel-info">
		<div class="panel-heading">
			<b>List of Patients</b>
		</div>
		<div class="panel-body">	
 			<div class="dataTable_wrapper">
                <table class="table table-hover table-bordered" id="dataTables-example">
                    <thead>
                    	<th >Date Added</th>
						<th >Name</th>
						<th> Age</th>
						<th> Gender</th>
						<th> Email</th>
						<th> Contact Number</th>
						<th> View</th>
					</thead>
						<?php foreach  ($patients as $patient) {  ?>
					<tr>
							<td>
								<?php echo $patient['date']?>
							</td>	
							<td style="text-transform: uppercase;">
								<?php echo $patient['lasnam']?>,<?php echo $patient['firnam']?> <?php echo $patient['midnam']?> 
							</td>
							<td>
								<?php echo $patient['age']?>
							</td>
							<td>
								<?php echo $patient['gen']?>
							</td>
							<td>
								<?php echo $patient['emaadd']?>
							</td>
							<td>
								<?php echo $patient['connum']?>
							</td>
							<td> 
								<button type="button" class="btn btn-info" onclick="document.location = 'Printform.php?id=<?php echo $patient['id']?>';">View</button>
							
								<button type="button" class="btn btn-info" onclick="document.location = 'result.php?id=<?php echo $patient['id']?>';">Add Result</button>
							</td>

							<?php  } 	?> 
					</tr>
				</table>


    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <script src="sorting/jquery.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="sorting/metisMenu.min.js"></script
    <!-- DataTables JavaScript -->
    <script src="sorting/jquery.dataTables.min.js"></script>
    <script src="sorting/dataTables.bootstrap.min.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

	
</body>
</html> 