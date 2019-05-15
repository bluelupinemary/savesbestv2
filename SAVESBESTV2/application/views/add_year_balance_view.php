<link rel="stylesheet" href="<?php echo base_url();?>devtools/css/style.css">
<!--EDIT CONSUMER ACCOUNT VIEW thru admin or officer account-->
<nav class="navbar navbar-fixed-top">
<!--start of the navbar title section-->
  <div class="navbar-header lighten-blue">
      <img class="login-img" src="<?php echo base_url();?>devtools/images/bill/uplb.png" height="50px" width="60px"/>
      <img class="login-img" src="<?php echo base_url();?>devtools/images/bill/logo-trans.png" height="50px" width="60px"/>
  </div>
  <!--Shows the logged in username and logout button-->
  <div id="homenavbar" class="row pull-right">
        <div class="col-md-4">
            <?php
                echo "<a href='#'><b>User: $username</b></a>";
            ?>
           </div>
       <div class="col-md-4">
             <a class="btn btn-primary" href="<?php echo site_url('home/logout')?>" role="button">Logout</a>
      </div>
  </div>
</nav>

<!--START OF LIST CONSUMERS TABLE-->
<div>
    <!--START OF BACK TO DASHBARD ICON-->
    <br/><br/>
    <a href="<?php echo site_url('home')?>">
      <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Dashboard</b>
    </a>
    <!--END OF BACK TO DASHBOARD ICON-->
    <div class="container">
        <!--div class="row-head row"-->
          <div>
				  		 <?php
                  if(isset($ok)){
                      if($ok){
                          echo "<br><span style='padding:10px;color:white;font-size:1.2em;background-color:green;'>SUCCESS: The balance was succesffully added to the consumer</span>";
                      }else{
                          echo "<br><span style='padding:10px;color:maroon;font-size:1.2em;background-color:orange;'>WARNING: Unable to add balance. The consumer already has an existing balance for the set year.</span>";
                      }
                    

                  }
                ?>
              <br/><br/>
              <div class="col-lg-6">
                  <span class="search-box-title">Consumers </span>
                  <input type="text" class="form-control" id="new-search-box" placeholder="Search consumer here...">
              </div><!-- /.col-lg-6 -->
				  		<div class="panel-body">
                    <table id="myTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="95%">
                      <thead>
                        <tr>
                            <th>ID</th><th>Account No</th><th>Name</th><th>Address</th>
                            <th>Consumer Type</th><th style="padding-left:3%;padding-right:3%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                           <?php
                           
                            
                            $cnt=count($results);
                            $i=1;
                            $consumertype;
                            $userdata = array();

                            foreach($results as $result){
                                if($result['consumer_type']=="RES"){
                                    $consumertype="Residential";
                                }else if($result['consumer_type']=="COM"){
                                    $consumertype="Commercial";
                                }else{
                                    $consumertype="Institute";
                                }


                               //echo "<tr class='clickable-row' data-href='viewUserProfile'".


                                $accountno = $result['account_no'];
                                echo "<tr account no='".$accountno."'".">".
                                "<td>".$result['id']."</td>".
                                "<td>".$result['account_no']."</td>".
                                "<td>".$result['fullname']."</td>".
                                "<td>".$result['address']."</td>".
                                "<td>".$consumertype.
                                        //"<td>".
                               /* "<a href=' ".site_url('EditUserProfile/updateUserByAdmin').
                                " ' id='link'' class='btn btn-warning' role='button'>Edit</a>".*/

                                /*"<a href='javascript;' id='link' class='btn btn-warning' role='button'>Edit</a>".*/
                                //"</td>".
                                    "<td>";
                                    //"<form name='myform' id=myform' method='POST'>
                                    //"<input type='hidden' name='userid' id='userid' value=' ".$result['userid']." ' />
                                //  $edit_button = array(
                                //     'type'      => 'submit',
                                //     'content'   => '<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>',
                                //     'class'     => 'consumer-btn btn btn-sm btn-labeled btn-success'
                                // );
                                
                                echo form_open('Consumer/addYearBalance');
                                echo "<input type='hidden' name='consumer_id' id='consumer_id' value=' ".$result['id']." ' />";
                                echo "<button data-toggle='tooltip' title='Add Balance' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-plus-sign'></span></button>";
                                //echo form_button($delete_button);
                                "</form></div>";
                                echo form_close();

                                // echo "<input type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-edit'></span>";
                               // echo "<a  data-toggle='tooltip' title='Edit consumer' href='".site_url('EditUserProfile/updateUserByAdmin')."' role='button'><span class='glyphicon glyphicon-edit'></span></a>&nbsp&nbsp&nbsp";
                               // echo "<a  data-toggle='tooltip' title='Archive consumer' href='".site_url('EditUserProfile/updateUserByAdmin')."' role='button'><span class='glyphicon glyphicon-folder-close'></span></a>";



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


                                //$userdata = $result['userid']

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
