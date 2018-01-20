<?php
	include('conexion.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>Nombre</th>
				<th>Puesto</th>
				<th>Accion</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"select * from `empleados`");
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['nombre']; ?></td>
									<td><?php echo $urow['puesto']; ?></td>
									<td><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Editar</button> | <button class="btn btn-danger delete" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-trash"></span> Borrar</button>
									<?php include('editar.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}

?>