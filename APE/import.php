<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Import Data</title>
</head>

<style type="text/css">
	label, button{
		cursor: pointer;
		margin: 5px;
	}
	
</style>
<body>
		<!-- div class="row">
			<div class="col-2 "  style="text-align: right;margin-top: 10px">
				CSV of Transaction:
			</div>
			<div class="col-3">
				<label for="fileToUpload" class="btn btn-secondary">Select Transaction CSV</label>
		    	<input type="file" name="trans" id="fileToUpload" style="display: none" required>
			</div>			
		</div> -->
<div class="card col-6">
<div class="card-header card-header-primary">
  <h4 class="card-title">APE Registration</h4>  
</div>
<div class="card-body">
  <form id="form" method="post"> 
  	<div class="row mb-2">
  		<div class="col-6">
			<label for="fileToUpload2" class="btn btn-info">Select Patient CSV</label>
			<input type="file" name="patient" id="fileToUpload2" class="form-control" style="display: none" >
		</div> 
		<div class="col-md-6">
	        <div class="form-group">
	          <label class="bmd-label-floating">Item Name</label>
	          <input type="text" name="item" id="item" class="form-control" required>
	        </div>
      	</div>
  	</div>
	
	<div class="row">
      <div class="col-md-9">
        <div class="form-group">
          <label class="bmd-label-floating">Company Name</label>
          <input type="text" name="comName" id="comName" class="form-control" required>
        </div>
      </div>
       <div class="col-md-3">
        <div class="form-group">
          <label class="bmd-label-floating">Item Price</label>
          <input type="text" name="price" id="price" class="form-control" required>
        </div>
      </div>
    </div>                                                   
    <button type="submit" class="btn btn-primary float-right" id="submit">Import CSV</button>  
               
  </form>
</div>
 <div class="loader" id="formloader" style="display: none"></div>  
</div>	    
<div id="loadcontent"></div>
</body>
</html>
<script type="text/javascript" src="../source/jquery-confirm.min.js"></script>
<script type="text/javascript" src="../source/jquery.form.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// $('#fileToUpload').change(function() {
		//   var i = $(this).prev('label').clone();
		//   var file = $('#fileToUpload')[0].files[0].name;
		//   $(this).prev('label').text(file);
		// });
		var csvSelected = 0;
		$('#fileToUpload2').change(function() {
		  var i = $(this).prev('label').clone();
		  var file = $('#fileToUpload2')[0].files[0].name;
		  $(this).prev('label').text(file);
		  $(this).prev('label').removeClass("btn-info").addClass("btn-primary");
		  csvSelected = 1;
		});

		$("#form").submit(function(e){
		e.preventDefault(); 	
		if (csvSelected != 0) {		
			$("#form").ajaxSubmit({
				target:     '#loadcontent', 
				url:        'Reg/importData.php', 
				success:    function(data) { 	
					$.alert({		            			
			        	theme: "modern", title: "Success", content: "Data successfully Added to Database", icon: "fas fa-check",
					});
					$("#reg").trigger("click");
				} 
			});
			$('#submit').attr("disabled","disabled");
			$("#formloader").show();
		}else{
			$.alert({		            			
		        theme: "modern", title: "Warning", content: "Please select CSV file", icon: "fas fa-exclamation",				
			});
		}
		});  		
	});
</script>