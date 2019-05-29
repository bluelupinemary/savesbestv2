
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
     <br/>


    <div style="margin-left:5%;">
      <h4 style="color:darkgreen;"><b>Edit Consumer Payment / Add Surcharge Page</b></h4>
      <p>This page will allow you to EDIT a consumers' collection/payment entry given the ACCOUNT NO. and BILL month and year.</p>
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
        <label for="month"><span style='color:maroon;'>BILL Month:</span></label>
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
          <label for="year"><span style='color:maroon;'>BILL Year:</span></label>
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

                echo '<div style="font-size:0.7em;">';
               // print_r($receipt_results);
                echo '<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >';
                echo '<thead>
                           <tr">
                              
                               <th>Bill<br>ID</th><th>Name</th><th>Address</th><th>Con.Type</th>
                               <th>Bill<br>Month</th><th>Bill<br>Year</th><th>Electricity<br>Payment</th><th>Elec<br>OR No</th><th>Elec<br>OR Date</th>
                               <th>Water<br>Payment</th><th>Wtr<br>OR No</th><th>Wtr<br>OR Date</th><th>Garbage<br>Payment</th><th>Gbg<br>OR No</th><th>Gbg<br>OR Date</th><th>Surcharge</th>

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


                                //print_r($receipt_results);
                                 // $consumer_array = array();
                                  echo "<tr style='font-size:1.3em;'>".

                                           "<td>".$result['id']."</td>".
                                           "<td>".$result['fullname']."</td>".
                                           "<td>".$result['address']."</td>".
                                           "<td>".$result['consumer_type']."</td>".
                                           "<td>".$month."</td>".
                                           "<td>".$result['bill_year']."</td>".
                                           "<td><input type='text' size='7' name='electricity_amount_paid' id='electricity_amount_paid' value='".$result['electricity_amount_paid']."'  onchange='changeElecBal(this.value)' onfocus='focusElecBal()'/></td>";
                                          //RECEIPT NO AND DATE
                                           $temp=false;
                                           foreach($receipt_results as $receipt){
                                                if($receipt['utility_type']==1){
                                                  //echo "itooooooo";
                                                 echo  "<td><input type='text' size='5' name='elec_receipt_no' id='elec_receipt_no' value='".$receipt['receipt_no']."'></td>".
                                                  "<td><input type='date' size='5' name='elec_receipt_date' id='elec_receipt_date' value='".$receipt['receipt_date']."'></td>";
                                                  $temp=true;
                                                  break;
                                                }else{
                                                  $temp=false;
                                                }
                                           }
                                           if(!$temp){
                                             echo  "<td><input type='text' size='5' name='elec_receipt_no' id='elec_receipt_no'></td>".
                                                  "<td><input type='date' size='5' name='elec_receipt_date' id='elec_receipt_date'></td>";
                                           }
                                           
                                           //"<td><input type='text' size='5' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid'></td>".
                                           //"<td>".$result['water_reading']."</td>".
                                           echo "<td><input type='text' size='7' name='water_amount_paid' id='water_amount_paid' value='".$result['water_amount_paid']."' onchange='changeWaterBal(this.value)' onfocus='focusWaterBal()'></td>";
                                           //RECEIPT NO AND DATE
                                            $temp=false;
                                           foreach($receipt_results as $receipt){
                                                if($receipt['utility_type']==2){
                                                  //echo "itooooooo";
                                                 echo  "<td><input type='text' size='5' name='water_receipt_no' id='water_receipt_no' value='".$receipt['receipt_no']."'></td>".
                                                  "<td><input type='date' size='5' name='water_receipt_date' id='water_receipt_date' value='".$receipt['receipt_date']."'></td>";
                                                  $temp=true;
                                                  break;
                                                }else{
                                                  $temp=false;
                                                }
                                           }
                                           if(!$temp){
                                             echo  "<td><input type='text' size='5' name='water_receipt_no' id='water_receipt_no'></td>".
                                                  "<td><input type='date' size='5' name='water_receipt_date' id='water_receipt_date'></td>";
                                           }
                                           //"<td>".$result['garbage_fee']."</td>".
                                           echo "<td><input type='text' size='5' name='garbage_amount_paid' id='garbage_amount_paid' value='".$result['garbage_amount_paid']."' onchange='changeGarbageBal(this.value)' onfocus='focusGarbageBal()'></td>";

                                           //RECEIPT NO AND DATE
                                            $temp=false;
                                           foreach($receipt_results as $receipt){
                                                if($receipt['utility_type']==3){
                                                  //echo "itooooooo";
                                                 echo  "<td><input type='text' size='5' name='garbage_receipt_no' id='garbage_receipt_no' value='".$receipt['receipt_no']."'></td>".
                                                  "<td><input type='date' size='5' name='garbage_receipt_date' id='garbage_receipt_date' value='".$receipt['receipt_date']."'></td>";
                                                  $temp=true;
                                                  break;
                                                }else{
                                                  $temp=false;
                                                }
                                           }
                                           if(!$temp){
                                             echo  "<td><input type='text' size='5' name='garbage_receipt_no' id='garbage_receipt_no'></td>".
                                                  "<td><input type='date' size='5' name='garbage_receipt_date' id='garbage_receipt_date'></td>";
                                           }

                                           echo "<td><input type='text' size='4' name='surcharge' id='surcharge' value='".$result['surcharge']."'></td>".













                                           // "<td><input type='text' size='7' name='electricity_amount_paid' id='electricity_amount_paid' value='".$result['electricity_amount_paid']."'></td>".
                                           // //"<td><input type='text' size='5' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid'></td>".
                                           // //"<td>".$result['water_reading']."</td>".
                                           // "<td><input type='text' size='7' name='water_amount_paid' id='water_amount_paid' value='".$result['water_amount_paid']."'></td>".
                                           // //"<td>".$result['garbage_fee']."</td>".
                                           // "<td><input type='text' size='4' name='garbage_amount_paid' id='garbage_amount_paid' value='".$result['garbage_amount_paid']."'></td>".

                                           // "<td><input type='text' size='4' name='surcharge' id='surcharge' value='".$result['surcharge']."'></td>".

                                           // "<td><input type='text' size='4' name='receipt_no' id='receipt_no' value='".$result['receipt_number']."'></td>".
                                  
                                           "<input type='hidden' name='bill_id' id='bill_id' value=' ".$result['id']." ' />".
                                            "</tr>";
                                           //$i=$i+1;
                                         

                                   }//end of foreach
                       echo '</tbody>
                           </table>



                       </div>';
                     
                       echo "<span style='margin-left:2%;color:maroon;'>ELECTRIC BALANCE: </span><input type='text' size='7' name='electric_balance' id='electric_balance' value='".$elec_bal."'>";
                        echo "<span style='margin-left:2%;color:maroon;'>WATER BALANCE:</span><input type='text' size='7' name='water_balance' id='water_balance' value='".$water_bal."'>";
                         echo "<span style='margin-left:2%;color:maroon;'>GARBAGE BALANCE:</span> <input type='text' size='7' name='garbage_balance' id='garbage_balance' value='".$garbage_bal."'>";

                       
                        echo "<input type='hidden' size='7' name='consumer_id' id='consumer_id' value='".$consumer_id."'>";
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
                          echo "<p><br><span style='color:maroon;font-size:1.3em;background-color:gold;'> The consumer's payment was successfully updated.</span></p>";
                        }
                    }//end of if()


                  ?>
            

    </div>

