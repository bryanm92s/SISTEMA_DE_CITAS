<?php
/*
Modelo para el manejo de pedidos
*/
class Pedidos_model extends CI_model
{
	
	function __construct()
	{
	}
	// funcion que permite listar los productos
	function listarproductos() {
		$query=$this->db->get("tblproductos");
		return $query->result_array();
	}

	// funcion agregar producto
	function agregar() {

		$ref=$this->input->post('ref');
		$ref=$this->security->xss_clean($ref);

		$precio=$this->input->post('precio');
		$precio=$this->security->xss_clean($precio);

		$impuestos=$this->input->post('impuestos');
		$impuestos=$this->security->xss_clean($impuestos);

		$cantidad=$this->input->post('cantidad');
		$cantidad=$this->security->xss_clean($cantidad);

		$subtotal=$this->input->post('subtotal');
		$subtotal=$this->security->xss_clean($subtotal);

		$token=$this->input->post('token');
		$token=$this->security->xss_clean($token);

		// como siempre se esta cambiando la cantidad
		// borreremos el registro y lo insertamos
		// luego invocaremos una function que me va a indicar en cuanto va el pedido

		$this->db->where("ref",$ref);
		$this->db->where("token",$token);
		$this->db->delete("tblpedidos_detalle");

		// proceso de insercion

		$data=array(
			"precio"=>$precio,
			"ref"=>$ref,
			"impuestos"=>$impuestos,
			"cantidad"=>$cantidad,
			"subtotal"=>$subtotal,
			"token"=>$token
		);

		if ($this->db->insert("tblpedidos_detalle",$data)) {
			// calcular en cuanto esta el pedido, basado en otra funcion para ese fin
			$total=$this->total_pedido();
		} else {
			$total="Error al insertar";
		}

		return $total;
	}

	// function que calcula en cuanto esta un pedido
	function total_pedido() {
		$token=$this->input->post('token');
		$token=$this->security->xss_clean($token);

		$vector=array(
			"token"=>$token
		);	

		$query=$this->db->get_where("tblpedidos_detalle",$vector);
		$res=$query->result_array();
		$total=0;
		foreach ($res as $detalle) {
			$total=$total+$detalle["subtotal"];	
		}

		return $total;

	}


	// function para total unidades.
	function total_unidades() {
		$token=$this->input->post('token');
		$token=$this->security->xss_clean($token);

		$vector=array(
			"token"=>$token
		);	

		$query=$this->db->get_where("tblpedidos_detalle",$vector);
		$res=$query->result_array();
		$total=0;
		foreach ($res as $detalle) {
			$total=$total+$detalle["cantidad"];	
		}

		return $total;

	}



	//Función de borrado de una cantidad de pedido.

	function eliminar(){

		$ref=$this->input->post('ref');
		$ref=$this->security->xss_clean($ref);

		$token=$this->input->post('token');
		$token=$this->security->xss_clean($token);

		$this->db->where("ref",$ref);
		$this->db->where("token",$token);
		$this->db->delete("tblpedidos_detalle");

		$total=$this->total_pedido();
		return $total;

	}

	//Método para finalizar el pedido.

	function finalizar(){

		//1.Capturar los datos del formulario que contiene
		//La información del cliente.

		$nombre=$this->input->post('nombre');
		$identificacion=$this->input->post('identificacion');
		$telefono=$this->input->post('telefono');
		$ciudad=$this->input->post('ciudad');
		$correo=$this->input->post('correo');
		$direccion=$this->input->post('direccion');

		//

		$nombre=$this->security->xss_clean($nombre)
		$identificacion=$this->security->xss_clean($identificacion)
		$telefono=$this->security->xss_clean($telefono)
		$ciudad=$this->security->xss_clean($ciudad)
		$correo=$this->security->xss_clean($correo)
		$direccion=$this->security->xss_clean($direccion)

		//

		$token=$this->input->post('token');
		$token=$this->security->xss_clean($token);

		//
		$valortotal=$this->input->total_pedido();

		//
		$total_unidades=$this->input->total_unidades();

		// Vector para cargar en la tabla.
		$data=array(

		"nombre"=>$nombre,
		"telefono"=>$telefono,
		"direccion"=>$direccion,
		"valortotal"=>$valortotal,
		"totalunidades"=>$totalunidades,
		"token"=>$token
	);

		if($this->db->insert("tblpedidos",$data)){
			$resp=1;
		}else{
			$resp=0;
		}
		return $resp;

	}

}

