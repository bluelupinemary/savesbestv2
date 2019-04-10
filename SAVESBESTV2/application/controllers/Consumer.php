<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consumer extends CI_Controller {

 function __construct()
 {
   parent::__construct();
     $this->load->model('user','',TRUE);
     $this->load->helper('form');
     $this->load->helper('url');
 }

 function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('create_account_view');
 }
/*function to add consumer to the database*/
 function addConsumer(){
      if($this->session->userdata('logged_in')){
 				$session_data = $this->session->userdata('logged_in');
 				$data['username'] = $session_data['username'];
 				$data['userid'] = $session_data['userid'];
 				$data['usertype'] = $session_data['usertype'];


             $this->load->library('form_validation');
             // field name, error message, validation rules
            $this->form_validation->set_rules('consumerID', 'Consumer ID', 'trim|required|xss_clean');
             $this->form_validation->set_rules('accountNo', 'Account No', 'trim|required|xss_clean');
             $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required|xss_clean');
             $consumerType = $this->input->post('consumerType');
                //if($consumerType=='RES'){//if residential
                  //$this->form_validation->set_rules('employeeNo', 'Employee No', 'trim|required|xss_clean');
            //}

              $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
             $this->form_validation->set_rules('paymentType', 'PaymentType', 'trim|required');


             if($this->form_validation->run() == FALSE){
                $this->load->view('template/header_template_view');
                $this->load->view('add_consumer_view',$data);
             }else{
                $message['msg']=1;
                $this->user->add_consumer();
                $this->load->view('template/header_template_view');
                $this->load->view('success_create_account_view',$message);
                $this->load->view('template/footer_template_view');
             }
      }else{
         redirect('login','refresh');
      }
 }//end of function

 //function to update the consumer details
 function updateConsumerDetails(){
     $this->load->library('form_validation');

     if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['userid'] = $session_data['userid'];
     $data['usertype'] = $session_data['usertype'];
     
     $consumerIDToEdit = $this->input->post('consumer_id');

    //echo "<br/><br/><br/><br/>aaaaaaaa".$consumerIDToEdit;    
     $resultdata['results'] = $this->user->get_consumer_profile($consumerIDToEdit);
     $resultdata['username']=$data['username'];
     $resultdata['data2']=$consumerIDToEdit;

     //echo "<br/><br/><br/><br/>";
     //print_r($resultdata['results'][0]['is_employee']);
     $accountNo = $resultdata['results'][0]['account_no'];
     $isAnEmployee = $resultdata['results'][0]['is_employee'];
     if($isAnEmployee==1){
       $employeeNo = $this->user->get_consumer_employee_no($accountNo);
       if($employeeNo!=null || !empty($employeeNo)){
            $resultdata['employeeNo'] = $employeeNo[0]['employee_no'];
       }else{
            $resultdata['employeeNo'] = null;
       }

     }
     
     //print_r($employeeNo[0]['employee_no']);
     
     //   $query1 = $this->user->get_user_profile_teacher($useridToEdit);
     //     $teacherdata['empid'] = $query1['empid'];
     // $resultdata['empid'] = $teacherdata['empid'];
     //
     // $query2 = $this->user->get_user_profile_student($useridToEdit);
     //     $studentdata['studentid'] = $query2['studentid'];
     // $resultdata['studentid'] = $studentdata['studentid'];




     $this->load->view('template/header_template_view');
     $this->load->view('edit_consumer_details_view',$resultdata);

     }else{
         redirect('login','refresh');
     }
 }
//function to validate consumer update details
public function validateConsumerUpdate(){
        if($this->session->userdata('logged_in')){
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype'];         

            $resultdata['results']['results']['id'] = $this->input->post('consumer_id');
            $resultdata['results']['results']['account_no'] = $this->input->post('accountNo');
            $resultdata['results']['results']['fullname'] = $this->input->post('fullname');
            $resultdata['results']['results']['address'] = $this->input->post('address');
            $resultdata['results']['results']['consumer_type'] = $this->input->post('consumerType');
            $resultdata['results']['results']['payment_type'] = $this->input->post('paymentType');
            $resultdata['employeeNo'] = $this->input->post('employeeNo');
            $tempEmpNo = $this->input->post('employeeNo');
            if($tempEmpNo!=null || $tempEmpNo!=''){
                $resultdata['results']['results']['is_employee'] = 1;    
            }else{
                $resultdata['results']['results']['is_employee'] = 0; 
            }
            $resultdata['results']['results']['is_coleasee'] = $this->input->post('isColeasee');
            $resultdata['results']['results']['is_coleasee'] = $this->input->post('isColeasee');
            $resultdata['results']['results']['multiplier'] = $this->input->post('multiplier');;
            $resultdata['results']['results']['pipe_size'] = $this->input->post('pipeSize');;

                         
            $resultdata['username']=$data['username'];
            $consumer_id = $resultdata['results']['results']['id'] = $this->input->post('consumer_id');
            //echo "<br><br>";
            //print_r($resultdata);
            
            $this->load->library('form_validation');
             // field name, error message, validation rules
             $this->form_validation->set_rules('accountNo', 'Account No', 'trim|required|xss_clean');
             $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required|xss_clean');
             $consumerType = $this->input->post('consumerType');
             if($consumerType=='RES'){//if residential
                  $this->form_validation->set_rules('employeeNo', 'Employee No', 'trim|required|xss_clean');
             }

              $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
             $this->form_validation->set_rules('paymentType', 'PaymentType', 'trim|required');


              if($this->form_validation->run() == FALSE){
                 $this->load->view('template/header_template_view');
                 $this->load->view('edit_consumer_details_view',$resultdata);
              }else{
                $message['msg']=1;
                $this->user->update_consumer($consumer_id);
                $this->load->view('template/header_template_view');
               $this->load->view('success_update_consumer_view',$message);
                //$this->load->view('edit_consumer_view',$message);
                $this->load->view('template/footer_template_view');
             }     
            
        }else{
            redirect('login','refresh');
        }
        
    }

