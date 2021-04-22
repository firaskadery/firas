<!DOCTYPE html>
<html lang="en">
<head>
  <title>Subtask</title>
	<?php include 'toppage.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<?php 
		include 'sidebar.php';

  		if (isset($_POST['add'])) 
  		{
    		$subtitle = $_POST['subtitle'];

			$array = array();

			//ADD YOUR NEW ELEMENT TO THE ARRAY
			$array = array_push( $array, $subtitle);

			//store the new serialized (converted to string) array
			$_SESSION['my_array'] = serialize( $array );

			if ( isset($_SESSION['my_array']) ) {

    		//grab the serialized (string version) of the array, and convert it back to an array

    		$my_array = unserialize( $_SESSION['my_array'] ); //holds [0] => "el1", [1] => "el2"
													
													}
  		}
	?>
	<form action="" method="post">
	<input type="text" name="subtitle">
	<input name="add" type="submit" value="add" />
	</form>
	<div class="form-group">
		<ul class="list-group list-group-flush">
			<?php 
			if (isset($_POST['add'])) 
  			{
  			?>
            <li class="list-group-item">
            <?php echo $_SESSION['my_array']; ?>
            <label class="checkbox">
            <input type="checkbox" />
            <span class="default"></span>
            </label>
            </li>
			<?php
			}
			?>
		</table>
	</div>
	<input name="save" type="submit" value="save" />
	<?php include 'footer.php'; ?>
  </div>
</body>
</html>