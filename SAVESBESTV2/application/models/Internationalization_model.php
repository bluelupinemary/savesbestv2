<?php
/*
	Filename: Internationalization_model.php
	Author: Kristine Elaine P. Bautista
	Section: IT 210 EF-1L
	Code Description:
		codes for performing database manipulation processes for internationalization.
*/
Class Internationalization_model extends CI_Model{

	/** Functions for Manipulating Language Records **/

	// get all languages from the database
	public function retrieve_languages(){
		$sql = "SELECT * FROM content_language"; // get contents from 'content_language' table
		$query = $this->db->query($sql); 
		
		return $query->result();
	}

	// get one language from the database
	public function retrieve_language($id){
		$query = $this->db->get_where('content_language',array('language_id' => $id),0,1);
		return $query->result()[0];
	}

	// add language to the database
	public function create_language($language){
		$language = array('language_name' => $language);

		// insert new language to the database
		$this->db->insert('content_language',$language);

		// must return newly inserted value...

		/* $id = $this->getMaxLanguageId();
		$info = $this->retrieve_language($id); // get info of inserted language

		return $info;*/
	}

	// update language name in the database
	public function update_language($id,$language){
		$language = array('language_name' => $language);

		// update language information in the database
		$this->db->update('content_language',$language,array('id' => $id));

		// must return newly updated value...
		$info = $this->retrieve_language($id); // get info of updated language
		return $info;
	}

	// delete language from the database
	public function delete_language($id){
		$info = $this->retrieve_language($id); // get info for language to be deleted

		// delete given language from the database
		$this->db->delete('content_language',array('id' => $id));

		return $info;// return info of newly deleted value
	}


	/** Controller Functions for Site Content Records **/
	
	// get all site contents from the database
	public function retrieve_sitecontents(){
		$sql = "SELECT * FROM site_content"; // get contents from 'site_content' table
		$query = $this->db->query($sql); 
		
		return $query->result();
	}

}
?>