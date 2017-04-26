<?php
require_once('coins.php');
$wallet = new jsonRPCClient('http://' . $ion['user'] . ':' . $ion['pass'] . '@127.0.0.1:' . $ion['port']);
$info   = $address = $datapack = [];
if (isset($wallet)) {
	try {
		$info = $wallet->getinfo();
	}
	catch (Exception $e) {
		$offline = true;
	}
//	echo "<script>console.log(" . json_encode($info, JSON_PRETTY_PRINT) . ")</script>";
	try {
		$address = $wallet->listaddressgroupings();
	}
	catch (Exception $e) {
		$offline = true;
	}
	try {
		$stakinginfo = $wallet->getstakinginfo();
	}
	catch (Exception $e) {
		$offline = true;
	}
	try {
		$listtransactions = $wallet->listtransactions();
	}
	catch (Exception $e) {
		$offline = true;
	}
//	echo "<script>console.log(" . json_encode($listtransactions, JSON_PRETTY_PRINT) . ")</script>";
	$mnl = file_get_contents('mndatapack.json');
//	echo "<script>console.log(" . $mnl . ")</script>";
	$datapack = json_decode($mnl, true);
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