<?php
include_once("../connection.php");
include_once("../classes/trans.php");

$trans = new trans;
$pid = $_POST['pid'];
$cashier = $_POST['cashier'];
$itemid = $_POST['itemid'];
$discount = $_POST['discount'];
$quantity = $_POST['quantity'];
$biller = $_POST['biller'];
$gtotal = $_POST['gtotal'];
$array = $trans->item_refund($pid, $cashier, $itemid, $discount, $quantity, $biller, $gtotal);
echo json_encode($array);
?>