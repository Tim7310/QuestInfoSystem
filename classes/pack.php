<?php

class pack {
	public function fetch_by_type($type){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_items WHERE ItemType LIKE '$type%' ORDER BY ItemName asc");
		$query->execute();

		return $query->fetchAll();

	}
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_items ORDER BY ItemName asc");
		$query->execute();

		return $query->fetchAll();

	}


	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_items WHERE ItemID = ?");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();


	}
	public function item_type($id, $val){
		global $pdo;

		$sql = $pdo->prepare("UPDATE qpd_items set TestType = '$val' WHERE ItemID = '$id'");

		$sql->execute();
	}
	


}
?>
