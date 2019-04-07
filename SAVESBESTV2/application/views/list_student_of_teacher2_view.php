<!--ADMIN'S EDIT (OTHER) USERS VIEW-->
<body>
     <link href="<?php echo base_url();?>devtools/css/tablestyle.css" rel="stylesheet" />
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
       <?php //echo print_r($results) ?>
        <div class="row">
           
                 <div class="panel panel-primary user-profile">
				  		<div class="panel-heading">
                            <center><h4>LIST OF STUDENTS</h4></center>
				  		</div>
				  		<div class="panel-body">
                    <table id="myTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="95%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Section</th><th>Student Name</th><th>Adress</th><th>Username</th>
                            
                        </tr>
                      </thead>
                        <tbody>
                           
                           <?php
                            $cnt=count($results);
                            $i=1;
                            
                          
                            $userdata = array();
                            foreach($results as $result){
                                echo "<tr class='clickable-row' data-toggle='tooltip' title='Click to view student's scores>".
                                        "<td>".$i."</td>".
                                        "<td>".$result['scode']."</td>".
                                        "<td>".$result['name']."</td>".
                                        "<td>".$result['address']."</td>".
                                        "<td>".$result['username']."</td>";
                                
                                
                                    "</tr>";
                                    //echo form_close();
                                        $i=$i+1;
                                
                           // echo $result['sectionid'];
                            //echo 
                            //"<form name='myform' id=myform' method='POST'>
                            //<input type='hidden' name='userid' id='userid' value=' ".$result['userid']." ' />".
                            //"</form>";
                            
                                //echo $result['userid'];
                            }
                            
                            
                               // $userdata = $result['userid']
                                //print_r($results);
                            ?>
                                
                            
                                
                            </div>
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