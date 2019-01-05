<?php
include_once("../connection.php");
include_once("../classes/pack.php");
$TransNo = "Please Generate a random Number";
$cashierName = "PetraKabayo";
$patient = array(
				array(0,"Kiko - francis Magalona"),
				array(1,"Chito - chito Miranda"),
				array(2,"Clock9 - wala sya Epilyido"),
				array(3,"Kawawa naman c Clock 9"),
				array(4,"bakit wala Sya epilyido")
			);
$pack = new Pack;
$packData = $pack->fetch_all();
$biller = "Alorica";//biller here
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.min.css">
<script type="text/javascript" src="../source/jquery.min.js"></script>
<style type="text/css">
	.btn{
		cursor: pointer;
	}
</style>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-5">
			NO: <?php echo $TransNo; ?>
		</div>
		<div class="col-2"></div>
		<div class="col-5">
			Cashier: <?php echo $cashierName; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-5">
			<select id="itemList" name="itemList">
				<?php foreach ($packData as $key){ ?>
					
					<option value="<?php echo $key['ItemID'];?>"><?php echo $key['ItemName']." ".$key['ItemDescription']." | ". $key['ItemPrice'];?></option>

				<?php } ?>
			</select>
		</div>
		<div class="col-2"></div>
		<div class="col-5">
			<input type="text" name="search" id="searchPatient" placeholder="search Patient Here ">
		</div>
	</div>
	<div class="row">
		<div class="col-2">
			<button id="addItem">Add</button>
		</div>
		<div class="col-5"></div>
		<div class="col-5">
			<div id="searchloader" style="overflow-y: scroll;height:100px;"></div>
		</div>
	</div>
	<div class="row">
		<div class="col" id="selectedPatient"></div>
	</div>
	<div class="row" id="addItemdiv">
		<div class="col-1">Item #</div>
		<div class="col-3">Item Name</div>
		<div class="col-2">Attribute</div>
		<div class="col-4">Quantity</div>
		<div class="col-1">Price</div>
		<div class="col-1">Ext Price</div>
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
	<div class="row mt-3" >
			<div class="col-8"></div>
			<div class="col-2" > </div>
			<div class="col-2" id="change">
				<input type="submit" name="hold" value="HOLD">
				<input type="submit" name="print" value="Save and Print">
			</div>
		</div>
	

	<!-- <div class="row mt-3">
		<button id="hold" class="btn btn-primary">HOLD</button>
		<button id="hold" class="btn btn-primary">CASH</button>
		<button id="hold" class="btn btn-primary">ACCOUNT</button>
	</div> -->
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		verify();
		//var xx = new array
		//$("input[name=print]").attr("disabled", "disabled");
		var ItemArrays;
		var wrapper = ".itemdiv";
		var xx = 0;
		var transType = 0;//0 = undefine; 1 = account; 2 = cash;
		
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
		$("#addItem").click(function(e){
			e.preventDefault();
			var itemNum = $("#itemList").val();
			
			var itemtxt = $( "#itemList option:selected" ).text().split("|");
			var itemName = itemtxt[0];
			var itemPrice = itemtxt[1];
			//var tempArray = [itemNum, itemName, itemPrice, Price, TotalPrice];
			
			$("#addItemdiv").after('<div class="row" id="itemdivID'+ xx +'"><div class="col-1 itemNum">'+ itemNum +'</div>'+
			'<div class="col-3">'+ itemName +'</div>'+
			'<div class="col-2">Item Price:'+
			'<input name="itemPrice" class="itemPrice " value="'+ itemPrice +'" style="width:80px;border:none;background-color:white" disabled></div>'+
			'<div class="col-4">QTY: <input value="1" type="number" class="qty trigger" style="width:80px" min="0">'+
			'&nbsp;&nbsp;&nbsp;Discount % <input type="number" class="Disc trigger" value="0" style="width:80px" min="0" max="100"><a href="#" class="removeItem">Remove</a></div>'+
			'<div class="col-1 pricediv"></div>'+
			'<div class="col-1 tpdiv"><input name="" class="tpdivIN" style="width:80px;border:none;background-color:white" disabled></div></div>'+
			'<input name="data" class="data" style="display:none">');

			$(".removeItem").click(function(){
				$(this).parent('div').parent('div').remove();xx--;
				totalPrice();
				change();
				verify();
			});	

				var divID = $('#itemdivID' + xx);
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
				
				// var tpdivVal = $(".tpdiv");  
				// 	for (var i = 0; i < tpdivVal; i++) {
				// 			// $('#itemdivID' + i).children("div").children(".trigger").change(function(){ 
				// 			// 	var tp = $('#itemdivID' + i).children(".tpdiv").text();	
				// 			// 	tp = parseInt(tp);	
				// 			// 	stprice = stprice + tp;
				// 			//  });
				// 		alert($(tpdivVal[i]).text());
				// 		// $("#subTotal").html(stprice);	
				// 	}		
				// 	alert(tpdivVal.toString());	
				totalPrice();
				change();
				verify();
				xx++;	
		});	
		$("#AR").change(function(){
			change();
		});	
		// for (var i = 0; i < xx; i++) {	
		// 	var divID2 = $('#itemdivID' + i);
		// 	divID2.children("div").children(".Disc, .qty").keyup(function(){
		// 	var tp = divID2.children("div").children("tpdiv").text();			
		// 		if (xx != 0) {
		// 			stprice = tp;
		// 		}else{
		// 			stprice = stprice + tp;
		// 			$("#subtotal").html(tp);
		// 		}
		// });	
		// }
		// 	$("#subtotal").html(stprice);		
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
				$.post("DataTransaction.php",{status: status, PatientID: PatientID, itemsID: itemsID, itemsQTY: itemsQTY, itemsDisc: itemsDisc, change: changeValue, totalAmount: subTotalcash, payment: payment, cashier: CN, transNO: TN, transType: transType, biller: biller}, function(e){
					alert(e);
					location.reload();
				});
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
				var subTotalcash = "";
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
					$.post("DataTransaction.php",{status: status, PatientID: PatientID, itemsID: itemsID, itemsQTY: itemsQTY, itemsDisc: itemsDisc, change: changeValue, totalAmount: subTotalcash, payment: payment, cashier: CN, transNO: TN, transType: transType, biller: biller}, function(e){
						alert(e);
						location.reload();
					});
				}
			}
			if (transType == 1) {

			}
		});
		$("div").hover(function(){
		// var spid = $("#SelectedPID").val();
			verify();
		});
		

	});
</script>
</html>