<section class="content-header">
		<h1>Syllabus</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Syllabus</li>
		</ol>
		
	</section>
	
	 <section class="content">
	 
		<div class="row">
		
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header ui-sortable-handle" style="cursor: move;">
						<h3 class="box-title">Syllabus</h3>
						<!-- tools box -->
						
						<!-- /. tools -->
					</div>
					<?= $this->Form->create($syllabus,['id'=>'classForm']) ?>
					<input type="hidden" class="form-control" name="id" id="id" placeholder="Class Name" required value="<?php echo @$syllabus->id?>"> 
					
						<div class="box-body">
							<div class="form-group">
								<label class="control-label">Syllabus Class</label>
								<?php echo $this->Form->input('master_class_id', ['empty' => "--Select--",'options'=>$masterclasses,'label' => false,'class' => 'form-control  master_class_id','required','value'=>@$syllabus->master_class_id]); ?> 
								<label class="error" for="master-class-id"></label>
							</div>
							<div class="form-group" id='section_div'>
								<label class="control-label">Syllabus Section</label>
								<?php echo $this->Form->input('aa', ['empty' => "--Select--",'options'=>'','label' => false,'class' => 'form-control','required']); ?> 
								<label class="error" for="master-section-id"></label>
							</div>
							<div class="form-group" id='subject_div'>
								<label class="control-label">Syllabus Subject</label>
								<?php echo $this->Form->input('master_subject_id', ['empty' => "--Select--",'options'=>'','label' => false,'class' => 'form-control  master_subject_id','required','value'=>@$syllabus->master_subject_id]); ?> 
								<label class="error" for="master-subject-id"></label>
							</div>
							<div class="form-group">
								<label class="control-label">Syllabus Url</label>
								<?php echo $this->Form->input('syllabus_url', ['type'=>'file','label' => false,'class' => 'form-control ','required','value'=>@$syllabus->syllabus_url]); ?> 
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
					  <h3 class="box-title">Syllabus</h3>
					  <div class="pull-right box-tools">
							<a href="<?php echo $this->url->build(['action'=>'index']) ?>"><button class="btn btn-sm bg-red"><i class="fa fa-plus"></i> Add</button></a>
						</div>
					</div>
					 <div class="box-body">
						<table id="classdata" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th class="text-center">Class</th>
									<th class="text-center">Section</th>
									<th class="text-center">Subject</th>
									<th class="text-center">Url</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;foreach($Syllabuses as $syllabuse){ ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td class="text-center"><?php echo $syllabuse->master_class->class_name; ?></td>
										<td class="text-center"><?php echo $syllabuse->master_section->section_name; ?></td>
										<td class="text-center"><?php echo $syllabuse->master_subject->subject_name; ?></td>
										<td class="text-center"><?php echo $syllabuse->syllabus_url; ?></td>
										
										<td class="text-center">
											<a href="<?php echo $this->url->build(['action'=>'index',$syllabuse->id]); ?>"><button class="btn btn-sm bg-olive"><i class="fa fa-pencil"></i></button> </a><a data-original-title="Delete" onclick="return confirm('Are you sure you want to delete?')" href="<?php echo $this->url->build(['action'=>'delete',$syllabuse->id]); ?>"><button class="btn btn-sm bg-red "><i class="fa fa-trash"></i></button> </a>
										</td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table>	
				</div>	
			</div>
		</div>
	</div>	
</section>
 	<input type="hidden" class="sectionGet" value="<?php echo $this->Url->build(['controller'=>'ClassSectionMappings','action'=>'getSectionLists']); ?>">
 	<input type="hidden" class="subjectGet" value="<?php echo $this->Url->build(['controller'=>'ClassSectionMappings','action'=>'getSubjectLists']); ?>">
	<?php echo $this->html->css('/plugins/datatables/dataTables.bootstrap.css', ['block' => 'PAGE_LEVEL_PLUGINS_CSS']); ?> 
	<?php echo $this->html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/datatables/jquery.dataTables.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/datatables/dataTables.bootstrap.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/select2/select2.full.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php  $js="
		$(document).ready(function(){
			$('#classdata').DataTable();
			$('.master_class_id').select2();
			
			
			$('#classForm').validate({
				rules:{
					title:{
						required:true,
					}
				},
				messages:{
					title:{
						required: 'title is required',
					}
				}
			});
			////
			
			$('.alert').fadeOut(5000);
			/////
			$('select[name=master_class_id]').on('change',function() {
				if($(this).val())
				{
					$('#section_div').html('Loading...');
					var master_class_id=$('select[name=master_class_id] option:selected').val();
					var url = $('.sectionGet').val();
					url=url+'/'+master_class_id; alert(url);
						$.ajax({
							url: url,
							type: 'GET',
						}).done(function(response) {alert(response);
							$('#section_div').html(response);
							$('select[name=master_section_id]').select2();
						});
				}
			});
			/////
			$('#master-section-id').on('change',function() { alert();
				if($(this).val())
				{
					$('#subject_div').html('<i style= margin-top: 32px;margin-left: 65px; class=fa fa-refresh fa-spin fa-1x fa-fw></i><b> Loading... </b>');
					var master_class_id=$('select[name=master_class_id] option:selected').val();
					var master_section_id=$('select[name=master_section_id] option:selected').val();
					var urls = $('.subjectGet').val();
					urls=urls+'/'+master_class_id+'/'+master_section_id; alert(urls);
						$.ajax({
							url: urls,
							type: 'GET',
						}).done(function(response) {alert(response);
							$('#subject_div').html(response);
							$('select[name=master_section_id]').select2();
						});
				}
			});
		});	
		";
	echo $this->html->scriptBlock($js, ['block' => 'scriptBottom']); ?>	