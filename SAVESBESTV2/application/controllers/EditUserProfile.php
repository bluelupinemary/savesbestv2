<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class EditUserProfile extends CI_Controller {
 
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
     $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
     $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
     $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|min_length[11]|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
    $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

    $userid = $this->input->post('userid');
    
    $resultdata['results'] = $this->user->get_user_profile($userid);
            $resultdata['data']=$data['username'];
            $resultdata['data2']=$userid;
            
          $query1 = $this->user->get_user_profile_teacher($userid);
            $teacherdata['empid'] = $query1['empid'];
        $resultdata['empid'] = $teacherdata['empid'];
        
        $query2 = $this->user->get_user_profile_student($userid);
            $studentdata['studentid'] = $query2['studentid'];
        $resultdata['studentid'] = $studentdata['studentid'];
        
    if($this->form_validation->run() == FALSE)
    {
        $resultdata['message']=0;
    $this->load->view('template/header_template_view');
     $this->load->view('user_profile2_view',$resultdata);
     $this->load->view('template/footer_template_view');

    }
    else
    {
        
    $this->user->edit_user_profile($userid);
        $resultdata['message'] = 1;
    $this->load->view('template/header_template_view');
    $this->load->view('user_profile2_view',$resultdata);
    $this->load->view('template/footer_template_view');
    }
    }else{
        redirect('login','refresh');
    }
    
    }
    
    
    function updateUserByAdmin(){
        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
            
            $useridToEdit = $this->input->post('userid');
              $userid = $this->input->post('userid',TRUE);
            
      $resultdata['results'] = $this->user->get_user_profile($useridToEdit);
            $resultdata['data']=$data['username'];
            $resultdata['data2']=$useridToEdit;
            
          $query1 = $this->user->get_user_profile_teacher($useridToEdit);
            $teacherdata['empid'] = $query1['empid'];
        $resultdata['empid'] = $teacherdata['empid'];
        
        $query2 = $this->user->get_user_profile_student($useridToEdit);
            $studentdata['studentid'] = $query2['studentid'];
        $resultdata['studentid'] = $studentdata['studentid'];
        
            
            
            
            $this->load->view('template/header_template_view');
            $this->load->view('edit_user_profile_by_admin_view',$resultdata);
            $this->load->view('template/footer_template_view');

            
        }else{
            redirect('login','refresh');
        }
    }
    
    public function updateUserByAdminCheckFields()
    {
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
            if($data['usertype']==2){
               // $this->form_validation->set_rules('empid', 'Employee Id', 'trim|required|xss_clean');
            }
                 $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
                 $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|min_length[11]|xss_clean');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
                $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

                $userid = $this->input->post('userid');
                $resultdata['results'] = $this->user->get_user_profile($userid);
                $resultdata['data']=$data['username'];
                $resultdata['data2']=$userid;
            
                $query1 = $this->user->get_user_profile_teacher($userid);
                $teacherdata['empid'] = $query1['empid'];
                $resultdata['empid'] = $teacherdata['empid'];
        
            
                if($this->form_validation->run() == FALSE)
                {
                $this->load->view('template/header_template_view');
                 $this->load->view('edit_user_profile_by_admin2_view',$resultdata);
                 $this->load->view('template/footer_template_view');

                }
                else
                {
                $message['msg']=1;
                $this->user->edit_user_profile($userid);
                $this->load->view('template/header_template_view');
                $this->load->view('success_create_account_view',$message);
                //$this->load->view('template/footer_template_view');
                }        
            
        }else{
            redirect('login','refresh');
        }
        
    }
    
    
    function deleteUserByAdmin(){
        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
            
            $useridToDelete = $this->input->post('userid');
              $userid = $this->input->post('userid',TRUE);
            
        $resultdata['results'] = $this->user->get_user_profile($useridToDelete);
            $resultdata['data']=$data['username'];
            $resultdata['data2']=$useridToDelete;
            
          $query1 = $this->user->get_user_profile_teacher($useridToDelete);
            $teacherdata['empid'] = $query1['empid'];
        $resultdata['empid'] = $teacherdata['empid'];
        
        $query2 = $this->user->get_user_profile_student($useridToDelete);
            $studentdata['studentid'] = $query2['studentid'];
        $resultdata['studentid'] = $studentdata['studentid'];
        
            
            
            
            $this->load->view('template/header_template_view');
            $this->load->view('delete_user_by_admin_view',$resultdata);
            $this->load->view('template/footer_template_view');
 
   //}
            
        }else{
            redirect('login','refresh');
        }
    }//end of function
    
    function logout(){
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('login','refresh');
		}

}
?>