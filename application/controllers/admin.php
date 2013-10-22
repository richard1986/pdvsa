<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $sources;
  
  function __construct()
  {
    
    parent::__construct();
    
    $this->load->library('session');
    if (!$this->session->userdata("logged_in") && $this->session->userdata("tipo") == 'Administrador'){
      redirect('/');
    }

    $this->sources = $this->constantes->assets();
    $this->load->library('grocery_CRUD');

   
  }

	public function index()
	{

		$this->load->view('vista_header_admin');
		$this->load->view('vista_contenido_admin');
		$this->load->view('vista_pie_admin');
	
	}
	
	public function campos()
	{

		$campos = new grocery_CRUD();
		$campos->set_table("campos");
		$campos->set_subject("Campo");
    $campos->display_as('ubicacion', 'Ubicación');
    $campos->unset_texteditor('ubicacion');
		$campos->set_rules('nombre', 'Nombre del Campo',"required|alpha_numeric|min_length[2]|max_length[45]");
		$campos->set_rules('ubicacion', 'Ubicación del campo',"required|min_length[2]");
		$output = $campos->render();

		$this->load->view('vista_header_admin', $output);
		$this->load->view('vista_contenido_campos');
		$this->load->view('vista_pie_admin');
	
	}

	public function pozos()
	{

		$pozos = new grocery_CRUD();
		$pozos->set_table("pozos");
		$pozos->set_subject("Pozo");
		$pozos->set_rules('nombre', 'Nombre del Pozo',"required|alpha_numeric|min_length[2]|max_length[12]");
		$output = $pozos->render();

		$this->load->view('vista_header_admin', $output);
		$this->load->view('vista_contenido_pozos');
		$this->load->view('vista_pie_admin');
	
	}

	public function historial()
	{

		$historial = new grocery_CRUD();

		$historial->set_table("historial");
		$historial->set_subject("Historial");
    // $historial->set_theme("datatables");
		
    $historial->unset_texteditor('seriales_bombas');
    $historial->unset_texteditor('seriales_SG');
    $historial->unset_texteditor('seriales_SS');
    $historial->unset_texteditor('seriales_MT');
    $historial->unset_texteditor('comentario_falla');

    $historial->set_relation('pozos_idpozos','pozos','nombre');
    $historial->set_relation('campos_idcampos','campos','nombre');

    $historial->display_as('fecha_instalacionf', 'Fecha Final de Instalación');
		// $historial->set_rules('nombre', 'Nombre del Pozo',"required|alpha_numeric|min_length[2]|max_length[12]");
		$output = $historial->render();

		$this->load->view('vista_header_admin', $output);
		$this->load->view('vista_contenido_historial');
		$this->load->view('vista_pie_admin');
	
	}

	public function logout()
	{
	
	  $this->session->set_userdata("logged_in", FALSE);
	  $this->session->sess_destroy();
	  redirect('/');
	
	}


	

}