<?php
include_once('connection.php');
include_once('classes/patient.php');
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Referral Form</title>

<link rel="stylesheet" media="all" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<style type="text/css" media="all">
.form-control{
	margin-bottom: 10px;
	width:350px;
}

</style>
<body >
<?php
include_once('sidebar.php');
?>


<div class="container">
<h2><b><center>PATIENT INFORMATION</center></b></h2>
<div class="form-group">
<div class="Col-sm-12">
<font face="Lucida Sans Unicode" size="3px">
	<table class="table table-hover">
		<div class="col-sm-12">

					<tr>
					<td>Patient Code:</td>
					<td> <?php echo $data['Code'] ?><br></td>
					</tr>

					<tr>
					<td>First Name: </td>
					<td><?php echo $data['firnam'] ?> <br> 
					</td>
					</tr>

					<tr>
					<td>
					Middle Name : </td>
					<td>
					<?php echo $data['midnam'] ?> <br>
					</td>
					</tr>

					<tr>
					<td>Last Name: </td>
					<td>
					<?php echo $data['lasnam'] ?> <br>
					</td>
					</tr>


					<tr>
					<td>Applied Position:</td>
					<td> <?php echo $data['apppos'] ?><br></td>
					</tr>


					<tr>
					<td>Address: </td>
					<td>
					<?php echo $data['address'] ?> <br>
					</td>
					</tr>

					<tr>
					<td>Birth Date: </td>
					<td>
					<?php echo $data['birdat'] ?> <br> 
					</td>
					</tr>

					<tr>
					<td>Age: </td>
					<td>
					<?php echo $data['age'] ?> <br>
					</td>
					</tr>

					<tr>
					<td>Gender: </td>
					<td>
					<?php echo $data['gen'] ?> <br> 
					</td>
					</tr>

					<tr>
					<td>Contact Number: </td>
					<td>
					<?php echo $data['connum'] ?> <br>
					</td>
					</tr>

					<tr>
					<td>Email Address </td>
					<td>
					<?php echo $data['emaadd'] ?> <br>
					</td>
					</tr>
		</div>
	</table>
</div>
</font>
<?php } ?>



</div>
</body>
</html>
