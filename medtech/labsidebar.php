<?php
if(!isset($_SESSION)) 
	{ 
	session_start(); 
	} 
 require_once '../class.user.php';
  $user = new USER;
  $user->bypass('lab');

$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head lang="en">
      <meta charset="UTF-8">
    <link href="../source/bootstrap4/css/bootstrap.css" rel="stylesheet"/>
    <link href="../source/bootstrap4/css/cosmo-bootstrap.min.css" rel="stylesheet"/>
    <link href="../source/fontawesome/css/all.css" rel="stylesheet"/>
   
    <link rel="icon" type="image/png" href="assets/QPD.png">
    <script src="../source/tether/dist/js/tether.min.js"></script>
    <script src="../source/bootstrap4/js/bootstrap.min.js"></script>


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
 
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
     <a class="navbar-brand">
    <img src="../assets/QPDLogo.png" width="40" height="40" class="d-inline-block align-center" alt="">
    
  </a>
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="../home.php" ><i class="fas fa-home"></i>&nbsp; Home</a>
      <a class="nav-item nav-link" href="../medtech/ListOfPatients.php"><i class="fas fa-user-cog"></i>&nbsp;Patient Summary</a>
     <!--  <a class="nav-item nav-link" href="../medtech/LABSummary.php"><i class="fas fa-flask"></i>&nbsp;Lab Summary</a> -->
      <a class="nav-item nav-link" href="../medtech/LabSections.php"><i class="fas fa-users"></i>&nbsp;Laboratory Sections</a>
      <a class="nav-item nav-link" href="../medtech/ResSections.php"><i class="fas fa-th-list"></i>&nbsp;Result Sections</a>
      <a class="nav-item nav-link" href="../logout.php" style="padding-left:330px; "><i class="fas fa-sign-out-alt"></i>&nbsp; LOGOUT</a>
    </div>

  </div>
  
    
</nav>


</body>
</html>