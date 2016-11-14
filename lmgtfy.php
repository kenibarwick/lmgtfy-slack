<?php

$user_agent = "lmgtfy/1.0 (https://github.com/kenibarwick/lmgtfy-slack; kenibarwick@gmail.com)";
$command = $_POST['command'];
$search = $_POST['text'];
$token = $_POST['token'];

if($token != 'dMhNdMFR1atYtBLjIZ8iP3ty'){ 
    $msg = "The token for the slash command doesn't match. Check your script.";
    die($msg);
    echo $msg;
}

$longUrl = "http://lmgtfy.com/?q=".$search;
$postData = array('longUrl' => $longUrl);
$jsonData = json_encode($postData);

$curlObj = curl_init();

curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyAqk5yBchMhkzTX8Q8_6Ryi-C8FmqwDAhU');
curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlObj, CURLOPT_HEADER, 0);
curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
curl_setopt($curlObj, CURLOPT_POST, 1);
curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

$response = curl_exec($curlObj);

// Change the response json string to object
$json = json_decode($response);

curl_close($curlObj);


if($ch_response === FALSE){

  # lmgtfy.org could not be reached 
  $reply = "The world is dying as Google could not be reached.";

} else {

		// $reply = "Have a look here for your answer ".$response_array["$url_to_check"];
		$reply = "You'll find your answer here: *<".$json->id.">.*";
		}

echo $reply;
?>
