<!DOCTYPE html>
<html lang="en">
<head>
  <title>Subtask</title>
	<?php include 'toppage.php'; ?>
	<script type="text/javascript">
		function addtitle() {
			  var x = $("#title").val();
			  if(x != ''){
			  $('.subtable').append("<tr><td>"+ x +"</td><input type='hidden' name='titles[]' value='"+ x +"'/><td><input type='checkbox' name='check[]' value='"+ x +"'></td><td><a href='deleteRow(this)'><i class='fa fa-minus-circle' style='color:red;'></i></a></td></tr>");
			  $("#title").val('');
			  				}
			}
	</script>
	<style type="text/css">
		.subtable{
				  margin: 5%;
				  border: 0;
				  width: 30%;
				  text-align: center;
				}
		tr td{
			padding: 4%;
		}
	</style>
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
    
		<table class="subtable">
			<?php 
			if($subtasks != '')
			{
				foreach ($subtasks as $subtask) { ?>

					<tr><td><?php echo $subtask['title']; ?></td><input type='hidden' name='titles[]' value='<?php echo $subtask['title']; ?>'/><td><input type='checkbox' name='check[]' value='<?php echo $subtask['title']; ?>' <?php if($subtask['done'] == '1')echo " checked";?> ></td><td ><a onclick="$(this).parent().parent().remove();" ><i class='fa fa-minus-circle' style='color:red;'></i></a></td></tr>
 
			<?php	}
			}
			?>
		</table>
	</div>
	<div class="col-sm-6">
		<input id="savesub" name="save" class="btn btn-success" type="submit" value="save"/>
	</div>
	</form>
	<?php include 'footer.php'; ?>
  </div>
</body>
</html>