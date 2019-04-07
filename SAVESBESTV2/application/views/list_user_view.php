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
                        echo "<a href='#'><b> User: ".$data."</b></a>";
             
				?>
			 
				</div>
				<div class="col-md-4">
				    <div class="col-md-4"></div>
      				<a class="btn btn-primary" href="logout" role="button">Logout</a>
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
                            <center><h4>LIST USER ACCOUNTS</h4></center>
				  		</div>
				  		<div class="panel-body">
                    <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="95%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th><th>Middle Name</th><th>Last Name</th>
                            <th>Address</th><th>Email Address</th><th>MobileNo</th>
                            <th>Username</th><th>User Type</th>
                        </tr>
                      </thead>
                        <tbody>
                           <?php
                            $cnt=count($results);
                            $i=1;
                            $usertype;
                            $userdata = array();
                               // echo "count: ".$cnt;
                                
                            foreach($results as $result){
                                if($result['usertype']==1){
                                    $usertype="Admin";
                                }else if($result['usertype']==2){
                                    $usertype="Teacher";
                                }else{
                                    $usertype="Student";
                                }
                                
                                    
                               echo "<tr>".
                                        "<td>".$i."</td>".
                                        "<td>".$result['fname']."</td>".
                                        "<td>".$result['mname']."</td>".
                                        "<td>".$result['lname']."</td>".
                                        "<td>".$result['address']."</td>".
                                        "<td>".$result['email']."</td>".
                                        "<td>".$result['mobile']."</td>".
                                        "<td>".$result['username']."</td>".
                                        "<td>".$usertype."</td>"."</tr>";
                                        $i=$i+1;
                                }
                            ?>
                          </tbody>
                        </table>
                    
                    </div>
            </div>
        	

		</div>
	</div>
</div>
     <script src="../../devtools/js/mytable.js">
        
     </script>
     <!--<script src="../../devtools/js/tablejs.js">
     
     </script>
     <script>
        $(document).ready(function(){
            //$("button").click(function(){
                $("#test").hide();
            //});
   // jQuery methods go here...
            
        });
     </script>-->