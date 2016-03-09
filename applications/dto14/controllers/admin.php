<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct(){/* esta funcion sobre escribe el CI_Controller y toma PHP nativo*/

		parent::__construct();// Se hacer fererencia al "parent" que en este caso el CI_Controller
		session_start();

		//var_dump($_SESSION);
		//print_r($_SESSION);


	}

	
	public function index(){
		//macias.george@gmail.com
		//echo sha1(captura); die();// Esta funcion te regresa el texto encriptado. Se usa tener un password encriptado*/
		//echo APPPATH;// applications/authentication/ */
		//echo site_url();// http://10.1.17.10/ci21test/authentication.php */
		//echo base_url();// http://10.1.17.10/ci21test/ */
		//var_dump($_SESSION['username']);
		//print_r($_SERVER);
		//echo '<pre>' . print_r(mcrypt_list_modes(), TRUE) . '<pre>';
		//$salt = 'LUIS';
		//print_r($password = $salt . md5('xxxxxx*') . $salt);

		$rol = '';
		

		if ( isset($_SESSION['username']) == NULL){
			//redirect('admin/login');

			$this->load->view('login_view');
			//redirect(site_url());
		}

		$this->load->library('form_validation');
		//$this->form_validation->set_rules('email_address', 'Dirección de Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

		if ( $this->form_validation->run() !== false ) {
			// Esta validacion paso OK. Obtenido de la BD

			$this->load->model('admin_model');
			
			// Security Layer
			// Filtering POST DATA
			$email_address = $this->input->post('email_address');
			$clean_email_address = $this->security->xss_clean($email_address);
			
			$password = $this->input->post('password');
			$clean_password = $this->security->xss_clean($password);	

			$res = $this->admin_model->verify_user($clean_email_address,$clean_password);
			
				if ( $res !== false){
					// la persona SI tiene una cuenta registrada en el sistema
					
					// se verifica el rol que tiene en el Sistema
					$rol['rol'] = $this->admin_model->verify_rol($clean_email_address,$clean_password);

					foreach ($rol['rol'] as $key => $value) {
						$clean_id = $value->id;
					}


					// Actualiza fecha de ultimo acceso
					$this->admin_model->up_date($clean_id);
					
					foreach ($rol['rol'] as $value) {
						# code...
						switch ($value->grupo) {
							case 'capturista':
								$_SESSION['username'] = $clean_email_address;
								$_SESSION['grupo'] = 'capturista';
								redirect('captura/');
								break;
							case 'gestor':
								$_SESSION['username'] = $clean_email_address;
								$_SESSION['grupo'] = 'gestor';
								redirect('captura/');
								break;
							case 'administrador':
								$_SESSION['username'] = $clean_email_address;
								$_SESSION['grupo'] = 'administrador';
								redirect('captura/');
								break;
							
							default:

								echo '<div class="alert alert-block alert-error span10">';
								echo '<button type="button" class="close" data-dismiss="alert">x</button>';
								echo '<h4 class="alert-heading">Ups ! Parece ser que Usted no es Miembro de este Sitio !</h4>';
								echo '<p>';
								echo 'Por favor solicite ayuda al administrador del sitio';
								echo '</p>';
								echo '<p>';
								echo '<a class="btn btn-danger" href="'.site_url().'/admin/logout">Cerrar</a>';
								echo '</p>';
								echo '</div>';
								//$this->logout();
								break;
						}
					}
					

					

				}
			//$this->load->view('login_view');
				
		}
		//$this->logout();
		//$this->load->view('login_view');	
		echo '<div class="alert alert-block alert-error span10">';
		
		echo '<h4 class="alert-heading">'.validation_errors().'</h4>';
		echo '<p>';
		echo 'Por favor solicite ayuda al administrador del sitio';
		echo '</p>';
		echo '<p>';
		echo '<a class="btn btn-danger" href="'.site_url().'/admin/logout">Cerrar</a>';
		echo '</p>';
		echo '</div>';
		
		//echo validation_errors();
		//redirect(site_url());
		
	}

	public function logout(){

		if ( isset($_SESSION['username'])){

			$_SESSION['username'] = NULL;

			session_destroy();			

			//redirect(site_url());
			//$this->load->view('login_view');

		}

		//redirect(site_url());
		$this->load->view('login_view');

		
	}

	


}



/* End of file welcome.php */
/* Location: ./application/controllers/admin.php */