<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
Class accessed if user has successfully logged in
*/

	class Home extends CI_Controller{
		//constructor
		function __construct(){
			parent::__construct();
			$this->load->model('user','',TRUE);
			$this->load->helper('form');
  		$this->load->helper('url');
		}
		/*function invoked initially upon successful login
			the landing page; function to cater user types
		*/
		function index(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];

				$resultdata['username']=$data['username'];
                $resultdata['userid']=$data['userid'];
                $resultdata['usertype']=$data['usertype'];

				$resultdata['bills_not_paid_count'] = $this->user->get_count_consumer_bills_not_paid();
				$resultdata['payment_not_full'] = $this->user->get_count_payment_not_full();
				//echo "<br><br>".$resultdata['bills_not_paid_count']['cnt'];
				//if user is type 1 - admin; load admin_home_view.php
				if($data['usertype']==1){
					
					$this->load->view('template/header_template_view');
					$this->load->view('admin_home_view',$resultdata);
					//$this->load->view('template/footer_template_view');

				}else if($data['usertype']==2){
					//if user is type 2 - officer; load officer_home_view.php
        	$resultdata['sectionsHandled'] = $this->user->get_sections_handled($data['userid']);
        //$resultdata['pendingrequests'] = $this->user->get_pending_requests_per_section($teacherid);
        //$resultdata['teacher'] = $data['userid'];
					$this->load->view('template/header_template_view');
					$this->load->view('teacher_home_view',$resultdata);
					//$this->load->view('template/footer_template_view');

				}else if($data['usertype']==3){
					//if user is type 3 - meter reader
          $tempSection = $this->user->get_section_of_student_for_gameStart($data['userid']);
          $resultdata['studentdata'] = $this->user->get_student_in_sections($data['userid']);
          $resultdata['pendingreq'] = $this->user->get_student_with_pending($data['userid']);

					if(!empty($tempSection)){
                        $resultdata['studentSection'] = $tempSection;
                    }else{
                        $resultdata['studentSection'] = 0;
                    }
                    $this->load->view('template/header_template_view');
					$this->load->view('student_home_view',$resultdata);
					//$this->load->view('template/footer_template_view');
				}
			}else{
				redirect('login','refresh');
			}
		}

		//function to handle user logout
		function logout(){
            //if user pressed logout
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('../','refresh');

		}

		/*
		function viewUserProfile(){

            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];

                $userid = $this->input->post('userid');
                $resultdata['results'] = $this->user->get_user_profile($data['userid']);

            $resultdata['data']=$data['username'];
            $resultdata['data2']=$userid;
            $resultdata['usertype'] = $data['usertype'];

          $query1 = $this->user->get_user_profile_teacher($userid);
            $teacherdata['empid'] = $query1['empid'];
            $resultdata['empid'] = $teacherdata['empid'];



                $this->load->view('template/header_template_view');
		 	    $this->load->view('user_profile_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');

			}else{
				redirect('login','refresh');
			}


		}*/

		/*function that will add consumer to the database thru the admin account*/
		function addConsumer(){
            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];
				$this->load->view('template/header_template_view');
		 		$this->load->view('add_consumer_view',$data);
            }else{
                redirect('login','refresh');
            }
		}//end of add consumer

		/*edit a consumer through admin or officer account*/
		function editConsumer(){

    		if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
	        	$data['usertype'] = $session_data['usertype'];

	        	$resultdata['results'] = $this->user->get_consumers();

		        
		        $resultdata['username']=$data['username'];
		        $this->load->view('template/header_template_view');
		        $this->load->view('edit_consumer_view',$resultdata);
	        }else{
	            redirect('login','refresh');
	        }
		}//end of editconsumer()

		/*edit consumer details*/
		function addBondDepositToConsumer(){

    		if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
		        $data['usertype'] = $session_data['usertype'];

		        $resultdata['results'] = $this->user->get_consumers();
		        $resultdata['username']=$data['username'];


		        $this->load->view('template/header_template_view');
		        $this->load->view('add_bond_consumer_view',$resultdata);
	        }else{
	            redirect('login','refresh');
	        }
		}//end of editconsumer()

		/*function that will add readings to a consumer in the database*/
		function viewConsumersForReading(){
            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
	        	$data['usertype'] = $session_data['usertype'];

	        	$resultdata['results'] = $this->user->get_consumers_for_reading();
		        $resultdata['username']=$data['username'];
		        $this->load->view('template/header_template_view');
		        $this->load->view('add_reading_view',$resultdata);
	        }else{
	            redirect('login','refresh');
	        }
		}


		
		function viewConsumersForYearBalance(){
            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
	        	$data['usertype'] = $session_data['usertype'];

	        	//$resultdata['results'] = $this->user->get_consumers_for_reading();
	        	$resultdata['results'] = $this->user->get_consumers();
		        $resultdata['username']=$data['username'];
		        $this->load->view('template/header_template_view');
		        $this->load->view('add_year_balance_view',$resultdata);
	        }else{
	            redirect('login','refresh');
	        }
		}

		function viewImportedConsumersBills(){
            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
	        	$data['usertype'] = $session_data['usertype'];

	        	$resultdata['results'] = $this->user->get_consumer_billings();
		        $resultdata['username']=$data['username'];
		        $this->load->view('template/header_template_view');
		        $this->load->view('list_bills_view',$resultdata);
	        }else{
	            redirect('login','refresh');
	        }
		}

		/*function that will add readings to a consumer in the database*/
		function importConsumerBills(){
            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
	        	$data['usertype'] = $session_data['usertype'];

	        	//$resultdata['results'] = $this->user->get_consumers_for_reading();
		        $resultdata['username']=$data['username'];
		        $resultdata['ok'] = false;
		        $this->load->view('template/header_template_view');
		        $this->load->view('import_consumer_bills_view',$resultdata);
	        }else{
	            redirect('login','refresh');
	        }
		}



		/*
		function editUser(){

            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];

                $resultdata['results'] = $this->user->get_users();
                $resultdata['data']=$data['username'];


                $this->load->view('template/header_template_view');
                $this->load->view('edit_user_view',$resultdata);
                $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }
		}//end of edituser()*/


		//DELETE FUNCTIONS
		//function to delete reading
		function deleteReading(){
		     if($this->session->userdata('logged_in')){
		                $session_data = $this->session->userdata('logged_in');
		                $data['username'] = $session_data['username'];
		                $data['userid'] = $session_data['userid'];
		                $data['usertype'] = $session_data['usertype']; 

		                $reading_id = $this->input->post('reading_id');
		                $this->user->delete_reading($reading_id);
		               

		                $message['msg']=1;
		                $this->load->view('template/header_template_view');
		                $this->load->view('success_delete_reading_view',$message);
		                //$this->load->view('edit_consumer_view',$message);
		    }else{
		                redirect('login','refresh');
		    }
		 }//end of function    


		function deleteUser(){
			 if($this->session->userdata('logged_in')){
                //delete user thru teacher account
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];

                $resultdata['results'] = $this->user->get_users();
                 $resultdata['userinsec'] = $this->user->get_all_users_in_section();
                $resultdata['data']=$data['username'];
                $resultdata['useriddata'] = $data['userid'];

                $this->load->view('template/header_template_view');
                $this->load->view('delete_user_view',$resultdata);
                $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }

		}//end of deleteuser function

        function deleteUserProfileByAdmin(){
            //delete users thru admin account
			 if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];
                $userid=$this->input->post('userid');
                // $usertype=$this->input->post('usertype');
                // echo "user:".$userid ;
                $this->user->delete_user_profile($userid);

                $resultdata['results'] = $this->user->get_users();
                 $resultdata['userinsec'] = $this->user->get_all_users_in_section();
                $resultdata['data']=$data['username'];
                $resultdata['useriddata'] = $data['userid'];


                $this->load->view('template/header_template_view');
                $this->load->view('delete_user_view',$resultdata);
                $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }

		}//end of function

		//function called if the the list consumer button/image is clicked by admin type user
		function listConsumer(){
						//list users
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						//access User.php model to get_consumers from the database
						$resultdata['results'] = $this->user->get_consumers();
						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('list_consumers_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of listConsumer

		function viewCollectionNotPaid(){
						//list users
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						//access User.php model to get_consumers from the database
						$resultdata['results'] = $this->user->get_consumer_collection_not_paid();
						//$resultdata['id_arr'] = $this->user->get_id_consumer_collection_not_paid();
						$resultdata['receipt_results'] = $this->user->get_receipt_per_bill();
						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('list_collection_not_paid_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewReadingsForCollection function

		function viewYearlyCollection(){
						//open page to query month and year of collection to be viewed
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						

						//access User.php model to get_consumers from the database
						//$resultdata['results'] = $this->user->get_consumer_billings_for_collection();
						$resultdata['results'] = $this->user->get_consumers();

						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('query_collection_for_yearly_report_view',$resultdata);
						//$this->load->view('sample_pdf_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewYearlyCollection function


		function queryBillsToView(){
						//open page to query month and year of collection to be viewed
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						$temp_no = $this->input->post('account_no');
		                $temp_month = $this->input->post('month');
		                $temp_year = $this->input->post('year');
		                $month = intval($temp_month);
		                $year = intval($temp_year);
		                $account_no = intval($temp_no);

						//access User.php model to get_consumers from the database
						$resultdata['results'] = $this->user->get_consumer_billings_by_month_year($month,$year);
						//  $resultdata['results'] = $this->user->get_collections_for_edit_by_account($account_no,$month,$year);
		    //             $count = count($resultdata['results']);
		               // // echo "<br><br>COUNT: ".$count;
		               //  if($count > 0){
		               //      $resultdata['ok'] = true;
		               //  }else{
		               //      $resultdata['ok'] = false;
		               //  }
						//$resultdata['ok'] = 0;
						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('query_bills_to_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewReadingsForCollection function

		function queryImportedConsumersBillsByMonthYear(){
						//open page to query month and year of collection to be viewed
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						$temp_no = $this->input->post('account_no');
		                $temp_month = $this->input->post('month');
		                $temp_year = $this->input->post('year');
		                $month = intval($temp_month);
		                $year = intval($temp_year);
		                $account_no = intval($temp_no);

						//access User.php model to get_consumers from the database
						$resultdata['results'] = $this->user->get_consumer_billings_by_month_year($month,$year);
						//  $resultdata['results'] = $this->user->get_collections_for_edit_by_account($account_no,$month,$year);
		    //             $count = count($resultdata['results']);
		               // // echo "<br><br>COUNT: ".$count;
		               //  if($count > 0){
		               //      $resultdata['ok'] = true;
		               //  }else{
		               //      $resultdata['ok'] = false;
		               //  }
						//$resultdata['ok'] = 0;
						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('query_imported_bills_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewReadingsForCollection function


		function viewBillingsForCollection(){
						//list users
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						//access User.php model to get_consumers from the database
						$resultdata['results'] = $this->user->get_consumer_billings_for_collection();
						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('list_bills_for_collection_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewReadingsForCollection function

		function viewBillsNotPaid(){
						//list users
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						//access User.php model to get_consumers from the database
						$resultdata['results'] = $this->user->get_consumer_collection_not_paid();
						//$resultdata['id_arr'] = $this->user->get_id_consumer_collection_not_paid();
						$resultdata['receipt_results'] = $this->user->get_receipt_per_bill();
						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('query_bills_not_paid_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewReadingsForCollection function

		function queryCollectionToView(){
						//open page to query month and year of collection to be viewed
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						$temp_no = $this->input->post('account_no');
		                $temp_month = $this->input->post('month');
		                $temp_year = $this->input->post('year');
		                $month = intval($temp_month);
		                $year = intval($temp_year);
		                $account_no = intval($temp_no);

						//access User.php model to get_consumers from the database
						$resultdata['results'] = $this->user->get_consumer_billings_for_collection();
						//  $resultdata['results'] = $this->user->get_collections_for_edit_by_account($account_no,$month,$year);
		    //             $count = count($resultdata['results']);
		               // // echo "<br><br>COUNT: ".$count;
		               //  if($count > 0){
		               //      $resultdata['ok'] = true;
		               //  }else{
		               //      $resultdata['ok'] = false;
		               //  }
						//$resultdata['ok'] = 0;
						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('query_collection_to_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewReadingsForCollection function

		function viewStatementOfAccount(){
						//open page to query month and year of collection to be viewed
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						

						//access User.php model to get_consumers from the database
						//$resultdata['results'] = $this->user->get_consumer_billings_for_collection();
						$resultdata['results'] = $this->user->get_consumers();

						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('query_statement_account_to_view',$resultdata);
						//$this->load->view('sample_pdf_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewReadingsForCollection function

		function queryCollectionReport(){
						//open page to query month and year of collection to be viewed
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						//access User.php model to get_consumers from the database
						//$resultdata['results'] = $this->user->get_consumer_billings_for_collection();
						$resultdata['username']=$data['username'];

						$this->load->view('template/header_template_view');
						$this->load->view('query_collection_report_to_view',$resultdata);
						//$this->load->view('sample_pdf_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewReadingsForCollection function

		function queryAllCollections(){
						//open page to query month and year of collection to be viewed
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						//access User.php model to get_consumers from the database
						//$resultdata['results'] = $this->user->get_all_collections();
						$resultdata['username']=$data['username'];

						  $resultdata['receipt_results'] = $this->user->get_receipt_per_bill();

						$this->load->view('template/header_template_view');
						$this->load->view('query_all_collections_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of viewReadingsForCollection function
		function listAdmins(){
						//list users
				if($this->session->userdata('logged_in')){
						$session_data = $this->session->userdata('logged_in');
						$data['username'] = $session_data['username'];
						$data['userid'] = $session_data['userid'];
						$data['usertype'] = $session_data['usertype'];

						//access User.php model to get_consumers from the database
						$resultdata['results'] = $this->user->get_admins();
						$resultdata['username']=$data['username'];
						//$added_to_db = false;
						$this->load->view('template/header_template_view');
						$this->load->view('list_admins_view',$resultdata);

				}else{
						redirect('login','refresh');
				}
		}//end of listConsumer


		function updateAdmin(){
		     $this->load->library('form_validation');

		     if($this->session->userdata('logged_in')){
		     $session_data = $this->session->userdata('logged_in');
		     $data['username'] = $session_data['username'];
		     $data['userid'] = $session_data['userid'];
		     $data['usertype'] = $session_data['usertype'];
		     
		     $name = $this->input->post('name');
		     $designation = $this->input->post('designation');
		     $id = $this->input->post('id');

		     $resultdata['username']=$data['username'];
		     $resultdata['name'] = $name;
		     $resultdata['designation'] = $designation;
		     $resultdata['id'] = $id;




		     $this->load->view('template/header_template_view');
		     $this->load->view('edit_admin_details_view',$resultdata);

		     }else{
		         redirect('login','refresh');
		     }
	 	}

	 	function updateAdminDetails(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
                    $data['username'] = $session_data['username'];
                    $data['userid'] = $session_data['userid'];
                    $data['usertype'] = $session_data['usertype']; 

                     $admin_id = $this->input->post('admin_id');
                     $name = $this->input->post('name');
                     $designation = $this->input->post('designation');
                     //echo "<br><br><br>";
	                if($name!=NULL || $name !=""){
	                	//echo "IN HOME: ". $name." ";
	                	//echo $admin_id." ";
	                	//echo $designation;
		                $this->user->update_admin_info($admin_id,$name,$designation);
	                	$resultdata['added_to_db'] = true;
	                }
	                   //$resultdata['results'] = $this->user->get_collections_for_edit($bill_id);
                  //$resultdata['results'] =  $resultdata['username'] = $data['username'];
              		$resultdata['results'] = $this->user->get_admins();
                   $resultdata['username'] = $data['username'];
                $this->load->view('template/header_template_view');
                $this->load->view('list_admins_view',$resultdata);
                        
        }else{
                    redirect('login','refresh');
        }
    }// end of function




		/*
		function listUser(){
            //list users
            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];

                $resultdata['results'] = $this->user->get_users();
                $resultdata['data']=$data['username'];

                $this->load->view('template/header_template_view');
		 	    $this->load->view('list_user_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }
		}//end of listUser*/
















		function createSection(){
            //create section using admin account
            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
                $data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];
                $this->load->view('template/header_template_view');
                $this->load->view('create_section_view',$data);
                $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }
		}
		function editSection(){
            //edit section using admin account
            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];

                $resultdata['results'] = $this->user->get_sections();
                $resultdata['data']=$data['username'];


                $this->load->view('template/header_template_view');
                $this->load->view('edit_section_view',$resultdata);
                $this->load->view('template/footer_template_view');

            }else{
                redirect('login','refresh');
            }

		}//end of editsection()

		function deleteSection(){
            //delete section using admin account
			 if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];

                $resultdata['results'] = $this->user->get_sections();
                $resultdata['data']=$data['username'];

                 $resultdata['userinsec'] = $this->user->get_all_sections_in_section();

                $this->load->view('template/header_template_view');
		 	    $this->load->view('delete_section_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }
		}//end of delete section

        function deleteSectionInfo(){
            //delete section thru admin
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

		function listSection(){
            //list sections using admin acount
             if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];

                 $resultdata['results'] = $this->user->get_teacher_join_section();
                $resultdata['data']=$data['username'];


                $this->load->view('template/header_template_view');
		 	    $this->load->view('list_section_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');

            }else{
                redirect('login','refresh');
            }

		}//end of list section
		function addTeacherToSection(){
            //assign teacher to section using admin account
            if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];

                 $resultdata['results'] = $this->user->get_sections();
                $resultdata['data']=$data['username'];
                $resultdata['teacherdata'] = $this->user->get_teacher_in_sections();


               $this->load->view('template/header_template_view');
		 	    $this->load->view('add_teacher_to_section_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');


            }else{
                redirect('login','refresh');
            }

		}
        function listSection_home(){
             if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];

                 $resultdata['results'] = $this->user->get_teacher_join_section();
                $resultdata['data']=$data['username'];
                 $resultdata['userid']=$data['userid'];


                $this->load->view('template/header_template_view');
		 	    $this->load->view('enlist_to_section_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');

            }else{
                redirect('login','refresh');
            }

		}//end of list section
		function viewToyboxApp(){
			$this->load->view('template/header_template_view');
		 	$this->load->view('toybox_app_view');
		 	$this->load->view('template/footer_template_view');

		}
        function listPendingEnlistmentRequests(){
                //list pending enlistment requests to section handled by the teacher currently logged in per section
			 if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];
                $sectionid = $this->input->post('sectionid');

                $resultdata['results'] = $this->user->get_pending_of_section($sectionid);
                $resultdata['data']=$data['username'];



                $this->load->view('template/header_template_view');
		 	    $this->load->view('list_pending_request_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }



		}//end of fxn


         function listAllPendingEnlistmentRequests(){
             //list ALL pending enlistment requests on sections handled by the current user-teacher
			 if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];
                $userid=$data['userid'];

                $resultdata['results'] = $this->user->get_pending_of_all_section($userid);
                $resultdata['data']=$data['username'];



                $this->load->view('template/header_template_view');
		 	    $this->load->view('list_all_pending_requests_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }



		}//end of fxn
        function listAllStudentOfTeacher(){
             //list ALL students of teachers of all sections handled by the current user-teacher this is for remove student function of teacher
			 if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];
                $userid=$data['userid'];

                $resultdata['results'] = $this->user->get_students_of_teacher($userid);
                $resultdata['data']=$data['username'];



                $this->load->view('template/header_template_view');
		 	    $this->load->view('list_student_of_teacher_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }



		}//end of fxn
        function listAllStudentOfTeacher2(){
             //list ALL students of teachers of all sections handled by the current user-teacher. this is for list all students function of teacher
			 if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];
                $userid=$data['userid'];

                $resultdata['results'] = $this->user->get_students_of_teacher($userid);
                $resultdata['data']=$data['username'];



                $this->load->view('template/header_template_view');
		 	    $this->load->view('list_student_of_teacher2_view',$resultdata);
		 	    $this->load->view('template/footer_template_view');
            }else{
                redirect('login','refresh');
            }



		}//end of fxn



	}




?>
