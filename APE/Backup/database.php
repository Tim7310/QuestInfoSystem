<?php 
try {
$pdo2 = new PDO ('mysql:host=localhost;dbname=ape','root','') ;
} catch (PDOException $e) {
	exit('Database Error: '.$e->getMessage());
}
?>