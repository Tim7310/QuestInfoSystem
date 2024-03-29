<?php
if(!isset($_SESSION)) 
  { 
  session_start(); 
  } 
 require_once '../class.user.php';
  $user = new USER;
  $user->bypass('qc');

$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="../source/bootstrap4/css/bootstrap.css" rel="stylesheet"/>
    <link href="../source/bootstrap4/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<style type="text/css">
  .navbar-custom {
    background-color: #2980b9;
}
  .navbar-nav a {
    font-family: "Calibri";
    font-size: 24px;
    font-weight: bold;
    color:#bdc3c7;
  }

    .navbar-custom {
    background-color: #2980b9;
}
  .navbar-nav a {
    font-family: "Calibri";
    font-size: 20px;
    font-weight: bold;
    color:#bdc3c7;
  }

  .navbar{background:#2980B9;}
.nav-item::after{content:'';display:block;width:0px;height:2px;background:#55D4FF;transition: 0.2s;}
.nav-item:hover::after{width:100%;}
.navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show > .nav-link,.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover{color:#55D4FF;}
.nav-link{padding:0px 5px;transition:0.2s;}
.dropdown-item.active, .dropdown-item:active{color:#D4D4FF;}
.dropdown-item:focus, .dropdown-item:hover{background:#55D4FF;}

</style>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark navbar-custom">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <a class="navbar-brand">
    <img src="../assets/QPDLogo.png" width="40" height="40" class="d-inline-block align-center" alt="">
    
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="../home.php">          <i class="fas fa-home"></i>&nbsp;Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="ListOfPatients.php"> <i class="fas fa-user"></i>&nbsp;Patient Records</a>
      <a class="nav-item nav-link" href="QCMCList.php">       <i class="fas fa-laptop"></i>&nbsp;QC</a>
      <a class="nav-item nav-link" href="EmailResults.php">                  <i class="fas fa-share-square"></i>&nbsp;Email Results</a>
      <a class="nav-item nav-link" href="SummaryReport.php">  <i class="fas fa-users"></i>&nbsp;Summary</a>
      <a class="nav-item nav-link" href="ECG.php">  <i class="fas fa-file-medical-alt"></i>&nbsp;ECG</a>
      <a class="nav-item nav-link" href="PEList.php">         <i class="far fa-file"></i>&nbsp;PE Form</a>
      <a class="nav-item nav-link" href="MCList.php">         <i class="far fa-file"></i>&nbsp;MedCert</a>
      <a class="nav-item nav-link" href="../logout.php" style="margin-left: 300px;"><i class="fas fa-sign-out-alt"></i>&nbsp;LOGOUT</a>
    </div>
  </div>
  
</nav>






</body>
</html>