<?php

use GuzzleHttp\Client;

require 'vendor/autoload.php';


// URL
$url = "https://www.plus500.com/csj";
$betterUrl = 'https://app.plus500.com/trade/all-popular';

//i can use guzzle POST method if i must do some sort of FORM first
$httpClient = new Client();
// go get data from URL
$response = $httpClient->request('GET', $url);
$html = (string)$response->getBody();
libxml_use_internal_errors(true);
print_r($html);
$doc = new DOMDocument();
$doc->loadHTML($html);
$xpath = new DOMXPath($doc);

$lowPrice = $xpath->evaluate('//div[@class="section-table-body win-repeater win-disposable ui-sortable ui-sortable-disabled"]//div[@class="instrument green-change selected"]//div[@class="sell"]');

foreach ($lowPrice as $key => $price){
    echo $price->textContent . ' @ '. $lowPrice[$key]->textContent.PHP_EOL;
}
