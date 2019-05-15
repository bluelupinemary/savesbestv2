
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
         <div class="">
            <div class="row-head row">
                <div class="">


                  <?php echo form_open('Consumer/updateCollection');

                    echo '<br><br><span style="margin-left:10%;"><b>Electricity OR Date:</b> <input type="date" size="5" name="elec_init_receipt_date" id="elec_init_receipt_date"></span>
                  <input type="checkbox" name="elec_init_receipt_date_box" onclick="fillElecReceiptDate(this.form)">
                  <span style="color:maroon"><i>Check this box to set the same Receipt Date for all entries.</i></span>';
              echo '<br><br><span style="margin-left:10%;"><b>Water OR Date:</b> <input type="date" size="5" name="water_init_receipt_date" id="water_init_receipt_date"></span> 
                  <input type="checkbox" name="water_init_receipt_date_box" onclick="fillWaterReceiptDate(this.form)">
                  <span style="color:maroon"><i>Check this box to set the same Receipt Date for all entries.</i></span>';

             echo '<br><br><span style="margin-left:10%;"><b>Garbage OR Date:</b> <input type="date" size="5" name="garbage_init_receipt_date" id="garbage_init_receipt_date"> </span>
                  <input type="checkbox" name="garbage_init_receipt_date_box" onclick="fillGarbageReceiptDate(this.form)">
                  <span style="color:maroon"><i>Check this box to set the same Receipt Date for all entries.</i></span>';
                       
                      ?> 
                 

                  <!--Start of div for the datatable-->
                 <div style="font-size:0.8em;margin-left: 2%;margin-right:2%;">
                       <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                         <thead>
                           <tr>
                               <!--th>Bill<br>ID</th><th>Name</th><th>Address</th><th>Con.Type</th>
                               <th>Month</th><th>Year</th><th>Electricity</th><th>Amount</th>
                               <th>Water</th><th>Amount</th><th>Garbage</th><th>Amount</th>
                               <th>OR.No.</th><th>OR.Date</th-->

                               <!--<th>Bill<br>ID</th><th>Name</th><th>Address</th><th>Con.Type</th>
                               <th>Month</th><th>Year</th><th>Electricity Balance</th>
                               <th>Water Balance</th><th>Garbage Balance</th>
                               <th>OR.No.</th><th>OR.Date</th>-->

                               <th>Bill<br>ID</th><th>Name</th><th>Con.Type</th>
                               <th>Bill<br>Month</th><th>Bill<br>Year</th><th>Electricity<br>Payment</th><th>Elec<br>OR No</th><th>Elec<br>OR Date</th>
                               <th>Water<br>Payment</th><th>Wtr<br>OR No</th><th>Wtr<br>OR Date</th><th>Garbage<br>Payment</th><th>Gbg<br>OR No</th><th>Gbg<br>OR Date</th>

                           </tr>
                         </thead>
                           <tbody>
                              <?php
                                $month='';
                               $c = count($results);
                               //print_r($results);
                                //print_r($id_arr);
                               //print_r($receipt_results);
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
                                           "<td>".$result['consumer_type']."</td>".
                                           "<td>".$month."</td>".
                                           "<td>".$result['bill_year']."</td>".
                                           //"<td>".$result['electricity_reading']."</td>".
                                           "<td><input type='text' size='7' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid' value='".$result['electricity_balance']."'></td>";
                                          //RECEIPT NO AND DATE
                                           $temp=false;
                                           foreach($receipt_results as $receipt){
                                                if($receipt['id']==$result['id'] && $receipt['utility_type']==1){
                                                  //echo "itooooooo";
                                                 echo  "<td><input type='text' size='5' name='elec_receipt_no[".$result['id']."]' id='elec_receipt_no' value='".$receipt['receipt_no']."'></td>".
                                                  "<td><input type='date' size='5' name='elec_receipt_date[".$result['id']."]' id='elec_receipt_date' value='".$receipt['receipt_date']."'></td>";
                                                  $temp=true;
                                                  break;
                                                }else{
                                                  $temp=false;
                                                }
                                           }
                                           if(!$temp){
                                             echo  "<td><input type='text' size='5' name='elec_receipt_no[".$result['id']."]' id='elec_receipt_no'></td>".
                                                  "<td><input type='date' size='5' name='elec_receipt_date[".$result['id']."]' id='elec_receipt_date'></td>";
                                           }
                                           
                                           //"<td><input type='text' size='5' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid'></td>".
                                           //"<td>".$result['water_reading']."</td>".
                                           echo "<td><input type='text' size='7' name='water_amount_paid[".$result['id']."]' id='water_amount_paid' value='".$result['water_balance']."'></td>";
                                           //RECEIPT NO AND DATE
                                            $temp=false;
                                           foreach($receipt_results as $receipt){
                                                if($receipt['id']==$result['id'] && $receipt['utility_type']==2){
                                                  //echo "itooooooo";
                                                 echo  "<td><input type='text' size='5' name='water_receipt_no[".$result['id']."]' id='water_receipt_no' value='".$receipt['receipt_no']."'></td>".
                                                  "<td><input type='date' size='5' name='water_receipt_date[".$result['id']."]' id='water_receipt_date' value='".$receipt['receipt_date']."'></td>";
                                                  $temp=true;
                                                  break;
                                                }else{
                                                  $temp=false;
                                                }
                                           }
                                           if(!$temp){
                                             echo  "<td><input type='text' size='5' name='water_receipt_no[".$result['id']."]' id='water_receipt_no'></td>".
                                                  "<td><input type='date' size='5' name='water_receipt_date[".$result['id']."]' id='water_receipt_date'></td>";
                                           }
                                           //"<td>".$result['garbage_fee']."</td>".
                                           echo "<td><input type='text' size='5' name='garbage_amount_paid[".$result['id']."]' id='garbage_amount_paid' value='".$result['garbage_balance']."'></td>";

                                           //RECEIPT NO AND DATE
                                            $temp=false;
                                           foreach($receipt_results as $receipt){
                                                if($receipt['id']==$result['id'] && $receipt['utility_type']==3){
                                                  //echo "itooooooo";
                                                 echo  "<td><input type='text' size='5' name='garbage_receipt_no[".$result['id']."]' id='garbage_receipt_no' value='".$receipt['receipt_no']."'></td>".
                                                  "<td><input type='date' size='5' name='garbage_receipt_date[".$result['id']."]' id='garbage_receipt_date' value='".$receipt['receipt_date']."'></td>";
                                                  $temp=true;
                                                  break;
                                                }else{
                                                  $temp=false;
                                                }
                                           }
                                           if(!$temp){
                                             echo  "<td><input type='text' size='5' name='garbage_receipt_no[".$result['id']."]' id='garbage_receipt_no'></td>".
                                                  "<td><input type='date' size='5' name='garbage_receipt_date[".$result['id']."]' id='garbage_receipt_date'></td>";
                                           }
                                           //"<td><input type='text' size='7' name='receipt_no[".$result['id']."]' id='receipt_no' value='".$result['receipt_number']."' /></td>".
                                  
                                           //"<td><input type='date' size='5' name='receipt_date[".$result['id']."]' id='receipt_date' value='".$result['receipt_date']."' /><input type='hidden' name='consumers[]' id='consumers' value=' ".$result['id']." ' /></td>".
                                          echo "<input type='hidden' name='consumers[]' id='consumers' value=' ".$result['id']." ' /></tr>";
                                           //$i=$i+1;
                                               // }
                                         

                                   }//end of foreach
                               ?>
                             </tbody>
                           </table>

                       </div><!--end of datatable div-->
                       <?php
                           echo "<button style='float:right;' data-toggle='tooltip' title='SAVE PAYMENT' type='submit' class='btn btn-warning'>UPDATE PAYMENT</button>";
                                //echo form_button($delete_button);
                       "</form></div>";
                      echo form_close();

                      if(isset($ok)){
                        echo "<span style='color:maroon;font-size:1.2em;background-color:gold'>The payments were successfully added to collection.</span>";
                      }
                  ?>
            


       </div>
     </div>
    </div>
 

