<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Internationalization extends CI_Controller {

	// constructor that will also load all needed models and libraries
	function __construct(){
 		parent::__construct();
 		$this->load->model('internationalization_model','',TRUE);
 		$this->load->helper(array('form','url'));
 	}


 	/** Controller Functions for Manipulating Language Records **/

	// get list of all languages
	function get_languages(){
		$languages = $this->internationalization_model->retrieve_languages();

		print_r($languages);
	}
 

 	// get one language based on language_id
 	function retrieve_language(){
 		$id = $this->input->post('id'); // get language_id from user

 		// call retrieve_language model
 		$language = $this->internationalization_model->retrieve_language($id);
 		print_r($language);
 	}

 	// controller for adding a new language
 	function add_language(){
 		// get input from user
 		$language = $this->input->post('language_name');

 		// transform string to uppercase
 		$language = strtoupper($language);

 		// insert new language to the database

 		$info = $this->internationalization_model->create_language($language);
 	}


 	/** Controller Functions for Site Content Records **/

 	// controller for getting a list of site contents
 	function get_sitecontents(){
 		$contents = $this->internationalization_model->retrieve_sitecontents();

		print_r($contents);
 	}

}
?>