<?php
/*
controlador para la salida del sistema
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Salir extends CI_Controller {

	public function __construct() {
		parent:: __construct();
	}

	public function index()
	{
		// destruir la session y mandarlo de nuevo a la pagina de logueo
		$this->session->sess_destroy();
		redirect('login');
	}
}
 