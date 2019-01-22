<?php
include_once("../connection.php");
include_once("../classes/pack.php");
$pack = new pack;
$id = $_POST['id'];
$type = $_POST['type'];
$pack->item_type($id, $type);
echo $type;
?>