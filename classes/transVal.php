<?php

class trans {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_trans ORDER BY PatientID desc");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_trans WHERE PatientID = ? AND TransactionID = ?");
			$query->bindValue(1, $id);
			$query->bindValue(2, $tid);
			$query->execute();

			return $query->fetch();
	}
	public function fetch_id($id){
		global $pdo;

		$query = $pdo->prepare("SELECT TransactionID FROM qpd_trans WHERE TransactionDate in (SELECT MAX(TransactionDate)
    	FROM qpd_trans where SalesType = 'sales' and PatientID = ? and status = '1') ");
		$query->bindValue(1, $id);
		$query->execute();

		return $query->fetch();

	}

}
?>
