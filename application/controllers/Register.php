<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {


	function __construct()  
    {  
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('register');
		$this->load->view('includes/footer');
   }
   




   // ========== validation ==========
   public function validation()
	{
      $this->form_validation->set_rules('user_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|is_unique[signup.sign_email]');
		$this->form_validation->set_rules('user_pass', 'Password', 'trim|required|min_length[6]|max_length[16]|matches[con_pass]');
      $this->form_validation->set_rules('con_pass', 'Confirm Password', 'trim|required|min_length[6]|max_length[16]|matches[user_pass]');

         // if the validation runs perfectly
         if ($this->form_validation->run()) {
               // generating a encryped[md5()] random[rand()] number
               $verification_key = md5(rand());
               
               $data = array(
                  "sign_name" => $this->input->post("user_name"),
                  "sign_email" => $this->input->post("user_email"),
                  "sign_pass" => md5($this->input->post("user_pass")),
                  "verification_key" => $verification_key,
                  "is_email_verified" => "no"
               );

               // taking returned data into $id variable
               $id = $this->Register_model->signup_data_insert($data);

                  
                     if($id > 0){

                        // procceding for email verification
                        $from_email = 'test@gmail.com';
                        $to_email = $this->input->post("user_email");

                        $subject = "Please verify email for login";
                        $message = "<p>Hi " .$this->input->post("user_name"). " </p>
                                    <p> please <a href='".base_url()."register/verify_email/".$verification_key."'> Click this link </a>for verification</p>";

                        
                        //Mail settings
                        $config['protocol'] = 'smtp';
                        $config['smtp_host'] = 'ssl://smtp.gmail.com';
                        $config['smtp_port'] = '465';
                        $config['smtp_user'] = 'sumonsm89@gmail.com'; // Your email address
                        $config['smtp_pass'] = ''; // Your email account password
                        $config['mailtype'] = 'html'; // 'html' or 'text'
                        $config['charset'] = 'iso-8859-1';
                        $config['wordwrap'] = TRUE; //No quotes required
                        // $config['newline'] = "\r\n"; //Double quotes required

                        // loading email library
                        $this->load->library('email');
                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");


                        //Send mail with data
                        $this->email->from($from_email);
                        $this->email->to($to_email);
                        $this->email->subject($subject);
                        $this->email->message($message);

                        // if email successfully has sent
                           if ($this->email->send()) {
                                 
                              $this->session->set_flashdata('message', 'Check your email for email verification');
                              // redirect('register');
                              redirect(base_url());
                           }

                     }

         }else{
            $this->index();
         }
   }
   



   // ========== Email Verification ==========
   function verify_email(){
      if ($this->uri->segment(3)) {
         $verification_key = $this->uri->segment(3);

            if ($this->Register_model->verify_email($verification_key)){
               $data['message'] = '<h4 align="center">Your email has been successfully verified. now you can login from <a href="'.base_url().'login">here</a></h4>';
            }else{
               $data['message'] = '<h1 align="center">Invalid Link</h1>';
            }

         $this->load->view('includes/header');
         $this->load->view('email_verification', $data);
         $this->load->view('includes/footer');

      }
   }





   // login view page
   public function login(){
      $this->load->view('includes/header');
      $this->load->view('login');
      $this->load->view('includes/footer');
   }


   // functions for login validation
   public function login_validation(){
      $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('user_pass', 'Password', 'trim|required|min_length[6]|max_length[16]');
      


      // $sign_email = $this->input->post("user_email");
      // $sign_pass = md5($this->input->post("user_pass"));

         if ($this->form_validation->run()) {
            $result = $this->Register_model->can_login($this->input->post("user_email"), md5($this->input->post("user_pass")));

            if ($result == '') {
               redirect('private_area');
               // redirect(base_url('Signup'));
            }else{
               $this->session->set_flashdata('message', $result);
               redirect(base_url('Login'));
            }

         }else {
            $this->login();
         }
   }


}
