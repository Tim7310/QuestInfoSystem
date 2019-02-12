<?php
session_start();
include_once("../connection.php");
include_once("../classes/pack.php");
require_once '../class.user.php';
include_once('../summarycon.php');
include_once('../classes/trans.php');
include_once('../classes/patient.php');

$user_home = new USER();


$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$cashierName =  $row['userName'];
$pack = new Pack;
$packData = $pack->fetch_all();
$biller = "";//biller here

$trans = new trans;
$pat = new Patient;
$holdTrans = $trans->hold_trans();
//Generate 8 digit random number for REFERENCE
		function randomDigits()
			{
				do{
					$trans = new trans;
					$numbers = range(0,9);
				    $digits = '';
				    $length = 8;
				    shuffle($numbers);
					    for($i = 0; $i < $length; $i++)
					    {
					    	global $digits;
					       	$digits .= $numbers[$i];
					    }
					$transdata = $trans->refCount($digits);

				}while($transdata != 0);
			  
			    return $digits;
			}

$TransNo = randomDigits();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Cashier</title>
</head>
<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.min.css">
<script type="text/javascript" src="../source/popper.min.js"></script>
<script type="text/javascript" src="../source/jquery.min.js"></script>
<script type="text/javascript" src="../source/printThis/printThis.js"></script>

<link href="../source/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="../source/select2/theme/dist/select2-bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" src="../source/select2/dist/js/select2.min.js"></script>
<style type="text/css">
	.btn{
		cursor: pointer;
	}
	.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 150px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
	    position: relative;
	    background-color: #fefefe;
	    margin: auto;
	    padding: 0;
	    border: 1px solid #888;
	    width: 80%;
	    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
	    -webkit-animation-name: animatetop;
	    -webkit-animation-duration: 0.4s;
	    animation-name: animatetop;
	    animation-duration: 0.4s
	}

	/* Add Animation */
	@-webkit-keyframes animatetop {
	    from {top:-300px; opacity:0} 
	    to {top:0; opacity:1}
	}

	@keyframes animatetop {
	    from {top:-300px; opacity:0}
	    to {top:0; opacity:1}
	}

	/* The Close Button */
	.close {
	    color: white;
	    
	    font-size: 28px;
	    font-weight: bold;
	}

	.close:hover,
	.close:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
	}

	.modal-header {
	    padding: 2px 16px;
	    background-color: #025AA5;
	    color: white;
	    margin: 1px;
	}

	.modal-body {padding: 2px 16px;}

	.modal-footer {
	    padding: 2px 16px;
	    background-color: #025AA5;
	    color: white;
	    margin: 1px;
	}
	.col label
	{
		text-transform: uppercase;
		font-size: 10px;
		font-weight: bolder;
		margin: 0px;
		font-family: "century gothic";
	}
	.col input{
		font-size: 10px;
		margin: 0px;
		font-family: "century gothic";
	}
	.itemdivID{
		padding: 10px;
		background-color: #025aa5;
		color: white;
		text-align: left;
	}
	.removeItem:hover{
		text-decoration: none;
	}
	/* width */
	::-webkit-scrollbar {
	  width: 3px;
	}

	/* Track */
	::-webkit-scrollbar-track {
	  background: #f1f1f1; 
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	  background: #2980b9; 
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	  background: #555; 
	}
</style>
<body style="background-color: #ECF0F1;">
<?php
include_once('cashsidebar.php');
?>
<div class="container-fluid" >
	<hr style="background-color: : black;">
    	<center>
        <div class="card card-header" style="background-color: #025AA5">

            <div class=" card-inverse card-info" style="background-color: #025AA5;">

            <div class="row" >

            	<div class="col">

            		No.:<b style="padding-right: 70px;">&nbsp;<i class="fas fa-barcode"></i>&nbsp;<?php echo $TransNo; ?></b><br>
            	</div>
            	<div class="col">
            		<i class="fas fa-users"></i>&nbsp; Cashier:&nbsp;<b><?php echo $cashierName; ?></b>
            	</div>
            </div>
            </div>
        </div>  
	
	<div class="row" style="margin-top: 10px;">
		<div class="col-7">
			<div class="input-group" >
			  <select class="custom-select" id="itemList" name="itemList" aria-label="Select Item Here" style="" 
			  placeholder="Select Item Here">
			   		<?php foreach ($packData as $key){ ?>
						<option value="<?php echo $key['ItemID'];?>" class="itemval">
							<?php echo $key['TestType']." | ".$key['ItemName']." | ". $key['ItemPrice'] ;?></option>
					<?php } ?>
			  </select>
			  <div class="input-group-append">
			    <button class="btn btn-outline-primary" type="button" id="addItem" style="display: none"><i class="fas fa-plus-circle"></i>&nbsp;  ADD</button>
			  </div>
			</div>
			
		</div>
		
		<div class="col-1"></div>
		<div class="col-4">
			<div class="input-group mb-3">
			  <input type="text" class="form-control" id="searchPatient" name="search" placeholder="Find Patient Here..." aria-label="Recipient's username" 
			  aria-describedby="button-addon2">
			  	<div class="input-group-append">
			    <button class="btn btn-outline-primary" type="button" id="button-addon2" data-toggle="modal" data-target="#ModalAdd">
			    	<i class="fas fa-user-circle"></i>&nbsp; Add New Patient</button>
		 		 </div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-2">
			
		</div>

		<div class="col-6"></div>
		<div class="col">
			<div id="searchloader" class="form-control" style="overflow-y: scroll;max-height:100px; background-color: #2980b9;"></div>
		</div>
	</div>

	<div class="row">
		<div class="col-12" id="selectedPatient" style="text-align: left; height: 40px;"></div>
	</div>
	<div class="row col-12" id="addItemdiv" style="background-color: #08863E;color: white; padding: 10px;text-align: left ">
		<div class="col-1" style="font-weight: bold;">Item ID </div>
		<div class="col-2" style="font-weight: bold;">Item Name</div>
		<div class="col-2" style="font-weight: bold;">Attribute</div>
		<div class="col-5" style="font-weight: bold;">Quantity &nbsp;
			 <button class="btn btn-primary pt-1 pb-1" id="spdiscount">Add 20% Discount</button>
		</div>
		<div class="col-1" style="font-weight: bold;">Price</div>
		<div class="col-1" style="font-weight: bold;">Ext Price</div>
	</div>
	<div class="row mt-3">
		<div class="col-8"> </div>
		<div class="col-2" style="text-align: right">Transaction Type: </div>
		<button id="Cash" class="btn btn-primary">CASH</button>
		<button id="Account" class="btn btn-primary">ACCOUNT</button>
	</div>
	<div id="transDivCash" style="display: none">
		<div class="row">
			<div class="col-8"> </div>
			<div class="col-2" style="text-align: right">Sub Total: </div>
			<div class="col-2" id="subTotalc"  style="text-align: center;"></div>
		</div>
		<div class="row">
			<div class="col-8" style="text-align: right;color: red" id="ARmessage"> </div>
			<div class="col-2"  style="text-align: right">Amount Received: </div>
			<div class="col-2" style="text-align: center;">
				<input type="text" name="" id="AR" style="width: 100px;text-align: center;" >
			</div>
		</div>
		
		<div class="row">
			<div class="col" style="background-color: gray;"></div>
		</div>
		<div class="row">
			<div class="col-8"></div>
			<div class="col-2"  style="text-align: right">Amount Due: </div>
			<div class="col-2" id="ADc" style="text-align: center;"></div>
		</div>
		<div class="row" id="showChange">
			<div class="col-8"></div>
			<div class="col-2" style="text-align: right">Change: </div>
			<div class="col-2" id="change" style="text-align: center;"></div>
		</div>
	</div>
	<div id="transDivAcc" style="display: none">
		<div class="row">
			<div class="col-8"> </div>
			<div class="col-2" style="text-align: right">Sub Total: </div>
			<div class="col-2" id="subTotala"  style="text-align: center;"></div>
		</div>		
		<div class="row">
			<div class="col" style="background-color: gray;"></div>
		</div>
		<div class="row">
			<div class="col-8"></div>
			<div class="col-2"  style="text-align: right">Amount Due: </div>
			<div class="col-2" id="ADa" style="text-align: center;"></div>
		</div>
	</div>
	<div class="row mt-3 mb-3" >
			<div class="col-2">
				<div class="btn-group dropup">
				  <button class="btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #2980b9;color:white;float:left">
				    TRANSACTION HELD &nbsp;<i class="fas fa-caret-right" style="font-size: 12px"></i>
				  </button>
				  
				  <div class="dropdown-menu" style="width:610px;font-size: 15px;background-color: #2980b9;">
				    	<div class="row" style="font-weight: bold;color:white;">
				    		<div class="col-3"> Transaction ID </div>
				    		<div class="col-3">Patient Name </div>
				    		<div class="col-3">Items </div>
				    		<div class="col-3">Transaction Date </div>
				    	</div>
				    	<hr style="margin-top: 2px;">
				    	<div style="width:600px; max-height: 200px;overflow-y: auto;overflow-x: hidden;background-color: white;margin-top: -10px;margin-left: 3px">
				    	<?php foreach ($holdTrans as $key) {
				    	?>
				    	<hr style="margin-top: 2px">
				    	<div class="row holdtrans" style="font-size: 12px;cursor: pointer">
				    		<div class="col-3" ><?php echo $key['TransactionID'] ?> </div>
				    		<?php 
				    			$patID1 = $key['PatientID'];
				    			$patdata1 = $pat->fetch_data($patID1); 
				    		?>
				    		<div class="col-3"><?php echo $patdata1['LastName'].", ".$patdata1['FirstName']." ".$patdata1['MiddleName'] ?></div>
				    		<?php
				    			$idpatient = $key['PatientID'];
				    			$idtrans = $key['TransactionID'];
				    			$itemsquantity = $key['ItemQTY'];
				    			$itemsquantity = explode(',', $itemsquantity);
				    			$itemsdiscount = $key['Discount'];
				    			$itemsdiscount = explode(',', $itemsdiscount);
				    			$itemids = $key['ItemID'];
		            			$itemID = explode(',', $itemids);
		            			$Package = "";$itemnum = 0;$yy = 0;
		            			if ($itemids != ""){
		            			foreach ($itemID as $key1) {
		            				$items = $trans->fetch_item($key1);
		            				$Package .= "[".$items['ItemName']."] ";
		            				$itemnum++; 
		            		?>
		            			<input type="hidden" name="" class="itemsid" value="<?php echo $items['ItemID']; ?>">
				    			<input type="hidden" name="" class="itemlabel" value="<?php echo $items['ItemName'].' '.$items['ItemDescription']; ?>">
		            			<input type="hidden" name="" class="itemprices" value="<?php echo $items['ItemPrice']; ?>">			    			
		            			<input type="hidden" name="" class="itemsquantity" value="<?php echo $itemsquantity[$yy]; ?>">			    			
		            			<input type="hidden" name="" class="itemsdiscount" value="<?php echo $itemsdiscount[$yy]; ?>">			    					    			
		            		<?php
		            			$yy++;}}
				    		?>
				    		<input type="hidden" name="" class="idpatient" value="<?php echo $idpatient; ?>">
				    		<input type="hidden" name="" class="idtrans" value="<?php echo $idtrans; ?>">
				    		<div class="col-3"><?php echo $Package?> </div>
				    		<div class="col-3"><?php echo $key['TransactionDate'] ?> </div>
				    		
				    	</div>
				    	<?php } ?>
				    	</div>
				  </div>
				</div>
			</div>
			<div class="col-2">
				<button class="btn btn-warning" id="cancelTrans">Cancel</button>
				<button class="btn btn-danger" id="discardTrans" disabled>Discard</button>
			</div>
			<div class="col-5"></div>
			<div class="col-3" id="change">
				<input type="submit" name="hold" value="HOLD" class="btn btn-primary">
				<input type="submit" name="print" value="Save and Print" class="btn btn-primary">
			</div>
		</div>
	

	<!-- <div class="row mt-3">
		<button id="hold" class="btn btn-primary">HOLD</button>
		<button id="hold" class="btn btn-primary">CASH</button>
		<button id="hold" class="btn btn-primary">ACCOUNT</button>
	</div> -->
</div>

<!-- ADD modal -->
<div class="modal fade" id="ModalAdd" role="dialog" style="padding-top: 100px;">
	<center>
    <div class="" style="width: 500px;">
    <div class="modal-content modal-dialog">
    		<button type="button" class="close" data-dismiss="modal" aria-label="Close" 
    		style="color: white;background-color: red;font-size: 16px;padding:3px">
          			<span aria-hidden="true" >&times; EXIT &times;</span>
        	</button>
    	 	<div class="modal-header" style="font-size: 20px;text-align: center">	 	
    	 		<i class="fas fa-user-plus"></i>Add New Patient
    	 		
      		<br>
      	</div>
	<form method="post" id="addForm">
      	 <div style="width: 500px; padding: 30px;">
      	 	<div class="row" id="newPatientDiv">
      	 	<div class="col">
       			<input type="hidden"  name="idpatient" class="form-control" value="" id="myInput" required />
				<label for="">Company Name:</label>
				<input type="text"  name="company" class="form-control" value="" id="myInput" required />
				<label for="">Applied Position:</label>
				<input type="text" name="position" class="form-control" value="" id="myInput" required />
				<label for="">First Name:</label>
				<input type="text"  name="firstname" class="form-control" value="" id="myInput" required />
				<label for=""> Middle Name:</label>
				<input type="text"  name="middlename" class="form-control" value="" id="myInput" />
				<label for=""> Last Name:</label>
				<input type="text"  name="lastname"  class="form-control" value="" id="myInput" required />
			</div>
			<div class="col">
				<label for="">Address:</label>
				<input type="text"  name="address" class="form-control" value="" id="myInput" required />
				<label for=""> Birth Date:</label>
				<input type="text"  name="birthday" class="form-control" placeholder="MM-DD-YYYY" value="" id="myInput" required />
				<label for="">Age:</label>
				<input type="text"  name="age" id="age" class="form-control" value="" id="myInput" required />
				<label for="">Gender:</label>
				<input type="text"  name="gender" class="form-control" value="" id="myInput" required  />
				<label for="">Contact No.:</label>
				<input type="text"  name="contact" class="form-control" value="" id="myInput" required />	
			</div>
			<div class="col">
				<label for="">Email Address:</label>
				<input type="text"  name="email" class="form-control" value="" id="myInput" />
				<label for="">Bill to:</label>
				<input type="text"  name="billto" id="billto" class="form-control" id="myInput" value="" />
				<br>
				<button type="submit"  name="ADDNewRecord" class="btn btn-primary" style="font-size: 14px; width: 120px; height: 40px;" id="NPbtn">
				<i class="far fa-check-circle"></i>&nbsp; SUBMIT</button>
				<button class="btn btn-danger" id="clearData" style="font-size: 14px; width: 120px; height: 40px;margin-top: 50px">
					<i class="fas fa-eraser"></i>&nbsp; CLEAR</button>
				<!-- <button onclick="myFunction()">TRY</button> -->

				
		
			</div>	
		</div>
		</div>
