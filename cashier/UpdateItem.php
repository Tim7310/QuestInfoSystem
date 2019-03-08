<?php
include "../connection.php";
include "../classes/pack.php";
$pack = new pack;
$id = $_POST['id'];
$name = $_POST['name'];
$Desc = $_POST['desc'];
$price = $_POST['price'];
$type = $_POST['type'];
$pack->updateItem($id, $name, $Desc, $price, $type);
?>