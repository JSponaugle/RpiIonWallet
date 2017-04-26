<?php
require_once('coins.php');
$wallet = new jsonRPCClient('http://' . $ion['user'] . ':' . $ion['pass'] . '@127.0.0.1:' . $ion['port']);
$datapack = [];
$piview = 1;
if (isset($wallet)) {
	$mnl = file_get_contents('mndatapack.json');
	$datapack = json_decode($mnl, true);
	try {
		$datapack['info'] = $wallet->getinfo();
	}
	catch (Exception $e) {
		$offline = true;
	}
//	echo "<script>console.log(" . json_encode($info, JSON_PRETTY_PRINT) . ")</script>";
	try {
		$datapack['address'] = $wallet->listaddressgroupings();
	}
	catch (Exception $e) {
		$offline = true;
	}
	try {
		$datapack['stakinginfo'] = $wallet->getstakinginfo();
	}
	catch (Exception $e) {
		$offline = true;
	}
	try {
		$datapack['listtransactions'] = $wallet->listtransactions();
	}
	catch (Exception $e) {
		$offline = true;
	}
//	echo "<script>console.log(" . json_encode($listtransactions, JSON_PRETTY_PRINT) . ")</script>";
} else {
	$offline = true;
}
function sectohms($ss) {
	$s = $ss%60;
	$m = floor(($ss%3600)/60);
	$h = floor(($ss%86400)/3600);
	$d = floor(($ss%2592000)/86400);
	$M = floor($ss/2592000);

	return "$d D, $h H, $m M";
}