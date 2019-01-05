
<?PHP if(isset($_POST['btn-signup']))
{

	$name = trim($_POST['patient']);


$host ="localhost";
$user="root";
$password="";
$dbname="dbtest";
$pdo= new PDO("mysql:host=$host;dbname=$dbname", $user, $password, array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

		mysql_connect("localhost", "root","") or die(mysql_error());
		mysql_select_db("dbtest") or die(mysql_error());


		$query = "SELECT firnam,midnam, lasnam,id FROM qpd_form where id = '".$name."' ORDER BY id";
		$result = mysql_query($query) or die(mysql_error()."[".$query."]");

		while ($rows = mysql_fetch_array($result))
		{
		    echo "<option value='".$rows['id']."'>".$rows['lasnam'].", ".$rows['firnam']." ".$rows['midnam']." </option>";
	



$post_image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$new_image_name = ''. $rows['lasnam'] .', '. $rows['firnam'] .' '. $rows['midnam'] .'Lab Result ' . date('Y-m-d-H-i-s') . '-' . uniqid() . '.pdf';












$move = "result/".$new_image_name;
move_uploaded_file($_FILES["image"]["tmp_name"], $move);



$query=$pdo->prepare("INSERT into qpd_result(file,user_id) values(?,?)");

	$query->bindValue(1, $new_image_name);
		$query->bindValue(2, $name);

$query->execute();
    
	}

}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Referral Form</title>

<link rel="stylesheet" media="all" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<style type="text/css" media="all">
.form-control{
	margin-bottom: 10px;
	width:350px;
}

</style>
<head>
	<title>jQuery Searchable DropDown Plugin Demo</title>

	<!-- BEGIN syntax highlighter -->
	<script type="text/javascript" src="sh/shCore.js"></script>
	<script type="text/javascript" src="sh/shBrushJScript.js"></script>
	<link type="text/css" rel="stylesheet" href="sh/shCore.css"/>
	<link type="text/css" rel="stylesheet" href="sh/shThemeDefault.css"/>
	<script type="text/javascript">
		SyntaxHighlighter.all();
	</script>
	<!-- END syntax highlighter -->

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.searchabledropdown-1.0.8.min.js"></script>
	
	
	<script type="text/javascript">
		$(document).ready(function() {
			$("select").searchable();
		});
	
	
		// demo functions
		$(document).ready(function() {
			$("#value").html($("#myselect :selected").text() + " (VALUE: " + $("#myselect").val() + ")");
			$("select").change(function(){
				$("#value").html(this.options[this.selectedIndex].text + " (VALUE: " + this.value + ")");
			});
		});
	
		function modifySelect() {
			$("select").get(0).selectedIndex = 5;
		}
	
		function appendSelectOption(str) {
			$("select").append("<option value=\"" + str + "\">" + str + "</option>");
		}
	
		function applyOptions() {			  
			$("select").searchable({
				maxListSize: $("#maxListSize").val(),
				maxMultiMatch: $("#maxMultiMatch").val(),
				latency: $("#latency").val(),
				exactMatch: $("#exactMatch").get(0).checked,
				wildcards: $("#wildcards").get(0).checked,
				ignoreCase: $("#ignoreCase").get(0).checked
			});
	
			alert(
				"OPTIONS\n---------------------------\n" + 
				"maxListSize: " + $("#maxListSize").val() + "\n" +
				"maxMultiMatch: " + $("#maxMultiMatch").val() + "\n" +
				"exactMatch: " + $("#exactMatch").get(0).checked + "\n"+
				"wildcards: " + $("#wildcards").get(0).checked + "\n" +
				"ignoreCase: " + $("#ignoreCase").get(0).checked + "\n" +
				"latency: " + $("#latency").val()
			);
		}
	</script>
	<style type="text/css">
		body {
			font-family: sans-serif;
			font-size: 13px;
		}
		
		h1 {
			font-size: 20px;
		}
		
		h2 {
			font-size: 16px;
			margin: 50px 0 8px 0;
		}
		
		h3 {
			font-size: 14px;
		}
	</style>
</head>
<body >
<?php
include_once('sidebar.php');
?>
<div style="margin-left: 60px;">
Add Records Page




<form action="" method="POST" enctype="multipart/form-data">
			<?php
		mysql_connect("localhost", "root","") or die(mysql_error());
		mysql_select_db("dbtest") or die(mysql_error());

		$query = "SELECT firnam,midnam, lasnam,id FROM qpd_form ORDER BY id";
		$result = mysql_query($query) or die(mysql_error()."[".$query."]");
		?>

		<select name="patient">
		<?php 
		while ($row = mysql_fetch_array($result))
		{
		    echo "<option value='".$row['id']."'>".$row['lasnam'].", ".$row['firnam']." ".$row['midnam']." </option>";
		}
		?>        
		</select>



		<input type='file' required onchange="readURL(this);" name="image"  style="padding-top: 10px;">
		<button type="submit" name="btn-signup">Submit</button>
</form>





















</div>
</body>
</html>