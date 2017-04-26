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
            <div class="row bar" style="text-align: center;">
                <div class="col-xs-12 green" style="font-size: 35pt; font-weight: 800; color: red;">
                    IOND is offline Please Restart it
                </div>
            </div>
			<?php
		} else {
		    include('layout/pi/view'.$piview.'.php');
		} ?>
    </body>
<?php
include('layout/footer.php');
?>