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

$fl=$_POST['fl'];
$md=$_POST['mn'];
$age=$_POST['age'];
$gen=$_POST['gen'];
$bd=$_POST['bd'];
$cp=$_POST['cp'];
$address=$_POST['address'];
$refdoc=$_POST['refdoc'];
$testreq=$_POST['testreq'];
$lasnam=$_POST['ln'];
$class="Walk-in";

$query=$pdo->prepare("INSERT INTO qpd_form(firnam,midnam,lasnam,refdoc, testreq,age,gen,birdat,connum,address,class) VALUES (:firnam,:midnam,:lasnam,:refdoc,:testreq,:age,:gen,:bd,:cp,:address,:class)");

$query->bindParam(':firnam',$fl);
$query->bindParam(':midnam',$md);
$query->bindParam(':lasnam',$lasnam);
$query->bindParam(':refdoc',$refdoc);
$query->bindParam('testreq',$testreq);
$query->bindParam(':age',$age);
$query->bindParam(':gen',$gen);
$query->bindParam(':bd',$bd);
$query->bindParam(':cp',$cp);
$query->bindParam(':address',$address);
$query->bindParam(':class',$class);






$query->execute();
