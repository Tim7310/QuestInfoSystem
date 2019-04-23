<?php
include_once("../classes.php");
include_once("../../connection.php");
// if (isset($_FILES['trans'])) {
// 	$path1 = $_FILES['trans']['name'];
// 	$ext1 = pathinfo($path1, PATHINFO_EXTENSION);
// 	if ($ext1 == "csv") {
// 		move_uploaded_file($_FILES["trans"]["tmp_name"], $path1);
// 	}
// }
if (isset($_FILES['patient'])) {
	$path2 = $_FILES['patient']['name'];
	$ext2 = pathinfo($path2, PATHINFO_EXTENSION);
	if ($ext2 == "csv") {
		move_uploaded_file($_FILES["patient"]["tmp_name"], $path2);
	}
}
$itemName = $_POST["item"];
$price = $_POST['price'];
$biller = $_POST['comName'];
	# code...

function csv_to_array($filename='', $delimiter=',')
{
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else
				$data[] = array_combine($header, $row);
		}
		fclose($handle);
	}
	return $data;
}
/**
 * Example
 */
//$trans = csv_to_array($path1);
$patients = csv_to_array($path2);
//print_r($patient);
$Data = new apeData;
//print_r($patients);
foreach ($patients as $patient) {
	# code...
	$ptype = "APE";
	$cn = $patient['CompanyName'];
	$pos =  $patient['Position'];
	$fn = $patient['FirstName'];
	$mn = $patient['MiddleName'];
	$ln = $patient['LastName'];
	$add = $patient['Address']; 
	$bd = $patient['Birthdate'];
	$email = $patient['Email'];
	$age = $patient['Age'];
	$gen = $patient['Gender'];
	$conNo = $patient['ContactNo'];
	$notes = "";
	$sid = $patient['SID'];
	$biller = $patient['CompanyName'];
	$pref = $Data->newPatient($ptype, $cn, $pos, $fn, $mn, $ln, $add, $bd, $email, $age, $gen, $conNo, $notes, $sid, $biller);
	$patientID = $Data->patbyRef($pref);
	$gtotal = $_POST["price"];
	$biller = $_POST['comName'];
	$itemName = $_POST['item'];
	$pid = $patientID['PatientID'];
	$Data->Transaction( $pid, $ttype="ACCOUNT", $cashier="ITDev", $itemName, $itemQTY="1", $biller, $gtotal, $paidIn="", $disc="", $PaidOut="", $gtotal, $status="1", $loe="", $an="", $ac="");
}
?> 