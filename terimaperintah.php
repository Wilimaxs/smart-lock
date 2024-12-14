<?php
header('Content-Type: application/json; charset=utf-8');

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$device = $data['device'];
$sender = $data['sender'];
$message = $data['message'];
$member= $data['member']; //group member who send the message
$name = $data['name'];

function sendFonnte($target, $data) {
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.fonnte.com/send",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => array(
	    	'target' => $target,
	    	'message' => $data['message'],
	    	'url' => $data['url'],
	    	'filename' => $data['filename'],
	    ),
	  CURLOPT_HTTPHEADER => array(
	    "Authorization:JmP3DTyC2_ec6JmoW4gm"
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);

	return $response;
}

if ( $message == "hidupkan" ) {

include"hidupkan.php";

	$reply = [
		"message" => "lampu sudah dihidupkan",
	];
} 

else if ( $message == "matikan" ) {

include"matikan.php";

	$reply = [
		"message" => "lampu sudah dimatikan",
	];
} 

sendFonnte($sender, $reply);

?>