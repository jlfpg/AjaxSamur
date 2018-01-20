<?php
	include('conexion.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$puesto=$_POST['puesto'];
		
		mysqli_query($conn,"update `empleados` set nombre='$nombre', puesto='$puesto' where id='$id'");
	}
?>