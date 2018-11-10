<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-success alert-dismissible show-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?= $message ?>
</div>