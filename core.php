<?php
require_once('coins.php');
$wallet = new jsonRPCClient('http://' . $ion['user'] . ':' . $ion['pass'] . '@127.0.0.1:' . $ion['port']);
$datapack = [];
$datapack['secret'] = sha1('username');
$piview = 1;
if (isset($wallet)) {
	$mnl = file_get_contents('mndatapack.json');
	$datapack['mnl'] = json_decode($mnl, true);
	try {
		$datapack['info'] = $wallet->getinfo();
	}
	catch (Exception $e) {
		$datapack['offline'] = true;
	}
//	echo "<script>console.log(" . json_encode($info, JSON_PRETTY_PRINT) . ")</script>";
	try {
		$datapack['address'] = $wallet->listaddressgroupings();
		if (isset($datapack['address'][0]) and isset($datapack['address'][0][0])) {
			$count = count($datapack['address'][0]);
			$final = $count - 1;
			$datapack['mainaddress'] = $datapack['address'][0][$final][0];
		}
	}
	catch (Exception $e) {
		$datapack['offline'] = true;
	}
	try {
		$datapack['stakinginfo'] = $wallet->getstakinginfo();
		$datapack['stakinginfo']['dhm'] = sectohms($datapack['stakinginfo']['expectedtime']);
	}
	catch (Exception $e) {
		$datapack['offline'] = true;
	}
	try {
		$datapack['listtransactions'] = $wallet->listtransactions();
	}
	catch (Exception $e) {
		$datapack['offline'] = true;
	}
//	echo "<script>console.log(" . json_encode($listtransactions, JSON_PRETTY_PRINT) . ")</script>";
} else {
	$datapack['offline'] = true;
}
$datapack['lastupdated'] = date('F j, Y, g:i a T');
file_put_contents('PushPack.json',json_encode($datapack,JSON_PRETTY_PRINT));

function sectohms($ss) {
	$s = $ss%60;
	$m = floor(($ss%3600)/60);
	$h = floor(($ss%86400)/3600);
	$d = floor(($ss%2592000)/86400);
	$M = floor($ss/2592000);

	return "$d D, $h H, $m M";
}