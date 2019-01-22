<?php
include_once("../connection.php");
include_once("../classes/trans.php");
$trans = new trans;
$transact = $trans->fetch_by_date($_GET['sd'],$_GET['ed']);

$array = array(array("Date and Time", "Receipt No.", "Transaction Type", "Patient Name", "Company Name", "Items", "Qty", "Subtotal", "Total", "Bill To", "Cashier", "Amount Tendered", "Given Change"));

foreach ($transact as $key) {	
	$patientName = $key['LastName'].", ".$key['FirstName'];
	$Change = $key['PaidIn'] - $key['TotalPrice'];
	
	$idpatient = $key['PatientID'];
	$itemsquantity = $key['ItemQTY'];
	$itemsquantity = explode(',', $itemsquantity);
	$itemsdiscount = $key['Discount'];
	$itemsdiscount = explode(',', $itemsdiscount);
	$itemids = $key['ItemID'];
	$itemID = explode(',', $itemids);
	$itemnum = 0;$y = 0;

	$array1 = array(array($key['TransactionDate'],$key['TransactionID'],$key['TransactionType'], $patientName, $key['CompanyName']," "," "," ",$key['TotalPrice'],$key['Biller'],$key['Cashier'], $key['PaidIn'], $Change));
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
}
//echo print_r($array[1]);
  $new_csv = fopen('/tmp/report.csv', 'w');
  for($x=0;$x < count($array);$x++){
  	fputcsv($new_csv, $array[$x]);
  }

	fclose($new_csv);

  // output headers so that the file is downloaded rather than displayed
  header("Content-type: text/csv");
  header("Content-disposition: attachment; filename = Sales Report.csv");
  readfile("/tmp/report.csv");
?>