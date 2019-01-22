<?php
include_once("../connection.php");
include_once("../classes/trans.php");

$trans = new trans;
$tid = $_POST['tid'];
$trans->item_refund($tid);
?>