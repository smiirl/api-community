<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Replace "APP ID" and "CHARITYPAGE"

$url = 'https://api.justgiving.com/APP ID/v1/fundraising/pages/page/CHARITYPAGE';

$xmlData = file_get_contents($url);

if ($xmlData === false) {
    echo 'Error in file_get_contents: ' . error_get_last()['message'];
    exit();
}

$document = new SimpleXMLElement($xmlData);

// Access grandTotalRaisedExcludingGiftAid value
$grandTotalRaisedExcludingGiftAid = (string) $document->grandTotalRaisedExcludingGiftAid;

echo json_encode(["number" => $grandTotalRaisedExcludingGiftAid]);
?>
