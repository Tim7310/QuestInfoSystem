<?php
include_once("../connection.php");
include_once("../classes/lab.php");
$lab = new lab;
$pid = $_POST['pid'];
$tid = $_POST['tid'];
$test = $_POST['test'];
$lab->printCount($pid, $tid, $test);

?>