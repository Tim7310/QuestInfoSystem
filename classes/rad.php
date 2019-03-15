<?php

class rad {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, qpd_xray x WHERE x.TransactionID = t.TransactionID AND f.PatientID = x.PatientID ORDER BY t.TransactionID");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, qpd_xray v WHERE f.PatientID = ? AND t.PatientID = ? AND v.PatientID = ? AND t.TransactionID = ? AND v.TransactionID = ?");
			$query->bindValue(1, $id);
			$query->bindValue(2, $id);
			$query->bindValue(3, $id);
			$query->bindValue(4, $tid);
			$query->bindValue(5, $tid);
			$query->execute();

			return $query->fetch();
	}
	public function fetchMarker($column,$data1, $data2){
		global $pdo;
		$query = $pdo->prepare("SELECT * from xray_markers x, qpd_patient p, qpd_trans t where x.PatientID = p.PatientID and x.TransactionID = t.TransactionID and t.$column between '$data1' and '$data2' ");
		$query->execute();
		return $query->fetchAll();
	}
	public function fetchHis($pid, $tid){
		global $pdo;
		$query = $pdo->prepare("SELECT * from qpd_xray where PatientID = '$pid' and TransactionID != '$tid' ");
		$query->execute();
		return $query->fetchAll();
	}
	public function checkXray($pid, $tid){
		global $pdo;
		$query = $pdo->prepare("SELECT * from qpd_xray where PatientID = '$pid' and TransactionID = '$tid' ");
		$query->execute();
		if ($query->rowCount() > 0) {
			return True;
		}else{
			return False;
		}
	}

}
?>
