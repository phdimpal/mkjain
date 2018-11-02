<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border no-print">
			  <h3 class="box-title">Attendance </h3>
			</div>
			<div class="box-body">
				<?php echo $this->Form->create($attendances, ['type' => 'GET']); ?>
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
												<?= $this->Form->button(__(' Submit') ,['class'=>'btn btn-success','type'=>'Submit','id'=>'submit_member','name'=>'attendance_submit','style'=>'margin-top: 25px;','value'=>'attendance']) ?>
										</div>
									</div>
								 
							</div>
						
						</div>
					</form>
				</div>
				
				<div class="row no-print">
						<div class="col-sm-12 no-print">
							<div class="table-responsive no-padding">
					
								<table class="table table-bordered table-striped dataTable" style="width: 100%;border: #00c0ef; border-spacing: 0;border-collapse: collapse;" >
									<thead style="background-color:#eee">
										<tr>
											<th>Sr.No.</th>
											<th>Name</th>
											<th>Class</th>
											<th>Section</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
									<?php
									
									if(!empty($page)){
										$sr_no=$page*50-50;
									}else{
										$sr_no=0;
									}
									
									 foreach($attendances as $attendance) {
										
										$section_name=$attendance->master_section->section_name;
										$class_name=$attendance->master_class->class_name;
										foreach($attendance->attendance_rows as $attendancedata){
											$attendance_mark=$attendancedata->attendance_mark;
											$status='';
											if($attendance_mark==1){
												$status='Present';
											}if($attendance_mark==2){
												$status='Absent';
											}if($attendance_mark==3){
												$status='Leave';
											}
										?>
										<tr>
											<td><?php echo ++$sr_no; ?></td>
											<td><?= $attendancedata->registration->name ?></td>
											<td><?= $class_name ?></td>
											<td><?= $section_name ?></td>
											<td><?= $status ?></td>
											
										</tr>
									 <?php } } ?>
										</tbody>
								</table>
							</div>
						</div>
				</div>
			</div>
		</div>	
	</div>	
	
	<?php echo $this->html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
		<?php echo $this->html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
		
		<?php  $js=" 
			
			$(document).ready(function(){ 
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
		";
		echo $this->html->scriptBlock($js, ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
