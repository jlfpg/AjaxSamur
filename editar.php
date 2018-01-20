<div class="modal fade" id="edit<?php echo $urow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from `empleados` where id='".$urow['id']."'");
		$nrow=mysqli_fetch_array($n);
	?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center><h3 class = "text-success modal-title">Actualizar Empleado</h3></center>
		</div>
		<form class="form-inline">
		<div class="modal-body">
			Nombre: <input type="text" value="<?php echo $nrow['nombre']; ?>" id="unombre<?php echo $urow['id']; ?>" class="form-control">
			<br><br>
			Puesto: <input type="text" value="<?php echo $nrow['puesto']; ?>" id="upuesto<?php echo $urow['id']; ?>" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancelar</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Guardar</button>
		</div>
		</form>
    </div>
  </div>
</div>