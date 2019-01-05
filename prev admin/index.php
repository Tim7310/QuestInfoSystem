<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Index</title>
	<link rel="stylesheet" href="">
</head>





<body>
<?php include_once('sidebar.php');
?>
	<div style="margin-left: 60px;">



 You are logged in as a <?php echo $row['class']; ?> <br>
  Username : <?php echo $row['userName']; ?><br>
  Put account information including roles 
  <button class="btn btn-large btn-primary" type="button"  onclick="document.location = '../logout.php'" >Logout</button>
 </div>

 
</div>
</body>
</html>