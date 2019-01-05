<?php error_reporting(E_ALL);?>
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

$post_image = $_FILES['image']['name'];

$image_tmp = $_FILES['image']['tmp_name'];

$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '' . $name . '_' . uniqid() . '.pdf';

$move = "result/".$new_image_name;
move_uploaded_file($_FILES["image"]["tmp_name"], $move);



$query=$pdo->prepare("INSERT into qpd_result(file,user_id) values(?,?)");

	$query->bindValue(1, $new_image_name);
		$query->bindValue(2, $name);

$query->execute();
    

}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
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
<body>

	
	<br/><br/>
<form action="" method="POST" enctype="multipart/form-data">
			<?php
		mysql_connect("localhost", "root","") or die(mysql_error());
		mysql_select_db("dbtest") or die(mysql_error());

		$query = "SELECT userID,userName FROM tbl_users ORDER BY userID DESC LIMIT  0,6";
		$result = mysql_query($query) or die(mysql_error()."[".$query."]");
		?>

		<select name="patient">
		<?php 
		while ($row = mysql_fetch_array($result))
		{
		    echo "<option value='".$row['userID']."'>".$row['userName']."</option>";
		}
		?>        
		</select>



		<input type='file' required onchange="readURL(this);" name="image"  style="padding-top: 10px;">
		<button type="submit" name="btn-signup">Submit</button>
</form>
		

</body>
</html>
