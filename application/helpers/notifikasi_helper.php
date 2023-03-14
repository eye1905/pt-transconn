<?php

function kirim_notifikasi($registration_ids)
{
	$url = "https://fcm.googleapis.com/fcm/send";
	
	$token = json_encode($registration_ids);
	
	$serverKey = 'AAAAtkSUZ14:APA91bFSgsLfyCvUvvgkYt6fy6HOyq4qP-LITCe2IkdOw8jgmCaT7IuZXOzkuj4vtr6Ul8vfs6oU3c2smXxza8zvv7sx2e-Qqjvv_PAs9XNZCQiAH40RYCBARcZprSPD0Qlu8zo69T_A';
	$title = "Pemberitahuan";
	$body = "Ada Booking Baru";
	$notification = array(
		'title' =>$title , 
		'body' => $body, 
		'icon' => "https://313express.com/images/logo-color.png",
		'sound' => 'default', 
		'badge' => '1');

	for ($i=0; $i <count($registration_ids) ; $i++) { 
		$arrayToSend = array(
			'to' => $registration_ids[$i], 
			'notification' => $notification,
			'priority'=>'high'
		);
		$json = json_encode($arrayToSend);
		$headers = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Authorization: key='. $serverKey;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
			//Send the request
		$response = curl_exec($ch);
	}


		//Close request
	if ($response === FALSE) {
		die('FCM Send Error: ' . curl_error($ch));
	}else{
		echo "OK";
	}
	curl_close($ch);
}
?>
