

<?php
include_once('connection.php');
include_once('classes/patient.php');
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
?>



<?php echo $data['firnam'] ?>
<?php echo $data['midnam'] ?>
<?php echo $data['lasnam'] ?>
<?php echo $data['address'] ?>
<?php echo $data['birdat'] ?>
<?php echo $data['age'] ?>
<?php echo $data['gen'] ?>
<?php echo $data['connum'] ?>
<?php echo $data['refdoc'] ?>
<?php echo $data['testreq'] ?>

<?php } ?>