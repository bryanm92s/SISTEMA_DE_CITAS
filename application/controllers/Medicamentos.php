<?php
/*
controlador para el manejo de Medicamentos
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Medicamentos extends CI_Controller {
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
		$vector["pagina"]="Listado de medicamentos";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');

		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tblmedicamentos');
		$crud->set_subject('Listado de Medicamentos');

		$crud->fields("referencia","nombre","descripcion","costo","impuestos","presentacion","imagen","marca");

		// Marca
		//$crud->required_fields("referencia","nombre","descripcion","costo","impuestos","presentacion","imagen","marca");

		$crud->required_fields("referencia","nombre","descripcion","costo","impuestos","presentacion","imagen");

		$crud->unique_fields(array("referencia"));

		// para traer datos de otra relaconada se usa set_relation y lo compone:
		// el nombre del campo en la tabla
		// la tabla asociada
		// que campos desea traer de la tabla asociada
		$crud->set_relation("presentacion","tblpresenmedicamentos","nombre_med"); 
		$crud->set_relation("marca","tblmarcamedi","nombre_marca");

		//$crud->set_relation("categoria","tblcategoriasMedicamentos","nombre"); 
		// para volver un campo tipo file se usa la funcon set_field_upload y lo compone dos datos:
		// el nopmbre del campo
		// la ruta donde ubicar el archivo
		$crud->set_field_upload("imagen","assets/uploads/files");

		//$crud->set_field_upload("imagen2","assets/uploads/files");
		// 
		$crud->columns("imagen","referencia","nombre","descripcion","marca","presentacion");

		$crud->order_by("referencia","asc");


		$output = $crud->render();
		$vector["crud"]=(array)$output;
		$this->load->view('medicamentos',$vector);
	}
}