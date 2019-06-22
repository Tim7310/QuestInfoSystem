<?php
include_once("../connection.php");
include_once("../classes/patient.php");
include_once('../classes/trans.php');
$trans = new trans;
$patient = new Patient;
$patID = $_POST['patID'];
$patID = preg_replace('/\s+/', '', $patID);
$patData = $patient->fetch_data($patID);
if ($patID != 0) {
$companies = $trans->fetchCompanies();
$patCompany = $patData['CompanyName'];
$patBiller = $patData['PatientBiller'];
?>

<div style="background-color: white;padding: 5px; font-weight: bolder">
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
  <!-- <div class="modal-dialog modal-lg" role="document"> -->
    <div class="modal-content modal-dialog modal-lg" role="document">
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
		  		<label for="" class="newPatLabel">First Name:</label>
				<input type="text"  name="EditFName" id="EditFName" class="form-control newPatStyle" style="font-size: 15px;font-weight: bold;"
				value="<?php echo $patData['FirstName']; ?>"  required />
				<label for="" class="newPatLabel">Middle Name:</label>
				<input type="text"  name="EditMName" id="EditMName" class="form-control newPatStyle" style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['MiddleName']; ?>" required />
		  		<label for="" class="newPatLabel">Last Name:</label>
				<input type="text"  name="EditLName" id="EditLName" class="form-control newPatStyle" style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['LastName']; ?>" required />				
				<label for="" class="newPatLabel">Age:</label>
				<input type="text"  name="EditAge" id="EditAge" class="form-control newPatStyle" style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Age']; ?>" required />
				<label for="" class="newPatLabel">Gender:</label>
				<input type="text"  name="EditGender" id="EditGender" class="form-control newPatStyle" 
				style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Gender']; ?>" required />
		  	</div>
		  	<div class="col">
		  		<label for="" class="newPatLabel">Company Name / Doctor:</label>
				<!-- <input type="text"  name="EditComName" id="EditComName" class="form-control newPatStyle" 
				style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['CompanyName']; ?>" required /> -->
				 <select class="custom-select company form-control"  name="EditComName" id="EditComName" aria-label="Select Company Here" 
				  placeholder="Select Company Here" style="width: 230px">
				   		<?php foreach ($companies as $company){ 
				   			
				   			if ($company['NameCompany'] == $patCompany) {
				   				$select = "selected";
				   			}else{
				   				$select = "";
				   			}
				   		?>
							<option value="<?php echo  $company['NameCompany'];?>" class="itemval" <?php echo $select; ?>>
								<?php echo $company['NameCompany'];?></option>
						<?php } ?>
				  </select>
				<label for="" class="newPatLabel">Contact No:</label>
				<input type="text"  name="EditContact" class="form-control newPatStyle" id="EditContact" 
				style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['ContactNo']; ?>" required />
				<label for="" class="newPatLabel">BirthDate:</label>
				<input type="text"  name="EditBOD" class="form-control newPatStyle" id="EditBOD" style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Birthdate']; ?>" required />
				<label for="" class="newPatLabel">Address:</label>
				<input type="text"  name="EditAdd" id="EditAdd" class="form-control newPatStyle" style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Address']; ?>" required />
				<label for="" class="newPatLabel">Position</label>
				<input type="text"  name="EditPos" id="EditPos" class="form-control newPatStyle" style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Position']; ?>" />
				
		  	</div>
		  	<div class="col">
		  		<label for="" class="newPatLabel">Email</label>
				<input type="text"  name="EditEmail" id="EditEmail" class="form-control newPatStyle" 
				style="font-size: 15px;font-weight: bold;" value="<?php echo $patData['Email']; ?>" required />
		  		<label for="" class="newPatLabel">Biller</label>
				<!-- <input type="text"  name="EditBiller" id="EditBiller" class="form-control newPatStyle" 
				style="font-size: 15px;font-weight: bold;" value="<?php echo $patData['PatientBiller']; ?>" required /> -->
				 <select class="custom-select company form-control"  name="EditBiller" id="EditBiller" aria-label="Select Company Here" 
				  placeholder="Select Company Here" style="width: 230px">
				   		<?php foreach ($companies as $company){ 
				   			
				   			if ($company['NameCompany'] == $patBiller) {
				   				$select = "selected";
				   			}else{
				   				$select = "";
				   			}
				   		?>
							<option value="<?php echo  $company['NameCompany'];?>" class="itemval" <?php echo $select; ?>>
								<?php echo $company['NameCompany'];?></option>
						<?php } ?>
				  </select>
				<label for="" class="newPatLabel">PWD/Senior ID</label>
				<input type="text"  name="PWD" id="PWD" class="form-control newPatStyle" style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['SID']; ?>"/>
				<label for="" class="newPatLabel">~ Notes ~</label>
				<input type="text"  name="notes" id="notes" class="form-control newPatStyle" style="font-size: 15px;font-weight: bold"
				value="<?php echo $patData['Notes']; ?>"/>
		  		<button type="button" class="btn btn-primary" id="saveEdited" style="margin-top: 10px">Save Changes</button>
		  		<button type="button" class="btn btn-danger" id="restoreDef" style="margin-top: 10px">Cancel</button>
		  	</div>
		  </div>
		</form>
      </div>     
    </div>
  <!-- </div> -->
</div>

<!-- end -->
<script type="text/javascript">
	$(document).ready(function(){
		$('.company').select2({	});
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
		var EditBiller = $("#EditBiller").val();
		var EditEmail = $("#EditEmail").val();
		var PWD = $("#PWD").val();
		var notes = $("#notes").val();
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
			$("#EditBiller").val(EditBiller);
			$("#EditEmail").val(EditEmail);
			$("#PWD").val(PWD);
			$("#notes").val(notes);
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
			EditBiller = $("#EditBiller").val();
			EditEmail = $("#EditEmail").val();
			PWD = $("#PWD").val();
			notes = $("#notes").val();
			$('#editPatientModal').modal('toggle');
			$.post("updatePatient.php",{fname:EditFName, mname:EditMName, lname: EditLName, age: EditAge, gen: EditGender, comname:EditComName, contact: EditContact, bod: EditBOD, address: EditAdd, pos: EditPos, pid:patID, biller: EditBiller, SID:PWD,Email:EditEmail,notes: notes},function(e){
				var patIDID = '#' + patID;
				$(patIDID).trigger('click',function(){	});
				$("#searchloader").load("searchPatient.php",{txt:""},function(){});
			});
		});

	});
</script>