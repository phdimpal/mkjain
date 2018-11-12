<section class="content-header">
		<h1>Gallery</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Gallery</li>
		</ol>
		
	</section>
	
	 <section class="content">
	 
		<div class="row">
		
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header ui-sortable-handle" style="cursor: move;">
						<h3 class="box-title">Gallery</h3>
						<!-- tools box -->
						
						<!-- /. tools -->
					</div>
					<?= $this->Form->create($newss,['type' => 'file','id'=>'classForm']) ?>
					<input type="hidden" class="form-control" name="id" id="id" placeholder="Class Name" required value="<?php echo @$gallery->id?>">
<?php $dates='00-00-0000';if(date('d-m-Y',strtotime(@$newss->news_date)) != '00-00-0000' && date('d-m-Y',strtotime(@$newss->news_date)) != '01-01-1970'){ 
	$dates = date('d-m-Y',strtotime(@$newss->news_date));}else{ $dates = date('d-m-Y');} ?>					
						<div class="box-body">
							<div class="form-group">
								<label class="control-label">Gallery Title</label>
								<input type="text" class="form-control" name="title" id="title" placeholder="News Title" required value="<?php echo @$newss->title?>">
							</div>
							<div class="form-group">
								<label class="control-label">Gallery Description</label><br/>
								<textarea name="description" id="description" class="form-control" required><?php echo @$newss->description?></textarea>
							</div>
							<div class="form-group">
									<label class="control-label">Gallery Date</label>
									<input type="text" class="form-control" name="news_date" id="news_date" placeholder="News Date" required value="<?php echo @$dates;?>"> 
							</div>
							<div class="form-group">
									<label class="control-label">Gallery Url</label>
									<input type="file" class="form-control" name="news_url" id="news_url" placeholder="Calender Date" value="<?php echo @$newss->news_url ?>"> 
							</div>

							<div class="col-md-12 ">
								<table id="file_table" style="line-height:2.5">
								<tr>
								<td><?= $this->Form->file('file[]',['multiple'=>'multiple']); ?></td>
								<td><?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-plus']) . __(' Add More'), ['class'=>'btn btn-block btn-primary btn-sm add_more','type'=>'button']) ?></td>
								<td></td>
								</tr>
								</table>

							</div>
						</div>
						<div class="box-footer clearfix">
						  <button type="submit" class="pull-right btn btn-danger" id="sendEmail">Save
							<i class="fa fa-arrow-circle-right"></i></button>
						</div>
					<?= $this->Form->end() ?>
				</div>
			</div>
			
			
			<table id="copy_row" style="display:none;">	
				<tbody>
					<tr>
						<td><?= $this->Form->file('file[]',['multiple'=>'multiple']); ?></td>
						<td><?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-plus']) . __(' Add More'), ['class'=>'btn btn-block btn-primary btn-sm add_more','type'=>'button']) ?>
						</td>
						<td style="padding: 5px;">
						<?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-trash']) . __(' Delete'), ['class'=>'btn btn-block btn-danger btn-sm delete_row','type'=>'button']) ?></td>
					</tr>
				</tbody>
			</table>
			
			
			
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header">
					  <h3 class="box-title">Gallery</h3>
					  <div class="pull-right box-tools">
							<a href="<?php echo $this->url->build(['action'=>'index']) ?>"><button class="btn btn-sm bg-red"><i class="fa fa-plus"></i> Add</button></a>
						</div>
					</div>
					 <div class="box-body">
						<table id="classdata" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th class="text-center">Gallery Title</th>
									<th class="text-center">Created Date</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;foreach($News as $newses){ ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td class="text-center"><?php echo $newses->title; ?></td>
										
										<td class="text-center"><?php echo date('d-m-Y',strtotime($newses->media_date)); ?></td>
										<td class="text-center">
											<a href="<?php echo $this->url->build(['action'=>'view',$newses->id]); ?>"><button class="btn btn-sm bg-olive"><i class="fa fa-book"></i></button> </a>
											<a data-original-title="Delete" onclick="return confirm('Are you sure you want to delete?')" href="<?php echo $this->url->build(['action'=>'delete',$newses->id]); ?>"><button class="btn btn-sm bg-red "><i class="fa fa-trash"></i></button> </a>
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
			
			$(document).on('click','button.add_more',function() {
				var row=$('#copy_row tbody').html();
				$('#file_table tbody').append(row);

			});
			
			$(document).on('click','button.delete_row',function() {
				$(this).closest('tr').remove();
			});
			
			
			$('#classdata').DataTable();
			$('.master_category_id').select2();
			
			var classValidate = $('.classValidate').val();
			$('#classForm').validate({
				rules:{
					title:{
						required:true,
					},
					description:{
						required:true,
					}
				},
				messages:{
					title:{
						required: 'Title is required',
					},
					description:{
						required: 'Description is required',
					}
				}
			});
			////
			
		$('.alert').fadeOut(5000);
	
		});	
		";
	echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>	