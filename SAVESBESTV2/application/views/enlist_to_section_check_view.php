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
                    
                    echo "<a href='#'> User: ".$data."</a>";
                    
				?>
			 
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
        <div class="row">
             <?php
               
                $secdata = array();
              //  $teacherdata = array();
                    foreach($sectiondata as $result){     
                        $secdata = array(
                            'sectionid' => $result['sectionid'],
                            'sname' => $result['sname'],
                            'scode' => $result['scode'],
                            'maxnum' => $result['maxnum']
                        );
                        
                    }
                ?>
					<div class="panel panel-primary user-profile"  style="min-height:400px; width:60%;">
				  		<div class="panel-heading">
                            <center><h4>ENLIST TO SECTION</h4></center>
                                                          
				  		</div>
				  		<div class="panel-body">
				  			<div class="row" id="reg">
                              <div class="reg_form">
                                <?php echo validation_errors('<p class="error">' ); ?>
                                <?php echo form_open('ManageSection/editManageTeacherToSection'); ?>
                                <div class="col-md-4" style="text-align: right">   
                                    <p>
                                          <label for="sname">Section Name:</label>
                                    </p>
                                    <p>
                                          <label for="scode">Section Code:</label>
                                    </p>
                                    
                                    <p>
                                        <label for="studentname">Username:</label>
                                    </p>
                                    <p>
                                        <label for="studentpw">Section Code:</label>
                                    </p>
                                </div>
                                  
                                <div class="col-md-4">
                                    <p>
                                        <?php echo $secdata['sname'];?>
                                    </p>
                                    <p>
                                        <?php echo $secdata['scode'];?>
                                    </p>
                                     
                                    <input type="hidden" name="sectionid" id="sectionid" value="<?php echo $secdata['sectionid'] ?>" />
                                    <input type="hidden" name="usertype" id="usertype" value="2" /><!--default to value 2 because teacher usertype is always assigned-->
                                      <p>
                                      <input type="submit" class="greenButton" value="Assign Teacher" />
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