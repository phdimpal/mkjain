<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MK JAIN | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php echo $this->Html->css([
			'/bootstrap/css/bootstrap.min.css',
			'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
			'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
			'/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
			'/dist/css/AdminLTE.min.css',
			'/plugins/iCheck/square/blue.css'
	]);?>
 
</head>
<body class="hold-transition login-page">
	<?php echo $this->fetch('content'); ?>
<?php echo $this->Html->script([
			'/plugins/jQuery/jquery-2.2.3.min.js',
			'/bootstrap/js/bootstrap.min.js',
			'/plugins/iCheck/icheck.min.js'
	]);?>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
