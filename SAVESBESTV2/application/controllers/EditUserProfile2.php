<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class EditUserProfile2 extends CI_Controller
{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
    }
 
    function index()
    {
        if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];
        

            //set table id in table open tag
            $tmpl = array('table_open' => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">');
            $this->table->set_template($tmpl);

            $this->table->set_heading('First Name', 'Middle Name', 'Last Name');
              $this->load->view('template/header_template_view');
             $this->load->view('edit2_user_view',$data);
             $this->load->view('template/footer_template_view');
           
        }
    }
 
    //function to handle callbacks

}