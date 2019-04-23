<?php
session_start();
$_SESSION["database"] = $_POST['db'];
$_SESSION["dblabel"] = $_POST['name'];
?>