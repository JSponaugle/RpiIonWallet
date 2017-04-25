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
//	echo "<script>console.log(" . json_encode($address, JSON_PRETTY_PRINT) . ")</script>";
	$mnl = file_get_contents('mndatapack.json');
//	echo "<script>console.log(" . $mnl . ")</script>";
	$datapack = json_decode($mnl, true);
} else {
	$offline = true;
}
?>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ionomy Rpi Wallet</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js" integrity="sha256-jYMHiFJgIHHSIyPp1uwI5iv5dYgQZIxaQ4RwnpEeEDQ=" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="/css/custom.css?ts={!! strtotime('-1 hour') !!}" rel="stylesheet" type="text/css">
    <link href="/css/li.css?ts={!! strtotime('-1 hour') !!}" rel="stylesheet" type="text/css">
</head>
<meta http-equiv="refresh" content="5">
<body>
batman
<div class="container-fluid">
	<?php
	if ($offline == true) {
		?>
    <div class="row bar">
        <div class="col-xs-12 green" style="font-size: 35pt; font-weight: 800; color: red;">
        IOND is offline Please Restart it
        </div>
    </div>
		<?php
	} else {
		?>
        <div class="row bar">
            <div class="col-xs-6 bardata">
                <div class="bardatatitle">Ion Price</div>
                <div class="bardatadata">$<span class="green">
                    <?php
					if (isset($datapack['currentUSDPrice']))
						echo number_format($datapack['currentUSDPrice'], '2', '.', ',');
					?></span></div>
            </div>
            <div class="col-xs-6 bardataend">
                <div class="bardatatitle">Reward Drop</div>
                <div class="bardatadata"><span class="green"><?php
						if (isset($datapack['daysTillRewardDrop'])) echo $datapack['daysTillRewardDrop']; ?></span></div>
            </div>
        </div>
        <div class="row bar">
            <div class="col-xs-6 bardata">
                <div class="bardatatitle">Balance</div>
                <div class="bardatadata"><span class="orange"><?php if (isset($info['balance'])) echo number_format($info['balance'], '8', '.', ','); ?></span></div>
            </div>
            <div class="col-xs-6 bardataend">
                <div class="bardatatitle">Balance Value</div>
                <div class="bardatadata">$<span class="green"><?php if (isset($info['balance']) and isset($datapack['currentUSDPrice'])) echo number_format(($datapack['currentUSDPrice'] * $info['balance']), '2', '.', ','); ?></span></div>
            </div>
            <div class="col-xs-6 bardata">
                <div class="bardatatitle">DarkBalance</div>
                <div class="bardatadata"><span class="orange"><?php if (isset($info['darksend_balance'])) echo number_format($info['darksend_balance'], '8', '.', ','); ?></span></div>
            </div>
            <div class="col-xs-6 bardataend">
                <div class="bardatatitle">DarkBalance Value</div>
                <div class="bardatadata">$<span class="green"><?php if (isset($info['darksend_balance']) and isset($datapack['currentUSDPrice'])) echo number_format(($datapack['currentUSDPrice'] * $info['darksend_balance']), '2', '.', ','); ?></span></div>
            </div>
            <div class="col-xs-6 bardata">
                <div class="bardatatitle">Stake</div>
                <div class="bardatadata"><span class="green"><?php if (isset($info['stake'])) echo number_format($info['stake'], '8', '.', ','); ?></span></div>
            </div>
            <div class="col-xs-6 bardataend">
                <div class="bardatatitle">Connections</div>
                <div class="bardatadata"><span class="green"><?php if (isset($info['connections'])) echo $info['connections']; ?></span></div>
            </div>
            <div class="col-xs-6 bardataend">
                <div class="bardatatitle">Blocks</div>
                <div class="bardatadata"><span class="green"><?php if (isset($info['blocks'])) echo $info['blocks']; ?></span></div>
            </div>
            <div class="col-xs-6 bardataend">
            </div>
        </div>
        <hr>
        <div class="row bar">
            <div class="col-xs-12 bardataend">
                <div class="bardatatitle">Main Address</div>
                <div class="bardatadata"><span class="orange"><?php if (isset($address[0]) and isset($address[0][0]) and isset($address[0][0][0])) echo $address[0][0][0]; ?></span></div>
            </div>
        </div>
	<?php } ?>
</body>
</html>