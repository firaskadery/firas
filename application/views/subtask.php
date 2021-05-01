<!DOCTYPE html>
<html lang="en">
<head>
  <title>Subtask</title>
	<?php include 'toppage.php'; ?>
	<script type="text/javascript">
		function addtitle() {
			  var x = document.getElementById("title").value;
			  if(x != ''){
			  $('#list').append("<li class='list-group-item'><label>"+ x +"</label><input type='hidden' name='checkbox[]' value='"+ x +"'/><input type='checkbox' name='check[]' value='"+ x +"' style='margin-left:20px;'>");
			  				}
			}
	</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<?php 
		include 'sidebar.php';
	?>
	<form method="post" action = "<?php echo base_url()."Task/savesubtasks"; ?>">
		<input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
	<div class="col-sm-6">
		<input id="title" type="text" name="subtitle" >
        <a href="javascript:addtitle();" class="btn btn-success"><span>Add</span></a>
    
		<ul class="list-group list-group-flush" id="list"></ul>
	</div>
	<div class="col-sm-6">
		<input id="savesub" name="save" class="btn btn-success" type="submit" value="save"/>
	</div>
	</form>
	<?php include 'footer.php'; ?>
  </div>
</body>
</html>