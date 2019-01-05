<?php
/**
 * 
 */
class Email{
	public function insertEmail($rec, $title, $resFile){
		$pdo = new PDO ('mysql:host=localhost;dbname=dbqis','root','') ;
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date = date("Y-m-d H:i:s");
		$sql = "INSERT INTO qpd_pdfresult ( Receipient, Title, ResultFiles, SendDate ) VALUES (?, ?, ?, ?)";
		try{
			
			$sth = $pdo->prepare($sql);
			$sth = $sth->execute([$rec, $title, $resFile, $date]);
			if ($sth) {
				echo "success";
			}else{
				echo "Failed";
			}
		}
		catch(PDOExeption $e){
			echo $e->getMessage();
		}
	}
}




?>