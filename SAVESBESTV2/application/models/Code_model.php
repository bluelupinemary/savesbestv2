<?php
/*
	Filename: Code_model.php
	Author: Kristine Elaine P. Bautista
	Section: IT 210 EF-1L
	Code Description: Model for source code upload and download functionalities
*/
Class Code_model extends CI_Model{

	// check if logged-in user is a student
	public function isStudent(){
		// get user type
		$session_data = $this->session->userdata('logged_in'); // get userid from session
			
		// redirect to home if user is not a student
		if($session_data['usertype']!=0) redirect('/home');
	}

	// check if logged-in user is a teacher
	public function isTeacher(){
		// get user type
		$session_data = $this->session->userdata('logged_in'); // get userid from session
			
		// redirect to home if user is not a student
		if($session_data['usertype']!=2) redirect('/home');
	}


	// get full name of user based on userid
	public function getFullName($userid){
		$sql = "select concat(lname,', ',fname,' ',mname) fullname
				from user_table where userid=".$userid;
		$query = $this->db->query($sql);

		return $query->result()[0]->fullname;
	}


	// add user code to the database
	public function addCode($filename,$filetype,$content,$filesize,$student_id,$teacher_id){
		$data = new stdClass(); // initialize data class
		$data->exerid = null;
		$data->filename = $filename;
		$data->filetype = $filetype;
		$data->file = $content;
		$data->filesize = $filesize;
		$data->studentid = $student_id;
		$data->teacherid = $teacher_id;


		$datesent = date("Y-m-d H:i:s"); // get current timestamp
		$data->datesent = $datesent;

		// insert data to exercode table
		$this->db->insert('exercode',$data);
	}


	// get codes submitted to a certain teacher
	public function getCodes($teacher_id){
		$sql = "select e.exerid,e.filename,
				concat(s.lname,', ',s.fname,' ',s.mname) studentname,
				concat(sect.scode,' (',sect.sname,')') sectionname,
				DATE_FORMAT(e.datesent,'%b %d %Y, %h:%i %p') datesent
				from exercode e
				JOIN user_table s on e.studentid=s.userid
				JOIN user_in_section us1 on e.studentid=us1.userid
				JOIN user_in_section us2 on us1.sectionid=us2.sectionid
				JOIN section sect on us1.sectionid=sect.sectionid
				where us2.userid=".$teacher_id." and us2.usertype=2";
		$query = $this->db->query($sql); 
		
		return $query->result();
	}


	// get all codes submitted by a student (based on student_id)
	public function getStudentCodes($student_id){
		$sql = "select exerid,filename,
				DATE_FORMAT(datesent,'%b %d %Y, %h:%i %p') datesent 
				from exercode where studentid=".$student_id.
				" ORDER BY datesent";
		$query = $this->db->query($sql); 
		
		return $query->result();
	}


	// get exercode based on exerid
	public function getCodeById($exerid){
		$sql = "select * from exercode where exerid=".$exerid;
		$query = $this->db->query($sql);

		return $query->result()[0];
	}


	// get teacherid of the student's section
	public function getTeacherIdOfStudent($studentid){
		$sql = "select t.userid from user_in_section t
				JOIN user_in_section s on t.sectionid=s.sectionid
				where t.usertype=2 and s.userid=".$studentid;

		$query = $this->db->query($sql);
		$res = $query->result()[0];

		return $res->userid;
	}


}	
?>
