
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
			<a class="navbar-brand" href="<?php echo site_url('home')?>"><b>Toybox PL</b></a>
			
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div id="homenavbar" class="row pull-right">
				<div class="col-md-4">
				<?php
                       // echo "<a href='#'><b> User: ".$data."</b></a>";
             
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
        
        
<div class="jumbotron">
      <div class="container">
       
        <div class="row">
           
                 <div class="panel panel-primary user-profile">
				  		<div class="panel-heading">
                            <center><h4>CODES SUBMITTED BY <?php echo $fullname;?></h4></center>
				  		</div>
				  		<div class="panel-body">
                    <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="95%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>File Name</th><th>Date Submitted</th><th>Action</th>
                           
                        </tr>
                      </thead>
                        <tbody>
                           <?php
                            $cnt=count($codes);
                            $i=1;
                            $usertype;
                            $userdata = array();
                               // echo "count: ".$cnt;
                                
                                    
                        foreach($codes as $value){
                            echo "<tr><td>".$i."</td>
                                 <td>".$value->filename."</td>
                                 <td>".$value->datesent."</td>
                                 <td><center><button class='download_code btn-success' value='".$value->exerid."'>Download</button></center></td>

                                 </tr>";

                            $i++;
                            }
                               
                            ?>
                          </tbody>
                        </table>
                    
                    </div>
            </div>
        	

		</div>
	</div>
</div>
    
    <script>
      $(document).ready(function(){
        $('.download_code').click(function(){
          var exercode = $(this).val();
          var url = "<?php echo site_url();?>/UserCode/downloadCode/"+exercode;
          window.location.href = url;
        });
      });
	</script>
     <script src="../../devtools/js/mytable.js">
        
     </script>