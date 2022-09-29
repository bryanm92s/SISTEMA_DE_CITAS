<?php
/*
controlador para el manejo de Formulas
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Formulas extends CI_Controller {
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
		$vector["pagina"]="Listado de Fórmulas";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tblformula');
		$crud->set_subject('Listado de Formulas');



		$crud->fields("id_paciente","id_medico","fecha_form","referencia1","cantidad1","referencia2","cantidad2","referencia3","cantidad3","observaciones");

		// Marca
		//$crud->required_fields("referencia","nombre","descripcion","costo","impuestos","presentacion","imagen","marca");

		$crud->required_fields("id_paciente","id_medico","fecha_form","referencia1","cantidad1");

		//$crud->unique_fields(array("referencia"));

		// para traer datos de otra relaconada se usa set_relation y lo compone:
		// el nombre del campo en la tabla
		// la tabla asociada
		// que campos desea traer de la tabla asociada

		$crud->set_relation("id_paciente","tblpacientes","id");
		$crud->set_relation("id_medico","tblmedicos","id");
		$crud->set_relation("referencia1","tblmedicamentos","nombre");
		$crud->set_relation("referencia2","tblmedicamentos","nombre");
		$crud->set_relation("referencia3","tblmedicamentos","nombre");


		//$crud->set_relation("categoria","tblcategoriasFormulas","nombre"); 
		// para volver un campo tipo file se usa la funcon set_field_upload y lo compone dos datos:
		// el nopmbre del campo
		// la ruta donde ubicar el archivo
		//$crud->set_field_upload("imagen","assets/uploads/files");

		//$crud->set_field_upload("imagen2","assets/uploads/files");


		// para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("id_paciente","Identificacion paciente");
		$crud->display_as("id_medico","Identificacion medico");
		$crud->display_as("fecha_form","Fecha formula");
		$crud->display_as("referencia1","Medicamento #1");
		$crud->display_as("cantidad1","Cantidad #1");
		$crud->display_as("referencia2","Medicamento #2");
		$crud->display_as("cantidad2","Cantidad #2");
		$crud->display_as("referencia3","Medicamento #3");
		$crud->display_as("cantidad3","Cantidad #3");

		$crud->display_as("observaciones","Observaciones");


		// 
		$crud->columns("id","id_paciente","id_medico","fecha_form","referencia1","cantidad1","observaciones");

		$crud->order_by("id_paciente","asc");


		$output = $crud->render();
		$vector["crud"]=(array)$output;
		$this->load->view('formulas',$vector);
	}
}