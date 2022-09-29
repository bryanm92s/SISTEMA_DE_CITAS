<?php
/*
controlador para el manejo de marcas de productos
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Marcasmedicamentos extends CI_Controller {

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
		$vector["pagina"]="Listado Marcas de medicametos";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');

		// uso del CRUD.
		// invocar la libreria
		$crud = new grocery_CRUD();
		// invocar los parametros base:
		// el titulo, la tabla y el estilo que deseemos. Recomendado el flexigrid
		// pórque datatables puede generar conflicto con otros que esten dentro del
		// template
		$crud->set_theme('flexigrid');
		$crud->set_table('tblmarcamedi');
		$crud->set_subject('Listado de Marcas  de medicamentos');
		// para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("nombre_marca","Nombre marca");
		$crud->display_as("fechar","Fecha de registro");
		$crud->display_as("fecham","Fecha de modificación");
		// para indicar que campos son obligatorios usamos required_fields
		$crud->required_fields("nombre_marca");

		// para indicarle ordenar los registros se usa order_by
		//$crud->order_by("nombre_marca","asc");
		// para indicarle que campos deseamos usar tanto en la edicon como en la eliminacion usamos add_fields, edit_fields
		$crud->add_fields("nombre_marca");
		$crud->edit_fields("nombre_marca");
		// sino deseamos usar el add o edit, simplemente usamos fields
		// para indicarle que campo o campos son unico se usa unique_fields y se debe pasar como un vector o array
		$crud->unique_fields(array("nombre_marca"));
		// para indicarle que botones no deseamos mostrar usamos unset_ y aplica para add, edit, clone, delete, export, print, list, view

		// Mostrar listado.
		$crud->columns("nombre_marca");
		$crud->order_by("nombre_marca","asc");


		// cargar los parametros al crud por medo de una funcion propia llamada render
		$output = $crud->render();
		// pasar el output a la vista
		$vector["crud"]=(array)$output;

		$this->load->view('marcasmedicamentos',$vector);
	}
}