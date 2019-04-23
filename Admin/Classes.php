<?php
/**
 * 
 */
//try to foreach on import.php instead here
class apeData{	
	public function refCount($ref){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM qpd_patient WHERE PatientRef = '$ref'");
		$query->execute();
		return $query->rowCount();
	}
	public function patbyRef($ref){
		global $pdo;
		$query = $pdo->prepare("SELECT PatientID FROM qpd_patient WHERE PatientRef = '$ref'");
		$query->execute();
		return $query->fetch();
	}
	public function randomDigits(){
	do{
		$numbers = range(0,9);
	    $digits = '';
	    $length = 8;
	    shuffle($numbers);
		    for($i = 0; $i < $length; $i++)
		    {
		       	$digits .= $numbers[$i];
		    }
		$patdata = $this->refCount($digits);
	}while($patdata != 0);
    return $digits;
	}
	public function newPatient( $ptype, $cn, $pos, $fn, $mn, $ln, $add, $bd, $email, $age, $gen, $conNo, $notes, $sid, $biller){
		global $pdo;
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$pref = $this->randomDigits();
		$date = date("Y-m-d H:i:s");
		$sql = "INSERT INTO qpd_patient(PatientRef, PatientType, CompanyName, Position, FirstName, MiddleName, LastName, Address, Birthdate, Email, Age, Gender, ContactNo, Notes, SID, CreationDate, PatientBiller) VALUES 
		( '$pref',' $ptype', '$cn', '$pos', '$fn', '$mn', '$ln', '$add', '$bd', '$email', '$age', '$gen', '$conNo', '$notes', '$sid', '$date' ,'$biller' )";
		$pdo->prepare($sql)->execute();
		return $pref;
	}
	public function Transaction($pid, $ttype, $cashier, $itemName, $itemQTY, $biller, $tprice, $paidIn, $disc, $PaidOut, $gtotal, $status, $loe, $an, $ac){
		global $pdo;
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date = date("Y-m-d H:i:s");
		$tref = "";
		$sql = "INSERT INTO qpd_trans 
		(TransactionRef, PatientID, TransactionType, Cashier, ItemID, ItemQTY, Biller, TotalPrice, PaidIn, Discount, PaidOut, GrandTotal, TransactionDate, status, LOE, AN, AC) 
		values ('$tref', '$pid', '$ttype', '$cashier', '$itemName', '$itemQTY', '$biller', '$tprice', '$paidIn', '$disc', '$PaidOut', '$gtotal', '$date', '$status','$loe', '$an', '$ac')";
		$stmt= $pdo->prepare($sql);
		$stmt->execute();
	}
	public function checkPE($tid){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM qpd_pe WHERE TransactionID = '$tid'");
		$query->execute();
		return $query->rowCount();
	}	
	
}
?>
