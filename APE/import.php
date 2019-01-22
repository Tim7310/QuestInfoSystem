
<!DOCTYPE html>
<html>
<head>
	<title>Import Data</title>
</head>
<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.min.css">
<script type="text/javascript" src="../source/popper.min.js"></script>
<script type="text/javascript" src="../source/jquery.min.js"></script>
<script type="text/javascript" src="../source/printThis/printThis.js"></script>

<link href="../source/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="../source/select2/theme/dist/select2-bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" src="../source/select2/dist/js/select2.min.js"></script>
<style type="text/css">
	label, button{
		cursor: pointer;
		margin: 5px;
	}
</style>
<body>
	<form id="form" method="post">
		<div class="row">
			<div class="col-2 "  style="text-align: right;margin-top: 10px">
				CSV of Transaction:
			</div>
			<div class="col-3">
				<label for="fileToUpload" class="btn btn-secondary">Select Transaction CSV</label>
		    	<input type="file" name="trans" id="fileToUpload" style="display: none" required>
			</div>			
		</div>
		<div class="row">
			<div class="col-2" style="text-align: right;margin-top: 10px">
				 CSV of Patient:
			</div>
			<div class="col-3">
				<label for="fileToUpload2" class="btn btn-secondary">Select Patient CSV</label>
	    		<input type="file" name="patient" id="fileToUpload2" style="display: none" required>
			</div>
		</div>	    
		<div class="row">
			<div class="col-4">
				<center><button type="submit" class="btn btn-primary" id="submit">Import CSV</button></center>
			</div>
		</div>
	    
    </form>
    <div id="loadcontent"></div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#fileToUpload').change(function() {
		  var i = $(this).prev('label').clone();
		  var file = $('#fileToUpload')[0].files[0].name;
		  $(this).prev('label').text(file);
		});
		$('#fileToUpload2').change(function() {
		  var i = $(this).prev('label').clone();
		  var file = $('#fileToUpload2')[0].files[0].name;
		  $(this).prev('label').text(file);
		});
		$("#submit").click(function(){
			
			var options = { 
			target:     '#loadcontent', 
			url:        'importData.php', 
				success:    function(result) { 	
					alert("Data Imported");
					location.reload();
				} 
			}; 
			$("#form").on('submit',(function(e) {
				e.preventDefault();
				
				$("#form").ajaxSubmit(options);
				$('#submit').attr("disabled","disabled");
			}));
		});  		
	});
</script>