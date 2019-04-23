<?php
include_once("../connection.php");
include_once "../classes/lab.php";
$lab = new lab;
if (isset($_POST['id'])) {
date_default_timezone_set("Asia/Kuala_Lumpur");
$mdID = $_POST["MedTechID"];
$qcID = $_POST["qcID"];
$path = $_POST['pathID'];

$id=$_POST['id'];
$tid=$_POST['tid'];

//hematology
$WhiteBlood=$_POST['WhiteBlood'] ? $_POST['WhiteBlood'] : "N/A";
$Hemoglobin=$_POST['Hemoglobin'] ? $_POST['Hemoglobin'] : "N/A";
$HemoNR=$_POST['HemoNR'] ? $_POST['HemoNR'] : "N/A";
$Hematocrit=$_POST['Hematocrit'] ? $_POST['Hematocrit'] : "N/A";
$HemaNR=$_POST['HemaNR'] ? $_POST['HemaNR'] : "N/A";
$Neutrophils=$_POST['Neutrophils'] ? $_POST['Neutrophils'] : "N/A";
$Lymphocytes=$_POST['Lymphocytes'] ? $_POST['Lymphocytes'] : "N/A";
$Monocytes=$_POST['Monocytes'] ? $_POST['Monocytes'] : "N/A";
$CBCOt=$_POST['CBCOt'] ? $_POST['CBCOt'] : "N/A";

//Toxicology
$Meth=$_POST['Meth'] ;
$Tetra=$_POST['Tetra'] ;
$DT=$_POST['DT'] ;

//serology
$HBsAg=$_POST['HBsAg'] ;
$SeroOt=$_POST['SeroOt'] ;

//microscopy
$FecColor=$_POST['FecColor'] ;
$FecCon=$_POST['FecCon'] ;
$FecMicro=$_POST['FecMicro'] ;
$FecOt=$_POST['FecOt'] ;
$UriColor=$_POST['UriColor'] ;
$UriTrans=$_POST['UriTrans'] ;
$UriPh=$_POST['UriPh'] ;
$UriSp=$_POST['UriSp'] ;
$UriPro=$_POST['UriPro'] ;
$UriGlu=$_POST['UriGlu'] ;
$RBC=$_POST['RBC'] ? $_POST['RBC'] : "N/A";
$WBC=$_POST['WBC'] ? $_POST['WBC'] : "N/A";
$ECells=$_POST['ECells'] ;
$MThreads=$_POST['MThreads'] ;
$Bac=$_POST['Bac'];
$Amorph=$_POST['Amorph'];
$CoAx=$_POST['CoAx'];
$UriOt=$_POST['UriOt'] ? $_POST['UriOt'] : "N/A";
$PregTest=$_POST['PregTest'] ;
$date=date("Y-m-d H:i:s");

try{
   $check =  $lab->getData($id, $tid, "lab_microscopy");
   $check3 =  $lab->checkData($id, $tid, "lab_hematology");
   $check4 =  $lab->getData($id, $tid, "lab_serology");
   $check5 =  $lab->checkData($id, $tid, "lab_toxicology");
   if (!is_array($check)) {
      $lab->addMicro($tid, $id, $FecColor, $FecCon, $FecMicro, $FecOt, $UriColor, $UriTrans, $UriPh, $UriSp, $UriPro, $UriGlu, $RBC, $WBC, $Bac, $MThreads, $ECells, $Amorph, $CoAx, $UriOt, '', '', '', '', '', '', $PregTest, $path, $mdID, $qcID, $date);
   }else{
      $lab->updateMicro($tid, $id, $FecColor, $FecCon, $FecMicro, $FecOt, $UriColor, $UriTrans, $UriPh, $UriSp, $UriPro, $UriGlu, $RBC, $WBC, $Bac, $MThreads, $ECells, $Amorph, $CoAx, $UriOt, '', '', '', '', '', '', $PregTest, $path, $mdID, $qcID, $date);
   }
  if ($check3 == 0) {
      $lab->addHema($tid, $id, $WhiteBlood, $Hemoglobin, $HemoNR, $Hematocrit, $HemaNR, $Neutrophils, $Lymphocytes, $Monocytes, $CBCOt, '', '', '', '', '', '', '', '', '', '', '', $path, $mdID, $qcID, $date);
  }else{
      $lab->updateHema($tid, $id, $WhiteBlood, $Hemoglobin, $HemoNR, $Hematocrit, $HemaNR, $Neutrophils, $Lymphocytes, $Monocytes, $CBCOt, '', '', '', '', '', '', '', '', '', '', '', $path, $mdID, $qcID, $date);
  }
 
    if (!is_array($check4)) {
       if ($HBsAg != 'N/A' and $HBsAg != '' or $SeroOt != '' and $SeroOt != 'N/A') {
        $lab->addSerology( $tid, $id, $HBsAg, '', $SeroOt, $path, $mdID, $qcID, $date );
       }
    }else{
      $lab->updateSerology( $tid, $id, $HBsAg, '', $SeroOt, $path, $mdID, $qcID, $date );
    }
 
  
    if ($check5 == 0) {
      if ($DT != 'N/A' or $Tetra != 'N/A' or $Meth != 'N/A') {
        if ($DT != 'N/A' or $Tetra != 'N/A' or $Meth != 'N/A') {
          $lab->addToxi(  $tid, $id, $Meth, $Tetra, $DT, $path, $mdID, $qcID, $date );
        }
      }
    }else{
      $lab->updateToxi(  $tid, $id, $Meth, $Tetra, $DT, $path, $mdID, $qcID, $date);
    }
  
  echo "<script> alert('Record Added/Updated Successfully'); </script>";
  echo "<script>window.open('LabIndustrialView.php?id=$id&tid=$tid','_self');</script>";
}catch (Exception $e) {
     echo "<script> alert('Error: $e->getMessage()'); </script>";
      echo "<script>window.open('LabIndustrial.php','_self');</script>";
  }
}else{
  echo "<script> alert('Error: Patient ID is Not Set'); </script>";
  echo "<script>window.open('LabIndustrial.php','_self');</script>";
}





?>



















