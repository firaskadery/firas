<div class="wrapper">
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url().'assets/dist/img/AdminLTELogo.png';?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">My App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url().'assets/dist/img/user2-160x160.jpg';?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Firas AlKadiri</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php
                $u = $_SERVER['REQUEST_URI'];
                $url = explode("/",$u);
                if($this->session->userdata('ismanager') == '1')
                {
              ?>
          <li class="nav-item<?php if($url['2'] == 'employee') echo " menu-open"; ?>">
            <a href="#" class="nav-link<?php if($url['2'] == 'employee') echo " active"; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Employees
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'employee/employees';?>" class="nav-link <?php if($url['3'] == 'employees' && !isset($url['4'])) echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'employee/employees/add';?>" class="nav-link <?php if(isset($url['4'])){if($url['4'] == 'add') echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Employee</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item<?php if($url['2'] == 'project') echo " menu-open"; ?>">
            <a href="#" class="nav-link<?php if($url['2'] == 'project') echo " active"; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Projects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'project/projects';?>" class="nav-link <?php if($url['3'] == 'projects' && !isset($url['4'])) echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'project/projects/add';?>" class="nav-link <?php if(isset($url['4'])){if($url['4'] == 'add') echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Project</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'notification/notification';?>" class="nav-link <?php if($url['2'] == 'notification') echo "active"; ?>">
              <i class="fa fa-bell" style="font-size:24px"></i>
              <p>
                Notification
              </p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item <?php if($url['2'] == 'task') echo "menu-open"; ?>">
            <a href="#" class="nav-link <?php if($url['2'] == 'task') echo "active"; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tasks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'task/tasks';?>" class="nav-link <?php if($url['3'] == 'tasks' && !isset($url['4'])) echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of Tasks</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url().'task/tasks/add' ?>" class="nav-link <?php if(isset($url['4'])){if($url['4'] == 'add') echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Task</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'statistics/statistic';?>" class="nav-link <?php if($url['2'] == 'statistics') echo "active"; ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'account/profile';?>" class="nav-link <?php if($url['3'] == 'profile') echo "active"; ?>">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                LogOut
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
    <div class="table-wrapper">
      <?php
      $this->load->model('Employee_model');
      $name = $this->session->userdata('name');
      $user = $this->Employee_model->getuser($name);
      $this->load->model('Notification_model');
      $alert = $this->Notification_model->getalert();
      if(!empty($alert)) { foreach($alert as $a) { 
      if($user['ismanager'] != '1' && ($a['employee_id'] == '0' || $a['employee_id'] ==$user['id']))
      {
        if($a['status'] == 'high')
        {
      ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $a['text']; ?>
        <a class="close" href="<?php echo base_url().'task/drop/'.$a['id'];?>">
        <span aria-hidden="true">&times;</span>
        </a>
        </div>
        <?php
        }else
          { ?>
            <div class="alert alert-info" role="alert">
            <?php echo $a['text']; ?>
            <a class="close" href="<?php echo base_url().'task/drop/'.$a['id'];?>">
            <span aria-hidden="true">&times;</span>
            </a>
            </div>
      <?php
           }
      }
    }}
      ?>
      