<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titulo;?></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>
<h1><?php echo $subtitulo;?></h1>
<div class="container">
	<a href="<?php echo site_url('usuario/ingresar/')?>" class="btn btn-info">Ingresar Nuevo registro</a>

	<?php 
	if (isset($mensaje)) echo $mensaje;
	?>
		<table id="tabla-usuario">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Estado</th>
					<th>OP</th>

				</tr>
			</thead>
			<tbody>
				<?php foreach ($listado as $fila) {

					$txtactivo="<span class='btn btn-info'>Activo</span>";
					if ($fila["activo"]==2) {
						$txtactivo="<span class='btn btn-danger'>Inactivo</span>";
					}
					?>
				<tr>
					<td><?php echo $fila["pkid"];?></td>
					<td><?php echo $fila["nombre"];?></td>
					<td><?php echo $fila["telefono"];?></td>
					<td><?php echo $fila["correo"];?></td>
					<td><?php echo $txtactivo;?></td>
					<td>
						<a href="<?php echo site_url('usuario/modificar/'.$fila["pkid"]);?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
						<a href="<?php echo site_url('usuario/eliminar/'.$fila["pkid"]);?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>

					</td>
				</tr>
				<?php } ?>			
			</tbody>
		</table>
</div>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#tabla-usuario').DataTable();
} );
</script>
</body>
</html>