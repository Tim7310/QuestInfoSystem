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

		$query = $pdo->prepare("SELECT * FROM qpd_items where ItemType != 'AccountHMO' and ItemType != 'AccountIndustrial' and DeletedItem != '1' ORDER BY ItemName asc");
		$query->execute();

		return $query->fetchAll();

	}
	public function fetchAll(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_items ORDER BY ItemName asc");
		$query->execute();

		return $query->fetchAll();

	}
	// public function fetch_QA(){
	// 	global $pdo;

	// 	$query = $pdo->prepare("SELECT * FROM qpd_items where QuickAccess = '1' ORDER BY ItemName asc");
	// 	$query->execute();

	// 	return $query->fetchAll();

	// }
	public function fetch_Account(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_items where ItemType LIKE '%Account%' ORDER BY ItemName asc");
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
	public function item_del($id, $val){
		global $pdo;

		$sql = $pdo->prepare("UPDATE qpd_items set DeletedItem = '$val' WHERE ItemID = '$id'");

		$sql->execute();
	}
	public function createItem($name,$desc,$price,$type,$xray,$blood,$spec,$pe){
		global $pdo;
		$sql = $pdo->prepare("INSERT into qpd_items (ItemName, Itemdescription, ItemPrice, ItemType, HaveXray, HaveSpec, HaveBlood, HavePE) values ('$name', '$desc', '$price', '$type', '$xray', '$spec', '$blood', '$pe' )");
		$sql->execute();
	}
	public function updateItem($id, $name, $Desc, $price, $type){
		global $pdo;
		$sql = $pdo->prepare("UPDATE qpd_items set 
			ItemName = '$name', ItemDescription = '$Desc', ItemPrice = '$price', ItemType = '$type' where ItemID = '$id'");
		$sql->execute();
	}
	


}
?>
