
	<?php

	require ('connect.php');
 	session_start();
  	// if ($_SESSION['tbl_users'] != 'true'){
   //  header('location:../index.php');
  	// }
  	?>
<!DOCTYPE html>
<html>
<head>
	<title>View Records</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
</head>
<body>
<?php
		$query1 = mysqli_query($conn, "SELECT * FROM qpd_form where id='".$_GET['id']."'");
        while($query2 = mysqli_fetch_array($query1))
        {

            echo '<br><br>';
            echo '<div class="container-fluid">';
                echo '<div class="panel panel-info">';
                    echo '<div class="panel-heading">Primary Information</div>';
                    echo '<div class="panel-body">';
                    echo 'sample';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            echo $query2[1]."<br>";
            echo $query2[0]."<br>";
            echo $query2[2]."<br>";
            echo $query2[3]."<br>";
            echo $query2[4]." ".$query2[5]." ".$query2[6]."<br>";
            echo $query2[7]."<br>";
            echo $query2[8]."<br>";
            echo $query2[9]."<br>";
            echo $query2[10]."<br>";
            echo $query2[11]."<br>";
            echo $query2[12]."<br>";
            echo "+63".$query2[13]."<br>";
            echo $query2[14]."<br>";
            echo $query2[15]."<br>";
            echo $query2[16]."<br>";
            echo $query2[17]."<br>";
            echo $query2[18]."<br>";
            echo $query2[19]."<br>";
            echo $query2[20]."<br>";
            echo $query2[21]."<br>";
            echo $query2[22]."<br>";
            echo $query2[23]."<br>";
            echo $query2[24]."<br>";
            echo $query2[25]."<br>";
            echo $query2[26]."<br>";
            echo $query2[27]."<br>";
            echo $query2[28]."<br>";
            echo $query2[29]."<br>";
            echo $query2[30]."<br>";
            echo $query2[31]."<br>";
            echo $query2[32]."<br>";
            echo $query2[33]."<br>";
            echo "<a href='javascript:history.back()'><button type='button' class='btn btn-info view' name='vrec'>Back</button></a>";
        }
    
?>

</body>
</html>
