<?php
include_once('connection.php');
include_once('viewpatient.php');
include_once('classes/lab.php');
$lab = new lab;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $lab->fetch_data($id);
	
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
<h2><b><center>PATIENT LAB RESULTS</center></b></h2>
<div class="form-group">
<div class="Col-sm-12">
<font face="Lucida Sans Unicode" size="3px">
	<table class="table table-hover">
		<div class="col-sm-12">

				<tr>
				<td>Result Added:</td>
				<td> <?php echo $data['date'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>White Blood Cells:</td>
				<td> <?php echo $data['WhiteBlood'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>Hemoglobin:</td>
				<td><?php echo $data['Hemoglobin'] ?> <br> 
				</td>
				</tr>

				<tr>
				<td>Hematocrit:</td>
				<td>
				<?php echo $data['Hematocrit'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>Neutrophils:</td>
				<td>
				<?php echo $data['Neutrophils'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>Lymphocytes:</td>
				<td>
				<?php echo $data['Lymphocytes'] ?> <br>
				</td>
				</tr>
				
				<tr>
				<td>Monocytes:</td>
				<td>
				<?php echo $data['Monocytes'] ?> <br> 
				</td>
				</tr>

				<tr>
				<td>METHAMPHETHAMINE: </td>
				<td>
				<?php echo $data['Meth'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>TETRAHYDROCANABINOL: </td>
				<td>
				<?php echo $data['Tetra'] ?> <br> 
				</td>
				</tr>

				<tr>
				<td>HBsAg: </td>
				<td>
				<?php echo $data['HBsAg'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>PREGNANCY TEST:</td>
				<td>
				<?php echo $data['PregTest'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>FECALISYS Color:</td>
				<td>
				<?php echo $data['FecColor'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>FECALISYS Consistency:</td>
				<td>
				<?php echo $data['FecCon'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>FECALISYS Microscopic Findings:</td>
				<td>
				<?php echo $data['FecMicro'] ?> <br>
				</td>
				</tr>



				<tr>
				<td>URINALYSIS Color:</td>
				<td>
				<?php echo $data['UriColor'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>URINALYSIS Transparency:</td>
				<td>
				<?php echo $data['UriTrans'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>URINALYSIS pH:</td>
				<td>
				<?php echo $data['UriPh'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>URINALYSIS Sp. Gravity:</td>
				<td>
				<?php echo $data['UriSp'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>URINALYSIS Protein:</td>
				<td>
				<?php echo $data['UriPro'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>URINALYSIS Glucose:</td>
				<td>
				<?php echo $data['UriGlu'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>RBC:</td>
				<td>
				<?php echo $data['RBC'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>WBC:</td>
				<td>
				<?php echo $data['WBC'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>E.Cells:</td>
				<td>
				<?php echo $data['ECells'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>M.Threads:</td>
				<td>
				<?php echo $data['MThreads'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>Bacteria:</td>
				<td>
				<?php echo $data['Bac'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>Amorphous:</td>
				<td>
				<?php echo $data['Amorph'] ?> <br>
				</td>
				</tr>

				<tr>
				<td>CoAx:</td>
				<td>
				<?php echo $data['CoAx'] ?> <br>
				</td>
				</tr>

		</div>
	</table>
</font>
<?php } ?>

</div>
</div>
</div>
</div>
</body>
</html>