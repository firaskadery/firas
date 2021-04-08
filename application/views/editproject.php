<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Project</title>
	 <?php include 'toppage.php'; ?>
</head>
<body>
  <?php include 'sidebar.php'; ?>
	<form action="<?php echo base_url().'Project/edit/'.$p['id']; ?>" method="post">
     <div class="modal-body">     
      <div class="form-group">
       <label>Title</label>
       <input type="text" class="form-control" name="title" value="<?php echo set_value('title',$p['title']); ?>" >
       <?php echo form_error('title'); ?>
      </div>
      <div class="form-group">
       <label>Description</label>
       <textarea class="form-control" name="description" required><?php echo set_value('description',$p['description']); ?></textarea>
      </div>
      <div class="form-group">
       <label>Lead By</label>
       <select name="leadby" class="form-control" required>
        <?php
        if(!empty($employees)) { foreach($employees as $employee) { 
        ?>
        <option value="<?php echo $employee['name']; ?>"<?php if($employee['name']==$p['leadby']){ echo "selected";} ?> ><?php echo $employee['name']; ?></option>
          <?php
        }}
        ?>
       </select>
      </div>
     </div>
     <div class="form-group">
      <button class="btn btn-primary">Update</button>
      <a href="<?php echo base_url().'Project/list'; ?>" class="btn-secondary btn">Cancel</a>
     </div>
 </form>
 <?php include 'footer.php'; ?>
</body>
 </html>