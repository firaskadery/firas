<!DOCTYPE html>
<html>
<head>
	<title>Add New Employee</title>
	<?php include 'toppage.php'; ?>
</head>
<body>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <?php include 'sidebar.php'; ?>
    <form method="post" name="addemp" action="<?php echo base_url().'employee/add'; ?>">
     <div class="modal-body">     
      <div class="form-group">
       <label>Name</label>
       <input type="text" class="form-control" name="name" >
       <?php echo form_error('name'); ?>
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" class="form-control" name="password" required>
      </div>
      <div class="form-group">
       <label>profil</label>
    <select name="ismanager" class="form-control" required="">
        <option value="0">User</option>
        <option value="1">Admin</option>
       </select>
      </div>
      <div class="form-group">
       <label>Email</label>
       <input type="email" class="form-control" name="email" required>
      </div>
      <div class="form-group">
       <label>Address</label>
       <textarea class="form-control" name="address" required></textarea>
      </div>
      <div class="form-group">
       <label>Phone</label>
       <input type="text" class="form-control" name="phone" required>
      </div>     
     </div>
     <div class="modal-footer">
      <input type="submit" class="btn btn-success" value="Addemployee">
      <a href="<?php echo base_url().'employee/index'; ?>" class="btn-secondary btn">Cancel</a>
     </div>
    </form>
 <?php include 'footer.php'; ?>
</body>

</body>
</html>