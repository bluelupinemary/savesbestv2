
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

      <br/><br/>
      

      <!--START OF BACK TO DASHBARD ICON-->
    <a href="<?php echo site_url('home')?>">
        <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Dashboard</b>
      </a>
     <br/><br/>


    <div class= "container" style="margin-left:5%;">
       <h4 style="color:darkgreen;"><b>Create Yearly Collection Report Page</b></h4>
      <p>This page will allow you to create yearly collection report (pdf) given the year.</p>
      <h4>Please enter the COLLECTION YEAR to view the report: </h4>
      <br/>
    </div>
    <div class="reg_form">
        <?php echo form_open('Consumer/findCollectionsByYear'); ?>
        
        <div class="col-md-4 form-group" style="padding-left:15%;padding-right:5%;">
        
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


    <div>
        <?php
           if(isset($ok)){
           // echo "<br><br>OK: ".$ok;
            //print_r($results);

             
              
             echo form_open('Consumer/createYearlyCollectionReportPDF');

              echo ' <div style="font-size:1.2em; padding-left:10%;padding-right:10%;">
                       <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                         <thead>
                           <tr>


                               <th style="text-align:center;" >Collection Per Month <br> for Year '.$report_year.'</th>
                               <th style="text-align:center;"  >Electricity Amount <br> Collected</th>
                               <th style="text-align:center;"  >Water Amount <br> Collected</th>
                               <th style="text-align:center;"  >Garbage Amount <br> Collected</th>
                               <th style="text-align:center;"  >Monthly Total <br> Collected</th>
                               

                           </tr>
                         </thead>
                           <tbody>';
                                $electricityTotalPerYear = 0;
                                $waterTotalPerYear = 0;
                                $garbageTotalPerYear = 0;
                                $month='';
                              

                              // echo "ITOOOOO".$c;
                               // echo "<br> <br> elec >> ";
                               // print_r($results_elec);
                               // echo "<br> <br> water >> ";

                               // print_r($results_water);
                               // echo "<br> <br> garbage >> ";
                               // print_r($results_garbage);
                             
                                
                                for($i=1;$i<=12;$i++){
                                  if($i==1){
                                      $month="January";
                                  }else if($i==2){
                                      $month="February";
                                  }else if($i==3){
                                      $month="March";   
                                  }else if($i==4){
                                      $month="April";
                                  }else if($i==5){
                                      $month="May";
                                  }else if($i==6){
                                      $month="June";
                                  }else if($i==7){
                                      $month="July";
                                  }else if($i==8){
                                      $month="August";
                                  }else if($i==9){
                                      $month="September";
                                  }else if($i==10){
                                      $month="October";
                                  }else if($i==11){
                                      $month="November";
                                  }else if($i==12){
                                      $month="December";
                                  }
                                
                                  $temp_elec = getMonthlyAmount($results_elec,$i);
                                  $temp_water = getMonthlyAmount($results_water,$i);
                                  $temp_garbage = getMonthlyAmount($results_garbage,$i);
                               
                                


                                $totalElecPerMonth = number_format($temp_elec,2);
                                $totalWaterPerMonth = number_format($temp_water,2);
                                $totalGarbagePerMonth = number_format($temp_garbage,2);

                               
                                $electricityTotalPerYear = floatval($electricityTotalPerYear) + $temp_elec;
                               
                                //$electricityTotalPerYear = number_format($electricityTotalPerYear,2);
                                $waterTotalPerYear = floatval($waterTotalPerYear) + $temp_water;
                                $garbageTotalPerYear = floatval($garbageTotalPerYear) + $temp_garbage;
                                $totalCollectionPerMonth = $temp_elec + $temp_water + $temp_garbage;
                                 // $consumer_array = array();
                                  echo "<tr style='text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>".

                                           "<td style='text-align:center;''>".$month."</td>".
                                           "<td>".$totalElecPerMonth."</td>".
                                           "<td>".$totalWaterPerMonth."</td>".
                                           "<td>".$totalGarbagePerMonth."</td>".
                                           "<td>".number_format($totalCollectionPerMonth,2)."</td>".
                                          

                                            "</tr>";
                                           //$i=$i+1;
                                         

                                   }//end of foreach
                             echo "<tr style='text-align:right;font-family: Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace;'>
                                    <td style='text-align:right;font-weight:bold;'> TOTAL: </td>
                                    <td style='text-align:right;font-weight:bold;'>".number_format($electricityTotalPerYear,2)."</td>
                                    <td style='text-align:right;font-weight:bold;'>".number_format($waterTotalPerYear,2)."</td>
                                    <td style='text-align:right;font-weight:bold;'>".number_format($garbageTotalPerYear,2)."</td>
                                     <td style='text-align:right;font-weight:bold;'>".number_format(($electricityTotalPerYear + $waterTotalPerYear + $garbageTotalPerYear),2)."</td>
                                    
                                  </tr>" ;
                                     
                            
                             echo "</tbody>";
                             echo " </table>";

                          echo "</div><!--end of datatable div-->";
                         
                           echo "<button style='float:right;' data-toggle='tooltip' title='SAVE PAYMENT' type='submit' class='btn btn-warning'>PRINT REPORT</button>";
                           echo "<br><br>";
                           echo '<input type="hidden" id="year" name="year" value="'.$report_year.'"/>';
                       
                          
                       "</form></div>";
                      echo form_close();
                    }
                  ?>



                  <?php
           
                  ?>
            
            

    </div>

</body>

  <script src="../../devtools/js/collectionjs.js">

     </script>

<?php


function getMonthlyAmount($results,$month){
  if($results!=NULL or $results!=''){
      foreach($results as $result){
          if($result['receipt_month']==$month){
              return $result['total'];
          }
      }
      return 0;
  }
  return 0;


}

?>