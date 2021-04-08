<!DOCTYPE html>
<html lang="en">
<head>
	<title>Log Out</title>
<meta charset="utf-8">
<?php
include 'toppage.php';
?>
</head>
<body>
	<?php
	include 'sidebar.php';
	?>
<div class="text-center">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<p><br/>Profile</p>
				</div>				
				<h4 class="modal-title">
					<?php
					echo $name;
					?>
				</h4>	
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url().'Account/logout'; ?>" method="post">
					       
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">LogOut</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	<?php include 'footer.php'; ?>
</body>
</html>