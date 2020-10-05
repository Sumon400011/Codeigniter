<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BasicController extends CI_Controller {


	function __construct()  
    {  
        parent::__construct();
    }

	public function index()
	{
		
		$this->load->view('includes/header');
		$this->load->view('home');
		$this->load->view('includes/footer');
	}



	public function signup(){
		$this->load->view('includes/header');
		$this->load->view('signup');
		$this->load->view('includes/footer');
	}




	public function form_validation(){

		$this->form_validation->set_rules('signup_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('signup_pass', 'Password', 'trim|required|min_length[6]|max_length[16]');
		$this->form_validation->set_rules('signup_con_pass', 'Confirm-Password', 'trim|required|min_length[6]|max_length[16]|matches[signup_pass]');
		$this->form_validation->set_rules('signup_email', 'Email', 'trim|required|valid_email|is_unique[signup.sign_email]');

			if ($this->form_validation->run()) {

				// $this->load->model('basicModel');
				$this->basicModel->signup_data_insert($data);
				redirect(base_url(). "basicController/inserted");

			}else{
				$this->signup();
			}
	}

	public function inserted(){
		$this->signup();
	}

	public function test(){
		$this->load->view('includes/header');
		$this->load->view('test');
		$this->load->view('includes/footer');
	}




	public function login(){
		$this->load->view('includes/header');
		$this->load->view('login');
		$this->load->view('includes/footer');
	}


	// login_validation 1
	public function login_validation(){
		//set validations
      $this->form_validation->set_rules('login_email', 'login_email', 'trim|required|valid_email');
		$this->form_validation->set_rules('login_pass', 'login_pass', 'trim|required|min_length[6]|max_length[16]');
		
		if ($this->form_validation->run()){

			//get the posted values
      	$login_email= $this->input->post("login_email");
			$login_pass = md5($this->input->post("login_pass"));
			
			//model function
			$this->load->model('basicModel');
			
				if($this->basicModel->can_login($login_email, $login_pass)){

				}else{

				}

		}else{
			//false
			$this->session->set_flashdata('error', '<h4> Invalid email and password </h4>');
			redirect(base_url('Login'));
		}
	}

	public function logout(){
		// $this->session->unset_userdata('user_email');
		redirect(base_url('Login'));
	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */