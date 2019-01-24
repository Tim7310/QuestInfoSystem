<?php
include_once("../connection.php");
include_once("../classes/trans.php");

$trans = new trans;
$tid = $_POST['tid'];
$array = $trans->item_refund($tid);

echo json_encode($array);
?>