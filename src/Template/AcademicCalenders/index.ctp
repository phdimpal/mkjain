<section class="content-header">
		<h1>Academic Calender</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Academic Calender</li>
		</ol>
		
	</section>
	
	 <section class="content">
	 
		<div class="row">
		
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header ui-sortable-handle" style="cursor: move;">
						<h3 class="box-title">Academic Calender</h3>
						<!-- tools box -->
						
						<!-- /. tools -->
					</div>
					<?= $this->Form->create($academiccalender,['id'=>'classForm']) ?>
					<input type="hidden" class="form-control" name="id" id="id" placeholder="Class Name" required value="<?php echo @$academiccalender->id?>"> 
<?php $dates='00-00-0000';if(date('d-m-Y',strtotime(@$academiccalender->calender_date)) != '00-00-0000' && date('d-m-Y',strtotime(@$academiccalender->calender_date)) != '01-01-1970'){ 
	$dates = date('d-m-Y',strtotime(@$academiccalender->calender_date));}else{ $dates = date('d-m-Y');} ?>
						<div class="box-body">
								
								<div class="form-group">
									<label class="control-label">Category</label>
									<?php echo $this->Form->input('master_category_id', ['empty' => "--Select--",'options'=>$mastercategories,'label' => false,'class' => 'form-control  master_category_id','required','value'=>@$classsectionmapping->mastercategories]); ?> 
									<label class="error" for="master-category-id"></label>
								</div>
								<div class="form-group">
									<label class="control-label">Title</label>
								  <input type="text" class="form-control" name="title" id="title" placeholder="Title Name" required value="<?php echo @$academiccalender->title?>"> 
								</div>
								<div class="form-group">
									<label class="control-label">Calender Date</label>
									<input type="text" class="form-control" name="calender_date" id="calender_date" data-date-format="dd-mm-yyyy" placeholder="Calender Date" required value="<?php echo @$dates?>"> 
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
					  <h3 class="box-title">Academic Calender</h3>
					  <div class="pull-right box-tools">
							<a href="<?php echo $this->url->build(['action'=>'index']) ?>"><button class="btn btn-sm bg-red"><i class="fa fa-plus"></i> Add</button></a>
						</div>
					</div>
					 <div class="box-body">
						<table id="classdata" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th class="text-center">Category Name</th>
									<th class="text-center">Title</th>
									<th class="text-center">Date</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;foreach($AcademicCalenders as $academiccalender){ ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td class="text-center"><?php echo $academiccalender->master_category->category_name; ?></td>
										<td class="text-center"><?php echo $academiccalender->title; ?></td>
										<td class="text-center"><?php echo date('d-m-Y',strtotime($academiccalender->calender_date)); ?></td>
										<td class="text-center">
											<a href="<?php echo $this->url->build(['action'=>'index',$academiccalender->id]); ?>"><button class="btn btn-sm bg-olive"><i class="fa fa-pencil"></i></button> </a><a data-original-title="Delete" onclick="return confirm('Are you sure you want to delete?')" href="<?php echo $this->url->build(['action'=>'delete',$academiccalender->id]); ?>"><button class="btn btn-sm bg-red "><i class="fa fa-trash"></i></button> </a>
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
	<?php echo $this->Html->css('/plugins/datatables/dataTables.bootstrap.css', ['block' => 'PAGE_LEVEL_PLUGINS_CSS']); ?> 
	<?php echo $this->Html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->Html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/datatables/jquery.dataTables.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/datatables/dataTables.bootstrap.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/select2/select2.full.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php  $js="
		$(document).ready(function(){
			$('#classdata').DataTable();
			$('.master_category_id').select2();
			
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
	echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>	