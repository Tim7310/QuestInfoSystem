<?php
include_once("connection.php");
include_once("classes/patient.php");
function randomDigits(){
	do{
		$patient = new patient;
		$numbers = range(0,9);
	    $digits = '';
	    $length = 8;
	    shuffle($numbers);
		    for($i = 0; $i < $length; $i++)
		    {
		    	global $digits;
		       	$digits .= $numbers[$i];
		    }
		$patdata = $patient->refCount($digits);

	}while($patdata != 0);
  
    return $digits;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>New Patient</title>
</head>
<link rel="stylesheet" type="text/css" href="source/bootstrap4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="source/jquery-ui/jquery-ui.css">
<script type="text/javascript" src="source/popper.min.js"></script>
<script type="text/javascript" src="source/jquery.min.js"></script>
<script type="text/javascript" src="source/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="source/printThis/printThis.js"></script>

<link href="source/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="source/select2/theme/dist/select2-bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" src="source/select2/dist/js/select2.min.js"></script>
<style type="text/css">
	button{
	 cursor: pointer
	}
</style>
<body>
	<div id="APloader"></div>
<form method="post" id="addForm">
	<div class="col-12 bg-primary p-2" style="text-align: center;color: white; font-weight: bolder;font-size: 20px">PATIENT REGISTRATION</div>
      	 <div style=" padding: 30px;">
      	 	<div class="row" id="newPatientDiv">
      	 	<div class="col">
       			<input type="hidden"  name="idpatient" class="form-control newPatStyle" value="" id="myInput" required />
				<label for="" class="newPatLabel">Company Name:</label>
				<input type="text"  name="company" class="form-control newPatStyle" value="" id="myInput" required />
				<label for="" class="newPatLabel">Applied Position:</label>
				<input type="text" name="position" class="form-control newPatStyle" value="" id="myInput" />
				<label for="" class="newPatLabel">First Name:</label>
				<input type="text"  name="firstname" class="form-control newPatStyle" value="" id="myInput" required />
				<label for="" class="newPatLabel"> Middle Name:</label>
				<input type="text"  name="middlename" class="form-control newPatStyle" value="" id="myInput" />
				<label for="" class="newPatLabel"> Last Name:</label>
				<input type="text"  name="lastname"  class="form-control newPatStyle" value="" id="myInput" required />
			</div>
			<div class="col">
				<label for="" class="newPatLabel">Address:</label>
				<input type="text"  name="address" class="form-control newPatStyle" value="" id="myInput" />
				<label for=""  class="newPatLabel"> Birth Date:</label>
				<input type="date"  name="birthday" class="form-control newPatStyle" placeholder="MM-DD-YYYY" value="" id="bday" required />
				<label for="" class="newPatLabel">Age:</label>
				<input type="text"  name="age" id="age" class="form-control newPatStyle" value="" required />
				<label for="" class="newPatLabel">Gender:</label>
				<input type="text"  name="gender" class="form-control newPatStyle" value="" id="myInput" required  />
				<label for="" class="newPatLabel">Contact No.:</label>
				<input type="text"  name="contact" class="form-control newPatStyle" value="" id="myInput" />	
			</div>
			<div class="col">
				<label for="" class="newPatLabel">Email Address:</label>
				<input type="text"  name="email" class="form-control newPatStyle" value="" id="myInput" />
				<label for="" class="newPatLabel">Bill to:</label>
				<input type="text"  name="billto" id="billto" class="form-control newPatStyle" id="myInput" value="" />
				<label for="" class="newPatLabel">Senior/PWD ID:</label>
				<input type="text"  name="sid" id="SID" class="form-control newPatStyle" id="myInput" value="" />
				<br>
				<center><button type="submit"  name="ADDNewRecord" class="btn btn-primary" style="font-size: 14px; width: 120px; height: 40px;" id="NPbtn">
				<i class="far fa-check-circle"></i>&nbsp; SUBMIT</button></center>
				<!-- <button class="btn btn-danger" id="clearData" >
					<i class="fas fa-eraser"></i>&nbsp; CLEAR</button> -->
				<!-- <button onclick="myFunction()">TRY</button> -->

				
		
			</div>	
		</div>
		</div>
</form>
</body>
<script type="text/javascript" src="source/jquery.form.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		function getAge(dateString) {
		    var today = new Date();
		    var birthDate = new Date(dateString);
		    var age = today.getFullYear() - birthDate.getFullYear();
		    var m = today.getMonth() - birthDate.getMonth();
		    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
		        age--;
		    }
		    return age;
		}
		// $("#bday").keyup(function(){
		// 	var birthday = $('#bday').val();
		// 	var ageCalc = getAge(birthday);
		// 	$('#ageCalc').val(ageCalc);
		// });
		$("#bday").datepicker({
		    onSelect: function(dateText) {
		      var ageCalc = getAge(dateText);
		      $('#age').val(ageCalc);
		    }
		  }).on("change", function() {
		  	var birthday = $('#bday').val();
		     var ageCalc = getAge(birthday);
		      $('#age').val(ageCalc);
		  });

		  $("#NPbtn").click(function(e){
			e.preventDefault();
				var option = { 
					target: "#APloader",
					dataType: "json",
					url:        'cashier/newPatient.php', 
					success:    function(responseText) { 
						alert("Patient Successfully Added");
						location.reload();
					} 
				};  
				$("#addForm").ajaxSubmit(option);
			// }else{
			// 	alert("Please Complete all credentials");
			// }
		});
	});
</script>
</html>