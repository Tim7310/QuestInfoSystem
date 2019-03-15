<?php 
include "../../connection.php";
include "../../classes/trans.php";
$trans = new trans;
try{
	$trans->addCompany($_POST['name'], $_POST['address']);
	echo json_encode(array("title"=>"Success","text"=>"Company Added Successfully","icon"=>"fas fa-check")) ;
}
catch (Exception $e) {
    $mess = $e->getMessage();
   echo json_ensode(array("title"=>"Error","text"=>$mess,"icon"=>"fas fa-exclamation"));
}

?>