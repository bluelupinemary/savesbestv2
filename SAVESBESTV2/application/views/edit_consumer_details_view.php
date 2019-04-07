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


<div>
    <!--START OF BACK TO DASHBARD ICON-->
    <br/><br/>
    <a href="<?php echo site_url('home/editConsumer')?>">
      <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Edit Consumers</b>
    </a>
    <!--END OF BACK TO DASHBOARD ICON-->
    <div class="container">
       <div class="row">
            <?php              
               $data = array();
                   foreach($results as $result){
                       //echo $result['id'], $result['account_no'], $result['fullname'],
                    //$result['address'], $result['consumer_type'], $result['payment_type'], 
                    //$result['is_active'],$result['is_coleasee'], $result['is_employee'], 
                    //$result['has_bond_deposit'],$result['date_added'],$result['date_updated'];
                    
                    //print_r($result['is_coleasee']);
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
                <center><h4>EDIT CONSUMER PROFILE</h4></center>
             </div>
             <div class="panel-body">
               <div class="row" id="reg">
                             <div class="reg_form">
                              <?php if(validation_errors()):?>
                                   <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                   <?php endif;?>
                               <?php echo form_open('Consumer/validateConsumerUpdate'); ?>
                               <div class="col-md-4" style="text-align: right" form-group>
                                 <p style="padding-top:4%;">
                                          <label for="consumerID">Consumer ID:</label>
                                    </p>
                                  <p style="padding-top:4%;">
                                          <label for="accountNo">Account No:</label>
                                    </p>
                                    <p style="padding-top:4%;">
                                          <label for="fullname">Fullname:</label>
                                    </p>
                                    <p style="padding-top:4%;">
                                          <label for="address">Address:</label>
                                    </p>
                                    <p style="padding-top:4%;">
                                          <label for="consumerType">Consumer Type:</label>
                                    </p>
                                    <p style="padding-top:7%;">
                                          <label for="paymentType">Payment Type:</label>
                                    </p>
                                    <p style="padding-top:7%;">
                                          <label for="employeeNo">Employee No:</label>
                                    </p>
                                    <p style="padding-top:4%;">
                                          <label for="isColeasee">Coleasee? </label>
                                    </p>
                                    <p style="padding-top:4%;">
                                          <label for="multiplier">Multiplier (if any):</label>
                                    </p>
                                    <p style="padding-top:4%;">
                                          <label for="pipeSize">Pipe Size:</label>
                                    </p>
                               </div>
                               <div class="col-md-4" style="margin-top:-2%;">
                                <p>
                                        <input type="text" id="consumerID" name="consumerID" value="<?php echo $data['id'] ?>" class="form-control" disabled="true"/>
                                    </p>
                                    <p>
                                        <input type="text" id="accountNo" name="accountNo" value="<?php echo $data['account_no'] ?>" class="form-control" disabled="true"/>
                                    </p>
                                    <p>
                                        <input type="text" id="fullname" name="fullname" value="<?php echo $data['fullname'] ?>" class="form-control"/>
                                    </p>
                        
                                    <p>
                                        <input type="text" id="address" name="address" value="<?php echo $data['address'] ?>" class="form-control" placeholder="Enter Account No" required/>
                                    </p>
                                    <p>
                                        <div class="form-group">
                                          <select class="form-control" id="consumerType" name="consumerType" value="<?php echo $data['consumer_type'] ?>">
                                            <?php
                                          if ($data['consumer_type'] == 'RES') {
                                            echo '<option selected="selected" value="RES">Residential</option>';
                                            echo '<option value="COM">Commercial</option>';
                                            echo '<option value="INS">Institute</option>';
                                            # code...
                                          }else if($data['consumer_type'] == 'COM'){
                                            echo '<option value="RES">Residential</option>';
                                            echo '<option selected="selected" value="COM">Commercial</option>';
                                            echo '<option value="INS">Institute</option>';
                                          }else{
                                            echo '<option value="RES">Residential</option>';
                                            echo '<option value="COM">Commercial</option>';
                                            echo '<option  selected="selected" value="INS">Institute</option>';
                                          }
                                        ?>  
                                          </select>
                                        </div>
                                    </p>
                                    <p>
                                      <div class="form-group">
                                        <select class="form-control" id="paymentType" name="paymentType" value="<?php echo $data['payment_type'] ?>">
                                        <?php
                                          if ($data['payment_type'] == 'AUTO') {
                                            echo '<option selected="selected" value="AUTO">Salary Deduction</option>';
                                            echo '<option value="CASH">Cash Basis</option>';
                                            # code...
                                          }else{
                                            echo '<option value="AUTO">Salary Deduction</option>';
                                            echo '<option selected="selected" value="CASH">Cash Basis</option>';
                                          }
                                        ?>  
                                          
                                          
                                        </select>
                                      </div>
                                    </p>
                                    <p>
                                      <?php
                                          if($data['is_employee']==1){
                                              echo '<input type="text" id="employeeNo" name="employeeNo" value="'.$employeeNo.'" class="form-control"/>';
                                          }else{
                                            echo '<input type="text" id="employeeNo" name="employeeNo" value="" class="form-control"/>';
                                          }
                                      ?>
                                        
                                    </p>
                                    <p>
                                      <?php
                                          if ($data['is_coleasee'] == 1) {
                                            echo '<input checked="checked" type="radio" id="isColeasee" name="isColeasee" value="1" required/>Yes';
                                            echo '<input type="radio" id="isColeasee" name="isColeasee" value="0" required/>No';
                                          }else{
                                            echo '<input type="radio" id="isColeasee" name="isColeasee" value="1" required/>Yes';
                                            echo '<input checked="checked" type="radio" id="isColeasee" name="isColeasee" value="0" required/>No';
                                          }
                                        ?>  
                                    </p>
                                    <p>
                                        <input type="text" id="multiplier" name="multiplier" value="<?php echo set_value('multiplier'); ?>" class="form-control" placeholder="Enter Multiplier (if any)"/>
                                    </p>
                                    <div class="form-group">
                                      <select class="form-control" id="pipeSize" name="pipeSize" value="<?php echo set_value('pipeSize'); ?>">
                                        <option value="one-half">1/2</option>
                                        <option value="three-fourth">3/4</option>
                                        <option value="one">1</option>
                                      </select>
                                  <input type="hidden" id="accountNo" name="accountNo" value="<?php echo $data['account_no'] ?>"/>
                                   <input type="hidden" name="consumer_id" id="consumer_id" value="<?php echo $data['id'] ?>" />
                                     <p><br>
                                     <input type="submit" class="btn btn-success btn-lg" value="Update Consumer" />
                                     </p>
                               </div>
                               </form>

                               
                               </div><!--div regform-->
                           </div><!--<div id="content">-->


             </div>
           </div>

   </div>
 </div>
</div>
