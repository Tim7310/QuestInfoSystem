<?php
include_once('../connection.php');
include_once('../classes/pack.php');
if (!isset($_SESSION)) {
   session_start();
}
  require_once '../class.user.php';
  $user = new USER;
  $user->bypass('Admin');

$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$pack = new pack;
$pack = $pack->fetchAll();

	$itemcheck = array("U/A","Chest PA", "F/A", "P.E", "CBC", "Drug Test", "Pregnancy Test", "HBsAg", "Lipid Profile", "FBS");
	$packtest = array("XRay", "Blood", "Specimen", "PE");
	$conn=mysqli_connect("localhost","root","","dbqis");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	else
	{

		if (isset($_POST['btnCreatePackage'])) {
			if (!empty($_POST['XRay'])) {
				$xray = 1;
			}else{
				$xray = 0;
			}
			if (!empty($_POST['Blood'])) {
				$blood = 1;
			}else{
				$blood = 0;
			}
			if (!empty($_POST['Specimen'])) {
				$spec = 1;
			}else{
				$spec = 0;
			}
			if (!empty($_POST['PE'])) {
				$pe = 1;
			}else{
				$pe = 0;
			}

			$nameitem = $_POST['txtItemName'];
			$priceitem = $_POST['txtItemPrice'];
			$descriptionitem = $_POST['txtItemDescription'];
			$typecash = $_POST['CashType'];



			$sql_query = "INSERT INTO qpd_items (ItemName, ItemPrice, ItemDescription, ItemType, HaveXray, HaveSpec, HaveBlood, HavePE)
			VALUES ('$nameitem', '$priceitem', '$descriptionitem', '$typecash', '$xray', '$blood', '$spec', '$pe')";

			if ($conn->query($sql_query) === TRUE)
			{
			    echo "<script> alert('Record Added Successfully') </script>";
			    header('Location: ItemCash.php'); 

			} 
			else 
			{
			    echo "Error: " . $conn->error;
			}

		}
	}
	

 ?>
<html>
	<head>
	    <title>Cashier Index</title>
	    <link rel="icon" type="image/png" href="../assets/qpd.png">
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
		<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.min.css" >
		<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">		
		<link rel="stylesheet" type="text/css" href="../source/awesome-checkbox/awesome-bootstrap-checkbox.css	">		
	</head>
<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		width:300px;
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
	}
	.card-block input
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.card-block select
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.col p
	{
		text-transform: uppercase;
	}
	.modal-header, .modal-footer
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 18px;
		color: black;
		font-weight: bolder;
	}
	.btnCreate
	{
		background-color: #008CBA; /* Blue */
		border-radius: 12px;
	    font-family: "Century Gothic";
	    font-size: 18px;
	    height: 50px;
	    width: 100px;
	}
	button{
		cursor: pointer;
	}
	.cp input, .cp select{
		font-size: 15px;
		font-weight: bold;
	}
	.checkbox label{
		font-weight: bold;
		padding: 3px;
		cursor: pointer;
		margin: 2px;
	}
</style>
<body>
<?php include_once('cashsidebar.php');?>
<div class="container-fluid">
<div class="col-md-10 offset-md-1">
	<div class="card card-info" style="border-radius: 0px; margin-top: 10px;">
 		<div class="card-header"><center><b>CREATE PACKAGES</b></center></div>
		<div class="card-block">
			<div class="container cp">
				<div class="row">
					<div class="col-12">
					<?php 
					$cnum = 0;
					foreach ($itemcheck as $check) {
					 ?>						
					  <span class="checkbox">
					    <input type="checkbox" class="checkboxes" id="<?php echo 'cid'.$cnum ?>" value="<?php echo $check ?>">
					    <label for="<?php echo 'cid'.$cnum ?>">
					        <?php echo $check." " ?>
					    </label>
					  </span>
					<?php $cnum++; } ?>
					</div>
				</div>		
				<form method="POST" class="form-inline">
					<div class="form-group mr-2">
						<input type="" name="txtItemName" placeholder="Item Name" required="" class="form-control">
					</div>
					<div class="form-group mr-2">
						<input type="" name="txtItemDescription" placeholder="Item Description" required="" class="form-control" style="width: 400px" id="itemdesc">
					</div>
					<div class="form-group mr-2">
						<input type="" name="txtItemPrice" placeholder="Price" required="" class="form-control" style="width: 70px">
					</div>
					<div class="form-group mr-2">
						<select name="CashType" class="form-control">
							<option value="CashIndustrial">CASH INDUSTRIAL</option>
							<option value="CashLab" selected>CASH LAB</option>
							<option value="CashImaging">CASH IMAGING</option>
							<option value="AccountIndustrial">ACCOUNT INDUSTRIAL</option>
							<option value="AccountHMO">ACCOUNT HMO</option>
						</select>
					</div>
					<div class="form-group mr-2">
						<input type="submit" class="form-control btn-primary" name="btnCreatePackage" value="CREATE">
					</div>
					<span style="font-weight: bolder">Test: &nbsp;&nbsp; </span> 					
					<?php 
							foreach ($packtest as $check1) {
							 ?>						
							 
							    <input type="checkbox" name="<?php echo $check1 ?>" value="<?php echo $check1 ?>" id="<?php echo $check1 ?>" style="" class="checkbox2">
							    <label for="<?php echo $check1 ?>" class="badge badge-info ml-2 mr-2" style="cursor: pointer;">
							        <?php echo $check1." " ?>
							    </label>
							 
						<?php } ?> 
					</div>
						
					
				</form>	
					
			</div> 
		</div>
	</div>
