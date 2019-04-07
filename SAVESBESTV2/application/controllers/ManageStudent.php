<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class ManageStudent extends CI_Controller {
 
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
  }
    
    function approveEnlistRequest(){
        //function of teacher to approve enlist of student to desired section
        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
                
                $teacherid = $data['userid'];
                //$sectionid = $this->input->post('sectionid');
                $studentid = $this->input->post('studentid');
                $resultdata['data'] = $teacherid;
                //$resultdata['data2'] = $studentid;
                $sectionid = $this->user->get_pending_request_of_student($studentid);
                //$sectionid=$section['sectionid'];
                $this->user->approve_enlist_to_sec_by_teacher($sectionid,$studentid,$teacherid);    
            
                $resultdata['msg']=1;
                $this->load->view('template/header_template_view');
                $this->load->view('success_create_section_view',$resultdata);
                $this->load->view('template/footer_template_view');
           
        }else{ //not logged in, go back to login page
            redirect('login','refresh');
        }
    }//end of function
    
    function disapproveEnlistRequest(){
        //function of teacher to approve enlist of student to desired section
        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
                
                $teacherid = $data['userid'];
                //$sectionid = $this->input->post('sectionid');
                $studentid = $this->input->post('studentid');
                $resultdata['data'] = $teacherid;
                //$resultdata['data2'] = $studentid;
                 $sectionid = $this->user->get_pending_request_of_student($studentid);
            
                $this->user->disapprove_enlist_to_sec_by_teacher($sectionid,$studentid);    
            
                $resultdata['msg']=1;
                $this->load->view('template/header_template_view');
                $this->load->view('success_create_section_view',$resultdata);
                $this->load->view('template/footer_template_view');
           
        }else{ //not logged in, go back to login page
            redirect('login','refresh');
        }
    }//end of function
    
    function removeStudentFromSection(){
          //function of teacher to approve enlist of student to desired section
        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
                
                $teacherid = $data['userid'];
                //$sectionid = $this->input->post('sectionid');
                $studentid = $this->input->post('studentid');
                $resultdata['data'] = $teacherid;
                //$resultdata['data2'] = $studentid;
                $sectionid = $this->user->get_section_of_student($studentid);  
                
                $this->user->remove_student_from_section($sectionid,$studentid);    
            
                
                $this->load->view('template/header_template_view');
                $this->load->view('success_reg_view',$resultdata);
                $this->load->view('template/footer_template_view');
           
        }else{ //not logged in, go back to login page
            redirect('login','refresh');
        }
        
    }//end of function
    
    
    
}//end of class
?>