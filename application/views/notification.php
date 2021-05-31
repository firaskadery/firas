<!DOCTYPE html>
<html>
<head>
	<title>Add Notification</title>
	<?php include 'toppage.php'; ?>
</head>
<body>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <?php include 'sidebar.php'; ?>
    <form method="post" action="<?php echo base_url().'notification/add'; ?>">
     <div class="modal-body">     
      <div class="form-group">
       <label>Name</label>
       <select name="employee_id" class="form-control" required>
        <option value="0">All</option>
        <?php
        if(!empty($employees)) { foreach($employees as $employee) { 
        ?>
        <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?></option>
          <?php
        }}
        ?>
       </select>
      </div>
      <div class="form-group">
       <label>Text</label>
       <input type="text" class="form-control" name="text" required>
      </div>
      <div class="form-group">
       <label>Status</label>
       <select name="status" class="form-control" required>
        <option value="high">high</option>
        <option value="low">low</option>
       </select>
      </div>
     </div>
     <div class="modal-footer">
      <input type="submit" class="btn btn-success" value="Addnotification">
     </div>
    </form>
 <?php include 'footer.php'; ?>
</body>

</body>
</html>