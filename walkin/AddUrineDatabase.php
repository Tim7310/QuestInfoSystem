<?php
include_once("../classes/inputData.php");
$update = new Input;
$dataArray = array(	array($_POST['Transparency'],"UriTrans"),
					array($_POST['pH'],"UriPh"),
					array($_POST['Specific Gravity'],"UriSp"),
					array($_POST['Protein'],"UriPro"),
					array($_POST['Glucose'],"UriGlu"),
					array($_POST['Leukocyte Esterase'],"LE"),
					array($_POST['Nitrite'],"NIT"),
					array($_POST['Urobilinogen'], "URO"),
					array($_POST['Blood'], "BLD"),
					array($_POST['Ketone'], "KET"),
					array($_POST['Bilirubin'], "BIL"),
					array($_POST['RBC']), "RBC"),
					array($_POST['WBC'], "WBC"),
					array($_POST['Epithelial Cells'], "ECells"),
					array($_POST['Bacteria'], "Bac"),
					array($_POST['M. Thread'], "MThreads"),
					array($_POST['Amorphous'], "Amorph"),
					array($_POST['Parasite'], ""), //NO COLUMN ON DB
					array($_POST['Pus clump/s']),//NO COLUMN ON DB
					array($_POST['Pus cast']),//NO COLUMN ON DB
					array($_POST['Red cell cast']),//NO COLUMN ON DB
					array($_POST['Hyaline cast']),//NO COLUMN ON DB
					array($_POST['Fine granular cast']),//NO COLUMN ON DB
					array($_POST['Coarse granular cast']),//NO COLUMN ON DB
					array($_POST['Red cell Clump/s']),//NO COLUMN ON DB
					array($_POST['Clinician'], "Clinician"),
					array($_POST['Received'], "Received"),
					array($_POST['qc'], ""),//Must be saved on diff table qpd_class
					array($_POST['Pathologist'], "Printed"),
					array($_POST['RMTLIC'], "RMTLIC"),
					array($_POST['QCLIC']),//Must be saved on diff table qpd_class
					array($_POST['PATHLIC']), "PATHLIC")
;

	$column[0] = "UriColor";
	$val[0] = $POST["Color"];

for ($i=1; $i < count($dataArray); $i++) { 
	if ($dataArray[$i] != "") {
		array_push($column, $dataArray)
	}
}

if ($POST["Transparency"] != "") {
	$column[0] = $POST["Color"];
	$val[0] = $POST["Color"];
}
$update->UpLabdata($column, $val, $id);
?>