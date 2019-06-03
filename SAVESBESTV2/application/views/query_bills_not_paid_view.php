
<body>
    <nav class="navbar navbar-fixed-top">
    <!--start of the navbar title section-->
      <div class="navbar-header lighten-blue">
          <img class="login-img" src="<?php echo base_url();?>devtools/images/bill/uplb.png" height="50px" width="60px"/>
          <img class="login-img" src="<?php echo base_url();?>devtools/images/bill/logo-trans.png" height="50px" width="60px"/>
      </div>
      <!--Shows the logged in username and logout button-->
      <div id="homenavbar" class="row pull-right">
            <div class="col-md-4">
                <?php
                    echo "<a href='#'><b>User: $username</b></a>";
                ?>
               </div>
           <div class="col-md-4">
                 <a class="btn btn-primary" href="<?php echo site_url('home/logout')?>" role="button">Logout</a>
          </div>
      </div>
    </nav>

<body>

      <br/><br/><br/>
      

      <!--START OF BACK TO DASHBARD ICON-->
    <a href="<?php echo site_url('home')?>">
        <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Dashboard</b>
      </a>
     <br/><br/><br/>


    <div class= "container" style="margin-left:5%;">
       <h4 style="color:darkgreen;"><b>View Consumers NOT Paid Page</b></h4>
      <p>This page will allow you to VIEW consumers who have bills NOT fully paid yet given the selected BILL month and year.</p>
      <h4>Please enter the BILL MONTH and YEAR to view the bills: </h4>
    </div>
    <div class="reg_form">
        <?php echo form_open('Consumer/findBillsNotPaidByMonthYear'); ?>
        
        <div class="col-md-4 form-group" style="padding-left:15%;padding-right:5%;">
        <p>
          <div class="form-group">
              <label for="month"><span style='color:maroon;'>Month:</span></label>
              <select class="form-control" id="month" name="month" value="<?php echo set_value('month'); ?>" required>
                  <option value="1">Jan</option>
                  <option value="2">Feb</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">Aug</option>
                  <option value="9">Sept</option>
                  <option value="10">Oct</option>
                  <option value="11">Nov</option>
                  <option value="12">Dec</option>
              </select>
          </div>
        </p>
        <p>
          <label for="year"><span style='color:maroon;'>YEAR:</span></label>
          <input type="number" id="year" name="year" value="<?php echo set_value('year'); ?>" class="form-control" placeholder="Enter YEAR here" required/>
        </p>
                                    
        <p>
          <input type="submit"  class="btn btn-success" value="Find Bills" />
        </p>
        </div>
        </form>
    </div><!--div reading date query form-->


    <div>
        <?php
           if(isset($ok)){
           // echo "<br><br>OK: ".$ok;
           // print_r($results);

              echo form_open('Consumer/addPaymentToCollection');
              
             

              echo ' <div style="font-size:0.8em;">
                       <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                         <thead>
                           <tr>


                               <th>Account<br>No</th>
                               <th>Name</th>
                               <th>Con.Type</th>
                               <th>Bill<br>Month</th>
                               <th>Bill<br>Year</th>
                               <th>Electricity<br>Bill</th>
                               <th>Electricity<br>Payment</th>
                               <th>Electricity<br>Balance</th>
                               <th>Water<br>Bill</th>
                               <th>Water<br>Payment</th>
                               <th>Water<br>Balance</th>
                               <th>Garbage<br>Bill</th>
                               <th>Garbage<br>Payment</th>
                               <th>Garbage<br>Balance</th>
                               <th>Is Paid? </th>

                           </tr>
                         </thead>
                           <tbody>';
                      
                                $month='';
                               $c = count($results);
                              // echo "ITOOOOO".$c;
                               foreach($results as $result){
                                  if($result['bill_month']==1){
                                      $month="Jan";
                                  }else if($result['bill_month']==2){
                                      $month="Feb";
                                  }else if($result['bill_month']==3){
                                      $month="Mar";
                                  }else if($result['bill_month']==4){
                                      $month="Apr";
                                  }else if($result['bill_month']==5){
                                      $month="May";
                                  }else if($result['bill_month']==6){
                                      $month="Jun";
                                  }else if($result['bill_month']==7){
                                      $month="Jul";
                                  }else if($result['bill_month']==8){
                                      $month="Aug";
                                  }else if($result['bill_month']==9){
                                      $month="Sep";
                                  }else if($result['bill_month']==10){
                                      $month="Oct";
                                  }else if($result['bill_month']==11){
                                      $month="Nov";
                                  }else if($result['bill_month']==12){
                                      $month="Dec";
                                  }

                                  $electricity_balance = number_format(floatval($result['electricity_reading']) - floatval($result['electricity_amount_paid']), 2, '.', '');
                                  $water_balance = number_format(floatval($result['water_reading']) - floatval($result['water_amount_paid']), 2, '.', '');
                                  $garbage_balance = number_format(floatval($result['garbage_fee']) - floatval($result['garbage_amount_paid']), 2, '.', '');

                                  $isPaid = "No";
                                  if($result['is_paid'] == 1){
                                    $isPaid = "Yes";
                                  }
                                 
                                 // $consumer_array = array();
                                  echo "<tr>".

                                           "<td style='text-align:center;'>".$result['account_no']."</td>".
                                           "<td>".$result['fullname']."</td>".
                                           //"<td>".$result['address']."</td>".
                                           "<td>".$result['consumer_type']."</td>".
                                           "<td>".$month."</td>".
                                           "<td>".$result['bill_year']."</td>".
                                           "<td style='text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".$result['electricity_reading']."</td>".
                                           "<td style='text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".$result['electricity_amount_paid']."</td>".
                                           "<td style='color:maroon;font-weight:bold;text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".$electricity_balance."</td>".
                                           //START OF WATER READING AND COLLECTION AMOUNT
                                           "<td style='text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".$result['water_reading']."</td>".
                                           "<td style='text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".$result['water_amount_paid']."</td>".
                                           "<td style='color:maroon;font-weight:bold;text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".$water_balance."</td>".
                                             
                                             //START OF GARBAGE READING AND COLLECTION AMOUNT
                                           "<td style='text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".$result['garbage_fee']."</td>".
                                           "<td style='text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".$result['garbage_amount_paid']."</td>".
                                           "<td style='color:maroon;font-weight:bold;text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".$garbage_balance."</td>".
                                            //GARBAGE OR NO AND DATE FIELDS
                                    
                                           "<td style='text-align:center;'>".$isPaid.

                                           "<input type='hidden' name='consumers[]' id='consumers' value=' ".$result['id']." ' /><input type='hidden' name='consumer_id[".$result['id']."]' id='consumer_id' value=' ".$result['consumer_id']." ' /></td>".

                                            "</tr>";
                                           //$i=$i+1;
                                         

                                   }//end of foreach
                               
                             echo "</tbody>";
                             echo " </table>";

                          echo "</div><!--end of datatable div-->";
                          if(isset($added_to_db) && $added_to_db){

                            echo "<span style='background-color:yellow;color:maroon;'>Payment was successfully added to the collection. </span>";
                          }
                           //echo "<button style='float:right;' data-toggle='tooltip' title='SAVE PAYMENT' type='submit' class='btn btn-warning'>SAVE PAYMENT</button>";
                                //echo form_button($delete_button);

                           echo '<input type="hidden" id="year" name="year" value="'.$bill_year.'"/>';
                           echo '<input type="hidden" id="month" name="month" value="'.$bill_month.'"/>';
                          
                       "</form></div>";
                      echo form_close();
                    }
                  ?>



              
            
            

    </div>

</body>


  <script src="../../devtools/js/collectionjs.js">

     </script>