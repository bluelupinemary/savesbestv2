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
              //  echo "<a href='#'><b>User: $username</b></a>";
            ?>
           </div>
       <div class="col-md-4">
             <a class="btn btn-primary" href="<?php echo site_url('home/logout')?>" role="button">Logout</a>
      </div>
  </div>
</nav>



<script>
    var msg = <?php echo $msg ?>;
    $(document).ready( function () {
      
    if(msg==1){
        swal({   title: "Success!",   text: "Delete Reading Action Successful!",   type: "success",   confirmButtonText: "Back to Reading View" },
       function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                                      window.location.href = "<?php echo site_url() ?>/home/addReading";//reload page to see the effect of delete
                                    };
                                       
                        
                    } 
      
      );
    }
  
}); 
</script>