</body>

<script>
var old_elec_amt;
var old_elec_bal;
var mod_elec_amt;

var old_water_amt;
var old_water_bal;
var mod_water_amt;

var old_garbage_amt;
var old_garbage_bal;
var mod_garbage_amt;

var i=0;
var j=0
var k=0;

function focusElecBal() {
  if(i==0){
    old_elec_amt = document.getElementById("electricity_amount_paid").value;
    old_elec_bal = document.getElementById("electric_balance").value;
     i++;
  }
  mod_elec_amt = document.getElementById("electricity_amount_paid").value;
}

function changeElecBal(newElecVal){
  var elec_bal = document.getElementById("electric_balance").value;
  
  if(elec_bal < 0){	//if underpayment (negative balance)
	  var diff = parseFloat(mod_elec_amt).toFixed(2) - parseFloat(newElecVal).toFixed(2);
	  elec_bal = parseFloat(elec_bal) - parseFloat(diff.toFixed(2));
	  //console.log("diff: "+diff+" elec bal: "+elec_bal);
  }else{		//else if overpayment (positive balance)
	var diff = parseFloat(mod_elec_amt).toFixed(2) - parseFloat(newElecVal).toFixed(2);
	  elec_bal = parseFloat(elec_bal) - parseFloat(diff.toFixed(2));
	  //console.log("2 diff: "+diff+" elec bal: "+elec_bal);
  }
  document.getElementById('electric_balance').value = elec_bal.toFixed(2);
}

function focusWaterBal() {
  if(j==0){
    old_water_amt = document.getElementById("water_amount_paid").value;
    old_water_bal = document.getElementById("water_balance").value;
     j++;
  }
  mod_water_amt = document.getElementById("water_amount_paid").value;
}

function changeWaterBal(newWaterVal){
  var water_bal = document.getElementById("water_balance").value;

 if(water_bal < 0){	//if underpayment (negative balance)
	  var diff = parseFloat(mod_water_amt).toFixed(2) - parseFloat(newWaterVal).toFixed(2);
	  water_bal = parseFloat(water_bal) - parseFloat(diff.toFixed(2));
	  //console.log("diff: "+diff+" elec bal: "+elec_bal);
  }else{		//else if overpayment (positive balance)
	 var diff = parseFloat(mod_water_amt).toFixed(2) - parseFloat(newWaterVal).toFixed(2);
  	water_bal = parseFloat(water_bal) - parseFloat(diff.toFixed(2));
  }
  
  document.getElementById('water_balance').value = water_bal.toFixed(2);
}


function focusGarbageBal() {
  if(k==0){
    old_garbage_amt = document.getElementById("garbage_amount_paid").value;
    old_garbage_bal = document.getElementById("garbage_balance").value;
     k++;
  }
  mod_garbage_amt = document.getElementById("garbage_amount_paid").value;
}

function changeGarbageBal(newGarbageVal){
  var garbage_bal = document.getElementById("garbage_balance").value;
  if(garbage_bal < 0){	//if underpayment (negative balance)
	  var diff = parseFloat(mod_garbage_amt).toFixed(2) - parseFloat(newGarbageVal).toFixed(2);
  	  garbage_bal = parseFloat(garbage_bal) - parseFloat(diff.toFixed(2));
	  //console.log("diff: "+diff+" elec bal: "+elec_bal);
  }else{		//else if overpayment (positive balance)
	 var diff = parseFloat(mod_garbage_amt).toFixed(2) - parseFloat(newGarbageVal).toFixed(2);
  	  garbage_bal = parseFloat(garbage_bal) - parseFloat(diff.toFixed(2));
  }
 
  document.getElementById('garbage_balance').value = garbage_bal.toFixed(2);
}


</script>
