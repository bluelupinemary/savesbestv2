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
				
						echo "<a href='#'><b>User: $data </b></a>";
					
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
          <?php //print_r($pendingreq)?>
      	<div class="row">
      		<div class="panel panel-info">
				  		<div class="panel-heading">
				    		HOME - DASHBOARD
				  		</div>
				  		<div class="panel-body">
				  			<?php
								
									echo "<h2>Welcome Student <b>".$data."! </b></h2>";
                       // foreach($studentdata as $result){
                                    if($studentdata==0){  //meaning 0 userid instance in table user_in_section 
                                        
                                echo form_open('home/listSection_home');
                                
                                echo "<input type='hidden' id='userid' name='userid'                                            value='".$userid."'/>";
                                        if($pendingreq==0){//0 user instance in pending requests
                                            echo "<b style='color:red'>It seems that you dont belong in any section yet. Please click the button below to enlist in a section</b><br/>";
                                             echo "<input type='submit' class='btn btn-success'                                           value='Enlist To Section'/>".
                                        "</form>";
                                        }else{
                                            echo "<b style='color:red'>You have enlistment request waiting for teacher's approval. </b>";
                                        }
                               
                                    
                                    }//end of if
                            ?>
                           
                            
				  		</div>
			</div>	
      	</div>
      </div> <!--END OF FIRST CONTAINER-->
		 
      <div class="container container-small,">
      	<br/><br/>
        <div class="row"><!--START OF MENU-->
				
        		<div class="col-md-3 col-md-offset-2"><!--USER PROFILE-->
					<div class="panel panel-primary"  style="min-height:400px">
				  		<div class="panel-heading">
                            <center>USER'S PROFILE</center>
				  		</div>
				  		<div class="panel-body">
				  			
				  			<p><img src="<?php echo base_url();?>devtools/images/user_profile.png" width="70%" height="70%" class="user-profile" alt="image goes here"></img></p>
				  			
				  			<div class="text-center">
							<p><a class="btn btn-primary btn-lg" name="register" role="button" href="<?php echo site_url('home/viewUserProfile') ?>" style="text-align:center;">My Profile</a></p>
							</div>
				  		</div>
			  		</div>
				</div>

                <div class="col-md-4 col-md-offset-1">
                    <div class="panel panel-primary"  style="min-height:400px">
				  		<div class="panel-heading">
                            <center>APPLICATION</center>
				  		</div>
				  		<div class="panel-body">
				  			
				  			<p></p>
				  			
				  			<div class="text-center"><br/<br/>
                                <br/>
                                <?php
                                	if(!empty($studentSection) || $studentSection!=0){
                                		 echo "<center><p><a class=\"btn btn-success btn-lg\" href=\"".site_url()."/home/playGame\" role=\"button\" style=
                                \"margin-top: 5%\" >Start Game</a></p></p></center>";
                                	}else{
                                		echo "<center><p><a class=\"btn btn-success disabled btn-lg\" href=\"".site_url()."/home/playGame\" role=\"button\" style=
                                \"margin-top: 5%\" >Start Game</a></p></p></center>";
                                	}
                                ?>


                               
                                
							</div>
				  		</div>
			  		</div>
				</div>
                        
                       
				

        		
        		
        		
        </div><!--END OF MENU-->
        </div><!--END OF SECOND CONTAINER-->
    
    </div><!--END OF JUMBOTRON-->
