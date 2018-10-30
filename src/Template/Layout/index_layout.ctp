
<!DOCTYPE html>
<html>
<head>
	<?= $this->element('style_layout');?>
</head>	
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<?= $this->element('header');?>
 
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<?php echo $this->fetch('content'); ?>
  </div>
  <!-- /.content-wrapper -->
	<?= $this->element('footer');?>
  

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<?= $this->element('script_layout');?>
<!-- jQuery 2.2.3 -->

</body>
</html>
