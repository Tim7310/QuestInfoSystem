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
//PSA
$PSA = $_POST['PSA'];
$date=date("Y-m-d H:i:s");

$AntiHBS = $_POST['AntiHBS'];
$HBeAG = $_POST['HBeAG'];
$AntiHBE = $_POST['AntiHBE'];
$AntiHBC = $_POST['AntiHBC'];
$TYDOTIgM = $_POST['TYDOTIgM'];
$TYDOTIgG = $_POST['TYDOTIgG'];
$CEA = $_POST['CEA'];
$AFP = $_POST['AFP'];
$CA125 = $_POST['CA125'];
$CA19 = $_POST['CA19'];
$CA15 = $_POST['CA15'];
$TSH = $_POST['TSH'];
$FT3 = $_POST['FT3'];
$FT4 = $_POST['FT4'];
$CRPdil = $_POST['CRPDil'];
$CRPRes =$_POST['CRPRes'];
$HIV1 = $_POST['HIV1'];
$HIV2 = $_POST['HIV2'];

  try{
    $check2 = $lab->getData($PatientID, $id, "lab_toxicology");
    $check = $lab->getData($PatientID, $id, "lab_serology");
   
    if (!is_array($check)) {
      if ($HBsAG != 'N/A' or $AntiHav != 'N/A' or $VDRL != '' and $VDRL != 'N/A' or $PSA != '' and $PSA != "N/A" or $AntiHBS != '' or $HBeAG != '' or $AntiHBE != "" or $AntiHBC != "" or $TYDOTIgM != "" or $TYDOTIgG != "" or $CEA != "" or $AFP != "" or $CA125 != "" or $CA15 != "" or $TSH != "" or $FT3 != "" or $FT4 != "" or $CRPDil != "" or $CRPRes != "" or $HIV1 != "") {
          $lab->addSerology( $id, $PatientID, $HBsAG, $AntiHav, $SeroOt, $path, $mdID, $qcID, $date, $VDRL,$PSA,$AntiHBS, $HBeAG, $AntiHBE, $AntiHBC, $TYDOTIgM, $TYDOTIgG, $CEA, $AFP, $CA125, $CA19, $CA15, $TSH, $FT3, $FT4,$CRPdil,$CRPRes, $HIV1, $HIV2 );  
      }
    }else{
      $lab->updateSerology( $id, $PatientID, $HBsAG, $AntiHav, $SeroOt, $path, $mdID, $qcID, $date, $VDRL, $PSA, $AntiHBS, $HBeAG, $AntiHBE, $AntiHBC, $TYDOTIgM, $TYDOTIgG, $CEA, $AFP, $CA125, $CA19, $CA15, $TSH, $FT3, $FT4,$CRPdil,$CRPRes, $HIV1, $HIV2 );
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



















