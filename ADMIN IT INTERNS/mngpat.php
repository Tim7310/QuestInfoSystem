<?php
  // session_start();
  // require('connect.php');
  // if ($_SESSION['tbl_users'] != 'true') {
  //  header('Location:../login.php');
  // }
  
  require ('connect.php');
  session_start();
  // if ($_SESSION['tbl_users'] != 'true') {
  //   header('location:../index.php');
  // }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script> -->
   
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
          <a class="navbar-brand" href="#" style="color: #1b99d5;">Admin</a>
        </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
            <li class=""><a href="#">Manage Accounts</a></li>
            <li class="active"><a href="mngpat.php?p=1">Manage Patients</a></li>
         
      </ul>
      <div class="top-nav ">
          <ul class="nav pull-right top-menu">
            <a href="logout.php">
            <button type="button" class="btn btn-info">
            <span class="glyphicon glyphicon-log-out"></span> 
            Log Out
            </button>
            </a>
          </ul>
        </div>
          </div>
  </div>
   </nav>
   <br><br><br><br><br>
<div class="container-fluid">
  <div class="container-fluid">
    <form class="form-horizontal"  method="post" name="upload_excel" enctype="multipart/form-data">
      <fieldset>

          <!-- Form Name -->
          <legend>Patient Records</legend>

          <!-- File Button -->
          <div class="form-group">
              <div class="col-md-4">
                  <input type="file" name="file" id="file" class="input-large"  >
              </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <div class="col-md-4">
                <button type="submit" id="submit" name="imp" class="btn btn-info button-loading" data-loading-text="Loading..."><span class="glyphicon glyphicon-download-alt"></span> Import</button>
            </div>
          </div>

      </fieldset>
      <?php
            get_all_records();
      ?>
  </div>
</div>
</body>
</html>

