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
		$campos->set_rules('ubicacion', 'Ubicación del campo',"required");
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
		$pozos->set_relation('campos_idcampos','campos','{nombre}');
	    $pozos->display_as('nombre_pozo', 'Nombre');
	    $pozos->display_as('campos_idcampos', 'Campo');
		$pozos->set_rules('nombre_pozo', 'Nombre del Pozo',"required|alpha_numeric|min_length[2]|max_length[12]");
		$pozos->add_action('Eventos', base_url()."assets/img/wall1.png", "admin/verEventos",'');
		$pozos->order_by('nombre_pozo');
		
		$output = $pozos->render();

		$this->load->view('vista_header_admin', $output);
		$this->load->view('vista_contenido_pozos');
		$this->load->view('vista_pie_admin');
	
	}

	public function verEventos()
	{
		$historial = new grocery_CRUD();

		$historial->set_table("historial");
		$historial->where("pozos_idpozos",$this->uri->segment(3));
		$historial->set_subject("Historial");
		
		$historial->columns("pozos_idpozos","corrida","campo_id","fecha_instalacionf","fecha_arranque","fecha_falla","fecha_pullingi","dias_instalacion","dias_operacion","profundidad_succion","MTBP");
	    $historial->unset_texteditor('seriales_bombas');
	    $historial->unset_texteditor('seriales_SG');
	    $historial->unset_texteditor('seriales_SS');
	    $historial->unset_texteditor('seriales_MT');
	    $historial->unset_texteditor('comentario_falla');
	    
	    $historial->set_relation('pozos_idpozos','pozos','{nombre_pozo}');
	    $historial->set_relation('campo_id','campos','nombre');
	    $historial->unset_delete();
	    $historial->field_type('pozos_idpozos','hidden', $this->uri->segment(3));
		
		$p = $this->db
					 ->where("idpozos",$this->uri->segment(3))
					 ->join('campos', 'campos.idcampos  = pozos.campos_idcampos')
					 ->get("pozos")
					 ->result();
	    $historial->field_type('campo_id','hidden', $p[0]->campos_idcampos);

	    // $historial->unset_fields('campo_id');
	    // Cambiar la forma en que se muestran los campos en los formularios
	    // $historial->display_as('pozos_idpozos', 'Pozo');
	    // $historial->display_as('campo_id', 'Campo');
	    $historial->display_as('fecha_instalacionf', 'Fecha Final de Instalación');
	    $historial->display_as('fecha_arranque', 'Fecha de Arranque');
	    $historial->display_as('fecha_falla', 'Fecha de Falla');
	    $historial->display_as('fecha_pullingi', 'Fecha de Pulling');
	    $historial->display_as('dias_instalacion', 'Días de Instalación');
	    $historial->display_as('dias_operacion', 'Días de Operación');
	    $historial->display_as('profundidad_succion', 'Profundidad');
	    $historial->display_as('sino_Ytool', 'YTool(Si/No)');
	    $historial->order_by('pozos_idpozos, corrida, campo_id');

	    // $historial->callback_before_insert(array($this,'set_pozo'));
	    // $historial->callback_before_update(array($this,'set_pozo'));

	    $output = $historial->render();

		$this->load->view('vista_header_admin', $output);
		$this->load->view('vista_contenido_historial');
		$this->load->view('vista_pie_admin');
		$this->load->view('script_h');
			
	}

	// function set_pozo($post_array) {
	  
	//   $post_array['pozos_idpozos'] = $this->uri->segment(3);

	// 		$p = $this->db
	// 					 ->where("idpozos",$this->uri->segment(3))
	// 					 ->join('campos', 'campos.idcampos  = pozos.campos_idcampos')
	// 					 ->get("pozos")
	// 					 ->result();
	// 		$pozo[0]->campos_idcampos;

	//   // $campo = $this->db->where();
	//   $post_array['campo_id'] = $pozo[0]->campos_idcampos;
	//   return $post_array;
	// }   

	public function estadisticas()
	{
		$this->load->view('vista_header_admin');
		$this->load->view('vista_buscar_estadisticas');
		$this->load->view('vista_pie_admin');
	}
	
	public function estadisticas2()
	{
		$this->load->view('vista_header_admin');
		$this->load->view('vista_buscar_estadisticas2');
		$this->load->view('vista_pie_admin');
	}

	public function GEstadisticas()
	{
	  	
		$this->load->view('vista_header_gadmin');

		$data["evBarua"] = $this->db->where("campo_id",1)->where("fecha_instalacionf <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->from("historial")->count_all_results();
		$data["evMot"] = $this->db->where("campo_id",2)->where("fecha_instalacionf <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->from("historial")->count_all_results();
		
		$data["PLfTimeBarua"] = $this->db->where("campo_id",1)->select_avg("dias_instalacion")->where("fecha_instalacionf <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		$data["PLfTimeMot"] = $this->db->where("campo_id",2)->select_avg("dias_instalacion")->where("fecha_instalacionf <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		echo "<br><br><br><br>";
		echo "<pre>";
		// echo $this->db->last_query();
		print_r($data["PLfTimeBarua"]);
		echo "</pre>";
		$data["PRunLifeBarua"] = $this->db->where("campo_id",1)->select_avg("dias_operacion")->where("fecha_arranque <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		$data["PRunLifeMot"] = $this->db->where("campo_id",2)->select_avg("dias_operacion")->where("fecha_arranque <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		
		$data["MLfTimeBarua"] = $this->db->where("campo_id",1)->select("MAX(dias_instalacion) AS dias_instalacion")->where("fecha_falla","0000-00-00")->get("historial")->result();
		$data["MLfTimeMot"] = $this->db->where("campo_id",2)->select("MAX(dias_instalacion) AS dias_instalacion")->where("fecha_falla","0000-00-00")->get("historial")->result();
		
		
		$data["MRunLifeBarua"] = $this->db->where("campo_id",1)->select("MAX(dias_operacion) AS dias_operacion")->where("fecha_falla","0000-00-00")->get("historial")->result();
		$data["MRunLifeMot"] = $this->db->where("campo_id",2)->select("MAX(dias_operacion) AS dias_operacion")->where("fecha_falla","0000-00-00")->get("historial")->result();
		
		$data["NFallasBarua"] = $this->db->where("campo_id",1)->where("MONTH(fecha_falla)",$this->input->post("mes"))->where("YEAR(fecha_falla)",$this->input->post("anio"))->select("COUNT(fecha_falla) AS fecha_falla")->get("historial")->result();
		$data["NFallasMot"] = $this->db->where("campo_id",2)->where("MONTH(fecha_falla)",$this->input->post("mes"))->where("YEAR(fecha_falla)",$this->input->post("anio"))->select("COUNT(fecha_falla) AS fecha_falla")->get("historial")->result();
		
		$data["TPABarua"] = $this->db->where("campo_id",1)->where("fecha_falla","0000-00-00")->select("COUNT(fecha_falla) AS fecha_falla")->where("fecha_instalacionf <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		$data["TPAMot"] = $this->db->where("campo_id",2)->where("fecha_falla","0000-00-00")->select("COUNT(fecha_falla) AS fecha_falla")->where("fecha_instalacionf <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		
		
		$data["PLfTimePABarua"] = $this->db->where("campo_id",1)->where("fecha_falla","0000-00-00")->select_avg("dias_instalacion")->where("fecha_instalacionf <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		$data["PLfTimePAMot"] = $this->db->where("campo_id",2)->where("fecha_falla","0000-00-00")->select_avg("dias_instalacion")->where("fecha_instalacionf <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();

		$data["PRLPABarua"] = $this->db->where("campo_id",1)->where("fecha_falla","0000-00-00")->select_avg("dias_operacion")->where("fecha_arranque <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		$data["PRLPAMot"] = $this->db->where("campo_id",2)->where("fecha_falla","0000-00-00")->select_avg("dias_operacion")->where("fecha_arranque <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		
		$data["PMTBPBarua"] = $this->db->where("campo_id",1)->select_avg("MTBP")->where("fecha_arranque <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		$data["PMTBPMot"] = $this->db->where("campo_id",2)->select_avg("MTBP")->where("fecha_arranque <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		
		$data["MMTBPBarua"] = $this->db->where("campo_id",1)->select("MAX(MTBP) AS MTBP")->where("fecha_pullingi <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		
		$data["MMTBPMot"] = $this->db->where("campo_id",2)->select("MAX(MTBP) AS MTBP")->where("fecha_pullingi <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		
		$data["SMTBPBarua"] = $this->db->where("campo_id",1)->select("SUM(MTBP) AS MTBP")->where("fecha_pullingi <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
		$data["SMTBPMot"] = $this->db->where("campo_id",2)->select("SUM(MTBP) AS MTBP")->where("fecha_pullingi <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->get("historial")->result();
				
		$data["CMTBPBarua"] = $this->db->where("campo_id",1)->select("COUNT(MTBP) AS MTBP")->where("fecha_pullingi <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->where("MTBP >",0)->get("historial")->result();
		$data["CMTBPMot"] = $this->db->where("campo_id",2)->select("COUNT(MTBP) AS MTBP")->where("fecha_pullingi <=","LAST_DAY('".$this->input->post("anio")."-".$this->input->post("mes")."-01')",FALSE)->where("MTBP >",0)->get("historial")->result();
		
		$this->load->view('vista_estadisticas', $data);
		$this->load->view('vista_pie_gadmin');
	
	}

	public function GEstadisticas2()
	{
		for ($i=(int)$this->input->post("anioD"); $i <= (int)$this->input->post("anioH"); $i++) 
		{
			for ($j=1; $j <= 12; $j++)
			{
				echo "<br><br><br><br>";
				echo "<pre>";
				echo $i . " ". $j;
				$data["PLfTimeBarua"] = $this->db->where("campo_id",1)->select_avg("dias_instalacion")->where("fecha_instalacionf <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				$data["PRunLifeBarua"] = $this->db->where("campo_id",1)->select_avg("dias_operacion")->where("fecha_arranque <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				$data["MMTBPBarua"] = $this->db->where("campo_id",1)->select("MAX(MTBP) AS MTBP")->where("fecha_pullingi <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				// $data["PLfTimeMot"] = $this->db->where("campo_id",2)->select_avg("dias_instalacion")->where("fecha_instalacionf <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				// $data["PRunLifeMot"] = $this->db->where("campo_id",2)->select_avg("dias_operacion")->where("fecha_arranque <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				// $data["MMTBPMot"] = $this->db->where("campo_id",2)->select("MAX(MTBP) AS MTBP")->where("fecha_pullingi <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				
				// echo $this->db->last_query();
				print_r($data["PLfTimeBarua"]);
				echo "</pre>";
				if ($j == $this->input->post("mesH") && $i == $this->input->post("anioH")) {
					break;
				}
				
			}
		}

		$this->load->view('vista_estadisticas2', $data);
		$this->load->view('vista_pie_gadmin');
	
	}

	public function logout()
	{
	
	  $this->session->set_userdata("logged_in", FALSE);
	  $this->session->sess_destroy();
	  redirect('/');
	
	}

		/*
	public function run()
	{
			A pozos_idpozos

			B corrida
			
			C campos_idcampos
			
			A.D  AS fecha_instalacionf, A.E  AS fecha_arranque, A.F  AS fecha_falla, A.G  AS fecha_pullingi, A.H  AS dias_instalacion, A.I  AS dias_operacion, A.J AS profundidad_succion, A.K  AS cable_potencia, A.L  AS fabricante, A.M  AS nro_bombas, A.N AS series_bombas, A.O  AS nrostg_bombas, A.P  AS seriales_bombas, A.Q  AS modelo_bomba, A.R  AS series_MG, A.S  AS nrostg_MG, A.T  AS seriales_MG, A.U  AS modelo_MG, A.V  AS nro_SG, A.W  AS serie_SG, A.X  AS seriales_SG, A.Y  AS modelo_SG, A.Z  AS nrosellos_SS, A.AA AS  series_SS, A.AB AS  seriales_SS, A.AC AS  modelos_SS, A.AD AS  nro_MT, A.AE AS  series_MT, A.AF AS  seriales_MT, A.AG AS  modelo_MT, A.AH AS  HP_MT, A.AI AS  volt_MT, A.AJ AS  AMP_MT, A.AK AS  sn_S, A.AL AS  seriales_S, A.AM AS  modelo_S, A.AN AS  profundidad_S, A.AO AS  marca_Ytool, A.AP AS  odid_Ytool, A.AQ AS  sino_Ytool, A.AR AS  sino_camisav, A.AS AS  sino_camisa, A.AT AS  tipo_falla, A.AU AS  comentario_falla, A.AV AS  MTBP

			fecha_instalacionf, fecha_arranque, fecha_falla, fecha_pullingi



		$bdd = 	$this
				->db
				->select("B.idpozos AS pozos_idpozos, A.B as corrida, C.idcampos AS campos_idcampos, A.D AS fecha_instalacionf, A.E  AS fecha_arranque, A.F  AS fecha_falla, A.G  AS fecha_pullingi, A.H  AS dias_instalacion, A.I  AS dias_operacion, A.J  AS profundidad_succion, A.K  AS cable_potencia, A.L  AS fabricante, A.M  AS nro_bombas, A.N  AS series_bombas, A.O  AS nrostg_bombas, A.P  AS seriales_bombas, A.Q  AS modelo_bombas, A.R  AS series_MG, A.S  AS nrostg_MG, A.T  AS seriales_MG, A.U  AS modelo_MG, A.V  AS nro_SG, A.W  AS serie_SG, A.X  AS seriales_SG, A.Y  AS modelo_SG, A.Z  AS nrosellos_SS, A.AA AS  series_SS, A.AB AS  seriales_SS, A.AC AS  modelos_SS, A.AD AS  nro_MT, A.AE AS  series_MT, A.AF AS  seriales_MT, A.AG AS  modelo_MT, A.AH AS  HP_MT, A.AI AS  volt_MT, A.AJ AS  AMP_MT, A.AK AS  sn_S, A.AL AS  seriales_S, A.AM AS  modelo_S, A.AN AS  profundidad_S, A.AO AS  marca_Ytool, A.AP AS  odid_Ytool, A.AQ AS  sino_Ytool, A.AR AS  sino_camisav, A.AS AS  sino_camisa, A.AT AS  tipo_falla, A.AU AS  comentario_falla, A.AV AS  MTBP")
				->join('pozos as B', 'B.nombre = A.A')
				->join('campos as C', 'C.nombre = A.C')
				->get("Hoja1 as A")
				->result();
		
		echo "<pre>";
		foreach ($bdd as $value) {
			$value->fecha_instalacionf = $this->datemanager->strdate2mySQL($value->fecha_instalacionf);
			$value->fecha_arranque = $this->datemanager->strdate2mySQL($value->fecha_arranque);
			$value->fecha_falla = $this->datemanager->strdate2mySQL($value->fecha_falla);
			$value->fecha_pullingi = $this->datemanager->strdate2mySQL($value->fecha_pullingi);
			print_r($value);
			$this->db->insert("historial",$value);
		}
		echo "</pre>";
		// echo $this->datemanager->strdate2mySQL("12-ene-2010");

	}
		*/

}