<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coordinadores extends CI_Controller {
	public function __construct(){ /* Esta funcion debe de ir en cada controlador para verificar si la sesion y el usuario siguen conectados */
		session_start();
		parent::__construct();
		if ( !isset($_SESSION['username'])){
			redirect(site_url()); // Redirecciona la controlador "admin/indrex"
		}//var_dump(session_get_cookie_params()); //Muestra el valor de la variable
	}
	public function index(){
		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);
		$this->load->model('resp_zona_model');
		$data['get_calif'] = $this->resp_zona_model->get_calif();
		$this->load->view('coordinadores_view',$data);
	}
	public function agregar_co(){
		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);
		$this->load->view('coordinadores_agregar_view',$data);
	}
	public function buscar_co(){
		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);
		$this->load->model('resp_zona_model');
		//$res = $this->input->post('promotor');
		$data['get_one_co'] = $this->resp_zona_model->get_one_co();
		$this->load->view('coordinador_one_view',$data);
	}
	public function editar_co(){
		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);
		$this->load->model('coordinadores_model');
		$data['get_co'] = $this->coordinadores_model->get_co();
		$this->load->view('coordinadores_editar_view',$data);
	}
	public function actualizar_co(){
		$e_mail = $_SESSION['username'];
		$data['onlyusername'] = strstr($e_mail,'@',true);
		$this->load->model('coordinadores_model');
		$this->coordinadores_model->update_entry();
		$this->load->view('is_ok_view',$data);
	}
}

/* End of file solicitud.php */
/* Location: ./application/controllers/solicitud.php */