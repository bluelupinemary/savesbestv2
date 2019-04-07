<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CreateAccount extends CI_Controller {

 function __construct()
 {
   parent::__construct();
     $this->load->model('user','',TRUE);
     $this->load->helper('form');
     $this->load->helper('url');
 }

 function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('create_account_view');
 }
/*function to add consumer to the database*/
 function add_consumer(){
      if($this->session->userdata('logged_in')){
 				$session_data = $this->session->userdata('logged_in');
 				$data['username'] = $session_data['username'];
 				$data['userid'] = $session_data['userid'];
 				$data['usertype'] = $session_data['usertype'];
             $this->load->library('form_validation');
             // field name, error message, validation rules
             $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|xss_clean');
             $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|required|xss_clean');
             $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
           $usertype = $this->input->post('usertype');
          if($usertype==2){//if teacher
                $this->form_validation->set_rules('empid', 'Employee No', 'trim|required|xss_clean');
            }

              $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
              $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
              $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|min_length[11]|xss_clean');
             $this->form_validation->set_rules('usertype', 'Usertype', 'trim|required');
             $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|xss_clean|is_unique[user_table.username]');
             $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
             $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');


             if($this->form_validation->run() == FALSE)
             {
                $this->load->view('template/header_template_view');
              $this->load->view('add_user_admin_view',$data);
              $this->load->view('template/footer_template_view');

             }
             else
             {
                 $message['msg']=1;
              $this->user->add_user_by_admin();
               $this->load->view('template/header_template_view');
             $this->load->view('success_create_account_view',$message);
             $this->load->view('template/footer_template_view');
             }
      }else{
         redirect('login','refresh');
      }
 }//end of function

function create_account_by_admin(){
     if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];
            $this->load->library('form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
          $usertype = $this->input->post('usertype');
         if($usertype==2){//if teacher
               $this->form_validation->set_rules('empid', 'Employee No', 'trim|required|xss_clean');
           }

             $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
             $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
             $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|min_length[11]|xss_clean');
            $this->form_validation->set_rules('usertype', 'Usertype', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|xss_clean|is_unique[user_table.username]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');


            if($this->form_validation->run() == FALSE)
            {
               $this->load->view('template/header_template_view');
             $this->load->view('add_user_admin_view',$data);
             $this->load->view('template/footer_template_view');

            }
            else
            {
                $message['msg']=1;
             $this->user->add_user_by_admin();
              $this->load->view('template/header_template_view');
            $this->load->view('success_create_account_view',$message);
            $this->load->view('template/footer_template_view');
            }
     }else{
        redirect('login','refresh');
     }
}//end of function

    function logout()
 {
  redirect('login','refresh');
 }


}

?>
