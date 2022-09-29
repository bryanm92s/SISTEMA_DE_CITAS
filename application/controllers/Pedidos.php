<?php
/*
controlador pedidos
este controlador permitira
crear nuevo pedido
listar pedidos
elminar pedidos
agregar producto a pedido
eliminar producto de un pedido
crear y saber en cuanto esta la el pedido
Para eso usaremos este controlador y crearemos un modelo que soporte
todas las operaciones
la gran mayora de ellas estaran invocadas desde AJAX

*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Pedidos extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('pedidos_model');
		if (!$this->session->userdata("pkid")) {
			redirect('login');
		}
	}

	public function index()
	{
		$vector["titulo"]="Sistema de pedidos";
		$vector["pagina"]="Listado de pedidos";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');
		$this->load->view('listado',$vector);
	}
	public function nuevo()
	{
		$vector["titulo"]="Sistema de pedidos";
		$vector["pagina"]="Realizar pedido";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');
		
		$vector["listarproductos"]=$this->pedidos_model->listarproductos();

		// para diferencia cada uno de los pedidos se recomienda 
		// colocar algun parametro que sea unico y por session de usuario
		// se puede usar cualquier forma, como un random, fechalarga , pero 
		// teniendo en cuenta que debe ser siempre diferente
		// 
		$token=random_bytes(32).session_id();
		$token=base64_encode($token);
		$vector["token"]=$token;

		$this->load->view('nuevopedido',$vector);
	}

	// metodo agregar
	function agregar() {
		$resp=$this->pedidos_model->agregar();
		echo $resp;
	}

	// metodo eliminar
	function eliminar() {
		$resp=$this->pedidos_model->eliminar();
		echo $resp;
	}

		// metodo finalizar
	function finalizar() {
		$resp=$this->pedidos_model->finalizar();
		echo $resp;
	}


}
 