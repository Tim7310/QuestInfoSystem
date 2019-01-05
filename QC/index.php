
<?php
session_start();
require_once '../class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['class'] != "Accounting")
{
    $user_home->redirect('index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quality Control Index</title>
    <link rel="stylesheet" href="">
</head>

<body>
<?php include_once('qcsidebar.php');
?>
<div class="container-fluid">

</div>

 
</div>
</body>
</html>