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
			<a class="navbar-brand" href="#"><b>Plantastic Embryphytes</b></a>
			
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div id="homenavbar" class="row pull-right">
				<div class="col-md-4">
				<?php
                    /*foreach($results as $result){
                        echo "<a href=''> User: ".$result['username']."</a>";*/
                    echo "<a href='#'> User: ".$data."</a>";
                        
                    
				?>
			 
				</div>
				<div class="col-md-4">
				<div class="col-md-4">
				</div>
      				<!--a class="btn btn-primary" href="logout" role="button">Logout</a-->
                    <a class="btn btn-primary" href="logout" role="button">Logout</a>
        		</div>
			
      </div>
      
		</div>
	</div>
    </nav>
   

<div class="jumbotron">
      <div class="container">
        <div class="row">
             <?php
               // echo $data2;
					//if($usertype==1){
						//admin
                $userdata = array();
                $salt = 'XOUKFeHZMRtIfyw';
                    foreach($results as $result){
                       /* echo $result['userid'], $result['username'], $result['password'],$result['address'],
                        $result['mobile'], $result['email'], $result['fname'],$result['mname'], $result['lname'], $result['usertype'],$result['datecreated'];*/
                        $userdata = array(
                            'userid' => $result['userid'],
                            'username' => $result['username'],
                            'password' => $result['password'],
                            'address' => $result['address'],
                            'mobile' => $result['mobile'],
                            'email' => $result['email'],
                            'fname' => $result['fname'],
                            'mname' => $result['mname'],
                            'lname' => $result['lname'],
                            'usertype' => $result['usertype']    
                        );
                        
                    }
                ?>
					<div class="panel panel-primary user-profile"  style="min-height:400px; width:60%;">
				  		<div class="panel-heading">
                            <center><h4>DELETE USER PROFILE</h4></center>
                                                          
    <?php
                           /* if($userdata['usertype']==2){
                                echo "usertype: ".$empid;
                            }else if($userdata['usertype']==1){
                                 echo "admin";
                                
                            }else{
                              // echo "usertype: ".$studentid;
                                echo "usertype: ".$studentid;
                            }*/
                                
                             
    ?>
				  		</div>
				  		<div class="panel-body">
				  			<div class="row" id="reg">
                              <div class="reg_form">
                                <?php echo validation_errors('<p class="error">' ); ?>
                                <?php echo form_open('EditUserProfile/deleteUserByAdmin'); ?>
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
                                        if($userdata['usertype']==2){   //if teacher
                                            echo "<p><label for 'empid'>Employee Id:</label></p>";
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
                                        <input type="text" id="firstname" name="firstname" value="<?php echo $userdata['fname'] ?>" />
                                    </p>
                                    <p>
                                        <input type="text" id="middlename" name="middlename" value="<?php echo $userdata['mname'] ?>" />
                                    </p>
                                    <p>
                                        <input type="text" id="lastname" name="lastname" value="<?php echo $userdata['lname'] ?>" />
                                    </p>
                                     <?php 
                                        if($userdata['usertype']==2){   //if teacher
                                            echo "<p><input type='text' id='empid' name='empid' 
                                                value='".$empid."'"."/>"."</p>";
                                        }else{
                                            
                                        }
                                    ?>
                                    <p>
                                        <input type="text" id="address" name="address" value="<?php echo $userdata['address'] ?>" />
                                    </p>
                                    <p>
                                        <input type="text" id="mobile_number" name="mobile_number" value="<?php echo $userdata['mobile'] ?>" />
                                    </p>
                                    <p>
                                        <input type="text" id="email_address" name="email_address" value="<?php echo $userdata['email'] ?>" />
                                    </p>
                                    <p>
                                        <input type="password" id="password" name="password" value="" />
                                    </p>
                                    <p>
                                        <input type="password" id="con_password" name="con_password" value="" />
                                    </p>
                                    <input type="hidden" name="userid" id="userid" value="<?php echo $userdata['userid'] ?>" />
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