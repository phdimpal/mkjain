<section class="content-header">
	<h1>Attendance Add</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Attendance Add</li>
	</ol>
</section>
	
	 <section class="content">
	 
		<div class="row">
<div class="col-md-12">
	<div class="box box-danger">
			<div class="box-header with-border no-print">
			  <h3 class="box-title">Attendance Add</h3>
			</div>
			<div class="box-body">
				<?php echo $this->Form->create($attendance, ['type' => 'GET']); ?>
					<div class="row no-print">
						<div class="col-md-12 table-responsive">
								<div class="col-md-3">
										
										<div class="form-group">
											<label class="control-label">Date </label>
												<?php echo $this->Form->input('date', ['label' => false,'placeholder'=>'','class'=>'form-control','id'=>'datepicker','data-date-format'=>'dd-mm-yyyy','value'=>date("d-m-Y"),'required']); ?>
										</div>
								
								</div>
								   
								  
									
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Class </label>
												<?php
													echo $this->Form->input('master_class_id', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2 class_change','options'=>$masterClasses,'style'=>'width:100%;','required']);
												?>
										</div>
									</div>
									 <div class="col-md-3" id="section">
										<div class="form-group">
											 <label class="">Section</label>
											<?php 
											$options=[];
											
											echo $this->Form->input('master_section_id', ['empty'=> '--Select--','data-placeholder'=>'Select a section ','label' => false,'class'=>'form-control select2','options'=>$options,'style'=>'width:100%;','required']); ?>
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label"> </label>
												<?= $this->Form->button(__(' Submit') ,['class'=>'btn btn-danger','type'=>'Submit','id'=>'submit_member','name'=>'attendance_submit','style'=>'margin-top: 25px;','value'=>'attendance']) ?>
										</div>
									</div>
								 
							</div>
						
						</div>
					</form>
				
				
				<div class="row no-print">
						<div class="col-sm-12 no-print">
							<div class="table-responsive no-padding">
					<?php echo $this->Form->create($attendance, ['type' => 'post']); 
					if(!empty($attendancess)){ ?>
					<input type="text" class="master_class_id" name="master_class_id" value="<?php echo $master_class_id;?>">
					<input type="text" class="master_section_id" name="master_section_id" value="<?php echo $master_section_id;?>">
					<input type="text" class="attendance_date" name="attendance_date" value="<?php echo 
					date('Y-m-d',strtotime($date));?>">
								<table class="table table-bordered table-striped" id="main_tb">
									<thead >
										<tr>
											<th>Sr.No.</th>
											<th>Name</th>
											<th>P</th>
											<th>A</th>
											<th>L</th>
										</tr>
									</thead>
									<tbody>
									<?php
									
									if(!empty($page)){
										$sr_no=$page*50-50;
									}else{
										$sr_no=0;
									}
									
									 foreach($attendancess as $attendance) { 
										
											
											$status='';
											
										?>
										<tr class="tr1">
											<td><?php echo ++$sr_no; ?></td>
											<td><?= $attendance->name ?><input type="text" class="student_id" name="q" value="<?php echo $attendance->id;?>"></td>
											<td><input type="radio" class="radio_pres" name="q"  value="1"></td>
											<td><input type="radio" class="radio_abs"name="q" value="2"></td>
											<td><input type="radio" class="radio_leave" name="q" value="3"></td>
											
										</tr>
									 <?php } ?>
										</tbody>
								</table>
									<?= $this->Form->button(__(' Submit') ,['class'=>'btn btn-danger','type'=>'Submit','id'=>'submit_member','name'=>'attendance_submit','style'=>'margin-top: 25px;','value'=>'attendance']);
					}
									?>
								</form>	
							</div>
						</div></div>
				</div>
			</div>
		</div>	
	</div>	
	</div>
</section>
<?php echo $this->Html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->css('/plugins/datatables/dataTables.bootstrap.css', ['block' => 'PAGE_LEVEL_PLUGINS_CSS']); ?> 
<?php echo $this->Html->script('/plugins/datatables/jquery.dataTables.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	<?php echo $this->Html->script('/plugins/datatables/dataTables.bootstrap.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
	 
		<?php echo $this->Html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JSS']); ?> 
		
		<?php  $js=" 
			
			$(document).ready(function(){ 
			$('#aattendanceview').DataTable();	
				$(document).on('change', '.class_change', function(){   
					 var state_id= $(this).val();
					var url='".$this->Url->build(['controller'=>'Registrations','action'=>'classsection'])."';
					url=url+'/'+state_id;
					$.ajax({ 
						url:url,
						type:'GET',
						}).done(function(response){  
						$('#section').html(response);
						$('select[name=master_section_id]').attr('required','true');
					}); 
				});
				
				$('#registratiomForm').validate({
					rules:{
						
					},
					messages:{
						
					}
				});
			});
			
			rename_rows();
function rename_rows(){
	var list = new Array();
		var p=0;
		var i=0;
		$('#main_tb tbody tr.tr1').each(function(){  
			
				i++;
$(this).find('td:nth-child(2) input.student_id').attr('name','attendance_rows['+i+'][student_id]').attr('id','time_table-'+i+'-week_name');
$(this).find('td:nth-child(3) input.radio_pres').attr('name','attendance_rows['+i+'][attendance_mark]').attr('id','time_table-'+i+'-subject_id').attr('checked','checked');
$(this).find('td:nth-child(4) input.radio_abs').attr('name','attendance_rows['+i+'][attendance_mark]').attr('id','time_table-'+i+'-subject_id');
$(this).find('td:nth-child(5) input.radio_leave').attr('name','attendance_rows['+i+'][attendance_mark]').attr('id','time_table-'+i+'-subject_id');
				
			});
}
		";
		echo $this->Html->scriptBlock($js, ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
