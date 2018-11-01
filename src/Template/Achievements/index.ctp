<section class="content-header">
		<h1>Achievements</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Achievements</li>
		</ol>
		
	</section>
	
	 <section class="content">
	 
		<div class="row">
		
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header ui-sortable-handle" style="cursor: move;">
						<h3 class="box-title">Achievements</h3>
						<!-- tools box -->
						
						<!-- /. tools -->
					</div>
					<?= $this->Form->create($achievement,['id'=>'classForm']) ?>
					<input type="hidden" class="form-control" name="id" id="id" placeholder="Class Name" required value="<?php echo @$achievement->id?>"> 
					<?php $dates='00-00-0000';if(date('d-m-Y',strtotime(@$achievement->achivement_date)) != '00-00-0000' && date('d-m-Y',strtotime(@$achievement->achivement_date)) != '01-01-1970'){ 
					$dates = date('d-m-Y',strtotime(@$achievement->achivement_date));}else{ $dates = date('d-m-Y');} ?>
						<div class="box-body">
							<div class="row">
									<div class="col-md-6">	
										<div class="form-group">
											<label class="control-label">Achievements Years</label>
											<?php echo $this->Form->input('achivement_year', ['empty' => "--Select--",'options'=>$masteryears,'label' => false,'class' => 'form-control  achivement_year','required','value'=>@$achievement->achivement_year]); ?> 
											<label class="error" for="achivement-year"></label>
										</div>
									</div>
									<div class="col-md-6">										
										<div class="form-group">
											<label class="control-label">Achievements Student</label>
											<?php echo $this->Form->input('student_id', ['empty' => "--Select--",'options'=>$students,'label' => false,'class' => 'form-control  student_id','required','value'=>@$achievement->student_id]); ?> 
											<label class="error" for="student-id"></label>
										</div>
									</div>
								</div>			
								<div class="form-group">
									<label class="control-label">Achievements Description</label>
									<textarea name="achivement" id="achivement" class="form-control" required><?php echo @$achievement->achivement ?></textarea>	
								 
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Achievements Rank</label>
											<input type="text" class="form-control" name="achivement_rank" id="achivement_rank" placeholder="Rank" required value="<?php echo @$achievement->achivement_rank?>"> 
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Achievements Date</label>
											<input type="text" class="form-control" name="achivement_date" id="datepicker" placeholder="Achievements Date" required value="<?php echo date('d-m-Y',strtotime(@$dates))?>"> 
										</div>
									</div>	
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
					  <h3 class="box-title">Achievements</h3>
					  <div class="pull-right box-tools">
							<a href="<?php echo $this->url->build(['action'=>'index']) ?>"><button class="btn btn-sm bg-red"><i class="fa fa-plus"></i> Add</button></a>
						</div>
					</div>
					 <div class="box-body">
						<table id="classdata" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th class="text-center">Year</th>
									<th class="text-center">Student</th>
									<th class="text-center">Rank</th>
									<th class="text-center">Date</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;foreach($Achievements as $achievement){ ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td class="text-center"><?php echo $achievement->achivement_year; ?></td>
										<td class="text-center"><?php echo $achievement->registration->name; ?></td>
										<td class="text-center"><?php echo $achievement->achivement_rank; ?></td>
										<td class="text-center"><?php echo date('d-m-Y',strtotime($achievement->achivement_date)); ?></td>
										<td class="text-center">
											<a href="<?php echo $this->url->build(['action'=>'index',$achievement->id]); ?>"><button class="btn btn-sm bg-olive"><i class="fa fa-pencil"></i></button> </a><a data-original-title="Delete" onclick="return confirm('Are you sure you want to delete?')" href="<?php echo $this->url->build(['action'=>'delete',$achievement->id]); ?>"><button class="btn btn-sm bg-red "><i class="fa fa-trash"></i></button> </a>
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
 	<input type="hidden" class="classValidate" value="<?php echo $this->Url->build(['controller'=>'MasterCategories','action'=>'checkMasterCategoriesNames']); ?>">
	<?php echo $this->html->css('/plugins/datatables/dataTables.bootstrap.css', ['block' => 'PAGE_LEVEL_PLUGINS_CSS']); ?> 
	<?php echo $this->html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/datatables/jquery.dataTables.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/datatables/dataTables.bootstrap.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/select2/select2.full.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php  $js="
		$(document).ready(function(){
			$('#classdata').DataTable();
			$('.achivement_year').select2();
			$('.student_id').select2();
			
			var classValidate = $('.classValidate').val();
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
	
		});	
		";
	echo $this->html->scriptBlock($js, ['block' => 'scriptBottom']); ?>	