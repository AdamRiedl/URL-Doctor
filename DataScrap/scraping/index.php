<?php


use GuzzleHttp\Client;

require 'vendor/autoload.php';

//$term = "Baroko";

$url = "https://www.plus500.com/cs/Instruments/CL";


//i can use guzzle POST method if i must do some sort of FORM first
$client = new Client();
// go get data from URL
$response = $client->request('GET', $url);
$html = (string)$response->getBody();

libxml_use_internal_errors(true);
//print_r($html);

$doc = new DOMDocument();
$doc->loadHTML($html);

$xpath = new DOMXPath($doc);

$links = $xpath->evaluate('//div[@class="row"]//div[@class="small-12 medium-5 large-6 columns inst-details"]//div//p[@class="tittle-price"//span[@class="rate"]]');



// do SOMETHING with the data




