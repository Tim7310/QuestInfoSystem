<?php
include_once "../connection.php";
include_once "../classes/lab.php";
// $conn=mysqli_connect("localhost","root","","dbqis");
// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
$lab = new lab;
date_default_timezone_set("Asia/Kuala_Lumpur");
if (isset($_POST['PatientID'])) {


$id=$_POST['tid'];


$mdID = $_POST["MedTechID"];
$qcID = $_POST["qcID"];
$path = $_POST['pathID'];

// $med = $lab->medtechByID($mdID);
// $medName = $med['FirstName']." ".$med['MiddleName']." ".$med['LastName'].", ".$med['PositionEXT'];
// $qcmed = $lab->medtechByID($qcID);
// $qcmedName = $qcmed['FirstName']." ".$qcmed['MiddleName']." ".$qcmed['LastName'].", ".$qcmed['PositionEXT'];

// $result = $conn->query("SELECT * FROM qpd_labresult WHERE TransactionID ='$id'");
// if(mysqli_num_rows($result) == 0) 
// {
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
$HemoNR = "";
$HemaNR = "";
$CBCOt = $_POST['CBCOt'];

$date=date("Y-m-d H:i:s");

  try{
    $check =  $lab->getData($PatientID, $id, "lab_hematology");
     if (!is_array($check)) {

    $lab->addHema($id, $PatientID, $WhiteBlood, $Hemoglobin, $HemoNR, $Hematocrit, $HemaNR, $Neutrophils, $Lymphocytes, $Monocytes, $CBCOt, $EOS, $BAS, $CBCRBC, $PLT, $path, $mdID, $qcID, $date);
      echo "<script> alert('Record Added Successfully'); </script>";
      echo "<script>window.open('LabHemaView.php?id=$PatientID&tid=$id','_self');</script>";
    }else{
      $lab->updateHema($id, $PatientID, $WhiteBlood, $Hemoglobin, $HemoNR, $Hematocrit, $HemaNR, $Neutrophils, $Lymphocytes, $Monocytes, $CBCOt, $EOS, $BAS, $CBCRBC, $PLT, $path, $mdID, $qcID, $date);
       echo "<script> alert('Record Updated Successfully'); </script>";
       echo "<script>window.open('LabHemaView.php?id=$PatientID&tid=$id','_self');</script>";
    }
  }catch (Exception $e) {
     echo "<script> alert('Error: $e->getMessage()'); </script>";
      echo "<script>window.open('LabHema.php','_self');</script>";
  }
}else{
  echo "<script> alert('Error: Patient ID is Not Set'); </script>";
  echo "<script>window.open('LabHema.php','_self');</script>";
}



?>



















