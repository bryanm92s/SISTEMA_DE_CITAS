<?php
/*
controlador principal
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Principal extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		if (!$this->session->userdata("pkid")) {
			redirect('login');
		}
	}

	public function index()
	{

		$vector["titulo"]="EPS SALUD TOTAL";
		$vector["pagina"]="Principal del sistema";
		$vector["nombreusuario"]=$this->session->userdata('nombre');
		$vector["fotousuario"]=$this->session->userdata('foto');
		$vector["idusuario"]=$this->session->userdata('pkid');

		$this->load->view('principal',$vector);
	}
}
 