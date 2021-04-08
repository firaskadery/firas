<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Employee</title>
	 <?php include 'toppage.php'; ?>
</head>
<body>
  <?php include 'sidebar.php'; ?>
	<form action="<?php echo base_url().'employee/edit/'.$employee['id']; ?>" method="post">
     <div class="modal-body">     
      <div class="form-group">
       <label>Name</label>
       <input type="text" class="form-control" name="name" value="<?php echo set_value('name',$employee['name']); ?>" >
       <?php echo form_error('name'); ?>
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" class="form-control" name="pass" value="<?php echo set_value('password',$employee['password']); ?>" required>
      </div>
      <div class="form-group">
       <label>Email</label>
       <input type="email" class="form-control" name="email" value="<?php echo set_value('email',$employee['email']); ?>" required>
      </div>
      <div class="form-group">
       <label>Address</label>
       <textarea class="form-control" name="address" required><?php echo set_value('address',$employee['address']); ?></textarea>
      </div>
      <div class="form-group">
       <label>Phone</label>
       <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone',$employee['phone']); ?>" required>
      </div>     
     </div>
     <div class="form-group">
      <button class="btn btn-primary">Update</button>
      <a href="<?php echo base_url().'employee/index'; ?>" class="btn-secondary btn">Cancel</a>
     </div>
 </form>
 <?php include 'footer.php'; ?>
</body>
 </html>