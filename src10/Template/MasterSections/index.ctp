<section class="content-header">
		<h1>Master Section </h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Master Section</li>
		</ol>
		
	</section>
	
	 <section class="content">
	 
		<div class="row">
		
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header ui-sortable-handle" style="cursor: move;">
						<h3 class="box-title">Section</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
						</div>
						<!-- /. tools -->
					</div>
					<?= $this->Form->create($mastersection,['id'=>'classForm']) ?>
					<input type="hidden" class="form-control" name="id" id="id" placeholder="Class Name" required value="<?php echo @$mastersection->id?>"> 
						<div class="box-body">
								<div class="form-group">
								  <input type="text" class="form-control" name="section_name" id="section_name" placeholder="Section Name" required value="<?php echo @$mastersection->section_name?>"> 
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
					  <h3 class="box-title">Master Section</h3>
					  <div class="pull-right box-tools">
							<a href="<?php echo $this->url->build(['action'=>'index']) ?>"><button class="btn btn-sm bg-red"><i class="fa fa-plus"></i> Add</button></a>
						</div>
					</div>
					 <div class="box-body">
						<table id="classdata" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th class="text-center">Section Name</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;foreach($masterSections as $masterSection){ ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td class="text-center"><?php echo $masterSection->section_name; ?></td>
										<td class="text-center">
											<a href="<?php echo $this->url->build(['action'=>'index',$masterSection->id]); ?>"><button class="btn btn-sm bg-olive"><i class="fa fa-pencil"></i></button> </a><a data-original-title="Delete" onclick="return confirm('Are you sure you want to delete?')" href="<?php echo $this->url->build(['action'=>'delete',$masterSection->id]); ?>"><button class="btn btn-sm bg-red "><i class="fa fa-trash"></i></button> </a>
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
						alphabetsAndSpacesOnly:true,
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
						alphabetsAndSpacesOnly:'Only Alphabets Allowed',
						remote:'Section Name already exists'	
					}
				}
			});
			////
			
		$('.alert').fadeOut(5000);
	
		});	
		";
	echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>	