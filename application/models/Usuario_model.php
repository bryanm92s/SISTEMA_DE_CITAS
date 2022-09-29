<?php
/*
Modelo para la tabla usuarios
En este caso se crea una clase con el mismo nombre del archivo y que tenga relacion con el controlador que la va invocar
*/
class Usuario_model extends CI_model
{
	
	function __construct()
	{
	}
	// funcion que permite listar los datos
	function listar() {
		// traer los registros de la tabla y pasarlos al controlador
		// recuerden que todos los framewokrs pasan los parametros como arrays
		$query=$this->db->get("tblusuarios");
		return $query->result_array();
	}


	// funcion que permite registrar
	function registro() {
		// recuperar los parametros que se estan enviando desde el formularo

		$nombre=$this->input->post('nombre');
		$nombre=$this->security->xss_clean($nombre);
		//
		$telefono=$this->input->post('telefono');
		$telefono=$this->security->xss_clean($telefono);
		//
		$correo=$this->input->post('correo');
		$correo=$this->security->xss_clean($correo);
		//
		$clave=$this->input->post('clave');
		$clave=$this->security->xss_clean($clave);
		//
		$activo=$this->input->post('activo');
		$activo=$this->security->xss_clean($activo);
		// encriptar la clave
		$clave=password_hash($clave, PASSWORD_DEFAULT);
		// 1. preguntar si el registro existe previamente 
		//$sql="select  * from tblusuarios where correo ='$correo'";
		// 2. todos los parametros o manejo de datos se usan con vectores
		
		$vector=array("correo"=>$correo,"nombre"=>$nombre);
		$query=$this->db->get_where("tblusuarios",$vector);
		// 3. guardar los datos del get_where para verifcar si existe o no el registro
		$resultado=$query->result_array();
		if (sizeof($resultado)>0) {
			$data=0;
		} else {
			// 4. Proceso de insercion
			// para este usamos un vector en el cual pasamos todos los datos para insertar
			//-$sql="INSERT INTO `tblusuarios`(`pkid`, `nombre`, `telefono`, `correo`, `clave`, `activo`, `fechar`, `fecham`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])";

			$vector=array(
				"nombre"=>$nombre,
				"telefono"=>$telefono,
				"correo"=>$correo,
				"clave"=>$clave,
				"activo"=>$activo	
			);
			// 5. invocar la funcion que inserta
			$this->db->insert("tblusuarios",$vector);
			$data=1;
		}
		return $data;
	}
		
	// funcion que permite elminar
	function eliminar($param) {
		//$sql="delete from tblusuarios where id=".$param.¿;

		$this->db->where("pkid",$param);
		$this->db->delete("tblusuarios");
		return 1;

	}

	// funcion que permita buscar un registro especifico
	function detalle($param) {

		$cadena=array(
			"pkid"=>$param
		);

		$query=$this->db->get_where("tblusuarios",$cadena);
		
		return $query->result_array();

	}

	// funcion que permite modifcar los datos de un registro
	function modificar($param) {

		$nombre=$this->input->post('nombre');
		$nombre=$this->security->xss_clean($nombre);
		//
		$telefono=$this->input->post('telefono');
		$telefono=$this->security->xss_clean($telefono);
		//
		$correo=$this->input->post('correo');
		$correo=$this->security->xss_clean($correo);
		//
		$clave=$this->input->post('clave');
		$clave=$this->security->xss_clean($clave);
		//
		$activo=$this->input->post('activo');
		$activo=$this->security->xss_clean($activo);

			$vector=array(
				"nombre"=>$nombre,
				"telefono"=>$telefono,
				"correo"=>$correo,
				"activo"=>$activo	
			);
			// el proceso de modificacion se comporta de manera similar
			// eliminar solo que se le pasa el where y los datos a modificar
			$this->db->where("pkid",$param);
			if ($this->db->update("tblusuarios",$vector)) {
				return 1;
			}else {
				return 0;
			}


	}

	//  metodo para validar el acceso al sistema
	function validar_acceso() {
		$correo=$this->input->post('correo');
		$correo=$this->security->xss_clean($correo);
		//
		$clave=$this->input->post('clave');
		$clave=$this->security->xss_clean($clave);
		
		$cadena=array(
			"correo"=>$correo
		);
		$query=$this->db->get_where("tblusuarios",$cadena);
		$datos=$query->result_array();

		if (sizeof($datos)>0) {
			// extraemos el campo clave para compararlo con la clave digitada 
			// en el formulario
			$clavebd=$datos[0]["clave"];
			$compara=password_verify($clave,$clavebd);
			
			if (!$compara) {
				$acceso=0; // no lo deje pasar
			} else {
				$acceso=1; // lo deja pasar
			}
		
		} else {
			$acceso=0; // no lo deje pasar
		} 

		if ($acceso==1) { 
			return $datos; // esto quiere decir que paso la validacion
		} else {
			return array(); // que no pasa la validacion y devolvemos un vector vacio
		}

	}


}

