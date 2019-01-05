<?php
//include_once('../connection.php');
	/**
	 * 
	 */
	class Input
	{
		
		function UpLabData($column, $val, $id){
			global $pdo;
			$UpdateThis = "";
			if (is_array($column)) {
				for ($i=0; $i < count($column); $i++) { 
					if (end($column) == $column[$i]) {
						$UpdateThis .= $column[$i]. " = " ."'".$val[$i]."'";
					}else{
						$UpdateThis .= $column[$i]. " = " ."'".$val[$i]."'" . ", ";
					}
				}
				$sql = "UPDATE qpd_labresult SET $UpdateThis WHERE PatientID = $id";
			}
			else{
				$sql = "UPDATE qpd_labresult SET $column = $val WHERE PatientID = $id";
			}
			$ex = $pdo->prepare($sql);
			$ex->execute();
			$ex = null;
			// return $sql;
		}
	}

// $input = new Input;
// $column = array("WhiteBlood","Hemoglobin","HemoNR");
// $val = array("try","try","try");
// echo $input->UpLabData($column,$val,20);
?>