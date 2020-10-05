<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BasicModel extends CI_Model {
	function __construct()  
		{  
			parent::__construct();
		}

	public function signup_data_insert($data){
			$data = array(
				"sign_name" => $this->input->post("signup_name"),
				"sign_email" => $this->input->post("signup_email"),
				"sign_pass" => md5($this->input->post("signup_pass"))
			);
		$this->db->insert("signup", $data);
	}


	public function can_login($login_email, $login_pass){
		$this->db->select('*');
      $this->db->from('signup');
		$this->db->where('sign_email', $login_email);
		$this->db->where('sign_pass', $login_pass);
		$query = $this->db->get();

		// SELECT * FROM signup WHERE sign_email = '$login_email' AND $sign_pass = '$login_pass';

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
}