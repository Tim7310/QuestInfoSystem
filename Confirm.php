<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = trim($_POST['uname']);
	$upass = trim($_POST['upass']);
	
	if($user_login->login($uname,$upass))
	{
		$user_login->redirect('home.php');
	}
}
echo "success";
?>