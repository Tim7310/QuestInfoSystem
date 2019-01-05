<?php
try {
$pdo = new PDO ('mysql:host=localhost;dbname=dbtest','root','') ;
} catch (PDOException $e) {
	exit('Database Error.');
}
?>