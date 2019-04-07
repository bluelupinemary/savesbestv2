<?php
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'toyboxdb');
	define('DB_USER', 'it210');
	define('DB_PASSWORD', 'it210');

	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die ("Failed to connect to mysql: ".mysql_error());
	$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to mysql: ".mysql_error());
	echo "SUCCESSFULLY<br>";
	echo "value: ".$_POST['user'];
	/*
	$ID = $_POST['user'];
	$password = $_POST[pass];
	*/

	function signIn(){
		session_start();	//starting the session for the user profile page

		if(!empty($_POST['user'])){
			echo "lol";
			$query = mysql_query("select * from account where username='$_POST[user]' and password='$_POST[pass]'") or die(mysql_error());
			$row = mysql_fetch_array($query) or die(mysql_error());

			
			if(!empty($row['account']) and !empty($row['pass'])){
				$_SESSION['account'] = $row['pass'];
				echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
			}else{
				echo "SORRY... YOU ENTERED WRONG ID AND PASSWORD.. PLEASE RETRY";
			}

		}
		

	}

	if(isset($_POST['submit'])){
		
		echo "has val: ";
		signIn();
	}


?>