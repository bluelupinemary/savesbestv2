<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class login extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
 }
 
 function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('add_user_view');
 }
function logout(){
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('login','refresh');
		}

 
}
 
?>
