<?php 
if (!isset($_SESSION)) {
   session_start();
}
  require_once '../class.user.php';
  $user = new USER;
  $user->bypass('Admin');

$stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exchange or Refund</title>
</head>
<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.min.css">
<script type="text/javascript" src="../source/popper.min.js"></script>
<script type="text/javascript" src="../source/jquery.min.js"></script>
<script type="text/javascript" src="../source/printThis/printThis.js"></script>

<link href="../source/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="../source/select2/theme/dist/select2-bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" src="../source/select2/dist/js/select2.min.js"></script>
<script type="text/javascript" src="../source/jquery-confirm.min.js"></script>
<link rel="stylesheet" type="text/css" href="../source/jquery-confirm.min.css">
<style type="text/css">
	button{
		cursor: pointer;
	}

</style>
<body>
<?php
include_once('cashsidebar.php');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="row justify-content-md-center mt-4" >
				<div class="col-md-6">

					<center><label>Input Transaction Number</label>
					<input type="text" name="transNo" class="form-control" >
					<button type="submit" class="btn btn-primary mt-2" id="find">FIND</button></center>
				</div>
			</div>
			<div class="row " id="exrefund">
				
			</div>
			
		</div>
		<div class="col-md-6" id="transload">
			
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#find").click(function(){
			var id = $("input[name='transNo'").val();
			$('#transload').load("transRefund.php",{id: id},function(){

			});
		});
		
	});
</script>
</html>