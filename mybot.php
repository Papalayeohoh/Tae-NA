﻿<?php
$access_token = '38R1r4QqPSuMtfVPC6BP6EH09peYayuRZCPUFZtWr/KDVgjgt6qjbO0VWw8QRi3NK8zRg6d+TvMarKHpLB0i77kP3hFwO/NXEiJ8yIGrmlpLPZOSdBV/LrA3GFxYWFZUIQ4SUxNHDqrGNrkmWl0uCAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			if($text == 'hello'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'สวัสดีวัยรุ่น'
				];
			}
			else if($text == 'test'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'ทดสอบๆ'
				];
			}
		else if($text == 'love'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'ฉันก็รักเธอเหมือนกัน'
				];
			}
			else if($text == 'ok'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'ฉันรู้ว่าคุณต้องโอเคกับมัน'
				];
			}
			
			
			
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>
