<?php

$user_agent = "lmgtfy/1.0 (https://github.com/kenibarwick/lmgtfy; kenibarwick@gmail.com)";
$command = $_POST['command'];
$search = $_POST['text'];
$token = $_POST['token'];

if($token != 'dMhNdMFR1atYtBLjIZ8iP3ty'){ 
    $msg = "The token for the slash command doesn't match. Check your script.";
    die($msg);
    echo $msg;
}
$url_to_check = "http://lmgtfy.com/?q=".$search;

// As we are only needing to create the URL for now... 
// But later to shorten the url you can use - https://developers.google.com/url-shortener/v1/getting_started
// curl https://www.googleapis.com/urlshortener/v1/url \
//  -H 'Content-Type: application/json' \
//  -d '{"longUrl": "http://www.google.com/"}'

// $ch = curl_init($url_to_check);
// curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json")); 
// curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $ch_response = curl_exec($ch);
// curl_close($ch);
// $response_array = json_decode($ch_response, TRUE);
// $response_array['id']
// $response_array['status_code']

if($ch_response === FALSE){

  # isitup.org could not be reached 
  $reply = "The world is dying as Google could not be reached.";

} else {

		// $reply = "Have a look here for your answer ".$response_array["$url_to_check"];
		$reply = "Have a look here for your answer: *<".$url_to_check.">.*";
		}

echo $reply;
?>