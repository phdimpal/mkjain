
<!DOCTYPE html>
<html>
<head>
	<?= $this->element('style_layout');?>
	<?= $this->fetch('PAGE_LEVEL_PLUGINS_CSS')?>
	<style>
		.error{
			color:#dd4b39 !important;
		}
		.alert {
		    z-index: 99999 !important;
			position: absolute !important;
		}	
	</style>
</head>	
<body class="fixed sidebar-mini skin-red-light">

	<div class="wrapper">
		<?= $this->element('header');?>
		<?= $this->element('sidebar');?>
		
		<div class="content-wrapper" style="min-height: 600px;">
			<div class="row">
				<div class="col-md-4 pull-right">
					<div class="alert alert-success alert-dismissible show-success" style="display:none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							
					</div>
					<div class="alert alert-danger alert-dismissible show-danger" style="display:none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							
					</div>
				</div>	  
			</div>
		<?php echo $this->fetch('content'); ?>
		</div>
		<?= $this->element('footer');?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?= $this->element('script_layout');?>
	<?= $this->fetch('PAGE_LEVEL_PLUGINS_JS')?>
	<?= $this->fetch('scriptBottom')?>
</body>
</html>
