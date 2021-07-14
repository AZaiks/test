<?php

$api_key = 'ТУТКЛЮЧ'; // АПИ КЛЮЧ

$click_id = $_POST['postback'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$goods_id = $_POST['potok'];
$country = $_POST['ru'];

$ip = $_SERVER['REMOTE_ADDR'];
$referer = 'google.com';

$date_time = date("d/m/Y") . ' ' . date("H:i:s");
$lead_status = '';

$post = array (
'name' => $name,
'phone' => $phone,
'channel' => $goods_id,
'country' => $country,
'ip' => $ip,
'referer' => $referer,
'data1' => $click_id
);

$ch = curl_init('https://api.kma.biz/lead/add');
curl_setopt( $ch, CURLOPT_HTTPHEADER,
array(
'Content-Type: application/x-www-form-urlencoded',
'Authorization: Bearer '.$api_key
)
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));


$response = json_decode(curl_exec($ch));
curl_close($ch);

header("Location:success.html");
exit;

?>
