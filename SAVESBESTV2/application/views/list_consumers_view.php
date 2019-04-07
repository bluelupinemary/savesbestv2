<body>
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
      <br/><br/>
      <a href="<?php echo site_url('home')?>">
        <img class="home-icon" src="<?php echo base_url();?>devtools/images/bill/home_icon.png" height="30px" width="30px"><b>&nbsp&nbspBack to Dashboard</b>
      </a>
         <div class="container">
            <div class="row-head row">
                <div class="panel panel-primary user-profile">
                 <div class="panel-heading">
                               <center><h4>LIST CONSUMERS</h4></center>
                 </div>
                 <div class="panel-body">
                       <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="95%">
                         <thead>
                           <tr>
                               <th>ID</th><th>Account No</th><th>Name</th><th>Address</th>
                               <th>Consumer Type</th>
                           </tr>
                         </thead>
                           <tbody>
                              <?php
                               $cnt=count($results);
                               $i=1;
                               $consumertype;
                               $userdata = array();
                                  // echo "count: ".$cnt;

                               foreach($results as $result){
                                 if($result['consumer_type']=="RES"){
                                     $consumertype="Residential";
                                 }else if($result['consumer_type']=="COM"){
                                     $consumertype="Commercial";
                                 }else{
                                     $consumertype="Institute";
                                 }


                                  echo "<tr>".
                                           "<td>".$i."</td>".
                                           "<td>".$result['account_no']."</td>".
                                           "<td>".$result['fullname']."</td>".
                                           "<td>".$result['address']."</td>".
                                           "<td>".$consumertype."</td>";
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
