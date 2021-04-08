<!DOCTYPE html>
<html>
<head>
  <title>Add Project</title>
	<?php include 'toppage.php'; ?>
</head>
<body>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <?php include 'sidebar.php'; ?>
    <form method="post" action="<?php echo base_url().'Project/add'; ?>">
     <div class="modal-body">     
      <div class="form-group">
       <label>Title</label>
       <input type="text" class="form-control" name="title" >
       <?php echo form_error('title'); ?>
      </div>
      <div class="form-group">
       <label>Description</label>
       <textarea class="form-control" name="description" required></textarea>
      </div> 
      <div class="form-group">
       <label>Lead By</label>
       <select name="leadby" class="form-control" required>
        <?php
        if(!empty($employees)) { foreach($employees as $employee) { 
        ?>
        <option value="<?php echo $employee['name']; ?>"><?php echo $employee['name']; ?></option>
          <?php
        }}
        ?>
       </select>
      </div>
     </div>
     <div class="modal-footer">
      <input type="submit" class="btn btn-success" value="AddProject">
      <a href="<?php echo base_url().'Project/list'; ?>" class="btn-secondary btn">Cancel</a>
     </div>
    </form>
 <?php include 'footer.php'; ?>
</body>

</body>
</html>