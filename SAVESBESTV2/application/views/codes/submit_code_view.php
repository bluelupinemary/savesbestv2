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
			<a class="navbar-brand" href="<?php echo site_url('home/index')?>"><b>Toybox PL</b></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div id="homenavbar" class="row pull-right">
				<div class="col-md-4">
				<?php
				
						//echo "<a href='#'><b>User: $data </b></a>";
					
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
      		<div class="panel panel-primary">
				  		<div class="panel-heading">
                            <center>SUBMIT CODE FILE</center>
				  		</div>
				  		<div class="panel-body">
                           
		<?php echo form_open_multipart('UserCode/uploadCode');?>
			<input type="file" id="userfile" name="userfile" onchange='openFile(event)'/>
			         <br><br>
                    <input type="submit" value="Submit Code" class="btn btn-success btn-lg"/>
		</form>
                            
				  		</div>
			</div>	
      	</div>
      </div> <!--END OF FIRST CONTAINER-->
	
</div>


    