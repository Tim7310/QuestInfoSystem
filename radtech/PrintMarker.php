<script type="text/javascript">
	window.onload = function() 
	{ 
		window.print(); 
	}
</script>
<?php
	include_once('../connection.php');;
	include_once('../classes/trans.php');
	include_once('../classes/patient.php');

	$patient = new Patient;
	$transac = new trans;
	$part = $_GET['Part'];
	$radtech = $_GET['RadTech'];
	$filmSize = $_GET['filmSize'];


	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		$data = $patient->fetch_data($id);

		if (isset($_GET['tid']))
		{
			$id = $_GET['id'];
			$tid = $_GET['tid'];
			$trans = $transac->fetch_data($id, $tid);
			$date = explode(" ", $trans['TransactionDate']);
			$marker = $transac->checkMarker($tid, $id);
			$rt = $_GET['RadTech'];
			$part = $_GET['Part'];
			if ($marker == 0) {
				$transac->addMarker($filmSize,$id,$tid,$part,$rt);
			}
			
		}
	}
?>

<html>
	<style>
		table{
		  border-collapse: collapse;
		}

		table, th, td {
		  border: 2px solid black;
		}
	</style>
	<body>
		
		<table width = "350px"; height = "80px"; style = "font-size: 13px">
			<tr>
				<td colspan = "3"><center>QUESTPHIL DIAGNOSTICS</center></td>
			</tr>
			<tr>
				<td width = "300px">
					<b><?php echo $data['LastName'] ?>, <?php echo $data['FirstName'] ?></b>
				</td>
				<td rowspan = "3" colspan = "2" style = "width: 50px; font-size: 40px">
					<center><b><?php echo intval($tid) ?></b></font></center>
				</td>
			</tr>
			<tr>
				<td><b> <?php echo $data['Age'] ?>/<?php echo $data['Gender'] ?></b></td>
			</tr>
			<tr>
				<td><b> <?php echo $data['CompanyName'] ?> </b></td>
			</tr>
			<tr>
				<td>
					<b><?php echo $part ?> </b>
				</td> 
				<td style="width: 100px">
					<center><?php echo $radtech ?> </center>
				</td>
				<td style="width: 100px">
					<center><?php echo $date[0];?> </center>
				</td>
			</tr>
		</table>
	</body>
</html>
