<style>
.content-wrapper{
	min-height: 800px !important;
}
</style>
<section class="content-header">
	<h1>Director Messages</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Director Messages</li>
	</ol>
</section>
<section class="content">
	 <div class="row">
<div class="col-md-12">
<?php echo $this->Form->create($directorMessage, ['type' => 'file','id'=>'registratiomForm']); ?>
		<div class="box box-danger">
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
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label"> </label>
												<?php
												if(!empty($directorMessage->image)){
												echo $this->Html->image($directorMessage->image, ['style'=>'width:100px; height:100px;']);
												}
												?>
										</div>
									</div>
									
									
									
								 
							</div>
							
							<div class="col-md-12 pad">
								<div class="col-md-12">
									<label class="control-label"> Description</label>
									<textarea id="description" name="discription" hidden="hidden"><?php echo $directorMessage->discription; ?></textarea>
									<div class="col-md-12" style="margin-left: -22px;">
										<div class="box-body  pad">
											<textarea class="txtEditor"></textarea>

										</div>
									</div>
							   </div>
							</div>
						
					</div>
			</div>
			<div class="box-footer">
				<center>
				
				<?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-arrow-circle-right']).__(' Submit') ,['class'=>'btn btn-danger','type'=>'Submit','id'=>'submit_member','name'=>'registration_submit']);
					   ?>
				</center>
			</div>
			
			</div>
		<?php echo $this->Form->end(); ?>
</div>
</div>
</section>

	<?php $js="$(document).ready(function(){
		
		$('.Editor-editor').html($('#description').text());

		$('button:submit').click(function(e){ 
			
			$('#description').text($('.Editor-editor').html());
		}); 
	});";	
	
	echo $this->Html->scriptBlock($js, ['block' => 'scriptBottom']); ?>