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
      <?php //print_r($teacherdata) ?>
        <div class="row">
             
                 <div class="panel panel-primary user-profile">
				  		<div class="panel-heading">
                            <center><h4>MANAGE TEACHER-SECTION</h4></center>
				  		</div>
				  		<div class="panel-body">
                    <table id="myTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="95%">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Section Name</th><th>Section Code</th><th>Max Number</th><th>Action</th>
                            
                        </tr>
                         
                      </thead>
                        <tbody>
                           
                           <?php
                            $cnt=count($results);
                            $i=1;
                            $uinsec = array();
          
                             foreach($teacherdata as $a){
                                $s = $a['sectionid'];
                                array_push($uinsec, $s);
                            }
                            
                            $userdata = array();
                            foreach($results as $result){
                                echo "<tr data-toggle='tooltip' title='Click to edit'>".
                                        "<td>".$i."</td>".
                                        "<td>".$result['sname']."</td>".
                                        "<td>".$result['scode']."</td>".
                                        "<td>".$result['maxnum']."</td>";
                                
                                echo "<td>";
                                
                                echo validation_errors('<p class="error">' );
                               
                                
                                
                                
                                if(in_array($result['sectionid'], $uinsec)){
                                    echo form_open('ManageSection/manageTeacherToSection');
                                    echo "<input type='hidden' id='sectionid' name='sectionid'                                            value='".$result['sectionid']."'/>";
                                    
                                    echo "<center><input type='submit' class='btn btn-warning'                                           value='Re-assign a Teacher'/></center>";
                                     echo "</form>";
                                }else{
                                    echo form_open('ManageSection/manageTeacherToSection');
                                    echo "<input type='hidden' id='sectionid' name='sectionid'                                            value='".$result['sectionid']."'/>";
                                    
                                    echo "<center><input type='submit' class='btn btn-success'                                           value='Assign Teacher'/></center>";
                                    echo "</form>";
                                }
                                
                                   
                                    echo "</td>";
                                    
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
                        
                            ?>
                                
                            
                                
                            </div>
                          </tbody>
                        </table>
                       
                    </div>
            </div>
        	

		</div>
	</div>
</div>
    <!--script src="../../devtools/js/mytable.js"-->
    <script src="<?php echo base_url();?>devtools/js/studentRecordjs.js">
        
     </script>
  