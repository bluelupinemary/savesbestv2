
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

    <!--START OF LIST CONSUMERS TABLE-->
    <div>
      <br/><br/>
      <a href="<?php echo site_url('home')?>">
        <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Dashboard</b>
      </a>
         <div class="container">
            <div class="row-head row">
                <div class="">


                  <?php echo form_open('Consumer/addPaymentToCollection');
                       
                      ?> 
                  <b>INPUT RECEIPT DATE:</b> <input type='date' size='5' name='init_receipt_date' id='init_receipt_date'> 
                  <input type="checkbox" name="init_receipt_date_box" onclick="fillReceiptDate(this.form)">
                  <span style="color:maroon"><i>Check this box to set the same Receipt Date for all entries.</i></span>

                  <!--Start of div for the datatable-->
                 <div style="font-size:0.8em;">
                       <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                         <thead>
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
                           <tbody>
                              <?php
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
                                           "<td><input type='text' size='7' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid' value='".$result['electricity_reading']."'></td>".
                                           //"<td><input type='text' size='5' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid'></td>".
                                           //"<td>".$result['water_reading']."</td>".
                                           "<td><input type='text' size='7' name='water_amount_paid[".$result['id']."]' id='water_amount_paid' value='".$result['water_reading']."'></td>".
                                           //"<td>".$result['garbage_fee']."</td>".
                                           "<td><input type='text' size='5' name='garbage_amount_paid[".$result['id']."]' id='garbage_amount_paid' value='".$result['garbage_fee']."'></td>".
                                           "<td><input type='text' size='7' name='receipt_no[".$result['id']."]' id='receipt_no'></td>".
                                           "<td><input type='date' size='5' name='receipt_date[".$result['id']."]' id='receipt_date'><input type='hidden' name='consumers[]' id='consumers' value=' ".$result['id']." ' /></td>".
                                            "</tr>";
                                           //$i=$i+1;
                                         

                                   }//end of foreach
                               ?>
                             </tbody>
                           </table>

                       </div><!--end of datatable div-->
                       <?php
                           echo "<button style='float:right;' data-toggle='tooltip' title='SAVE PAYMENT' type='submit' class='btn btn-warning'>SAVE PAYMENT</button>";
                                //echo form_button($delete_button);
                       "</form></div>";
                      echo form_close();
                  ?>
            


       </div>
     </div>
    </div>
 

<script>
  function fillReceiptDate(f) {
      console.log("called");
      if(f.init_receipt_date_box.checked == true) {
        //console.log("init: "+f.init_receipt_date.value);
       
        for (i = 0; i < f.receipt_date.length; i++) {
          f.receipt_date[i].value = f.init_receipt_date.value;
          // console.log("else: "+f.receipt_date[i]);
         }
      }
    }

</script>

   <script src="../../devtools/js/collectionjs.js">

    </script>