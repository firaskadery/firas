<!DOCTYPE html>
<html lang="en">
<head>
  <title>Subtask</title>
	<?php include 'toppage.php'; ?>
	<script type="text/javascript">
		function addtitle() {
			  var x = $("#title").val();
			  if(x != ''){
			  $('#list').append("<li class='list-group-item'><label>"+ x +"</label><input type='hidden' name='titles[]' value='"+ x +"'/><input type='checkbox' name='check[]' value='"+ x +"' style='margin-left:20px;'>");
			  $("#title").val('');
			  				}
			}
	</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<?php 
		include 'sidebar.php';
	?>
	<form method="post" action = "<?php echo base_url()."task/savesubtasks"; ?>">
		<input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
	<div class="col-sm-6">
		<input id="title" type="text" name="subtitle" style="height: 30px;" placeholder="  enter title for subtask...">
        <a href="javascript:addtitle();" class="btn btn-primary"><span>Add</span></a>
    
		<ul class="list-group list-group-flush" id="list">
			<?php 
			if($subtasks != '')
			{
				foreach ($subtasks as $subtask) { ?>

					<li class='list-group-item'><label><?php echo $subtask['title']; ?></label><input type='hidden' name='titles[]' value='<?php echo $subtask['title']; ?>'/><input type='checkbox' name='check[]' value='<?php echo $subtask['title']; ?>' style='margin-left:20px;'  <?php if($subtask['done'] == '1')echo " checked";?> >
 
			<?php	}
			}
			?>
		</ul>
	</div>
	<div class="col-sm-6">
		<input id="savesub" name="save" class="btn btn-success" type="submit" value="save"/>
	</div>
	</form>
	<?php include 'footer.php'; ?>
  </div>
</body>
</html>