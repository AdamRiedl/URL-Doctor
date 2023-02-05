<?php
// Your API Key.
$key = 'StFdmKnRXwUUxoe3T069mQREhpFDEGcu';

// The email you wish to validate.
$email = 'noreply@ipqualityscore.com';

/*
* Set the maximum number of seconds to wait for a reply
* from an email service provider. If speed is not a concern
* or you want higher accuracy we recommend setting this in
* the 20 - 40 second range in some cases. Any results which
* experience a connection timeout will return the "timed_out"
* variable as true. Default value is 7 seconds.
*/
$timeout = 1;

/*
* If speed is your major concern set this to true,
* but results will be less accurate.
*/
$fast = 'false';

/*
* Adjusts abusive email patterns and detection rates
* higher levels may cause false-positives (0-2)
*/
$abuse_strictness = 0;

// Create parameters array.
$parameters = array(
  'timeout' => $timeout,
  'fast' => $fast,
  'abuse_strictness' => $abuse_strictness
);

// Format our parameters.
$formatted_parameters = http_build_query($parameters);

// Create the API URL.
// URL Encode the Email Address.
$url = sprintf(
  'https://www.ipqualityscore.com/api/json/email/%s/%s?%s',
  $key,
  urlencode($email),
  $formatted_parameters
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);

$json = curl_exec($curl);
curl_close($curl);

// Decode the result into an array.
$result = json_decode($json, true);

// Check to see if our query was successful.
if (isset($result['success']) && $result['success'] === true) {
  echo(json_encode($result));
} else {
  header("Location: ../html/404.html");
}
