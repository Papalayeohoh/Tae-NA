<?php
$access_token = '38R1r4QqPSuMtfVPC6BP6EH09peYayuRZCPUFZtWr/KDVgjgt6qjbO0VWw8QRi3NK8zRg6d+TvMarKHpLB0i77kP3hFwO/NXEiJ8yIGrmlpLPZOSdBV/LrA3GFxYWFZUIQ4SUxNHDqrGNrkmWl0uCAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>