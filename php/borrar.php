<?php
	include('conexion.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from `empleados` where id='$id'");
	}
?>