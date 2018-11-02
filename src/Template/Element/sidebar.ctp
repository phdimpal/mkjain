<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
			<?= $this->html->image('/dist/img/dfault.png',['class'=>'img-circle','alt'=>'User Image']);?>
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
            
            <li><a href="<?php echo $this->url->build(['controller'=>'MasterClasses','action'=>'index'])?>"><i class="fa fa-circle-o"></i>Class</a></li>
            <li><a href="<?php echo $this->url->build(['controller'=>'MasterSections','action'=>'index'])?>"><i class="fa fa-circle-o"></i> Section</a></li>
            <li><a href="<?php echo $this->url->build(['controller'=>'MasterSubjects','action'=>'index'])?>"><i class="fa fa-circle-o"></i>Subject</a></li>
            <li><a href="<?php echo $this->url->build(['controller'=>'ClassSectionMappings','action'=>'index'])?>"><i class="fa fa-circle-o"></i>Mapping</a></li>
			<li><a href="<?php echo $this->url->build(['controller'=>'MasterCategories','action'=>'index'])?>"><i class="fa fa-circle-o"></i>Category</a></li>
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
            <li><a href="<?php echo $this->url->build(['controller'=>'Registrations','action'=>'add'])?>"><i class="fa fa-circle-o"></i>Add</a></li>
            <li><a href="<?php echo $this->url->build(['controller'=>'Registrations','action'=>'index'])?>"><i class="fa fa-circle-o"></i>View</a></li>
          </ul>
        </li>
		<li class="active treeview">
          <a href="<?= $this->Url->build(['controller'=>'DirectorMessages','action'=>'edit',1]) ?>">
            <i class="fa fa-dashboard"></i> <span>Director Message</span>
          </a>
        </li>
		<li class="active treeview">
          <a href="<?= $this->Url->build(['controller'=>'AcademicCalenders','action'=>'index']) ?>">
            <i class="fa fa-dashboard"></i> <span>Academic Calenders</span>
          </a>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Gallery</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->url->build(['controller'=>'News','action'=>'index'])?>"><i class="fa fa-circle-o"></i>News</a></li>
            <li><a href="<?php echo $this->url->build(['controller'=>'Videoes','action'=>'index'])?>"><i class="fa fa-circle-o"></i>Video</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Others Lists</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->url->build(['controller'=>'Complains','action'=>'index'])?>"><i class="fa fa-circle-o"></i>Complains / Feedback</a></li>
            <li><a href="<?php echo $this->url->build(['controller'=>'Leaves','action'=>'index'])?>"><i class="fa fa-circle-o"></i>Leaves</a></li>
			 <li><a href="<?php echo $this->url->build(['controller'=>'Attendances','action'=>'index'])?>"><i class="fa fa-circle-o"></i>Attendance</a></li>
          </ul>
        </li>
		<li class="active treeview">
          <a href="<?= $this->Url->build(['controller'=>'TimeTables','action'=>'add']) ?>">
            <i class="fa fa-dashboard"></i> <span>Time Tables</span>
          </a>
        </li>
		<li class="active treeview">
          <a href="<?= $this->Url->build(['controller'=>'Syllabuses','action'=>'index']) ?>">
            <i class="fa fa-dashboard"></i> <span>Syllabus</span>
          </a>
        </li>
		<li class="active treeview">
          <a href="<?= $this->Url->build(['controller'=>'Achievements','action'=>'index']) ?>">
            <i class="fa fa-dashboard"></i> <span>Achievements</span>
          </a>
        </li>
		<li class="active treeview">
          <a href="<?= $this->Url->build(['controller'=>'Registrations','action'=>'logout']) ?>">
            <i class="fa fa-lock"></i> <span>Logout</span>
          </a>
        </li>
		
		
     </ul>
    </section>
    <!-- /.sidebar -->
  </aside>