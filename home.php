<?php 
// copy this
// session_start();
// require_once 'class.user.php';
// $bypass = new USER;
// $bypass->bypass('lab');

// end of copy
session_start();
require_once 'class.user.php';
$user = new USER();

if(!$user->is_logged_in())
{
    $user->redirect('index.php');
}else{
    $data = $user->getUser($_SESSION['userSession']);
    $userData = $user->userData($_SESSION['userSession']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-74.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-741.css">
    <link rel="stylesheet" href="assets/css/dh-navbar-centered-brand.css">
    <link rel="stylesheet" href="assets/css/Material-Card.css">
    <link rel="stylesheet" href="assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS.css">
    <link rel="stylesheet" href="assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS1.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand" href="#">Quest Info System </a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-2">
                <ul class="nav navbar-nav ml-auto" id="desktop-toolbar">
                    <li class="dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><img class="rounded-circle" src="assets/img/user.png" width="25px" height="25px"> 
                        <?php echo $userData['userName']?> <i class="fa fa-chevron-down fa-fw"></i></a>
                        <div class="dropdown-menu"
                            role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fa fa-user fa-fw"></i> Profile </a><a class="dropdown-item" role="presentation" href="logout.php"><i class="fa fa-power-off fa-fw"></i>Logout </a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            
            <div class="col-sm-6 col-md-4 mt-3">
                <div class="box"><img src="assets/img/cashier.jpg" alt="Cashier">
                    <div class="box-heading">
                        <h4 class="title" style="color:#333333;">Cashier</h4><span class="post" style="color:#333333;">Transaction and Sales</span></div>
                    <div class="boxContent">
                        <p class="description" style="color:#333333;">Honesty is the fastest way to prevent a mistake from turning into a failure.</p>
                    <?php 
                        if( $data['CashierAccount'] != 0 or $data['CashierCash'] != 0 ){               
                    ?>
                    <a href="cashier/cash1.php" class="read">Go To Cashier<i class="fa fa-angle-right"></i></a>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mt-3">
                <div class="box"><img src="assets/img/lab.jpg" alt="Laboratory">
                    <div class="box-heading">
                        <h4 class="title" style="color:#333333;">Laboratory</h4><span class="post" style="color:#333333;">Encode Laboratory Results</span></div>
                    <div class="boxContent">
                        <p class="description" style="color:#333333;">By concentrating on precision, one arrives at technique, but by concentrating on technique one does not arrive at precision.</p>
                    <?php 
                        if( $data['Laboratory'] != 0){               
                    ?>
                        <a href="#" class="read">Go To Laboratory<i class="fa fa-angle-right"></i></a>
                     <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mt-3">
                <div class="box"><img src="assets/img/xray.jpg" alt="Imaging">
                    <div class="box-heading">
                        <h4 class="title" style="color:#333333;">Imaging</h4><span class="post" style="color:#333333;">X-Ray Readings and Markers</span></div>
                    <div class="boxContent">
                        <p class="description" style="color:#333333;">Be precise. A lack of precision is dangerous when the margin of error is small.</p><a href="#" class="read">Go To Imaging<i class="fa fa-angle-right"></i></a></div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mt-3">
                <div class="box"><img src="assets/img/qc.jpg" alt="QC">
                    <div class="box-heading">
                        <h4 class="title" style="color:#333333;">Quality Control</h4><span class="post" style="color:#333333;">Quality Control Section</span></div>
                    <div class="boxContent">
                        <p class="description" style="color:#333333;">Quality in a service or product is not what you put into it. It is what the client or customer gets out of it.</p><a href="#" class="read">Go To QC<i class="fa fa-angle-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>