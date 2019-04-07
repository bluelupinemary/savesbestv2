<link rel="stylesheet" href="<?php echo base_url();?>devtools/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>devtools/css/formodal/bootstrap.min.css">
<script src="../../devtools/js/mytable.js"></script>
<script src="../../devtools/js/formodal/bootstrap.min.js"></script>
<script src="../../devtools/js/formodal/jquery-1.11.1.min.js"></script>



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

 <!--START OF BACK TO DASHBARD ICON-->
    <br/><br/>
    <a href="<?php echo site_url('home/viewConsumersForReading')?>">
      <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Add Reading</b>
    </a>
    <!--END OF BACK TO DASHBOARD ICON-->



<!--START OF LIST CONSUMERS TABLE-->
    <div class="container">
          <div>
              <!--START OF SEARCH BOX-->
              <br/><br/>
              <div class="panel-body">
                    <table id="myTable" class="table order-list table-striped table-bordered table-hover" cellspacing="0" width="95%">
                        <thead>
                            <tr>
                                <th>Year</th><th>Month</th><th>Consumer</th><th>Address</th>
                                <th>AccountNo</th><th>Electricity</th><th>Water</th><th>Garbage</th><th style="padding-left:5%;padding-right:3%;">Action</th>
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

                                if($result['bill_month']==1){
                                    $last_bill_month="Jan";
                                }else if($result['bill_month']==2){
                                    $last_bill_month="Feb";
                                }else if($result['bill_month']==3){
                                    $last_bill_month="Mar";
                                }else if($result['bill_month']==4){
                                    $last_bill_month="Apr";
                                }else if($result['bill_month']==5){
                                    $last_bill_month="May";
                                }else if($result['bill_month']==6){
                                    $last_bill_month="Jun";
                                }else if($result['bill_month']==7){
                                    $last_bill_month="Jul";
                                }else if($result['bill_month']==8){
                                    $last_bill_month="Aug";
                                }else if($result['bill_month']==9){
                                    $last_bill_month="Sep";
                                }else if($result['bill_month']==10){
                                    $last_bill_month="Oct";
                                }else if($result['bill_month']==11){
                                    $last_bill_month="Nov";
                                }else if($result['bill_month']==12){
                                    $last_bill_month="Dec";
                                }

                                if($result['garbage_fee']==NULL or $result['garbage_fee']==''){
                                    $garbage_fee = 0;
                                }else{
                                    $garbage_fee = $result['garbage_fee'];
                                }


                               //echo "<tr class='clickable-row' data-href='viewUserProfile'".


                                $accountno = $result['account_no'];
                                echo "<tr account no='".$accountno."'".">".
                                "<td>".$result['bill_year']."</td>".
                                "<td>".$last_bill_month."</td>".
                                "<td>".$result['fullname']."</td>".
                                "<td>".$result['address']."</td>".
                                "<td>".$result['account_no']."</td>".
                                "<td><input type='text' class='form-control' size='10' value='".$result['electricity_reading']."'</td>".
                                "<td><input type='text' class='form-control' size='10' value='".$result['water_reading']."'</td>".
                                "<td><input type='text' class='form-control' size='10' value='".$garbage_fee."'</td>".
                                

                                "<td>";
                                echo "<div class='form_icon'>";
                                echo validation_errors('<p class="error">' );

                                //echo form_open('Consumer/addReading');
                                echo "<input type='hidden' name='reading_id' id='reading_id' value=' ".$result['id']." ' />";
                                echo "<button id='addrow' data-toggle='tooltip'  title='Add Next Reading' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-step-forward'></span></button>";
                               // echo "<button data-toggle='tooltip' title='Add Next Reading' type='submit' onclick='openForm(".$result['reading_id'].",".$result['account_no'].")' class='consumer-btn'><span class='glyphicon glyphicon-step-forward'></span></button>";
                               // echo "<button data-toggle='modal' data-target='#addNextReading' href='#modal".$result['reading_id'],$result['last_bill_year']."title='Add Next' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-step-forward'></span></button>";
                               // echo form_button($edit_button);
                                // "</form></div>";
                                // echo form_close();



                                echo "<div class='form_icon'>";
                                echo validation_errors('<p class="error">' );

                                echo form_open('Consumer/viewConsumersForReading');
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
                                echo form_close();

                                echo form_open('Home/deleteReading');
                                echo "<input type='hidden' name='reading_id' id='reading_id' value='".$result['id']."' />";
                                echo "<button data-toggle='tooltip' title='Delete this reading' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-trash'></span></button>";
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

                </div><!--end of panel-->
            </div>



    </div>
  </div>
</div>

<script>
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

       // cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
       // cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';
       // cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

        //

        cols = cols+"<td>"+"<?php echo $result['bill_year']; ?>"+"</td>";
        cols = cols+"<td>"+"<?php echo $result['bill_month']; ?>"+"</td>";
        cols = cols+"<td>"+"<?php echo $result['fullname']; ?>"+"</td>";
        cols = cols+"<td>"+"<?php echo $result['address']; ?>"+"</td>";
        cols = cols+"<td>"+"<?php echo $result['account_no']; ?>"+"</td>";
        cols += "<td><input type='text' id='electricity_reading' class='form-control' size='10' value=''</td>";
        cols += "<td><input type='text' id='water_reading' class='form-control' size='10' value=''</td>";
        cols += "<td><input type='text' id='garbage_fee' class='form-control' size='10' value=''</td>";
        //cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';

        cols = cols+"<td><div class='form_icon'><input type='hidden' name='reading_id' id='reading_id' value='<?php echo $result['bill_year']; ?>' />"
        +"<button id='addrow' data-toggle='tooltip' title='Add Next Reading' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-step-forward'></span></button>"
        +'<input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete">';

        +"</div></td>";

                                
                              //  echo "";
                               // echo "<button id='addrow' data-toggle='tooltip' title='Add Next Reading' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-step-forward'></span></button>";
                                // "</form></div>";
                                // echo form_close();


/*
                                echo "<div class='form_icon'>";
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
                                echo form_close();

                                echo form_open('Home/deleteReading');
                                echo "<input type='hidden' name='reading_id' id='reading_id' value='".$result['id']."' />";
                                echo "<button data-toggle='tooltip' title='Delete this reading' type='submit' class='consumer-btn'><span class='glyphicon glyphicon-trash'></span></button>";
                                //echo form_button($delete_button);
                                "</form></div>";
                                echo form_close();*/



        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});

function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
</script>
