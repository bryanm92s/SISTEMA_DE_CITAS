<?php
/*
controlador de acceso por defecto a la aplicacion
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct() {
		parent:: __construct();
		$this->load->model('usuario_model');
	}


	public function index()
	{

		$vector["titulo"]="EPS SALUD TOTAL";

		if (count($_POST)>0) { // esta enviando datos y entra

			//proceso de validacion de acceso al sistema
			// para eso usaremos el modelo de usuario e invocamos un metodo que permita realizar la verificacon del usuario y la clave digitados en el formulario
			$resp=$this->usuario_model->validar_acceso();
			// si la respuesta es un vector >0 vamos a cargar las sessiones
			if (sizeof($resp)>0) {
				// cargar un vector para asociarlo a la session
				$data=array(
					"pkid"=>$resp[0]["pkid"],
					"nombre"=>$resp[0]["nombre"],
					"telefono"=>$resp[0]["telefono"],
					"correo"=>$resp[0]["correo"],
					"foto"=>$resp[0]["foto"],

				);
				$this->session->set_userdata($data);
				redirect('principal');	
			}
			// en caso contrario el sale y carga login de nuevo  
		}

		$this->load->view('login',$vector);



	}
}
