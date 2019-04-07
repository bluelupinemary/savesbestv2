<link rel="stylesheet" href="<?php echo base_url();?>devtools/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>devtools/css/reading_popupcss.css">

<!--ADD A READING TO A CONSUMER ACCOUNT-->
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
          <div>
              <!--START OF SEARCH BOX-->
              <br/><br/>
              <?php
                if(isset($error)){
                    echo $error;
                }

              ?>
              <div class="col-lg-6">
                  <span class="search-box-title">Consumers </span>
                  <input type="text" class="form-control" id="new-search-box" placeholder="Search consumer here...">
              </div><!-- /.col-lg-6 -->
                        <div class="panel-body">
                    <table id="myTable" class="table table-striped table-bordered table-hover" cellspacing="0" width="95%">
                        <thead>
                            <tr>
                                <th>ID</th><th>Account No</th><th>Name</th><th>Read Month</th>
                                <th>Read Year</th><th>Consumer Type</th><th>Electricity</th><th>Water</th><th>Garbage</th>
                            </tr>
                        </thead>
                        <tbody>
 <?php
                            $cnt=count($results);
                            $i=1;
                            
                            $userdata = array();

                            foreach($results as $result){
                                // if($result[5]=="RES"){
                                //     $consumertype="RES";
                                // }else if($result['consumer_type']=="COM"){
                                //     $consumertype="Commercial";
                                // }else{
                                //     $consumertype="Institute";
                                // }
                              print_r($result);


                                if($result[6]==1){
                                    $last_bill_month="Jan";
                                }else if($result[6]==2){
                                    $last_bill_month="Feb";
                                }else if($result[6]==3){
                                    $last_bill_month="Mar";
                                }else if($result[6]==4){
                                    $last_bill_month="Apr";
                                }else if($result[6]==5){
                                    $last_bill_month="May";
                                }else if($result[6]==6){
                                    $last_bill_month="Jun";
                                }else if($result[6]==7){
                                    $last_bill_month="Jul";
                                }else if($result[6]==8){
                                    $last_bill_month="Aug";
                                }else if($result[6]==9){
                                    $last_bill_month="Sep";
                                }else if($result[6]==10){
                                    $last_bill_month="Oct";
                                }else if($result[6]==11){
                                    $last_bill_month="Nov";
                                }else if($result[6]==12){
                                    $last_bill_month="Dec";
                                }


                               //echo "<tr class='clickable-row' data-href='viewUserProfile'".


                                $consumer_id = $result[0];
                                $account_no = $result[1];
                                $electricity = $result[2];
                                $water = $result[3];
                                $garbage = $result[4];
                                $consumer_type = $result[5];
                                $year = $result[7];
                                echo "<tr consumer_id='".$consumer_id."'".">".
                                "<td>".$consumer_id."</td>".
                                "<td>".$account_no."</td>".
                                "<td>".$last_bill_month."</td>".
                                "<td>".$year."</td>".
                                "<td>".$consumer_type."</td>".
                                "<td>".$electricity."</td>".
                                "<td>".$water."</td>".
                                "<td>".$garbage.
                                    //"<form name='myform' id=myform' method='POST'>
                                    //"<input type='hidden' name='userid' id='userid' value=' ".$result['userid']." ' />
                                //  $edit_button = array(
                                //     'type'      => 'submit',
                                //     'content'   => '<span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>',
                                //     'class'     => 'consumer-btn btn btn-sm btn-labeled btn-success'
                                // );
                                

                            



                                /*echo "<div class='form_icon'>";
                                echo validation_errors('<p class="error">' );

                                echo form_open('Consumer/archiveConsumer');
                                echo "<input type='hidden' name='consumer_id' id='consumer_id' value=' ".$result['id']." ' />";
                                echo "<button data-toggle='tooltip' title='Add Previous' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-step-backward'></span></button>";
                                //echo form_button($delete_button);
                                "</form></div>";
                                echo form_close();

                                echo "<div class='form_icon'>";
                                echo validation_errors('<p class="error">' );

                                echo form_open('Consumer/addBondDeposit');
                                echo "<input type='hidden' name='consumer_id' id='consumer_id' value=' ".$result['id']." ' />";
                                echo "<button data-toggle='tooltip' title='Add beginning' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-fast-backward'></span></button>";
                                //echo form_button($delete_button);
                                "</form></div>";
                                echo form_close();*/

                                // echo form_open('Home/deleteReading');
                                // echo "<input type='hidden' name='reading_id' id='reading_id' value='".$result['reading_id']."' />";
                                // echo "<button data-toggle='tooltip' title='Delete this reading' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-trash'></span></button>";
                                // //echo form_button($delete_button);
                                // "</form></div>";
                                // echo form_close();

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

                              <!-- Modal for the ADD Next Reading-->
  <!--div class="modal fade" id="addNextReading" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add NEXT BILLING FOR CONSUMER: <?php echo $result['reading_id']?></h4>
        </div>
        <div class="modal-body">
           <?php 
                echo form_open('Consumer/addReading');
                echo "<input type='hidden' name='reading_id' id='reading_id' value=' ".$result['reading_id']." ' />";
                echo "LAST BILLING PERIOD: ".$last_bill_month." ".$result['last_bill_year'];
                echo "LAST BILLING PERIOD: ".$last_bill_month." ".$result['last_bill_year'];
                "</form></div>";
                echo form_close(); 
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>END OF MODAL : ADD NEXT READING-->

                            </div>
                        </tbody>
                    </table>

                </div><!--end of panel-->
            </div>



        </div>
    </div>
</div>
     <script src="../../devtools/js/mytable.js">

     </script>

<!--script>
    function openForm(readingID,acctno) {
      document.getElementById("myForm").style.display = "block";
      console.log("account no: "+acctno+" reading id: "+readingID);
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
</script-->

  
<!--
<button class="open-button" onclick="openForm()">Open Form</button>


                                <div class="form-popup" id="myForm">
                                  <form action="/action_page.php" class="form-container">
                                    <h1>ADD NEXT READING TO ACCOUNT NO: </h1>

                                    <label for="email"><b>Email</b></label>
                                    <input type="text" placeholder="Enter Email" name="email" required>

                                    <label for="psw"><b>Password</b></label>
                                    <input type="password" placeholder="Enter Password" name="psw" required>

                                    <button type="submit" class="btn">Login</button>
                                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                  </form>
                                </div>
-->