<?php
// 	$zip = new ZipArchive();
// 	$filename = "try.zip";
// 	if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
//     exit("cannot open <$filename>\n");
// }
// 	$zip->addFile("pic1.jpg");
// 	$zip->addFile("pic2.jpg");

// 	// echo "numfiles: " . $zip->numFiles . "\n";
// 	// echo "status:" . $zip->status . "\n";
// 	$zip->close();
	$ZipName = $_POST['subject'].".zip";
	$pass = $_POST['pass'];
	$zip = new ZipArchive;
	$res = $zip->open($ZipName, ZipArchive::CREATE);
	if ($res === TRUE) {	    

	    for ($i=0; $i < count($_FILES["file"]["name"]); $i++) { 
	        $file_name = $_FILES["file"]["name"][$i];
	        move_uploaded_file($_FILES["file"]["tmp_name"][$i], $file_name);
	      	$zip->addFile($file_name);
	      	$zip->setEncryptionName($file_name, ZipArchive::EM_AES_256, $pass);
        }  
        //$zip->setPassword($pass);
	    $zip->close();
	   echo "Success To Zip";
	} else {
	    echo 'Failed to Zip';
	}

?>