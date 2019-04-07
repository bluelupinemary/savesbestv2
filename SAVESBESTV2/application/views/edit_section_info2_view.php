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
			<a class="navbar-brand" href="home"><b>Plantastic Embryophytes</b></a>
			
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
                            <center><h4>EDIT SECTION</h4></center>
				  		</div>
				  		<div class="panel-body">
				  			<div class="row" id="reg">
                                <div class="reg_form">
                               <?php if(validation_errors()):?>
                                    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                    <?php endif;?>
                                <?php echo form_open('ManageSection/editSectionCheckFields'); ?>
                                <div class="col-md-4" style="text-align: right">   
                                    <p>
                                          <label for="sname">Setion Name:</label>
                                    </p>
                                    <p>
                                          <label for="scode">Section Code:</label>
                                    </p>
                                    <p>
                                          <label for="maxnum">Max Number:</label>
                                    </p>
                                    
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        <input type="text" id="sname" name="sname" value="<?php echo set_value('sname'); ?>" class="form-control" required/>
                                    </p>
                                    <p>
                                        <input type="text" id="scode" name="scode" value="<?php echo set_value('scode'); ?>" class="form-control" required/>
                                    </p>
                                    <p>
                                        <input type="text" id="maxnum" name="maxnum" value="<?php echo set_value('maxnum'); ?>" class="form-control" required/>
                                    </p>
                                    <input type="hidden" id="sectionid" name="sectionid" value="<?php echo set_value('sectionid'); ?>">
                                    
                                      <p>
                                      <input type="submit" class="btn btn-success btn-lg" value="Update Section" />
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