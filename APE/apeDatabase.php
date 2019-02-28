<?php
try {
$pdo2 = new PDO ('mysql:host=localhost;dbname=dbqis','root','') ;
} catch (PDOException $e) {
	exit('Database Error.');
}
/**
 * 
 */
class import{	
	public function insertData(array $array, array $array2){
		global $pdo2;

		foreach ($array2 as $key2) {
		$patid = $key2['PatientID'];
		$patref = $key2['PatientRef'];
		$pType = $key2['PatientType'];
		$cname = $key2['CompanyName'];
		$pos = $key2['Position'];
		$fname = $key2['FirstName'];
		$mname = $key2['MiddleName'];
		$lname = $key2['LastName'];
		$add = $key2['Address'];
		$bdate = $key2['Birthdate'];
		$email = $key2['Email']; 
		$age = $key2['Age'];
		$gender = $key2['Gender'];
		$contact = $key2['ContactNo'];
		$notes = $key2['Notes'];
		$patsid = $key2['SID'];
		$cdate = $key2['CreationDate'];
		$dateUp = $key2['DateUpdate'];
		$sql2 = "INSERT INTO qpd_patient(PatientID, PatientRef, PatientType, CompanyName, Position, FirstName, MiddleName, LastName, Address, Birthdate, Email, Age, Gender, ContactNo, Notes, SID, CreationDate, DateUpdate) VALUES ( '$patid', '$patref', '$pType', '$cname', '$pos', '$fname', '$mname', '$lname', '$add', '$bdate', '$email', '$age', '$gender','$contact', '$notes', '$patsid', '$cdate', '$dateUp')";
		$smt2 = $pdo2->prepare($sql2);
		$smt2->execute();
		}
		foreach ($array as $key) {
		$tid = $key['TransactionID'];
		$ref = $key['TransactionRef'];
		$pid = $key['PatientID'];
		$tt = $key['TransactionType'];
		$cashier = $key['Cashier'];
		$item = $key['ItemID'];
		$itemname = $key['ItemName'];
		$desc = $key['ItemDescription'];
		$qty = $key['ItemQTY'];
		$price = $key['ItemPrice'];
		$biller = $key['Biller'];
		$loe = $key['LOE'];
		$an = $key['AN'];
		$ac = $key['AC'];
		$referral = $key['Referral'];
		$notes = $key['Notes'];
		$sid = $key['SID'];
		$tp = $key['TotalPrice'];
		$paidin = $key['PaidIn'];
		$disc = $key['Discount'];
		$paidout = $key['PaidOut'];
		$gt = $key['GrandTotal'];
		$td = $key['TransactionDate'];
		$sql = "INSERT INTO qpd_trans(TransactionID, TransactionRef, PatientID, TransactionType, Cashier, ItemID, ItemName, ItemDescription, ItemQTY, ItemPrice, Biller, LOE, AN, AC, Referral, Notes, SID, TotalPrice, PaidIn, Discount, PaidOut, GrandTotal, TransactionDate) VALUES ('$tid', '$ref', '$pid', '$tt', '$cashier', '$item', '$itemname', '$desc', '$qty', '$price', '$biller', '$loe', '$an', '$ac', '$referral', '$notes', '$sid', '$tp', '$paidin', '$disc', '$paidout', '$gt', '$td')";
		$smt = $pdo2->prepare($sql);
		$smt->execute();		
		}
		
	}
	public function insertItem(array $array){
		global $pdo2;
		foreach ($array as $key) {
			$name = $key['Item Name'];
			$price = $key['Active Price'];
			$desc = $key['Item Description'];
			$type = $key['Department'];
			$sql = $pdo2->prepare("INSERT into qpd_items(ItemName, ItemPrice, ItemDescription, ItemType) VALUES ('$name', '$price', '$desc', '$type')");
			$sql->execute();
		}
		
	}
}
?>
