<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /*
 Class initially accessed when web app is run
 */
class login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
   $this->load->helper(array('form'));
 }

/*function handling the index/initial run of app
  fxn that loads the view > login_view.php
*/
 function index()
 {
   $this->load->view('template/header_template_view');
   $this->load->view('login_view');

 }

 function createAccount(){

 	 $this->load->view('template/header_template_view');
 	$this->load->view('create_account_view');
 	//$this->load->view('template/footer_template_view');
 }
 function thank(){
 	 $this->load->view('template/header_template_view');
 	$this->load->view('success_reg_view');
 	//$this->load->view('template/footer_template_view');
 }

    function samplepage(){
 	 $this->load->view('template/header_template_view');
 	$this->load->view('samplepage.php');
 	//$this->load->view('template/footer_template_view');
 }

    function login2(){
 	 $this->load->view('template/header_template_view');
 	$this->load->view('login_view2.php');
 	//$this->load->view('template/footer_template_view');
 }
 function aboutGame(){

 	 $this->load->view('template/header_template_view');
 	$this->load->view('about_game_view');
 	//$this->load->view('template/footer_template_view');
 }
 function gameReferences(){

 	 $this->load->view('template/header_template_view');
 	$this->load->view('references_view');
 	//$this->load->view('template/footer_template_view');
 }

}

?>
