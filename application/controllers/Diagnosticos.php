<?php
/*
controlador para el manejo de Diagnosticos
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Diagnosticos extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		// libreria para manejo de cruds
		$this->load->library('grocery_CRUD');

		if (!$this->session->userdata("pkid")) {
			redirect('login');
		}
	}

	public function index()
	{

		$vector["titulo"]="EPS SALUD TOTAL";
		$vector["pagina"]="Listado de Diagnósticos";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tbldiagnosticos');
		$crud->set_subject('Listado de Diagnosticos');

		$crud->fields("cod_diagnostico","descripcion_diagnostico");

		
		$crud->required_fields("cod_diagnostico","descripcion_diagnostico");

		//$crud->unique_fields(array("cod_diagnostico"));

		// para traer datos de otra relaconada se usa set_relation y lo compone:
		// el nombre del campo en la tabla
		// la tabla asociada
		// que campos desea traer de la tabla asociada

		//$crud->set_relation("ciudad","tblciudades","nom_ciu");
		//$crud->set_relation("marca","tblmarcasDiagnosticos","nombre"); 
		//$crud->set_relation("categoria","tblcategoriasDiagnosticos","nombre");

		// para volver un campo tipo file se usa la funcon set_field_upload y lo compone dos datos:
		// el nopmbre del campo
		// la ruta donde ubicar el archivo

		//$crud->set_field_upload("imagen","assets/uploads/files");
		//$crud->set_field_upload("imagen2","assets/uploads/files");


		// para colocarle el nombre de columna que deseemos usamos display_as


		$crud->display_as("cod_diagnostico","Codigo diagnostico");
		$crud->display_as("descripcion_diagnostico","Descripcion diagnostico");
		//$crud->display_as("ciudad","Ciudad");
		//$crud->display_as("imagen","Foto");

		// 
		$crud->columns("cod_diagnostico","descripcion_diagnostico","fechar","fecham");

		$crud->order_by("cod_diagnostico","asc");


		$output = $crud->render();
		$vector["crud"]=(array)$output;
		$this->load->view('diagnosticos',$vector);
	}
}