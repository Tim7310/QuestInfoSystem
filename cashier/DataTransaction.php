<?php
include_once("../connection.php");
include_once("../classes/trans.php");
include_once("../classes/patient.php");
$trans = new trans;
$pat = new Patient;

	function arraytoString($array){
		$x = 0;
		foreach ($array as $key) {
			if ($x == 0) {
				$string = $key;
			}else{
				$string = $string.",".$key;
			}
			$x++;
		}
		return $string;
	}
	function Transaction($tref, $pid, $ttype, $cashier, $itemIDs, $itemQTY, $biller, $tprice, $paidIn, $disc, $PaidOut, $gtotal, $status){
		global $pdo;
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date = date("Y-m-d H:i:s");
		$sql = "INSERT INTO qpd_trans 
		(TransactionRef, PatientID, TransactionType, Cashier, ItemID, ItemQTY, Biller, TotalPrice, PaidIn, Discount, PaidOut, GrandTotal, TransactionDate, status) 
		values ('$tref', '$pid', '$ttype', '$cashier', '$itemIDs', '$itemQTY', '$biller', '$tprice', '$paidIn', '$disc', '$PaidOut', '$gtotal', '$date', $status)";
		$stmt= $pdo->prepare($sql);
		$stmt->execute();
	}
	function UpdateTransaction($tid,$tref, $pid, $ttype, $cashier, $itemIDs, $itemQTY, $biller, $tprice, $paidIn, $disc, $PaidOut, $gtotal, $status){
		global $pdo;
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date = date("Y-m-d H:i:s");
		$sql = "UPDATE qpd_trans SET TransactionRef = '$tref', PatientID = '$pid', TransactionType = '$ttype', Cashier = '$cashier', ItemID = '$itemIDs', ItemQTY = '$itemQTY', Biller = '$biller', TotalPrice = '$tprice', PaidIn = '$paidIn', Discount = '$disc', PaidOut = '$PaidOut', GrandTotal = '$gtotal', TransactionDate = '$date', status = '$status' where TransactionID = $tid";
		$stmt= $pdo->prepare($sql);
		$stmt->execute();
	}

	if (isset($_POST['PatientID'])) {
		$PatientID = $_POST['PatientID'];
		$getPat = $pat->fetch_data($PatientID);
		$biller = $getPat['PatientBiller'];
	}else{
		$PatientID = "";
		$biller = "";
		}
	if (isset($_POST['itemsID'][0])) {
		$payment = $_POST['payment'];
		$itemsID = $_POST['itemsID'];
		$itemsQTY = $_POST['itemsQTY'];
		$itemsDisc = $_POST['itemsDisc'];
		$iID = arraytoString($itemsID);
		$iQTY = arraytoString($itemsQTY);
		$iDisc = arraytoString($itemsDisc);
	}else{
		$iID = "";
		$iQTY = "";
		$iDisc = "";
		$payment = "";
	}
	$status = $_POST['status'];// waiting for status column to create
	$change = $_POST['change'];
	$totalAmount = $_POST['totalAmount'];
	$transNO = $_POST['transNO'];
	$cashier = $_POST['cashier'];
	$transType = $_POST['transType'];
	

	if ( $transType == 0 ) {
		$transType = "";
	}else if($transType == 1){
		$transType = "ACCOUNT";
	}else if($transType == 2){
		$transType = "CASH";
	}

	try{
		if (isset($_POST['transID'])) {
			$transID = $_POST['transID'];
			UpdateTransaction($transID,$transNO, $PatientID, $transType, $cashier, $iID, $iQTY, $biller, $totalAmount, $payment, $iDisc, $change, $totalAmount, $status);
		}else{
			Transaction($transNO, $PatientID, $transType, $cashier, $iID, $iQTY, $biller, $totalAmount, $payment, $iDisc, $change, $totalAmount, $status);
			$transData = $trans->fetchByRef($transNO);
			$transID = $transData['TransactionID'];
		}
		if ($status == 0) {
			echo "Transaction Hold";
		}else{
			echo $transID;
		}
		
	}catch (Exception $e){
		echo $e->getMessage();
	}
?>