</form>

 	</div>
	</div>
</center>
</div>
<div id="APloader" style="display: none"></div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){
		verify();
		$.fn.select2.defaults.set( "theme", "bootstrap" );
		$('#itemList').select2({
		});
		//var xx = new array
		//$("input[name=print]").attr("disabled", "disabled");
		var ItemArrays;
		var wrapper = ".itemdiv";
		var xx = 0;
		var transType = 0;//0 = undefine; 1 = account; 2 = cash;
		var uporin = 0;//0 = insert; 1 = update;
		var idtrans,idpatient;
		function priceF(price,dis){
			var disc = dis/100;
			var res = price * disc;
			return price-res;
		}
		function totalPrice(){
			var stprice = 0;
			stprice = parseFloat(stprice);
			$('.tpdivIN').each(function(){
				var tdval = this.value;
				tdval = parseFloat(tdval); 
    			stprice = stprice + tdval;
			});
			$("#subTotalc").html(stprice);
			$("#ADc").html(stprice);
			$("#subTotala").html(stprice);
			$("#ADa").html(stprice);
		}
		function change(){
			var stc = $("#subTotalc").text();
			stc = parseFloat(stc);
			var arval = $("#AR").val();
			if (arval < stc) {
				$("#ARmessage").html("Please Insert higher Amount");
				$("#AR").val(0);
				$("#change").html("0");
				return 0;
			}else{
				$("#ARmessage").html("");
				var change = arval - stc;
				$("#change").html(change);
				return 1;
			}
		}
		function verify(){
			var spid = $("#SelectedPID").val();
			var val;
			if (spid != undefined && $(".qty")[0]) {	
				val = 0	;
				$("input[name=print]").removeAttr("disabled");
				$("input[name=hold]").removeAttr("disabled");
			}else if ($(".qty")[0]) {
				val = 2;
				$("input[name=print]").attr("disabled", "disabled");
				$("input[name=hold]").removeAttr("disabled");
			}else if (spid != undefined) {
				val = 1;
				$("input[name=print]").attr("disabled", "disabled");
				$("input[name=hold]").removeAttr("disabled");
			}else{
				val = 3;
				$("input[name=hold]").attr("disabled", "disabled");
				$("input[name=print]").attr("disabled", "disabled");
			}
			return val;
		}
		$("#cancelTrans").click(function(){
			location.reload();
		});
		$("#itemList").change(function(){
			$("#addItem").trigger("click");
		});
		$("#discardTrans").click(function(){
			var heldtransID = $("#heldtransID").val();
			$.post("discard.php",{ tid:heldtransID }, function(){
				alert("Transaction Discarded");
				location.reload();
			});
		});
		$("#spdiscount").click(function(){
			$(".itemdivID").each(function(){
				var test_type = $(this).children(".testtype").val();
				if (test_type == 0) {
					$(this).children("div").children(".Disc").val("20");
					$(this).children("div").children(".Disc").change();

				}
			});
		});
		$("#Account").click(function(){
			$("#transDivAcc").show();
			$("#transDivCash").hide();
			transType = 1;
			//$("input[name=print]").removeAttr("disabled");
		});
		$("#Cash").click(function(){
			$("#transDivAcc").hide();
			$("#transDivCash").show();
			transType = 2;
			
		});
		$("#addItem").click(function(){
			// e.preventDefault();
			var existItem;
			var isExist = 0;
			var itemNum = $("#itemList").val();
			$(".itemNum").each(function(){
				existItem = $(this).text();
				if (existItem == itemNum) {
					var qtyvalue = $(this).parent("div").children("div").children(".qty").val();
					qtyvalue = parseInt(qtyvalue);
					qtyvalue = qtyvalue + 1;
					$(this).parent("div").children("div").children(".qty").val(qtyvalue);
					isExist = 1;
				}
			});
			if (isExist == 0) {
			var itemtxt = $( "#itemList option:selected" ).text().split("|");
			var itemName = itemtxt[1];
			var itemPrice = itemtxt[2];
			//var tempArray = [itemNum, itemName, itemPrice, Price, TotalPrice];
			var testtype = itemtxt[0];
			$("#addItemdiv").after('<div class="row itemdivID col-12" id="itemdivID'+ xx +'"><div class="col-1 itemNum">'+ itemNum +'</div>'+'<input type="hidden" name="testtype" value="'+testtype+'" class="testtype">'+
			'<div class="col-2">'+ itemName +'</div>'+
			'<div class="col-2">Item Price:&nbsp;'+
			'<input name="itemPrice" class="itemPrice " value="'+ itemPrice +'" style="width:80px;border:none;background-color:white" disabled></div>'+
			'<div class="col-5">QTY: <input value="1" type="number" class="qty trigger" style="width:80px" min="0">'+
			'&nbsp;&nbsp;&nbsp;Discount % <input type="number" class="Disc trigger" value="0" style="width:80px" min="0" max="100"><a href="#" class="removeItem" style="color:white">&nbsp;&nbsp;<i class="far fa-trash-alt" style="color:red"></i>&nbsp;Remove</a></div>'+
			'<div class="col-1 pricediv"></div>'+
			'<div class="col-1 tpdiv"><input name="" class="tpdivIN" style="width:80px;border:none;background-color:white" disabled></div></div>'+
			'<input name="data" class="data" style="display:none">');
			}
			$(".removeItem").click(function(){
				$(this).parent('div').parent('div').remove();xx--;
				totalPrice();
				change();
				verify();
			});	

				$(".itemdivID").each(function(){
				var divID = $(this);
					var price = divID.children("div").children(".itemPrice").val();
					var disc = divID.children("div").children(".Disc").val();
					var disPrice = priceF(price,disc);
					divID.children(".pricediv").html(disPrice);
					var qty = divID.children("div").children(".qty").val();
					var TPrice = price * qty;
					divID.children("div").children(".tpdivIN").val(TPrice);

				divID.children("div").children(".qty").change(function(){
					var price = divID.children(".pricediv").text();
					var qty = divID.children("div").children(".qty").val();
					var TPrice = price * qty;
					divID.children("div").children(".tpdivIN").val(TPrice);
					totalPrice();
					change();
					verify();
				});

				divID.children("div").children(".Disc").change(function(){
					var price = divID.children("div").children(".itemPrice").val();
					var disc = divID.children("div").children(".Disc").val();
					if (disc > 100 || disc < 0) {
						divID.children("div").children(".Disc").val("0");
						disc = divID.children("div").children(".Disc").val();
					}
					var disPrice = priceF(price,disc);
					divID.children(".pricediv").html(disPrice);

					var qty = divID.children("div").children(".qty").val();
					var price2 = divID.children(".pricediv").text();
					var TPrice = price2 * qty;
					divID.children("div").children(".tpdivIN").val(TPrice);
					totalPrice();
					change();
					verify();
				});
				
				totalPrice();
				change();
				verify();
				$(this).children("div").children(".Disc").change();
			});
			
		});	
		$("#AR").change(function(){
			change();
		});		
		//search Function here
		var searchtxt = $("#searchPatient").val();
		$("#searchloader").load("searchPatient.php",{txt:searchtxt},function(){});
		$("#searchPatient").keyup(function(){
			var searchtxt = $("#searchPatient").val();
			$("#searchloader").load("searchPatient.php",{txt:searchtxt},function(){
			});
		});
		// 0 = Patient and Item; 1 = no Item; 2 = no Patient;3 = no Patient no Item;
		function getClassDataVal(classname){
			var array = [];
			$(classname).each(function(){
				var itemvalue = $(this).val();
				array.push(itemvalue);
			}); 
			return array;
		}
		$("input[name=hold]").click(function(){
			verify();
			var CN = "<?php echo $cashierName;?>";
			var TN = "<?php echo $TransNo;?>";
			var biller =" <?php echo $biller;?>";
			var status = 0;//0 = hold; 1 = transacted;
			var PatientID = $("#SelectedPID").val();
			var itemsID = [];
			var itemsQTY = getClassDataVal(".qty");
			var itemsDisc = getClassDataVal(".Disc");
			$('.itemNum').each(function(){
				var itemvalue = $(this).text();
				itemsID.push(itemvalue);
			}); 
			var itemarray =  itemsID.toString();
			var itemsQTY2 = itemsQTY.toString();
			if (transType == 2) {
				var changeValue = $("#change").text();
				var subTotalcash = $("#subTotalc").text();
				var payment = $("#AR").val();
			}else{
				var changeValue = "";
				var subTotalcash = "";
				var payment = "";
			}
					if (uporin == 0) {
						$.post("DataTransaction.php",{status: status, PatientID: PatientID, itemsID: itemsID, itemsQTY: itemsQTY, itemsDisc: itemsDisc, change: changeValue, totalAmount: subTotalcash, payment: payment, cashier: CN, transNO: TN, transType: transType, biller: biller}, function(e){
							alert(e);
							location.reload();
						});
					}else{
						$.post("DataTransaction.php",{transID: idtrans, status: status, PatientID: PatientID, itemsID: itemsID, itemsQTY: itemsQTY, itemsDisc: itemsDisc, change: changeValue, totalAmount: subTotalcash, payment: payment, cashier: CN, transNO: TN, transType: transType, biller: biller}, function(e){
							alert(e);
							location.reload();
						});
					}
				
						//alert("Change: "+  changeValue + "Patient: " + PatientID + "Items: " +  itemsQTY2 + "Payment: " + payment);
			
			//$.post("HoldTransaction.php")

		});
		$("input[name=print]").click(function(){
			verify();
			var CN = "<?php echo $cashierName;?>";
			var TN = "<?php echo $TransNo;?>";
			var biller =" <?php echo $biller;?>";
			var status = 1;//0 = hold; 1 = transacted;
			var PatientID = $("#SelectedPID").val();
			var itemsID = [];
			var itemsQTY = getClassDataVal(".qty");
			var itemsDisc = getClassDataVal(".Disc");
			$('.itemNum').each(function(){
				var itemvalue = $(this).text();
				itemsID.push(itemvalue);
			}); 
			var itemarray =  itemsID.toString();
			var itemsQTY2 = itemsQTY.toString();
			if (transType == 2) {
				var changeValue = $("#change").text();
				var subTotalcash = $("#subTotalc").text();
				var payment = $("#AR").val();
			}else{
				var changeValue = "";
				var subTotalcash = $("#subTotalc").text();
				var payment = "";
			}
			if (transType == 0) {
				alert("Please Select Transaction Type");
			}
			if (transType == 2 || transType == 1) {
				var changeVal = change();
				if (changeVal == 0 && transType == 2) {
					alert("Please Enter higher Amount");
				}else{

					if (uporin == 0) {
						$.post("DataTransaction.php",{status: status, PatientID: PatientID, itemsID: itemsID, itemsQTY: itemsQTY, itemsDisc: itemsDisc, change: changeValue, totalAmount: subTotalcash, payment: payment, cashier: CN, transNO: TN, transType: transType, biller: biller}, function(e){
							// $.post("AccountReceipt.php",{transID: e},function(){
								
							// });
							
							window.open("Receipt.php?transID="+e+"&patID="+PatientID);
							location.reload();
						});
					}else{
						$.post("DataTransaction.php",{transID: idtrans, status: status, PatientID: PatientID, itemsID: itemsID, itemsQTY: itemsQTY, itemsDisc: itemsDisc, change: changeValue, totalAmount: subTotalcash, payment: payment, cashier: CN, transNO: TN, transType: transType, biller: biller}, function(e){
							
							window.open("Receipt.php?transID="+idtrans+"&patID="+PatientID);
							location.reload();
						});
					}
				}
			}
			// if (transType == 1) {

			// }
		});
		$("div").hover(function(){
		// var spid = $("#SelectedPID").val();
			verify();
		});
		$("#NPbtn").click(function(e){
			e.preventDefault();
			var company = $("input[name=company]").val();
			var position = $("input[name=position]").val();
			var fn = $("input[name=firstname]").val();
			var mn = $("input[name=middlename]").val();
			var ln = $("input[name=lastname]").val();
			var add = $("input[name=address]").val();
			var bd = $("input[name=birthday]").val();
			var age = $("input[name=age]").val();
			var gender = $("input[name=gender]").val();
			var bt = $("input[name=billto]").val();
			// if (company.length && position.length && fn.length && mn.length && ln.length && add.length && bd.length) {
				var option = { 
					target: "#APloader",
					url:        'newPatient.php', 
					success:    function(result) { 
						$('#newPatientDiv').children('div').children("input").val("");	
						$('#ModalAdd').modal('toggle');
						$("#selectedPatient").load("getPatient.php",{patID: result},function(){
				
						});
					} 
				};  
				$("#addForm").ajaxSubmit(option);
			// }else{
			// 	alert("Please Complete all credentials");
			// }
		});
		$("#clearData").click(function(){
			$('#newPatientDiv').children('div').children("input").val("");
		});
		$(".holdtrans").click(function(){
			$("#discardTrans").removeAttr("disabled");
			if ($(".removeItem")) {
				$(".removeItem").trigger("click");
				xx = 0;
			}
			uporin = 1;
			idtrans = $(this).children(".idtrans").val();
			idpatient = $(this).children(".idpatient").val();
			$("#selectedPatient").load("getPatient.php",{patID: idpatient},function(){
				
			});
			$("#discardTrans").after("<input type='hidden' id='heldtransID' value='"+idtrans+"'>");
			var itemids = [];
			var itemlabel = [];
			var itemprice = [];
			var itemsquantity = [];
			var itemsdiscount = [];
			$(this).children('.itemlabel').each(function(){
				var thisvalue = $(this).val();
				itemlabel.push(thisvalue);
			});
			$(this).children('.itemprices').each(function(){
				var thisvalue = $(this).val();
				itemprice.push(thisvalue);
			});
			$(this).children('.itemsid').each(function(){
				var thisvalue = $(this).val();
				itemids.push(thisvalue);
			});
			$(this).children('.itemsquantity').each(function(){
				var thisvalue = $(this).val();
				itemsquantity.push(thisvalue);
			});
			$(this).children('.itemsdiscount').each(function(){
				var thisvalue = $(this).val();
				itemsdiscount.push(thisvalue);
			});

			for (var i = 0; i < itemids.length; i++) {
				$("#addItemdiv").after('<div class="row itemdivID col-12" id="itemdivID'+ xx +'"><div class="col-1 itemNum">'+ itemids[i] +'</div>'+
				'<div class="col-2">'+ itemlabel[i] +'</div>'+
				'<div class="col-2">Item Price:&nbsp;'+
				'<input name="itemPrice" class="itemPrice " value="'+ itemprice[i] +'" style="width:80px;border:none;background-color:white" disabled></div>'+
				'<div class="col-5">QTY: <input value="'+ itemsquantity[i] +'" type="number" class="qty trigger" style="width:80px" min="0">'+
				'&nbsp;&nbsp;&nbsp;Discount % <input type="number" class="Disc trigger" value="'+ itemsdiscount[i] +'" style="width:80px" min="0" max="100"><a href="#" class="removeItem" style="color:white">&nbsp;&nbsp;<i class="far fa-trash-alt" style="color:red"></i>&nbsp;Remove</a></div>'+
				'<div class="col-1 pricediv"></div>'+
				'<div class="col-1 tpdiv"><input name="" class="tpdivIN" style="width:80px;border:none;background-color:white" disabled></div></div>'+
				'<input name="data" class="data" style="display:none">');
			
				$(".removeItem").click(function(){
				$(this).parent('div').parent('div').remove();xx--;
				totalPrice();
				change();
				verify();
			});	

				
			}
			$(".itemdivID").each(function(){
				var divID = $(this);
					var price = divID.children("div").children(".itemPrice").val();
					var disc = divID.children("div").children(".Disc").val();
					var disPrice = priceF(price,disc);
					divID.children(".pricediv").html(disPrice);
					var qty = divID.children("div").children(".qty").val();
					var TPrice = price * qty;
					divID.children("div").children(".tpdivIN").val(TPrice);

				divID.children("div").children(".qty").change(function(){
					var price = divID.children(".pricediv").text();
					var qty = divID.children("div").children(".qty").val();
					var TPrice = price * qty;
					divID.children("div").children(".tpdivIN").val(TPrice);
					totalPrice();
					change();
					verify();
				});

				divID.children("div").children(".Disc").change(function(){
					var price = divID.children("div").children(".itemPrice").val();
					var disc = divID.children("div").children(".Disc").val();
					if (disc > 100 || disc < 0) {
						divID.children("div").children(".Disc").val("0");
						disc = divID.children("div").children(".Disc").val();
					}
					var disPrice = priceF(price,disc);
					divID.children(".pricediv").html(disPrice);

					var qty = divID.children("div").children(".qty").val();
					var price2 = divID.children(".pricediv").text();
					var TPrice = price2 * qty;
					divID.children("div").children(".tpdivIN").val(TPrice);
					totalPrice();
					change();
					verify();
				});
				
				totalPrice();
				change();
				verify();
			});
		});
		
	});
</script>
</html>