//function to archive consumers
function archiveConsumer(){
     if($this->session->userdata('logged_in')){
                $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype']; 

                $consumer_id = $this->input->post('consumer_id');
                $this->user->archive_consumer($consumer_id);
               //$resultdata['results'] = $this->user->get_consumers();
                //$resultdata['results'] = $this->user->get_consumer_to_archive($consumer_id);
                //$resultdata['data']=$data['username'];
                //$resultdata['useriddata'] = $data['userid'];

                $message['msg']=1;
                $this->load->view('template/header_template_view');
                $this->load->view('success_update_consumer_view',$message);
                //$this->load->view('edit_consumer_view',$message);
    }else{
                redirect('login','refresh');
    }
 }//end of function    

 //function to go to add bond deposit of a consumer view
function addBondDeposit(){
     if($this->session->userdata('logged_in')){
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['userid'] = $session_data['userid'];
         $data['usertype'] = $session_data['usertype'];
     
         $consumer_id_to_add_deposit = $this->input->post('consumer_id');

         $resultdata['results'] = $this->user->get_consumer_profile($consumer_id_to_add_deposit);
         $resultdata['username']=$data['username'];
         $resultdata['consumer_id']=$consumer_id_to_add_deposit;

         $this->load->view('template/header_template_view');
         $this->load->view('add_bond_deposit_view',$resultdata);
        $this->load->view('template/footer_template_view');
     }else{
         redirect('login','refresh');
     }
 }//end of function    

//function to add "next reading" details to a consumer
function addReading(){
     if($this->session->userdata('logged_in')){
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['userid'] = $session_data['userid'];
         $data['usertype'] = $session_data['usertype'];
     
         $consumer_id_to_add_reading = $this->input->post('consumer_id');

         $resultdata['results'] = $this->user->get_this_consumer_readings($consumer_id_to_add_reading);
         $resultdata['username']=$data['username'];
         $resultdata['consumer_id']=$consumer_id_to_add_reading;

         $this->load->view('template/header_template_view');
         $this->load->view('add_reading_to_consumer_view',$resultdata);
        $this->load->view('template/footer_template_view');
     }else{
         redirect('login','refresh');
     }
 }//end of function    

 function addBillings(){
     if($this->session->userdata('logged_in')){
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['userid'] = $session_data['userid'];
         $data['usertype'] = $session_data['usertype'];
     
         $consumer_id_to_add_reading = $this->input->post('consumer_id');

         $resultdata['results'] = $this->user->get_this_consumer_readings($consumer_id_to_add_reading);
         $resultdata['username']=$data['username'];
         $resultdata['consumer_id']=$consumer_id_to_add_reading;

         $this->load->view('template/header_template_view');
         $this->load->view('add_billing_to_consumer_view',$resultdata);
        $this->load->view('template/footer_template_view');
     }else{
         redirect('login','refresh');
     }
 }//end of function 
//function to add bond deposit to db
function insertBondDeposit(){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype']; 

                $consumer_id = $this->input->post('consumer_id');
                $account_no = $this->input->post('account_no');
                $this->user->add_bond_deposit_to_consumer($consumer_id, $account_no);
               

                $message['msg']=1;
                $this->load->view('template/header_template_view');
                $this->load->view('success_update_consumer_view',$message);
                $this->load->view('template/footer_template_view');
    }else{
                redirect('login','refresh');
    }
 }

