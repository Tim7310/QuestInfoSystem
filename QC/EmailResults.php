<?php
include_once('../connection.php');
include_once('../classes/emailResult.php');
$sendEmail = new sendEmail;
$patients = $sendEmail->fetch_all();

?>

<style type="text/css">
	/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 350px; /* Could be more or less, depending on screen size */
}

/*.modal-body {padding: 2px 16px;}*/

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
<html>
	<head>
		<title>Email Results</title>
		<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="../source/CDN/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/jszip.min.js"></script>
		<script type="text/javascript" src="../source/CDN/pdfmake.min.js"></script>
		<script type="text/javascript" src="../source/CDN/vfs_fonts.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.html5.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.print.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.colVis.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<!--<link rel="stylesheet" href="multiple-emails.css">
		<script src="multiple-emails.js"></script>-->
		

	</head>
	<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		width:320px;
	}
	.card-header
	{
		font-family: "Calibri";
		font-size: 24px;
	}
	.card-block, .checkbox
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 18px;
		font-weight: bolder;
	}
	.card-block input, 
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
</style>
<body>
<?php
include_once('qcsidebar.php');
?>
<div class="container-fluid" style="margin-top: 10px;">
	<div class="row">
	  <div class="col-8">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        			<thead>
							<th wrap>Checklist</th>
							<th>Company Name</th>
							<th nowrap>Patient Name</th>
							<th>Medical Classification</th>
							<th>Remarks</th>
	                    	<th nowrap>Transaction No.</th>
	                    	<th>Patient ID</th>
	                    	<th nowrap>Transaction Date</th>
						</thead>
						<?php foreach  ($patients as $patient) {  ?>
						<tr>	
								<td>
								<div class="form-check" style="padding-left: 0px;">
									<center>
									<!-- <input class="check" type="checkbox" value="1" id="defaultCheck1" style=" height: 30px; width: 30px;" onclick="window.open('../ResultPDF.php?id=<?php echo $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>');"> -->
									<button class="form-control" style="width: 30px;" onclick="window.open('../ResultPDF.php?id=<?php echo $patient['PatientID']?>&tid=<?php echo $patient['TransactionID']?>');">PDF</button>
									</center>
								</div>
								</td>
								<td>
									<?php echo $patient['CompanyName']?>
								</td>	
								<td nowrap>
									<?php echo $patient['LastName']?>,<?php echo $patient['FirstName']?> <?php echo $patient['MiddleName']?> 
								</td>
								<td>
									<?php echo $patient['MedicalClass']?>
								</td>
								<td>
									<?php echo $patient['Notes']?>
								</td>
								<td>
									<?php echo $patient['TransactionID']?>
								</td>
								<td>
									<?php echo $patient['PatientID']?>
								</td>
								<td>
									<?php echo $patient['TransactionDate']?>
								</td>

						</tr>
						<?php  } 	?> 

	    </table>
	  </div>
	  <div class="col-4">
    	<div class="card" style="border-radius: 0px;padding: 10px">
            <div class="card-header card-inverse card-info"><center><b>SEND RESULTS</b></center></div>
            <div class="card-block">
            	<!-- <div class="row">

					<div class="col">
						<div class="form-check" style="padding-left: 10px;">
						  <input class="form-check-input" type="checkbox" value="2"  id="checkAll" style=" height: 30px; width: 30px;" >
						  <label class="form-check-label" for="checkAll">
						    Select All / Deselect
						  </label>
						</div>
					</div>
				</div> -->
				<hr>
				</div>
				<div style="background: #ECF0F1;">
				<form id="form" method="post" enctype="multipart/form-data" >
				<div class="row">
					<div class="col">
						<h6>Attach Result:</h6>
						
						<input type="file" name="file[]" id="file" multiple required="" />
						<br>
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h6>ZIP Password: </h6>
						<input type="text" class="form-control col-md-12" name="pass" id="pass" placeholder=" Enter ZIP Password " style="padding-left: 0px" Required/>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h6>Recipient:</h6>
						<input type="email" class="form-control col-md-12" name="recipient" id="recipient" placeholder=" Enter Email Address..." style="padding-left: 0px" Required/>
						<div class="items"></div>
						<button class="btn btn-secondary mt-2" id="addRec">ADD</button>
						<br>
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<h6>Subject:</h6>
						<input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject..." style="padding-left: 0px" Required/>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<input type="submit" name="SEND" class="btn-primary fa fa-input" id="save" value="&#xf14d&nbsp; SEND" style="width: 100px; height: 30px;">
						<img id="loader" src="https://res.cloudinary.com/sivadass/image/upload/v1498134389/icons/loader.gif" alt="loading...">
						<span id="statusLoad"></span>
						<div id="loading"></div>
					</div>
				</div>
				</form> 
        </div>
    </div>
        <div id="loadcontent" style="background-color: gray; padding: 10px;color: white; "></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
</div>

<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->

<!-- The Modal -->
<div id="confirmModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="border: 1px solid;">
  	<header style="background-color: #2980B9;"></header>
    <center>
    	<h5><i class="fas fa-check-circle"></i>&nbsp;The message has been sent!</h5>
    	<br>
    	<button id="btnCLose" class="btn btn-primary" style="width: 60px;">OK</button>
	</center>
  </div>

</div>




<script type="text/javascript">
	$(document).ready(function(){
		$("#loader").hide();
		$("#save").click(function(){
			$.fn.exists = function() { return this.length > 0; };

			//$("#filebtn").trigger("click");
 			$("#form").on('submit',(function(e) {
				  e.preventDefault();
				  $("#loader").show();
				  $("#statusLoad").html("Zipping...");

				  var options2 = {
				  		target:     '#loadcontent', 
					    url:        'mailer.php', 
					    success:    function(result) { 	
					      	// $("#loading").html(result);
					      	$("#loader").hide();
					      	$("#statusLoad").html('');
					      	$("#confirmModal").show();
					      	$("#btnCLose").click(function(){
					      		location.reload();
					      	});
					      	

					    } 
				  };
				  var options = { 
					    target:     '#loadcontent', 
					    url:        'zipFile.php', 
					    success:    function(result) { 	
					    	$("#statusLoad").html(result);
					      	$("#form").ajaxSubmit(options2);
					      	$("#statusLoad").html("Sending Email...");
					    } 
					};   
				   $("#form").ajaxSubmit(options);
				 }));
		});	
		//add recipient
			var max_fields = 20; 
			var wrapper = ".items"; 
			var add_button = "#addRec"; 
			 
			var x = 1; 
			$(add_button).click(function(e){ 
			e.preventDefault();
			if(x < max_fields){ 
			x++; 
			$(wrapper).append('<div id="rec"><h6> Recepient: </h6>' +
			'<input class="form-control col-md-12" id="author_email" type="email" placeholder="Enter Email Address..."' +
			'name="recipient' + x +'"/>' +
			'<a href="#" class="remove_field">remove</a></div>'); 
			}
			});
			 
			$(wrapper).on("click",".remove_field", function(e){ 
				e.preventDefault(); 
				$(this).parent('div').remove(); x--;
			}); 
	});
</script>



<script>
	
	$("#checkAll").click(function () {
	    $(".check").prop('checked', $(this).prop('checked'));
	});

	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       500,
        scrollCollapse: true,
        "scrollX": true,
        paging:         false,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );	


</script>


</body>
</html> 