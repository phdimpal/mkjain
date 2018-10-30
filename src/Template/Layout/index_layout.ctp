
<!DOCTYPE html>
<html>
<head>
	<?= $this->element('style_layout');?>
</head>	
<body class="fixed sidebar-mini skin-red-light">
	<div class="wrapper">
		<?= $this->element('header');?>
		<?= $this->element('sidebar');?>
		<div class="content-wrapper">
		<?php echo $this->fetch('content'); ?>
		</div>
		<?= $this->element('footer');?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?= $this->element('script_layout');?>
</body>
</html>
