<link rel="stylesheet" href="<?php echo base_url();?>devtools/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>devtools/css/reading_popupcss.css">

<!--IMPORT readings.txt file TO THE SYSTEM-->
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
    <!--START OF BACK TO DASHBARD ICON-->
    <br/><br/>
    <a href="<?php echo site_url('home')?>">
      <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Dashboard</b>
    </a>
    <!--END OF BACK TO DASHBOARD ICON-->
</div>

<div style="margin-left:5%;" class="container">
      <br/><br/>
      <p>This page will allow you to import consumers' bills given the chosen file.</p>
      <br/>
      <?php
        if(!$ok){
          echo '<h4>Please click <i><span style="color:maroon;">CHOOSE FILE</span></i> button first and then <i><span style="color:maroon;">IMPORT BILLS</span></i> button.</h4>';
        }
        ?>
      
      <b><?php if(isset($response)){
                  echo '<pre>'.$response.'</pre>';
                }
          ?>
      </b>
    <div>
      <?php 
        if(!$ok){
            echo form_open_multipart('Consumer/do_upload');
            echo "<input class='btn btn-default' type='file' name='userfile' size='20' /><br/>";
            echo "<input class='btn btn-success' type='submit' name='submit' value='Import Bills' />";
        }
      ?>
      </form>
      <?php
        if($ok){
            echo form_open('Consumer/showImportedBillings');
            //echo "<input type='hidden' name='reading_id' id='reading_id' value='".$result['id']."' />";
            echo '<button class="btn btn-warning" type="submit">Show Imported Bills</a>';
                                //echo form_button($delete_button)
        }
     ?>
      </form>
    </div>
    
</div><!--form-->

