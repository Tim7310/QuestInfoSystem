<?php
include_once("apeDatabase.php");
if (isset($_FILES['trans'])) {
	$path1 = $_FILES['trans']['name'];
	$ext1 = pathinfo($path1, PATHINFO_EXTENSION);
	if ($ext1 == "csv") {
		move_uploaded_file($_FILES["trans"]["tmp_name"], $path1);
	}
}
if (isset($_FILES['patient'])) {
	$path2 = $_FILES['patient']['name'];
	$ext2 = pathinfo($path2, PATHINFO_EXTENSION);
	if ($ext2 == "csv") {
		move_uploaded_file($_FILES["patient"]["tmp_name"], $path2);
	}
}

function csv_to_array($filename='', $delimiter=',')
{
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else
				$data[] = array_combine($header, $row);
		}
		fclose($handle);
	}
	return $data;
}
/**
 * Example
 */
$trans = csv_to_array($path1);
$patient = csv_to_array($path2);
$import = new import;
$import->insertData($trans, $patient);

?> 