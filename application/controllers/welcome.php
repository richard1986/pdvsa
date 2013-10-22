<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $sources;

	function __construct()
	{

		parent::__construct();

		$this->sources = $this->constantes->assets();
		$this->load->model("auth_model");
    $this->load->library("form_validation");
	
	}

	public function index($data = null)
	{
		$this->load->view('inicio',$data);
	}

	public function entrar()
	{
	   $this->form_validation->set_rules("usuario", "Usuario", "required|trim|max_length[20]");
	   $this->form_validation->set_rules("clave", "Clave", "required|trim|max_length[20]");

	   if ($this->form_validation->run() == FALSE) 
	   {

	     $this->index();

	   } 
	   else 
	   {
	     $clave = sha1(set_value("clave"));
	     $data = $this->auth_model->validar_login(set_value("usuario"), $clave);
	     if ($data) {
	      $this->load->library("session");
	       $this->session->set_userdata("logged_in" , TRUE);
	       $this->session->set_userdata("nombre",$data->nombre);
	       $this->session->set_userdata("login",$data->login);
	       $this->session->set_userdata("tipo",$data->tipo);
	       if ($data->tipo == 'Administrador') 
	       {
	       	redirect('admin/');
	       }
	       // else if ($data->tipo=='Supervisor') 
	       // {
	       // 	redirect('supervisores/');
	       // }
	     } 
	     else  
	     {
	       $data['logged_in_fail'] = TRUE;
	       $data['mensaje']['tipo'] = "error";
	       $data['mensaje']['mensaje'] = "Nombre de usuario o clave inválida";
	       $this->index($data);
	     }
	   }
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */