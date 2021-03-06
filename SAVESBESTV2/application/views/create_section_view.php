 <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header lighten-blue">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index"><b>Plantastic Embryophytes</b></a>
      
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <div id="homenavbar" class="row pull-right">
        <div class="col-md-4">
        <?php
            echo "<a href='#'><b>User:  ".$username." </b></a>";
        ?>
       
        </div>
        <div class="col-md-4">
              <a class="btn btn-primary" href="logout" role="button">Logout</a>
        </div>
      
      </div>
      
    </div>
  </div>
    </nav>
   

<div class="jumbotron">
      <div class="container">
        
        <div class="row">
          <div class="panel panel-primary user-profile"  style="min-height:400px; width:60%;">
            <div class="panel-heading">
                <center><h4>CREATE SECTION</h4></center>
            </div>
            
            <div class="panel-body">
              <div class="row" id="reg">
                  <div class="reg_form">
                      <?php if(validation_errors()):?>
                                    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                    <?php endif;?>
                      <?php echo form_open('ManageSection/createSection'); ?>
                      <div class="col-md-4" style="text-align: right" form-group>   
                          <p>
                          <label for="sectionname">Section Name:</label>
                          </p>
                          <p>
                          <label for="sectioncode">Section Code:</label>
                          </p>
                          <p>
                          <label for="sectionmax">Maximum Number:</label>
                          </p>
                      </div>
                      <div class="col-md-4">
                          <p>
                          <input type="text" id="sectionname" name="sectionname" value="<?php echo set_value('sectionname'); ?>" class="form-control" placeholder="Enter Section Name" required/>
                          </p>
                          <p>
                          <input type="text" id="sectioncode" name="sectioncode" value="<?php echo set_value('sectioncode'); ?>" class="form-control" placeholder="Enter Section Code" required/>
                          </p>
                          <p>
                          <input type="text" id="sectionmax" name="sectionmax" value="<?php echo set_value('sectionmax'); ?>" class="form-control" placeholder="Enter Max Number" required/>
                          </p>
                          <input type="hidden" id="userid" name="userid" value=''/>
                          <p>
                          <input type="submit" class="btn btn-success btn-lg" value="Create Section" />
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