<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Replace CHANNEL_ID and API_KEY

$channelId = "CHANNEL_ID";
$apiKey = "API_KEY";
$apiResponse = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channelId.'&fields=items/statistics/subscriberCount&key='.$apiKey);
$decodedResponse = json_decode($apiResponse, true);
$counterNumber = $decodedResponse['items'][0]['statistics']['subscriberCount'];
//echo $counterNumber;

echo json_encode(["number"=> $counterNumber]);




