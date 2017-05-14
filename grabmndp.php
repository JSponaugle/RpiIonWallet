<?php
$url = "https://masternodes.ionomy.com/api/datapack";
$mnl = file_get_contents($url);
file_put_contents('/usr/share/nginx/www/mndatapack.json', $mnl);


$data_string = file_get_contents('/usr/share/nginx/www/PushPack.json');
$data = json_decode($data_string,true);
unset($data['mnl']);
$data_string = json_encode($data);
$ch = curl_init('https://masternodes.ionomy.com/rpinode/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				   'Content-Type: application/json',
				   'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($ch);