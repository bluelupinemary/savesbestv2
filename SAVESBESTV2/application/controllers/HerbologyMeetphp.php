<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class HerbologyMeetphp extends CI_Controller {
 
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

    function submitAnswers(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['userid'] = $session_data['userid'];
            $data['usertype'] = $session_data['usertype']; 
        
            $userAns1 = $this->input->post('answer1');
            
            $resultdata['answer1'] = $userAns1;

            //echo "<script>console.log( 'Debug Objects: " . $resultdata['results'] . "' );</script>";
            $resultdata['data']=$data['username'];

            $this->load->view('template/header_template_view');
            $this->load->view('herbmeet_checkAns_view',$resultdata);

        
        }else{
                redirect('login','refresh');
        }
    }//end of submitAns func


  function createSection(){
    if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
      
      $this->load->library('form_validation');
    // field name, error message, validation rules
    $this->form_validation->set_rules('sectionname', 'Section Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('sectioncode', 'Section Code', 'trim|required|xss_clean|is_unique[section.scode]');
    $this->form_validation->set_rules('sectionmax', 'Max Number', 'trim|required|xss_clean');
    
    if($this->form_validation->run() == FALSE)
    {
       $this->load->view('template/header_template_view');
     $this->load->view('create_section_view',$data);
     $this->load->view('template/footer_template_view');

    }
    else
    {
        $message['msg'] = 1; 
     $this->user->create_section();
      $this->load->view('template/header_template_view');
    $this->load->view('success_create_section_view',$message);
    //$this->load->view('template/footer_template_view');
    }
    }else{
        redirect('login','refresh');
    }
   }//end of createsection
    
    function editSection(){
        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
            
                $sectionid = $this->input->post('sectionid');
                $userid = $this->input->post('userid',TRUE);
            
           
                $resultdata['results'] = $this->user->get_section_info($sectionid);
                $resultdata['data']=$data['username'];
                $resultdata['data2']=$sectionid;
            
                //$query1 = $this->user->get_user_profile_teacher($useridToEdit);
                //$teacherdata['empid'] = $query1['empid'];
                //$resultdata['empid'] = $teacherdata['empid'];
            
                $this->load->view('template/header_template_view');
                $this->load->view('edit_section_info_view',$resultdata);
                $this->load->view('template/footer_template_view');
          
        }else{ //not logged in, go back to login page
            redirect('login','refresh');
        }
    }
    
    function editSectionCheckFields(){
         if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
            
                $this->load->library('form_validation');
        // field name, error message, validation rules
                $this->form_validation->set_rules('sname', 'Section Name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('scode', 'Section Code', 'trim|required|xss_clean');
                $this->form_validation->set_rules('maxnum', 'Max Number', 'trim|required|xss_clean');
            
                $sectionid = $this->input->post('sectionid');
                //$userid = $this->input->post('userid');
                
                $resultdata['results'] = $this->user->get_section_info($sectionid);
                $resultdata['data']=$data['username'];
                //$resultdata['data2']=$userid;
            
        
            
                if($this->form_validation->run() == FALSE)
                {
                $this->load->view('template/header_template_view');
                 $this->load->view('edit_section_info2_view',$resultdata);
                 $this->load->view('template/footer_template_view');

                }
                else
                {
                    $message['msg']=1;
                $this->user->edit_section_info($sectionid);
                $this->load->view('template/header_template_view');
                $this->load->view('success_create_section_view',$message);
               // $this->load->view('template/footer_template_view');
                }        
            
        }else{
            redirect('login','refresh');
        }
        
    }//end of function
    
     function deleteSectionInfo(){
			 if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];
                
                $sectionid=$this->input->post('sectionid');
                
                 
                $this->user->delete_section_info($sectionid);
                 
                $resultdata['results'] = $this->user->get_sections();
                $resultdata['data']=$data['username'];
            
                
                $this->load->view('template/header_template_view');
                $this->load->view('delete_section_view',$resultdata);
                $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }

		}//end of function
    
     function manageTeacherToSection(){

        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
            
                $sectionid = $this->input->post('sectionid');
                $userid = $this->input->post('userid',TRUE);
            
           
                $resultdata['sectiondata'] = $this->user->get_section_info($sectionid);
          
                $resultdata['teacherdata'] = $this->user->get_user_teacher();
                
                $resultdata['data']=$data['username'];
                
                $resultdata['data2']=$sectionid;
                $this->load->view('template/header_template_view');
                $this->load->view('manage_teacher_to_section_view',$resultdata);
                $this->load->view('template/footer_template_view');
           
        }else{ //not logged in, go back to login page
            redirect('login','refresh');
        }
    }//end of function
    
    function reassignTeacherToSection(){

        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
            
                $sectionid = $this->input->post('sectionid');
                $userid = $this->input->post('userid',TRUE);
            
           
                $resultdata['sectiondata'] = $this->user->get_section_info($sectionid);
          
                $resultdata['teacherdata'] = $this->user->get_user_teacher();
                
                $resultdata['data']=$data['username'];
                
                $resultdata['data2']=$sectionid;
                $this->load->view('template/header_template_view');
                $this->load->view('reassign_teacher_to_section_view',$resultdata);
                $this->load->view('template/footer_template_view');
           
        }else{ //not logged in, go back to login page
            redirect('login','refresh');
        }
    }//end of function
    
    
    function editManageTeacherToSection(){
        /*function to add/remove/update teacher to a section upon clicking "manage section" button in manage teacher-section view*/
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				//$data['usertype'] = $session_data['usertype'];         
            
            
                $sectionid = $this->input->post('sectionid');
                $teacherid = $this->input->post('teacherid');
                $usertype = $this->input->post('usertype');
                
                //$resultdata['results'] = $this->user->get_section_info($sectionid);
                //$resultdata['data']=$data['username'];
                $resultdata['data2']=$teacherid;
                $message['msg']=1;
                $this->user->assign_teacher_to_section($sectionid,$teacherid);
                $this->load->view('template/header_template_view');
                $this->load->view('success_create_account_view',$message);
                //$this->load->view('template/footer_template_view');
                      
            
        }else{
            redirect('login','refresh');
        }
    }//end of fucntion
    
    function editReassignTeacherToSection(){
        /*function to add/remove/update teacher to a section upon clicking "manage section" button in manage teacher-section view*/
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				//$data['usertype'] = $session_data['usertype'];         
            
            
                $sectionid = $this->input->post('sectionid');
                $teacherid = $this->input->post('teacherid');
                $usertype = $this->input->post('usertype');
                
                //$resultdata['results'] = $this->user->get_section_info($sectionid);
                //$resultdata['data']=$data['username'];
                $resultdata['data2']=$teacherid;
                $message['msg']=1;
                $this->user->reassign_teacher_to_section($sectionid,$teacherid);
                $this->load->view('template/header_template_view');
                $this->load->view('success_create_account_view',$message);
                //$this->load->view('template/footer_template_view');
                      
            
        }else{
            redirect('login','refresh');
        }
    }//end of fucntion
    
    function logout(){
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('home','refresh');
		}
    
    function enlistToSection(){
        //function of student; enlist to a section
        $this->load->library('form_validation');
        
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];         
                
            
                $sectionid = $this->input->post('sectionid');
                $userid = $data['userid'];
                //$dataarr = $this->input->post('dataarr');
                
                
                
                $this->user->request_enlist_to_section($sectionid,$userid);    
                
                
                $this->load->view('template/header_template_view');
                $this->load->view('success_reg_view');
                $this->load->view('template/footer_template_view');
           
        }else{ //not logged in, go back to login page
            redirect('login','refresh');
        }
    }
     
    
}//end of class
?>