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

//serology
$HBsAG = $_POST['HBsAg'];
$AntiHav = $_POST['aHav'];
$SeroOt = $_POST['SeroOt'];
//toxicology
$Meth=$_POST['Meth'] ;
$Tetra=$_POST['Tetra'] ;
$DT=$_POST['DT'] ;

$PatientID = $_POST['PatientID'];
//VDRL
$VDRL = $_POST['VDRL'];

$date=date("Y-m-d H:i:s");

  try{
    $check2 = $lab->getData($PatientID, $id, "lab_toxicology");
    $check = $lab->getData($PatientID, $id, "lab_serology");
   
    if (!is_array($check)) {
      if ($HBsAG != 'N/A' or $AntiHav != 'N/A' or $VDRL != '' and $VDRL != 'N/A') {
          $lab->addSerology( $id, $PatientID, $HBsAG, $AntiHav, $SeroOt, $path, $mdID, $qcID, $date, $VDRL );    
      }
    }else{
      $lab->updateSerology( $id, $PatientID, $HBsAG, $AntiHav, $SeroOt, $path, $mdID, $qcID, $date, $VDRL );
    }
  
 
    if (!is_array($check2)) {
      if ($DT != '' or $Tetra != '' or $Meth != '') {
        if ($DT != 'N/A' or $Tetra != 'N/A' or $Meth != 'N/A') {
        $lab->addToxi(  $id, $PatientID, $Meth, $Tetra, $DT, $path, $mdID, $qcID, $date );
        }
      }
    }else{
      $lab->updateToxi(  $id, $PatientID, $Meth, $Tetra, $DT, $path, $mdID, $qcID, $date);
    }
  
    echo "<script> alert('Record Added/Updated Successfully'); </script>";
    echo "<script>window.open('LabSTView.php?id=$PatientID&tid=$id','_self');</script>";
  }catch (Exception $e) {
     echo "<script> alert('Error: $e->getMessage()'); </script>";
      echo "<script>window.open('LabSeroToxi.php','_self');</script>";
  }
}else{
  echo "<script> alert('Error: Patient ID is Not Set'); </script>";
  echo "<script>window.open('LabSeroToxi.php','_self');</script>";
}


?>



















