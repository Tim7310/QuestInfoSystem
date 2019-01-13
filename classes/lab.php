<?php
class lab {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, qpd_labresult x WHERE x.TransactionID = t.TransactionID AND f.PatientID = x.PatientID ORDER BY t.TransactionID");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, qpd_labresult v WHERE f.PatientID = ? AND t.PatientID = ? AND v.PatientID = ? AND t.TransactionID = ? AND v.TransactionID = ?");
			$query->bindValue(1, $id);
			$query->bindValue(2, $id);
			$query->bindValue(3, $id);
			$query->bindValue(4, $tid);
			$query->bindValue(5, $tid);
			$query->execute();

			return $query->fetch();
	}
	public function fetch_data2($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_labresult WHERE PatientID = ? and TransactionID = ?");
			$query->bindValue(1, $id);
			$query->bindValue(2, $tid);
			$query->execute();

			return $query->fetch();
	}
	public function medtech(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM lab_personnel WHERE Position = 'MEDICAL TECHNOLOGIST' OR Position = 'QUALITY CONTROL'");
		$query->execute();

		return $query->fetchAll();
	}
	public function medtechByID($id){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM lab_personnel WHERE personnelID = ? ");
		$query->bindValue(1, $id);
		$query->execute();

		return $query->fetch();
	}


}

?>
