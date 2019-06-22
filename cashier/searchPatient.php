<?php
include_once("../connection.php");
	/**
	 * 
	 */
	class Search
	{
		public function patient($txt){
			global $pdo;

			$sql = $pdo->prepare("SELECT * from qpd_patient WHERE FirstName 
			LIKE '%$txt%' OR MiddleName LIKE '%$txt%' OR LastName LIKE '%$txt%' 
			ORDER BY LastName ASC");
			$sql->execute();
			return $sql->fetchAll();
		}
	}

	$search = new Search;
	$txt = $_POST['txt'];
	$Patient = $search->patient($txt);
	
?>
<div >
	<?php 
	if (is_array($Patient) OR $Patient != "") {	
		$x = 0;
		foreach ($Patient as $key) {
		$y = $x % 2;
		if ($y == 1) {
			$bcolor = "#2980b9";
			$color = "white";
		}else{
			$bcolor = "white";
			$color = "black";
		}
	?>
	<div class="col selectdiv" id="<?php echo $key['PatientID'] ?>" 
		style="cursor: pointer; padding: 1px;background-color: <?php echo $bcolor; ?>;color: <?php echo $color; ?>">
		<?php echo $key['LastName'].", ".$key['FirstName']." ".$key["MiddleName"];?>
		<input type="text" name="" style="display: none" class="patientID" value="<?php echo $key['PatientID'] ?>">
	</div>
	<?php $x++; }}else{
		echo "No Result";} ?>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".selectdiv").click(function(){
			var PatientID = $(this).children(".patientID").val();
			$("#selectedPatient").load("getPatient.php",{patID: PatientID},function(){

			});
		});
		
	});
</script>