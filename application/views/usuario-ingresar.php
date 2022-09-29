<?php
// este formularo se usa para ingresar y modificar
// las variables del formulario se deben setear para que reciba tanto a ingresar como modificar
$nombre="";
$telefono="";
$correo="";
$clave="";
$activo="";
$ruta="usuario/ingresar/";
if (isset($detalleregistro)) {

	$ruta="usuario/modificar/";

	foreach ($detalleregistro as $fila) {

			$nombre=$fila["nombre"];
			$telefono=$fila["telefono"];
			$correo=$fila["correo"];
			$clave=$fila["clave"];
			$activo=$fila["activo"];
			$id=$fila["pkid"];	
	}
	$ruta.=$id;

}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titulo;?></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1><?php echo $subtitulo;?></h1>
<div class="container">
	<a href="<?php echo site_url('usuario/')?>" class="btn btn-info">Regresar</a>
	
<?php 

if (isset($mensaje)) echo $mensaje;

echo form_open($ruta);?>


	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" id="nombre" class="form-control" required value="<?php echo $nombre;?>">
	</div>
	<div class="form-group">
		<label for="telefono">Telefono:</label>
		<input type="number" name="telefono" id="telefono" class="form-control" required value="<?php echo $telefono;?>">
	</div>
	<div class="form-group">
		<label for="correo">Correo:</label>
		<input type="email" name="correo" id="correo" class="form-control" required value="<?php echo $correo;?>">
	</div>
	<div class="form-group">
		<label for="clave">Clave:</label>
		<input type="password" name="clave" id="clave" class="form-control" value="">
	</div>

	<div class="form-group">
		<label for="activo">Activo?</label>
		<select id="activo" name="activo" required class="form-control">
				<option>---</option>
				<option value="1" <?php if ($activo=="1") echo "selected";?>>SI</option>
				<option value="2" <?php if ($activo=="2") echo "selected";?>>NO</option>
		</select>
	</div>
	<div class="form-group">
		<label for="boton"></label>
		<button name="boton" id="boton" class="btn btn-info">GRABAR</button>
	</div>
</form>

</div>

</body>
</html>