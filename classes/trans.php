<?php
class trans {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT f.*, t.* FROM qpd_patient f, qpd_trans t WHERE f.PatientID = t.PatientID ORDER BY t.TransactionID");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_allCash(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t WHERE f.PatientID = t.PatientID AND t.TransactionType = 'CASH' ORDER BY t.TransactionID");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t WHERE f.PatientID = ? AND t.TransactionID = ?");
			$query->bindValue(1, $id);
			$query->bindValue(2, $tid);
			$query->execute();

			return $query->fetch();

	}
	public function refCount($ref){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_trans WHERE TransactionRef = ?");
			$query->bindValue(1, $ref);
			$query->execute();

			return $query->rowCount();

	}
	public function fetchByRef($ref){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_trans WHERE TransactionRef = ?");
			$query->bindValue(1, $ref);
			$query->execute();

			return $query->fetch();

	}
	 public function fetch_item($id){
	 	global $pdo;

	 	$query = $pdo->prepare("SELECT * from qpd_items where ItemID = '$id'");
	 	$query->execute();	

	 	return $query->fetch();
	 }
	 public function hold_trans(){
	 	global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_trans WHERE status ='0'  ORDER BY TransactionID");
		$query->execute();

		return $query->fetchAll();
	 }
	 public function each_item($id){
	 	$ids = explode(',', $id);
	 	$array = array();
	 	foreach ($ids as $key) {
	 		$data = $this->fetch_item($key);
	 		$array[] = $data;
	 	}
	 	return $array;
	 }
	 public function compute_discount($id){
	 	global $pdo;

	 	$query = $pdo->prepare("SELECT * FROM qpd_trans where TransactionID = '$id'");
	 	$query->execute();
	 	$trans = $query->fetch();
	 	$ids = $trans['ItemID'];
	 	$discids = $trans['Discount'];
	 	$qtyid = $trans['ItemQTY'];
	 	$idarr = explode(",", $ids);
	 	$idarr = array('id' => $idarr);
	 	$disarr = explode(",", $discids);
	 	$disarr = array('dis' => $disarr);
	 	$qtyid = explode(",", $qtyid);
	 	$qtyid = array('qty' => $qtyid);
	 	$arr = array_merge($idarr, $disarr, $qtyid);
	 	$discTotal = 0;
	 	for ($x=0;$x < count($arr['id']);$x++) {
	 		$price = $this->fetch_item($arr["id"][$x]);
	 		$priceV = $price['ItemPrice'] * $arr["qty"][$x];
	 		$discPrice = $arr["dis"][$x] / 100 * $priceV;
	 		$discTotal = $discTotal + $discPrice;
	 	}	 	
	 	return $discTotal;
	 }
	 public function total_price($id){
	 	global $pdo;

	 	$query = $pdo->prepare("SELECT * FROM qpd_trans where TransactionID = '$id'");
	 	$query->execute();
	 	$trans = $query->fetch();
	 	$ids = $trans['ItemID'];
	 	$qtyid = $trans['ItemQTY'];
	 	$idarr = explode(",", $ids);
	 	$idarr = array('id' => $idarr);
	 	$qtyid = explode(",", $qtyid);
	 	$qtyid = array('qty' => $qtyid);
	 	$arr = array_merge($idarr, $qtyid);
	 	$discTotal = 0;
	 	for ($x=0;$x < count($arr['id']);$x++) {
	 		$price = $this->fetch_item($arr["id"][$x]);
	 		$priceV = $price['ItemPrice'] * $arr["qty"][$x];
	 		$discTotal = $discTotal + $priceV;
	 	}	 	
	 	return $discTotal;
	 }
	 public function fetch_micro(){
		global $pdo;

		$query = $pdo->prepare("SELECT f.*, t.* FROM qpd_patient f, qpd_trans t, qpd_labresult l WHERE f.PatientID = t.PatientID and l.PatientID = f.PatientID and l.UriColor != ' ' and l.UriColor != 'N/A' and l.UriColor != '' ORDER BY t.TransactionID");
		$query->execute();

		return $query->fetchAll();

	}
	public function add_quantity($size){
		global $pdo;

		$query = $pdo->prepare("SELECT `totalCount` FROM `qpd_count` WHERE xrayFilm = '$size'");
		$query->execute();

		$count = $query->fetch();
		$count = $count['totalCount'] + 1;

		$query2 = $pdo->prepare("UPDATE `qpd_count` SET `totalCount`= '$count' WHERE `xrayFilm` = '$size'");
		$query2->execute();
		return $count;
	}

}
?>
