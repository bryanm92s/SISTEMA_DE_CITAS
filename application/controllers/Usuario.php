<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
		parent:: __construct(); // carga el constructor del controlador principal

		// invocar el modelo
		$this->load->model('usuario_model');
	}

	public function index()
	{
		$vector["titulo"]="EPS SALUD TOTAL";
		$vector["subtitulo"]="Listado de usuarios";
		// traer los datos de la tabla
		$registros=$this->usuario_model->listar();
		$vector["listado"]=$registros;

		$this->load->view('usuario',$vector);
	}

	// metodo para ingresar datos de usuarios
	public function ingresar() {

		$vector["titulo"]="Principal usuarios";
		$vector["subtitulo"]="Editando  / Ingresando Registro";

		// preguntar si estamos pasando datos de un formulario
		if (count($_POST)>0) {
			// invocar la funcon de registro del model
			// la vamos a guardar en una variable y de acuerdo a la repuesta
			// mandamos el resultado a la vista
			$resp=$this->usuario_model->registro();
			$mensaje="<span class='btn btn-success'>Datos ingresados</span>";
			if ($resp==0) {
				$mensaje="<span class='btn btn-warning'>El registro ya existe o no se puede ingresar</span>";
			}	
			//
			$vector["mensaje"]=$mensaje;			
		}

		$this->load->view('usuario-ingresar',$vector);


	}

	// metodo para modificar
	public function modificar($param) {

		$vector["titulo"]="Principal usuarios";
		$vector["subtitulo"]="Editando Registro";

		// preguntar si estamos pasando datos de un formulario
		if (count($_POST)>0) {
			$resp=$this->usuario_model->modificar($param);
			$mensaje="<span class='btn btn-success'>Datos modificados</span>";
			if ($resp==0) {
				$mensaje="<span class='btn btn-warning'>El registro no se puede modificar</span>";
			}	
			//
			$vector["mensaje"]=$mensaje;			
		}
		// funcion que permite cargar los datos del registro a modificar
		$datos=$this->usuario_model->detalle($param);
		$vector["detalleregistro"]=$datos;


		$this->load->view('usuario-ingresar',$vector);


	}


	// metodo que permite elimnar
	function eliminar($param) {
		// modelo
		$resp=$this->usuario_model->eliminar($param);

		$vector["mensaje"]="<span class='btn btn-danger' >Datos borrados del sistema</span>";
		$vector["titulo"]="Principal usuarios";
		$vector["subtitulo"]="Listado de usuarios";
		// traer los datos de la tabla
		$registros=$this->usuario_model->listar();
		$vector["listado"]=$registros;
		$this->load->view('usuario',$vector);

	
	}


}
