
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
      <p>This page will allow you to view COLLECTION REPORT per month or per year.</p>
      <h4>Please specify the COLLECTION MONTH, YEAR and the REPORT TYPE to view the desired collection.</h4>
    </div>
    <div class="reg_form">
        <?php echo form_open('Consumer/findCollectionsForCollectionReport'); ?>
        
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
          <div class="form-group">
              <label for="reportType"><span style='color:maroon;'>Report Type:</span></label>
              <select class="form-control" id="reportType" name="reportType" value="<?php echo set_value('reportType'); ?>" required>
                  <option value="byMonth">By Month</option>
                  <option value="byYear">By Year</option>
              </select>
          </div>
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

                echo form_open('Consumer/createCollectionReportPDF');

                echo '<div style="font-size:0.8em;">';
                
                echo '<div class="panel-body">';
                echo '<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >';
                echo '<thead>
                           <tr>
                              
                               <th>Name</th><th>Acct.No</th><th>Date</th>
                               <th>OR.No</th><th>Electric</th><th>Water</th>
                               <th>Garbage</th><th>Others<br>Surcharge</th><th>Total</th>
                               <th>Period Covered</th>

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

                                  $total = floatval($result['electricity_amount_paid'])+floatval($result['water_amount_paid'])+floatval($result['garbage_amount_paid']);
                                  $total = number_format($total, 2, '.', '');
                                 // $consumer_array = array();
                                  echo "<tr>".
                                           "<td>".$result['fullname']."</td>".
                                           "<td>".$result['account_no']."</td>".
                                           "<td>".$result['receipt_date']."</td>".
                                           "<td>".$result['receipt_number']."</td>".
                                           "<td>".$result['electricity_amount_paid']."</td>".
                                           //"<td><input type='text' size='7' name='electricity_amount_paid' id='electricity_amount_paid' value='".$result['electricity_reading']."' disabled/></td>".
                                           //"<td><input type='text' size='5' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid'></td>".
                                           "<td>".$result['water_amount_paid']."</td>".
                                           //"<td><input type='text' size='7' name='water_amount_paid' id='water_amount_paid' value='".$result['water_reading']."' disabled /></td>".
                                           "<td>".$result['garbage_amount_paid']."</td>".
                                           //"<td><input type='text' size='5' name='garbage_amount_paid' id='garbage_amount_paid' value='".$result['garbage_fee']."' disabled /></td>".
                                           "<td></td>".
                                  
                                           "<td>".$total."</td>".
                                           "<td>".$month." ".$result['bill_year']."</td>".
                                            "</tr>";
                                           //$i=$i+1;
                                         

                                   }//end of foreach
                       echo '</tbody>
                           </table>

                       </div>';
                      ?>
                         
                       <?php
                          echo "<button style='float:right;' data-toggle='tooltip' title='PRINT COLLECTION REPORT' type='submit' class='btn btn-warning'>DOWNLOAD COLLECTION REPORT</button>";
                                //echo form_button($delete_button);
                          echo "<input type='text' size='5' name='report_month' id='report_month' value='".$report_month."' />";
                          echo "<input type='text' size='5' name='report_year' id='report_year' value='".$report_year."' />";
                          echo "<input type='text' size='5' name='report_type' id='report_type' value='".$report_type."' />";
                       "</form></div>";
                      echo form_close();

                       
                    }//end of if()


                  ?>
            

    </div>

</body>

  <script src="../../devtools/js/collectionjs.js">

     </script>