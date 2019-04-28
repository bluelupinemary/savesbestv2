
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


    <div style="margin-left:5%;">
      <h4 style="color:darkgreen;"><b>Edit Consumer Payment / Add Surcharge Page</b></h4>
      <p>This page will allow you to EDIT a consumers' collection/payment entry given the ACCOUNT NO. and PAYMENT month and year.</p>
      <h4>Please enter the details to be edited: </h4>
    </div>
    <div class="reg_form">
        <?php echo form_open('Consumer/findIndividualCollection'); ?>
        
        <div class="col-md-4 form-group" style="padding-left:15%;padding-right:5%;">
       
        <p>
          <label for="account_no"><span style='color:maroon;'>ACCOUNT NO:</span></label>
          <input type="number" id="account_no" name="account_no" value="<?php echo set_value('account_no'); ?>" class="form-control" placeholder="Enter Account No here" required/>
        </p>
        <p>
        <label for="month"><span style='color:maroon;'>Payment Month:</span></label>
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
        </p>
        <p>
          <label for="year"><span style='color:maroon;'>Payment Year:</span></label>
          <input type="number" id="year" name="year" value="<?php echo set_value('year'); ?>" class="form-control" placeholder="Enter YEAR here" required/>
        </p>
                      
        <p>
          <input type="submit"  class="btn btn-success" value="Find Collection" />
        </p>
        </div>
        </form>
    </div><!--div reading date query form-->

    <div>
        <?php
       // echo "<br><br>OK: ".$ok;
            if(isset($ok)){
            
           // print_r($results);

                echo form_open('Consumer/updateConsumerPaymentInCollection');

                echo '<div style="font-size:0.8em;">';

                echo '<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >';
                echo '<thead>
                           <tr>
                              
                               <th>Bill<br>ID</th><th>Name</th><th>Address</th><th>Con.Type</th>
                               <th>Bill<br>Month</th><th>Bill<br>Year</th><th>Electricity<br>Amt. Paid</th>
                               <th>Water<br>Amt. Paid</th><th>Garbage<br>Amt. Paid</th>
                                <th>Surcharge</th><th>OR.No.</th><th>OR.Date</th>

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


                               
                                 // $consumer_array = array();
                                  echo "<tr style='font-size:1.3em;'>".

                                           "<td>".$result['id']."</td>".
                                           "<td>".$result['fullname']."</td>".
                                           "<td>".$result['address']."</td>".
                                           "<td>".$result['consumer_type']."</td>".
                                           "<td>".$month."</td>".
                                           "<td>".$result['bill_year']."</td>".
                                           //"<td>".$result['electricity_reading']."</td>".
                                           "<td><input type='text' size='7' name='electricity_amount_paid' id='electricity_amount_paid' value='".$result['electricity_amount_paid']."'></td>".
                                           //"<td><input type='text' size='5' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid'></td>".
                                           //"<td>".$result['water_reading']."</td>".
                                           "<td><input type='text' size='7' name='water_amount_paid' id='water_amount_paid' value='".$result['water_amount_paid']."'></td>".
                                           //"<td>".$result['garbage_fee']."</td>".
                                           "<td><input type='text' size='4' name='garbage_amount_paid' id='garbage_amount_paid' value='".$result['garbage_amount_paid']."'></td>".

                                           "<td><input type='text' size='4' name='surcharge' id='surcharge' value='".$result['surcharge']."'></td>".

                                           "<td><input type='text' size='4' name='receipt_no' id='receipt_no' value='".$result['receipt_number']."'></td>".
                                  
                                           "<td><input type='date' size='4' name='receipt_date' id='receipt_date' value='".$result['receipt_date']."'><input type='hidden' name='bill_id' id='bill_id' value=' ".$result['id']." ' /></td>".
                                            "</tr>";
                                           //$i=$i+1;
                                         

                                   }//end of foreach
                       echo '</tbody>
                           </table>

                       </div>';
                       // echo "<input type='text' size='7' name='payment_month' id='payment_month' value='".$results['payment_month']."'>";
                       //  echo "<input type='text' size='7' name='payment_year' id='payment_year' value='".$results['payment_year']."'>";
                       //   echo "<input type='text' size='7' name='account_no' id='account_no' value='".$results['account_no']."'>";

                       echo "<input type='hidden' size='7' name='payment_month' id='payment_month' value='".$payment_month."'>";
                        echo "<input type='hidden' size='7' name='payment_year' id='payment_year' value='".$payment_year."'>";
                         echo "<input type='hidden' size='7' name='account_no' id='account_no' value='".$account_no."'>";
                      ?>
                         
                       <?php
                           echo "<button style='float:right;' data-toggle='tooltip' title='SAVE PAYMENT' type='submit' class='btn btn-warning'>SAVE PAYMENT</button>";
                                //echo form_button($delete_button);
                       "</form></div>";
                      echo form_close();

                        if(isset($update_ok)){
                          echo "<p> <span style='color:maroon;font-size:1.3em;background-color:gold;'> The consumer's payment was successfully updated.</span></p>";
                        }
                    }//end of if()


                  ?>
            

    </div>

</body>