//function to add bond deposit to db
function do_upload(){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype']; 
                $resultdata['username']=$data['username'];
                // $consumer_id = $this->input->post('consumer_id');
                // $account_no = $this->input->post('account_no');
                // $this->user->add_bond_deposit_to_consumer($consumer_id, $account_no);

            //if($this->input->post('userfile') != NULL ){ 
                //echo "<br><br>itooooo:".$_FILES['userfile']['name'];
                $ok=false;
                $resultdata['ok'] = $ok;
                if(!empty($_FILES['userfile']['name'])){ 
                    $config['upload_path']   = '/var/www/html/SAVESBESTV2/devtools/uploads/'; 
                    $config['allowed_types'] = 'txt|pdf'; 
                    $config['max_size']      = 100; 
                    $config['max_width']     = 1024; 
                    $config['max_height']    = 768;  
                    $this->load->library('upload', $config);

                    $filename = $_FILES['userfile']['name'];
                    $fileTmpLoc = '/var/www/html/SAVESBESTV2/devtools/uploads/temp/ekek.txt'; 
                    //checking if file exsists
                    if(file_exists("/var/www/html/SAVESBESTV2/devtools/uploads/readings.txt") && $filename=="readings.txt") unlink("/var/www/html/SAVESBESTV2/devtools/uploads/readings.txt");

                    //Place it into your "uploads" folder mow using the move_uploaded_file() function
                    move_uploaded_file($fileTmpLoc, "/var/www/html/SAVESBESTV2/devtools/uploads/readings.txt");
                        
                    if (!$this->upload->do_upload('userfile')) {
                        $resultdata['response'] = "Something went wrong while uploading the file.";//array('error' => $this->upload->display_errors()); 
                        //$resultdata['ok'] = $ok;
                       // $this->load->view('template/header_template_view');
                       // $this->load->view('import_consumer_readings_view', $resultdata); 
                    }
                    else { 
                        $resultdata['response'] = "File upload successful";//array('upload_data' => $this->upload->data()); 
                        $ok = true;
                        $resultdata['ok'] = $ok;//array('upload_data' => $this->upload->data()); 
                        $this->load->view('template/header_template_view');
                        $this->load->view('import_consumer_bills_view', $resultdata); 
                        
                    } 

                }//else{
              //      // load view 
              //       $this->load->view('template/header_template_view');
              //    $this->load->view('import_consumer_readings_view',$resultdata);
         // }else{
         //    $resultdata['response'] = "No file selected.";//array('upload_data' => $this->upload->data()); 
         //    $this->load->view('template/header_template_view');
         //    $this->load->view('import_consumer_readings_view', $resultdata); 
         // }






            if(!$ok){
                $resultdata['ok'] = $ok;
                 $this->load->view('template/header_template_view');
                 $this->load->view('import_consumer_readings_view',$resultdata);
             }
                //$this->load->view('template/footer_template_view');
    }else{
                redirect('login','refresh');
    }
 }

