<link rel="stylesheet" href="<?php echo base_url();?>devtools/css/style.css">
<!--EDIT CONSUMER ACCOUNT VIEW thru admin or officer account-->
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

 <!--START OF BACK TO DASHBARD ICON-->
    <br/><br/>
    <a href="<?php echo site_url('home/viewConsumersForYearBalance')?>">
      <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Consumers List</b>
    </a>
    <!--END OF BACK TO DASHBOARD ICON-->
    <div class="container">
       <div class="row">
            <?php              
               $data = array();
                   foreach($results as $result){
                       $data = array(
                          'id' => $result['id'],
                           'account_no' => $result['account_no'],
                           'fullname' => $result['fullname'],
                           'address' => $result['address'],
                           'consumer_type' => $result['consumer_type'],
                           'payment_type' => $result['payment_type'],
                           'is_coleasee' => $result['is_coleasee'],
                           'is_employee' => $result['is_employee']
                       );

                   }
               ?>
         <div class="panel panel-primary user-profile"  style="min-height:400px; width:60%;">
             <div class="panel-heading">
                <center><h4>ADD BALANCE TO CONSUMER</h4></center>
             </div>
             <div class="panel-body">
               <div class="row" id="reg">
                  <div class="reg_form">
                               <?php echo form_open('Consumer/insertYearBalanceToConsumer'); ?>
                               <div class="col-md-12" style="text-align: left" form-group>
                                    <p >
                                          <label for="accountNo">Account No: </label>  <?php echo $data['account_no'] ?>
                                    </p>
                                    <p >
                                          <label for="fullname">Fullname:</label>     <?php echo $data['fullname'] ?>
                                    </p>
                                    <p >
                                          <label for="address">Address:</label> <?php echo $data['address'] ?>
                                    </p>
                                    <p >
                                          <label for="consumerType">Consumer Type:</label> 
                                           <?php
                                          if ($data['consumer_type'] == 'RES') {
                                            echo 'RESIDENTIAL';
                                          }else if($data['consumer_type'] == 'COM'){
                                            echo 'COMMERCIAL';
                                          }else{
                                            echo 'INSTITUTE';
                                          }
                                        ?>  
                                    </p>
                                    <p>
                                          <label for="paymentType">Payment Type:</label>
                                          <?php
                                          if ($data['payment_type'] == 'AUTO') {
                                            echo 'SALARY DEDUCTION';
                                          }else{
                                            echo 'CASH BASIS';
                                          }
                                        ?>  
                                    </p>
                                    <p>
                                          <label for="employeeNo">Employee No:</label>
                                          <?php
                                          if($data['is_employee']==1){
                                            echo $employeeNo;
                                          }else{
                                            echo 'N/A';
                                          }
                                      ?>
                                    </p>
                                    <p >
                                          <label for="isColeasee">Coleasee? </label>
                                           <?php
                                          if ($data['is_coleasee'] == 1) {
                                            echo "YES";
                                          }else{
                                             echo "NO";
                                          }
                                        ?>  
                                    </p>
                                    <p >
                                          <label for="multiplier">Multiplier (if any):</label> TO FOLLOW
                                    </p>
                                    <p >
                                          <label for="pipeSize">Pipe Size:</label> TO FOLLOW
                                    </p>
                                    <p>
                                       <label for="elec_balance">Electric Balance:</label>
                                             <?php 
                                            echo '<input type="text" required placeholder="Enter balance here" id="elec_balance" size="15" name="elec_balance" onkeyup="this.value=this.value.replace(/[^0-9.-]/,\'\')" value=""/>';
                                            //echo '<span class="input-group-addon">-</span>';
                                            ?>
                                            <br/>
                                      <label for="water_balance">Water Balance:</label>
                                            <?php
                                            echo '<input type="text" required placeholder="Enter balance here" id="water_balance" size="15" name="water_balance" onkeyup="this.value=this.value.replace(/[^0-9.-]/,\'\')" value=""/>';

                                      ?>
                                      <br/>
                                      <label for="garbage_balance">Garbage Balance:</label>
                                            <?php
                                            echo '<input type="text" required placeholder="Enter balance here" id="garbage_balance" size="15" name="garbage_balance" onkeyup="this.value=this.value.replace(/[^0-9.-]/,\'\')" value=""/>';
                                            ?>
                                      <br/>
                                      <label for="year_balance">Year Balance:</label>
                                            <?php
                                            echo '<select name="year_balance" id="year_balance">';
                                             for($i = 2016 ; $i < date('Y'); $i++){
                                                echo "<option>".$i."</option>";
                                             }
                                            echo "</select>";
                                          ?>
                                        
                                    </p>
                                      <input type="hidden" id="consumer_id" name="consumer_id" value="<?php echo $data['id'] ?>"/>
                                      <input type="hidden" id="account_no" name="account_no" value="<?php echo $data['account_no'] ?>"/>
                                    <p><br>
                                      <center>
                                     <input type="submit" class="btn btn-success btn-lg" value="Add Balance" />
                                   </center>
                                     </p>
                                    
                               </div>
                              
                                </form></div>
                                <?php echo form_close(); ?>



             </div>
           </div>

   </div>
 </div>
</div>



