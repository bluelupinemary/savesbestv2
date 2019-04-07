<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin2 extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->helper('form');
  $this->load->helper('url');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
   $userid = $this->input->post('userid');


   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  load login_view2
    $this->load->view('template/header_template_view');
     $this->load->view('login_view2');
   }
   else
   {
     //if there are no validation errors, redirect to controller > Home.php
     redirect('home', 'refresh');
   }

 }


 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   //query the database using the model > User.php -> login function
   $result = $this->user->login($username, $password);

   //if the query returns a result, set session array
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'userid' => $row->userid,
         'username' => $row->username,
	       'usertype' => $row->usertype
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }

     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>
