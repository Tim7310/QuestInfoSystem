<?php
$ch = curl_init();
$parameters = array(
    'apikey' => 'bdea9505298bfc2cafc94e446eb2275f', //Your API KEY
    'number' => '09474548257',
    'message' => 'I just sent my first message with Semaphore'

);
curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
curl_setopt( $ch, CURLOPT_POST, 1 );

//Send the parameters set above with the request
curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

// Receive response from server
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close ($ch);

//Show the server response
echo $output;

?>