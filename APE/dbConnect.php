<?php
session_start();
$name = $_SESSION['database'];
	try {
	$dsn = "mysql:host=localhost;dbname=".$name;
	$pdo = new PDO ($dsn,'root','') ;
	return $pdo;
	} catch (PDOException $e) {
		exit('Database Error: '.$e->getMessage());
	}

?>