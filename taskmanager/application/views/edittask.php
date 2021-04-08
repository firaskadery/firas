<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Task</title>
   <?php include 'toppage.php'; ?>
</head>
<body>
  <?php include 'sidebar.php'; ?>
  <?php echo form_open_multipart(base_url().'Task/edit/'.$task['id']);?>
     <div class="modal-body">     
      <div class="form-group">
       <label>Description</label>
       <input type="text" class="form-control" name="description" value="<?php echo set_value('description',$task['description']); ?>" >
       <?php echo form_error('name'); ?>
      </div>
      <div class="form-group">
       <label>Employee</label>
       <select name="employee_id" class="form-control" required>
        <?php
        if(!empty($employees)) { foreach($employees as $employee) { 
        ?>
        <option value="<?php echo $employee['id']; ?>"<?php if($employee['id']==$task['employee_id']){ echo "selected";} ?> ><?php echo $employee['name']; ?></option>
          <?php
        }}
        ?>
       </select>
      </div>
      <div class="form-group">
       <label>Status</label>
       <select name="status" class="form-control" required="">
        <option value="hold" <?php if($task['status'] == "hold"){echo "selected";} ?> >Hold</option>
        <option value="In Progress" <?php if($task['status'] == "In Progress"){echo "selected";} ?> >In Progress</option>
        <option value="Done" <?php if($task['status'] == "Done"){echo "selected";} ?> >Done</option>
        <option value="Canceled" <?php if($task['status'] == "Canceled"){echo "selected";} ?> >Canceled</option>
       </select>
      </div>
       <div class="form-group">
       <label>Date</label>
       <input type="Date" class="form-control" placeholder="YYYY-MM-DD" name="ddate" value="<?php echo set_value('ddate',$task['ddate']); ?>"  > 
      </div>  
      <div class="form-group">
       <label>Priority</label>
       <select name="priority" class="form-control" required="">
        <option value="high" <?php if($task['priority'] == "high"){echo "selected";} ?>>High</option>
        <option value="medium" <?php if($task['priority'] == "medium"){echo "selected";} ?>>Medium</option>
        <option value="low" <?php if($task['priority'] == "low"){echo "selected";} ?>>low</option>
       </select>
      </div>   
      <div class="form-group">
       <label>Attachment</label>
       <table><tr>
       <td><input type="file" class="form-control" name="attachment"></td>
       <td><img class="editattachment" src="<?php echo base_url()."/uploads/tasks/".$task['attachment']; ?>"></td>
       </tr></table>
      </div>
      <div class="form-group">
       <label>Project</label>
       <select name="project_id" class="form-control" required>
        <?php
        if(!empty($projects)) { foreach($projects as $project) { 
        ?>
        <option value="<?php echo $project['id']; ?>"<?php if($project['id']==$task['project_id']){ echo "selected";} ?> ><?php echo $project['title']; ?></option>
          <?php
        }}
        ?>
       </select>
      </div>
     </div>
     <div class="modal-footer">
      <button class="btn btn-primary">Update</button>
      <a href="<?php echo base_url().'Task/list'; ?>" class="btn-secondary btn">Cancel</a>
     </div>
 </form>
 <?php include 'footer.php'; ?>
</body>
 </html>