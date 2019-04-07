<!--ADMIN'S HOME VIEW-->
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
				<?php
                    echo "<a href='#'><b>User: $username</b></a>";
				
				?>
			 
				</div>
				<div class="col-md-4">
				<div class="col-md-4">
				</div>
      				<a class="btn btn-primary" href="<?php echo site_url('home/logout')?>" role="button">Logout</a>
        			</div>
			
      </div>
      
		</div>
	</div>
    </nav>
   
     
 <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      	<div class="row">
      		<div class="panel panel-info">
				  		<div class="panel-heading">
				    		HOME - DASHBOARD
				  		</div>
				  		<div class="panel-body">
				  			<?php
								if($usertype==1){
									echo "<h2>Welcome Admin <b>".$username."</b>!</h2>";		
								}else if($usertype==2){
									echo "<h2>Welcome Teacher ".$username."!</h2>";
								}else if($usertype==0){
									echo "<h2>Welcome Student".$username."!</h2>";
								}
							?>
				  		</div>
			</div>	
      	</div>
      </div> <!--END OF FIRST CONTAINER-->
		 
      <div class="container container-small,">
      	<br/><br/>
        <div class="row"><!--START OF MENU-->
				
        		<div class="col-md-3"><!--USER PROFILE-->
					<div class="panel panel-primary"  style="min-height:400px">
				  		<div class="panel-heading">
				    		USER'S PROFILE
				  		</div>
				  		<div class="panel-body">
				  			
				  			<p><img src="<?php echo base_url();?>devtools/images/user_profile.png" width="70%" height="70%" class="user-profile" alt="image goes here"></img></p>
				  			
				  			<div class="text-center">
							<p><a class="btn btn-primary btn-lg" name="register" role="button" href="<?php echo site_url('home/viewUserProfile') ?>" style="text-align:center;">My Profile</a></p>
							</div>
				  		</div>
			  		</div>
				</div>

        		
        		<div class="col-md-3"><!--MANAGE ACCOUNTS-->
        			<div class="panel panel-primary" style="min-height:400px">
				  		<div class="panel-heading">
				    		MANAGE USER ACCOUNTS
				  		</div>
				  		<div class="panel-body" style="padding-top:50px">
				  			<ul class="img-list">
								<li>
								    <a href="<?php echo site_url('home/addUser') ?>">
								      <img src="<?php echo base_url();?>devtools/images/add_user.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>ADD USER</span></span>
								    </a>
								</li>
								<li>
								    <a href="<?php echo site_url('home/editUser') ?>">
								      <img src="<?php echo base_url();?>devtools/images/edit_user.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>UPDATE USER</span></span>
								    </a>
								</li>
								<li>
								    <a href="<?php echo site_url('home/deleteUser') ?>">
								      <img src="<?php echo base_url();?>devtools/images/delete_user.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>DELETE USER</span></span>
								    </a>
								</li>
								<li>
								    <a href="<?php echo site_url('home/listUser') ?>">
								      <img src="<?php echo base_url();?>devtools/images/view_user.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>VIEW USERS</span></span>
								    </a>
								</li>
							</ul>

							<!--	<p> <a class="btn btn-primary btn-lg col" name="register" role="button" href="<?php echo site_url('home/addTeacher') ?>">Add Teacher</a></p>-->
							
				  		</div>
				  	</div>
        		</div>

        		<div class="col-md-3"><!--MANAGE SECTIONS-->
        			<div class="panel panel-primary" style="min-height:400px">
				  		<div class="panel-heading">
				    		MANAGE SECTIONS
				  		</div>
				  		<div class="panel-body" style="padding-top:50px">
				  			<ul class="img-list">
								<li>
								    <a href="<?php echo site_url('home/createSection') ?>">
								      <img src="<?php echo base_url();?>devtools/images/add_section.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>ADD SECTION</span></span>
								    </a>
								</li>
								<li>
								    <a href="<?php echo site_url('home/editSection') ?>">
								      <img src="<?php echo base_url();?>devtools/images/edit_section.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>EDIT SECTION</span></span>
								    </a>
								</li>
								<li>
								    <a href="<?php echo site_url('home/deleteSection') ?>">
								      <img src="<?php echo base_url();?>devtools/images/delete_section.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>DELETE SECTION</span></span>
								    </a>
								</li>
								<li>
								    <a href="<?php echo site_url('home/listSection') ?>">
								      <img src="<?php echo base_url();?>devtools/images/view_section.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>VIEW SECTIONS</span></span>
								    </a>
								</li>
							</ul>

							<!--	<p> <a class="btn btn-primary btn-lg col" name="register" role="button" href="<?php echo site_url('home/addTeacher') ?>">Add Teacher</a></p>-->
							
				  		</div>
				  	</div>
        		</div>
        		<div class="col-md-3"><!--MANAGE INTERNATIONALIZATION-->
        			<div class="panel panel-primary" style="min-height:400px">
				  		<div class="panel-heading">
				    		MANAGE TEACHER-SECTION
				  		</div>
				  		<div class="panel-body" style="padding-top:50px">
	        				<p><img src="<?php echo base_url();?>devtools/images/section_icon3.png" width="70%" height="70%" class="user-profile" alt="image goes here"></img></p>
							<div class="text-center">
							<p> <a class="btn btn-primary btn-lg col" name="register" role="button" href="<?php echo site_url('home/addTeacherToSection') ?>">Assign Teacher-Section</a></p>
							</div>
				  		</div>
				  	</div>
        		</div>
        		
        </div><!--END OF MENU-->
        </div><!--END OF SECOND CONTAINER-->
    
    </div><!--END OF JUMBOTRON-->
