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
						echo "<a href='#'><b>User: $data</b></a>";
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
									echo "<h3>Welcome Teacher <b>".$data."</b>!</h3>";
							?>
                            <hr/>
                            <div style="width:30%; float:left;">
                                <b>Pending Enlistment Requests:</b>
                                
                                <ul class="list-group">
                                <?php
                                    
                                
                                    foreach($sectionsHandled as $result){
                                            echo form_open('home/listPendingEnlistmentRequests');
                                            echo "<li class='list-group-item'><span class='badge' style='background-color:cornsilk'>".
                                                "<input type='hidden' id='sectionid' name='sectionid' value='".$result['sectionid']."'>".        
                                                "<input type='submit' class='btn-info' value=' ".$result['pendingnum']." '/>".
                                            "</span>".$result['scode']." :  ".$result['sname'].
                                    
                                    "</li>";
                                        echo "</form>";
                                    }
                                    
                               
                                    ?>
                                
                                    </ul>
                            </div>
                            
				  		</div>
			</div>	
      	</div>
      </div> <!--END OF FIRST CONTAINER-->
		 
      <div class="container container-small,">
      	<br/><br/>
        <div class="row"><!--START OF MENU-->
				
        		<div class="col-md-4 col-md-offset-1"><!--USER PROFILE-->
					<div class="panel panel-primary"  style="min-height:400px">
				  		<div class="panel-heading">
				    		<center>USER'S PROFILE</center>
				  		</div>
				  		<div class="panel-body">
				  			 
				  			<p><img src="<?php echo base_url();?>devtools/images/user_profile.png" width="70%" height="70%" class="user-profile" alt="image goes here"></img></p>
				  			
				  			<div class="text-center">
							<p><a class="btn btn-info btn-lg" name="register" role="button" href="<?php echo site_url('home/viewUserProfile') ?>" style="text-align:center;">My Profile</a></p>
							</div>
				  		</div>
			  		</div>
				</div>
                <div class="col-md-4 col-md-offset-1">
                   <div class="panel panel-primary" style="min-height:400px">
				  		<div class="panel-heading">
				    		<center>MANAGE STUDENT ACCOUNTS</center>
				  		</div>
				  		<div class="panel-body" style="padding-top:5px">
				  			<ul class="img-list">
				  				<br/><br/>
								<li style="margin-right:40px;">
								    <a href="<?php echo site_url('home/listAllPendingEnlistmentRequests') ?>">
								      <img src="<?php echo base_url();?>devtools/images/approve_request_teacher.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>APPROVE ENLISTMENT REQUEST</span></span>
								    </a>
								</li>
								<li>
								    <a href="<?php echo site_url('home/listAllStudentOfTeacher') ?>">
								      <img src="<?php echo base_url();?>devtools/images/remove_stud_teacher.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>REMOVE STUDENT FROM SECTION</span></span>
								    </a>
								</li><br/><br>
								<li  style="margin-right:40px;">
								    <a href="<?php echo site_url('home/listAllStudentOfTeacher2') ?>">
								      <img src="<?php echo base_url();?>devtools/images/list_stud_teacher.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>LIST STUDENTS</span></span>
								    </a>
								</li>

								<li>
								    <a href="<?php echo site_url('home/showExpeditionRecord') ?>">
								      <img src="<?php echo base_url();?>devtools/images/section_icon.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>SHOW EXPEDITION SCORES</span></span>
								    </a>
								</li><br/><br/>

								<li>
								    <a href="<?php echo site_url('home/showHerbologyRecord') ?>">
								      <img src="<?php echo base_url();?>devtools/images/section_icon.png" width="100px" height="100px" alt="image goes here"></img>
								      <span class="text-content"><span>SHOW HERBOLOGY LAB SCORES</span></span>
								    </a>
								</li>
							</ul>

							
				  		</div>
				  	</div>
				</div><!--end of col-md-->
        
                </div>

        		
        		
        		
        </div><!--END OF MENU-->
        </div><!--END OF SECOND CONTAINER-->
    
    </div><!--END OF JUMBOTRON-->
