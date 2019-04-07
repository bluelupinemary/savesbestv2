<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyRegistration extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   $this->load->helper('form');
   $this->load->helper('url');
  //  $this->load->library('form_validation');
 }


public function index()
{

    $this->load->library('form_validation');
    // field name, error message, validation rules
    $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
     $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
     $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
     $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|min_length[11]|xss_clean');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|xss_clean|is_unique[user_table.username]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
    $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');


    if($this->form_validation->run() == FALSE)
    {
       $this->load->view('template/header_template_view');
     $this->load->view('create_account_view');
     $this->load->view('template/footer_template_view');

    }
    else
    {
     $this->user->add_user();
      $this->load->view('template/header_template_view');
    $this->load->view('samplepage');
    $this->load->view('template/footer_template_view');
    }
   }
}
?>