<?php
include_once('../../connection.php');
include_once('../../classes/pack.php');
$pack = new pack;
try{
	if (!empty($_POST['XRay'])) {
		$xray = 1;
	}else{
		$xray = 0;
	}
	if (!empty($_POST['Blood'])) {
		$blood = 1;
	}else{
		$blood = 0;
	}
	if (!empty($_POST['Specimen'])) {
		$spec = 1;
	}else{
		$spec = 0;
	}
	if (!empty($_POST['PE'])) {
		$pe = 1;
	}else{
		$pe = 0;
	}

	$name = $_POST['ItemName'];
	$price = $_POST['ItemPrice'];
	$desc = $_POST['ItemDescription'];
	$type = $_POST['CashType'];

	$pack->createItem($name,$desc,$price,$type,$xray,$blood,$spec,$pe);

	$mess = "Item ".$_POST['ItemName']." is Successfuly Added.";
	echo json_encode(array("title"=>"Success","text"=>$mess,"icon"=>"fas fa-check")) ;
}
catch (Exception $e) {
   $mess = $e->getMessage();
   echo json_ensode(array("title"=>"Error","text"=>$mess,"icon"=>"fas fa-exclamation"));
}
?>