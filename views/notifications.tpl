<?php if (@$resultSuccess != '') { ?>
	<div class="success"><?=$resultSuccess?></div>
<?php } ?>

<?php if (@$resultInfo != '') { ?>
	<div class="notification"><?=$resultInfo?></div>
<?php } ?>

<?php if (@$resultError != '') { ?>
	<div class="error"><?=$resultError?></div>
<?php } ?>