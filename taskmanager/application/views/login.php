<!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'toppage.php';
?>
</head>
<body>
<div class="text-center">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<p><br/>App</p>
				</div>				
				<h4 class="modal-title">Login</h4>	
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url().'account/login'; ?>" method="POST">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pass" placeholder="Password" required="required">	
					</div>     
					<?php 
					if($v == '1')
					{
					?>
					<div>
						<p style="color: red;">Incorrect username or password</p>	
					</div>
					<?php
					$this->session->set_userdata('v','0');
					}
				 	?>  
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>     
</body>
</html>