<?php

	Class User extends CI_Model{
		function login($username,$password){
			$saltvar = 'XOUKFeHZMRtIfyw';
			$this->db->select('userid,username,password,usertype');
			$this->db->from('user_table');
			$this->db->where('username',$username);
			$this->db->where('password',sha1($password.$saltvar));
			$this->db->limit(1);

			$query = $this->db->get();

			if($query->num_rows() == 1){
				return $query->result();
			}else{
				return false;
			}
		}
		public function add_user(){
			$saltvar = 'XOUKFeHZMRtIfyw';
			$passvar = $this->input->post('password').$saltvar;
  			$data_username=$this->input->post('username');
  			$data=array(
	    		'username'=>$this->input->post('username'),
	    		'password'=>sha1($passvar),
	    		'address'=>$this->input->post('address'),
	    		'mobile'=>$this->input->post('mobile_number'),
	    		'email'=>$this->input->post('email_address'),
	    		'fname'=>$this->input->post('firstname'),
	    		'mname'=>$this->input->post('middlename'),
	    		'lname'=>$this->input->post('lastname'),
	    		'usertype'=>$this->input->post('usertype')
				);
  			$this->db->set('datecreated', 'NOW()', FALSE);
  			$this->db->insert('user_table',$data);

  			$this->db->select('userid');
  			$this->db->from('user_table');
  			$this->db->where('username',$data_username);
  			$this->db->limit(1);
  			$query = $this->db->get();
  			$userid = $query->row();

  			$data_student=array(
  				'userid'=>$userid->userid,
  				);
  			$this->db->insert('student',$data_student);

 		}
 		function get_usernames(){
 			$this->db->select('username');
			$this->db->from('user_table');
			$this->db->limit(1);

			$query = $this->db->get();


			return $query->result();

 		}

 		function check_user($userid){
 			$this->db->select('usertype');
			$this->db->from('user_table');
			$this->db->where('userid',$userid);
			$this->db->limit(1);
			$query = $this->db->get();

			if($query->num_rows() == 1){
				return $query->result();
			}else{
				return false;
			}

 		}

 		function get_user_profile($userid){
 			$this->db->select('*');
			$this->db->from('user_table');
			$this->db->where('userid',$userid);
			//$this->db->limit(1);

			$query = $this->db->get();


			return $query->result_array();

 		}
 		function get_user_profile_teacher($userid){
 			$this->db->select('empid');
			$this->db->from('teacher');
			$this->db->where('userid',$userid);
			//$this->db->limit(1);

			$query = $this->db->get();


			return  $query->row_array();

 		}
 		function get_user_profile_student($userid){
 			$this->db->select('studentid');
			$this->db->from('student');
			$this->db->where('userid',$userid);
			//$this->db->limit(1);

			$query = $this->db->get();


			return $query->row_array();

 		}

 		function edit_user_profile($userid){

 			$saltvar = 'XOUKFeHZMRtIfyw';
			$passvar = $this->input->post('password').$saltvar;
  			$data=array(
	    		'password'=>sha1($passvar),
	    		'address'=>$this->input->post('address'),
	    		'mobile'=>$this->input->post('mobile_number'),
	    		'email'=>$this->input->post('email_address'),
	    		'fname'=>$this->input->post('firstname'),
	    		'mname'=>$this->input->post('middlename'),
	    		'lname'=>$this->input->post('lastname')
				);
  			$this->db->where('userid',$userid);
  			$this->db->update('user_table',$data);

  			$usertype = $this->input->post('usertype');
  			$empid = $this->input->post('empid');
  			if($usertype==2){
  				$data2 = array(
  					'empid' => $empid
  					);

  					$this->db->where('userid',$userid);
  					$this->db->update('teacher',$data2);


  			}

 		}

 		function add_user_by_admin(){
 			$saltvar = 'XOUKFeHZMRtIfyw';
			$passvar = $this->input->post('password').$saltvar;
			$usertypevar = $this->input->post('usertype');
  			$data_username=$this->input->post('username');

  			$data=array(
	    		'username'=>$this->input->post('username'),
	    		'password'=>sha1($passvar),
	    		'address'=>$this->input->post('address'),
	    		'mobile'=>$this->input->post('mobile_number'),
	    		'email'=>$this->input->post('email_address'),
	    		'fname'=>$this->input->post('firstname'),
	    		'mname'=>$this->input->post('middlename'),
	    		'lname'=>$this->input->post('lastname'),
	    		'usertype' => $this->input->post('usertype'),
				);
  			$this->db->set('datecreated', 'NOW()', FALSE);
  			$this->db->insert('user_table',$data);


  			$this->db->select('userid');
  			$this->db->from('user_table');
  			$this->db->where('username',$data_username);
  			$this->db->limit(1);
  			$query = $this->db->get();
  			$userid = $query->row();

  			if($usertypevar==1){
  				$data_admin=array(
  					'userid'=>$userid->userid,
  					'empid' => $this->input->post('empid')
  				);
  				$this->db->insert('admin',$data_admin);
  			}else if($usertypevar==2){
  				$data_teacher=array(
  					'userid'=>$userid->userid,
  					'empid' => $this->input->post('empid')
  				);
  				$this->db->insert('teacher',$data_teacher);
  			}else{
  				$data_student=array(
  					'userid'=>$userid->userid,
  				);
  				$this->db->insert('student',$data_student);
  			}
 		}
/*=consumer starts here===============================================================*/
		//model function to add consumer using add_consumer_view page
		function add_consumer(){
			$consumerType = $this->input->post('consumerType');
  			$accountNo=$this->input->post('accountNo');
			$employeeNo=$this->input->post('employeeNo');
			$isEmployee = 0;
			if($employeeNo != NULL || $employeeNo !=''){
				$isEmployee = 1;
			}else{
				$isEmployee = 0;
			}

  			$data=array(
  				'id'=>$this->input->post('consumerID'),
	    		'account_no'=>$this->input->post('accountNo'),
				'fullname'=>$this->input->post('fullname'),
	    		'address'=>$this->input->post('address'),
	    		'consumer_type'=>$this->input->post('consumerType'),
	    		'payment_type'=>$this->input->post('paymentType'),
	    		'is_active'=>1,
	    		'is_coleasee'=>$this->input->post('isColeasee'),
	    		'is_employee'=>$isEmployee,
	    		'date_updated' => NULL,
				'has_bond_deposit' => NULL,
				);
  			$this->db->set('date_added', 'NOW()', FALSE);
				//insert the data as new row in the database
  			$this->db->insert('consumer',$data);

/*
  			$this->db->select('userid');
  			$this->db->from('user_table');
  			$this->db->where('username',$data_username);
  			$this->db->limit(1);
  			$query = $this->db->get();
  			$userid = $query->row();*/

				//consumer is an employee
  			if($isEmployee==1){
  				$employee_data=array(
  					'employee_no'=>$this->input->post('employeeNo'),
  					'account_no' => $this->input->post('accountNo')
  				);
  				$this->db->insert('consumer_employee',$employee_data);
  			}
 		}//end of function

		//model function to get consumers from the database
		function get_consumers(){
			$this->db->select('*');
			$this->db->from('consumer');
			$this->db->where('is_active',1);
			#$this->db->from('consumer');
			$query = $this->db->get();
			return $query->result_array();
 		} //end of get consumers


 		//function to get a consumer's details/info
		function get_consumer_profile($consumer_id){
			$this->db->select('*');
			$this->db->from('consumer');
			$this->db->where('id',$consumer_id);
			//$this->db->limit(1);

			$query = $this->db->get();

			return $query->result_array();

		}

		//function to get all consumers who are also employees
		function get_consumer_employee_no($accountNo){
			$this->db->select('employee_no');
			$this->db->from('consumer_employee');
			$this->db->where('account_no',$accountNo);
			//$this->db->limit(1);

			$query = $this->db->get();

			return $query->result_array();

		}

		//function o get consumer info for consumer reading table
		function get_consumers_for_reading(){

			$this->db->select('consumer.*,consumer_reading.id as reading_id, MAX(consumer_reading.bill_month) as last_bill_month,MAX(consumer_reading.bill_year) as last_bill_year');
			$this->db->from('consumer');
			$this->db->where('is_active',1);
			$this->db->join('consumer_reading', 'consumer.id = consumer_reading.consumer_id');
			$this->db->group_by("consumer.id", "last_bill_year","last_bill_month");


			$query = $this->db->get();
			return $query->result_array();
 		} //end of get consumers

 		//function to get the readings of an associated consumer
 		function get_this_consumer_readings($consumer_id){

			$this->db->select('consumer.account_no,consumer.fullname,consumer.address, consumer.consumer_type, consumer_reading.*');
			$this->db->from('consumer_reading');
			$this->db->join('consumer', 'consumer.id = consumer_reading.consumer_id');
			$this->db->where('consumer_reading.consumer_id',$consumer_id);
			//$this->db->limit(1);

			$query = $this->db->get();

			return $query->result_array();


			$query = $this->db->get();
			return $query->result_array();
 		} //end of get consumers


		//function to edit consumer details
		function update_consumer($consumer_id){
			$consumerType = $this->input->post('consumerType');
			$consumer_id = $this->input->post('consumer_id');
  			$accountNo=$this->input->post('accountNo');
			$employeeNo=$this->input->post('employeeNo');
			$isEmployee = 0;
			if($employeeNo != NULL || $employeeNo !=''){
				$isEmployee = 1;
			}else{
				$isEmployee = 0;
			}

  			$data=array(
	    		'account_no'=>$this->input->post('accountNo'),
				'fullname'=>$this->input->post('fullname'),
	    		'address'=>$this->input->post('address'),
	    		'consumer_type'=>$this->input->post('consumerType'),
	    		'payment_type'=>$this->input->post('paymentType'),
	    		'is_active'=>1,
	    		'is_coleasee'=>$this->input->post('isColeasee'),
	    		'is_employee'=>$isEmployee,
				'has_bond_deposit' => NULL,
				);
  			$this->db->set('date_updated', 'NOW()', FALSE);
			//update the data in the database using the consumer id
			$this->db->where('id',$consumer_id);
  			$this->db->update('consumer',$data);
  			//$this->db->insert('consumer',$data);

/*
  			$this->db->select('userid');
  			$this->db->from('user_table');
  			$this->db->where('username',$data_username);
  			$this->db->limit(1);
  			$query = $this->db->get();
  			$userid = $query->row();*/

			//consumer is an employee
			$this->db->select('id');
				$this->db->from('consumer_employee');
				$this->db->where('account_no',$accountNo);
				$this->db->limit(1);
				$query = $this->db->get();
  				$usertype = $query->row();


  			if ($query->num_rows() > 0) {
	  			if($isEmployee==1){
	  				$employee_data=array(
	  					'employee_no'=>$this->input->post('employeeNo'),
	  					'account_no' => $this->input->post('accountNo')
	  				);
	  				$this->db->where('id',$consumer_id);
	  				$this->db->update('consumer_employee',$employee_data);
	  			}else{
					$this->db->where('account_no',$accountNo);
		  			$this->db->delete('consumer_employee');
	  			}	
  			}else{ //else, if not yet in the table, add the consumer
				$employee_data=array(
  					'employee_no'=>$this->input->post('employeeNo'),
  					'account_no' => $this->input->post('accountNo')
  				);
  				$this->db->insert('consumer_employee',$employee_data);
  			}
  			
 		}//end of function

 		//function to archive consumer
 		function archive_consumer($consumer_id){
 			$id = $consumer_id;
 			$this->db->set('is_active','0');
 			$this->db->where('id',$id);
  			$this->db->update('consumer');
  		}//end of function

  		//function to archive consumer
 		function add_bond_deposit_to_consumer($consumer_id, $account_no){

  			$data=array(
	    		'account_no'=>$account_no,
				'bond_amount'=>$this->input->post('bondAmount'),
				'is_returned'=>0,
				'date_returned'=>NULL,
				'returned_by'=>NULL,
				);
  			$this->db->set('date_recorded', 'NOW()', FALSE);
				//insert the data as new row in the database
  			$this->db->insert('consumer_bond_deposit',$data);

  			$id = $consumer_id;
 			$this->db->set('has_bond_deposit',1);
 			$this->db->where('id',$id);
  			$this->db->update('consumer');
  		}//end of function

  		function add_year_balance_to_consumer($consumer_id,$elecBalance, $waterBalance, $garbageBalance,$year){
  			$this->db->select('count(*) as cnt');
			$this->db->from('consumer_electric_balance');
			$this->db->where('consumer_id',$consumer_id);
			$this->db->where('balance_year',$year);
			$query = $this->db->get();
			$result = $query->result_array();
			$isAdded = false;
			if($result[0]['cnt'] == 0){
				$data=array(
	    		'consumer_id'=>$consumer_id,
				'balance_amount'=>$elecBalance,
				'balance_year'=>$year
				);
 
				//insert the data as new row in the database
  				$this->db->insert('consumer_electric_balance',$data);
  				$isAdded = true;
			}

			$this->db->select('count(*) as cnt');
			$this->db->from('consumer_water_balance');
			$this->db->where('consumer_id',$consumer_id);
			$this->db->where('balance_year',$year);
			$query = $this->db->get();
			$result = $query->result_array();
			if($result[0]['cnt'] == 0){
				$data1=array(
	    		'consumer_id'=>$consumer_id,
				'balance_amount'=>$waterBalance,
				'balance_year'=>$year
				);
 
				//insert the data as new row in the database
  				$this->db->insert('consumer_water_balance',$data1);	
  				$isAdded = true;
			}

			$this->db->select('count(*) as cnt');
			$this->db->from('consumer_garbage_balance');
			$this->db->where('consumer_id',$consumer_id);
			$this->db->where('balance_year',$year);
			$query = $this->db->get();
			$result = $query->result_array();
			if($result[0]['cnt'] == 0){
				$data2=array(
	    		'consumer_id'=>$consumer_id,
				'balance_amount'=>$garbageBalance,
				'balance_year'=>$year
				);
 
				//insert the data as new row in the database
  				$this->db->insert('consumer_garbage_balance',$data2);	
  				$isAdded = true;
			}

			if($isAdded) return true;
			else return false;
			
  			
  		}//end of function


		//function to archive consumer
 		function delete_reading($reading_id){
 			$this->db->where('id',$reading_id);
	  		$this->db->delete('consumer_reading');
  		}//end of function

  		//function that will add imported readings to consumer_reading table
  		function add_imported_billing_to_consumer($consumer_id,$account_no,$electricity,$water,$garbage,$space_type,$month,$year,$date){
  				$data=array(
		    		'consumer_id'=>$consumer_id,
		    		'bill_month'=>$month,
		    		'bill_year'=>$year,
		    		'electricity_reading'=>$electricity,
		    		'water_reading'=>$water,
		    		'garbage_fee'=>$garbage,
		    		'date_added'=>$date
					);

	  			$this->db->insert('consumer_bill',$data);
  			
  		}//end of function

  		//function that will get reading id associated to a consumer
  		function check_if_month_year_billings_exist($month, $year){
  			$this->db->select('count(*) as cnt');
			$this->db->from('consumer_bill');
			$this->db->where('bill_month',$month);
			$this->db->where('bill_year',$year);
			$query = $this->db->get();
			$result = $query->result_array();
			if($result[0]['cnt'] == 0){
				return false;			
			}
			else{return true;}
		}//end of function

		//accessed in the home-index() for the notification part in admin_home_view.php
		function get_count_consumer_bills_not_paid(){
  	// 		$this->db->select('count(*) as cnt');
			// $this->db->from('consumer_bill');
			// $this->db->where('is_paid',0);
			// $query = $this->db->get();
			$query = $this->db->query("select count(*) as cnt from consumer_bill where id not in (select bill_id from consumer_collection)");
			$result = $query->result_array();
			//echo "<br><br>RESULT: ";
			//print_r($result);
			return $result[0];
		}//end of function

		function get_count_payment_not_full(){
  	// 		$this->db->select('count(*) as cnt');
			// $this->db->from('consumer_bill');
			// $this->db->where('is_paid',0);
			// $query = $this->db->get();
			$query = $this->db->query("select count(*) as cnt from consumer_bill where (is_paid=0 or is_paid is null) and id in (select bill_id from consumer_collection) ");
			$result = $query->result_array();
			//echo "<br><br>RESULT: ";
			//print_r($result);
			return $result[0];
		}//end of function




		//function to get the readings for collection / readings not yet paid
 		function get_readings_for_collection(){

			// $this->db->select('consumer_reading.*');
			// $this->db->from('consumer_reading');
			// $this->db->where_not_in('consumer_reading.id',$consumer_id);
			// //$this->db->limit(1);

			// $query = $this->db->get();
			$query = $this->db->query("select a.*,b.fullname as fullname,b.address,b.consumer_type from consumer_bill a join consumer b on a.consumer_id=b.id where a.id not in (select reading_id from consumer_collection)");
			return $query->result_array();


 		} //end of get consumers

 		function get_consumer_billings(){

			// $this->db->select('consumer_reading.*');
			// $this->db->from('consumer_reading');
			// $this->db->where_not_in('consumer_reading.id',$consumer_id);
			// //$this->db->limit(1);

			// $query = $this->db->get();
			$query = $this->db->query("select a.*,b.fullname as fullname,b.account_no, b.address,b.consumer_type from consumer_bill a join consumer b on a.consumer_id=b.id");
			return $query->result_array();


 		} //end of get consumers

 		function get_electric_balance($consumer_id,$year){
			$query = $this->db->query("select balance_amount from consumer_electric_balance where consumer_id=".$consumer_id." and balance_year =".$year." LIMIT 1");
			return $query->result_array();
 		} //end of get consumers

 		function get_water_balance($consumer_id,$year){
			$query = $this->db->query("select balance_amount from consumer_water_balance where consumer_id=".$consumer_id." and balance_year =".$year." LIMIT 1");
			return $query->result_array();
 		} //end of get consumers

 		function get_garbage_balance($consumer_id,$year){
			$query = $this->db->query("select balance_amount from consumer_garbage_balance where consumer_id=".$consumer_id." and balance_year =".$year." LIMIT 1");
			return $query->result_array();
 		} //end of get consumers

 		function get_consumer_billings_by_month_year($month, $year){

			// $this->db->select('consumer_reading.*');
			// $this->db->from('consumer_reading');
			// $this->db->where_not_in('consumer_reading.id',$consumer_id);
			// //$this->db->limit(1);

			// $query = $this->db->get();
			$query = $this->db->query("select a.*,b.fullname as fullname,b.address,b.consumer_type from consumer_bill a join consumer b on a.consumer_id=b.id where a.id not in (select bill_id from consumer_collection) and a.bill_month=".$month." and a.bill_year=".$year);
			return $query->result_array();


 		} //end of get consumers

 		function get_consumer_billings_by_month_year_for_listing($month, $year){

			// $this->db->select('consumer_reading.*');
			// $this->db->from('consumer_reading');
			// $this->db->where_not_in('consumer_reading.id',$consumer_id);
			// //$this->db->limit(1);

			// $query = $this->db->get();
		$query = $this->db->query("select a.*,b.fullname as fullname,b.account_no, b.address,b.consumer_type from consumer_bill a join consumer b on a.consumer_id=b.id where a.bill_month=".$month." and a.bill_year=".$year);
			return $query->result_array();


 		} //end of get consumers

 		function get_consumer_billings_for_collection(){

			// $this->db->select('consumer_reading.*');
			// $this->db->from('consumer_reading');
			// $this->db->where_not_in('consumer_reading.id',$consumer_id);
			// //$this->db->limit(1);

			// $query = $this->db->get();
			$query = $this->db->query("select a.*,b.fullname as fullname,b.address,b.consumer_type from consumer_bill a join consumer b on a.consumer_id=b.id where a.id not in (select bill_id from consumer_collection)");
			return $query->result_array();


 		} //end of get consumers

 		function get_consumer_collection_not_paid(){
			$query = $this->db->query("select a.*,b.fullname as fullname,b.address,b.consumer_type,(a.electricity_reading - c.electricity_amount_paid) as electricity_balance, (a.water_reading - c.water_amount_paid) as water_balance, (a.garbage_fee - c.garbage_amount_paid) as garbage_balance from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where a.is_paid=0 or a.is_paid is null");
			
			
			return $query->result_array();


 		} //end of get consumers

 		function get_consumer_billings_not_paid_by_month_year($month,$year){
			$query = $this->db->query("select a.*,b.account_no, b.fullname as fullname,b.address,b.consumer_type,c.electricity_amount_paid, c.water_amount_paid, c.garbage_amount_paid from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where (a.is_paid=0 or a.is_paid is null) and a.bill_month=".$month." and a.bill_year=".$year);
			
			
			return $query->result_array();


 		} //end of get consumers

		function get_id_consumer_collection_not_paid(){
			$query = $this->db->query("select a.id from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where a.is_paid=0 or a.is_paid is null");

			return $query->result_array();


 		} //end of get consumers

 		function get_all_receipts_per_month_year($bill_month,$bill_year){
			$query = $this->db->query("select a.id, b.bill_id, b.utility_type, b.receipt_no, b.receipt_date from consumer_bill a right join receipt b on a.id=b.bill_id where a.bill_month=".$bill_month." and a.bill_year=".$bill_year);


			return $query->result_array();


 		} //end of get consumers

 		function get_receipt_per_bill(){
			$query = $this->db->query("select a.id, b.bill_id, b.utility_type, b.receipt_no, b.receipt_date from consumer_bill a right join receipt b on a.id=b.bill_id where a.is_paid=0 or a.is_paid is null");


			return $query->result_array();


 		} //end of get consumers

 		function get_receipt_per_consumer_account($bill_id){
			$query = $this->db->query("select bill_id, utility_type, receipt_no, receipt_date from receipt where bill_id=".$bill_id);


			return $query->result_array();


 		} //end of get consumers

 		function get_elec_bal_per_consumer_account($consumer_id,$year){
			$query = $this->db->query("select balance_amount from consumer_electric_balance where consumer_id=".$consumer_id." and balance_year=".$year);
			return $query->result_array();
 		} //end of get consumers

 		function get_water_bal_per_consumer_account($consumer_id,$year){
			$query = $this->db->query("select balance_amount from consumer_water_balance where consumer_id=".$consumer_id." and balance_year=".$year);
			return $query->result_array();
 		} //end of get consumers

 		function get_garbage_bal_per_consumer_account($consumer_id,$year){
			$query = $this->db->query("select balance_amount from consumer_garbage_balance where consumer_id=".$consumer_id." and balance_year=".$year);
			return $query->result_array();
 		} //end of get consumers


 		function get_consumer_statement_of_account($consumer_id,$year){
			$query = $this->db->query("select a.consumer_id,a.electricity_reading, a.water_reading, a.garbage_fee, a.bill_month, a.id as bill_id, b.* from consumer_bill a join consumer_collection b on a.id=b.bill_id where a.bill_year=".$year." and a.consumer_id=".$consumer_id." order by a.bill_month");
			
			
			return $query->result_array();


 		} //end of get consumers

 		function get_id_of_consumer($account_no){
			$query = $this->db->query("select id from consumer where account_no=".$account_no);
			return $query->result_array();
 		} //end of get consumers

 		function get_consumer_bill_ids($consumer_id,$year){
			$query = $this->db->query("select id from consumer_bill where bill_year=".$year." and consumer_id=".$consumer_id);
			
			
			return $query->result_array();


 		} //end of get consumers

 		function add_payment_to_consumer_collection($bill_id,$consumer_id,$electricity,$water,$garbage,$e_receiptNo,$e_receiptDate,$w_receiptNo,$w_receiptDate,$g_receiptNo,$g_receiptDate,$bill_month, $bill_year, $date_added,$username){
				if($electricity == '' || $electricity==NULL){
					$electricity=0;
				}
				if($water == '' || $water==NULL){
					$water=0;
				}
				if($garbage == '' || $garbage==NULL){
					$garbage=0;
				}
  				$data=array(
		    		'bill_id'=>$bill_id,
		    		'electricity_amount_paid'=>$electricity,
		    		'water_amount_paid'=>$water,
		    		'garbage_amount_paid'=>$garbage,
		    		//'receipt_number'=>$receiptNo,
		    		//'receipt_date'=>$receiptDate,
		    		'date_added'=>$date_added
					);

	  			$this->db->insert('consumer_collection',$data);

	  			$query = $this->db->query("select electricity_reading from consumer_bill where id=".$bill_id);
	  			$temp_elec = $query->result_array();
	  			$query = $this->db->query("select water_reading from consumer_bill where id=".$bill_id);
	  			$temp_water = $query->result_array();
	  			$query = $this->db->query("select garbage_fee from consumer_bill where id=".$bill_id);
	  			$temp_garbage = $query->result_array();
	  			//print_r($temp_garbage);
	  			$bill_garbage_amount = $temp_garbage[0]['garbage_fee'];
	  			$bill_elec_amount = $temp_elec[0]['electricity_reading'];
	  			$bill_water_amount = $temp_water[0]['water_reading'];
	  		 	//echo "<br><br>BILL E:".$bill_elec_amount." W: ".$bill_water_amount." G: ".$
	  		 	//echo $bill_garbage_amount;

	  		 	if($e_receiptDate!=NULL || $e_receiptDate!=""){
	  		 		//echo "<br><br><br>R: ".$e_receiptDate;
					$data2=array(
		    		'bill_id'=>$bill_id,
		    		'utility_type'=>1,
		    		'receipt_no'=>$e_receiptNo,
		    		'receipt_date'=>$e_receiptDate,
		    		'date_added'=>$date_added,
		    		'added_by'=>$username
					);
					$this->db->insert('receipt',$data2);
  				}
  				

  				if($w_receiptDate!=NULL || $w_receiptDate!=""){
					$data3=array(
		    		'bill_id'=>$bill_id,
		    		'utility_type'=>2,
		    		'receipt_no'=>$w_receiptNo,
		    		'receipt_date'=>$w_receiptDate,
		    		'date_added'=>$date_added,
		    		'added_by'=>$username
					);
					$this->db->insert('receipt',$data3);
  				}
  				
  				if($g_receiptDate!=NULL || $g_receiptDate!=""){
					$data4=array(
		    		'bill_id'=>$bill_id,
		    		'utility_type'=>3,
		    		'receipt_no'=>$g_receiptNo,
		    		'receipt_date'=>$g_receiptDate,
		    		'date_added'=>$date_added,
		    		'added_by'=>$username
					);
					$this->db->insert('receipt',$data4);
  				}

	  		 	if($electricity >= $bill_elec_amount && $water >= $bill_water_amount && $garbage >= $bill_garbage_amount){
	  				$data=array(
	    				'is_paid'=>1
					);
		  			$this->db->where('id',$bill_id);
		  			$this->db->update('consumer_bill',$data);
	  			}



	  			//START OF CHECKING FOR CONSUMER_ELECTRIC_BALANCE


	  			$prev_year = intval($bill_year)-1;
	  			//check if the consumer has an electric overpayment/underpayment from the previous year
	  			$query = $this->db->query("select * from consumer_electric_balance where consumer_id=".$consumer_id." and balance_year=".$prev_year);
	  			$prev_elec = $query->result_array();
	  			//placeholder values only
	  			$prev_elec_bal = 0;
	  			$prev_elec_bal_year = NULL;
	  		
	  			$count2 = count ($prev_elec);
	  			//if there is an existing electric balance from the previous year
	  			if($count2 > 0){
	  				$prev_elec_bal = $prev_elec[0]['balance_amount'];
	  				$prev_elec_bal_year = $prev_elec[0]['balance_year'];
	  			}
	  			

	  			//check if consumer has existing balance for the current year
	  			$query = $this->db->query("select * from consumer_electric_balance where consumer_id=".$consumer_id." and balance_year=".$bill_year);
	  			$temp_elec = $query->result_array();
	  			//placeholder values only
	  			$elec_bal = 0;
	  			$elec_bal_year = NULL;
	  		
	  			$count = count ($temp_elec);



	  			//if there is no record yet of the current year's electric balance and if the current bill is the first month of the year
				if($count==0){
					//check for an overpayment for the current month (if positive, overpayment)
					$elec_overpayment=0;
					$elec_current_balance=0;
					$total_elec_bal = $prev_elec_bal;
					
					// if there is an overpayment in the current month-year collection 
	  				if($electricity > $bill_elec_amount){
						$elec_overpayment = $electricity - $bill_elec_amount;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_elec_bal <= 0){
							//add the excess to the underpayment
							$total_elec_bal = $total_elec_bal + $elec_overpayment;
						}else{
						//if the previous elec balance is an overpayment (positive value), we should deduct the excess from the overpayment
							$total_elec_bal = $total_elec_bal + $elec_overpayment;
						}
	  				}
	  				//else if the consumer has an underpayment for the current month
	  				else if($electricity < $bill_elec_amount){
	  					$elec_current_balance = $bill_elec_amount - $electricity;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_elec_bal <= 0){
							//add to the underpayment
							$total_elec_bal = $total_elec_bal - $elec_current_balance;
						}
	  					
	  				}

					

	  				//insert the current year's balance to the database
	  				$data5=array(
		    		'balance_amount'=>$total_elec_bal,
		    		'balance_year'=>$bill_year,
		    		'consumer_id'=>$consumer_id
					);
					$this->db->insert('consumer_electric_balance',$data5);
	  			}

	  			//there is an existing record for the current year and month is not the first month of the year
	  			else if($count > 0){
	  				$elec_bal = $temp_elec[0]['balance_amount'];
	  				$elec_bal_year = $temp_elec[0]['balance_year'];

	  				$elec_overpayment=0;
					$elec_current_balance=0;
					$total_elec_bal = $elec_bal;
					
					// if there is an overpayment in the current month-year collection 
	  				if($electricity > $bill_elec_amount){
						$elec_overpayment = $electricity - $bill_elec_amount;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_elec_bal <= 0){
							//add the excess to the underpayment
							$total_elec_bal = $total_elec_bal + $elec_overpayment;
						}else{
						//if the previous elec balance is an overpayment (positive value), we should deduct the excess from the overpayment
							$total_elec_bal = $total_elec_bal + $elec_overpayment;
						}
	  				}
	  				//else if the consumer has an underpayment for the current month
	  				else if($electricity < $bill_elec_amount){
	  					$elec_current_balance = $bill_elec_amount - $electricity;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_elec_bal <= 0){
							//add to the underpayment
							$total_elec_bal = $total_elec_bal - $elec_current_balance;
						}
	  					
	  				}

	  				//update the current year's balance in the database
	  				$data6=array(
		    			'balance_amount'=>$total_elec_bal,
					);
					$this->db->where('consumer_id',$consumer_id);
		  			$this->db->where('balance_year',$bill_year);
		  			$this->db->update('consumer_electric_balance',$data6);
	  				
	  			} // END OF CHECKING FOR CONSUMER ELECTRIC BALANCE




	  	// 		//==============START OF CHECKING FOR CONSUMER WATER BALANCE

	  			$prev_year = intval($bill_year)-1;
	  			//check if the consumer has an electric overpayment/underpayment from the previous year
	  			$query = $this->db->query("select * from consumer_water_balance where consumer_id=".$consumer_id." and balance_year=".$prev_year);
	  			$prev_water = $query->result_array();
	  			//placeholder values only
	  			$prev_water_bal = 0;
	  			$prev_water_bal_year = NULL;
	  		
	  			$count2 = count ($prev_water);
	  			//if there is an existing electric balance from the previous year
	  			if($count2 > 0){
	  				$prev_water_bal = $prev_water[0]['balance_amount'];
	  				$prev_water_bal_year = $prev_water[0]['balance_year'];
	  			}

	  			//check if consumer has existing balance for the current year
	  			$query = $this->db->query("select * from consumer_water_balance where consumer_id=".$consumer_id." and balance_year=".$bill_year);
	  			$temp_water = $query->result_array();
	  			//placeholder values only
	  			$water_bal = 0;
	  			$water_bal_year = NULL;
	  		
	  			$count = count ($temp_water);



	  			//if there is no record yet of the current year's electric balance and if the current bill is the first month of the year
				if($count==0){
					//check for an overpayment for the current month
					$water_overpayment=0;
					$water_current_balance=0;
					$total_water_bal = $prev_water_bal;

					// if there is an overpayment in the current month-year collection 
	  				if($water > $bill_water_amount){
						$water_overpayment = $water - $bill_water_amount;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_water_bal <= 0){
							//add the excess to the underpayment
							$total_water_bal = $total_water_bal + $water_overpayment;
						}else{
						//if the previous elec balance is an overpayment (positive value), we should deduct the excess from the overpayment
							$total_water_bal = $total_water_bal + $water_overpayment;
						}
	  				}
	  				//else if the consumer has an underpayment for the current month
	  				else if($water < $bill_water_amount){
	  					$water_current_balance = $bill_water_amount - $water;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_water_bal <= 0){
							//add to the underpayment
							$total_water_bal = $total_water_bal - $water_current_balance;
						}
	  					
	  				}
					
	  				//insert the current year's balance to the database
	  				$data7=array(
		    		'balance_amount'=>$total_water_bal,
		    		'balance_year'=>$bill_year,
		    		'consumer_id'=>$consumer_id
					);
					$this->db->insert('consumer_water_balance',$data7);
	  			}

	  			//there is an existing record for the current year and month is not the first month of the year
	  			else if($count > 0){
	  				$water_bal = $temp_water[0]['balance_amount'];
	  				$water_bal_year = $temp_water[0]['balance_year'];

	  				$water_overpayment=0;
					$water_current_balance=0;
					$total_water_bal = $water_bal;
					
					// if there is an overpayment in the current month-year collection 
	  				if($water > $bill_water_amount){
						$water_overpayment = $water - $bill_water_amount;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_water_bal <= 0){
							//add the excess to the underpayment
							$total_water_bal = $total_water_bal + $water_overpayment;
						}else{
						//if the previous elec balance is an overpayment (positive value), we should deduct the excess from the overpayment
							$total_water_bal = $total_water_bal + $water_overpayment;
						}
	  				}
	  				//else if the consumer has an underpayment for the current month
	  				else if($water < $bill_water_amount){
	  					$water_current_balance = $bill_water_amount - $water;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_water_bal <= 0){
							//add to the underpayment
							$total_water_bal = $total_water_bal - $water_current_balance;
						}
	  					
	  				}

	  				//update the current year's balance in the database
	  				$data8=array(
		    			'balance_amount'=>$total_water_bal,
					);
					$this->db->where('consumer_id',$consumer_id);
		  			$this->db->where('balance_year',$bill_year);
		  			$this->db->update('consumer_water_balance',$data8);	
	  			} //END OF WATER BALANCE CHECKING



	  	// 		//==============START OF CHECKING FOR CONSUMER GARBAGE BALANCE
	  			$prev_year = intval($bill_year)-1;
	  			//check if the consumer has an electric overpayment/underpayment from the previous year
	  			$query = $this->db->query("select * from consumer_garbage_balance where consumer_id=".$consumer_id." and balance_year=".$prev_year);
	  			$prev_garbage = $query->result_array();
	  			//placeholder values only
	  			$prev_garbage_bal = 0;
	  			$prev_garbage_bal_year = NULL;
	  		
	  			$count2 = count ($prev_garbage);
	  			//if there is an existing electric balance from the previous year
	  			if($count2 > 0){
	  				$prev_garbage_bal = $prev_garbage[0]['balance_amount'];
	  				$prev_garbage_bal_year = $prev_garbage[0]['balance_year'];
	  			}

	  			//check if consumer has existing balance for the current year
	  			$query = $this->db->query("select * from consumer_garbage_balance where consumer_id=".$consumer_id." and balance_year=".$bill_year);
	  			$temp_garbage= $query->result_array();
	  			//placeholder values only
	  			$garbage_bal = 0;
	  			$garbage_bal_year = NULL;
	  		
	  			$count = count ($temp_garbage);



	  			//if there is no record yet of the current year's electric balance and if the current bill is the first month of the year
				if($count==0){
					//check for an overpayment for the current month
					$garbage_overpayment=0;
					$garbage_current_balance=0;
					$total_garbage_bal = $prev_garbage_bal;
					
					// if there is an overpayment in the current month-year collection 
	  				if($garbage > $bill_garbage_amount){
						$garbage_overpayment = $garbage - $bill_garbage_amount;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_garbage_bal <= 0){
							//add the excess to the underpayment
							$total_garbage_bal = $total_garbage_bal + $garbage_overpayment;
						}else{
						//if the previous elec balance is an overpayment (positive value), we should deduct the excess from the overpayment
							$total_garbage_bal = $total_garbage_bal + $garbage_overpayment;
						}
	  				}
	  				//else if the consumer has an underpayment for the current month
	  				else if($garbage < $bill_garbage_amount){
	  					$garbage_current_balance = $bill_garbage_amount - $garbage;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_garbage_bal <= 0){
							//add to the underpayment
							$total_garbage_bal = $total_garbage_bal - $garbage_current_balance;
						}
	  					
	  				}
	  				//insert the current year's balance to the database
	  				$data9=array(
		    		'balance_amount'=>$total_garbage_bal,
		    		'balance_year'=>$bill_year,
		    		'consumer_id'=>$consumer_id
					);
					$this->db->insert('consumer_garbage_balance',$data9);
	  			}

	  			//there is an existing record for the current year and month is not the first month of the year
	  			else if($count > 0){
	  				$garbage_bal = $temp_garbage[0]['balance_amount'];
	  				$garbage_bal_year = $temp_garbage[0]['balance_year'];

	  				$garbage_overpayment=0;
					$garbage_current_balance=0;
					$total_garbage_bal = $garbage_bal;
					
					// if there is an overpayment in the current month-year collection 
	  				if($garbage > $bill_garbage_amount){
						$garbage_overpayment = $garbage - $bill_garbage_amount;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_garbage_bal <= 0){
							//add the excess to the underpayment
							$total_garbage_bal = $total_garbage_bal + $garbage_overpayment;
						}else{
						//if the previous elec balance is an overpayment (positive value), we should deduct the excess from the overpayment
							$total_garbage_bal = $total_garbage_bal + $garbage_overpayment;
						}
	  				}
	  				//else if the consumer has an underpayment for the current month
	  				else if($garbage < $bill_garbage_amount){
	  					$garbage_current_balance = $bill_garbage_amount - $garbage;
						//and if the previous elec balance is an underpayment (negative value)
						if($total_garbage_bal <= 0){
							//add to the underpayment
							$total_garbage_bal = $total_garbage_bal - $garbage_current_balance;
						}
	  					
	  				}

	  				//update the current year's balance in the database
	  				$data10=array(
		    			'balance_amount'=>$total_garbage_bal,
					);
					$this->db->where('consumer_id',$consumer_id);
		  			$this->db->where('balance_year',$bill_year);
		  			$this->db->update('consumer_garbage_balance',$data10);	
	  			}


	  			
  			
  		}//end of function

 		/* OLD VERSION
 		function add_payment_to_consumer_collection($bill_id,$electricity,$water,$garbage,$receiptNo,$receiptDate,$date_added){
  				$data=array(
		    		'bill_id'=>$bill_id,
		    		'electricity_amount_paid'=>$electricity,
		    		'water_amount_paid'=>$water,
		    		'garbage_amount_paid'=>$garbage,
		    		'receipt_number'=>$receiptNo,
		    		'receipt_date'=>$receiptDate,
		    		'date_added'=>$date_added
					);

	  			$this->db->insert('consumer_collection',$data);

	  			$query = $this->db->query("select electricity_reading from consumer_bill where id=".$bill_id);
	  			$temp_elec = $query->result_array();
	  			$query = $this->db->query("select water_reading from consumer_bill where id=".$bill_id);
	  			$temp_water = $query->result_array();
	  			$query = $this->db->query("select garbage_fee from consumer_bill where id=".$bill_id);
	  			$temp_garbage = $query->result_array();
	  			//print_r($temp_garbage);
	  			$bill_garbage_amount = $temp_garbage[0]['garbage_fee'];
	  			$bill_elec_amount = $temp_elec[0]['electricity_reading'];
	  			$bill_water_amount = $temp_water[0]['water_reading'];
	  		 	//echo "<br><br>BILL E:".$bill_elec_amount." W: ".$bill_water_amount." G: ".$
	  		 	//echo $bill_garbage_amount;

	  		 	if($bill_elec_amount==$electricity && $bill_water_amount==$water && $bill_garbage_amount==$garbage){
	  				$data=array(
	    				'is_paid'=>1
					);
		  			$this->db->where('id',$bill_id);
		  			$this->db->update('consumer_bill',$data);
	  			}


	  	// 		
  			
  		}//end of function*/

  		function get_collections_for_edit($billID){
	
			$query = $this->db->query("select a.*,b.fullname as fullname,b.address,b.consumer_type,c.receipt_number, c.receipt_date from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where a.id=".$billID);

			return $query->result_array();


 		} //end of get consumers

 		function get_collections_for_edit_by_account($account_no, $month, $year){
	
			$query = $this->db->query("select a.id,b.id as consumer_id, b.fullname as fullname,b.address,b.consumer_type,b.account_no, c.electricity_amount_paid, c.water_amount_paid, c.garbage_amount_paid, a.bill_month, month(c.receipt_date) as payment_month, a.bill_year, year(c.receipt_date) as payment_year, c.surcharge,c.receipt_number, c.receipt_date from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where b.account_no=".$account_no." and a.bill_month=".$month." and a.bill_year=".$year);

			return $query->result_array();


 		} //end of get consumers

 		function get_collections_for_view($month, $year){
	
			$query = $this->db->query("select a.*,b.fullname as fullname,b.address,b.consumer_type,c.electricity_amount_paid, c.water_amount_paid, c.garbage_amount_paid, c.receipt_number, c.receipt_date,c.surcharge from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where a.bill_month=".$month." and a.bill_year=".$year);

			return $query->result_array();


 		} //end of get consumers


  	function update_payment_in_consumer_collection($bill_id,$electricity,$water,$garbage,$receiptNo,$receiptDate,$date_updated,$updated_by){

  		
  			$data=array(
		    		'electricity_amount_paid'=>$electricity,
		    		'water_amount_paid'=>$water,
		    		'garbage_amount_paid'=>$garbage,
		    		'receipt_number'=>$receiptNo,
		    		'receipt_date'=>$receiptDate,
		    		'date_updated'=>$date_updated,
		    		'updated_by' =>$updated_by
					);

			$this->db->where('bill_id',$bill_id);
	  		$this->db->update('consumer_collection',$data);
  			
  		}//end of function


  		function update_partial_payment_of_consumer_in_collection($bill_id,$electricity,$water,$garbage,$e_receiptNo,$e_receiptDate,$w_receiptNo,$w_receiptDate,$g_receiptNo,$g_receiptDate,$date_updated,$updated_by){
//UPDATE `consumer_bill` SET `is_paid`=0;
  		//	echo "<br><br><br>".$e_receiptNo."| ".$e_receiptDate."|".$w_receiptNo."| ".$w_receiptDate."| ".$g_receiptNo."| ".$g_receiptDate;
  			$query = $this->db->query("select electricity_amount_paid, water_amount_paid,garbage_amount_paid from consumer_collection where bill_id=".$bill_id);
  			$temp = $query->result_array();
	  		// 	//print_r($temp_garbage);
	  		$temp_elec = $temp[0]['electricity_amount_paid'] + $electricity;
	  		$temp_water = $temp[0]['water_amount_paid'] + $water;
	  		$temp_garbage = $temp[0]['garbage_amount_paid'] + $garbage;

	  		//echo "<br><br><br>".$temp_elec." ".$temp_water." ".$temp_garbage;


	  		$query = $this->db->query("select electricity_reading, water_reading,garbage_fee from consumer_bill where id=".$bill_id);
	  		$temp = $query->result_array();
	  		// 	//print_r($temp_garbage);
	  		$bill_elec = $temp[0]['electricity_reading'];
	  		$bill_water = $temp[0]['water_reading'];
	  		$bill_garbage = $temp[0]['garbage_fee'];

	  		//echo "<br>".$bill_elec." ".$bill_water." ".$bill_garbage;

  				
  			$data=array(

		    		'electricity_amount_paid'=>$temp_elec,
		    		'water_amount_paid'=>$temp_water,
		    		'garbage_amount_paid'=>$temp_garbage,
		    		'date_updated'=>$date_updated,
		    		'updated_by' =>$updated_by
					);
  				$this->db->where('bill_id',$bill_id);
	  			$this->db->update('consumer_collection',$data);


	  		$query = $this->db->query("select utility_type, receipt_date from receipt where bill_id=".$bill_id);
	  		$temp2 = $query->result_array();
	  		//echo "<br><br>";
	  		//print_r($temp2);
	  		$has_elec_receipt = false;
	  		$has_water_receipt = false;
	  		$has_garbage_receipt = false;

	  		foreach ($temp2 as $result) {
	  			if($result['utility_type']==1){
	  				$has_elec_receipt = true;
	  			}
	  			else if($result['utility_type']==2){
	  				$has_water_receipt = true;
	  			}else if($result['utility_type']==3){
	  				$has_garbage_receipt=true;
	  			}
	  		}

	  			//UPDATE IF TO BE EDITED; INSERT ALL TO TABLE IF ADDED TO COLLECTION
	  			if($e_receiptDate!=NULL || $e_receiptDate!=""){
					if($has_elec_receipt == true){
						//echo "<br><br><br>R: ".$e_receiptDate;
						$data2=array(
				    		'receipt_no'=>$e_receiptNo,
				    		'receipt_date'=>$e_receiptDate,
				    		'date_updated'=>$date_updated,
				    		'added_by' =>$updated_by
						);
						$this->db->where('utility_type',1);
						$this->db->where('bill_id',$bill_id);
	  					$this->db->update('receipt',$data2);
					}else{
						$data2=array(
				    		'bill_id'=>$bill_id,
				    		'utility_type'=>1,
				    		'receipt_no'=>$e_receiptNo,
				    		'receipt_date'=>$e_receiptDate,
				    		'date_added'=>$date_updated,
				    		'added_by' =>$updated_by
						);
						$this->db->insert('receipt',$data2);
					}
				
  				}
  				

  				if($w_receiptDate!=NULL || $w_receiptDate!=""){
  					//echo "herreeeee";
  					if($has_water_receipt == true){
						//echo "<br><br><br>R: ".$e_receiptDate;
						$data3=array(
				    		'receipt_no'=>$w_receiptNo,
				    		'receipt_date'=>$w_receiptDate,
				    		'date_updated'=>$date_updated,
				    		'added_by' =>$updated_by
						);
						$this->db->where('utility_type',2);
						$this->db->where('bill_id',$bill_id);
	  					$this->db->update('receipt',$data3);
					}else{
						$data3=array(
			    		'bill_id'=>$bill_id,
			    		'utility_type'=>2,
			    		'receipt_no'=>$w_receiptNo,
			    		'receipt_date'=>$w_receiptDate,
			    		'date_updated'=>$date_updated,
			    		'added_by' =>$updated_by
						);
						$this->db->insert('receipt',$data3);
					}
					
  				}
  				
  				if($g_receiptDate!=NULL || $g_receiptDate!=""){
  					if($has_garbage_receipt == true){
						//echo "<br><br><br>R: ".$e_receiptDate;
						$data4=array(
				    		'receipt_no'=>$g_receiptNo,
				    		'receipt_date'=>$g_receiptDate,
				    		'date_updated'=>$date_updated,
				    		'added_by' =>$updated_by
						);
						$this->db->where('utility_type',3);
						$this->db->where('bill_id',$bill_id);
	  					$this->db->update('receipt',$data4);
					}else{
			    		$data4=array(
			    		'bill_id'=>$bill_id,
			    		'utility_type'=>3,
			    		'receipt_no'=>$g_receiptNo,
			    		'receipt_date'=>$g_receiptDate,
			    		'date_updated'=>$date_updated,
			    		'added_by' =>$updated_by
						);
						$this->db->insert('receipt',$data4);
					}
					
  				}



	  			if($bill_elec==$temp_elec && $bill_water==$temp_water && $bill_garbage==$temp_garbage){
	  				$data=array(
	    				'is_paid'=>1
					);
		  			$this->db->where('id',$bill_id);
		  			$this->db->update('consumer_bill',$data);

	  				//echo "<br><br>TRUEEEE";
	  			}else{
	  				$data=array(
	    				'is_paid'=>0
					);
		  			$this->db->where('id',$bill_id);
		  			$this->db->update('consumer_bill',$data);
	  			}
  		}
  		// function update_partial_payment_of_consumer_in_collection($bill_id,$electricity,$water,$garbage,$receiptNo,$receiptDate,$date_updated,$updated_by){


  		// 	$query = $this->db->query("select electricity_amount_paid, water_amount_paid,garbage_amount_paid from consumer_collection where bill_id=".$bill_id);
  		// 	$temp = $query->result_array();
	  	// 	// 	//print_r($temp_garbage);
	  	// 	$temp_elec = $temp[0]['electricity_amount_paid'] + $electricity;
	  	// 	$temp_water = $temp[0]['water_amount_paid'] + $water;
	  	// 	$temp_garbage = $temp[0]['garbage_amount_paid'] + $garbage;

	  	// 	//echo "<br><br><br>".$temp_elec." ".$temp_water." ".$temp_garbage;


	  	// 	$query = $this->db->query("select electricity_reading, water_reading,garbage_fee from consumer_bill where id=".$bill_id);
	  	// 	$temp = $query->result_array();
	  	// 	// 	//print_r($temp_garbage);
	  	// 	$bill_elec = $temp[0]['electricity_reading'];
	  	// 	$bill_water = $temp[0]['water_reading'];
	  	// 	$bill_garbage = $temp[0]['garbage_fee'];

	  	// 	//echo "<br>".$bill_elec." ".$bill_water." ".$bill_garbage;

  				
  		// 	$data=array(

		  //   		'electricity_amount_paid'=>$temp_elec,
		  //   		'water_amount_paid'=>$temp_water,
		  //   		'garbage_amount_paid'=>$temp_garbage,
		  //   		'receipt_number'=>$receiptNo,
		  //   		'receipt_date'=>$receiptDate,
		  //   		'date_updated'=>$date_updated,
		  //   		'updated_by' =>$updated_by
				// 	);
  		// 		$this->db->where('bill_id',$bill_id);
	  	// 		$this->db->update('consumer_collection',$data);


	  	// 		if($bill_elec==$temp_elec && $bill_water==$temp_water && $bill_garbage==$temp_garbage){
	  	// 			$data=array(
	   //  				'is_paid'=>1
				// 	);
		  // 			$this->db->where('id',$bill_id);
		  // 			$this->db->update('consumer_bill',$data);

	  	// 			//echo "<br><br>TRUEEEE";
	  	// 		}else{
	  	// 			$data=array(
	   //  				'is_paid'=>0
				// 	);
		  // 			$this->db->where('id',$bill_id);
		  // 			$this->db->update('consumer_bill',$data);
	  	// 		}
  		// }

  		function update_payment_of_consumer_in_collection($consumer_id,$bill_year,$bill_id,$electricity,$water,$garbage,$surcharge,$e_receiptNo,$e_receiptDate,$w_receiptNo,$w_receiptDate,$g_receiptNo,$g_receiptDate,$date_updated,$updated_by,$elec_bal,$water_bal,$garbage_bal){

  			$data=array(

		    		'electricity_amount_paid'=>$electricity,
		    		'water_amount_paid'=>$water,
		    		'garbage_amount_paid'=>$garbage,
		    		'surcharge'=>$surcharge,
		    		'date_updated'=>$date_updated,
		    		'updated_by' =>$updated_by
					);
  				$this->db->where('bill_id',$bill_id);
	  			$this->db->update('consumer_collection',$data);


  			$query = $this->db->query("select electricity_amount_paid, water_amount_paid,garbage_amount_paid from consumer_collection where bill_id=".$bill_id);
  			$temp = $query->result_array();
	  		// 	//print_r($temp_garbage);
	  		$temp_elec = $temp[0]['electricity_amount_paid'];// + $electricity;
	  		$temp_water = $temp[0]['water_amount_paid'];// + $water;
	  		$temp_garbage = $temp[0]['garbage_amount_paid'];// + $garbage;

	  		//echo "<br><br><br>".$temp_elec." ".$temp_water." ".$temp_garbage;


	  		$query = $this->db->query("select electricity_reading, water_reading,garbage_fee from consumer_bill where id=".$bill_id);
	  		$temp = $query->result_array();
	  		// 	//print_r($temp_garbage);
	  		$bill_elec = $temp[0]['electricity_reading'];
	  		$bill_water = $temp[0]['water_reading'];
	  		$bill_garbage = $temp[0]['garbage_fee'];

	  		//echo "<br>".$bill_elec." ".$bill_water." ".$bill_garbage;

  				

	  			if($temp_elec >= $bill_elec && $temp_water >= $bill_water && $temp_garbage >= $bill_garbage){
	  				$data=array(
	    				'is_paid'=>1
					);
		  			$this->db->where('id',$bill_id);
		  			$this->db->update('consumer_bill',$data);

	  				//echo "<br><br>TRUEEEE";
	  			}else{
	  				$data=array(
	    				'is_paid'=>0
					);
		  			$this->db->where('id',$bill_id);
		  			$this->db->update('consumer_bill',$data);
	  			}

	  		$query = $this->db->query("select utility_type, receipt_date from receipt where bill_id=".$bill_id);
	  		$temp2 = $query->result_array();
	  		//echo "<br><br>";
	  		//print_r($temp2);
	  		$has_elec_receipt = false;
	  		$has_water_receipt = false;
	  		$has_garbage_receipt = false;

	  		foreach ($temp2 as $result) {
	  			if($result['utility_type']==1){
	  				$has_elec_receipt = true;
	  			}
	  			else if($result['utility_type']==2){
	  				$has_water_receipt = true;
	  			}else if($result['utility_type']==3){
	  				$has_garbage_receipt=true;
	  			}
	  		}
	  			//UPDATE IF TO BE EDITED; INSERT ALL TO TABLE IF ADDED TO COLLECTION
	  			if($e_receiptDate!=NULL || $e_receiptDate!=""){
					if($has_elec_receipt == true){
						//echo "<br><br><br>R: ".$e_receiptDate;
						$data2=array(
				    		'receipt_no'=>$e_receiptNo,
				    		'receipt_date'=>$e_receiptDate,
				    		'date_updated'=>$date_updated,
				    		'added_by' =>$updated_by
						);
						$this->db->where('utility_type',1);
						$this->db->where('bill_id',$bill_id);
	  					$this->db->update('receipt',$data2);
					}else{
						$data2=array(
				    		'bill_id'=>$bill_id,
				    		'utility_type'=>1,
				    		'receipt_no'=>$e_receiptNo,
				    		'receipt_date'=>$e_receiptDate,
				    		'date_added'=>$date_updated,
				    		'added_by' =>$updated_by
						);
						$this->db->insert('receipt',$data2);
					}
				
  				}
  				

  				if($w_receiptDate!=NULL || $w_receiptDate!=""){
  					//echo "herreeeee";
  					if($has_water_receipt == true){
						//echo "<br><br><br>R: ".$e_receiptDate;
						$data3=array(
				    		'receipt_no'=>$w_receiptNo,
				    		'receipt_date'=>$w_receiptDate,
				    		'date_updated'=>$date_updated,
				    		'added_by' =>$updated_by
						);
						$this->db->where('utility_type',2);
						$this->db->where('bill_id',$bill_id);
	  					$this->db->update('receipt',$data3);
					}else{
						$data3=array(
			    		'bill_id'=>$bill_id,
			    		'utility_type'=>2,
			    		'receipt_no'=>$w_receiptNo,
			    		'receipt_date'=>$w_receiptDate,
			    		'date_updated'=>$date_updated,
			    		'added_by' =>$updated_by
						);
						$this->db->insert('receipt',$data3);
					}
					
  				}
  				
  				if($g_receiptDate!=NULL || $g_receiptDate!=""){
  					if($has_garbage_receipt == true){
						//echo "<br><br><br>R: ".$e_receiptDate;
						$data4=array(
				    		'receipt_no'=>$g_receiptNo,
				    		'receipt_date'=>$g_receiptDate,
				    		'date_updated'=>$date_updated,
				    		'added_by' =>$updated_by
						);
						$this->db->where('utility_type',3);
						$this->db->where('bill_id',$bill_id);
	  					$this->db->update('receipt',$data4);
					}else{
			    		$data4=array(
			    		'bill_id'=>$bill_id,
			    		'utility_type'=>3,
			    		'receipt_no'=>$g_receiptNo,
			    		'receipt_date'=>$g_receiptDate,
			    		'date_updated'=>$date_updated,
			    		'added_by' =>$updated_by
						);
						$this->db->insert('receipt',$data4);
					}
					
  				}

  				if($elec_bal!=NULL || $elec_bal!=""){
  					$data5=array(
			    		'balance_amount'=>$elec_bal
						);
						$this->db->where('consumer_id',$consumer_id);
						$this->db->where('balance_year',$bill_year);
	  					$this->db->update('consumer_electric_balance',$data5);
  				}
  				if($water_bal!=NULL || $water_bal!=""){
  					$data6=array(
			    		'balance_amount'=>$water_bal
						);
						$this->db->where('consumer_id',$consumer_id);
						$this->db->where('balance_year',$bill_year);
	  					$this->db->update('consumer_water_balance',$data6);
  				}
  				if($garbage_bal!=NULL || $garbage_bal!=""){
  					$data7=array(
			    		'balance_amount'=>$garbage_bal
						);
						$this->db->where('consumer_id',$consumer_id);
						$this->db->where('balance_year',$bill_year);
	  					$this->db->update('consumer_garbage_balance',$data7);
  				}


	  		}//end of function

	  	function get_monthly_collections_for_report_view($month, $year){
			//echo "<br><br>ditooooooooo";
			$query = $this->db->query("select a.bill_month, a.bill_year,b.fullname,b.account_no,c.electricity_amount_paid, c.water_amount_paid, c.garbage_amount_paid, c.receipt_number, c.receipt_date from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where month(c.receipt_date)=".$month." and year(receipt_date)=".$year);

			return $query->result_array();


 		} //end of get consumers

 		function get_yearly_collections_for_report_view($year){
			//echo "<br><br>ditooooooooo";
			$query = $this->db->query("select b.bill_month, sum(a.electricity_amount_paid) as elec_total, sum(a.water_amount_paid) as water_total, sum(a.garbage_amount_paid) as garbage_total from consumer_collection a JOIN consumer_bill b ON a.bill_id=b.id where b.bill_year=".$year." GROUP BY b.bill_month ORDER BY b.bill_month");

			return $query->result_array();


 		} //end of get consumers



 		

















	/*========end of consumers==================================*/




 		

	}


?>
