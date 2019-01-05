
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css" media="screen">
.form-control{
	margin-bottom: 10px;
	width:350px;
}
</style>
</head>
<body>
<?php
include_once('sidebar.php');
?>

<br><br>
<div class="container-fluid">
<h2><b><center>PATIENT REGISTRATION</center></b></h2>
		<div class="form-group">
		<div class="Col-sm-12">
		 <form action="registrationadd.php" method="post" autocomplete="off" enctype="multipart/form-data">
			<div class="col-sm-4 col-sm-offset-2">
				 <label for=""> First Name</label>
				 <input type="text"  name="fl" class="form-control" required />
				  <label for="">Middle Name:</label>
				 <input type="text"  name="mn" class="form-control" required />
			 <label for="">Last Name:</label>
				 <input type="text"  name="ln" class="form-control" required />
				  <label for="">Age</label>
				 <input type="text"  name="age" class="form-control" required />
				  <label for="">Gender</label>
				 <input type="text"  name="gen" class="form-control" required />
				  </div>
			 <div class="col-sm-6">
				  <label for="">Birth Date:</label>
				 <input type="text"  name="bd" class="form-control" required />  
				 <label for="">Cell Phone #:</label>
				 <input type="number"  name="cp" class="form-control" required />
				 <label for="">Address :</label>
				 <input type="text"  name="address" class="form-control" required />
				 <label for="">Referring Doctor:</label>
				 <input type="text"  name="refdoc" class="form-control" required />
				 <label for="">TEST REQUEST/S:</label>
				 <input type="text"  name="testreq" class="form-control" required />
			 </div>
			 <input type="submit" value="REGISTER">
			 </form>
		 </div>
		</div>
	</div>
	
</body>
</html>