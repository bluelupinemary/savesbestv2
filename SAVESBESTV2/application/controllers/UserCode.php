<?php
/*
	Filename: UserCode.php
	Author: Kristine Elaine P. Bautista
	Section: IT 210 EF-1L
	Code Description: Controller for source code upload and download functionalities
*/
if(!defined('BASEPATH')) exit('No direct script access allowed');

class UserCode extends CI_Controller {
	function __construct(){
		parent::__construct();
   		$this->load->helper(array('form','url','date','file','download'));
   		$this->load->model('Code_model','',TRUE);
   		$this->load->model('user','',TRUE);
	}	


	// Call Game Application
	function playGame() {
		$this->load->view('template/header_template_view');
		$this->load->view('game_view');
		$this->load->view('template/footer_template_view');
	}


	// user will submit a code uploaded from file
	function submitCode(){
		if($this->session->userdata('logged_in')){
			$this->Code_model->isStudent(); // check if student

			$this->load->view('template/header_template_view');
			$this->load->view('codes/submit_code_view');
			$this->load->view('template/footer_template_view');	
		}
		else redirect('/'); // redirect to log-in page
	}


	// code submission is successful
	function submitCodeSuccess(){
		if($this->session->userdata('logged_in')){
			$this->Code_model->isStudent(); // check if student

			$this->load->view('template/header_template_view');
			$this->load->view('codes/submit_code_success_view');
			$this->load->view('template/footer_template_view');
		}
		else redirect('/'); // redirect to log-in page
	}


	// upload the code to the database
	function uploadCode(){
		// check if user submitted a file
		if($_FILES['userfile']['tmp_name']==null){
			echo "<script>alert('No file uploaded!');</script>";
			echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		}
		// user has uploaded a file
		else if($this->session->userdata('logged_in') ){
			$this->Code_model->isStudent(); // check if student

			// get value-related values
			$filename = $_FILES['userfile']['name'];
			$tmpname = $_FILES['userfile']['tmp_name'];
			$filesize = $_FILES['userfile']['size'];
			$filetype = $_FILES['userfile']['type'];

			//read the file & put binary content to $content variable
			$fp = fopen($tmpname,'r');
			$content = fread($fp,filesize($tmpname));
			fclose($fp);

			// get student here...
			$session_data = $this->session->userdata('logged_in'); // get userid from session
			$student_id = $session_data['userid'];
			
			// for teacher_id, get teacher for the student's section
			$teacher_id = $this->Code_model->getTeacherIdOfStudent($student_id);

			// insert code to database
			$this->Code_model->addCode($filename,$filetype,$content,$filesize,$student_id,$teacher_id);

			// redirect here
			redirect('/UserCode/submitCodeSuccess');
		}
		else redirect('/'); // redirect to log-in page
	}


	// get all codes submitted to a certain teacher
	function getCodes(){
		if($this->session->userdata('logged_in')){
			$this->Code_model->isTeacher(); // check if teacher

			// get teacher_id
			$session_data = $this->session->userdata('logged_in'); // get userid from session
			$teacher_id = $session_data['userid'];

			//get list of codes submitted to the teacher
			$data['codes'] = $this->Code_model->getCodes($teacher_id);

			$this->load->view('template/header_template_view');
			$this->load->view('codes/get_codes_view',$data);
			$this->load->view('template/footer_template_view');
		}
		else redirect('/'); // redirect to log-in page
	}


	// get all codes submitted by a certain student
	function getStudentCodes(){
		if($this->session->userdata('logged_in')){
			$this->Code_model->isStudent(); // check if a student

			// get student_id
			$session_data = $this->session->userdata('logged_in'); // get userid from session
			$student_id = $session_data['userid'];

			//get list of cdownloadCodeFromTextodes submitted to the teacher
			$data['codes'] = $this->Code_model->getStudentCodes($student_id);
			$data['fullname'] = $this->Code_model->getFullName($student_id);

			$this->load->view('template/header_template_view');
			$this->load->view('codes/student_codes_view',$data);
			$this->load->view('template/footer_template_view');
		}
		else redirect('/'); // redirect to log-in page
	}


	// download code from the database
	function downloadCode($exerId){
		if($this->session->userdata('logged_in') && isset($exerId)){
			// get file from database
			$code = $this->Code_model->getCodeById($exerId);

			// get file details
			$size = $code->filesize;
			$type = $code->filetype;
			$name = $code->filename;
			$content = $code->file;

			// store file data in header
			header("Content-length: ".$size);
			header("Content-type: ".$type);
			header("Content-Disposition: attachment; filename=".$name);
			echo $content;
		}
		else redirect('/'); // redirect to log-in page
	}


	// download code from textarea
	function downloadCodeFromText(){
		if(isset($_POST['query_input'])){
			$filename = 'toyboxcode.tb';
			$fileUrl = '/var/www/html/it210/codeigniter/'.$filename;
			$data = $_POST['query_input'];

			// file cannot be written
			if ( ! write_file($fileUrl, $data))
			     echo 'Unable to write the file';
			// file can be written
			else{
				//read the file & put binary content to $content variable
				$fp = fopen($fileUrl,'r');
				$content = fread($fp,filesize($fileUrl));
				fclose($fp);

				// get file details
				$size = filesize($fileUrl);
				$type = filetype($fileUrl);
				
				// store file data in header
				header("Content-length: ".$size);
				header("Content-type: ".$type);
				header("Content-Disposition: attachment; filename=".$filename);
				echo $content;   
			}
		}
		else redirect('/'); // redirect to log-in page
	}

}
?>
