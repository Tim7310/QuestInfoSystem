<?php
session_start();
include_once("../connection.php");
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/pack.php');
require_once '../class.user.php';
$user_home = new USER();
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$cashierName =  $row['userName'];

$trans = new trans;
$pack = new pack;
$id = $_POST['id'];
$data = $trans->fetch_trans($id);
if(is_array($data)){	
	if ($data['TransactionType'] == 'CASH' and $data['SalesType'] == 'sales') {
	$ids = $data['ItemID'];
	$ids = $trans->each_item($ids);	
	$disc = explode(",", $data['Discount']);
	$qty = explode(",", $data['ItemQTY']);
	//print_r($ids);
	
?>
<style type="text/css">
	span{
		font-weight: bold
	}
	.col-md-2{
		text-align: center;
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
<div class="row justify-content-md-center mt-4">
	<div class="col-11 ">
		<div class="row">
			<div class="col-md-12 p-2 bg-primary text-white" style="font-size: 16px;text-align: center;font-weight: bold">
			PATIENT INFO</div>
			<div class="col-md-12">
				<input type="hidden" name="PID" value="<?php echo $data['PatientID']?>">
				<span > Name: </span> 
					<?php echo $data['FirstName']." ".$data['LastName']; ?>
			</div>
			<div class="col-md-12">
				<span > Company / Doctor Name: </span> 
					<?php echo $data['CompanyName']; ?>
			</div>
			<div class="col-md-6"><span>Contact No: </span><?php echo $data['ContactNo']; ?></div>
			<div class="col-md-6"><span>Creation Date: </span><?php echo $data['CreationDate']; ?></div>
			<div class="col-md-4"><span>Age: </span><?php echo $data['Age']; ?></div>
			<div class="col-md-4"><span>Gender: </span><?php echo $data['Gender']; ?></div>
			<div class="col-md-4"><span>BirthDate: </span><?php echo $data['Birthdate']; ?></div>
			<div class="col-md-12 p-2 mt-2 bg-primary text-white" style="font-size: 16px;text-align: center;font-weight: bold">
			TRANSACTION INFO</div>
			<div class="col-md-6"><span>Transaction No: </span><?php echo $data['TransactionID']?></div>
			<div class="col-md-6"><span>Transaction Ref: </span><?php echo $data['TransactionRef']?></div>
			<div class="col-md-6"><span>Transaction Type: </span><?php echo $data['TransactionType']?></div>
			<div class="col-md-6"><span>Cashier: </span><?php echo $data['Cashier']?></div>
			<div class="col-md-6"><span>Transaction Date: </span><?php echo $data['TransactionDate']?></div>
			<div class="col-md-6"><span>Biller: </span><?php echo $data['Biller']?></div>
			<input type="hidden" name="biller" value="<?php echo $data['Biller']?>">
			<div class="col-md-4"><span>Item Name</span></div>
			<div class="col-md-2"><span>Discount</span></div>
			<div class="col-md-2"><span>Quantity</span></div>
			<div class="col-md-2"><span>Price</span></div>
			<div class="col-md-2"><span>Action</span></div>
			<div style="height: 2px;" class="col-md-12 bg-primary mt-2 mb-1"></div>
			<div class="container" style="max-height: 150px;overflow-x: auto">
				
			<?php 
			$x = 0;
				foreach ($ids as $key) {
			?>	
			<div class="row justify-text-md-center itemDiv " >		
				<input class="itemid" type="hidden" name="itemid" value="<?php echo $key['ItemID']?>">	
				<div class="col-md-4 " ><?php echo $key['ItemName']?></div>
				<div class="col-md-2 mt-1"><?php echo $disc[$x]?></div>
				<input class="discount" type="hidden" name="discount" value="<?php echo $disc[$x]?>">	
				<input class="quantity" type="hidden" name="Quantity" value="<?php echo $qty[$x]?>">	
				<div class="col-md-2 mt-1"><?php echo $qty[$x]?></div>
				<div class="col-md-2 mt-1"><?php echo $key['ItemPrice']?></div>
				<?php
					$totalprice = $key['ItemPrice'] * $qty[$x];
					$discount = $disc[$x] / 100;
					$discount = $discount * $totalprice;
					$discount = $totalprice - $discount;
					
				?>
				<input type="hidden" name="pricetotal" value="<?php echo $discount; ?>">
				<div class="col-md-2 p-1"><button class="btn btn-danger delete"  style="padding: 3px; padding-left: 10px; padding-right: 10px">
					<i class="fas fa-trash" style="font-size: 12px"></i></button>
				</div>
			</div>		
			<?php $x++; } ?>
			</div>
			<div style="height: 2px;" class="col-md-12 bg-primary mt-1 mb-2"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8" ><span>TOTAL REFUND AMOUNT: </span></div>
					<div class="col-md-2 grandtotal" style="font-weight: bold; "></div>
				</div>
				<div class="row mt-4">
					<div class="col-md-6"><button class="btn btn-warning float-right">
						<i class="fas fa-retweet"></i> Exchange</button></div>
					<div class="col-md-6"><button class="btn btn-danger float-left" id="refund">
						<i class="fas fa-redo-alt"></i> Refund</button></div>
				</div>
			</div>
			
			
		</div>		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".delete").click(function(){
			$(this).parent("div").parent(".itemDiv").remove();
			TPrice();
		});
		function TPrice(){
			var total = 0;
			$("input[name='pricetotal'").each(function(){
				var value = $(this).val();
				value = parseFloat(value);
				total = total + value;
			});
			$(".grandtotal").text(total);
		}
		function getIDS(clas){
			var array = [];
			var clas = $('.'+clas);
			clas.each(function(){
				var value = $(this).val();
				array.push(value);
			});
			return array;
		}
		TPrice();
		$("#refund").click(function(){
		var pid = $("input[name='PID']").val();
		var cashier = "<?php echo $cashierName ?>";
		var itemid = getIDS("itemid");
		var discount = getIDS("discount");
		var quantity = getIDS("quantity");
		var biller = $("input[name='biller'").val();
		var gtotal = $(".grandtotal").text();
		$.confirm({
			title: 'Confirm',
			content: 'Are you sure you want to Refund this transaction?',
			theme: 'modern',
			buttons: {
				confirm: {
					text: 'Yes',
					btnClass: 'btn-danger',
					action: function(){
						//alert(itemid.toString());
						$.post("refund.php",{pid: pid, cashier: cashier, itemid: itemid, discount: discount, quantity: quantity, biller: biller, gtotal: gtotal},function(e){
							//alert(e);
							var msg = JSON.parse(e);
						 	window.open("refundReceipt.php?patID="+msg[1]+"&transID="+msg[0]);
						// 	//location.reload();
						});
					}
				},
				cancel: {
					action: function(){
						
					}
				}
			}
		});
	});
	});
</script>
<?php 
	}else{
		echo "<script> alert('Transaction Number cannot be Refund/Exchange'); </script>";
		echo "<script>location.reload();</script>";
	}
}else{
	echo "<script> alert('No Data Found'); </script>";
	echo "<script>location.reload();</script>";
}
?>
