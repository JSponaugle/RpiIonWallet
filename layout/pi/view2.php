
<div class="row bar" style="text-align: center;">
	<div class="col-xs-2">
	</div>
	<div class="col-xs-4 bardata">
		<div class="bardatatitle">Ion Price</div>
		<div class="bardatadata">$<span class="green">
                    <?php
					if (isset($datapack['currentUSDPrice']))
						echo number_format($datapack['currentUSDPrice'], '2', '.', ',');
					?></span></div>
	</div>
	<div class="col-xs-4 bardataend">
		<div class="bardatatitle">Reward Drop</div>
		<div class="bardatadata"><span class="orange"><?php
				if (isset($datapack['daysTillRewardDrop'])) echo $datapack['daysTillRewardDrop']; ?></span></div>
	</div>
	<div class="col-xs-2">
	</div>
</div>
<div class="row bar" style="text-align: center;">
	<div class="col-xs-4 bardata">
		<div class="bardatatitle">Balance</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($info['balance'])) echo number_format($info['balance'], '8', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-4 bardata">
		<div class="bardatatitle">Balance(USD)</div>
		<div class="bardatadata">$<span class="green"><?php if (isset($info['balance']) and isset($datapack['currentUSDPrice'])) echo number_format(($datapack['currentUSDPrice'] * $info['balance']), '2', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-4 bardataend">
		<div class="bardatatitle">Connections</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($info['connections'])) echo $info['connections']; ?></span></div>
	</div>
	<div class="col-xs-4 bardata">
		<div class="bardatatitle">DarkBalance</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($info['darksend_balance'])) echo number_format($info['darksend_balance'], '8', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-4 bardata">
		<div class="bardatatitle">DarkBalance(USD)</div>
		<div class="bardatadata">$<span class="green"><?php if (isset($info['darksend_balance']) and isset($datapack['currentUSDPrice'])) echo number_format(($datapack['currentUSDPrice'] * $info['darksend_balance']), '2', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-4 bardataend">
		<div class="bardatatitle">Blocks</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($info['blocks'])) echo $info['blocks']; ?></span></div>
	</div>
</div>
<div class="row bar" style="text-align: center;">
	<div class="col-xs-2">
	</div>
	<div class="col-xs-4 bardata">
		<div class="bardatatitle">Stake</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($info['stake'])) echo number_format($info['stake'], '8', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-4 bardataend">
		<div class="bardatatitle">Time To Stake</div>
		<div class="bardatadata"><span class="green"><?php if (isset($stakinginfo['expectedtime'])) echo sectohms($stakinginfo['expectedtime']); ?></span></div>
	</div>
	<div class="col-xs-2">
	</div>
</div>
<div class="row bar" style="text-align: center;">
	<div class="col-xs-12 bardataend">
		<div class="bardatatitle">Last Transaction</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($listtransactions)) {
					$total = count($listtransactions) - 1;
					$last  = $listtransactions[$total];
					?>
					ION: <span class="green"><?php echo number_format($last['amount'], '8', '.', ','); ?></span>
					<span class="orange">Conf: </span><span class="green"><?php echo $last['confirmations']; ?></span>
					<span class="orange">Time: </span><span class="green"><?php echo date('Y-m-d H:i:s', $last['timereceived']); ?></span>
					<?php
				} ?></span></div>
	</div>
	<div class="col-xs-12 bardataend">
		<div class="bardatatitle">Main Address</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($address[0]) and isset($address[0][0]) and isset($address[0][0][0])) echo $address[0][0][0]; ?></span></div>
	</div>
</div>