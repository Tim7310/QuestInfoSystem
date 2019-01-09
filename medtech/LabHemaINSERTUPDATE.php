<?php
include_once "../connection.php";
include_once "../classes/lab.php";
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
date_default_timezone_set("Asia/Kuala_Lumpur");
$id=$_POST['tid'];

$lab = new lab;
$mdID = $_POST["MedTechID"];
$qcID = $_POST["qcID"];

$med = $lab->medtechByID($mdID);
$medName = $med['FirstName']." ".$med['MiddleName']." ".$med['LastName'].", ".$med['PositionEXT'];
$qcmed = $lab->medtechByID($qcID);
$qcmedName = $qcmed['FirstName']." ".$qcmed['MiddleName']." ".$qcmed['LastName'].", ".$qcmed['PositionEXT'];

$result = $conn->query("SELECT * FROM qpd_labresult WHERE TransactionID = '$id'");
if(mysqli_num_rows($result) == 0) 
{
  $PatientID = $_POST['PatientID'];

  $WhiteBlood=$_POST['WhiteBlood'];
  $Neutrophils=$_POST['Neutrophils'];
  $Lymphocytes=$_POST['Lymphocytes'];
  $Monocytes=$_POST['Monocytes'];
  $EOS=$_POST['EOS'];
  $BAS=$_POST['BAS'];
  $CBCRBC=$_POST['CBCRBC'];
  $Hemoglobin=$_POST['Hemoglobin'];
  $Hematocrit=$_POST['Hematocrit'];
  $PLT=$_POST['PLT'];

  $Clinician=$_POST['Clinician'];
  $date=date("Y-m-d H:i:s");
  $PATHLIC=$_POST['PATHLIC'];
  $Printed=$_POST['Printed'];
  
  $Received = $medName;
  $RMTLIC = $med['LicenseNO'];
  $qc = $qcmedName;
  $QCLIC = $qcmed['LicenseNO'];

  $sqlinsert= "INSERT INTO qpd_labresult 
  (TransactionID,  PatientID, WhiteBlood, Neutrophils, Lymphocytes, Monocytes, EOS, BAS, CBCRBC, Hemoglobin, Hematocrit, PLT, Clinician, DateUpdate, Received, PATHLIC, Printed, RMTLIC, QC, QCLIC) 
  values
  ('$id', '$PatientID', '$WhiteBlood', '$Neutrophils', '$Lymphocytes', '$Monocytes', '$EOS', '$BAS', '$CBCRBC', '$Hemoglobin', '$Hematocrit', '$PLT' , '$Clinician', '$date', '$Received', '$PATHLIC', '$Printed', '$RMTLIC', '$qc', 'QCLIC')";

   $sqlinsert1 = "INSERT INTO qpd_class(TransactionID, PatientID, QC, QCLicense, CreationDate) VALUES ('$id', '$PatientID' ,'$qc' ,'$QCLIC', '$date')";
    if ($conn->query($sqlinsert) === TRUE && $conn->query($sqlinsert1) === TRUE) 
    {
    	echo "<script> alert('Record Added Successfully') </script>";
    	echo "<script>window.open('LabHemaVIEW.php?id=$PatientID&tid=$id','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }

}
else
{
  $PatientID = $_POST['PatientID'];
  $WhiteBlood=$_POST['WhiteBlood'];
  $Neutrophils=$_POST['Neutrophils'];
  $Lymphocytes=$_POST['Lymphocytes'];
  $Monocytes=$_POST['Monocytes'];
  $EOS=$_POST['EOS'];
  $BAS=$_POST['BAS'];
  $CBCRBC=$_POST['CBCRBC'];
  $Hemoglobin=$_POST['Hemoglobin'];
  $Hematocrit=$_POST['Hematocrit'];
  $PLT=$_POST['PLT'];

  $Clinician=$_POST['Clinician'];
  $date=date("Y-m-d H:i:s");
  $PATHLIC=$_POST['PATHLIC'];
  $Printed=$_POST['Printed'];
  
  $Received = $medName;
  $RMTLIC = $med['LicenseNO'];
  $qc = $qcmedName;
  $QCLIC = $qcmed['LicenseNO'];

  $sqlUPDATE= "UPDATE qpd_labresult SET WhiteBlood = '$WhiteBlood', Neutrophils = '$Neutrophils', Lymphocytes = '$Lymphocytes', Monocytes = '$Monocytes', EOS = '$EOS', BAS = '$BAS', CBCRBC = '$CBCRBC', Hemoglobin = '$Hemoglobin', Hematocrit = '$Hematocrit', PLT = '$PLT', Clinician= '$Clinician', DateUpdate='$date' , Received='$Received' , PATHLIC='$PATHLIC' , Printed='$Printed' , RMTLIC='$RMTLIC', QC='$qc', QCLIC='$QCLIC'  WHERE TransactionID = '$id'";
  $sqlUPDATE1= "UPDATE qpd_class SET QC = '$qc', QCLicense = '$QCLIC', CreationDate='$date' WHERE TransactionID = '$id'";
    if ($conn->query($sqlUPDATE) === TRUE && $conn->query($sqlUPDATE1) === TRUE) 
    {
      echo "<script> alert('RECORD UPDATED!') </script>";
      echo "<script>window.open('LabHemaVIEW.php?id=$PatientID&tid=$id','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }
}


$conn->close();



?>



















