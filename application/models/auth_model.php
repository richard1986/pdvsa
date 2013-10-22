<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {
	
	function __construct(){
	
		parent::__construct();
	
	}
	
	public function validar_login($usuario, $clave)
	{

		$data = $this->db->where("login", $usuario);
		$data = $this->db->where("clave", $clave);
		$data = $this->db->get("usuarios");

		if ($data->num_rows()) {
			return $data->row(0);
		} else {
			return false;			
		}

	}
}
