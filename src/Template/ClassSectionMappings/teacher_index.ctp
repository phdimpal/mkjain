<section class="content-header">
		<h1>Teacher Mapping </h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Teacher Mapping</li>
		</ol>
		
	</section>
	
	 <section class="content">
	 
		<div class="row">
		
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header ui-sortable-handle" style="cursor: move;">
						<h3 class="box-title">Teacher Mapping</h3>
						<!-- tools box -->
						
						<!-- /. tools -->
					</div>
					<?= $this->Form->create($classsectionmapping,['id'=>'classForm']) ?>
					<input type="hidden" class="form-control" name="id" id="id" placeholder="Class Name" required value="<?php echo @$classsectionmapping->id?>"> 
						<div class="box-body">
							<div class="form-group">
								<label>Classes</label>
								<?php echo $this->Form->input('master_class_id', ['empty' => "--Select--",'options'=>$master_class,'label' => false,'class' => 'form-control  master_class_id','required','value'=>@$classsectionmapping->master_class_id]); ?> 
								<label class="error" for="master-class-id"></label>
							</div> 
							<div class="form-group">
								<label>Sections</label>
								<?php echo $this->Form->input('master_section_id', ['empty' => "--Select--",'options'=>$master_sections,'label' => false,'class' => 'form-control  master_section_id','required','value'=>@$classsectionmapping->master_section_id]); ?> 
								<label for="master-section-id" class="error"></label>
							</div>
							<div class="form-group">
								<label>Teacher</label>
								<?php echo $this->Form->input('teacher_id', ['empty' => "--Select--",'options'=>$master_teacher,'label' => false,'class' => 'form-control input-sm teacher_id','value'=>@$classsectionmapping->teacher_id]); ?> 
							</div>
						</div>
						<div class="box-footer clearfix">
						  <button type="submit" class="pull-right btn btn-danger" id="sendEmail">Save
							<i class="fa fa-arrow-circle-right"></i></button>
						</div>
					<?= $this->Form->end() ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header">
					  <h3 class="box-title">Teacher Mapping</h3>
					  <div class="pull-right box-tools">
							<a href="<?php echo $this->url->build(['action'=>'index']) ?>"><button class="btn btn-sm bg-red"><i class="fa fa-plus"></i> Add</button></a>
						</div>
					</div>
					 <div class="box-body">
						<table id="classdata" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th class="text-center">Class </th>
									<th class="text-center">Section </th>
									<th class="text-center">Teacher </th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;foreach($ClassSectionMappings as $ClassSectionMapping){ 
									if(!empty($ClassSectionMapping->registration)){
								?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td class="text-center"><?php echo $ClassSectionMapping->master_class->class_name; ?></td>
										<td class="text-center"><?php echo $ClassSectionMapping->master_section->section_name; ?></td>
										<td class="text-center"><?php echo $ClassSectionMapping->registration->name; ?></td>
										<td class="text-center">
											<a href="<?php echo $this->url->build(['action'=>'teacherIndex',$ClassSectionMapping->id]); ?>"><button class="btn btn-sm bg-olive"><i class="fa fa-pencil"></i></button> </a><a data-original-title="Delete" onclick="return confirm('Are you sure you want to delete?')" href="<?php echo $this->url->build(['action'=>'delete',$ClassSectionMapping->id]); ?>"><button class="btn btn-sm bg-red "><i class="fa fa-trash"></i></button> </a>
										</td>
									</tr>
								<?php }} ?>
								
							</tbody>
						</table>	
				</div>	
			</div>
		</div>
	</div>	
</section>
 	<input type="hidden" class="classValidate" value="<?php echo $this->Url->build(['controller'=>'MasterSubjects','action'=>'checkSubjectsNames']); ?>">
	<?php echo $this->Html->css('/plugins/datatables/dataTables.bootstrap.css', ['block' => 'PAGE_LEVEL_PLUGINS_CSS']); ?> 
	<?php echo $this->Html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->Html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/datatables/jquery.dataTables.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/datatables/dataTables.bootstrap.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	
	<?php echo $this->Html->script('/plugins/select2/select2.full.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	
	<?php  $js="
		$(document).ready(function(){
			$('.master_class_id').select2();
			$('.master_section_id').select2();
			$('.teacher_id').select2();
			$('#classdata').DataTable();
			jQuery.validator.addMethod('alphabetsAndSpacesOnly', function (value, element) {
			return this.optional(element) || /^[a-zA-Z\s]+$/.test(value); });

			var classValidate = $('.classValidate').val();
			$('#classForm').validate({
				rules:{
					
				},
				messages:{
					
				}
			});
			////
			
		$('.alert').fadeOut(5000);
	
		});	
		";
	echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>	