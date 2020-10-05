<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Private_area extends CI_Controller {


	function __construct()  
    {  
        parent::__construct();
        if (!$this->session->userdata('id')) {
            redirect("Login");
      }
    }

	
	public function index()
	{

      echo 'welcome '.$this->session->userdata('name').' </br>';
      echo $this->session->userdata('email')."</br>";
      // echo '<p align="center"><a href="'.base_url().'private_area/logout">Logout</a></p>';
      echo '<p align="center"><a href="'.base_url('Logout').'">Logout</a></p>';
   }


   public function logout()
	{
      $data = $this->session->all_userdata();
         
         foreach ($data as $row => $rows_value) {
            $this->session->unset_userdata($row);
         }

      redirect(base_url('Login'));
   }
   

}