<?php
 
$conn = mysqli_connect("localhost","root","","ajaxsamur");
if (!$conn) {
	die("Error de conexion: " . mysqli_connect_error());
}
 
?>