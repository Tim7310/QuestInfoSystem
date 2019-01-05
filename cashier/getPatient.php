<?php
include_once("../connection.php");
include_once("../classes/patient.php");

$patient = new Patient;
$patID = $_POST['patID'];
$patID = preg_replace('/\s+/', '', $patID);
$patData = $patient->fetch_data($patID);
if ($patID != 0) {

?>
<div>
	<i class="fas fa-user-check"></i> &nbsp;
	<?php 
		echo $patData['LastName']." , ".$patData['FirstName']." ".$patData['MiddleName']." | ".$patData['CompanyName']." | ".$patData['ContactNo'];
	?>
</div>
<input type="text" name="" id="SelectedPID" value="<?php echo $_POST['patID'];?>" style="display: none">
<?php } ?>