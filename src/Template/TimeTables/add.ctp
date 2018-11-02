<?php echo $this->Form->create($timeTable, ['type' => 'file','id'=>'registratiomForm']); ?>
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border no-print">
				  <h3 class="box-title">Time Table Add</h3>
				</div>
				<div class="box-body">
					
						<div class="row no-print">
							<div class="col-md-12 table-responsive">
									<div class="col-md-3">
											
											<div class="form-group">
												<label class="control-label">Role </label>
													<?php
														echo $this->Form->input('master_role_id', ['empty'=> '--Select--','data-placeholder'=>'Select class','label' => false,'class'=>'form-control select2','options'=>$masterRoles,'style'=>'width:100%;','required']);
													?>
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
									
								</div>
							
							</div>
						
					</div>
					
					<div class="row no-print">
							<div class="col-sm-12 no-print">
								<div class="table-responsive no-padding">
						
									<table class="table table-bordered table-striped dataTable" style="width: 100%;border: #00c0ef; border-spacing: 0;border-collapse: collapse;" >
										
										<tbody id="Setdata">
										
										</tbody>
									</table>
								</div>
							</div>
					</div>
					<div class="box-footer">
						<center>
						
						<?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-plus']).__(' Submit') ,['class'=>'btn btn-success','type'=>'Submit','id'=>'submit_member','name'=>'registration_submit']);
							   ?>
						</center>
					</div>
					
				</div>
		</div>	
	<?php echo $this->Form->end(); ?>
	
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
				
				$(document).on('change', '.section_change', function(){   
				
					var class_id= $('.class_change').val();
					var section_id= $(this).val();
					
					var url='".$this->Url->build(['controller'=>'TimeTables','action'=>'classsubject'])."';
					url=url+'/'+class_id+'/'+section_id;
					$.ajax({ 
						url:url,
						type:'GET',
						}).done(function(response){  
							alert(response);
							$('#Setdata').html(response);
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



