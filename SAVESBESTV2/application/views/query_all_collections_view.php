
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
      <p>This page will allow you to VIEW consumers' collection entry given the selected PAYMENT/COLLECTION month and year.</p>
      <h4>Please enter the PAYMENT/COLLECTION MONTH and YEAR to view the collection: </h4>
    </div>
    <div class="reg_form">
        <?php echo form_open('Consumer/findCollectionsByMonthYear'); ?>
        
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
          <input type="submit"  class="btn btn-success" value="Find Collections" />
        </p>
        </div>
        </form>
    </div><!--div reading date query form-->


    <div class="container">
        <?php
            if(isset($ok)){
           // echo "<br><br>OK: ".$ok;
           // print_r($results);

                echo form_open('Consumer/updateConsumerPaymentInCollection');

                echo '<div style="font-size:0.8em;">';
                
                echo '<div class="panel-body">';
                echo '<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >';
                echo '<thead>
                           <tr>
                               <!--th>Bill<br>ID</th><th>Name</th><th>Address</th><th>Con.Type</th>
                               <th>Month</th><th>Year</th><th>Electricity</th><th>Amount</th>
                               <th>Water</th><th>Amount</th><th>Garbage</th><th>Amount</th>
                               <th>OR.No.</th><th>OR.Date</th-->

                               <th>Bill<br>ID</th><th>Name</th><th>Address</th><th>Con.Type</th>
                               <th>Month</th><th>Year</th><th>Electricity</th>
                               <th>Water</th><th>Garbage</th>
                               <th>OR.No.</th><th>OR.Date</th>

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
                                  echo "<tr>".

                                           "<td>".$result['id']."</td>".
                                           "<td>".$result['fullname']."</td>".
                                           "<td>".$result['address']."</td>".
                                           "<td>".$result['consumer_type']."</td>".
                                           "<td>".$month."</td>".
                                           "<td>".$result['bill_year']."</td>".
                                           //"<td>".$result['electricity_reading']."</td>".
                                           "<td><input type='text' size='7' name='electricity_amount_paid' id='electricity_amount_paid' value='".$result['electricity_amount_paid']."' disabled/></td>".
                                           //"<td><input type='text' size='5' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid'></td>".
                                           //"<td>".$result['water_reading']."</td>".
                                           "<td><input type='text' size='7' name='water_amount_paid' id='water_amount_paid' value='".$result['water_amount_paid']."' disabled /></td>".
                                           //"<td>".$result['garbage_fee']."</td>".
                                           "<td><input type='text' size='5' name='garbage_amount_paid' id='garbage_amount_paid' value='".$result['garbage_amount_paid']."' disabled /></td>".
                                           "<td><input type='text' size='7' name='receipt_no' id='receipt_no' value='".$result['receipt_number']."' disabled /></td>".
                                  
                                           "<td><input type='date' size='5' name='receipt_date' id='receipt_date' value='".$result['receipt_date']."' disabled /><input type='hidden' name='bill_id' id='bill_id' value=' ".$result['id']." ' /></td>".
                                            "</tr>";
                                           //$i=$i+1;
                                         

                                   }//end of foreach
                       echo '</tbody>
                           </table>

                       </div>';
                      ?>
                         
                       <?php
                          
                                //echo form_button($delete_button);
                       "</form></div>";
                      echo form_close();

                       
                    }//end of if()


                  ?>
            

    </div>

</body>

  <script src="../../devtools/js/collectionjs.js">

     </script>