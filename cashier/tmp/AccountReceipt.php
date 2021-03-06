<script type="text/javascript">
	window.onload = function() 
	{ 
		window.print(); 
	}
</script>
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
?>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Account Receipt</title>
    <link rel="stylesheet" href="style.css">
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	</head>
	<style type="text/css">
	body
		{
			font-family: "Century Gothic";
			font-size: 16px;
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
<div class="container-fluid">
	<div class="col-6">

		<div class="row">
			<div class="col"><?php echo $data['TransactionDate'] ?></div>
		</div>
		<div class="row">
			<div class="col"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div>
		</div>
		<div class="row">
			<div class="col"><center>McArthur Hi-Way Cor. Salome Rd. Angeles City</center></div>
		</div>
		<br>
		<div class="row">
			<div class="col-2 text-right">Name:</div>
			<div class="col-8" style="padding-left: 0px; font-size: 14px; font-size: 19px;"><b><?php echo $data['LastName'] ?>, <?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></div>
		</div>
		<div class="row">
			<div class="col-2 text-right">Company:</div>
			<div class="col-8" style="padding-left: 0px;"><b><?php echo $data['CompanyName'] ?></b></div>
		</div>
		<div class="row">
			<div class="col-2 text-right">Age/Gen:</div>
			<div class="col-8" style="padding-left: 0px;"><b><?php echo $data['Age'] ?>/<?php echo $data['Gender'] ?></b></div>
		</div>
		<div class="row">
			<div class="col-2 text-right">DOB:</div>
			<div class="col-8" style="padding-left: 0px;"><b><?php echo $data['Birthdate'] ?></b></div>
		</div>
		<div class="row">
			<div class="col-2 text-right">Contact:</div>
			<div class="col-8" style="padding-left: 0px;"><b><?php echo $data['ContactNo'] ?></b></div>
		</div>
		<?php 
		if ($data['Biller']=="") {
			$reff = $data1['CompanyName'];
		} else {
			$reff = $data['Biller'];
		}
		?>
		<div class="row">
			<div class="col-2 text-right">Referral:</div>
			<div class="col-8" style="padding-left: 0px;"><b><?php echo $reff ?></b></div>
		</div>
		<div class="row">
			<div class="col-2 text-right">Cashier:</div>
			<div class="col-8" style="padding-left: 00px;"><b>
				<?php 
				$cashier = explode(",",$data['Cashier']);
				echo $cashier[0];
				?>
					
			</b></div>
		</div>
		<div class="row">
			<div class="col-2 text-right">Type:</div>
			<div class="col-8" style="padding-left: 0px;"><b><?php echo $data['TransactionType'] ?></b></div>
		</div>
		<div class="row">
			<div class="col-2 text-right"><h4>RCPT:</h4></div>
			<div class="col-8" style="padding-left: 0px;"><h4><b>#<?php echo $data['TransactionID'] ?></b></h4></div>
		</div>
		<div class="row">
			<table style="width: 80%;">
				<tr class="tab" >
					<td style="width: 20%;padding: 5px;"><b>Items</b></td>
					<td style="width: 40%;padding: 5px;"><b>Description</b></td>
					<td style="width: 20%;padding: 5px;"><b>Price</b></td>
				</tr>
					<?php
						$ItemName = explode(",",$data['ItemID']);
						foreach ($ItemName as $item) {
					?>
				<tr>

					<td style="width: 20%;padding: 5px;">
					<b>
						<?php 
							$itemdata = $trans->fetch_item($item);
							echo $itemdata['ItemName'];
						
						?>
					</b>
					</td>
					<td style="width: 40%;padding: 5px;">
						<?php 
							echo $itemdata['ItemDescription'];
						?>
					</td>

					<td style="width: 20%;padding: 5px;">
						<?php 
							echo $itemdata['ItemPrice']."<br/>";
						?>
					</td>
				</tr>
			<?php } ?>
			</table>
		</div>
		<hr>
		<div class="row">
			<table style="width: 80%;">
				<tr class="tab"></tr>
				<tr>
					<td style="width: 20%;padding-top: 5px;"></td>
					<td style="width: 40%;padding-top: 5px;">Receipt Total:</td>
					<td style="width: 20%;padding-top: 5px;">₱:<?php echo $data['TotalPrice'] ?></td>
				</tr>
				<?php
					if ($data['TransactionType'] == 'ACCOUNT') {
						
				?>
				<tr>
					<td style="width: 20%"></td>
					<td style="width: 40%;font-size: 18px; font-weight: bolder;">Total Accounted:</td>
					<td style="width: 20%;font-size: 18px; font-weight: bolder;">₱:<?php echo $data['GrandTotal'] ?></td>
				</tr>				
				<tr>
					<td style="width: 20%"></td>
					<td style="width: 40%;font-size: 18px; font-weight: bolder;">Billed to:</td>
					<td style="width: 20%;font-size: 18px; font-weight: bolder;"><?php echo $data['Biller'] ?></td>
				</tr>
					<?php } ?>
				<!-- for Cash -->
				<?php
					if ($data['TransactionType'] == 'CASH') {
						
				?>
				<tr>
					<td style="width: 20%"></td>
					<td style="width: 40%">Discount:</td>
					<td style="width: 20%">₱:
					<?php 
						$Disc = explode(",",$data['Discount']);
						$DiscA = array_sum($Disc);
						echo $DiscA;
					?></td>
				</tr>
				<tr>
					<td style="width: 20%"></td>
					<td style="width: 40%;font-size: 18px; font-weight: bolder;">Total Accounted:</td>
					<td style="width: 20%;font-size: 18px; font-weight: bolder;">₱:<?php echo $data['GrandTotal'] ?></td>
				</tr>	
				<tr>
					<td style="width: 20%"></td>
					<td style="width: 40%">Amount Tendered:</td>
					<td style="width: 20%">₱:
					<?php 
						$cash = explode(",",$data['PaidIn']);
						echo $cash[0];
					?>
					</td>
				</tr>
				<tr>
					<td style="width: 20%"></td>
					<td style="width: 40%;font-size: 18px; font-weight: bolder;">Given Change:</td>					
					<td style="width: 20%;font-size: 18px; font-weight: bolder;">₱:
					<?php 
						$change = explode(",",$data['PaidOut']);
						echo $change[0];
					?></td>
				</tr>
			<?php } ?>
			</table>
		</div>
		<div class="row" style="padding: 15px;">
			<div class="col"><center><div class="col-6" style="padding-left: 10px;"><p style="border: solid 2px black;">online results, www.questphil.com.ph</p></div></center></div>
		</div>
		
		<div class="row">
			<div class="col"><center><img src="bar.jpg" height="30px" width="250px" style="margin: 0px; padding: 0px;"></center></div>
		</div>





	</div>
</div>
<?php }?>
</body>
</html>