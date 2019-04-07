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
              <!--div class="panel-heading">
                            <center><h4>EDIT CONSUMER</h4></center>
              </div-->
              <!--START OF SEARCH BOX-->
              <br/><br/>
              <div class="col-lg-6">
                  <span class="search-box-title">Consumers </span>
                  <input type="text" class="form-control" id="new-search-box" placeholder="Search consumer here...">
              </div><!-- /.col-lg-6 -->
              <div class="panel-body">
                    <table id="myTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="95%">
                      <thead>
                        <tr>
                            <th>Consumer<br>ID</th><th>Account No</th><th>Name</th><th>Address</th>
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
                                

                               //  echo "<div class='form_icon'>";
                               //  echo validation_errors('<p class="error">' );

                               //  echo form_open('Consumer/updateConsumerDetails');
                               //  echo "<input type='hidden' name='consumer_id' id='consumer_id' value=' ".$result['id']." ' />";
                               //   echo "<button data-toggle='tooltip' title='Edit consumer' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-edit'></span></button>";
                               // // echo form_button($edit_button);
                               //  "</form></div>";
                               //  echo form_close();


                               //  echo "<div class='form_icon'>";
                               //  echo validation_errors('<p class="error">' );

                               //  echo form_open('Consumer/archiveConsumer');
                               //  echo "<input type='hidden' name='consumer_id' id='consumer_id' value=' ".$result['id']." ' />";
                               //  echo "<button data-toggle='tooltip' title='Archive consumer' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-folder-close'></span></button>";
                               //  //echo form_button($delete_button);
                               //  "</form></div>";
                               //  echo form_close();

                               //  echo "<div class='form_icon'>";
                               //  echo validation_errors('<p class="error">' );

                               //  echo form_open('Consumer/addBondDeposit');
                               //  echo "<input type='hidden' name='consumer_id' id='consumer_id' value=' ".$result['id']." ' />";
                               //  echo "<button data-toggle='tooltip' title='Add bond deposit' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-plus-sign'></span></button>";
                               //  //echo form_button($delete_button);
                               //  "</form></div>";
                               //  echo form_close();

                               echo form_open('Consumer/viewAConsumerStatementOfAccount');
                                echo "<input type='hidden' name='consumer_id' id='consumer_id' value=' ".$result['id']." ' />";
                                echo "<input type='hidden' name='account_no' id='account_no' value=' ".$result['account_no']." ' />";
                                echo "<input type='hidden' name='consumer_name' id='consumer_name' value=' ".$result['fullname']." ' />";
                                echo "<center><input data-toggle='tooltip' title='Print Statement of Account' type='submit' value='Print SOA' class='btn btn-success btn-xs'></center>";
                                //echo form_button($delete_button);
                                "</form></div>";
                                echo form_close();
                               



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
