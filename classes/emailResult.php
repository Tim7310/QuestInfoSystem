<?php

class sendEmail {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, qpd_class c WHERE f.PatientID = t.PatientID AND f.PatientID = c.PatientID ORDER BY f.PatientID LIMIT 1000");
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


}
?>
