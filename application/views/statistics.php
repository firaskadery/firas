<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
	<?php include 'toppage.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<?php include 'sidebar.php'; ?>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
     <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-hand-paper-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Hold</span>
                <span class="info-box-number">
                <?php
          		  echo $hold;
                ?>
            	</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-thumbs-o-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">done</span>
                <span class="info-box-number">
                	<?php
          		  echo $done;
                ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-spinner fa-spin"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">In Progress</span>
                <span class="info-box-number">
                	<?php
          		  echo $inprogress;
                ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-close"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Canceled</span>
                <span class="info-box-number">
                	<?php
          		  echo $canceled;
                ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
            <!-- /.info-box -->
          </div>

          <div class="row">
          <div class="col-12">
            <div class="card" >
              <div class="card-header" >
                <h3 class="card-title" >Tasks that were delayed</h3>
              </div>
              <div>
              <form action="<?php echo base_url()."Statistics/filter"; ?>" method="post">
                <table>
                  <tr>
                    <td>
                   <select name="status" class="form-control">
                    <option value="" selected>Status</option>
                    <option value="all" <?php if($s == "all")echo " selected"; ?>>ALL</option>
                    <option value="hold" <?php if($s == "hold")echo " selected"; ?>>Hold</option>
                    <option value="In Progress" <?php if($s == "In Progress")echo " selected"; ?>>In Progress</option>
                    <option value="Done" <?php if($s == "Done")echo " selected"; ?>>Done</option>
                    <option value="Canceled" <?php if($s == "Canceled")echo " selected"; ?>>Canceled</option>
                   </select>
                 </td><td>
                   <select name="employee_id" class="form-control">
                    <option value="" selected>Employees</option>
                    <?php
                      if($user['ismanager'] != '0')
                      {
                    ?>
                    <option value="all">All</option>
                    <?php
                    if(!empty($employees)) { foreach($employees as $employee) { 
                    ?>
                    <option value="<?php echo $employee['id']; ?>" <?php if($na == $employee['id'])echo " selected"; ?>><?php echo $employee['name']; ?></option>
                      <?php
                    }}
                    }
                    ?>
                   </select>
                 </td><td>
                  <input type="Date" class="form-control" name="ddate" value="<?php echo $d; ?>">
                </td><td>
                  <input class="btngo" type="submit" name="filter" value="filter">
                </td></tr>
                </table>
              </form>
            </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr >
                      <th>Task</th>
                      <th>Date Of Delivery</th>
                      <th>Status</th>
                      <th>Priority</th>
                      <th>Employee</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($delayed as $delay)
                    {
                      ?>
                    <tr style="background-color: #faafbe;">
                      <td><?php echo $delay['description']; ?></td>
                      <td><?php echo $delay['ddate']; ?></td>
                      <td><?php echo $delay['status']; ?></td>
                      <td><?php echo $delay['priority']; ?></td>
                      <td><?php echo $delay['name']; ?></td>
                    </tr>
                    <?php
                          }
                          ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
              <!-- /.card-body -->
      </div>
    <!-- /.content -->
  
</section>

	<?php include 'footer.php'; ?>
  </div>

</body>
</html>