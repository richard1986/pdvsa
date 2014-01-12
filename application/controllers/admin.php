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
		// $campos->set_rules('nombre', 'Nombre del Campo',"required|alpha_numeric|min_length[2]|max_length[45]");
		// $campos->set_rules('ubicacion', 'Ubicación del campo',"required");
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
	    $historial->display_as('fecha_instalacionf', 'Fecha Final de Instalación');
	    $historial->display_as('fecha_arranque', 'Fecha de Arranque');
	    $historial->display_as('fecha_falla', 'Fecha de Falla');
	    $historial->display_as('fecha_pullingi', 'Fecha de Pulling');
	    $historial->display_as('dias_instalacion', 'Días de Instalación');
	    $historial->display_as('dias_operacion', 'Días de Operación');
	    $historial->display_as('profundidad_succion', 'Profundidad');
	    $historial->display_as('sino_Ytool', 'YTool(Si/No)');
	    $historial->order_by('pozos_idpozos, corrida, campo_id');

	    $output = $historial->render();

		$this->load->view('vista_header_admin', $output);
		$this->load->view('vista_contenido_historial');
		$this->load->view('vista_pie_admin');
		$this->load->view('script_h');
			
	}

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
		$mes = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre" );
		$this->load->view('vista_header_gadmin');
		$data['campo'] = $this->db->where("idcampos",$this->input->post("campo"))->get('campos')->result();
		
		for ($i=(int)$this->input->post("anioD"); $i <= (int)$this->input->post("anioH"); $i++) 
		{
			for ($j=1; $j <= 12; $j++)
			{
				$data["PLfTimeBarua"][] = $this->db->where("campo_id",$this->input->post("campo"))->select_avg("dias_instalacion")->where("fecha_instalacionf <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				$data["PRunLifeBarua"][] = $this->db->where("campo_id",$this->input->post("campo"))->select_avg("dias_operacion")->where("fecha_arranque <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				$data["PMTBPBarua"][] = $this->db->where("campo_id",$this->input->post("campo"))->select_avg("MTBP")->where("fecha_arranque <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				
				$data["MRunTime"][] = $this->db->where("campo_id",$this->input->post("campo"))->where("fecha_falla >=","LAST_DAY('".$i."-".$j."-01')",FALSE)->select("DATEDIFF(LAST_DAY('".$i."-".$j."-01'), fecha_arranque )  AS dias_operacion, nombre_pozo, corrida")->join('pozos', 'pozos.idpozos  = historial.pozos_idpozos')->limit(1)->order_by("dias_operacion", "DESC")->get("historial")->result();


				
				$data['meses'][] = $mes[$j]."-".$i;
				
				if ($j == $this->input->post("mesH") && $i == $this->input->post("anioH")) {
					break;
				}
			}
		}
				
		$data['tabla'][] = $data["meses"];
		$data['tabla'][] = $data["MRunTime"];
		
		$this->load->view('vista_estadisticas2', $data);
		$this->load->view('vista_pie_gadmin2');
	
	}

	public function HPA1()
	{

		$this->load->view('vista_header_admin');
		$this->load->view('vista_buscar_HPA');
		$this->load->view('vista_pie_admin');
	
	}

	public function HPA2()
	{
		$mes = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre" );
		$this->load->view('vista_header_gadmin');
		$data['campo'] = $this->db->where("idcampos",$this->input->post("campo"))->get('campos')->result();
		for ($i=(int)$this->input->post("anioD"); $i <= (int)$this->input->post("anioH"); $i++) 
		{
			for ($j=1; $j <= 12; $j++)
			{

				$data["TPA"][] = $this->db->where("campo_id",$this->input->post("campo"))->where("fecha_falla","0000-00-00")->select("COUNT(fecha_falla) AS fecha_falla")->where("fecha_instalacionf <=","LAST_DAY('".$i."-".$j."-01')",FALSE)->get("historial")->result();
				
				// echo "<br><br><br><br>";
				// echo "<pre>";
				// echo $this->db->last_query();
				// // print_r($data["NFallas"]);
				// echo "</pre>";
				$data["NFallas"][] = $this->db->where("campo_id",$this->input->post("campo"))->where("MONTH(fecha_falla)",$j)->where("YEAR(fecha_falla)",$i)->select("COUNT(fecha_falla) AS fecha_falla")->get("historial")->result();
				$data['meses'][] = $mes[$j]."-".$i;
				if ($j == $this->input->post("mesH") && $i == $this->input->post("anioH")) {
					break;
				}
			}
		}

		$this->load->view('vista_HPA', $data);
		$this->load->view('vista_pie_HPA');
	
	}

	public function logout()
	{
	
	  $this->session->set_userdata("logged_in", FALSE);
	  $this->session->sess_destroy();
	  redirect('/');
	
	}

	public function usuarios()
	{

		$usuarios = new grocery_CRUD();
		$usuarios->set_table('usuarios');
		$usuarios->set_subject('Usuario');

		$usuarios->display_as('nombre', 'Nombre');
		$usuarios->display_as('login', 'Login');
		$usuarios->display_as('clave', 'Clave');
		$usuarios->display_as('confirmar', 'Confirmación de Clave');
		$usuarios->display_as('tipo', 'Tipo de Usuario');

		$usuarios->columns("nombre","login","tipo");
		$usuarios->field_type('clave', 'password');
		$usuarios->field_type('confirmar', 'password');

		$usuarios->set_rules('nombre', 'Nombre del Usuario',"required|alpha_space|max_length[45]|min_length[2]");
		$usuarios->set_rules('login', 'Login',"required|alpha|max_length[20]|min_length[4]");
		$usuarios->set_rules('clave', 'Clave',"max_length[20]|min_length[3]|matches[confirmar]");
		$usuarios->set_rules('confirmar', 'Confirmación de Clave',"max_length[20]|min_length[3]|matches[clave]");
		$usuarios->set_rules('tipo', 'Tipo de Usuario',"required");

		$usuarios->callback_before_insert(array($this,'encrypt_clave_callback'));
		$usuarios->callback_before_update(array($this,'encrypt_confirmar_callback'));

		$usuarios->callback_edit_field('clave',array($this,'vaciar_campo_clave'));
		$usuarios->callback_edit_field('confirmar',array($this,'vaciar_campo_confirmar'));

		$output = $usuarios->render();

		$this->load->view('vista_header_admin', $output);
		$this->load->view('vista_contenido_usuarios');
		$this->load->view('vista_pie_admin');

	}

	function encrypt_clave_callback($post_array, $primary_key = null)
	{
	    
	    $post_array['clave'] = sha1($post_array['clave']);
	    $post_array['confirmar'] = sha1($post_array['confirmar']);

	    return $post_array;
	}

	function encrypt_confirmar_callback($post_array, $primary_key = null)
	{
	    
	    if (!empty($post_array['clave']))
	    {
	        
	        $post_array['clave'] = sha1($post_array['clave']);
	        $post_array['confirmar'] = sha1($post_array['confirmar']);
	    
	    }
	    else
	    {
	    
	        unset($post_array['clave']);
	        unset($post_array['confirmar']);
	    
	    }
	    
	    return $post_array;
	
	}

	function vaciar_campo_clave($post_array, $primary_key = null)
	{
	    
	    return '<input type="password" maxlength="50" name="clave" id="field-clave">';
	
	}

	function vaciar_campo_confirmar($post_array, $primary_key = null)
	{
	    
	    return '<input type="password" maxlength="50" name="confirmar" id="field-confirmar">';
	
	}

}