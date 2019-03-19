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
  $FBS=$_POST['FBS'];
  $FBScon=$_POST['FBScon'];
  $BUA=$_POST['BUA'];
  $BUAcon=$_POST['BUAcon'];
  $BUN=$_POST['BUN'];
  $BUNcon=$_POST['BUNcon'];
  $CREA=$_POST['CREA'];
  $CREAcon=$_POST['CREAcon'];
  $CHOL=$_POST['CHOL'];
  $CHOLcon=$_POST['CHOLcon'];
  $TRIG=$_POST['TRIG'];
  $TRIGcon=$_POST['TRIGcon'];
  $HDL=$_POST['HDL'];
  $HDLcon=$_POST['HDLcon'];
  $LDL=$_POST['LDL'];
  $LDLcon=$_POST['LDLcon'];
  $LDLcon=number_format((float)$LDLcon, 2, '.', '');
  $CH=$_POST['CH'];
  $VLDL=$_POST['VLDL'];
  $Na=$_POST['Na'];
  $K=$_POST['K'];
  $Cl=$_POST['Cl'];
  $ALT=$_POST['ALT'];
  $AST=$_POST['AST'];
  $HB=$_POST['HB'];
  $ALP = $_POST['ALP'];
  //$PSA = $_POST['PSA'];
  $PSA = "";
  $RBS = $_POST['RBS'];
  $GGTP = $_POST['GGTP'];
  $RBScon = $_POST['RBScon'];

  $LDH = $_POST['LDH'];
  $Calcium = $_POST['Calcium'];
  $Amylase = $_POST['Amylase'];
  $Lipase = $_POST['Lipase'];
  $InPhos = $_POST['InPhos'];
  $Protein = $_POST['Protein'];
  $Albumin = $_POST['Albumin'];
  $Globulin = $_POST['Globulin'];

  $Magnesium = $_POST['Magnesium'];
  $OGTT1 = $_POST['OGTT1']; 
  $OGTT1con = $_POST['OGTT1con']; 
  $OGTT2 = $_POST['OGTT2']; 
  $OGTT2con = $_POST['OGTT2con']; 
  $OGCT = $_POST['OGCT']; 
  $OGCTcon = $_POST['OGCTcon']; 
  $CPKMB = $_POST['CPKMB']; 
  $CPKMM = $_POST['CPKMM']; 
  $totalCPK = $_POST['totalCPK']; 
  $IonCalcium = $_POST['IonCalcium']; 
  $BILTotal = $_POST['BILTotal']; 
  $BILDirect = $_POST['BILDirect']; 
  $BILIndirect = $_POST['BILIndirect'];
  $AGRatio = $_POST['AGRatio'];

$date=date("Y-m-d H:i:s");

  try{
    $check =  $lab->getData($PatientID, $id, "lab_chemistry");
     if (!is_array($check)) {

    $lab->addChem($id, $PatientID, $FBS, $FBScon, $BUA, $BUAcon, $BUN, $BUNcon, $CREA, $CREAcon, $CHOL, $CHOLcon, $TRIG, $TRIGcon, $HDL, $HDLcon, $LDL, $LDLcon, $CH, $VLDL, $Na, $K, $Cl, $ALT, $AST, $HB, $ALP,  $PSA, $RBS, $RBScon, $GGTP, $path, $mdID, $qcID, $date, $LDH, $Calcium, $Amylase, $Lipase, $InPhos, $Protein, $Albumin, $Globulin, $Magnesium, $OGTT1, $OGTT1con, $OGTT2, $OGTT2con, $OGCT, $OGCTcon, $CPKMB, $CPKMM, $totalCPK, $IonCalcium, $BILTotal, $BILDirect, $BILIndirect, $AGRatio);
       echo "<script> alert('Record Added Successfully'); </script>";
       echo "<script>window.open('LabChemView.php?id=$PatientID&tid=$id','_self');</script>";
    }else{
      $lab->updateChem($id, $PatientID, $FBS, $FBScon, $BUA, $BUAcon, $BUN, $BUNcon, $CREA, $CREAcon, $CHOL, $CHOLcon, $TRIG, $TRIGcon, $HDL, $HDLcon, $LDL, $LDLcon, $CH, $VLDL, $Na, $K, $Cl, $ALT, $AST, $HB, $ALP, $PSA, $RBS, $RBScon, $GGTP, $path, $mdID, $qcID, $date, $LDH, $Calcium, $Amylase, $Lipase, $InPhos, $Protein, $Albumin, $Globulin, $Magnesium, $OGTT1, $OGTT1con, $OGTT2, $OGTT2con, $OGCT, $OGCTcon, $CPKMB, $CPKMM, $totalCPK, $IonCalcium, $BILTotal, $BILDirect, $BILIndirect, $AGRatio);
        echo "<script> alert('Record Updated Successfully'); </script>";
        echo "<script>window.open('LabChemView.php?id=$PatientID&tid=$id','_self');</script>";
    }
  }catch (Exception $e) {
     echo "<script> alert('Error: $e->getMessage()'); </script>";
      echo "<script>window.open('LabChem.php','_self');</script>";
  }
}else{
  echo "<script> alert('Error: Patient ID is Not Set'); </script>";
  echo "<script>window.open('LabChem.php','_self');</script>";
}


?>



















