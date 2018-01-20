<?php
	include('conexion.php');
	if(isset($_POST['add'])){
		$nombre=$_POST['nombre'];
		$puesto=$_POST['puesto'];
		
		mysqli_query($conn,"insert into `empleados` (nombre, puesto) values ('$nombre', '$puesto')");
	}
?>