<script>
  function fillElecReceiptDate(f) {
      console.log("called");
      if(f.elec_init_receipt_date_box.checked == true) {
        //console.log("init: "+f.init_receipt_date.value);
       
        for (i = 0; i < f.elec_receipt_date.length; i++) {
          f.elec_receipt_date[i].value = f.elec_init_receipt_date.value;
          // console.log("else: "+f.receipt_date[i]);
         }
      }
    }

    function fillWaterReceiptDate(f) {
      console.log("called");
     
      if(f.water_init_receipt_date_box.checked == true) {
        //console.log("init: "+f.init_receipt_date.value);
       
        for (i = 0; i < f.water_receipt_date.length; i++) {
          f.water_receipt_date[i].value = f.water_init_receipt_date.value;
          // console.log("else: "+f.receipt_date[i]);
         }
      }

    
    }

    function fillGarbageReceiptDate(f) {
      console.log("called");

      if(f.garbage_init_receipt_date_box.checked == true) {
        //console.log("init: "+f.init_receipt_date.value);
       
        for (i = 0; i < f.garbage_receipt_date.length; i++) {
          f.garbage_receipt_date[i].value = f.garbage_init_receipt_date.value;
          // console.log("else: "+f.receipt_date[i]);
         }
      }
    }

</script>

   <script src="../../devtools/js/collectionjs.js">

    </script>