<?php

 if(isset($_POST["imp"])){
        $conn=mysqli_connect("localhost","root","","dbtest");
        $filename=$_FILES["file"]["tmp_name"];      
         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
            $flag = true;
            while (($getData = fgetcsv($file, 1000000, ",")) !== FALSE)
             {
              if($flag) { 
                $flag = false; 
                continue; 
              }
               date_default_timezone_set("Asia/Kuala_Lumpur");
               $sql = "INSERT into qpd_form (comnam,Code,apppos,firnam,midnam,lasnam,address,date,birdat,emaadd,age,gen,connum,class,cb,uri,feca,hb,anti,drug,xray,xraytype,pe,ot,se,ct,rst,urispec,fecaspec,bloodspec,comment,SID,DateUpdate) 
                   values ('".$getData[1]."' , '".$getData[2]."' , '".$getData[3]."' , '".$getData[4]."' , 
                           '".$getData[5]."' , '".$getData[6]."' , '".$getData[7]."' , '".$getData[8]."' ,
                           '".$getData[9]."' , '".$getData[10]."' , '".$getData[11]."' , '".$getData[12]."' ,
                           '".$getData[13]."' , '".$getData[14]."' , '".$getData[15]."' , '".$getData[16]."' ,
                           '".$getData[17]."' , '".$getData[18]."' , '".$getData[19]."' , '".$getData[20]."' ,
                           '".$getData[21]."' , '".$getData[22]."' , '".$getData[23]."' , '".$getData[24]."' ,
                           '".$getData[25]."' , '".$getData[26]."' , '".$getData[27]."' , '".$getData[28]."' ,
                           '".$getData[29]."' , '".$getData[30]."' , '".$getData[31]."' , '".$getData[32]."' ,
                           '".date("Y/m/d H:i:s")."')";
                   $result = mysqli_query($conn, $sql);
                if(!isset($result))
                {
                    echo "<script type=\"text/javascript\">
                            alert(\"Invalid File:Please Upload CSV File.\");
                            window.location = \"mngpat.php?p=1\"
                          </script>";       
                }
                else {
                      echo "<script type=\"text/javascript\">
                        alert(\"CSV File has been successfully Imported.\");
                        window.location = \"mngpat.php?p=1\"
                    </script>";
                }
             }
            
             fclose($file); 
         }
    }    


 ?>

 <?php
function get_all_records(){
    $conn = mysqli_connect("localhost","root","","dbtest");

    $query69 = mysqli_query($conn, "SELECT * FROM qpd_form");
    $count = mysqli_num_rows($query69); 

    $rowsperpage = 10;
    $page = $_REQUEST['p'];
    $page = $page - 1;

    $p = $page * $rowsperpage;

    $Sql = "SELECT * FROM qpd_form ORDER by id Desc limit ".$p.",".$rowsperpage;
    $result = mysqli_query($conn, $Sql);

    // $Sql = "SELECT * FROM tbl_form ORDER by id Desc";
    // $result = mysqli_query($conn, $Sql);

    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'>
            <table id='myTable' class='table table-striped'>
              <thead>
                <tr>
                  <th width='2%'>Id</th>
                  <th width='10%'>Company Name</th>
                  <th width='8%'>Code</th>
                  <th width='10%'>Applied Position</th>
                  <th width='13%'>Name</th>
                  <th width='2%'>Age</th>
                  <th width='2%'>Gender</th>
                  <th width='18%'>Address</th>
                  <th width='10%'>Action</th>
                </tr>
              </thead>
            <tbody>";


     while($row = mysqli_fetch_assoc($result)) {

         echo " <tr>
                  <td>" . $row['id']."</td>
                  <td>" . $row['comnam']."</td>
                  <td>" . $row['Code']."</td>
                  <td>" . $row['apppos']."</td>
                  <td>" . $row['firnam']." ".$row['midnam']." ".$row['lasnam']."</td>
                  <td>" . $row['age']."</td>
                  <td>" . $row['gen']."</td>
                  <td>" . $row['address']."</td>
                  <td><a href='vrecs.php?id=".$row['id']."'><button type='button' class='btn btn-info' name='viewrecs'><span class='glyphicon glyphicon-open-file'></span>   View Records</button></a></td>
                </tr>";        
     }
    
     echo "</tbody></table></div>";
     
      $check = $p + $rowsperpage;

      $limit = $count / $rowsperpage;
      $limit = ceil($limit); 
      $pages = array($limit); 
      $start = 1;

      for ($i=1;$i<$limit;$i++) {
        $pages[$i-1]= $i;
      }

      $current = $_REQUEST['p'];
      $last = count($pages)+1;
      $curr0 = $current-2;
      $curr1 = $current+2;
      if ($curr0<=1) {
        $curr0 = 1;
        $curr1 = $last>5? 5 : $last;
      }
      if ($curr1>=$last) {
        $curr0 = $last-4 < 1 ? 1 : $last-4;
        $curr1 = $last;
      }

      if ($_REQUEST['p']>1) {
      $prev_page = $_REQUEST['p']-1;
      echo "<a href='mngpat.php?p=".$prev_page."'><button type='button' class='btn btn-info btn-sm'>Back</button></a>&nbsp";
      echo "<a href='mngpat.php?p=".$prev_page."'><button type='button' class='btn btn-info btn-sm'>&laquo</button></a>&nbsp";
      echo "<a href='mngpat.php?p=".$start."'><button type='button' class='btn btn-info btn-sm'>".$start.""."</button></a>&nbsp";
      echo '<button type="button" class="btn btn-default disabled btn-sm">...</button>';
     }

      for ($i=$curr0; $i<=$curr1; $i++) {
        if ($i==$_REQUEST['p']) {
          echo '<button type="button" class="btn btn-info btn-sm"><b>'.''.$i.''.'</b></button>';
        }
        else{
        echo ' <a href="mngpat.php?p='.$i.'"><button type="button" class="btn btn-default btn-sm"  style = "color: #5bc0de;"><b>'.$i.'</button></a> ';
        }
      }

     // for($i=$start; $i<=$limit; $i++){
     //  if ($i==$_REQUEST['p']) {
     //    echo '<button type="button" class="btn btn-info btn-sm"><b>'.''.$i.''.'</b></button>&nbsp';
     //  }
     //  elseif ($i>5 ) {
     //    echo "";
     //  }
     //  else{
     //    echo "<a href='mngpat.php?p=".$i."'><button type='button' class='btn btn-default active btn-sm'>".$i.""."</button></a>&nbsp";
     //  }

     // }

     if ($count >$check) {

      $next_page = $_REQUEST['p']+1;
      echo '<button type="button" class="btn btn-default disabled btn-sm">...</button>&nbsp';
      echo "<a href='mngpat.php?p=".$limit."'><button type='button' class='btn btn-info btn-sm'>".$limit.""."</button></a>&nbsp";
      echo "<a href='mngpat.php?p=".$next_page."'><button type='button' class='btn btn-info btn-sm'>&raquo</button></a>&nbsp";
      echo "<a href='mngpat.php?p=".$next_page."'><button type='button' class='btn btn-info btn-sm'>Next</button></a>&nbsp";
       
     }

      echo "<hr>";   
} else {
    echo "No Records to Display";
}
}

?>