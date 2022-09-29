<?php
/*
controlador para el manejo de tipos de usuarios
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Tiposdeusuarios extends CI_Controller {

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

		$vector["titulo"]="Sistema de pedidos";
		$vector["pagina"]="Tipos de usuarios";
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
		$crud->set_table('tbltiposdeusuarios');
		$crud->set_subject('Listado de tipos de usuarios');
		// para colocarle el nombre de columna que deseemos usamos display_as
		$crud->display_as("nombre","Tipo de usuario");
		$crud->display_as("fechar","Fecha de registro");
		$crud->display_as("fecham","Fecha de modificación");
		// para indicar que campos son obligatorios usamos required_fields
		$crud->required_fields("nombre");
		// para indicarle ordenar los registros se usa order_by
		$crud->order_by("nombre","asc");
		// para indicarle que campos deseamos usar tanto en la edicon como en la eliminacion usamos add_fields, edit_fields
		$crud->add_fields("nombre");
		$crud->edit_fields("nombre");
		// sino deseamos usar el add o edit, simplemente usamos fields
		// para indicarle que campo o campos son unico se usa unique_fields y se debe pasar como un vector o array
		$crud->unique_fields(array("nombre"));
		// para indicarle que botones no deseamos mostrar usamos unset_ y aplica para add, edit, clone, delete, export, print, list, view
		$crud->unset_delete();
		$crud->unset_clone();



		// cargar los parametros al crud por medo de una funcion propia llamada render
		$output = $crud->render();
		// pasar el output a la vista
		$vector["crud"]=(array)$output;

		$this->load->view('tiposdeusuarios',$vector);
	}
}
 