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
                               <center><h4>LIST ADMINS</h4></center>
                 </div>
                 <div class="panel-body">
                   
                       <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="95%">
                         <thead>
                           <tr>
                               <th>ID</th><th>Name</th><th>Designation</th><th>Action</th>
                           </tr>
                         </thead>
                           <tbody>
                              <?php
                              //print_r($results);
                              
                                  // echo "count: ".$cnt;

                               foreach($results as $result){
                            
                                  echo "<tr>".
                                           "<td>".$result['id']."</td>".
                                           "<td>".$result['name']." </td>".
                                           "<td>".$result['designation']." </td>";
                                        echo form_open('Home/updateAdmin');
                                        echo "<td><input type='hidden' name='id' id='id' value=' ".$result['id']." ' />";
                                         echo "<input type='hidden' name='name' id='name' value=' ".$result['name']." ' />";
                                          echo "<input type='hidden' name='designation' id='designation' value=' ".$result['designation']." ' />";
                                         echo "<button data-toggle='tooltip' title='Edit Admin Info' type='submit' class='btn btn-warning'>Edit Admin Info</button></td>";
                                       // echo form_button($edit_button);
                                        "</form></div>";
                                        echo form_close();
                                          
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
