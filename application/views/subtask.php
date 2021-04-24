<!DOCTYPE html>
<html lang="en">
<head>
  <title>Subtask</title>
	<?php include 'toppage.php'; ?>
	<script type="text/javascript">
		function addtitle() {
			  var x = document.getElementById("title").value;
			  $('#list').append("<li class='list-group-item'>"+ x +"<label style='padding-left:20px;' name='"+ x +"'><input type='checkbox' name='check[]' value='"+ x +"'></label>");

			}
	</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<?php 
		include 'sidebar.php';
	?>
	<form method="post" action = "<?php echo base_url()."Task/savesubtasks"; ?>">
	<div class="col-sm-6">
		<input id="title" type="text" name="subtitle">
        <a href="javascript:addtitle();" class="btn btn-success"><span>Add</span></a>
    
		<ul class="list-group list-group-flush" id="list"></ul>
	</div>
	<div class="col-sm-6">
		<input name="save" class="btn btn-success" type="submit" value="save"/>
	</div>
	</form>
	<?php include 'footer.php'; ?>
  </div>
</body>
</html>