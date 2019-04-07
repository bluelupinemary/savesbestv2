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
			$query = $this->db->query("select a.*,b.fullname as fullname,b.address,b.consumer_type,(a.electricity_reading - c.electricity_amount_paid) as electricity_balance, (a.water_reading - c.water_amount_paid) as water_balance, (a.garbage_fee - c.garbage_amount_paid) as garbage_balance, c.receipt_number, c.receipt_date from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where a.is_paid=0 or a.is_paid is null");
			
			
			return $query->result_array();


 		} //end of get consumers

 		function get_consumer_statement_of_account($consumer_id,$year){
			$query = $this->db->query("select a.consumer_id,a.electricity_reading, a.water_reading, a.garbage_fee, a.bill_month,month(b.receipt_date) as payment_month,b.* from consumer_bill a join consumer_collection b on a.id=b.bill_id where a.bill_year=".$year." and a.consumer_id=".$consumer_id." order by a.bill_month");
			
			
			return $query->result_array();


 		} //end of get consumers


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
  			
  		}//end of function

  		function get_collections_for_edit($billID){
	
			$query = $this->db->query("select a.*,b.fullname as fullname,b.address,b.consumer_type,c.receipt_number, c.receipt_date from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where a.id=".$billID);

			return $query->result_array();


 		} //end of get consumers

 		function get_collections_for_edit_by_account($account_no, $month, $year){
	
			$query = $this->db->query("select a.id,b.fullname as fullname,b.address,b.consumer_type,b.account_no, c.electricity_amount_paid, c.water_amount_paid, c.garbage_amount_paid, month(receipt_date) as payment_month, year(receipt_date) as payment_year, c.receipt_number, c.receipt_date from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where b.account_no=".$account_no." and month(receipt_date)=".$month." and year(receipt_date)=".$year);

			return $query->result_array();


 		} //end of get consumers

 		function get_collections_for_view($month, $year){
	
			$query = $this->db->query("select a.*,b.fullname as fullname,b.address,b.consumer_type,c.electricity_amount_paid, c.water_amount_paid, c.garbage_amount_paid, c.receipt_number, c.receipt_date from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where month(c.receipt_date)=".$month." and year(c.receipt_date)=".$year);

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

  		function update_partial_payment_of_consumer_in_collection($bill_id,$electricity,$water,$garbage,$receiptNo,$receiptDate,$date_updated,$updated_by){


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
		    		'receipt_number'=>$receiptNo,
		    		'receipt_date'=>$receiptDate,
		    		'date_updated'=>$date_updated,
		    		'updated_by' =>$updated_by
					);
  				$this->db->where('bill_id',$bill_id);
	  			$this->db->update('consumer_collection',$data);


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

  		function update_payment_of_consumer_in_collection($bill_id,$electricity,$water,$garbage,$receiptNo,$receiptDate,$date_updated,$updated_by){

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

	  	function get_monthly_collections_for_report_view($month, $year){
			//echo "<br><br>ditooooooooo";
			$query = $this->db->query("select a.bill_month, a.bill_year,b.fullname,b.account_no,c.electricity_amount_paid, c.water_amount_paid, c.garbage_amount_paid, c.receipt_number, c.receipt_date from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where month(c.receipt_date)=".$month." and year(receipt_date)=".$year);

			return $query->result_array();


 		} //end of get consumers

 		function get_yearly_collections_for_report_view($year,$account_no){
			//echo "<br><br>ditooooooooo";
			$query = $this->db->query("select a.bill_month, a.electricity_reading, a.water_reading, a.garbage_fee, b.fullname,b.address,c.electricity_amount_paid, c.water_amount_paid, c.garbage_amount_paid, c.receipt_number, c.receipt_date from consumer_bill a join consumer b on a.consumer_id=b.id join consumer_collection c on a.id=c.bill_id where a.bill_year=".$year." and b.account_no=".$account_no);

			return $query->result_array();


 		} //end of get consumers





 		

















	/*========end of consumers==================================*/




 		function delete_user_profile($userid){


 			//$usertype = $this->input->post('usertype');
			$this->db->select('usertype');
			$this->db->from('user_table');
			$this->db->where('userid',$userid);
			$this->db->limit(1);
			$query = $this->db->get();
  			$usertype = $query->row();


  			if ($query->num_rows() > 0) {




	 			if($usertype->usertype==1){	//if admin
	 					//$this->db->where('userid',$userid);
	  					//$this->db->delete('user_in_section');

	  					$this->db->where('userid',$userid);
	  					$this->db->delete('admin');

	  					$this->db->where('userid',$userid);
	  					$this->db->delete('user_table');

	  			}else
	  			if($usertype->usertype==2){ //if teacher
	  					/*$this->db->select('empid');
			  			$this->db->from('teacher');
			  			$this->db->where('userid',$userid);
			  			$this->db->limit(1);
			  			$query = $this->db->get();
			  			$empid = $query->row_array();

			  			$teacherid['empid'] = $empid['empid'];

	  					$this->db->where('empid',$teacherid['empid']);
	  					$this->db->delete('student');

	  					$this->db->where('teacherid',$teacherid['empid']);
	  					$this->db->delete('exercode');	*/
	  					$this->db->where('userid',$userid);
	  					$this->db->delete('user_in_section');

	  					$this->db->where('userid',$userid);
	  					$this->db->delete('teacher');

	  					$this->db->where('userid',$userid);
	  					$this->db->delete('user_table');
	  			}
	  			else{ //student
	  					$this->db->where('userid',$userid);
	  					$this->db->delete('user_in_section');

	  					$this->db->where('userid',$userid);
	  					$this->db->delete('student');

	  					$this->db->where('userid',$userid);
	  					$this->db->delete('user_table');
	  			}
  			}//end of numrows
 		}// end of delete user function

 		function create_section(){

  			$data=array(
	    		'sname'=>$this->input->post('sectionname'),
	    		'scode'=>$this->input->post('sectioncode'),
	    		'maxnum'=>$this->input->post('sectionmax')
				);

  			$this->db->insert('section',$data);
 		}// end of create_section()

 		function get_sections(){
 			$this->db->select('*');
			$this->db->from('section');
			//$this->db->limit(1);

			$query = $this->db->get();


			return $query->result_array();
 		}//end of get sections

 		function get_section_info($sectionid){
 			$this->db->select('*');
			$this->db->from('section');
			$this->db->where('sectionid',$sectionid);
			//$this->db->limit(1);

			$query = $this->db->get();

			return $query->result_array();
 		}//end of get section info

 		function edit_section_info($sectionid){

  			$data=array(
	    		'sname'=>$this->input->post('sname'),
	    		'scode'=>$this->input->post('scode'),
	    		'maxnum'=>$this->input->post('maxnum')

				);
  			$this->db->where('sectionid',$sectionid);
  			$this->db->update('section',$data);

 		}//end of editsectioninfo

 		function delete_section_info($sectionid){
  			$this->db->where('sectionid',$sectionid);
        $this->db->delete('user_in_section');

        $this->db->where('sectionid',$sectionid);
  			$this->db->delete('section');


 		}//end of deletesectioninfo

 		function get_user_teacher(){
 			$this->db->select('user_table.userid,concat(lname,",",fname," ",mname) as name');
			$this->db->from('teacher');
			$this->db->join('user_table', 'user_table.userid = teacher.userid');
			//$this->db->limit(1);

			$query = $this->db->get();


			return $query->result_array();
 		}//end of function

 		function get_users_in_section($userid){
 			$this->db->select('*');
			$this->db->from('user_in_section');
			//$this->db->limit(1);

			$query = $this->db->get();


			return $query->result_array();
 		}//end of function

 		function assign_teacher_to_section($sectionid,$teacherid){
  			//$teacherid = $this->input->post($teacherid);
  			//$sectionid = $this->input->post($sectionid);

  			$this->db->select('userid,sectionid');
			$this->db->from('user_in_section');
			//$this->db->where('userid',$teacherid); 	//if may return, nag eexist na yung teacher/ may section na naka assigned
  			$this->db->where('sectionid',$sectionid);
			$this->db->where('usertype','2');
  			//$this->db->limit(1);
			$query = $this->db->get();


  			if($query->num_rows()==1){	//if may teacher na naka aassign sa section, update teacherid
  				$data=array(
	    		'userid'=>$teacherid
				);
  				$this->db->where('sectionid',$sectionid);
  				$this->db->update('user_in_section',$data);

  			}else{	//add teacher to section
  				$data=array(
	    		'userid'=>$teacherid,
	    		'sectionid'=>$sectionid,
	    		'usertype'=>$this->input->post('usertype')
				);
  				$this->db->insert('user_in_section',$data);
  			}

 		}// end of create_section()

		function reassign_teacher_to_section($sectionid,$teacherid){
  			//$teacherid = $this->input->post($teacherid);
  			//$sectionid = $this->input->post($sectionid);

  			$this->db->select('userid,sectionid');
			$this->db->from('user_in_section');
			//$this->db->where('userid',$teacherid); 	//if may return, nag eexist na yung teacher/ may section na naka assigned
  			$this->db->where('sectionid',$sectionid);
  			//$this->db->limit(1);
			$query = $this->db->get();


  			if($query->num_rows()==1){	//if may teacher na naka aassign sa section, update teacherid
  				$data=array(
	    		'userid'=>$teacherid
				);
  				$this->db->where('sectionid',$sectionid);
  				$this->db->update('user_in_section',$data);

  			}else{	//add teacher to section
  				$data=array(
	    		'userid'=>$teacherid,
	    		'sectionid'=>$sectionid,
	    		'usertype'=>$this->input->post('usertype')
				);
  				$this->db->insert('user_in_section',$data);
  			}

 		}// end of create_section()

 		function get_teacher_in_sections(){
 			$this->db->select('*');
			$this->db->from('user_in_section');
			$this->db->where('usertype','2');
			$query = $this->db->get();
			return $query->result_array();
 		}//end of function

 		function get_student_in_sections($userid){
 			$this->db->select('*');
			$this->db->from('user_in_section');
			$this->db->where('userid',$userid);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->num_rows();
 		}//end of function

 		function request_enlist_to_section($sectionid,$studentid){
 			$this->db->select('userid');
			$this->db->from('pending_section_request');
  			$this->db->where('userid',$studentid);		//check if the student has already requested enlisment of a section
  			//$this->db->limit(1);
			$query = $this->db->get();


  			if($query->num_rows()==1){	//if student has already requested, do nothing, else insert to table


  			}else{	//add student to request
  				$data=array(
			    		'sectionid'=>$sectionid,
			    		'userid'=>$studentid
				);
  				$this->db->insert('pending_section_request',$data);
  			}


 		}//end of function

 		function get_sections_handled($teacherid){
 			$this->db->select('s.scode, s.sname,s.sectionid,count(p.sectionid) as pendingnum');
			$this->db->from('section as s');
			$this->db->join('pending_section_request as p', 'p.sectionid = s.sectionid');
			$this->db->join('user_in_section as u', 'u.sectionid = s.sectionid');
			$this->db->where('u.userid',$teacherid);
			$this->db->group_by(array('s.scode', 's.sname','s.sectionid'));
			$query = $this->db->get();
			return $query->result_array();
 		}//end of function

 		function get_pending_of_section($sectionid){
 			$this->db->select('s.scode, concat(u.lname," ,",u.fname," ",u.mname) as name,u.address,u.email,u.mobile,u.username,u.userid,s.sectionid');
 			$this->db->from('section as s');
 			$this->db->join('pending_section_request as p', 'p.sectionid = s.sectionid');
 			$this->db->join('user_table as u', 'p.userid = u.userid');
 			$this->db->where('s.sectionid',$sectionid);
			$query = $this->db->get();
			return $query->result_array();
 		}

 		function approve_enlist_to_sec_by_teacher($sectionid, $studentid, $teacherid){
 			$this->db->select('userid');
			$this->db->from('user_in_section');
  			$this->db->where('userid',$studentid);		//check if the student is already enlisted in a section
  			//$this->db->limit(1);
			$query = $this->db->get();


  			if($query->num_rows()==1){	//if student has already requested, do nothing, else insert to table


  			}else{	//add student to user_in_section
  				$data=array(
	    		'userid'=>$studentid,
	    		'sectionid'=>$sectionid,
	    		'usertype'=>0,
				);
  				$this->db->insert('user_in_section',$data);

  				$herbmeet_data = array(
  					'uid' => $studentid,
  					'quizNum' => NULL,
  					'score' => NULL,
  				);
  				$this->db->insert('herbmeet_scores',$herbmeet_data);
          /*INSERT NEW STUDENTid TO SCORES TABLE (ROOT, STEM, LEAVES...SCORE)*/
          $rootquiz_data = array(
            'uid' => $studentid,
            'quizNum' => NULL,
            'score' => NULL,
          );
          $this->db->insert('rootquiz_scores',$rootquiz_data);

          $stemquiz_data = array(
            'uid' => $studentid,
            'quizNum' => NULL,
            'score' => NULL,
          );
          $this->db->insert('stemquiz_scores',$stemquiz_data);

          $leavesquiz_data = array(
            'uid' => $studentid,
            'quizNum' => NULL,
            'score' => NULL,
          );
          $this->db->insert('leavesquiz_scores',$leavesquiz_data);

          $reproquiz_data = array(
            'uid' => $studentid,
            'quizNum' => NULL,
            'score' => NULL,
          );
          $this->db->insert('reproquiz_scores',$reproquiz_data);

          $diversityquiz_data = array(
            'uid' => $studentid,
            'quizNum' => NULL,
            'score' => NULL,
          );
          $this->db->insert('diversityquiz_scores',$diversityquiz_data);

          /*-------*/

  				$expedition_completed = array(
  					'currExpeditionId' => 0,
  					'userid' => $studentid,
  				);
  				$this->db->insert('user_expedition_completed',$expedition_completed);

  				$expedition_plantslist = array(
  					'userid' => $studentid,
  					'expeditionId' => 0,
  					'plantList'=> NULL,
  				);
  				$this->db->insert('user_expedition_plantslist',$expedition_plantslist);

  				$expedition_scores1 = array(
  					'userid' => $studentid,
  					'expeditionId' => 1,
  					'score'=> NULL,
  					'isDone' => NULL,
            'hasAddPoints' => NULL,
  				);
  				$this->db->insert('user_expedition_scores',$expedition_scores1);

  				$expedition_scores2 = array(
  					'userid' => $studentid,
  					'expeditionId' => 2,
  					'score'=> NULL,
  					'isDone' => NULL,
            'hasAddPoints' => NULL,
  				);
  				$this->db->insert('user_expedition_scores',$expedition_scores2);

  				$expedition_scores3 = array(
  					'userid' => $studentid,
  					'expeditionId' => 3,
  					'score'=> NULL,
  					'isDone' => NULL,
            'hasAddPoints' => NULL,
  				);
  				$this->db->insert('user_expedition_scores',$expedition_scores3);

  				$expedition_scores4 = array(
  					'userid' => $studentid,
  					'expeditionId' => 4,
  					'score'=> NULL,
  					'isDone' => NULL,
            'hasAddPoints' => NULL,
  				);
  				$this->db->insert('user_expedition_scores',$expedition_scores4);

  				$expedition_scores5 = array(
  					'userid' => $studentid,
  					'expeditionId' => 5,
  					'score'=> NULL,
  					'isDone' => NULL,
            'hasAddPoints' => NULL,
  				);
  				$this->db->insert('user_expedition_scores',$expedition_scores5);

  			}
  			//update student account - verify with teacher's employee number

  			$this->db->select('empid');
			$this->db->from('teacher');
  			$this->db->where('userid',$teacherid);
  			$this->db->limit(1);
			$query = $this->db->get();
  			$empid = $query->row();

  				$data2 = array(
  					'empid' => $empid->empid

  				);
  				$this->db->set('dateverified', 'NOW()', FALSE);
  				$this->db->where('userid',$studentid);
  				$this->db->update('student',$data2);


 			//remove the request from pending requests table
  			$this->db->where('userid',$studentid);
  			$this->db->delete('pending_section_request');

 		}//end of function

 		function disapprove_enlist_to_sec_by_teacher($sectionid, $studentid){

 			//remove the request from pending requests table
  			$this->db->where('userid',$studentid);
  			$this->db->where('sectionid',$sectionid);
  			$this->db->delete('pending_section_request');
 		}//end of fucntion

 		function get_pending_of_all_section($userid){
 			$this->db->select('s.scode, concat(ut.lname," ,",ut.fname," ",ut.mname) as name,ut.address,ut.username,ut.userid as studentid, p.sectionid');
 			$this->db->from('pending_section_request as p');
 			$this->db->join('user_in_section as u', 'p.sectionid = u.sectionid');
 			$this->db->join('user_table as ut', 'p.userid = ut.userid');
 			$this->db->join('section as s', 's.sectionid = p.sectionid');
 			$this->db->where('u.usertype','2');
 			$this->db->where('u.userid',$userid);
			$query = $this->db->get();
			return $query->result_array();
 		}//end of function

 		function get_students_of_teacher($userid){
 			$this->db->select('sec.scode,s.userid as studentid,s.sectionid,concat(ut.lname,", ",ut.fname," ",ut.mname) as name, ut.address,ut.username');
 			$this->db->from('user_in_section as t');
 			$this->db->join('user_in_section as s', 't.sectionid = s.sectionid');
 			$this->db->join('user_table as ut', 'ut.userid = s.userid');
 			$this->db->join('section as sec', 'sec.sectionid = s.sectionid');
 			$this->db->where('s.usertype','0');
 			$this->db->where('t.userid',$userid);
			$this->db->order_by("name", "asc");
			$query = $this->db->get();
			return $query->result_array();
 		}//end of function

 		function remove_student_from_section($sectionid, $studentid){

 			//remove the student from user_in_section table
  			$this->db->where('userid',$studentid);
  			$this->db->where('sectionid',$sectionid);
  			$this->db->delete('user_in_section');

  			//remove the student from herbmeet_scores
  			$this->db->where('uid',$studentid);
  			$this->db->delete('herbmeet_scores');
        /*DELETE STUDENT FROM SCORES TABLE (ROOT, STEM, LEAVES...SCORE)*/
        $this->db->where('uid',$studentid);
        $this->db->delete('rootquiz_scores');

        $this->db->where('uid',$studentid);
        $this->db->delete('stemquiz_scores');

        $this->db->where('uid',$studentid);
        $this->db->delete('leavesquiz_scores');

        $this->db->where('uid',$studentid);
        $this->db->delete('reproquiz_scores');

        $this->db->where('uid',$studentid);
        $this->db->delete('diversityquiz_scores');
        /**/

  			//remove the student from user_expedition_completed
  			$this->db->where('userid',$studentid);
  			$this->db->delete('user_expedition_completed');

  			//remove the student from user_expedition_scores
  			$this->db->where('userid',$studentid);
  			$this->db->delete('user_expedition_scores');

  			//remove the student from user_expedition_plantslist
  			$this->db->where('userid',$studentid);
  			$this->db->delete('user_expedition_plantslist');

  			//update student table set employeeid verification to NULL
  			$this->db->set('empid', 'NULL', FALSE);
  			$this->db->where('userid',$studentid);
  			$this->db->update('student');
 		}//end of fucntion

 		function get_all_users_in_section(){
 			$this->db->distinct();
 			$this->db->select('userid');
			$this->db->from('user_in_section');
			//$this->db->limit(1);

			$query = $this->db->get();


			return $query->result_array();
 		}//end of function
		function get_all_sections_in_section(){
 			$this->db->distinct();
 			$this->db->select('sectionid');
			$this->db->from('user_in_section');
			//$this->db->limit(1);

			$query = $this->db->get();


			return $query->result_array();
 		}//end of function

		function get_teacher_join_section(){
 			$this->db->select('a.sectionid, a.sname, a.scode, a.maxnum, concat(c.lname, ", ", c.fname, " ", c.mname) as name');
			$this->db->from('section as a');
			$this->db->join('user_in_section as b', 'a.sectionid = b.sectionid','left');
			$this->db->join('user_table as c', 'b.userid = c.userid','left');
			$this->db->where('b.usertype','2');
			//$this->db->limit(1);


			$query = $this->db->get();


			return $query->result_array();
 		}//end of get teacher join sections get_student_with_pending

 		function get_student_with_pending($userid){
 			$this->db->select('*');
			$this->db->from('pending_section_request');
			$this->db->where('userid',$userid);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->num_rows();
 		}

 		function get_pending_request_of_student($studentid){
 			$this->db->select('sectionid');
			$this->db->from('pending_section_request');
			$this->db->where('userid',$studentid);
			$this->db->limit(1);
			$query = $this->db->get();
			$sectionid = $query->row();

			return $sectionid->sectionid;
 		}//end of function

		function get_section_of_student($studentid){
 			$this->db->select('sectionid');
			$this->db->from('user_in_section');
			$this->db->where('userid',$studentid);
			$this->db->limit(1);
			$query = $this->db->get();
			$sectionid = $query->row();

			return $sectionid->sectionid;
 		}//end of function

 		function get_section_of_student_for_gameStart($studentid){
 			$this->db->select('sectionid');
			$this->db->from('user_in_section');
			$this->db->where('userid',$studentid);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->row();
 		}//end of function

 		function get_bot_terms(){
 			$this->db->select('*');
			$this->db->from('bot_journal');
			//$this->db->limit(1);

			$query = $this->db->get();


			return $query->result_array();
 		} //end of get bot terms fxn

 		function get_apothecary_content(){
 			$this->db->select('*');
			$this->db->from('apothecary');
			//$this->db->limit(1);

			$query = $this->db->get();


			return $query->result_array();
 		} //end of get apothecary terms fxn

 		function get_herbmeet_questions(){
 			$this->db->select('*');
			$this->db->from('herbologyMeetQA');
			//$this->db->join('herbologyMeetAnswers as b', 'a.qid = b.ans_qid','left');
			//$this->db->join('user_table as c', 'b.userid = c.userid','left');
			//$this->db->where('b.usertype','2');
			//$this->db->limit(1);
			$query = $this->db->get();

			return $query->result_array();
 		} //end of get herb meet terms fxn

 		function get_herbmeet_answers(){
 			$this->db->select('answer,ans_qid');
			$this->db->from('herbologyMeetAnswers');

			$query = $this->db->get();


			return $query->result_array();
 		} //end of get herb meet ans fxn

    function get_rootQuiz_questions(){
      $this->db->select('*');
      $this->db->from('rootQuizQuestions');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herb root quiz questions fxn

    function get_rootQuiz_answers(){
      $this->db->select('answer,ans_qid');
      $this->db->from('rootQuizAnswers');

      $query = $this->db->get();


      return $query->result_array();
    } //end of get root quiz ans fxn

     function get_stemQuiz_questions(){
      $this->db->select('*');
      $this->db->from('stemQuizQuestions');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herb stem quiz questions fxn

    function get_stemQuiz_answers(){
      $this->db->select('answer,ans_qid');
      $this->db->from('stemQuizAnswers');

      $query = $this->db->get();


      return $query->result_array();
    } //end of get stem quiz ans fxn

    function get_leavesQuiz_questions(){
      $this->db->select('*');
      $this->db->from('leavesQuizQuestions');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herb leaves quiz questions fxn

    function get_leavesQuiz_answers(){
      $this->db->select('answer,ans_qid');
      $this->db->from('leavesQuizAnswers');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get leaves quiz ans fxn

    function get_reproQuiz_questions(){
      $this->db->select('*');
      $this->db->from('reproductionQuizQuestions');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herb reproduction quiz questions fxn

    function get_reproQuiz_answers(){
      $this->db->select('answer,ans_qid');
      $this->db->from('reproductionQuizAnswers');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get reproduction quiz ans fxn

    function get_diversityQuiz_questions(){
      $this->db->select('*');
      $this->db->from('diversityQuizQuestions');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herb reproduction quiz questions fxn

    function get_diversityQuiz_answers(){
      $this->db->select('answer,ans_qid');
      $this->db->from('diversityQuizAnswers');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get reproduction quiz ans fxn


 		function save_user_score($studentid,$userscore){
 			//update herbmeet_score table with score of student
  			$this->db->set('score', $userscore, FALSE);
  			$this->db->where('uid',$studentid);
  			$this->db->update('herbmeet_scores');

 		}//end of function

    function save_user_rootquiz_score($studentid,$userscore){
      //update rootquiz_scores table with score of student
        $this->db->set('score', $userscore, FALSE);
        $this->db->where('uid',$studentid);
        $this->db->update('rootquiz_scores');

    }//end of function

    function save_user_stemquiz_score($studentid,$userscore){
      //update stemquiz_scores table with score of student
        $this->db->set('score', $userscore, FALSE);
        $this->db->where('uid',$studentid);
        $this->db->update('stemquiz_scores');

    }//end of function

    function save_user_leavesquiz_score($studentid,$userscore){
      //update leavesquiz_scores table with score of student
        $this->db->set('score', $userscore, FALSE);
        $this->db->where('uid',$studentid);
        $this->db->update('leavesquiz_scores');

    }//end of function

    function save_user_reproquiz_score($studentid,$userscore){
      //update leavesquiz_scores table with score of student
        $this->db->set('score', $userscore, FALSE);
        $this->db->where('uid',$studentid);
        $this->db->update('reproquiz_scores');

    }//end of function

    function save_user_diversityquiz_score($studentid,$userscore){
      //update leavesquiz_scores table with score of student
        $this->db->set('score', $userscore, FALSE);
        $this->db->where('uid',$studentid);
        $this->db->update('diversityquiz_scores');

    }//end of function

 		function get_expedition_questions(){
 			$this->db->select('*');
			$this->db->from('expeditionQA');
			//$this->db->join('herbologyMeetAnswers as b', 'a.qid = b.ans_qid','left');
			//$this->db->join('user_table as c', 'b.userid = c.userid','left');
			//
			//$this->db->limit(1);


			$query = $this->db->get();


			return $query->result_array();
 		} //end of get expedition questions fxn

 		function get_currExpeditionId($userid){
 			$this->db->select('currExpeditionId');
			$this->db->from('user_expedition_completed');
			$this->db->where('userid',$userid);
			//$this->db->join('herbologyMeetAnswers as b', 'a.qid = b.ans_qid','left');
			//$this->db->join('user_table as c', 'b.userid = c.userid','left');
			//$this->db->where('b.usertype','2');
			//$this->db->limit(1);


			$query = $this->db->get();


			return $query->result_array();
 		} //end of get expedition questions fxn

 		function save_user_plantslist($studentid,$expeditionId,$plantList){
 			$data=array(
	    		'plantList'=>$plantList,
	    		'expeditionId'=>$expeditionId
				);
  				$this->db->where('userid',$studentid);
  				$this->db->update('user_expedition_plantslist',$data);


 		}//end of function

 		function get_currUserPlantList($userid){
 			$this->db->select('plantList');
			$this->db->from('user_expedition_plantslist');
			$this->db->where('userid',$userid);
			//$this->db->join('herbologyMeetAnswers as b', 'a.qid = b.ans_qid','left');
			//$this->db->join('user_table as c', 'b.userid = c.userid','left');
			//$this->db->where('b.usertype','2');
			//$this->db->limit(1);


			$query = $this->db->get();


			return $query->result_array();
 		} //end of get expedition questions fxn


 		function get_expedition_answers($expeditionId){
 			//get all answers for the current expedition
 			$this->db->select('answer');
			$this->db->from('expeditionAnswers');
			$this->db->where('ans_eid',$expeditionId);

			$query = $this->db->get();


			return $query->result_array();
 		} //end of get expedition answers fxn



 		function save_user_expedition_score($studentid,$expeditionId,$score){
  			$data=array(
	    		'score'=>$score,
	    		'isDone'=>1
				);
			//$array = array('expeditionId' => $expeditionId, 'userid' => $studentid);


  			//$this->db->set($);
  			//$this->db->where($array);
  			$this->db->where('userid',$studentid);
  			$this->db->where('expeditionId',$expeditionId);
  			//$this->db->where($data);
  			$this->db->update('user_expedition_scores',$data);

 		} //end of save score

 		function get_currExpedition_isDone($userid,$expeditionId){
 			//get all answers for the current expedition
 			$this->db->select('isDone');
			$this->db->from('user_expedition_scores');
			$this->db->where('expeditionId',$expeditionId);
			$this->db->where('userid',$userid);


			$query = $this->db->get();


			return $query->result_array();
 		} //end of get expedition answers fxn

    function get_currHerbmeet_isDone($userid){
      //get if current user is done with herb meet
      $this->db->select('score');
      $this->db->from('herbmeet_scores');
      $this->db->where('uid',$userid);


      $query = $this->db->get();


      return $query->result_array();
    } //end of get expedition answers fxn


 		function save_user_currExpedition_done($userid,$expeditionId){
 			//get all answers for the current expedition
 			$list=NULL;
 			$this->db->set('plantList', $list);
  			$this->db->where('userid',$userid);
  			$this->db->where('expeditionId',$expeditionId);
  			$this->db->update('user_expedition_plantslist');
 		} //end of get expedition answers fxn

 		function save_user_change_expeditionNo($userid){
 			//get all answers for the current expedition
 			$list=0;
 			$this->db->set('currExpeditionId', $list);
  			$this->db->where('userid',$userid);
  			$this->db->update('user_expedition_completed');
 		} //end of get expedition answers fxn

 		function save_currExpeditionId($userid,$eid){
 			//update expedition id in table user_expedition_completed
  			$this->db->set('currExpeditionId', $eid);
  			$this->db->where('userid',$userid);
  			$this->db->update('user_expedition_completed');
 			//return 1;
 		}//end of function

 		function save_currExpeditionId_plantslist($userid,$eid){
 			//update expedition id in table user_expedition_completed
  			$this->db->set('expeditionId', $eid);
  			$this->db->where('userid',$userid);
  			$this->db->update('user_expedition_plantslist');
 			//return 1;
 		}//end of function

 		function get_herbmeet_scores($userid){
 			//get the herbmeet score for the user
 			$this->db->select('score');
			$this->db->from('herbmeet_scores');
			$this->db->where('uid',$userid);

			$query = $this->db->get();


			return $query->result_array();
 		} //end of get herbmeet scores fxn

    function get_rootquiz_scores($userid){
      //get the root quiz score for the user
      $this->db->select('score');
      $this->db->from('rootquiz_scores');
      $this->db->where('uid',$userid);

      $query = $this->db->get();


      return $query->result_array();
    } //end of get herbmeet scores fxn

    function get_stemquiz_scores($userid){
      //get the root quiz score for the user
      $this->db->select('score');
      $this->db->from('stemquiz_scores');
      $this->db->where('uid',$userid);

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herbmeet scores fxn

    function get_leavesquiz_scores($userid){
      //get the root quiz score for the user
      $this->db->select('score');
      $this->db->from('leavesquiz_scores');
      $this->db->where('uid',$userid);

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herbmeet scores fxn

    function get_reproquiz_scores($userid){
      //get the root quiz score for the user
      $this->db->select('score');
      $this->db->from('reproquiz_scores');
      $this->db->where('uid',$userid);

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herbmeet scores fxn

    function get_diversityquiz_scores($userid){
      //get the root quiz score for the user
      $this->db->select('score');
      $this->db->from('diversityquiz_scores');
      $this->db->where('uid',$userid);

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herbmeet scores fxn

 		function get_expedition_scores($userid){
 			//get the herbmeet score for the user
 			$this->db->select('expeditionId,score');
			$this->db->from('user_expedition_scores');
			$this->db->where('userid',$userid);

			$query = $this->db->get();


			return $query->result_array();
 		} //end of get herbmeet scores fxn

 		function get_herbmeet_score_of_students(){
 			//get the herbmeet score for the user
 			$this->db->select('uid,score');
			$this->db->from('herbmeet_scores');

			$query = $this->db->get();


			return $query->result_array();
 		} //end of get herbmeet scores of all students from table fxn

    function get_rootquiz_score_of_students(){
      //get the herbmeet score for the user
      $this->db->select('uid,score');
      $this->db->from('rootquiz_scores');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herbmeet scores of all students from table fxn

    function get_stemquiz_score_of_students(){
      //get the herbmeet score for the user
      $this->db->select('uid,score');
      $this->db->from('stemquiz_scores');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herbmeet scores of all students from table fxn

    function get_leavesquiz_score_of_students(){
      //get the herbmeet score for the user
      $this->db->select('uid,score');
      $this->db->from('leavesquiz_scores');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herbmeet scores of all students from table fxn

    function get_reproquiz_score_of_students(){
      //get the herbmeet score for the user
      $this->db->select('uid,score');
      $this->db->from('reproquiz_scores');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herbmeet scores of all students from table fxn


    function get_diversityquiz_score_of_students(){
      //get the herbmeet score for the user
      $this->db->select('uid,score');
      $this->db->from('diversityquiz_scores');

      $query = $this->db->get();

      return $query->result_array();
    } //end of get herbmeet scores of all students from table fxn

 		function get_expedition_score_of_students(){
 			//get the herbmeet score for the user
 			$this->db->select('userid,expeditionId,score');
			$this->db->from('user_expedition_scores');

			$query = $this->db->get();


			return $query->result_array();
 		} //end of get expedition scores of all students from table fxn

    function get_expedition_addpts_questions($expeditionId){
      //get the herbmeet score for the user
      $this->db->select('question,answer');
      $this->db->from('expedition_add_points');
      $this->db->where('expeditionId',$expeditionId);

      $query = $this->db->get();


      return $query->result_array();
    } //end of get expedition n questions for additional pts

    function get_expedition_currScore($userid,$expeditionId){
      //get the herbmeet score for the user
      $this->db->select('score');
      $this->db->from('user_expedition_scores');
      $this->db->where('expeditionId',$expeditionId);
      $this->db->where('userid',$userid);

      $query = $this->db->get();


      return $query->result_array();
    } //end of get expedition (current) total score

    function save_user_expedition_addPts($studentid,$expeditionId,$score){
        $data=array(
          'score'=>$score,
          'hasAddPoints'=>1
        );
      //$array = array('expeditionId' => $expeditionId, 'userid' => $studentid);


        //$this->db->set($);
        //$this->db->where($array);
        $this->db->where('userid',$studentid);
        $this->db->where('expeditionId',$expeditionId);
        //$this->db->where($data);
        $this->db->update('user_expedition_scores',$data);

    } //end of save score

    function get_currExpedition_hasAddPts($userid,$eid){
      //get the herbmeet score for the user
      $this->db->select('hasAddPoints');
      $this->db->from('user_expedition_scores');
      $this->db->where('expeditionId',$eid);
      $this->db->where('userid',$userid);

      $query = $this->db->get();


      return $query->result_array();
    } //end of get expedition (current) total score

	}


?>
