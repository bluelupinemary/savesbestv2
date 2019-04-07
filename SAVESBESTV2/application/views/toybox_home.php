<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Plantastic Embryophytes</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>devtools/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>devtools/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<<?php echo base_url();?>devtools/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

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
          <a class="navbar-brand" href="#"><b>Plantastic Embryophytes</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div id="signin">
	          <form class="navbar-form navbar-right" method="POST" action="connectivity.php">
		            <div class="form-group">
		              <input type="text" placeholder="Username" class="form-control" id="user" name="user">
		            </div>
		            <div class="form-group">
		              <input type="password" placeholder="Password" class="form-control" id="pass" name="pass">
		            </div>
		            <button type="submit" class="btn btn-success" name="submit" id="submit">Sign in</button>
	          </form>
	       </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome!</h1>
        <p>Plantastic Embryophytes and where to find them</p>
        <div class="row">
        		<div class="col-md-4">
        			<p><img src="<?php echo base_url();?>devtools/images/toybox_icon.png" alt="image goes here"></img></p>
        		</div>
        		<div class="col-md-4">
        		</div>
        		<div class="col-md-4">
        			<br/><br/><br/><br/><br/>
        			<p><a class="btn btn-primary btn-lg" href="../toyBox/index.php" role="button">Start Now &raquo</a></p>
        		</div>
        </div>
      </div>
    </div>

    <?php
    	echo "Hello";
    ?>
    <?php
		$username = "it210";
		$password = "it210";
		$hostname = "localhost"; 

		//connection to the database
		$dbhandle = mysql_connect($hostname, $username, $password) 
		  or die("Unable to connect to MySQL");
		echo "<br>Connected to MySQL<br>";
	?>

      <hr>

      <footer>
        <p>&copy; Institute of Biological Sciences. UPLB. Plantastic Embryophytes and where to find them Web Application 2017</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url();?>devtools/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="devtools/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
