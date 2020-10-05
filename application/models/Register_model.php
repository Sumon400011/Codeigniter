<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {
	function __construct()  {  
      parent::__construct();
   }

   // ============ Inserting Data ============
   public function signup_data_insert($data)
   {
      $this->db->insert("signup", $data);
      // returning the last record insert id
      return $this->db->insert_id();
   }

   

   // ============ Email verification model ============
    function verify_email($key)
   {
      $this->db->where("verification_key", $key);
      $this->db->where("is_email_verified", "no");
      $query = $this->db->get("signup");

         if ($query->num_rows() > 0) {
            $data = array(
               'is_email_verified' => 'yes'
            );
            $this->db->update("signup", $data);
            $this->db->where("verification_key", $key);

            return true;
         }else{
            return false;
         }
   }


   // ====================== Login ============================
   public function can_login($email, $password){
      $this->db->where("sign_email", $email);
      $query = $this->db->get("signup");

      // if email address is matched
         if ($query->num_rows() > 0) {
               foreach ($query->result() as $row) {
                    
                  if ($row->is_email_verified == 'yes') {

                        $store_pass = $row->sign_pass;

                           if ($password == $store_pass) {
                              
                              $userdata = array(
                                             'id'       =>  $row->sign_id,
                                             'name'     =>  $row->sign_name,
                                             'email'    =>  $row->sign_email,
                                             'logged_in'=>  TRUE
                                          );
                                 // $this->session->set_userdata('id', $row->sign_id);
                                 $this->session->set_userdata($userdata);


                              // $this->session->set_userdata('id', $row->sign_id);
                           }else{
                              return 'Wrong password';
                           }

                  }else{
                     return 'First Verify Your email address';
                  }

               }
         }else{
            return 'Wrong Email Address';
         }
   }
   // ============================================================
   
}