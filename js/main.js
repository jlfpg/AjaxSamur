//CRUD
$(document).ready(function(){
	showUser();
	//Insert
	$(document).on('click', '#nuevo', function(){
		if ($('#nombre').val()=="" || $('#puesto').val()==""){
			alert('Por favor introduzca datos validos');
		}
		else{
			$nombre=$('#nombre').val();
			$puesto=$('#puesto').val();
				$.ajax({
					type: "POST",
					url: "php/insertar.php",
					data: {
						nombre: $nombre,
						puesto: $puesto,
						add: 1,
					},
					success: function(){
						showUser();
						ClearFields();
					}
				});
			}
		});
		
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
				$.ajax({
					type: "POST",
					url: "php/borrar.php",
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
			
			if ($('#unombre').val()=="" || $('#upuesto').val()==""){
				alert('Por favor introduzca datos validos');
			}else{
				$.ajax({
					type: "POST",
					url: "php/actualizar.php",
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
			}
		});
	});
	
//funcion que pinta la tabla
function showUser(){
	$.ajax({
		url: 'php/leer.php',
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
//funcion que limpia los text fields tras insertar
function ClearFields() {
     document.getElementById("nombre").value = "";
     document.getElementById("puesto").value = "";
}
