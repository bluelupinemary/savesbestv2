
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
    <a href="<?php echo site_url('home/viewStatementOfAccount')?>">
        <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Consumers</b>
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

        //echo "<br><br>-";
        //    print_r($receipt_results);
    ?>

<?php
    function getResult($results,$i){
            foreach($results as $result){
                if((int)$result['bill_month']==$i){
                     return $result;
                }
            }
            return null;
    }

     

    function getReceipt_elec($bill_id,$receipts){
          
          //echo "<br><br> BILL ID: ".$bill_id." ";
          //print_r($receipts);
          $temp = [];
          $c=count($receipts);
         // $i=1;
          foreach($receipts as $receipt){
          //  echo "<br>COUNT: ".$i." RECEIPT : ";
           // print_r($receipt);
            $c2 = count($receipt);
            for($j=0;$j<$c2;$j++){
             // print_r($receipt[$j]);
              if($receipt[$j]['bill_id']==$bill_id && $receipt[$j]['utility_type']==1){
              //    echo "trueee";
                //  return $receipt[$j];
                array_push($temp,$receipt[$j]);
              }
            }
            //$i++;
          }
          return $temp;
    }

    function getReceipt_water($bill_id,$receipts){
          
          //echo "<br><br> BILL ID: ".$bill_id." ";
          //print_r($receipts);
          $temp = [];
          $c=count($receipts);
         // $i=1;
          foreach($receipts as $receipt){
          //  echo "<br>COUNT: ".$i." RECEIPT : ";
           // print_r($receipt);
            $c2 = count($receipt);
            for($j=0;$j<$c2;$j++){
             // print_r($receipt[$j]);
              if($receipt[$j]['bill_id']==$bill_id && $receipt[$j]['utility_type']==2){
              //    echo "trueee";
                //  return $receipt[$j];
                array_push($temp,$receipt[$j]);
              }
            }
            //$i++;
          }
          return $temp;
    }
    function getReceipt_garbage($bill_id,$receipts){
          
          //echo "<br><br> BILL ID: ".$bill_id." ";
          //print_r($receipts);
          $temp = [];
          $c=count($receipts);
          $i=1;
          foreach($receipts as $receipt){
          //  echo "<br>COUNT: ".$i." RECEIPT : ";
           // print_r($receipt);
            $c2 = count($receipt);
            for($j=0;$j<$c2;$j++){
             // print_r($receipt[$j]);
              if($receipt[$j]['bill_id']==$bill_id  && $receipt[$j]['utility_type']==3){
              //    echo "trueee";
                  //return $receipt[$j];
                array_push($temp,$receipt[$j]);
              }
            }
            //$i++;
          }
          return $temp;
    }
     function showResultToTable($result,$i,$receipt_elec,$receipt_water,$receipt_garbage){
            $mon = getMonth($i);
           // echo "<br><br>";
            //print_r($result);
            // echo "<br><br> >>>>>>>> ";
            //print_r($receipt);
            echo "<td>".$i."-".$mon."</td>";
            echo "<td>".number_format($result['electricity_reading'],2)."</td>".
                  "<td>".number_format($result['electricity_amount_paid'],2)."</td>";
           $count = count($receipt_elec);
           //echo "COUNT: ".$count;
           if($count>0){
              //print_r($receipt_elec);
              
               foreach($receipt_elec as $util_receipt){
                  //RECEIPT NO AND DATE
                   $temp=false;
                   //print_r($receipts[$i]);
                   //foreach($receipts[$i] as $receipt){
                        if($util_receipt['utility_type']==1){
                          $newDate = date("m/d/y", strtotime($util_receipt['receipt_date']));
                         echo  "<td>".$util_receipt['receipt_no']." - ".$newDate."</td>";
                          //"<td>".$receipt['receipt_date']."</td>";
                          $temp=true;
                          break;
                        }else{
                          $temp=false;
                        }
                  // }
                   if(!$temp){
                     echo "<td></td>";
                   }
                }
            }else{
              echo  "<td></td>";
            }

            echo "<td>".number_format($result['water_reading'],2)."</td>";
            echo "<td>".number_format($result['water_amount_paid'],2)."</td>";
            //echo "COUNT: ".$count;
            $count = count($receipt_water);
            if($count>0){
                foreach($receipt_water as $util_receipt){
                  //RECEIPT NO AND DATE
                   $temp=false;
                   //print_r($receipts[$i]);
                   //foreach($receipts[$i] as $receipt){
                        if($util_receipt['utility_type']==2){
                       $newDate = date("m/d/y", strtotime($util_receipt['receipt_date']));
                         echo  "<td>".$util_receipt['receipt_no']." - ".$newDate."</td>";
                          //"<td>".$receipt['receipt_date']."</td>";
                          $temp=true;
                          break;
                        }else{
                          $temp=false;
                        }
                  // }
                   if(!$temp || $temp == "" || $temp==null){
                     echo  //"<td></td>".
                          "<td></td>";
                   }
                }
            }else{
              echo  "<td></td>";
            }
            echo "<td>".number_format($result['garbage_fee'],2)."</td>";
            echo "<td>".number_format($result['garbage_amount_paid'],2)."</td>";
            $count = count($receipt_garbage);
            if($count>0){
            foreach($receipt_garbage as $util_receipt){
                  //RECEIPT NO AND DATE
                   $temp=false;
                   //print_r($receipts[$i]);
                   //foreach($receipts[$i] as $receipt){
                        if($util_receipt['utility_type']==3){
                        $newDate = date("m/d/y", strtotime($util_receipt['receipt_date']));
                         echo  "<td>".$util_receipt['receipt_no']." - ".$newDate."</td>";
                          //"<td>".$receipt['receipt_date']."</td>";
                          $temp=true;
                          break;
                        }else{
                          $temp=false;
                        }
                  // }
                   if(!$temp){
                     echo  //"<td></td>".
                          "<td></td>";
                   }
                }
            }else{
              echo  "<td></td>";
            }
                                           
                                           // //"<td><input type='text' size='5' name='electricity_amount_paid[".$result['id']."]' id='electricity_amount_paid'></td>".
                                           // //"<td>".$result['water_reading']."</td>".
                                          
                                           // //RECEIPT NO AND DATE
                                           //  $temp=false;
                                           // foreach($receipts[$i] as $receipt){
                                           //       if($receipt['bill_id']==$result['bill_id'] && $receipt['utility_type']==2){
                                           //        //echo "itooooooo";
                                           //       echo  "<td>".$receipt['receipt_no']."</td>";
                                           //       // "<td>".$receipt['receipt_date']."</td>";
                                           //        $temp=true;
                                           //        break;
                                           //      }else{
                                           //        $temp=false;
                                           //      }
                                           // }
                                           // if(!$temp){
                                           //   echo  //"<td></td>".
                                           //        "<td></td>";
                                           // }
                                           // //"<td>".$result['garbage_fee']."</td>".
                                           

                                           // //RECEIPT NO AND DATE
                                           //  $temp=false;
                                           // foreach($receipts[$i] as $receipt){
                                           //       if($receipt['bill_id']==$result['bill_id'] && $receipt['utility_type']==3){
                                           //        //echo "itooooooo";
                                           //       echo  "<td>".$receipt['receipt_no']."</td>";
                                           //        //"<td>".$receipt['receipt_date']."</td>";
                                           //        $temp=true;
                                           //        break;
                                           //      }else{
                                           //        $temp=false;
                                           //      }
                                           // }
                                           // if(!$temp){
                                           //   echo  //"<td></td>".
                                           //        "<td></td>";
                                           // }
           // }
         // }
                                         
                  echo "<td>".$result['surcharge']."</td>";
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
            
         //   print_r($results);

                echo form_open('Consumer/createCollectionReportPDF');

                echo '<div style="font-size:0.8em;">';

                echo '<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%" >';
                echo '<thead>
                          <tr>
                               <th rowspan="2">Month/Period<br>'.$year.'</th><th colspan="3"><center>Electricity</th><th colspan="3"><center>Water</th>
                               <th colspan="3"><center>Garbage</th><th rowspan="2"><center>Surcharge</th>
                           </tr>
                           <tr>
                               <th><center>ACTUAL</th><th><center>PAYMENT</th><th><center>OR.No - Date</th>
                               <th><center>ACTUAL</th><th><center>PAYMENT</th><th><center>OR.No - Date</th>
                               <th><center>ACTUAL</th><th><center>PAYMENT</th><th><center>OR.No - Date</th>
                           </tr>
                         </thead>
                           <tbody>';

                                for($i=1;$i<=12;$i++){
                                  echo "<tr style='font-size:1.3em;text-align:right;'>";
                                  //if($i==1){
                                    //echo "i = "+$i;
                                    $result = getResult($results,$i);
                                    
                                    $count = count($result);
                                    //echo "REturnd: ";
                                    //print_r($receipt);
                                    if($count > 0){
                                        $bill_id=$result['bill_id'];
                                        $receipt_elec= getReceipt_elec($bill_id,$receipt_results);
                                        $receipt_water= getReceipt_water($bill_id,$receipt_results);
                                        $receipt_garbage= getReceipt_garbage($bill_id,$receipt_results);
                                       // print_r($receipt);
                                        showResultToTable($result,$i,$receipt_elec,$receipt_water,$receipt_garbage);
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
                        echo '<input type="hidden" name="consumer_id" id="consumer_id" value="'.$consumer_id.'"  />';
                        echo '<input type="hidden" name="year" id="year" value="'.$year.'"  />';
                           echo "<button style='float:right;' data-toggle='tooltip' title='PRINT SOA' type='submit' class='btn btn-warning'>DOWNLOAD SOA REPORT</button><br><br>";
                                //echo form_button($delete_button);
                       "</form></div>";
                      echo form_close();

                  
                    }//end of if()


                  ?>
            

    </div>

</body>
