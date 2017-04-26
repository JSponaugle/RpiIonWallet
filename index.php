<?php
require_once('core.php');
include('layout/header.php');
?>
    <meta http-equiv="refresh" content="15">
    <body>
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
                    <div class="bardatatitle">Time To Stake</div>
                    <div class="bardatadata"><span class="green"><?php if (isset($stakinginfo['expectedtime'])) echo sectohms($stakinginfo['expectedtime']); ?></span></div>
                </div>
                <div class="col-xs-6 bardata">
                    <div class="bardatatitle">Connections</div>
                    <div class="bardatadata"><span class="green"><?php if (isset($info['connections'])) echo $info['connections']; ?></span></div>
                </div>
                <div class="col-xs-6 bardataend">
                    <div class="bardatatitle">Blocks</div>
                    <div class="bardatadata"><span class="green"><?php if (isset($info['blocks'])) echo $info['blocks']; ?></span></div>
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
<?php
include('layout/footer.php');
?>