<?php
include_once("../connection.php");
include_once("../classes/trans.php");
$trans = new trans;
$sdate = new DateTime($_GET['sd']);
$transact = $trans->fetchByBiller($_GET['sd'],$_GET['ed'],$_GET['type']);
$sdate = $sdate->format('F d Y');
$sdate = $_GET['type']." ".$sdate;


$array = array(array("Date and Time", "Receipt No.", "Transaction Type", "Patient Name", "Company Name", "Items", "Qty", "Subtotal", "Total", "Bill To", "Cashier", "Amount Tendered", "Given Change"));
$grandTotal = 0;
foreach ($transact as $key) {	
	$patientName = $key['LastName'].", ".$key['FirstName'];
	if ($key['TransactionType'] == "CASH") {
		$Change = floatval($key['PaidIn']) - floatval($key['TotalPrice']);
	}else{
		$Change = "N/A";
	}
	
	$idpatient = $key['PatientID'];
	$itemsquantity = $key['ItemQTY'];
	$itemsquantity = explode(',', $itemsquantity);
	$itemsdiscount = $key['Discount'];
	$itemsdiscount = explode(',', $itemsdiscount);
	$itemids = $key['ItemID'];
	$itemID = explode(',', $itemids);
	$itemnum = 0;$y = 0;
	

	$array1 = array(array($key['TransactionDate'],$key['TransactionID'],$key['TransactionType']." - ".$key['SalesType'], $patientName, $key['CompanyName']," "," "," ",$key['TotalPrice'],$key['Biller'],$key['Cashier'], $key['PaidIn'], $Change));
	$array = array_merge($array, $array1);
	if ($itemids != ""){
	foreach ($itemID as $key1) {
	    $items = $trans->fetch_item($key1);
	   	$itemName = $items['ItemName'];
	    $subTotal = $itemsquantity[$y] * $items['ItemPrice'];
	    if ($itemsdiscount[$y] != 0) {
	    	 $discount = $itemsdiscount[$y] / 100 * $subTotal;
	    	 $subTotal = $subTotal - $discount;
	    }	   

	    $quantity = $itemsquantity[$y];
	    $y++;
		$array2 = array(array("","","","","",$itemName,$quantity,$subTotal,"","","", "", ""));
		$array = array_merge($array, $array2);
		}
		
	}
	$grandTotal = $grandTotal + floatval($key['TotalPrice']);
}
	$array2 = array(array("","","","","","","","TOTAL",$grandTotal,"","", "", ""));
	$array = array_merge($array, $array2);
//echo print_r($array[1]);
  $new_csv = fopen('tmp/report.csv', 'w');
  for($x=0;$x < count($array);$x++){
  	fputcsv($new_csv, $array[$x]);
  	//echo $array[$x][0];
  }

	// fclose($new_csv);

 //  // output headers so that the file is downloaded rather than displayed
  header("Content-type: text/csv");
  header("Content-disposition: attachment; filename = $sdate.csv");
  readfile("tmp/report.csv");
?>