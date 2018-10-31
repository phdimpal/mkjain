<div class="col-md-12">
<?php echo $this->Form->create($directorMessage, ['type' => 'file','id'=>'registratiomForm']); ?>
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Director Message</h3>
			</div>
			<div class="box-body" style="display: block;">
					<div class="row">
							<div class="col-md-12 pad">
							
								  <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Title </label>
											<?php echo $this->Form->input('title', ['label' => false,'placeholder'=>'Title','class'=>'form-control']); ?>
										</div>
								  </div>
								   
									 <div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Image </label>
											<?= $this->Form->file('profile_pic') ?>
										</div>
									</div>
									
									
									
								 
							</div>
							
							<div class="col-md-12 pad">
							

								<textarea id="description" name="discription" hidden="hidden"><?php echo $directorMessage->discription; ?></textarea>
								<div class="col-md-12 ">
									<div class="box-body  pad">
										<textarea class="txtEditor"></textarea>

									</div>
								</div>
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
			<?php echo $this->Form->end(); ?>
</div>
<?php echo $this->html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>

	<?php $js="$(document).ready(function(){
		
		$('.Editor-editor').html($('#description').text());

		$('button:submit').click(function(e){ 
			
			$('#description').text($('.Editor-editor').html());
		}); 
	});
	";	
	
	echo $this->html->scriptBlock($js, ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>