
<div class="row bar">
	<div class="col-xs-6 bardata">
		<div class="bardatatitle">Ion Price</div>
		<div class="bardatadata">$<span class="green">
                    <?php
					if (isset($datapack['mnl']['currentUSDPrice']))
						echo number_format($datapack['mnl']['currentUSDPrice'], '2', '.', ',');
					?></span></div>
	</div>
	<div class="col-xs-6 bardataend">
		<div class="bardatatitle">Reward Drop</div>
		<div class="bardatadata"><span class="green"><?php
				if (isset($datapack['mnl']['daysTillRewardDrop'])) echo $datapack['mnl']['daysTillRewardDrop']['num']." ".$datapack['mnl']['daysTillRewardDrop']['name']; ?></span></div>
	</div>
</div>
<div class="row bar">
	<div class="col-xs-6 bardata">
		<div class="bardatatitle">Balance</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($datapack['info']['balance'])) echo number_format($datapack['info']['balance'], '8', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-6 bardataend">
		<div class="bardatatitle">Balance Value</div>
		<div class="bardatadata">$<span class="green"><?php if (isset($datapack['info']['balance']) and isset($datapack['mnl']['currentUSDPrice'])) echo number_format(($datapack['mnl']['currentUSDPrice'] * $datapack['info']['balance']), '2', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-6 bardata">
		<div class="bardatatitle">DarkBalance</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($datapack['info']['darksend_balance'])) echo number_format($datapack['info']['darksend_balance'], '8', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-6 bardataend">
		<div class="bardatatitle">DarkBalance Value</div>
		<div class="bardatadata">$<span class="green"><?php if (isset($datapack['info']['darksend_balance']) and isset($datapack['mnl']['currentUSDPrice'])) echo number_format(($datapack['mnl']['currentUSDPrice'] * $datapack['info']['darksend_balance']), '2', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-6 bardata">
		<div class="bardatatitle">Stake</div>
		<div class="bardatadata"><span class="green"><?php if (isset($datapack['info']['stake'])) echo number_format($datapack['info']['stake'], '8', '.', ','); ?></span></div>
	</div>
	<div class="col-xs-6 bardataend">
		<div class="bardatatitle">Time To Stake</div>
		<div class="bardatadata"><span class="green"><?php if (isset($datapack['stakinginfo']['dhm'])) echo $datapack['stakinginfo']['dhm']; ?></span></div>
	</div>
	<div class="col-xs-6 bardata">
		<div class="bardatatitle">Connections</div>
		<div class="bardatadata"><span class="green"><?php if (isset($datapack['info']['connections'])) echo $datapack['info']['connections']; ?></span></div>
	</div>
	<div class="col-xs-6 bardataend">
		<div class="bardatatitle">Blocks</div>
		<div class="bardatadata"><span class="green"><?php if (isset($datapack['info']['blocks'])) echo $datapack['info']['blocks']; ?></span></div>
	</div>
</div>
<hr>
<div class="row bar">
	<div class="col-xs-12 bardataend">
		<div class="bardatatitle">Main Address</div>
		<div class="bardatadata"><span class="orange"><?php if (isset($datapack['mainaddress'])) echo $datapack['mainaddress'];?></span></div>
	</div>
</div>