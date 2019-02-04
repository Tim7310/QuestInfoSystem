<?php
include_once "../connection.php";
include_once "../classes/lab.php";
// $conn=mysqli_connect("localhost","root","","dbqis");
// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
date_default_timezone_set("Asia/Kuala_Lumpur");
$id=$_POST['tid'];

$lab = new lab;
$mdID = $_POST["MedTechID"];
$qcID = $_POST["qcID"];
$path = $_POST['pathID'];

$med = $lab->medtechByID($mdID);
$medName = $med['FirstName']." ".$med['MiddleName']." ".$med['LastName'].", ".$med['PositionEXT'];
$qcmed = $lab->medtechByID($qcID);
$qcmedName = $qcmed['FirstName']." ".$qcmed['MiddleName']." ".$qcmed['LastName'].", ".$qcmed['PositionEXT'];

// $result = $conn->query("SELECT * FROM qpd_labresult WHERE TransactionID ='$id'");
// if(mysqli_num_rows($result) == 0) 
// {
  $PatientID = $_POST['PatientID'];
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
  $Bac=$_POST['Bac'];
  $MThreads=$_POST['MThreads'];
  $ECells=$_POST['ECells'] ;
  $Amorph=$_POST['Amorph'];
  $CoAx=$_POST['CoAx'];
  $UriOt=$_POST['UriOt'] ? $_POST['UriOt'] : "N/A";
  $LE=$_POST['LE'] ;
  $NIT=$_POST['NIT'] ;
  $URO=$_POST['URO'] ;
  $BLD=$_POST['BLD'] ;
  $KET=$_POST['KET'] ;
  $BIL=$_POST['BIL'] ;
  $PregTest = $_POST['pregTest'];
  $date=date("Y-m-d H:i:s");

  $lab->addMicro($id, $PatientID, $FecColor, $FecCon, $FecMicro , $FecOt, $UriColor, $UriTrans, $UriPh, $UriSp, $UriPro, $UriGlu, $RBC, $WBC, $Bac, $MThreads, $ECells, $Amorph, $CoAx, $UriOt,$LE, $NIT,$URO,$BLD,$KET,$BIL,$PregTest,$path,$mdID,$qcID,$date);

//   $sqlinsert = "INSERT INTO qpd_labresult (TransactionID, PatientID, FecColor,  FecCon, FecMicro, FecOt, UriColor, UriTrans, UriPh, UriSp, UriPro, UriGlu, RBC, WBC, Bac, MThreads, ECells, Amorph, CoAx, UriOt, LE, NIT, URO, BLD, KET, BIL, Received, Printed, Clinician, RMTLIC, PATHLIC, CreationDate, qc, QCLIC) 

//   VALUES ('$id', '$PatientID', '$FecColor', '$FecCon', '$FecMicro' , '$FecOt','$UriColor', '$UriTrans', '$UriPh', '$UriSp', '$UriPro', '$UriGlu', '$RBC', '$WBC', '$Bac', '$MThreads', '$ECells', '$Amorph', '$CoAx', '$UriOt','$LE', '$NIT','$URO','$BLD','$KET','$BIL', '$Received', '$Printed', '$Clinician', '$RMTLIC', '$PATHLIC', '$date', '$qc','$QCLIC')";
  
//   $sqlinsert1 = "INSERT INTO qpd_class(TransactionID, PatientID, QC, QCLicense, CreationDate) VALUES ('$id', '$PatientID' ,'$qc' ,'$QCLIC', '$date')";
//     if ($conn->query($sqlinsert) === TRUE && $conn->query($sqlinsert1) === TRUE) 
//     {
//     	echo "<script> alert('Record Added Successfully'); </script>";
//     	echo "<script>window.open('LabMicroscopyView.php?id=$PatientID&tid=$id','_self');</script>";
//     } 
//     else
//     {
//       echo "Error updating record: " . $conn->error;
//     }

// }
// else
// {
//   $PatientID = $_POST['PatientID'];
//   $FecColor=$_POST['FecColor'] ;
//   $FecCon=$_POST['FecCon'] ;
//   $FecMicro=$_POST['FecMicro'] ;
//   $FecOt=$_POST['FecOt'] ;
//   $UriColor=$_POST['UriColor'] ;
//   $UriTrans=$_POST['UriTrans'] ;
//   $UriPh=$_POST['UriPh'] ;
//   $UriSp=$_POST['UriSp'] ;
//   $UriPro=$_POST['UriPro'] ;
//   $UriGlu=$_POST['UriGlu'] ;
//   $LE=$_POST['LE'] ;
//   $NIT=$_POST['NIT'] ;
//   $URO=$_POST['URO'] ;
//   $BLD=$_POST['BLD'] ;
//   $KET=$_POST['KET'] ;
//   $BIL=$_POST['BIL'] ;
//   $RBC=$_POST['RBC'] ? $_POST['RBC'] : "N/A";
//   $WBC=$_POST['WBC'] ? $_POST['WBC'] : "N/A";
//   $ECells=$_POST['ECells'] ;
//   $MThreads=$_POST['MThreads'] ;
//   $Bac=$_POST['Bac'];
//   $Amorph=$_POST['Amorph'];
//   $CoAx=$_POST['CoAx'];
//   $UriOt=$_POST['UriOt'] ? $_POST['UriOt'] : "N/A";
//   $Clinician=$_POST['Clinician'];
//   $date=date("Y-m-d H:i:s");
//   $PATHLIC=$_POST['PATHLIC'];
//   $Printed=$_POST['Printed'];

//   $Received = $medName;
//   $RMTLIC = $med['LicenseNO'];
//   $qc = $qcmedName;
//   $QCLIC = $qcmed['LicenseNO'];

//   $sqlUPDATE= "UPDATE qpd_labresult SET FecColor = '$FecColor', FecCon='$FecCon', FecMicro='$FecMicro', FecOt='$FecOt', UriColor='$UriColor', UriTrans='$UriTrans', UriPh='$UriPh', UriSp='$UriSp', UriPro='$UriPro', UriGlu='$UriGlu', LE='$LE', NIT='$NIT', URO='$URO', BLD='$BLD', KET='$KET', BIL='$BIL', RBC='$RBC', WBC='$WBC', ECells='$ECells', MThreads='$MThreads', Bac='$Bac', Amorph='$Amorph', CoAx='$CoAx', UriOt='$UriOt', Clinician= '$Clinician', DateUpdate='$date' , Received='$Received' , PATHLIC='$PATHLIC' , Printed='$Printed' , RMTLIC='$RMTLIC', QC='$qc', QCLIC='$QCLIC' WHERE TransactionID = '$id'";
//   $sqlUPDATE1= "UPDATE qpd_class SET QC = '$qc', QCLicense = '$QCLIC', CreationDate='$date' WHERE TransactionID = '$id'";
//     if ($conn->query($sqlUPDATE) === TRUE && $conn->query($sqlUPDATE1) === TRUE) 
//     {
//       echo "<script> alert('RECORD UPDATED!'); </script>";
//       echo "<script>window.open('LabMicroscopyVIEW.php?id=$PatientID&tid=$id','_self')</script>";
//     } 
//     else
//     {
//       echo "Error updating record: " . $conn->error;
//       echo "this";
//     }
// }


// $conn->close();



?>



