</div>
<div class="col-md-10 offset-sm-1">
	<div class="card card-info" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><b>Packages with Complete Descriptions</b></div>
		<div class="card-block">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
                    	<th>Item ID</th>
                    	<th>Date Created</th>
						<th>Item Name</th>
						<th>Item Price</th>
						<!-- <th>Item Description</th> -->
						<th width="50px">Delete Items</th>
						<th>Action</th>

					</thead>
						<?php foreach  ($pack as $pack) {  ?>
					<tr>
							<td>
								<?php echo $pack['ItemID']?>
							</td>
							<td>
								<?php echo $pack['CreationDate']?>
							</td>
							<td>
								<?php echo $pack['ItemName']?>
							</td>	
							<td>
								<?php echo $pack['ItemPrice']?>
							</td>	
							<!-- <td>
								<?php echo $pack['ItemDescription']?>
							</td> -->
							<td>
								<input type="hidden" name="" class="itemid" value="<?php echo $pack['ItemID']?>">
								<input type="hidden" name="" class="testtype" value="<?php echo $pack['DeletedItem']?>">
								
								<?php
									if ($pack['DeletedItem'] == 0) {
										echo '<button class="btn btn-primary specifydisc"><i class="fas fa-times-circle"></i></button>';
									}else{
										echo '<button class="btn btn-danger specifydisc"><i class="fas fa-check-circle"></i></button>';
									}
								?>
								
							</td>
							<td > 
								
								
								<!-- <button type="button" class="btn btn-danger" onclick="javascript:confirmationDelete($(this));return false;" href = 'DeletePack.php?id=<?php echo $pack['ItemID']?>'; disabled>DELETE</button> -->
								<button type="button" class="btn btn-info editItem" >EDIT</button>
								<input type="hidden" name="" class="itemid" value="<?php echo $pack['ItemID']?>">
							</td>
							<?php } ?> 
					</tr> 
    	</table>
		</div>
	</div>
</div>
<!-- Trigger/Open The Modal -->
<div id="modalLoader"></div>


</div>
<script>

function confirmationDelete(anchor)
{
	var conf = confirm('Are you sure want to delete this package?');
	if(conf)
	window.location=anchor.attr("href");
}
	$(document).ready(function() {
	$(".editItem").click(function(){
		var id = $(this).siblings(".itemid").val();
		$("#modalLoader").load("editItem.php",{id:id},function(e){
			$("#modal").modal("show");
		});
	});
	$(".checkbox input").click(function(){
		var descitem = [];
		$(".checkboxes").each(function(){			
			if($(this).prop("checked")){
				descitem.push($(this).val());				
			}
		});

		$("#itemdesc").val(descitem.join(", "));
	});
	$(".checkbox2").change(function(){
		// $(this).siblings(".btn").button('toggle');
		// $(this).toggleClass("btn");
		// if($(this).prop("checked")){
		// 	$(this).siblings("label").button('toggle');
		// }else{
		// 	$(this).siblings("label").css({"color":"#0275D8","background-color":"none"});
		// }
	});
    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       500,
        scrollCollapse: true,
        "scrollX": true,
        paging:         false,
        buttons: ['excel', 'pdf', 'colvis' ],
        // columnDefs: [
        //     {
        //         targets: 4,
        //         visible: false
        //     }
        // ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );

        $('.specifydisc').click(function(){
        	var thisbtn = $(this);
        	var id = $(this).siblings(".itemid").val();
        	var type = $(this).siblings(".testtype").val();
        	if (type == 0) {
        		type = 1;
        		$(this).siblings(".testtype").val(1);
        	}else{
        		type = 0;
        		$(this).siblings(".testtype").val(0);
        	}
        	$.post("UpdateItemDel.php",{id: id, type: type},function(e){
        		if (e == 0) {
        			thisbtn.html('<i class="fas fa-times-circle"></i>');
        			thisbtn.removeClass("btn-danger").addClass("btn-primary");
        		}else{
        			thisbtn.html('<i class="fas fa-check-circle"></i>');
        			thisbtn.removeClass("btn-primary").addClass("btn-danger");
        		}
        	});
        });
} );	
</script>


</body>
</html>