<section class="content-header">
		<h1>Dashboard</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
		
	</section>
	
	 <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header ui-sortable-handle" style="cursor: move;">
						
						<!-- tools box -->
						<div class="pull-right box-tools">
						</div>
						<!-- /. tools -->
					</div>
					<div class="box-body" style="height: 203px;">
							
						<div class="row">	
							<div class="col-md-5"></div>
							<div class="col-md-6">
								<?= $this->Html->image('/dist/img/logo.jpg',['class'=>'user-image','alt'=>'User Image','style'=>'height:100px; width:100px;']);?>
							</div>	
						</div>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-6">
								<h3>Welcome To MK JAIN CLASSES	</h3>	<br/>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Students</span>
										<span class="info-box-number"><?= h($total_student)?></span>
									</div>
								<!-- /.info-box-content -->
								</div>
							<!-- /.info-box -->
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="info-box">
									<span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Teachers</span>
										<span class="info-box-number"><?= h($total_student)?></span>
									</div>
								<!-- /.info-box-content -->
								</div>
							<!-- /.info-box -->
							</div>
						</div>	
	</section>	