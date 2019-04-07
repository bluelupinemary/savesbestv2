<!--ADMIN'S DELETE (OTHER) USERS VIEW-->
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
   
<?php
       // print_r($userinsec);
    ?>
<div class="jumbotron">
      <div class="container">
       
        <div class="row">
           
                 <div class="panel panel-primary user-profile">
				  		<div class="panel-heading">
                            <center><h4>DELETE USER ACCOUNT</h4></center>
				  		</div>
				  		<div class="panel-body">
                    <table id="myTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="95%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th><th>Middle Name</th><th>Last Name</th>
                            <th>Address</th><th>Email Address</th><th>MobileNo</th>
                            <th>Username</th><th>User Type</th><th>Action</th>
                        </tr>
                      </thead>
                        <tbody>
                           
                           <?php
                            $cnt=count($results);
                            $i=1;
                            $usertype;
                            $userdata = array();
                            $uinsec = array();
                            
                            foreach($userinsec as $a){
                                $s = $a['userid'];
                                array_push($uinsec, $s);
                            }
                            
                            
                            foreach($results as $result){
                                if($result['usertype']==1){
                                    $usertype="Admin";
                                }else if($result['usertype']==2){
                                    $usertype="Teacher";
                                }else{
                                    $usertype="Student";
                                }
                                
                                    
                               //echo "<tr class='clickable-row' data-href='viewUserProfile'".
                                
                                
                                $userid = $result['userid'];
                                echo "<tr data-toggle='tooltip' title='' id='".$userid."'".">".
                                        "<td>".$i."</td>".
                                        "<td>".$result['fname']."</td>".
                                        "<td>".$result['mname']."</td>".
                                        "<td>".$result['lname']."</td>".
                                        "<td>".$result['address']."</td>".
                                        "<td>".$result['email']."</td>".
                                        "<td>".$result['mobile']."</td>".
                                        "<td>".$result['username']."</td>".
                                        "<td>".$usertype."</td>".
                                        //"<td>".
                               /* "<a href=' ".site_url('EditUserProfile/updateUserByAdmin').
                                " ' id='link'' class='btn btn-warning' role='button'>Edit</a>".*/
                                
                                /*"<a href='javascript;' id='link' class='btn btn-warning' role='button'>Edit</a>".*/
                                //"</td>".
                                    "<td>";
                                    //"<form name='myform' id=myform' method='POST'>
                                    //"<input type='hidden' name='userid' id='userid' value=' ".$result['userid']." ' />
                                echo "<div class='reg_form'>";
                                echo validation_errors('<p class="error">' );
                               // echo form_open('home/deleteUserProfileByAdmin');
                                echo "<input type='hidden' name='userid' id='userid' value=' ".$result['userid']." ' />";
                                echo "<input type='hidden' name='usertype' id='usertype' value=' ".$result['usertype']." ' />";
                                //echo "<input type='submit' class='btn btn-danger'                                           value='Delete' id='deluserbutton'/>".
                                
                                
                                    if (in_array($result['userid'], $uinsec) || ($result['userid']==$useriddata)){
                                        echo "<center style='color:red'>Cannot delete user</center>";
                                    }else{
                                       // echo "<input type='submit' class='btn btn-info'                                           value='Delete' id='deluserbutton' />";
                                        echo "<center><button class='btn btn-danger' value='".$result['userid']."' id='deluserbutton'/>Delete</button></center>"; 
                                    }
                                
                               //id='deluserbutton'
                                    echo "</form>".
                                    "</td>".
                                    
                                    "</tr>";
                                    //echo form_close();
                                        $i=$i+1;
                                
                            
                            //echo 
                            //"<form name='myform' id=myform' method='POST'>
                            //<input type='hidden' name='userid' id='userid' value=' ".$result['userid']." ' />".
                            //"</form>";
                            
                                //echo $result['userid'];
                            }
                            
                            
                                $userdata = $result['userid']
                        
                            ?>
                                
                            
                                
                            </div>
                          </tbody>
                        </table>
                       
                    </div>
            </div>
        	

		</div>
	</div>
</div>
    <!--script src="<?php echo base_url();?>devtools/js/mytable2.js"-->
<script type="text/javascript" src="<?php echo base_url();?>devtools/js/studentRecordjs.js">   
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
