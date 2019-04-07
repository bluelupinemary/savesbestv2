
	<body>
        
		<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
		<div class="navbar-header lighten-blue">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url('login/index') ?>"><b>Plantastic Embryophytes</b></a>
		</div>
		</div>
		</nav>
		
<?php
	echo "Successful Registration. Thank you.";


?>


<script>
    $(document).ready( function () {
  
  swal({   title: "Thank You!",   text: "Account Creation Successful!",   type: "success",   confirmButtonText: "Login" },
       function (confirmed) {
                    //var confirmed = true;
                    if (confirmed) {
                                      window.location.href = "<?php echo site_url(); ?>";//reload page to see the effect of delete
                                    };
                                       
                        
                    } 
      
      );
  
}); 
</script>