<?php 
session_start();
require_once '../class.user.php';
$user = new USER();

if(!$user->is_logged_in())
{
    $user->redirect('../index.php');
}else{
    $data = $user->getUser($_SESSION['userSession']);
    $userData = $user->userData($_SESSION['userSession']);
}
if (!isset($_SESSION['database'])) {
  $_SESSION['database'] = "ape";
  $_SESSION['dblabel'] = "ape";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../admin/dashboard/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../admin/dashboard/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    QIS APE
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="../assets/css/MaterialIcons.css" />
 
  <link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.min.css">
<script type="text/javascript" src="../source/popper.min.js"></script>
<script type="text/javascript" src="../source/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../source/jquery-confirm.min.css">

<link href="../source/fontawesome/css/all.css" rel="stylesheet"/>
<link href="../admin/assets/bootstrap3/css/font-awesome.css"/>
  <!-- CSS Files -->
  <link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
  <link href="../admin/dashboard/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- <link href="../source/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" /> -->
<!--   <script type="text/javascript" src="../source/bootstrap-select/dist/js/bootstrap-select.min.js"></script> -->
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="dashboard/assets/demo/demo.css" rel="stylesheet" /> -->

</head>
<style type="text/css">
  ::-webkit-scrollbar {
    width: 3px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1; 
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #11B8CC; 
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #555; 
  }
  input{
    border:none !important;
    padding-left: 5px !important;
  }
  .loader {
    height: 4px;
    width: 100%;
    position: relative;
    overflow: hidden;
    background-color: #ddd;
  }
  .loader:before{
    display: block;
    position: absolute;
    content: "";
    left: -200px;
    width: 200px;
    height: 4px;
    background-color: #9D36B3;
    animation: loading 2s ease-out infinite;
  }

  @keyframes loading {
      from {left: -200px; width: 30%;}
      50% {width: 30%;}
      70% {width: 70%;}
      80% { left: 50%;}
      95% {left: 120%;}
      to {left: 100%;}
  }
</style>
<body class="">
  <div class="loader" id="mainloader" style="display: none"></div>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../admin/dashboard/assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="../home.php" class="simple-text logo-normal">
          <?php echo $_SESSION['dblabel']?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  mynav" id="reg">
            <a class="nav-link" href="#" >
              <i class="material-icons">attach_money</i>
              <p>Registration</p>
            </a>
          </li>
          <li class="nav-item mynav" id="pe">
            <a class="nav-link" href="#">
              <i class="material-icons">person</i>
              <p>Physical Examination</p>
            </a>
          </li>
           <li class="nav-item mynav" id="xray">
            <a class="nav-link" href="#" >
              <i class="material-icons">flare</i>
              <p>Xray</p>
            </a>
          </li>
          <li class="nav-item mynav">
            <a class="nav-link" href="#">
              <i class="material-icons">content_paste</i>
              <p>Table List</p>
            </a>
          </li>
          <li class="nav-item mynav">
            <a class="nav-link" href="#">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li>
          <li class="nav-item mynav">
            <a class="nav-link" href="#">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item mynav">
            <a class="nav-link" href="#">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item mynav">
            <a class="nav-link" href="#">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" >
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top sticky-top" >
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand">Registration</a>

          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">
             <!--  <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownData" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">settings</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownData">
                  <h6 class="dropdown-item">Companies</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item database" href="#">Ape
                  <input type="hidden" name="" value="ape"></a>
                  <a class="dropdown-item database" href="#">Elite Clean
                   <input type="hidden" name="" value="dbqis"></a>
                </div>
              </li>
               <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="../home.php">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
       
      <!-- End Navbar -->
      
      <div class="content" id="content" style="overflow-y: auto">
        
      </div>

    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../admin/dashboard/assets/js/Chart.js"></script>
  <script src="../admin/dashboard/assets/js/core/popper.min.js"></script>
  <script src="../admin/dashboard/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../admin/dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../admin/dashboard/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../admin/dashboard/assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../admin/dashboard/assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../admin/dashboard/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../admin/dashboard/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../admin/dashboard/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../admin/dashboard/assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../admin/dashboard/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../admin/dashboard/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../admin/dashboard/assets/js/plugins/fullcalendar.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../admin/dashboard/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script> -->
  <!-- Library for adding dinamically elements -->
  <script src="../admin/dashboard/assets/js/plugins/arrive.min.js"></script>
 
  <!--  Notifications Plugin    -->
  <script src="../admin/dashboard/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../admin/dashboard/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../admin/dashboard/assets/demo/demo.js"></script>
  <script type="text/javascript" src="../source/jquery-confirm.min.js"></script>

  <script>
    $(document).ready(function() {
       
  function loaderFunc(){
        $("#content").show();
        $("#mainloader").hide();
      }

    $("#content").load("import.php",{},function(){
    });
    $(".mynav").click(function(){
      $(".mynav").removeClass("active");
      $(this).addClass("active");
      var labelvalue = $(this).find("a").find("p").html();
      $(".navbar-brand").html(labelvalue); 

      if ($("#reg").hasClass("active")) {
      $("#mainloader").show();$("#content").hide();
       $("#content").load("import.php",{},function(){
         setTimeout(loaderFunc, 500, function(){});
       });
      }
      else if ($("#pe").hasClass("active")) {
        history.replaceState(null, null, 'apemain.php?selectPE');
        $("#mainloader").show();$("#content").hide();
        $("#content").load("PE.php",{},function(){
              setTimeout(loaderFunc, 1000, function(){});
              setTimeout(function(){
                $("#trigbtn").trigger("click");
              }, 1100);            
         });
      }
      else if ($("#xray").hasClass("active")) {
         history.replaceState(null, null, 'apemain.php?selectXray');
        $("#mainloader").show();$("#content").hide();
        $("#content").load("XRay.php",{},function(){
           setTimeout(loaderFunc, 1000, function(){});
              setTimeout(function(){
                $("#trigbtn").trigger("click");
              }, 1100);
        });
      }
    });
     var urlData = window.location.search;
    //urlData = urlData.split("&");
     if (urlData == "?selectPE" ) {
      $("#pe").trigger("click");
    //   $(".mynav").removeClass("active");
    //   $(".navbar-brand").html("PE Add Record"); 
    //   $("#content").load("import.php",{},function(){});
     }else if (urlData == "?selectXray" ){
        $("#xray").trigger("click");
     }
    
    $(".database").click(function(e){
      e.preventDefault();
      var db = $(this).children("input").val();
      var name = $(this).html();
      $.post("changeDB.php",{db:db,name:name},function(){
        location.reload();
      });
    });  
    
    });
  </script>
</body>

</html>
