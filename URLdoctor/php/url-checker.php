<?php


//this is just temporarily until there is input from User form
$URL = "https://www.google.com";
// Your API Key.

$key = 'StFdmKnRXwUUxoe3T069mQREhpFDEGcu';

/*
* URL to scan - URL Encoded in cURL function below.
*/

// Adjustable strictness level from 0 to 2. 0 is the least strict and recommended for most use cases. Higher strictness levels can increase false-positives.
$strictness = 1;

// Create parameters array.
$parameters = array(
  'strictness' => $strictness
);

// Format Parameters
$formatted_parameters = http_build_query($parameters);

// Create API URL
$url = sprintf(
  'https://www.ipqualityscore.com/api/json/url/%s/%s?%s',
  $key,
  urlencode($URL),
  $formatted_parameters
);

// Fetch The Result
$timeout = 5;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);

$json = curl_exec($curl);
curl_close($curl);

// Decode the result into an array.
$result = json_decode($json, true);

// Check to see if our query was successful, if yes json_encode the results that JS can read them.
if (isset($result['success']) || $result['success'] === true) {
  echo(json_encode($result));
} else {
  header("Location: ../html/404.html");

}





