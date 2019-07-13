
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
       <h4 style="color:darkgreen;"><b>View Bills for Collection Page</b></h4>
      <p>This page will allow you to VIEW consumers' bills given the selected BILL month and year.</p>
      <h4>Please enter the BILL MONTH and YEAR to view the bills: </h4>
    </div>
    <div class="reg_form">
        <?php echo form_open('Consumer/findBillsByMonthYear'); ?>
        
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
              
              echo '<br><br><b>OR Date:</b> <input type="date" size="5" name="init_receipt_date" id="init_receipt_date"> 
                  <input type="checkbox" name="init_receipt_date_box" onclick="fillORReceiptDate(this.form)">
                  <span style="color:maroon"><i>Check this box to set the same <b>Receipt Date</b> for Electricity,Water and Garbage entries.</i></span>';

 		echo '<br><br><b>OR No:</b> <input type="text" size="5" name="init_receipt_no" id="init_receipt_no"> 
                  <input type="checkbox" name="init_receipt_no_box" onclick="fillORReceiptNo(this.form)">
                  <span style="color:maroon"><i>Check this box to set the same <b>Receipt No</b> for Electricity,Water and Garbage entries.</i></span>';
             

 		

              echo ' <div style="font-size:0.8em;">
                       <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                         <thead>
                           <tr>


                               <th>Bill<br>ID</th><th>Name</th><th>Address</th>
                               <th>Bill<br>Mon</th><th>Bill<br>Yr</th><th>Electricity<br>Payment</th><th>Elec<br>OR No</th><th>Elec<br>OR Date</th>
                               <th>Water<br>Payment</th><th>Wtr<br>OR No</th><th>Wtr<br>OR Date</th><th>Garbage<br>Payment</th><th>Gbg<br>OR No</th><th>Gbg<br>OR Date</th>
                               

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
                                           //"<td>".$result['consumer_type']."</td>".
                                           "<td>".$month."</td>".
                                           "<td>".$result['bill_year']."</td>".
                                           //"<td>".$result['electricity_reading']."</td>".
                                           "<td><input type='text' size='7' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid' value='".$result['electricity_reading']."'></td>".
                                           //ELECTRICITY OR NO AND DATE FIELDS
                                            "<td><input type='text' size='5' name='elec_receipt_no[".$result['id']."]' id='elec_receipt_no'></td>".
                                           "<td><input type='date' size='5' name='elec_receipt_date[".$result['id']."]' id='elec_receipt_date'></td>".
                                           //"<td><input type='text' size='5' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid'></td>".
                                           //"<td>".$result['water_reading']."</td>".
                                           "<td><input type='text' size='7' name='water_amount_paid[".$result['id']."]' id='water_amount_paid' value='".$result['water_reading']."'></td>".
                                             //WATER OR NO AND DATE FIELDS
                                            "<td><input type='text' size='5' name='water_receipt_no[".$result['id']."]' id='water_receipt_no'></td>".
                                           "<td><input type='date' size='5' name='water_receipt_date[".$result['id']."]' id='water_receipt_date'></td>".
                                           //"<td>".$result['garbage_fee']."</td>".
                                           "<td><input type='text' size='5' name='garbage_amount_paid[".$result['id']."]' id='garbage_amount_paid' value='".$result['garbage_fee']."'></td>".
                                            //GARBAGE OR NO AND DATE FIELDS
                                           "<td><input type='text' size='5' name='garbage_receipt_no[".$result['id']."]' id='garbage_receipt_no'></td>".
                                           "<td><input type='date' size='5' name='garbage_receipt_date[".$result['id']."]' id='garbage_receipt_date'><input type='hidden' name='consumers[]' id='consumers' value=' ".$result['id']." ' /><input type='hidden' name='consumer_id[".$result['id']."]' id='consumer_id' value=' ".$result['consumer_id']." ' /></td>".

                                            "</tr>";
                                           //$i=$i+1;
                                         

                                   }//end of foreach
                               
                             echo "</tbody>";
                             echo " </table>";

                          echo "</div><!--end of datatable div-->";
                          if(isset($added_to_db) && $added_to_db){

                            echo "<span style='background-color:yellow;color:maroon;'>Payment was successfully added to the collection. </span>";
                          }
                           echo "<button style='float:right;' data-toggle='tooltip' title='SAVE PAYMENT' type='submit' class='btn btn-warning'>SAVE PAYMENT</button>";
                                //echo form_button($delete_button);

                           echo '<input type="hidden" id="year" name="year" value="'.$bill_year.'"/>';
                           echo '<input type="hidden" id="month" name="month" value="'.$bill_month.'"/>';
                          
                       "</form></div>";
                      echo form_close();
                    }
                  ?>



                  <?php
         
                  ?>
            
            

    </div>

</body>

<script>
  function fillORReceiptDate(f) {
      console.log("called");
      if(f.init_receipt_date_box.checked == true) {
        //console.log("init: "+f.init_receipt_date.value);
       
        for (i = 0; i < f.elec_receipt_date.length; i++) {
          f.elec_receipt_date[i].value = f.init_receipt_date.value;
	  f.water_receipt_date[i].value = f.init_receipt_date.value;
	  f.garbage_receipt_date[i].value = f.init_receipt_date.value;
          // console.log("else: "+f.receipt_date[i]);
         }
      }
    }

  function fillORReceiptNo(f) {
      console.log("called");
      if(f.init_receipt_no_box.checked == true) {
        //console.log("init: "+f.init_receipt_date.value);
       
        for (i = 0; i < f.elec_receipt_date.length; i++) {
          f.elec_receipt_no[i].value = f.init_receipt_no.value;
	  f.water_receipt_no[i].value = f.init_receipt_no.value;
	  f.garbage_receipt_no[i].value = f.init_receipt_no.value;
          // console.log("else: "+f.receipt_date[i]);
         }
      }
    }

   



</script>

  <script src="../../devtools/js/collectionjs.js">

     </script>
