<?php
/*
controlador para el manejo de Medicos
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Medicos extends CI_Controller {
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
		$vector["pagina"]="Listado de Médicos";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tblmedicos');
		$crud->set_subject('Listado de Medicos');

		$crud->fields("id","nombre","apellido","email","telefono","ciudad","direccion","imagen","id_especmed");
		
		$crud->required_fields("id","nombre","apellido","email","ciudad","imagen","id_especmed");

		$crud->unique_fields(array("id"));

		// para traer datos de otra relaconada se usa set_relation y lo compone:
		// el nombre del campo en la tabla
		// la tabla asociada
		// que campos desea traer de la tabla asociada

		$crud->set_relation("ciudad","tblciudades","nom_ciu");
		$crud->set_relation("id_especmed","tblespecialidad","nombre_especi");
		//$crud->set_relation("marca","tblmarcasMedicos","nombre"); 
		//$crud->set_relation("categoria","tblcategoriasMedicos","nombre");

		// para volver un campo tipo file se usa la funcon set_field_upload y lo compone dos datos:
		// el nopmbre del campo
		// la ruta donde ubicar el archivo

		$crud->set_field_upload("imagen","assets/uploads/files");
		//$crud->set_field_upload("imagen2","assets/uploads/files");


		// para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("id","Identificacion");
		$crud->display_as("nombre","Nombre");
		$crud->display_as("apellido","Apellido");
		$crud->display_as("email","Correo electronico");
		$crud->display_as("ciudad","Ciudad");
		$crud->display_as("imagen","Foto");
		$crud->display_as("id_especmed","Especialidad");

		// 
		$crud->columns("imagen","id","nombre","apellido","email","ciudad","id_especmed");

		$crud->order_by("id","asc");


		$output = $crud->render();
		$vector["crud"]=(array)$output;
		$this->load->view('Medicos',$vector);
	}
}