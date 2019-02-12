<?php
include_once '../connection.php';
include_once '../classes/trans.php';

if (isset($_POST['tid'])) {
	$tid = $_POST['tid'];
	$trans = new trans;
	$trans->deleteTrans($tid);
}

?>