<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
			<?= $this->html->image('/dist/img/user2-160x160.jpg',['class'=>'img-circle','alt'=>'User Image']);?>
        </div>
        <div class="pull-left info">
          <p>ADMIN</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Masters</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Category</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Class</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Section</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Subject</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Mapping</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Registration</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Add</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>View</a></li>
          </ul>
        </li>
		<li class="active treeview">
          <a href="<?= $this->Url->build(['controller'=>'Complains','action'=>'index']) ?>"> 
            <i class="fa fa-dashboard"></i> <span>Complains</span>
          </a>
        </li>
		<li class="active treeview">
          <a href="<?= $this->Url->build(['controller'=>'Leaves','action'=>'index']) ?>">
            <i class="fa fa-dashboard"></i> <span>Leaves</span>
          </a>
        </li>
		<li class="active treeview">
          <a href="<?= $this->Url->build(['controller'=>'DirectorMessages','action'=>'edit',1]) ?>">
            <i class="fa fa-dashboard"></i> <span>Director Message</span>
          </a>
        </li>
     </ul>
    </section>
    <!-- /.sidebar -->
  </aside>