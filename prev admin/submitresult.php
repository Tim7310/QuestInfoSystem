<?php
$host ="localhost";
$user="root";
$password="";
$dbname="dbtest";
$pdo= new PDO("mysql:host=$host;dbname=$dbname", $user, $password, array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));
?>
<?php
$id=$_POST['id'];
$Code=$_POST['Code'];
$Patient_Firstname=$_POST['firnam'];
$Patient_Middlename=$_POST['midnam'];
$Patient_Lastname=$_POST['lasnam'];
$Company_Name=$_POST['comnam'];
$WhiteBlood=$_POST['WhiteBlood'];
$Hemoglobin=$_POST['Hemoglobin'];
$Hematocrit=$_POST['Hematocrit'];
$Neutrophils=$_POST['Neutrophils'];
$Lymphocytes=$_POST['Lymphocytes'];
$Monocytes=$_POST['Monocytes'];
$Meth=$_POST['Meth'];
$Tetra=$_POST['Tetra'];
$HBsAg=$_POST['HBsAg'];
$PregTest=$_POST['PregTest'];
$FecColor=$_POST['FecColor'];
$FecCon=$_POST['FecCon'];
$FecMicro=$_POST['FecMicro'];
$UriColor=$_POST['UriColor'];
$UriTrans=$_POST['UriTrans'];
$UriPh=$_POST['UriPh'];
$UriSp=$_POST['UriSp'];
$UriPro=$_POST['UriPro'];
$UriGlu=$_POST['UriGlu'];
$RBC=$_POST['RBC'];
$WBC=$_POST['WBC'];
$ECells=$_POST['ECells'];
$Mthreads=$_POST['Mthreads'];
$Bac=$_POST['Bac'];
$Amorph=$_POST['Amorph'];
$CoAx=$_POST['CoAx'];
$date = date("Y-m-d h:i:s");


		$query=$pdo->prepare("INSERT INTO qpd_labresult (id, Code, firnam, midnam, lasnam, comnam, WhiteBlood, Hemoglobin, Hematocrit, Neutrophils, Lymphocytes, Monocytes, Meth, Tetra, HBsAg, PregTest, FecColor, FecCon, FecMicro, UriColor, UriTrans, UriPh, UriSp, UriPro, UriGlu, RBC, WBC, ECells, Mthreads, Bac, Amorph, CoAx, date) values (:id, :Code, :firnam, :midnam, :lasnam, :comnam ,:WhiteBlood, :Hemoglobin, :Hematocrit, :Neutrophils, :Lymphocytes, :Monocytes, :Meth, :Tetra, :HBsAg, :PregTest, :FecColor, :FecCon, :FecMicro, :UriColor, :UriTrans, :UriPh, :UriSp, :UriPro, :UriGlu, :RBC, :WBC, :ECells, :Mthreads, :Bac, :Amorph, :CoAx, :date)");

		$query->bindParam(':id',$id);
		$query->bindParam(':Code',$Code);
		$query->bindParam(':firnam',$Patient_Firstname);
		$query->bindParam(':midnam',$Patient_Middlename);
		$query->bindParam(':lasnam',$Patient_Lastname);
		$query->bindParam(':comnam',$Company_Name);
		$query->bindParam(':WhiteBlood',$WhiteBlood);
		$query->bindParam(':Hemoglobin',$Hemoglobin);
		$query->bindParam(':Hematocrit',$Hematocrit);
		$query->bindParam(':Neutrophils',$Neutrophils);
		$query->bindParam(':Lymphocytes',$Lymphocytes);
		$query->bindParam(':Monocytes',$Monocytes);
		$query->bindParam(':Meth',$Meth);
		$query->bindParam(':Tetra',$Tetra);
		$query->bindParam(':HBsAg',$HBsAg);
		$query->bindParam(':PregTest',$PregTest);
		$query->bindParam(':FecColor',$FecColor);
		$query->bindParam(':FecCon',$FecCon);
		$query->bindParam(':FecMicro',$FecMicro);
		$query->bindParam(':UriColor',$UriColor);
		$query->bindParam(':UriTrans',$UriTrans);
		$query->bindParam(':UriPh',$UriPh);
		$query->bindParam(':UriSp',$UriSp);
		$query->bindParam(':UriPro',$UriPro);
		$query->bindParam(':UriGlu',$UriGlu);
		$query->bindParam(':RBC',$RBC);
		$query->bindParam(':WBC',$WBC);
		$query->bindParam(':ECells',$ECells);
		$query->bindParam(':Mthreads',$Mthreads);
		$query->bindParam(':Bac',$Bac);
		$query->bindParam(':Amorph',$Amorph);
		$query->bindParam(':CoAx',$CoAx);
		$query->bindParam(':date',$date);
		$query->execute();

		echo "<script> alert('Files Stored Successfully') </script>";
echo "<script>window.open('patientview.php','_self')</script>";



















