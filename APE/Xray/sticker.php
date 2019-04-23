<!-- <script type="text/javascript">
	window.onload = function() 
	{ 
		window.print(); 
	}
</script> -->
<?php
	include_once('../dbconnect.php');;
	include_once('../../classes/rad.php');
	$rad = new rad;
	
	if (isset($_GET['enddate']) and isset($_GET['startdate'])) {
		$datas = $rad->fetchMarker('TransactionDate', $_GET['startdate'],$_GET['enddate']);
	}
	else if(isset($_GET['to']) and isset($_GET['from'])){
		$datas = $rad->fetchMarker('TransactionID', $_GET['from'],$_GET['to']);
	}else{
		header("location:index.php");
	}
	
	// $part = $_GET['Part'];
	// $radtech = $_GET['RadTech'];
	// $filmSize = $_GET['filmSize'];


	// if (isset($_GET['id']))
	// {
	// 	$id = $_GET['id'];
	// 	$data = $patient->fetch_data($id);

	// 	if (isset($_GET['tid']))
	// 	{
	// 		$id = $_GET['id'];
	// 		$tid = $_GET['tid'];
	// 		$trans = $transac->fetch_data($id, $tid);
	// 		$date = explode(" ", $trans['TransactionDate']);
	// 		// $marker = $transac->checkMarker($tid, $id);
	// 		// $transac->addMarker($filmSize,$id,$tid);
	// 		// if (!is_array($marker)) {
	// 		// 	$transac->addMarker($filmSize,$id,$tid);
	// 		// }
			
	// 	}
	// }
?>

<html>
	<link rel="icon" type="image/png" href="../assets/qpd.png">
	<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
	<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.min.css">
<style>
	table{
		  border-collapse: collapse;
		  border: 2px solid black;
		}
		.bb{
			border-bottom: 2px solid black;
		}
		.bl{
			border-left: 2px solid black;
		}
</style>
<body>
	<div class="container-fluid ">
		<div class="row">
			<?php foreach($datas as $data){?>
			<div class="col-6 mt-4">
				<table width = "450px" height = "80px" style = "font-size: 13px">
				<tr>
					<td colspan = "3" class="bb"><center>QUESTPHIL DIAGNOSTICS</center></td>
				</tr>
				<tr>
					<td width = "300px">
						<b><?php echo $data['LastName'] ?>, <?php echo $data['FirstName'] ?></b>
					</td>
					<td rowspan = "3" colspan = "2" style = "width: 50px; font-size: 40px" class="bb bl">
						<center><b><?php echo intval($data['TransactionID']) ?></b></font></center>
					</td>
				</tr>
				<tr>
					<td><b> <?php echo $data['Age'] ?>/<?php echo $data['Gender'] ?></b></td>
				</tr>
				<tr>
					<td class="bb"><b> <?php echo $data['CompanyName'] ?> </b></td>
				</tr>
				<tr>
					<td >
						<b><?php echo $data['xrayType'] ?> </b>
					</td> 
					<td style="width: 100px" class="bl">
						<center><?php echo $data['radTech'] ?> </center>
					</td>
					<td style="width: 100px" class="bl">
						<center><?php $tdate = explode(" ", $data['TransactionDate']); 
							echo $tdate[0];
						?> </center>
					</td>
				</tr>
				</table>
			</div>
			<?php } ?>
			
		</div>
	</div>
</body>
</html>
