<?php

class Patient {
	public function fetch_all(){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM qpd_patient ORDER BY PatientID DESC LIMIT 1000");
		$query->execute();

		return $query->fetchAll();
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_patient WHERE PatientID = ? ");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();
	}
	public function fetch_data_ref($ref){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_patient WHERE PatientRef = ? ");
			$query->bindValue(1, $ref);
			$query->execute();

			return $query->fetch();
	}
	public function Update_Patient($pid, $fname, $mname, $lname, $age, $gender, $comname, $contact, $bod, $add, $pos, $biller){
		global $pdo;

		$query = $pdo->prepare("UPDATE qpd_patient set FirstName = '$fname', MiddleName = '$mname', LastName = '$lname', Age = '$age', Gender = '$gender', CompanyName = '$comname', ContactNo = '$contact', BirthDate = '$bod', Address = '$add', Position = '$pos', PatientBiller = '$biller' WHERE PatientID = '$pid'");
		$query->execute();
	}

}
?>






