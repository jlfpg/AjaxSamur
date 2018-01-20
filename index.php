<?php
	include('conexion.php');
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<title>PHP CRUD AJAX/JQuery</title>
	</head>
<body>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-3">
		</div>
		<div class = "col-md-6 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h1 class = "text-primary">PHP - CRUD Empleados Samur usando AJAX/JQuery</h1></center>
					<hr>
				<div>
				<br>
				<center><h3>Insercion de un nuevo Empleado</h3></center>
				<br>
					<form class = "form-inline">
						<div class = "form-group">
							<label>Nombre:</label>
							<input type  = "text" id = "nombre" class = "form-control">
						</div>
						<div class = "form-group">
							<label>Puesto:</label>
							<input type  = "text" id = "puesto" class = "form-control">
						</div>
						<div class = "form-group">
							<button type = "button" id="nuevo" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add</button>
						</div>
					</form>
				</div>
                </div>
            </div><br>
			<div class="row">
			<div id="userTable"></div>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		showUser();
		//Add New
		$(document).on('click', '#nuevo', function(){
			if ($('#nombre').val()=="" || $('#puesto').val()==""){
				alert('Por favor introduzca datos validos');
			}
			else{
			$nombre=$('#nombre').val();
			$puesto=$('#puesto').val();				
				$.ajax({
					type: "POST",
					url: "insertar.php",
					data: {
						nombre: $nombre,
						puesto: $puesto,
						add: 1,
					},
					success: function(){
						showUser();
					}
				});
			}
		});
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
				$.ajax({
					type: "POST",
					url: "borrar.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
		//Update
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$unombre=$('#unombre'+$uid).val();
			$upuesto=$('#upuesto'+$uid).val();
				$.ajax({
					type: "POST",
					url: "actualizar.php",
					data: {
						id: $uid,
						nombre: $unombre,
						puesto: $upuesto,
						edit: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
	
	});
	
	//Showing our Table
	function showUser(){
		$.ajax({
			url: 'leer.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
</html>