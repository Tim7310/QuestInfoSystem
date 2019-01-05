<?php
//include_once('../connection.php');
class trans {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM  qpd_trans 
					WHERE TransactionType = 'ACCOUNT'
					AND Biller = 'INTELLICARE'
					OR Biller = 'EASTWEST' 
					OR Biller = 'VALUCARE' 
					OR Biller = 'COCOLIFE' 
					OR Biller = 'AVEGA' 
					ORDER BY TransactionID");
		$query->execute();
		$transdata = $query->fetchAll();
		$count = $query->rowCount();
		$where = "";
		for ($i=0; $i < $count; $i++) { 
			$where = $transdata[$i]['PatientID'];
			$query2 = $pdo->prepare("SELECT * FROM qpd_patient WHERE PatientID = $where");
			$query2->execute();
			$patdata = $query2->fetchAll();
			array_push($transdata[$i],$patdata);	
		}
		
		return $transdata;

	}

	public function fetch_data($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_trans t, qpd_patient p WHERE t.TransactionID = ? AND p.PatientID = ? ");
			$query->bindValue(1, $tid);
			$query->bindValue(2, $id);
			$query->execute();

			return $query->fetch();


	}


}

// $class = new trans;
// $trans = $class->fetch_all();
// print_r($trans);
// foreach ($trans['trans'] as $key) {
// 	echo $key['PatientID'];
// }
?>

