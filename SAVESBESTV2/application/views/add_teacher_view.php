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
			<a class="navbar-brand" href="#"><b>Plantastic Embryophytes</b></a>
			
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div id="homenavbar" class="row pull-right">
				<div class="col-md-4">
				<!--<?php
					if($usertype==1){
						//admin
						echo "<a href='#'><b>User: $username</b></a>";
								
					}else if($usertype==2){
						//teacher
						echo "<a href='#'><b>User: $username</b></a>";
					}else{
						//student
						echo "<a href='#'><b>User: $username</b></a>";
					}
				?>-->
			 
				</div>
				<div class="col-md-4">
				<div class="col-md-4">
				</div>
      				<a class="btn btn-primary" href="logout" role="button">Logout</a>
        			</div>
			
      </div>
      
		</div>
	</div>
    </nav>
   
     
 <div class="jumbotron">
      <div class="container">
        <center><h2>Add Teacher Account</h2></center>
        <div class="row">
        		<div class="col-md-3">
        			
        		</div>
        		<div class="col-md-3">
	        		<div id="content">
							<div class="reg_form">
							 <?php echo validation_errors('<p class="error">' ); ?>
							 <?php echo form_open('VerifyRegistration'); ?>
							  <p>
								  <label for="firstname">First Name:</label>
								  <input type="text" id="firstname" name="firstname" value="<?php echo set_value('firstname'); ?>" />
							  </p>
							   <p>
								  <label for="middlename">Middle Name:</label>
								  <input type="text" id="middlename" name="middlename" value="<?php echo set_value('middlename'); ?>" />
							  </p>
							  <p>
								  <label for="lastname">Last Name:</label>
								  <input type="text" id="lastname" name="lastname" value="<?php echo set_value('lastname'); ?>" />
							  </p>
							  <p>
								  <label for="address">Address:</label>
								  <input type="text" id="address" name="address" value="<?php echo set_value('address'); ?>" />
							  </p>
							  <p>
								  <label for="email_address">Your Email:</label>
								  <input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" />
							  </p>
							  <p>
								  <label for="mobile_number">Mobile Number:</label>
								  <input type="text" id="mobile_number" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>" />
							  </p>
							<p>
								  <label for="emp_id">Employee ID:</label>
								  <input type="text" id="emp_id" name="emp_id" value="<?php echo set_value('emp_id'); ?>" />
							  </p>
							  <p>
								  <label for="section">Section:</label>
								  <input type="text" id="username" name="section" value="<?php echo set_value('section'); ?>" />
							  </p>
							  <p>
								  <label for="username">Username:</label>
								  <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" />
							  </p>
							  <p>
								  <label for="password">Password:</label>
								  <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
							  </p>
							  <p>
								  <label for="con_password">Confirm Password:</label>
								  <input type="password" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" />
							  </p>
							  <p>
							  <input type="submit" class="greenButton" value="Create Account" />
							  </p>
							
							</div><!--<div class="reg_form">-->
						</div><!--<div id="content">-->
        		</div>
        		<div class="col-md-3">
        			
        		</div>
        </div>
      </div>
    </div>

