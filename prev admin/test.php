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

$comnam=$_POST['comnam'];
$apppos=$_POST['ap'];
$firnam=$_POST['fn'];
$midnam=$_POST['mn'];
$lasnam=$_POST['ln'];
$address=$_POST['address'];
$date=$_POST['date'];
$birdat=$_POST['bd'];
$age=$_POST['age'];
$gen=$_POST['gen'];
$connum=$_POST['cn'];
$emaadd=$_POST['ea'];
$query=$pdo->prepare("INSERT INTO qpd_form(comnam,apppos,firnam,midnam,lasnam,address,date,birdat,age,gen,connum,emaadd) VALUES (:comnam,:apppos,:firnam,:midnam,:lasnam,:address,:date,:birdat,:age,:gen,:connum,:emaadd)");
$query->bindParam(':comnam',$comnam);
$query->bindParam(':apppos',$apppos);
$query->bindParam(':firnam',$firnam);
$query->bindParam(':midnam',$midnam);
$query->bindParam(':lasnam',$lasnam);
$query->bindParam(':address',$address);
$query->bindParam(':date',$date);
$query->bindParam(':birdat',$birdat);
$query->bindParam(':age',$age);
$query->bindParam(':gen',$gen);
$query->bindParam(':connum',$connum);
$query->bindParam(':emaadd',$emaadd);


$query->execute();
