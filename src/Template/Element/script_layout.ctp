	<?php echo $this->Html->script([
					'/plugins/jQuery/jquery-2.2.3.min.js',
					'/bootstrap/js/bootstrap.min.js',
					'/plugins/fastclick/fastclick.js',
					'/dist/js/app.min.js',
					'/plugins/sparkline/jquery.sparkline.min.js',
					'/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
					'/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
					'/plugins/slimScroll/jquery.slimscroll.min.js',
					'/plugins/chartjs/Chart.min.js',
					'/dist/js/pages/dashboard2.js',
					'/dist/js/demo.js',
					'/plugins/datepicker/bootstrap-datepicker.js',
					'/plugins/editor.js'
	]);?>
<script>
 
	$('#datepicker').datepicker({
		autoclose: true
	});
	$(".txtEditor").Editor({
		'source':true,
		'togglescreen':false,
		'rm_format':false,
		'insert_img':false,
		});
</script>