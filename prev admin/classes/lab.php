<?php

class lab {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_labresult ORDER BY id desc");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_labresult WHERE id = ?");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>
