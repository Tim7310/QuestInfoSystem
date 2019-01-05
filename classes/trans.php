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

		$query = $pdo->prepare("SELECT f.PatientID, f.CompanyName, f.Position, f.FirstName, f.MiddleName, f.LastName, f.Age, f.Gender, f.ContactNo,t.TransactionID, t.TransactionDate, t.TransactionType, t.ItemName, t.ItemDescription, t.ItemPrice, t.GrandTotal FROM qpd_patient f, qpd_trans t WHERE f.PatientID = t.PatientID AND t.TransactionType = 'CASH' ORDER BY t.TransactionID");
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

}
?>
