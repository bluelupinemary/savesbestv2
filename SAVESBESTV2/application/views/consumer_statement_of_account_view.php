
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
      <h4 style="color:darkgreen;"><b>Print Statement of Account Page</b></h4>
      <p>This page will allow you to CHECK and PRINT a consumers' STATEMENT OF ACCOUNT given the account no and desired year.</p>
      <h4>Please select the SOA year: </h4>
    </div>
    <div class="reg_form">
        <?php echo form_open('Consumer/findConsumerStatementOfAccount'); ?>
        
        <div class="col-md-6 form-group" style="padding-left:15%;padding-right:5%;">
       
        <p>
          <label for="account_no"><span style='color:maroon;'>ACCOUNT NO:</span></label>
          <?php
            if(isset($account_no)){
                echo $account_no;
                echo '<input type="hidden" name="account_no" id="account_no" value="'.$account_no.'"  />';
            }
          ?>      
        </p>

         <p>
          <label for="consumer_id"><span style='color:maroon;'>CONSUMER ID:</span></label>
          <?php
            if(isset($consumer_id)){
                 echo $consumer_id;
                  echo '<input type="hidden" name="consumer_id" id="consumer_id" value="'.$consumer_id.'"  />';
            }
          ?>      
        </p>

        <p>
          <label for="consumer_name"><span style='color:maroon;'>CONSUMER NAME:</span></label>
          <?php
            if(isset($consumer_name)){
               echo $consumer_name;
               echo '<input type="hidden" name="consumer_name" id="consumer_name" value="'.$consumer_name.'"  />';
            }
          ?>      
        </p>
        <p>
          <label for="year"><span style='color:maroon;'>YEAR:</span></label>
          <input type="number" id="year" name="year" value="<?php echo set_value('year'); ?>" class="form-control" placeholder="Enter YEAR here" required/>
        </p>
                      
        <p>
          <input type="submit"  class="btn btn-success" value="View Statement of Account" />
        </p>
        </div>
        </form>
    </div><!--div reading date query form-->

<?php
    function getResult($results,$i){
            foreach($results as $result){
                if((int)$result['bill_month']==$i){
                     return $result;
                }
            }
            return null;
    }

     function showResultToTable($result,$i){
            $mon = getMonth($i);
            echo "<td>".$i."-".$mon."</td>";
            echo "<td>".$result['electricity_reading']."</td>".
                  "<td>".$result['electricity_amount_paid']."</td>".
                 "<td>".$result['water_reading']."</td>".
                 "<td>".$result['water_amount_paid']."</td>".
                  "<td>".$result['garbage_fee']."</td>".
                 "<td>".$result['garbage_amount_paid']."</td>".
                  "<td>".$result['surcharge']."</td>".
                 "<td>".$result['receipt_number']."</td>".
                  "<td>".$result['receipt_date']."</td>";
      }
      function showEmptyRowToTable($i){
            $mon = getMonth($i);
            echo "<td>".$i."-".$mon."</td>".
                  "<td></td>".
                  "<td></td>".
                 "<td></td>".
                "<td></td>".
                 "<td></td>".
                 "<td></td>".
                  "<td></td>".
                 "<td></td>".
                  "<td></td>";
      }

       function getMonth($i){
             if($i==1){
                  $month="Jan";
              }else if($i==2){
                  $month="Feb";
              }else if($i==3){
                  $month="Mar";
              }else if($i==4){
                  $month="Apr";
              }else if($i==5){
                  $month="May";
              }else if($i==6){
                  $month="Jun";
              }else if($i==7){
                  $month="Jul";
              }else if($i==8){
                  $month="Aug";
              }else if($i==9){
                  $month="Sep";
              }else if($i==10){
                  $month="Oct";
              }else if($i==11){
                  $month="Nov";
              }else if($i==12){
                  $month="Dec";
              }
              return $month;
      }
?>






    <div>
        <?php
       // echo "<br><br>OK: ".$ok;
            if(isset($ok)){
            
           // print_r($results);

                echo form_open('Consumer/createCollectionReportPDF');

                echo '<div style="font-size:0.8em;">';

                echo '<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >';
                echo '<thead>
                          <tr>
                               <th rowspan="2">Month/Period<br>'.$year.'</th><th colspan="2"><center>Electricity</th><th colspan="2"><center>Water</th>
                               <th colspan="2"><center>Garbage</th><th rowspan="2"><center>Surcharge</th><th rowspan="2"><center>OR No</th><th rowspan="2"><center>OR Date</th>
                           </tr>
                           <tr>
                               <th>ACTUAL COST</th><th>PAYMENT</th><th>ACTUAL COST</th><th>PAYMENT</th>
                               <th>ACTUAL COST</th><th>PAYMENT</th>
                           </tr>
                         </thead>
                           <tbody>';
                      
                                for($i=1;$i<=12;$i++){
                                  echo "<tr style='font-size:1.3em;text-align:right;'>";
                                  //if($i==1){
                                    //echo "i = "+$i;
                                    $result = getResult($results,$i);
                                    $count = count($result);
                                    //echo "count: ",$count;
                                  // print_r($result);
                                    if($count > 0){
                                        showResultToTable($result,$i);
                                    }else{
                                        showEmptyRowToTable($i);
                                    }
                                 // }else{
                                 //     echo "<td>".$i."-</td>";
                                 // }
                                 

                                          // // "<td>".$result['id']."</td>".
                                          // "<td>".$result['bill_month'].'-'.$month."</td>".
                                          //  "<td>".$result['electricity_reading']."</td>".
                                          //  "<td>".$result['electricity_amount_paid']."</td>".
                                          //  "<td>".$result['water_reading']."</td>".
                                          //  "<td>".$result['water_amount_paid']."</td>".
                                          //   "<td>".$result['garbage_fee']."</td>".
                                          //  "<td>".$result['garbage_amount_paid']."</td>".
                                          //   "<td>".$result['surcharge']."</td>".
                                          //  "<td>".$result['receipt_number']."</td>".
                                          //   "<td>".$result['receipt_date']."</td>".
                                          //  //"<td>".$result['electricity_reading']."</td>".
                                         
                                  echo "</tr>";
                                           //$i=$i+1;
                                         

                                   
                                }
                              
                                 // $consumer_array = array();
                                  
                       echo '</tbody>
                           </table>

                       </div>';
                       // echo "<input type='text' size='7' name='payment_month' id='payment_month' value='".$results['payment_month']."'>";
                       //  echo "<input type='text' size='7' name='payment_year' id='payment_year' value='".$results['payment_year']."'>";
                       //   echo "<input type='text' size='7' name='account_no' id='account_no' value='".$results['account_no']."'>";


                       
                      ?>
                         
                       <?php
                       echo '<input type="hidden" name="account_no" id="account_no" value="'.$account_no.'"  />';
                        echo '<input type="hidden" name="year" id="year" value="'.$year.'"  />';
                           echo "<button style='float:right;' data-toggle='tooltip' title='SAVE PAYMENT' type='submit' class='btn btn-warning'>DOWNLOAD SOA REPORT</button><br><br>";
                                //echo form_button($delete_button);
                       "</form></div>";
                      echo form_close();

                  
                    }//end of if()


                  ?>
            

    </div>

</body>