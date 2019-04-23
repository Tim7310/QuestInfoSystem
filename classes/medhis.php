

<?php

class His {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_medhis ORDER BY PatientID desc");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_medhis where PatientID = '$id' and TransactionID = '$tid'");
			$query->execute();

			return $query->fetch();


	}

}
?>






