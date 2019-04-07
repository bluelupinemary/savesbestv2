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
			<a class="navbar-brand" href="<?php echo site_url('home/index')?>"><b>Plantastic Embryophytes</b></a>
			
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
               
                $sectiondata = array();
                    foreach($results as $result){
                     
                        $sectiondata = array(
                            'sectionid' => $result['sectionid'],
                            'sname' => $result['sname'],
                            'scode' => $result['scode'],
                            'maxnum' => $result['maxnum']
                        );
                        
                    }
                ?>
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
                                          <label for="sname">Section Name:</label>
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
                                        <input type="text" id="sname" name="sname" value="<?php echo $sectiondata['sname'] ?>" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="text" id="scode" name="scode" value="<?php echo $sectiondata['scode'] ?>" class="form-control" required/>
                                    </p>
                                    <p>
                                        <input type="text" id="maxnum" name="maxnum" value="<?php echo $sectiondata['maxnum'] ?>" class="form-control" required/>
                                    </p>
                                     
                                    <input type="hidden" name="sectionid" id="sectionid" value="<?php echo $sectiondata['sectionid'] ?>" required/>
                                      <p>
                                          <center><input type="submit" class="btn btn-success btn-lg" value="Update Section" /></center>
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