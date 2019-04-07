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


 <div>
    <!--START OF BACK TO DASHBARD ICON-->
    <br/><br/>
    <a href="<?php echo site_url('home')?>">
      <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Dashboard</b>
    </a>
    <!--END OF BACK TO DASHBOARD ICON-->
    <!--START OF ADD CONSUMER PANEL-->
    <div class="row">
        <div class="panel panel-primary user-profile" style="min-height:400px;width:60%;">
				      <div class="menu-head panel-heading">
                  <center><h4>ADD CONSUMER</h4></center>
				  		</div>
				  		<div class="panel-body">
				  			       <div class="row" id="reg">
                            <div class="reg_form">
                                 <?php if(validation_errors()):?>
                                      <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                                  <?php endif;?>
                                <?php echo form_open('Consumer/addConsumer'); ?>
                                <div class="col-md-4 form-group" style="text-align: right;">
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
                                    <p style="padding-top:4%;">
                                          <label for="paymentType">Payment Type:</label>
                                    </p>
                                    <p style="padding-top:4%;">
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
                                <div class="col-md-4 form-group">
                                    <p>
                                        <input type="text" id="consumerID" name="consumerID" value="<?php echo set_value('consumerID'); ?>" class="form-control" placeholder="Enter Consumer ID" required/>
                                    </p>
                                    <p>
                                        <input type="text" id="accountNo" name="accountNo" value="<?php echo set_value('accountNo'); ?>" class="form-control" placeholder="Enter Account No" required/>
                                    </p>
                                    <p>
                                        <input type="text" id="fullname" name="fullname" value="<?php echo set_value('fullname'); ?>" class="form-control" placeholder="Enter Fullname" required/>
                                    </p>
                                    <p>
                                        <input type="text" id="address" name="address" value="<?php echo set_value('address'); ?>" class="form-control" placeholder="Enter address" required/>
                                    </p>
                                    <p>
                                        <div class="form-group">
                                          <select class="form-control" id="consumerType" name="consumerType" value="<?php echo set_value('consumerType'); ?>">
                                            <option value="RES">Residential</option>
                                            <option value="COM">Commercial</option>
                                            <option value="INS">Institute</option>
                                          </select>
                                        </div>
                                    </p>
                                    <p>
                                      <div class="form-group">
                                        <select class="form-control" id="paymentType" name="paymentType" value="<?php echo set_value('paymentType'); ?>">
                                          <option value="AUTO">Salary Deduction</option>
                                          <option value="CASH">Cash Basis</option>
                                        </select>
                                      </div>
                                    </p>
                                    <p>
                                        <input type="text" id="employeeNo" name="employeeNo" value="<?php echo set_value('employeeNo'); ?>" class="form-control" placeholder="Enter Employee No"/>
                                    </p>
                                    <p>
                                        <input type="radio" id="isColeasee" name="isColeasee" value="1" required/>Yes
                                        <input type="radio" id="isColeasee" name="isColeasee" value="<?php echo set_value(0); ?>" required/>No
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
                                    </div>
                                      <p>
                                      <input type="submit"  class="btn btn-success btn-lg" value="Add Consumer" />
                                      </p>
                                    </div>
                                </form>
                                </div><!--div regform-->
                            </div><!--<div id="content">-->


				  		</div>
			  		</div>
        </div>
    </div>
