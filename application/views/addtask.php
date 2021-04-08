<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Task</title>
 <?php include 'toppage.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <?php include 'sidebar.php'; ?>
  <?php echo form_open_multipart(base_url().'Task/add');?>
     <div class="modal-body">     
      <div class="form-group">
       <label>Task</label>
       <input type="text" class="form-control" name="task">
       <?php echo form_error('task'); ?>
      </div>
      <div class="form-group">
       <label>Name</label>
       <select name="employee_id" class="form-control" required>
        <?php 
        if($user['ismanager'] != '1' ){ ?>
        <option value="<?php echo $user['id']; ?>" selected><?php echo $user['name']; ?></option>
        <?php } 
        else{
        if(!empty($employees)) { foreach($employees as $employee) { 
        ?>
        <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?></option>
          <?php
        }}}
        ?>
       </select>
      </div>
      <div class="form-group">
       <label>Status</label>
		   <select name="status" class="form-control" required="">
       	<option value="hold">Hold</option>
       	<option value="In Progress">In Progress</option>
       	<option value="Done">Done</option>
       	<option value="Canceled">Canceled</option>
       </select>
      </div>
      <div class="form-group">
       <label>Date</label>
       <input type="Date" class="form-control" name="ddate" required>
      </div>     
     <div class="form-group">
       <label>Priority</label>
       <select name="priority" class="form-control" required="">
        <option value="high">High</option>
        <option value="medium">Medium</option>
        <option value="low">low</option>
       </select>
      </div>
      <div class="form-group">
       <label>Attachment</label>
       <input type="file" class="form-control" name="attachment" size="20" accept=".jpg,.png" required>
      </div>
      <div class="form-group">
       <label>Project</label>
       <select name="project_id" class="form-control" required>
        <?php
        if(!empty($projects)) { foreach($projects as $project) { 
        ?>
        <option value="<?php echo $project['id']; ?>"><?php echo $project['title']; ?></option>
          <?php
        }}
        ?>
       </select>
      </div>
    </div>
     <div class="modal-footer">
      <input type="submit" class="btn btn-success" value="Addtask">
      <a href="<?php echo base_url().'employee/list'; ?>" class="btn-secondary btn">Cancel</a>
     </div>
    </form>
 <?php include 'footer.php'; ?>
</body>
</html>
