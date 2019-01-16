<?php
include_once("../connection.php");
include_once("../classes/patient.php");

$patient = new Patient;
$patID = $_POST['patID'];
$patID = preg_replace('/\s+/', '', $patID);
$patData = $patient->fetch_data($patID);
if ($patID != 0) {

?>
<div >
	<i class="fas fa-user-check"></i> &nbsp;
	<?php 
		echo $patData['LastName']." , ".$patData['FirstName']." ".$patData['MiddleName']." | ".$patData['CompanyName']." | ".$patData['ContactNo'];
	?>
	<button class="btn btn-primary" style="padding: 5px;" id="editPatient" data-toggle="modal" data-target="#editPatientModal">
		<i class="fas fa-user-edit"> 
		<i style="font-family: century gothic">Edit Patient</i> </i> </button>
</div>
<input type="text" name="" id="SelectedPID" value="<?php echo $_POST['patID'];?>" style="display: none">
<?php } ?>
<!-- Edit Patient Modal -->
<div class="modal" tabindex="-1" role="dialog" id="editPatientModal" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-user-edit"></i> Edit Patient Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container">
      	<form class="form-inline">
		  <div class="row" id="EditPatientDiv">
		  	<div class="col" >
		  		<input type="hidden"  name="editPatID" id="editPatID"
		  		class="form-control" value="<?php echo $patID ?>" required />
		  		<label for="">First Name:</label>
				<input type="text"  name="EditFName" id="EditFName" class="form-control" style="font-size: 15px;font-weight: bold;"
				value="<?php echo $patData['FirstName']; ?>"  required />
				<label for="">Middle Name:</label>
				<input type="text"  name="EditMName" id="EditMName" class="form-control " style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['MiddleName']; ?>" required />
		  		<label for="">Last Name:</label>
				<input type="text"  name="EditLName" id="EditLName" class="form-control " style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['LastName']; ?>" required />				
				<label for="">Age:</label>
				<input type="text"  name="EditAge" id="EditAge" class="form-control " style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Age']; ?>" required />
				<label for="">Gender:</label>
				<input type="text"  name="EditGender" id="EditGender" class="form-control " 
				style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Gender']; ?>" required />
		  	</div>
		  	<div class="col">
		  		<label for="">Company Name:</label>
				<input type="text"  name="EditComName" id="EditComName" class="form-control " 
				style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['CompanyName']; ?>" required />
				<label for="">Contact No:</label>
				<input type="text"  name="EditContact" class="form-control " id="EditContact" 
				style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['ContactNo']; ?>" required />
				<label for="">BirthDate:</label>
				<input type="text"  name="EditBOD" class="form-control" id="EditBOD" style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Birthdate']; ?>" required />
				<label for="">Address:</label>
				<input type="text"  name="EditAdd" id="EditAdd" class="form-control " style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Address']; ?>" required />
				<label for="">Position</label>
				<input type="text"  name="EditPos" id="EditPos" class="form-control " style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Position']; ?>" required />
		  	</div>
		  	<div class="col">
		  		<button type="button" class="btn btn-primary" id="saveEdited" style="margin-top: 80px">Save Changes</button>
		  		<button type="button" class="btn btn-danger" id="restoreDef" style="margin-top: 10px">Cancel</button>
		  	</div>
		  </div>
		</form>
      </div>     
    </div>
  </div>
</div>

<!-- end -->
<script type="text/javascript">
	$(document).ready(function(){
		var EditFName = $("#EditFName").val();
		var EditMName = $("#EditMName").val();
		var EditLName = $("#EditLName").val();
		var EditAge = $("#EditAge").val();
		var EditGender = $("#EditGender").val();
		var EditComName = $("#EditComName").val();
		var EditContact = $("#EditContact").val();
		var EditBOD = $("#EditBOD").val();
		var EditAdd = $("#EditAdd").val();
		var EditPos = $("#EditPos").val();
		var patID = $("#editPatID").val();
		$("#restoreDef").click(function(){
			$("#EditFName").val(EditFName);
			$("#EditMName").val(EditMName);
			$("#EditLName").val(EditLName);
			$("#EditAge").val(EditAge);
			$("#EditGender").val(EditGender);
			$("#EditComName").val(EditComName);
			$("#EditContact").val(EditContact);
			$("#EditBOD").val(EditBOD);
			$("#EditAdd").val(EditAdd);
			$("#EditPos").val(EditPos);
			$('#editPatientModal').modal('toggle');
		});
		$("#saveEdited").click(function(){
			EditFName = $("#EditFName").val();
			EditMName = $("#EditMName").val();
			EditLName = $("#EditLName").val();
			EditAge = $("#EditAge").val();
			EditGender = $("#EditGender").val();
			EditComName = $("#EditComName").val();
			EditContact = $("#EditContact").val();
			EditBOD = $("#EditBOD").val();
			EditAdd = $("#EditAdd").val();
			EditPos = $("#EditPos").val();
			patID = $("#editPatID").val();
			$('#editPatientModal').modal('toggle');
			$.post("updatePatient.php",{fname:EditFName, mname:EditMName, lname: EditLName, age: EditAge, gen: EditGender, comname:EditComName, contact: EditContact, bod: EditBOD, address: EditAdd, pos: EditPos, pid:patID},function(e){
				var patIDID = '#' + patID;
				$(patIDID).trigger('click',function(){	});
				$("#searchloader").load("searchPatient.php",{txt:""},function(){});
			});
		});

	});
</script>