//function to open file readings.txt and show in a table in import_consumer_readings_view.php
function showImportedBillings(){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype']; 

                // $consumer_id = $this->input->post('consumer_id');
                // $account_no = $this->input->post('account_no');
                // $this->user->add_bond_deposit_to_consumer($consumer_id, $account_no);
               
                $resultdata['username'] = $data['username'];
                $resultdata['ok'] = true;

                $myfile = fopen("/var/www/html/SAVESBESTV2/devtools/uploads/readings.txt", "r") or die("Unable to open file!");
                // Output one character until end-of-file
                $read_from_file_arr = array();
                $is_checked = false;
                $is_existing = 0;
                while(!feof($myfile)) {
                  //echo fgetc($myfile);
                    $line = fgets($myfile);
                    //$line[strcspn($line, "\n")] = '\0';
                    $reading = explode("|",$line);

                    if(!$is_checked){
                        $mon = $reading[7];
                        $yr = $reading[8];
                        //check if readings given a month year already exists
                        $result = $this->user->check_if_month_year_billings_exist($mon,$yr);
                        if($result){      //if there are bills on the same month and year
                            $is_existing = 1;
                            $is_checked = true;
                            
                            $resultdata['error'] = '<pre style="color:maroon;">Readings from the specified file are already existing in the system. Please go back to the dashboard.</pre>';
                        }else{
                            $is_checked = true;
                            $is_existing = 0;
                        }
                    }
                    break;
                }//end of checker - while
                fclose($myfile);
                
                $myfile = fopen("/var/www/html/SAVESBESTV2/devtools/uploads/readings.txt", "r") or die("Unable to open file!");
                if($is_existing==0){
                    while(!feof($myfile)) {
                  //echo fgetc($myfile);
                        $line = fgets($myfile);
                        //$line[strcspn($line, "\n")] = '\0';
                        $reading = explode("|",$line);

                        if(isset($reading[1])){
                            $account_no=$reading[1];
                            if(isset($reading[0])) $consumer_id=(int)$reading[0];
                            if(isset($reading[3])) $electricity=(float)$reading[3];
                            if(isset($reading[4])) $water=(float)$reading[4];
                            if(isset($reading[5])) $garbage=(float)$reading[5];
                            if(isset($reading[6])) $space_type=$reading[6];
                            if(isset($reading[7])) $month=(int)$reading[7];
                            if(isset($reading[8])) $year=(int)$reading[8];
                             array_push($read_from_file_arr,$reading);
                        }else{
                            continue;
                        }


                        //start adding the data to the consumer_reading table
                        $date = date('Y-m-d');

                        
                        // echo "\t".$consumer_id."\t".$electricity."\t".$water."\t".$garbage."\t".$month."\t".$year;
                        $this->user->add_imported_billing_to_consumer($consumer_id, $account_no,$electricity,$water,$garbage,$space_type,$month,$year,$date);
                        // //echo $reading."<br>";
                        // echo count($reading)."<br>";
                    }//end of while
                    fclose($myfile);
                }//end of if
                
                
                //$resultdata['results'] = $this->user->get_consumers();
                $resultdata['results'] = $read_from_file_arr;
                //   $resultdata['results'] = $this->user->get_consumers_bills($mon,$yr);


                $this->load->view('template/header_template_view');
                $this->load->view('imported_consumer_bills_view',$resultdata);
    }else{
                redirect('login','refresh');
    }
 }

 function addPaymentToCollection(){
    if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
                $data['username'] = $session_data['username'];
                $data['userid'] = $session_data['userid'];
                $data['usertype'] = $session_data['usertype']; 

                $resultdata['username'] = $data['username'];

                 $consumers = $this->input->post('consumers',TRUE);
                 $electricity = $this->input->post('electricity_amount_paid');
                 $water = $this->input->post('water_amount_paid');
                 $garbage = $this->input->post('garbage_amount_paid');
                 $receiptNo = $this->input->post('receipt_no');
                 $receiptDate = $this->input->post('receipt_date');
               //print_r($ea);
                //$num_consumers = count($consumers);
                $date = date('Y-m-d');
                //echo "<br>Count:".$num_consumers."<br>"; 
                $resultdata['ok'] = false;   
                for($i=0;$i<count($consumers);$i++){
                    $id = (int)$consumers[$i];
                    // echo " id: ".$id."| E: ".$electricity[$id]."| W: ".$water[$id]."| G: ".$garbage[$id].
                    // "| R: ".$receiptNo[$id]."| D: ".$receiptDate[$id].
                    // "<br>";
                     $this->user->add_payment_to_consumer_collection($id,$electricity[$id],$water[$id],$garbage[$id],$receiptNo[$id],$receiptDate[$id],$date);

                    $resultdata['ok'] = true;
                }
                $resultdata['results'] = $this->user->get_consumer_billings_for_collection();


                $this->load->view('template/header_template_view');
               $this->load->view('list_bills_for_collection_view',$resultdata);




                 
    }else{
                redirect('login','refresh');
    }
}



    function findIndividualCollection(){
        
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

                //echo "<br><br><br><br><br><br><br> >>>>>.".$month.">>>".$year;
                $resultdata['username'] = $data['username'];
                $resultdata['payment_month'] = $month;
                $resultdata['payment_year'] = $year;
                $resultdata['account_no'] = $account_no;
                $resultdata['results'] = $this->user->get_collections_for_edit_by_account($account_no,$month,$year);
                $count = count($resultdata['results']);
               // echo "<br><br>COUNT: ".$count;
                if($count > 0){
                    $resultdata['ok'] = true;
                }else{
                    $resultdata['ok'] = false;
                }
                 

              //  echo "ok ".$resultdata['ok'];
        //        $resultdata[''] = $this->user->get_sections_handled($data['userid']);
        //        $resultdata['username']=$data['username'];

                $this->load->view('template/header_template_view');
                $this->load->view('query_collection_to_view',$resultdata);
           }else{
               redirect('login','refresh');
           }
    }

    function viewAConsumerStatementOfAccount(){
        
         if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['userid'] = $session_data['userid'];
            $data['usertype'] = $session_data['usertype'];
             
            $temp_no = $this->input->post('account_no');
            $temp_id = $this->input->post('consumer_id');
            $consumer_name = $this->input->post('consumer_name');
            $consumer_id = intval($temp_id);
            $account_no = intval($temp_no);

               //  //echo "<br><br><br><br><br><br><br> >>>>>.".$month.">>>".$year;
            $resultdata['username'] = $data['username'];
            $resultdata['account_no'] = $account_no;
            $resultdata['consumer_id'] = $consumer_id;
            $resultdata['consumer_name'] = $consumer_name;
               //  $resultdata['account_no'] = $account_no;
               //  $resultdata['results'] = $this->user->get_collections_for_edit_by_account($account_no,$month,$year);
               //  $count = count($resultdata['results']);
               // // echo "<br><br>COUNT: ".$count;
               //  if($count > 0){
               //      $resultdata['ok'] = true;
               //  }else{
               //      $resultdata['ok'] = false;
               //  }
                 

              //  echo "ok ".$resultdata['ok'];
        //        $resultdata[''] = $this->user->get_sections_handled($data['userid']);
        //        $resultdata['username']=$data['username'];

                $this->load->view('template/header_template_view');
                $this->load->view('consumer_statement_of_account_view',$resultdata);
           }else{
               redirect('login','refresh');
           }
    }

    function findConsumerStatementOfAccount(){
        
         if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['userid'] = $session_data['userid'];
            $data['usertype'] = $session_data['usertype'];
                

            $temp_account_no = $this->input->post('account_no');
            $temp_consumer_id = $this->input->post('consumer_id');
            $temp_year = $this->input->post('year');
            $consumer_name = $this->input->post('consumer_name');
           
            $consumer_id = intval($temp_consumer_id);
            $year = intval($temp_year);

            $resultdata['username'] = $data['username'];
            $resultdata['year'] = $year;
            $resultdata['consumer_id'] = $consumer_id;
            $resultdata['account_no'] = $temp_account_no;
            $resultdata['consumer_name'] = $consumer_name;
            $resultdata['results'] = $this->user->get_consumer_statement_of_account($consumer_id,$year);
            $count = count($resultdata['results']);
                //echo "<br><br>COUNT: ".$count;
                if($count > 0){
                    $resultdata['ok'] = true;
                }else{
                    $resultdata['ok'] = false;
                }
                 

              //  echo "ok ".$resultdata['ok'];
        //        $resultdata[''] = $this->user->get_sections_handled($data['userid']);
        //        $resultdata['username']=$data['username'];

                $this->load->view('template/header_template_view');
                $this->load->view('consumer_statement_of_account_view',$resultdata);
           }else{
               redirect('login','refresh');
           }
    }

     function findCollectionsByMonthYear(){
        
         if($this->session->userdata('logged_in')){
             $session_data = $this->session->userdata('logged_in');
             $data['username'] = $session_data['username'];
             $data['userid'] = $session_data['userid'];
             $data['usertype'] = $session_data['usertype'];
                $temp_month = $this->input->post('month');
                $temp_year = $this->input->post('year');
                $month = intval($temp_month);
                $year = intval($temp_year);

                //echo "<br><br><br><br><br><br><br> >>>>>.".$month.">>>".$year;
                $resultdata['username'] = $data['username'];
                $resultdata['results'] = $this->user->get_collections_for_view($month,$year);
                $count = count($resultdata['results']);
                //echo "<br><br>COUNT: ".$count;
                if($count > 0){
                    $resultdata['ok'] = true;
                }else{
                    $resultdata['ok'] = false;
                }
                 

              //  echo "ok ".$resultdata['ok'];
        //        $resultdata[''] = $this->user->get_sections_handled($data['userid']);
        //        $resultdata['username']=$data['username'];

                $this->load->view('template/header_template_view');
                $this->load->view('query_all_collections_view',$resultdata);
           }else{
               redirect('login','refresh');
           }
    }

    function findCollectionsForCollectionReport(){
        
         if($this->session->userdata('logged_in')){
             $session_data = $this->session->userdata('logged_in');
             $data['username'] = $session_data['username'];
             $data['userid'] = $session_data['userid'];
             $data['usertype'] = $session_data['usertype'];
                
            $temp_month = $this->input->post('month');
            $temp_year = $this->input->post('year');
            $temp_type = $this->input->post('reportType');
            $month = intval($temp_month);
            $year = intval($temp_year);

            //echo "<br><br><br><br><br><br><br> >>>>>.".$month.">>>".$year;
            if($temp_type=='byMonth'){//if by month
                $resultdata['results'] = $this->user->get_monthly_collections_for_report_view($month,$year);
            }else{  //byYear
                $resultdata['results'] = $this->user->get_yearly_collections_for_report_view($year);
            }

            $resultdata['username'] = $data['username'];
            $resultdata['report_type'] = $temp_type;
            $resultdata['report_month'] = $temp_month;
            $resultdata['report_year'] = $temp_year;
            
            $count = count($resultdata['results']);
               // echo "<br><br>COUNT: ".$count;
            if($count > 0){
                    $resultdata['ok'] = true;
            }else{
                    $resultdata['ok'] = false;
            }
                 

              //  echo "ok ".$resultdata['ok'];
        //        $resultdata[''] = $this->user->get_sections_handled($data['userid']);
        //        $resultdata['username']=$data['username'];

                $this->load->view('template/header_template_view');
                $this->load->view('query_collection_report_to_view',$resultdata);
           }else{
               redirect('login','refresh');
           }
    }


    function updateConsumerPaymentInCollection(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
                    $data['username'] = $session_data['username'];
                    $data['userid'] = $session_data['userid'];
                    $data['usertype'] = $session_data['usertype']; 

                    $account_no = $this->input->post('account_no');
                     $month = $this->input->post('payment_month');
                      $year = $this->input->post('payment_year');
                     $bill_id = $this->input->post('bill_id');
                     $electricity = $this->input->post('electricity_amount_paid');
                     $water = $this->input->post('water_amount_paid');
                     $garbage = $this->input->post('garbage_amount_paid');
                     $surcharge = $this->input->post('surcharge');
                     $receiptNo = $this->input->post('receipt_no');
                     $receiptDate = $this->input->post('receipt_date');
                     $updated_by = $data['username'];
                   //print_r($ea);
                   // $num_consumers = count($consumers);
                      //echo "<br><br>".$month." ".$year." ".$account_no;
                     // echo "<br>".$electricity;
                     // echo "<br>".$water;
                     // echo "<br>".$garbage;
                     // echo "<br>".$receiptNo;
                     // echo "<br>".$receiptDate;
                    $date_updated = date('Y-m-d');         
                   $this->user->update_payment_of_consumer_in_collection($bill_id,$electricity,$water,$garbage,$surcharge,$receiptNo,$receiptDate,$date_updated,$updated_by);

                   //$resultdata['results'] = $this->user->get_collections_for_edit($bill_id);
                  //$resultdata['results'] =  $resultdata['username'] = $data['username'];
                $resultdata['results'] = $this->user->get_collections_for_edit_by_account($account_no,$month,$year);
                $resultdata['account_no'] = $account_no;
                $resultdata['payment_month'] = $month;
                $resultdata['payment_year'] = $year;

                $count = count($resultdata['results']);
               // echo "<br><br>COUNT: ".$count;
                if($count > 0){
                    $resultdata['ok'] = true;
                      $resultdata['update_ok'] = true;
                }else{
                    $resultdata['ok'] = false;
                      $resultdata['update_ok'] = false;
                }
                 
                  
                   $resultdata['username'] = $data['username'];
                $this->load->view('template/header_template_view');
                $this->load->view('query_collection_to_view',$resultdata);
                        
        }else{
                    redirect('login','refresh');
        }
    }// end of function


     function updateCollection(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
                    $data['username'] = $session_data['username'];
                    $data['userid'] = $session_data['userid'];
                    $data['usertype'] = $session_data['usertype']; 
                    $resultdata['username'] = $data['username'];
                    $username = $data['username'];
  
                 $consumers = $this->input->post('consumers',TRUE);
                 $electricity = $this->input->post('electricity_amount_paid');
                 $water = $this->input->post('water_amount_paid');
                 $garbage = $this->input->post('garbage_amount_paid');
                 $receiptNo = $this->input->post('receipt_no');
                 $receiptDate = $this->input->post('receipt_date');
                  //echo "<br><br>"; print_r($consumers);
                   // $num_consumers = count($consumers);
                     //echo "<br><br>".$bill_id;
                     // echo "<br>".$electricity;
                     // echo "<br>".$water;
                     // echo "<br>".$garbage;
                     // echo "<br>".$receiptNo;
                     // echo "<br>".$receiptDate;
                    $resultdata['ok'] = false;   
                    $date = date('Y-m-d');

                for($i=0;$i<count($consumers);$i++){
                    $id = (int)$consumers[$i];
                     //echo "<br><br><br> id: ".$id."| E: ".$electricity[$id]."| W: ".$water[$id]."| G: ".$garbage[$id].
                   //"| R: ".$receiptNo[$id]."| D: ".$receiptDate[$id].
                    // "<br>";
                    //echo "<br><br>ITOOOOOOOO";
                    $e = $electricity[$id];
                    //echo "<br><br>ELe:".$id;
                    $this->user->update_partial_payment_of_consumer_in_collection($id,$electricity[$id],$water[$id],$garbage[$id],$receiptNo[$id],$receiptDate[$id],$date,$username);

                    $resultdata['ok'] = true;
                }
               // $resultdata['results'] = $this->user->get_collection_with_partial_payment();
                $resultdata['results'] = $this->user->get_consumer_collection_not_paid();


                $this->load->view('template/header_template_view');
               $this->load->view('list_collection_not_paid_view',$resultdata);
        }else{
                    redirect('login','refresh');
        }
    }// end of function

    function createCollectionReportPDF(){
                        //open page to query month and year of collection to be viewed
                if($this->session->userdata('logged_in')){
                        $session_data = $this->session->userdata('logged_in');
                        $data['username'] = $session_data['username'];
                        $data['userid'] = $session_data['userid'];
                        $data['usertype'] = $session_data['usertype'];

                      
                        $temp_year = $this->input->post('year');
                        $temp_account_no = $this->input->post('account_no');
                        $resultdata['username']=$data['username'];

                        $account_no = intval($temp_account_no);
                        $year = intval($temp_year);

                        //echo "<br><br><br><br><br><br><br> >>>>>.".$month.">>>".$year;
                        
                        $results = $this->user->get_yearly_collections_for_report_view($year,$account_no);
                        


                            $pdf=new PDF_MC_Table();
                            $pdf->AddPage('L','A4',0);
                            $pdf->SetFont('Arial','',12);
                            //Table with 20 rows and 4 columns
                            $pdf->SetWidths(array(30,30,30,30,30,30,30,20,20,30));

                             $pdf->Image('/var/www/html/SAVESBESTV2/devtools/images/bill/uplb.png',10,10,20,18);
                            
                            $pdf->Image('/var/www/html/SAVESBESTV2/devtools/images/bill/logo-trans.png',35,10,-300);
                            //filler; add new line
                            $pdf->Cell(40,5,'',0,1,'L');
                             
                             //SAVESBEST HEADER
                            $pdf->Cell(50,5,'',0,0,'L');
                            $pdf->SetTextColor(13, 103, 133);
                            $pdf->SetFont('Arial','B',14);
                            $pdf->Cell(70,5,'Statement of Account',0,1,'L');

                            $pdf->SetTextColor(0,0,0);
                            $pdf->SetFont('Arial','',12);
                             //filler; add new line
                            $pdf->Cell(0,5,'',0,1,'L');
                            $pdf->Cell(0,5,'',0,1,'L');
                             //filler; add new line
                            $pdf->Cell(0,5,'',0,1,'L');
                            //add the consumer's name on the first line
                            $pdf->Cell(40,5,'NAME: ',0,0,'L');  //params: width, height, text, border (0 or 1), newline after (0,1), alignment (L,C,R)
                            $pdf->SetFont('Arial','U',12); 
                            $pdf->Cell(150,5,''.$results[0]['fullname'],0,1,'L');
                            
                            //add the consumer's address on the next line
                            $pdf->SetFont('Arial','',12);
                            $pdf->Cell(40,5,'ADDRESS: ',0,0,'L');
                            $pdf->SetFont('Arial','U',12); 
                            $pdf->Cell(150,5,''.$results[0]['address'],0,1,'L');
                            

                            //set the table header
                            $pdf->SetFont('Arial','B',10);
                            //filler; add new line
                            $pdf->Cell(0,5,'',0,1,'L');
                            //table headers
                            $pdf->Cell(30,10,'MONTH/PERIOD ',1,0,'C');
                            $pdf->Cell(60,10,'ELECTRIC ',1,0,'C');
                            $pdf->Cell(60,10,'WATER ',1,0,'C');
                            $pdf->Cell(60,10,'GARBAGE ',1,0,'C');
                            $pdf->Cell(70,10,'',1,0,'C');
                            //filler; add new line
                            $pdf->Cell(0,10,'',0,1,'L');

                            $pdf->Cell(30,10,''.$year,1,0,'C');
                            $pdf->Cell(30,10,'ACTUAL COST ',1,0,'C');
                            $pdf->Cell(30,10,'PAYMENT',1,0,'C');
                            $pdf->Cell(30,10,'ACTUAL COST ',1,0,'C');
                            $pdf->Cell(30,10,'PAYMENT',1,0,'C');
                            $pdf->Cell(30,10,'ACTUAL COST ',1,0,'C');
                            $pdf->Cell(30,10,'PAYMENT',1,0,'C');
                            $pdf->Cell(20,10,'SURCH',1,0,'C');
                            $pdf->Cell(20,10,'OR. NO.',1,0,'C');
                            $pdf->Cell(30,10,'OR. DATE',1,0,'C');
                           
                             //filler; add new line
                            $pdf->Cell(0,10,'',0,1,'L');

                            $pdf->SetFont('Arial','',10);
                            //for($i=0;$i<20;$i++)
                            //    $pdf->Row(array(GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence()));
                            //less than 12 (12 months)
                            for($i=0;$i<=16;$i++){
                                if($i==0){
                                    $pdf->Row(array("BALANCE  ".($year-1),"-","","","","","","","",""));
                                }if($i==1){
                                    $pdf->Row(array("JANUARY",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==2){
                                    $pdf->Row(array("FEBRUARY",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==3){
                                    $pdf->Row(array("MARCH",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==4){
                                    $pdf->Row(array("APRIL",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==5){
                                    $pdf->Row(array("MAY",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==6){
                                    $pdf->Row(array("JUNE",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==7){
                                    $pdf->Row(array("JULY",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==8){
                                    $pdf->Row(array("AUGUST",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==9){
                                    $pdf->Row(array("SEPTEMBER",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==10){
                                    $pdf->Row(array("OCTOBER",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==11){
                                    $pdf->Row(array("NOVEMBER",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==12){
                                    $pdf->Row(array("DECEMBER",getElectricBill($i,$results),getElectricPaid($i,$results),getWaterBill($i,$results),getWaterPaid($i,$results),getGarbageBill($i,$results),getGarbagePaid($i,$results),getSurcharge($i,$results),getORNumber($i,$results),getORDate($i,$results)));
                                }if($i==14){
                                    $pdf->Row(array("TOTAL",getTotalElectricBill($results),getTotalElectricPaid($results),getTotalWaterBill($results),getTotalWaterPaid($results),getTotalGarbageBill($results),getTotalGarbagePaid($results),"","",""));
                                }if($i==15){
                                    $pdf->Row(array("BALANCE",getElectricBalance($results),"",getWaterBalance($results),"",getGarbageBalance($results),"","","",""));
                                }if($i==16){
                                    $pdf->Row(array("BALANCE ".$year,getYearBalance($results),"","","","","","","",""));
                                }
                            }

                            $pdf->Cell(0,5,'',0,1,'L');
                            //table footers
                            $pdf->Cell(100,5,'Prepared By:  ',0,0,'L');
                            $pdf->Cell(100,5,'Checked By:   ',0,0,'L');
                        
                            //filler; add new line
                            $pdf->Cell(0,15,'',0,1,'L');
                            //signatories' names
                            $pdf->SetFont('Arial','B',10);
                            $pdf->Cell(100,5,'CRISTINA M. DE GUIA  ',0,0,'L');
                            $pdf->Cell(100,5,'SUSAN G. TOLENTINO   ',0,0,'L');

                            $pdf->Cell(0,5,'',0,1,'L');
                            //signatories' designation
                            $pdf->SetFont('Arial','',10);
                            $pdf->Cell(100,5,'Admin Assistant II',0,0,'L');
                            $pdf->Cell(100,5,'Project Devt Officer II',0,0,'L');

                             $pdf->Cell(0,5,'',0,1,'L');
                            //signatories' designation part II
                            $pdf->Cell(100,5,'',0,0,'L');
                            $pdf->Cell(100,5,'Head, Utility Billing Section',0,0,'L');
                            $pdf->Output('D',$results[0]['fullname']." ".$year."_SAO.pdf");

                }else{
                        redirect('login','refresh');
                }
        }//end of viewReadingsForCollection function




function create_account_by_admin(){
     if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$data['userid'] = $session_data['userid'];
				$data['usertype'] = $session_data['usertype'];
            $this->load->library('form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
          $usertype = $this->input->post('usertype');
         if($usertype==2){//if teacher
               $this->form_validation->set_rules('empid', 'Employee No', 'trim|required|xss_clean');
           }

             $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
             $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
             $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|min_length[11]|xss_clean');
            $this->form_validation->set_rules('usertype', 'Usertype', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|xss_clean|is_unique[user_table.username]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');


            if($this->form_validation->run() == FALSE)
            {
               $this->load->view('template/header_template_view');
             $this->load->view('add_user_admin_view',$data);
             $this->load->view('template/footer_template_view');

            }
            else
            {
                $message['msg']=1;
             $this->user->add_user_by_admin();
              $this->load->view('template/header_template_view');
            $this->load->view('success_create_account_view',$message);
            $this->load->view('template/footer_template_view');
            }
     }else{
        redirect('login','refresh');
     }
}//end of function

    function logout()
 {
  redirect('login','refresh');
 }


}

?>



<?php
//START OF PDF DOCUMENT CREATION
define('FPDF_FONTPATH','/var/www/html/SAVESBESTV2/application/libraries/fpdf181/font/');
require('/var/www/html/SAVESBESTV2/application/libraries/fpdf181/fpdf.php');


class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'R';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}

     

function getElectricBill($month,$results){
    for($i=0;$i<count($results);$i++){
        $temp = intval($results[$i]['bill_month']);
        if($temp==intval($month)){
            return $results[$i]['electricity_reading'];
        }
    }
    return "";
}

function getElectricPaid($month,$results){
    for($i=0;$i<count($results);$i++){
        $temp = intval($results[$i]['bill_month']);
        if($temp==intval($month)){
            return $results[$i]['electricity_amount_paid'];
        }
    }
    return "";
}

function getWaterBill($month,$results){
    for($i=0;$i<count($results);$i++){
        $temp = intval($results[$i]['bill_month']);
        if($temp==intval($month)){
            return $results[$i]['water_reading'];
        }
    }
    return "";
}

function getWaterPaid($month,$results){
    for($i=0;$i<count($results);$i++){
        $temp = intval($results[$i]['bill_month']);
        if($temp==intval($month)){
            return $results[$i]['water_amount_paid'];
        }
    }
    return "";
}

function getGarbageBill($month,$results){
    for($i=0;$i<count($results);$i++){
        $temp = intval($results[$i]['bill_month']);
        if($temp==intval($month)){
            return $results[$i]['garbage_fee'];
        }
    }
    return "";
}

function getGarbagePaid($month,$results){
    for($i=0;$i<count($results);$i++){
        $temp = intval($results[$i]['bill_month']);
        if($temp==intval($month)){
            return $results[$i]['garbage_amount_paid'];
        }
    }
    return "";
}

function getSurcharge($month,$results){
    for($i=0;$i<count($results);$i++){
        $temp = intval($results[$i]['bill_month']);
        if($temp==intval($month)){
            return $results[$i]['surcharge'];
        }
    }
    return "";
}

function getORNumber($month,$results){
    for($i=0;$i<count($results);$i++){
        $temp = intval($results[$i]['bill_month']);
        if($temp==intval($month)){
            return $results[$i]['receipt_number'];
        }
    }
    return "";
}
function getORDate($month,$results){
    for($i=0;$i<count($results);$i++){
        $temp = intval($results[$i]['bill_month']);
        if($temp==intval($month)){
            return $results[$i]['receipt_date'];
        }
    }
    return "";
}
function getTotalElectricBill($results){
    $total=0;
    for($i=0;$i<count($results);$i++){
        $total += $results[$i]['electricity_reading'];
    }
    return number_format($total, 2, '.', '');
}

function getTotalElectricPaid($results){
   $total=0;
    for($i=0;$i<count($results);$i++){
        $total += $results[$i]['electricity_amount_paid'];
    }
    return number_format($total, 2, '.', '');
}

function getTotalWaterBill($results){
    $total=0;
    for($i=0;$i<count($results);$i++){
        $total += $results[$i]['water_reading'];
    }
    return number_format($total, 2, '.', '');
}

function getTotalWaterPaid($results){
    $total=0;
    for($i=0;$i<count($results);$i++){
        $total += $results[$i]['water_amount_paid'];
    }
    return number_format($total, 2, '.', '');
}

function getTotalGarbageBill($results){
   $total=0;
    for($i=0;$i<count($results);$i++){
        $total += $results[$i]['garbage_fee'];
    }
    return number_format($total, 2, '.', '');
}

function getTotalGarbagePaid($results){
    $total=0;
    for($i=0;$i<count($results);$i++){
        $total += $results[$i]['garbage_amount_paid'];
    }
    return number_format($total, 2, '.', '');
}
function getElectricBalance($results){
    $totalElectricBill = getTotalElectricBill($results);
    $totalElectricPaid = getTotalElectricPaid($results);

    $balance = $totalElectricBill - $totalElectricPaid;
    return number_format($balance, 2, '.', '');
}

function getWaterBalance($results){
    $balance = getTotalWaterBill($results) - getTotalWaterPaid($results);
    return number_format($balance, 2, '.', '');
}

function getGarbageBalance($results){

    $balance = getTotalGarbageBill($results) - getTotalGarbagePaid($results);
    return number_format($balance, 2, '.', '');
}

function getYearBalance($results){
    $balance = getElectricBalance($results) + getWaterBalance($results) + getGarbageBalance($results);
    return number_format($balance, 2, '.', '');
}
?>