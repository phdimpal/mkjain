	
	<section class="content-header">
		<h1>Category </h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Category</li>
		</ol>
		
	</section>
	
	 <section class="content">
	 
		<div class="row">
		
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header ui-sortable-handle" style="cursor: move;">
						<h3 class="box-title">Category</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
						</div>
						<!-- /. tools -->
					</div>
					<form action="" method="post" id="cateForm">
						<div class="box-body">
								<div class="form-group">
								  <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" required> 
								</div>
						</div>
						<div class="box-footer clearfix">
						  <button type="submit" class="pull-right btn btn-danger" id="sendEmail">Save
							<i class="fa fa-arrow-circle-right"></i></button>
						</div>
					</form>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-danger">
					<div class="box-header">
					  <h3 class="box-title">Category</h3>
					</div>
					 <div class="box-body">
						<table id="catedata" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Category Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>	
				</div>	
			</div>
		</div>
	</div>	
</section>
	<input type="hidden" class="saveCategoryData" value="<?php echo $this->Url->build(['controller'=>'MasterCategories','action'=>'saveCategory']) ?>">
	<input type="hidden" class="getCategoryData" value="<?php echo $this->Url->build(['controller'=>'MasterCategories','action'=>'getCategory']) ?>">
	<input type="hidden" class="deleteCategoryData" value="<?php echo $this->Url->build(['controller'=>'MasterCategories','action'=>'delete']) ?>">
	<?php echo $this->html->css('/plugins/datatables/dataTables.bootstrap.css', ['block' => 'PAGE_LEVEL_PLUGINS_CSS']); ?> 
	<?php echo $this->html->script('/plugins/jquery.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/datatables/jquery.dataTables.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php echo $this->html->script('/plugins/datatables/dataTables.bootstrap.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 
	<?php  $js="
		$(document).ready(function(){
			$('#cateForm').validate({
				rules:{
					category_name:{
						required:true
					}
				},
				messages:{
					category_name:{
						required: 'Category Name is required'
					}
				}
			});
			
			//////
			var saveCategoryData = $('.saveCategoryData').val();
			$('#cateForm').on('submit', function (e) {
				e.preventDefault();
				var saveData = $('#cateForm').serialize();
				if(saveData != ''){
					$.ajax({
						type: 'post',
						url: saveCategoryData,
						dataType : 'json',
						data: $('#cateForm').serialize(),
						success: function (result) {
							if(result.status == true){
								$('.show-success').html(result.success).show();
								$('.show-danger').html(result.success).hide();
							}else if(result.status == false){
								$('.show-success').html(result.success).hide();
								$('.show-danger').html(result.success).show();
							}		
						}
					});
				}
			});
			//////
			var getCategoryData = $('.getCategoryData').val();
			var deleteCategoryData = $('.deleteCategoryData').val();
			$('#catedata').DataTable({
			'ajax':{
				'url':getCategoryData
			},
			'paging': true,
			'lengthChange':true,
			'searching':true,
			'processing': false,
			'columnDefs': [{
				'targets': 2,
				'orderable':false,
				'searchable':false,
				'data': 'null',
				'defaultContent': '<a onclick=deleteCategory(this) >Delete</a>&nbsp;&nbsp;<a onclick=editCategory(this) >Edit</a>'
				}
			],
			'columns':[
				{'data': 'null'},
				{'data': 'category_name'}
			],
			'fnRowCallback' : function(nRow, aData, iDisplayIndex){
                $('td:first', nRow).html(iDisplayIndex +1);
               return nRow;
            },
			});
			
		});
		
		function deleteCategory(id){
			
		}

		function editCategory(id){
			
		}
	";
	echo $this->html->scriptBlock($js, ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>