
<section class="content">
<div class="row">
<div class="col-md-12">
	<div class="box box-danger">
		<div class="box-header">
		  <h3 class="box-title"><?= h($gallery->title) ?></h3>
		 
		</div>
		 <div class="box-body">
			<div class="col-md-12">
			 <?php foreach ($gallery->gallery_rows as $galleryRows): ?>
					<div class="col-md-3" style="margin-bottom:10px;padding:2px">
						<?php
						
						echo $this->Html->image($galleryRows->gallery_pic, ['style'=>'width:210px; height:210px;']);
						
						?>
						 
					</div>
				<?php endforeach; ?>	
			</div>
		</div>	
	</div>
</div>
</div>
		
</section>