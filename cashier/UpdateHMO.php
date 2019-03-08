<?php
include '../connection.php';
include '../classes/trans.php';
$trans = new trans;
$AC = $_POST['AC'];
$LOE = $_POST['LOE'];
$AN = $_POST['AN'];
$tid = $_POST['id'];
$TDate = $_POST['tdate'];
$trans->updateHMO($tid,$AN,$AC,$LOE,$TDate);
//echo $AC." ".$AN." ".$LOE;
?>