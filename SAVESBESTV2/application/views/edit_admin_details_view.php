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
            echo $id." ".$name." ".$designation;
              
               ?>
         <div class="panel panel-primary user-profile"  style="min-height:400px; width:60%;">
             <div class="panel-heading">
                <center><h4>EDIT CONSUMER PROFILE</h4></center>
             </div>
             <div class="panel-body">
               <div class="row" id="reg">
                             <div class="reg_form">
                               <?php echo form_open('Home/updateAdminDetails'); ?>
                               <div class="col-md-4" style="text-align: right" form-group>
                                 <p style="padding-top:4%;">
                                          <label for="consumerID">ID:</label>
                                    </p>
                                  
                                    <p style="padding-top:4%;">
                                          <label for="fullname">Fullname:</label>
                                    </p>
                                    <p style="padding-top:4%;">
                                          <label for="address">Designation:</label>
                                    </p>
                                  
                               </div>
                               <div class="col-md-4" style="margin-top:-2%;">
                                <p>
                                        <input type="text" id="id" name="id" value="<?php echo $id ?>" class="form-control" disabled="true"/>
                                    </p>
                                    <p>
                                        <input type="text" id="name" name="name" value="<?php echo $name ?>" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="text" id="designation" name="designation" value="<?php echo $designation ?>" class="form-control"/>
                                    </p>
                                    <input type="hidden" id="admin_id" name="admin_id" value="<?php echo $id ?>" class="form-control"/>
                                      <input type="submit" class="btn btn-success btn-lg" value="Update Admin Info" />

                                       </form> </div>
                                    </p>
                                    <p>
                                     
                                  
                                     <p><br>
                                    
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
