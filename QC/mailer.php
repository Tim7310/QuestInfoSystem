<?php
include_once('../connection.php');
include_once('EmailLog.php');
 $newEmail = new Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                                // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                     // Enable SMTP authentication
    $mail->Username = 'questphil.corpresult@gmail.com';               // SMTP username
    $mail->Password = 'questphil2012';                       // SMTP password
    $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                      // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Quest Phil Diagnostics');
    //$mail->addAddress($_POST['recipient']);               // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    $xy = 0;
    $mail->addCC($_POST['recipient']);
        for ($y=1; $y < 19; $y++) { 
            if(isset($_POST['recipient'.$y])){ 
            	
                $mail->addCC($_POST['recipient'.$y]);
                $recLog[$xy] =  $_POST['recipient'.$y];
                $xy++;
            }
        }

    //Attachments
    if (is_array($_FILES["file"]["name"])) {
      for ($i=0; $i < count($_FILES["file"]["name"]); $i++) { 
        $file_name = $_FILES["file"]["name"][$i];
        move_uploaded_file($_FILES["file"]["tmp_name"][$i], $file_name);
        //$mail->addAttachment($file_name);
        $fileLog[$i] = $_FILES["file"]["name"][$i]; 
        //echo "ehh d2?";
        }  
    }
    $mail->addAttachment($_POST['subject'].".zip");
    // else{
    //     $file_name = $_FILES["file"]["name"];
    //     move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);
    //     $mail->addAttachment($file_name);         // Add attachments
    //     $fileLog[0] = $_FILES["file"]["name"];
    //     //echo "napupunta ba d2?";
    // }
    
         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST["subject"];
    $mail->Body    = "Dear Patient,
        <br>
        <br>
        You may now look to the attached file of your result in PDF format.
        <br>
        <br>
        For any question/classification, please contact us at 0917-626-0911 for Globe and 0943-727-8378 for Smart or send us an email at questphil.corpresult@gmail.com

        <br>
        <br>
        Thank you for your concern!
        <br>
        <br>
        Yours truly,
        <br>
        <br>
        <br>
        Quest Diagnostics Team.";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message sending ';
    $subLog = $_POST["subject"];
    $fileFinal = "";
   if (isset($fileLog)) {
   	 	for ($cc=0; $cc < count($fileLog); $cc++) { 
   	 		if ($cc == 0) {
   	 			$fileFinal =  $fileLog[0];
   	 		}else{
   	 			$fileFinal =  $fileFinal. " ,". $fileLog[$cc];
   	 		}
   	 		}
   	 		$newEmail->insertEmail($_POST['recipient'], $subLog, $fileFinal );
   		}
   if (isset($recLog[0])) {
   	$fileFinal = "";
   	for ($q=0; $q < count($recLog); $q++) { 
   	if (is_array($fileLog)) {
   	for ($cc=0; $cc < count($fileLog); $cc++) { 
   	 		if ($cc == 0) {
   	 			$fileFinal =  $fileLog[$cc];
   	 		}else{
   	 			$fileFinal =  $fileFinal. " ,". $fileLog[$cc];
   	 		}
   	 	}
   	 		$newEmail->insertEmail($recLog[$q], $subLog, $fileFinal );
   	}
   	else{
   		$newEmail->insertEmail($recLog[$q], $subLog, $_FILES["file"]["name"] );
   	}

   }
 }
 // fclose($_POST('subject').".zip");
 $deleteThis = $_POST['subject'].".zip";
 unlink($deleteThis);
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


?> 