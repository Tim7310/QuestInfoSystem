<?php
include_once("../connection.php");
include_once("../classes/patient.php");
$pid = $_POST['pid'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$gender = $_POST['gen'];
$comname = $_POST['comname'];
$contact = $_POST['contact'];
$bod = $_POST['bod'];
$add = $_POST['address'];
$pos = $_POST['pos'];
$pat = new Patient;
$biller = $_POST['biller'];
$email = $_POST['Email'];
$SID = $_POST['SID'];
$notes = $_POST['notes'];
$pat->Update_Patient($pid, $fname, $mname, $lname, $age, $gender, $comname, $contact, $bod, $add, $pos, $biller, $SID, $email, $notes);
echo $pid;

?>
