<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_POST['id'];
$tid=$_POST['tid'];
$result = $conn->query("SELECT * FROM qpd_class WHERE PatientID ='".$id."'");
if($result->num_rows == 0) 
{
$qc=$_POST['qc'];
$date=date("Y-m-d H:i:s");

$sqlinsert = "INSERT INTO qpd_class(PatientID, TransactionID, QC, CreationDate) VALUES('$id', '$tid', '$qc', '$date')";

  if ($conn->query($sqlinsert) === TRUE) 
  {
	echo "<script> alert('Record Added Successfully') </script>";
	echo "<script>window.open('QCMCList.php','_self')</script>";
  } 
  else
  {
    echo "Error updating record: " . $conn->error;
  }
} 
else 
{
  // do other stuff...
  $qc=$_POST['qc'];
  $date=date("Y-m-d H:i:s");


  $sqlupdate="UPDATE qpd_class SET QC='$qc', CreationDate='$date'  WHERE PatientID ='$id' ";

      if ($conn->query($sqlupdate) === TRUE) 
      {
      echo "<script> alert('Record Updated Successfully') </script>";
      echo "<script>window.open('QCMCList.php','_self')</script>";
      }
      else
      {
        echo "Error updating record: " . $conn->error;
      }

}


$conn->close();



?>
