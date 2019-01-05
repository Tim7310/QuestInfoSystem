<?php
session_start();
require_once '../class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
  $user_home->redirect('../index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Quest Phil </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel="stylesheet" href="sidebar/css/style.css">
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
  <script src="sidebar/js/index.js"></script>
  
</head>

<body>
      <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                  <a href="#">
                    Quest Phil
                  </a>
                </li>
                <li>
                  <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <li>
                  <a href="patientview.php"><i class="fa fa-fw fa-folder"></i> View Patients</a>
                </li>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i>Add Patient <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Patient Registration</li>
                    <li><a href="referralform.php">Referral Form</a></li>
                    <li><a href="registrationform.php">Walk-In</a></li>
                  </ul>
                </li>
                 <li>
                    <a href="#"><i class="fa fa-fw fa-plus"></i> Add Records</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-twitter"></i> Account Information</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top" style="background-color:black;"></span>
            <span class="hamb-middle" style="background-color:black;"></span>
            <span class="hamb-bottom" style="background-color:black;"></span>
          </button>
            <div class="container">
    
            </div>
        </div>

        <!-- Page content wrapper -->