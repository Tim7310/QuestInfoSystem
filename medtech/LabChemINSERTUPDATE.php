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
$sql = "SELECT * FROM qpd_labresult WHERE TransactionID ='$id'";

$lab = new lab;
$mdID = $_POST["MedTechID"];
$qcID = $_POST["qcID"];

$med = $lab->medtechByID($mdID);
$medName = $med['FirstName']." ".$med['MiddleName']." ".$med['LastName'].", ".$med['PositionEXT'];
$qcmed = $lab->medtechByID($qcID);
$qcmedName = $qcmed['FirstName']." ".$qcmed['MiddleName']." ".$qcmed['LastName'].", ".$qcmed['PositionEXT'];

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) 
{
  
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
  $CH=$_POST['CH'];
  $VLDL=$_POST['VLDL'];
  $Na=$_POST['Na'];
  $K=$_POST['K'];
  $Cl=$_POST['Cl'];
  $ALT=$_POST['ALT'];
  $AST=$_POST['AST'];
  $HB=$_POST['HB'];
  $Clinician=$_POST['Clinician'];
  $date=date("Y-m-d H:i:s");
  $PATHLIC=$_POST['PATHLIC'];
  $Printed=$_POST['Printed'];

  $Received = $medName;
  $RMTLIC = $med['LicenseNO'];
  $qc = $qcmedName;
  $QCLIC = $qcmed['LicenseNO'];

  $sqlUPDATE= "UPDATE qpd_labresult SET FBS='$FBS' , FBScon='$FBScon' , BUA='$BUA' , BUAcon='$BUAcon' , BUN='$BUN' , BUNcon='$BUNcon' , CREA='$CREA' , CREAcon='$CREAcon' , CHOL= '$CHOL', CHOLcon='$CHOLcon' , TRIG= '$TRIG', TRIGcon='$TRIGcon' , HDL='$HDL' , HDLcon='$HDLcon' , LDL= '$LDL', LDLcon='$LDLcon' , CH='$CH' , VLDL='$VLDL' , Na='$Na' , K='$K' , Cl='$Cl' , ALT='$ALT' , AST='$AST' , HB='$HB' , Clinician= '$Clinician', CreationDate='$date' , Received='$Received' , PATHLIC='$PATHLIC' , Printed='$Printed' , RMTLIC='$RMTLIC', QC='$qc', QCLIC='$QCLIC'  WHERE TransactionID = '$id'";
  $sqlUPDATE1= "UPDATE qpd_class SET QC = '$qc', QCLicense = '$QCLIC', CreationDate='$date' WHERE TransactionID= '$id'";
    if ($conn->query($sqlUPDATE) == TRUE && $conn->query($sqlUPDATE1) == TRUE) 
    {
      echo "<script> alert('RECORD UPDATED!') </script>";
      echo "<script>window.open('LabChemView.php?id=$PatientID&tid=$id','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }
}
else{

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
  $CH=$_POST['CH'];
  $VLDL=$_POST['VLDL'];
  $Na=$_POST['Na'];
  $K=$_POST['K'];
  $Cl=$_POST['Cl'];
  $ALT=$_POST['ALT'];
  $AST=$_POST['AST'];
  $HB=$_POST['HB'];
  $Clinician=$_POST['Clinician'];
  $date=date("Y-m-d H:i:s");
  $PATHLIC=$_POST['PATHLIC'];
  $Printed=$_POST['Printed'];

  $Received = $medName;
  $RMTLIC = $med['LicenseNO'];
  $qc = $qcmedName;
  $QCLIC = $qcmed['LicenseNO'];

$sqlinsert= "INSERT INTO qpd_labresult (TransactionID, PatientID, FBS, FBScon, BUA, BUAcon, BUN, BUNcon, CREA, CREAcon, CHOL, CHOLcon, TRIG, TRIGcon, HDL, HDLcon, LDL, LDLcon, CH, VLDL, Na, K, Cl, ALT, AST, HB , Clinician, CreationDate, Received, PATHLIC, Printed, QCLIC, RMTLIC, QC) 

  VALUES ('$id','$PatientID','$FBS','$FBScon','$BUA','$BUAcon','$BUN','$BUNcon','$CREA','$CREAcon','$CHOL','$CHOLcon','$TRIG','$TRIGcon','$HDL','$HDLcon','$LDL','$LDLcon','$CH','$VLDL','$Na','$K','$Cl','$ALT','$AST','$HB','$Clinician','$date','$Received','$PATHLIC','$Printed', '$QCLIC','$RMTLIC','$qc')";

  $sqlinsert1 = "INSERT INTO qpd_class(TransactionID, PatientID, QC, QCLicense, CreationDate) VALUES ('$id', '$PatientID' ,'$qc' ,'$QCLIC', '$date')";
    if ($conn->query($sqlinsert) === TRUE && $conn->query($sqlinsert1) === TRUE) 
    {
      echo "<script> alert('Record Added Successfully') </script>";
      echo "<script>window.open('LabChemView.php?id=$PatientID&tid=$id','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }
}
$conn->close();



?>



















