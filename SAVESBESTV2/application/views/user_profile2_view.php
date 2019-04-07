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
				<div class="col-md-4">
				</div>
      				<a class="btn btn-primary" href="home/logout" role="button">Logout</a>
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
                                <?php echo form_open('EditUserProfile'); ?>
                                <div class="col-md-4" style="text-align: right" form-group>   
                                    <p>
                                          <label for="firstname">First Name:</label>
                                    </p>
                                    <p>
                                          <label for="middlename">Middle Name:</label>
                                    </p>
                                    <p>
                                          <label for="lastname">Last Name:</label>
                                    </p>
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
                                    <p>
                                        <input type="text" id="address" name="address" value="<?php echo set_value('address'); ?>" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="text" id="mobile_number" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" class="form-control"/>
                                    </p>
                                    <p>
                                        <input type="password" id="password" name="password" value="" class="form-control" placeholder="Enter Password" required/>
                                    </p>
                                    <p>
                                        <input type="password" id="con_password" name="con_password" value="" class="form-control" placeholder="Enter Password" required/>
                                    </p>
                                    <input type="hidden" name="userid" id="userid" value="<?php echo set_value('userid'); ?>" class="form-control"/>
                                      <p>
                                      <input type="submit" class="btn btn-success btn-lg" value="Update Account" />
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
<?php echo "msg: ".$message?>
<script>
    $(document).ready( function () {
        var msg = <?php echo $message?>;
        if(msg==1){
          swal({   title: "Updated!",   text: "Account Update Successful!",   type: "success",   confirmButtonText: "Okay" },
               function (confirmed) {
                            //var confirmed = true;
                            if(confirmed) {
                                    window.location.href = "<?php echo site_url();?>/home";//reload page to see the effect of delete
                                            };


                            }//end of fxn 

              );//end of swal
        }//end of if
  
}); 
</script>