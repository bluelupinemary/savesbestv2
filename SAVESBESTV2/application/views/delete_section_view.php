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
			<a class="navbar-brand" href="<?php echo site_url('home/index')?>"><b>Plantastic Embryophytes</b></a>
			
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
        //print_r($userinsec);
    ?>
<div class="jumbotron">
      <div class="container">
       
        <div class="row">
           
                 <div class="panel panel-primary user-profile">
				  		<div class="panel-heading">
                            <center><h4>DELETE SECTION</h4></center>
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
                            
                            foreach($userinsec as $a){
                                $s = $a['sectionid'];
                                array_push($uinsec, $s);
                            }
                            
                           // print_r($userinsec);
                            
                            $userdata = array();
                            foreach($results as $result){
                                echo "<tr data-toggle='tooltip' title='Click to delete'>".
                                        "<td>".$i."</td>".
                                        "<td>".$result['sname']."</td>".
                                        "<td>".$result['scode']."</td>".
                                        "<td>".$result['maxnum']."</td>";
                                
                                echo "<td>";
                                echo validation_errors('<p class="error">' );
                                 //echo form_open('ManageSection/deleteSectionInfo');
                                //echo "<form id='delSectionForm'>";
                                echo "<input type='hidden' id='sectionid' name='sectionid'                                            value='".$result['sectionid']."'/>";
                                //echo "<center><input type='button' class='btn btn-danger'                                           value='Delete' id='delbutton2'/></center>".
                                   //if (in_array($result['sectionid'], $uinsec)){
                                    //    echo "<center style='color:red;'>Cannot delete section</center>";
                                    //}else{
                                        echo "<center><button class='btn btn-danger' value='".$result['sectionid']."' id='delsecbutton'/>Delete</button></center>";
                                    //}
                               // echo "<center><button class='btn btn-danger'                                           value='".$result['sectionid']."' id='delsecbutton'/>Delete</button></center>".
                                    echo "</form>".
                                    "</td>".
                                    
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
                            <!--<input type='submit' class='btn btn-danger'                                           value='samp' id='sampbutton'/>-->
                            
                                
                            </div>
                          </tbody>
                        </table>
                       
                    </div>
            </div>
        	

		</div>
	</div>
</div>
     <!--script src="../../devtools/js/mytable.js"-->
     <script type="text/javascript" src="<?php echo base_url();?>devtools/js/adminFunctionsjs.js">   
       
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