<?php
// pagina que contiene todo el manejo de los pedidos
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
Su compra va en: <span class="btn btn-success">$ <span class="btn btn-info" id="valor_pedido">000.000</span></span>
</div>
<?php
$atributos=array("id"=>"frmpedidos","name"=>"frmpedidos");
echo form_open('pedidos/agregar',$atributos);
?>
<input type="hidden" name="token" id="token" value="<?php echo $token;?>">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Imagen</th>
					<th>Referencia</th>
					<th>Valor</th>
					<th>Impuesto</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($listarproductos as $detalle) {?>
				<tr>
					<td>
						<?php
						if ($detalle["imagen1"]<>"") {
							?>
							<img src="<?php echo base_url();?>/assets/uploads/files/<?php echo $detalle["imagen1"]?>" class="" style="width: 50px;height: 40px;">
							<?php 
						}
						?>

					</td>
					<td><?php echo $detalle["referencia"]?>
						<input type="hidden" name="referencia_<?php echo $detalle["id"];?>" id="referencia_<?php echo $detalle["id"];?>" value="<?php echo $detalle["referencia"];?>">		

					</td>
					<td>
						<input type="number" name="valor_<?php echo $detalle["id"];?>" id="valor_<?php echo $detalle["id"];?>" class="form-control" readonly maxlength="20" value="<?php echo $detalle["costo"]?>">
					</td>
					<td>
						<input type="number" name="impuesto_<?php echo $detalle["id"];?>" id="impuesto_<?php echo $detalle["id"];?>" class="form-control" readonly maxlength="5" value="<?php echo $detalle["impuestos"]?>">
					</td>
					<td>
						<input type="number" name="cantidad_<?php echo $detalle["id"];?>" id="cantidad_<?php echo $detalle["id"];?>" class="form-control" maxlength="5" onkeypress="calcular('<?php echo $detalle["id"]?>')" onkeydown="calcular('<?php echo $detalle["id"]?>')" onkeyup="calcular('<?php echo $detalle["id"]?>')">
					</td>
					<td>
						<input type="number" name="subtotal_<?php echo $detalle["id"];?>" id="subtotal_<?php echo $detalle["id"];?>" class="form-control" readonly maxlength="20">
					</td>
					<td nowrap>
						<button name="add" id="add" class="btn btn-warning" type="button" onclick="agregar('<?php echo $detalle["id"];?>')">Ad</button>
						<button name="quitar" id="quitar" type="button" class="btn btn-danger" onclick="eliminar('<?php echo $detalle["id"];?>')">Quitar</button>
						<span id="mensaje_<?php echo $detalle["id"];?>"></span>

					</td>
				</tr>
			<?php } ?>
			</tbody>


	</table>
 
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
Datos del comprador
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<div class="row">
		<div class="col col-3">
			<input type="text" name="nombre" id="nombre" placeholder="Digite el nombre" class="form-control" required maxlength="100">
		</div>
		<div class="col col-3">
			<input type="number" name="identificacion" id="identificacion" placeholder="Digite su ID" class="form-control" required maxlength="15">
		</div>

		<div class="col col-3">
			<input type="number" name="telefono" id="telefono" placeholder="Digite su Tel/Cel" class="form-control" required maxlength="15">
		</div>
		<div class="col col-3">
			<input type="text" name="ciudad" id="ciudad" placeholder="Ciudad destino" class="form-control" required maxlength="50">
		</div>
	</div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<div class="row">
		<div class="col col-6">
			<input type="email" name="correo" id="correo" placeholder="Digite el correo" class="form-control" required>
		</div>
		<div class="col col-6">
			<input type="text" name="direccion" id="direccion" placeholder="Digite su direccion" class="form-control" required maxlength="255">
		</div>
	</div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<button id="finalizar" name="finalizar" class="btn btn-info">Finalizar Pedido</button>
</div>

</form>



