<?php
/*
controlador para el manejo de Pacientes
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Pacientes extends CI_Controller {
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
		$vector["pagina"]="Listado de Pacientes";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tblpacientes');
		$crud->set_subject('Listado de Pacientes');

		$crud->fields("id","nombre","apellido","email","telefono","ciudad","direccion","observaciones","imagen");
		
		$crud->required_fields("id","nombre","apellido","email","ciudad","imagen");

		$crud->unique_fields(array("id"));

		// para traer datos de otra relaconada se usa set_relation y lo compone:
		// el nombre del campo en la tabla
		// la tabla asociada
		// que campos desea traer de la tabla asociada

		$crud->set_relation("ciudad","tblciudades","nom_ciu"); 
		//$crud->set_relation("marca","tblmarcasPacientes","nombre"); 
		//$crud->set_relation("categoria","tblcategoriasPacientes","nombre");

		// para volver un campo tipo file se usa la funcon set_field_upload y lo compone dos datos:
		// el nopmbre del campo
		// la ruta donde ubicar el archivo

		//$crud->set_field_upload("imagen1","assets/uploads/files");
		//$crud->set_field_upload("imagen2","assets/uploads/files");


		// para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("id","Identificacion");
		$crud->display_as("nombre","Nombre");
		$crud->display_as("apellido","Apellido");
		$crud->display_as("email","Correo electronico");
		$crud->display_as("ciudad","Ciudad");
		$crud->display_as("imagen","Foto");

		// para volver un campo tipo file se usa la funcon set_field_upload y lo compone dos datos:
		// el nopmbre del campo
		// la ruta donde ubicar el archivo
		$crud->set_field_upload("imagen","assets/uploads/files");

		// 
		$crud->columns("imagen","id","nombre","apellido","email","ciudad");

		$crud->order_by("nombre","asc");


		$output = $crud->render();
		$vector["crud"]=(array)$output;
		$this->load->view('Pacientes',$vector);
	}
}
 