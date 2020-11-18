<?php
//echo "here";
$rate=$_GET['rate'];
$name=$_GET['guest_name'];
		$phone=$_GET['guest_phone'];
		//$address=$_POST['guest_address'];
		//$phone=$_POST['guest_phone'];
		$email=$_GET['guest_email'];  
		
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:370cbffa319c8f95e344441b2aaa97a2",
                  "X-Auth-Token:090c9d28bab3c36447e02a4714954de1"));
$payload = Array(
    'purpose' => 'Hotel Room Booking',
    'amount' => $rate,
    'phone' => $phone,
    'buyer_name' => $name,
    'redirect_url' => 'http://www.innstay.esy.es/payment_success.php',
    'send_email' => true,
    'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => $email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$json_array=json_decode($response,true);
//echo $response."<br>";
//print_r($json_array);
$url=$json_array['payment_request']['longurl'];
header('Location:'.$url);
?>