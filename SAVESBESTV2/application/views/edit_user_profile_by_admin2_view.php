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
			<a class="navbar-brand" href="logout"><b>Plantastic Embryophytes</b></a>
			
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div id="homenavbar" class="row pull-right">
                
				<div class="col-md-4">
                    <?php
                    /*foreach($results as $result){
                        echo "<a href=''> User: ".$result['username']."</a>";*/
                    echo "<a href='#'><b>User: ".$data."</b></a>";

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
                            <center><h4>EDIT PROFILE</h4></center>
				  		</div>
				  		<div class="panel-body">
				  			<div class="row" id="reg">
                                <div class="reg_form">
                                  <?php if(validation_errors()):?>
                                    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                    <?php endif;?>
                                <?php echo form_open('EditUserProfile/updateUserByAdminCheckFields'); ?>
                                <div class="col-md-4" style="text-align: right">   
                                    <p>
                                          <label for="firstname">First Name:</label>
                                    </p>
                                    <p>
                                          <label for="middlename">Middle Name:</label>
                                    </p>
                                    <p>
                                          <label for="lastname">Last Name:</label>
                                    </p>
                                     <?php 
                                        if($empid!=""){   //if teacher
                                            echo "<p><label for 'usertype'>Employee Id:</label></p>";
                                        }else{  //student or admin
                                            
                                        }
                                    ?>
                                    <p>
                                          <label for="address">Address:</label>
                                    </p>
                                    <p>
                                          <label for="mobile_number">Mobile No:</label>
                                    </p>
                                    <p>
                                          <label for="email_address">Email Address:</label>
                                    </p>
                                    <p>
                                          <label for="password">Password:</label>
                                    </p>
                                    <p>
                                          <label for="con_password">Confirm Password:</label>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        <input type="text" id="firstname" name="firstname" value="<?php echo set_value('firstname'); ?>" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="text" id="middlename" name="middlename" value="<?php echo set_value('middlename'); ?>" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="text" id="lastname" name="lastname" value="<?php echo set_value('lastname'); ?>" class="form-control"/>
                                    </p>
                                    <?php 
                                        if($empid!=""){   //if teacher
                                            echo "<p><input type='text' id='empid' name='empid' 
                                                value='".$empid."'"." ' class='form-control'/>"."</p>";
                                        }else{
                                            
                                        }
                                    ?>
                                    <p>
                                        <input type="text" id="address" name="address" value="<?php echo set_value('address'); ?> " class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="text" id="mobile_number" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="password" id="password" name="password" value="" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="password" id="con_password" name="con_password" value="" class="form-control"/>
                                    </p>
                                    <input type="hidden" name="userid" id="userid" value="<?php echo set_value('userid'); ?>" />
                                    <input type="hidden" name="usertype" id="usertype" value="2" /> <!--by default teacher kasi di naman editable yung studentid-->

                                      <p>
                                      <input type="submit" class="greenButton" value="Update Account" />
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