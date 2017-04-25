<?php
$url = "https://masternodes.ionomy.com/datapack";
$mnl = file_get_contents($url);
file_put_contents('mndatapack.json', $mnl);