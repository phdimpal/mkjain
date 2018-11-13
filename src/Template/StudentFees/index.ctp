<section class="content-header">
		<h1>Student Fees</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Student Fees</li>
		</ol>
		
	</section>
	
	 <section class="content">
	 
		<div class="row">
		
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header ui-sortable-handle" style="cursor: move;">
						<h3 class="box-title">Student Fees</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
						</div>
						<!-- /. tools -->
					</div>
					<?= $this->Form->create($studentFees,['id'=>'classForm','type'=>'file']) ?>
					<input type="hidden" class="form-control" name="id" id="id" placeholder="Class Name" required value="<?php echo @$studentFees->id?>"> 
						<div class="box-body">
								<div class="form-group text-center">
								 <?php echo $this->Html->link('Download Sample','/img/fee_sample.csv',['escape'=>false, 'class'=>'btn  btn-purple','id'=>'download_sample']); ?> 
								</div>
								<div class="form-group">
									<input type="file" class="form-control" name="excel_url" id="excel_url" > 
								</div>
								
						</div>
						<div class="box-footer clearfix">
						  <button type="submit" class="pull-right btn btn-danger" id="sendEmail">Save
							<i class="fa fa-arrow-circle-right"></i></button>
						</div>
					<?= $this->Form->end() ?>
				</div>
			</div>
			
	</div>	
</section>
 	<input type="hidden" class="classValidate" value="<?php echo $this->Url->build(['controller'=>'MasterSections','action'=>'checkSectionNames']); ?>">
	<?php echo $this->Html->css('/plugins/datatables/dataTables.bootstrap.css', ['block' => 'PAGE_LEVEL_PLUGINS_CSS']); ?> 
	<?php echo $this->Html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->Html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/datatables/jquery.dataTables.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/datatables/dataTables.bootstrap.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php  $js="
		$(document).ready(function(){
			$('#classdata').DataTable();
			jQuery.validator.addMethod('alphabetsAndSpacesOnly', function (value, element) {
			return this.optional(element) || /^[a-zA-Z\s]+$/.test(value); });

			var classValidate = $('.classValidate').val();
			$('#classForm').validate({
				rules:{
					section_name:{
						required:true,
						
						remote :{
                        url:classValidate,
                        type:'post',
                        data:{
								id: function()
								{
									return $('input[name=id]').val();
								}
							}
						}
					}
				},
				messages:{
					section_name:{
						required: 'Section Name is required',
						
						remote:'Section Name already exists'	
					}
				}
			});
			////
			
		$('.alert').fadeOut(5000);
	
		});	
		";
	echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>	