<!-- <script type="text/javascript">
	window.onload = function() 
	{ 
		window.print(); 
	}
</script> -->
<?php
include_once('../connection.php');
include_once('../classes/patient.php');
include_once('../classes/trans.php');
$trans = new trans;
$pat = new Patient;
if (isset($_GET['transID'])){
	$patID = $_GET['patID'];
	$id = $_GET['transID'];
	$data = $trans->fetch_data($patID,$id);

	$discount = $trans->compute_discount($id);
	$price_total = $trans->total_price($id);
?>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Receipt</title>
    <link rel="stylesheet" href="style.css">
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	</head>
	<style type="text/css">
	body
		{
			font-family: "Century Gothic";
			font-size: 14px;
			padding: 0px;
			margin: 0px;
		}
	hr
	    {
	    	border-top: 2px solid #8c8b8b;
	    	line-height: 1px;
	    	margin-left: 0px;
	    	margin: 0px;
	    	width: 80%;
	    }
	h3
		{
			font-family: "Century Gothic";
		    padding: 0px;
		    margin: 0px;
		    color: black;

		}
	.col, .col-1, .col-2, .col-3, .col-4, .col-5 .col-6
		{
			padding-left: 0px;
			margin-left: 5px;
		}

	.items
		{
			padding-left: 20px;
		}
	.tab
	{
		border-top: 2px solid #8c8b8b;
		border-bottom: 2px solid #8c8b8b;
		


	}
	</style>
<body>
<br><br>
<table style="margin-left:20px;margin: right:20px;width: 200px;margin-top:-20px">
	<tr>
		<td colspan="3"><?php echo $data['TransactionDate'] ?></td>
		<td rowspan="23" style="width: 20px">&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" style=""><center><b>QUEST PHIL DIAGNOSTICS</b></center></td>

	</tr>
	<tr>
		<td colspan="3" style=""><center>McArthur Hi-Way Cor. Salome Rd. Angeles City</center></td>
	</tr>
	<tr style="height: 25px"></tr>
	<tr >
		<td class="text-right" >Name:</td>
		<td class="" style="font-size: 18px;letter-spacing: 2px" colspan="2"><b>
			&nbsp;&nbsp;<?php echo $data['LastName'] ?>, <?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?>
		</b></td>
	</tr>
	<tr>
		<td class="text-right">Company:</td>
		<td class="" colspan="2" style="font-size: 18px;letter-spacing: 2px"><b>
			&nbsp;&nbsp;<?php echo $data['CompanyName'] ?>
		</b></td>
	</tr>
	<tr>
		<td class="text-right">Age/Gen:</td>
		<td class="" style="font-size: 18px;letter-spacing: 2px"><b>
			&nbsp;&nbsp;<?php echo $data['Age'] ?>/<?php echo $data['Gender'] ?>
		</b></td>
	</tr>
	<tr>
		<td class="text-right">DOB:</td>
		<td class="" colspan="2" style="font-size: 18px;letter-spacing: 2px"><b>
			&nbsp;&nbsp;<?php echo $data['Birthdate'] ?>
		</b></td>
	</tr>
	<tr>
		<?php 
		if ($data['Biller'] == "" or $data['Biller'] == " ") {
			$reff = $data['CompanyName'];
		} else {
			$reff = $data['Biller'];
		}
		?>
		<td class="text-right" >Referral:</td>
		<td class="" colspan="2" style="font-size: 18px;letter-spacing: 2px"><b>
			&nbsp;&nbsp;<?php echo $reff ?>
		</b></td>
	</tr>
	<tr>
		<td class="text-right">Cashier:</td>
		<td class="" style="font-size: 18px;letter-spacing: 2px"><b>
			&nbsp;&nbsp;<?php 
				$cashier = explode(",",$data['Cashier']);
				echo $cashier[0];
				?>
		</b></td>
	</tr>
	<tr>
		<td class="text-right">Type:</td>
		<td class="" style="font-size: 18px;letter-spacing: 2px"><b>
			&nbsp;&nbsp;<?php echo $data['TransactionType'] ?>
		</b></td>
	</tr>
	<tr>
		<td class="text-right"><h4>RCPT:</h4></td>
		<td class="" colspan="2"><b>
			<h4><b>&nbsp;#<?php echo $data['TransactionID'] ?></b></h4>
		</b></td>
	</tr>
	<tr class="tab" >
		
		<td style="padding: 5px;"><b>Items</b></td>
		<td></td>
	<!-- 	<td style="width: 200px;padding: 5px;"><b>Description</b></td> -->
		<td style="width: 120px;padding: 5px;" class="text-right"><b>Price</b></td>
	</tr>
		<?php
			$ItemName = explode(",",$data['ItemID']);
			foreach ($ItemName as $item) {
		?>
	<tr style="border-bottom: dotted grey 1px; ">
		<td style="word-wrap: break-word;width: 150px;" colspan="2">
			<b>
				<?php 
					$itemdata = $trans->fetch_item($item);
					echo $itemdata['ItemName'];
					if ($itemdata['ItemName'] != $itemdata['ItemDescription']) {
						echo " ( ".$itemdata['ItemDescription']." ) ";
					}
						
				?>
			</b>
		</td>
		<!-- <td style="word-wrap: break-word;padding-left:10px;padding-right: 10px;width: 200px;">
			<?php 
				echo $itemdata['ItemDescription'];
			?>
		</td> -->
		<td style="" class="text-right">
			<?php 
				echo $itemdata['ItemPrice']."<br/>";
			?>
		</td>
	</tr>	
	<?php } ?> 
		<tr class="tab" ></tr>
				<?php
					if ($data['TransactionType'] == 'ACCOUNT') {
						
				?>
				<tr style="border-top: solid grey 5px; padding-top: 3px">
					<td style="font-size: 18px; font-weight: bolder;" colspan="2" 
					class="text-right">Total Accounted:</td>
					<td style="font-size: 18px; font-weight: bolder;" class="text-right">
						₱:<?php echo $data['GrandTotal'] ?></td>
				</tr>				
				<tr>
					<td style="font-size: 18px; font-weight: bolder;" colspan="2" class="text-right">Billed to:</td>
					<td style="font-size: 13px; font-weight: bolder;" class="text-right">
						<?php echo $data['Biller'] ?></td>
				</tr>
					<?php } ?>
				<!-- for Cash -->
				<?php
					if ($data['TransactionType'] == 'CASH') {
						
				?>
				
				<tr style="border-top: solid grey 5px; padding-top: 3px">
					<td style="font-size: 18px; font-weight: bolder;" class="text-right" colspan="2">
					Receipt Total:</td>
					<td style="font-size: 18px; font-weight: bolder;" class="text-right">
						₱:<?php echo $data['GrandTotal'] ?></td>
				</tr>
				<?php if($discount != 0){ ?>
				<tr>
					<td style="" class="text-right" colspan="2">Discount:</td>
					<td style="" class="text-right">₱:
					<?php 
						// $Disc = explode(",",$data['Discount']);
						// $DiscA = array_sum($Disc);
						// echo $DiscA;
						echo $discount;
					?></td>
				</tr>
				<?php } ?>	
				<tr>
					<td style="" class="text-right" colspan="2">Amount Tendered:</td>
					<td style="" class="text-right">₱:
					<?php 
						$cash = explode(",",$data['PaidIn']);
						echo $cash[0];
					?>
					</td>
				</tr>
				
				<tr>
					<td style="font-size: 18px; font-weight: bolder;" class="text-right" colspan="2">
					Given Change:</td>					
					<td style="font-size: 18px; font-weight: bolder;" class="text-right">₱:
					<?php 
						$change = explode(",",$data['PaidOut']);
						echo $change[0];
					?></td>
				</tr>
				<?php } ?>
				<tr>
					<td style="height: 30px;"></td>
				</tr>
				<tr>
					<td style="padding-top: 15px;" colspan="3">
						<center><p style="border: dotted 2px black;padding-left: 25px;padding-right: 25px;font-size: 17px;width: 250px; font-weight: bold">
						Powered By,<br/> Quest Info System</p></center>		
					</td>
				</tr>
				<tr>
					<td colspan="3"><center>
						<img src="bar.jpg" height="30px" width="250px" style="margin: 0px; padding: 0px;">
					</center></td>
				</tr>
</table>	

<?php }?>
</body>
</html>