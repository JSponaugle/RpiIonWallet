<div class="row bar" style="text-align: center;">
    <div class="col-xs-2">
    </div>
    <div class="col-xs-4 bardata">
        <div class="bardatatitle">Ion Price</div>
        <div class="bardatadata">$<span class="green">
                    <?php
					if (isset($datapack['mnl']['currentUSDPrice']))
						echo number_format($datapack['mnl']['currentUSDPrice'], '2', '.', ',');
					?></span></div>
    </div>
    <div class="col-xs-4 bardataend">
        <div class="bardatatitle">Reward Drop</div>
        <div class="bardatadata"><span class="orange"><?php
				if (isset($datapack['mnl']['daysTillRewardDrop'])) echo $datapack['mnl']['daysTillRewardDrop']['num']." ".$datapack['mnl']['daysTillRewardDrop']['name']; ?></span></div>
    </div>
    <div class="col-xs-2">
    </div>
</div>
<div class="row bar" style="text-align: center;">
    <div class="col-xs-4 bardata">
        <div class="bardatatitle">Balance</div>
        <div class="bardatadata"><span class="orange"><?php if (isset($datapack['info']['balance'])) echo number_format($datapack['info']['balance'], '8', '.', ','); ?></span></div>
    </div>
    <div class="col-xs-4 bardata">
        <div class="bardatatitle">Balance(USD)</div>
        <div class="bardatadata">$<span class="green"><?php if (isset($datapack['info']['balance']) and isset($datapack['mnl']['currentUSDPrice'])) echo number_format(($datapack['mnl']['currentUSDPrice'] * $datapack['info']['balance']), '2', '.', ','); ?></span></div>
    </div>
    <div class="col-xs-4 bardataend">
        <div class="bardatatitle">Connections</div>
        <div class="bardatadata"><span class="orange"><?php if (isset($datapack['info']['connections'])) echo $datapack['info']['connections']; ?></span></div>
    </div>
    <div class="col-xs-4 bardata">
        <div class="bardatatitle">DarkBalance</div>
        <div class="bardatadata"><span class="orange"><?php if (isset($datapack['info']['darksend_balance'])) echo number_format($datapack['info']['darksend_balance'], '8', '.', ','); ?></span></div>
    </div>
    <div class="col-xs-4 bardata">
        <div class="bardatatitle">DarkBalance(USD)</div>
        <div class="bardatadata">$<span class="green"><?php if (isset($datapack['info']['darksend_balance']) and isset($datapack['mnl']['currentUSDPrice'])) echo number_format(($datapack['mnl']['currentUSDPrice'] * $datapack['info']['darksend_balance']), '2', '.', ','); ?></span></div>
    </div>
    <div class="col-xs-4 bardataend">
        <div class="bardatatitle">Blocks</div>
        <div class="bardatadata"><span class="orange"><?php if (isset($datapack['info']['blocks'])) echo $datapack['info']['blocks']; ?></span></div>
    </div>
</div>
<div class="row bar" style="text-align: center;">
    <div class="col-xs-2">
    </div>
    <div class="col-xs-4 bardata">
        <div class="bardatatitle">Stake</div>
        <div class="bardatadata"><span class="orange"><?php if (isset($datapack['info']['stake'])) echo number_format($datapack['info']['stake'], '8', '.', ','); ?></span></div>
    </div>
    <div class="col-xs-4 bardataend">
        <div class="bardatatitle">Time To Stake</div>
        <div class="bardatadata"><span class="green"><?php if (isset($datapack['stakinginfo']['dhm'])) echo $datapack['stakinginfo']['dhm']; ?></span></div>
    </div>
    <div class="col-xs-2">
    </div>
</div>
<div class="row bar" style="text-align: center;">
    <div class="col-xs-12 bardataend">
        <div class="bardatatitle">Last Transaction</div>
        <div class="bardatadata"><span class="orange"><?php if (isset($datapack['listtransactions'])) {
					$total = count($datapack['listtransactions']) - 1;
					$last  = $datapack['listtransactions'][$total];
					?>
                    ION: <span class="green"><?php echo number_format($last['amount'], '8', '.', ','); ?></span>
                    <span class="orange">Conf: </span><span class="green"><?php echo $last['confirmations']; ?></span>
                    <span class="orange">Time: </span><span class="green"><?php echo date('Y-m-d H:i:s', $last['timereceived']); ?></span>
					<?php
				} ?></span></div>
    </div>
    <div class="col-xs-12 bardataend">
        <div class="bardatatitle">Main Address</div>
        <div class="bardatadata"><span class="orange"><?php if (isset($datapack['address'][0]) and isset($datapack['address'][0][0])) {
					$count = count($datapack['address'][0]);
					$final = $count - 1;
					echo $datapack['address'][0][$final][0];
				} ?>
            </span></div>
    </div>
</div>