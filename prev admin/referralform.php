<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Referral Form</title>
	<link rel="stylesheet" media="all" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}
</style>

<body >
<?php
include_once('sidebar.php');
?>


<center><h3><b> REFERRAL FORM</b></h3></center><br>
<div class="container-fluid">
<div class="col-sm-10 col-sm-offset-1">
<div class="panel panel-info" style="border-radius: 0px;">
 <div class="panel-heading"><b>Patient Information</b></div>
	<div class="panel-body">
				<div class="form-group">
					<div class="col-sm-6 ">
					  <form action="referralformadd.php" method="post" autocomplete="off" enctype="multipart/form-data">
						<label for=""> Company Name:</label>
						<input type="text"  name="comnam" class="form-control" required />
						<label for="">Applied Position:</label>
						<input type="text" name="ap" class="form-control"  required />
						<label for="">First Name:</label>
						<input type="text"  name="fn" class="form-control"  required />
						<label for=""> Middle Name:</label>
						<input type="text"  name="mn" class="form-control"  required />
						<label for=""> Last Name:</label>
						<input type="text"  name="ln"  class="form-control" required />
						<label for="">Address:</label>
						<input type="text"  name="address" class="form-control" required />
					</div>
					<div class="col-sm-6">
						<label for=""> Date:</label>
						<input type="date"  name="date" class="form-control" required />
						<label for=""> Birth Date:</label>
						<input type="date"  name="bd" class="form-control" required />
						<label for="">Age:</label>
						<input type="text"  name="age" class="form-control" required />
						<label for="">Gender:</label>
						<input type="text"  name="gen" class="form-control" required />	
						<label for="">Contact No.:</label>
						<input type="text"  name="cn" class="form-control"required />	
						<label for="">Email Address:</label>
						<input type="email"  name="ea" class="form-control" required />	
					</div>
				</div>
	</div>
</div>
<div class="container-fluid">
<div class="col-sm-10 col-sm-offset-1">
<div class="panel panel-info" style="border-radius: 0px;">
<div class="panel-heading"><b>Test Request</b></div>
<div class="panel-body">
  	<div class="col-sm-12">
			<div class="col-sm-4 ">
				<b>HEMATOLOGY</b>
				<div class="checkbox">
				  <label><input type="checkbox" value="">Complete Blood Count </label>
				</div>
				<b>MICROSCOPY</b>
				<div class="checkbox">
				  <label><input type="checkbox" value="">Urinalysis</label>
				</div>
				<div class="checkbox">
				  <label><input type="checkbox" value="">Fecalysis</label>
				</div>
			</div>

			<div class="col-sm-4">
				<b>HEPATITIS MARKERS</b>
				<div class="checkbox">
				  <label><input type="checkbox" value="">HBsAg(Screening)</label>
				</div>
				<div class="checkbox">
				  <label><input type="checkbox" value="">anti-HAV</label>
				</div>
				<div class="checkbox">
				  <label><input type="checkbox" value="">DRUG TESTING</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="checkbox">
				  <label><input type="checkbox" value="">X-RAY:</label>
				  <input type="text" name="">
				</div>
				<div class="checkbox">
				  <label><input type="checkbox" value="">Medical Examination</label>
				</div>
				<div class="checkbox">
				  <label><input type="checkbox" value="">Vital Sign</label>
				</div>
			</div>
	</div>

	<div class="col-sm-12">

		<div class="form-group">
		<div class="Col-sm-10 col-sm-offset-1">
			<div class="col-sm-6 ">
				 <label for=""> OTHER TEST:</label>
				 <input type="text"  name="" class="form-control" required />
				  <label for=""> Referred By:</label>
				 <input type="text"  name="" class="form-control" required />
			 </div>
			 <div class="col-sm-6">
				  <label for=""> Special Endorsment:</label>
				 <input type="text"  name="" class="form-control" required />
				  <label for=""> Charge To:</label>
				 <input type="text"  name="" class="form-control" required />
				  <label for=""> Result Send Thru:</label>
				 <input type="text"  name="" class="form-control" required />
			 </div>
		 </div>
		</div>
	</div>
</div>
<input type="submit" class="btn btn-success" value="REGISTER">  
</div>
</form>
</div>


</body>
</html>