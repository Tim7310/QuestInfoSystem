<?php
include_once("../connection.php");
include_once("../classes/patient.php");
$patient = new Patient;
function randomDigits(){
	do{
		$patient = new Patient;
		$numbers = range(0,9);
	    $digits = '';
	    $length = 8;
	    shuffle($numbers);
		    for($i = 0; $i < $length; $i++)
		    {
		    	global $digits;
		       	$digits .= $numbers[$i];
		    }
		$patdata = $patient->refCount($digits);

	}while($patdata != 0);
  
    return $digits;
}
function newPatient($pid, $pref, $ptype, $cn, $pos, $fn, $mn, $ln, $add, $bd, $email, $age, $gen, $conNo, $notes, $sid, $biller){
	global $pdo;
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date("Y-m-d H:i:s");
	$sql = "INSERT INTO qpd_patient(PatientID, PatientRef, PatientType, CompanyName, Position, FirstName, MiddleName, LastName, Address, Birthdate, Email, Age, Gender, ContactNo, Notes, SID, CreationDate, PatientBiller) VALUES 
	( '$pid', '$pref',' $ptype', '$cn', '$pos', '$fn', '$mn', '$ln', '$add', '$bd', '$email', '$age', '$gen', '$conNo', '$notes', '$sid', '$date' ,'$biller' )";
	$pdo->prepare($sql)->execute();
}
$pid = $_POST['idpatient'];
$pref = randomDigits();
$ptype = "";
$cn = $_POST['company'];
$pos =  $_POST['position'];
$fn = $_POST['firstname'];
$mn = $_POST['middlename'];
$ln = $_POST['lastname'];
$add = $_POST['address']; 
$bd = $_POST['birthday'];
$email = $_POST['email'];
$age = $_POST['age'];
$gen = $_POST['gender'];
$conNo = $_POST['contact'];
$notes = "";
$sid = $_POST['sid'];
$biller = $_POST['billto'];
try {
	newPatient($pid, $pref, $ptype, $cn, $pos, $fn, $mn, $ln, $add, $bd, $email, $age, $gen, $conNo, $notes, $sid, $biller);
	$patientData = $patient->fetch_data_ref($pref);
	$patientID = $patientData['PatientID'];
	echo $patientID;
} catch (Exception $e) {
	echo $e->getMessage();
}

?>
