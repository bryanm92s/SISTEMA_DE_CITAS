<?php
/*
controlador para el manejo de Historiaclinica
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Historiaclinica extends CI_Controller {
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
		$vector["pagina"]="Listado de Historias clínicas";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tblhistoriaclinica');
		$crud->set_subject('Listado de Historia clinica');



		$crud->fields("id_paciente","id_medico","id_ciudad","estatura","peso","id_profesion","id_motivo_consulta","antecedente","id_diagnostico","tratamiento","fecha_ingreso");

		// Marca
		//$crud->required_fields("referencia","nombre","descripcion","costo","impuestos","presentacion","imagen","marca");

		$crud->required_fields("id_paciente","id_medico","id_ciudad","estatura","peso","id_profesion","id_motivo_consulta","antecedente","id_diagnostico","tratamiento","fecha_ingreso");

		//$crud->unique_fields(array("referencia"));

		// para traer datos de otra relaconada se usa set_relation y lo compone:
		// el nombre del campo en la tabla actual
		// la tabla asociada
		// que campos desea traer de la tabla asociada

		$crud->set_relation("id_paciente","tblpacientes","id");
		$crud->set_relation("id_medico","tblmedicos","id");
		$crud->set_relation("id_ciudad","tblciudades","nom_ciu");
		$crud->set_relation("id_profesion","tblprofesiones","nombre_profesion");
		$crud->set_relation("id_motivo_consulta","tblmotivosdeconsulta","nombre_motivo");
		$crud->set_relation("id_diagnostico","tbldiagnosticos","cod_diagnostico");


		//$crud->set_relation("categoria","tblcategoriasHistoriaclinica","nombre"); 
		// para volver un campo tipo file se usa la funcon set_field_upload y lo compone dos datos:
		// el nopmbre del campo
		// la ruta donde ubicar el archivo
		//$crud->set_field_upload("imagen","assets/uploads/files");

		//$crud->set_field_upload("imagen2","assets/uploads/files");

		// para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("id_paciente","Identificacion paciente");
		$crud->display_as("id_medico","Identificacion medico");
		$crud->display_as("id_ciudad","Ciudad");
		$crud->display_as("id_profesion","Profesion");
		$crud->display_as("id_motivo_consulta","Motivo consulta");
		$crud->display_as("id_diagnostico","Diagnostico");
		$crud->display_as("fecha_ingreso","Fecha ingreso");
		$crud->display_as("antecedente","Antecedente");


		// 
		$crud->columns("id_paciente","id_medico","id_motivo_consulta","antecedente","id_diagnostico","fecha_ingreso");

		$crud->order_by("id_paciente","asc");


		$output = $crud->render();
		$vector["crud"]=(array)$output;
		$this->load->view('historiaclinica',$vector);
	}
}