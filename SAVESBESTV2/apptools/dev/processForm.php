<?php	
	// Get all the variables indicated in the hidden input element with ID 'vardec'
        $variables = explode(",",$_POST['vardec']);
        
        
        // Arrays for each available datatype
		$RDUCKY = [];
		$NUMBLK = [];
		$LETBLK = [];
		// $JROPE = []. JROPE is not yet supported(?)
		
		/**
		 * Loop through the variables list. Split each string using '_'. The following info will be obtained:
		 * info[0]: datatype (e.g. rducky, numblk)
		 * info[1]: variable name
		 * info[2]: the value given to that variable
		**/
		foreach($variables as $var) {
			$info = explode("_",$var);
			
			if(strcmp($info[1],"rducky")==0) {
				$RDUCKY[$info[2]] = $info[3];
			}
			else if(strcmp($info[1],"numblk")==0) {
				$NUMBLK[$info[2]] = $info[3];
			}
			else if(strcmp($info[1],"letblk")==0) {
				$LETBLK[$info[2]] = $info[3];
			}
		}
		
		$fvariables = explode(",",$_POST['fxndec']);
		$FRDUCKY = [];
		$FNUMBLK = [];
		$FLETBLK = [];

		foreach($fvariables as $fvar) {
			
			$info = explode("_",$fvar);
			if(strcmp($info[1],"rducky")==0) {
				$FRDUCKY[$info[2]] = $info[3];
			}
			else if(strcmp($info[1],"numblk")==0) {
				$FNUMBLK[$info[2]] = $info[3];
			}
			else if(strcmp($info[1],"letblk")==0) {
				$FLETBLK[$info[2]] = $info[3];
			}
		}
		
		// This part just echoes all of the gathered elements in the drag and drop interface in the text editor interface
		echo "OPENBOX\n\n";
              
		foreach($RDUCKY as $key=>$value) {
			if(empty($value) || $value == " ") {
				echo "RDUCKY ".$key."#\n";
			}
			else {
				echo "RDUCKY ".$key." AS ".$value."#\n";
			}
		}

		foreach($NUMBLK as $key=>$value) {
			if(empty($value) || $value == " ") {
				echo "NUMBLK ".$key."#\n";
			}
			else {
				echo "NUMBLK ".$key." AS ".$value."#\n";
			}
		}

		foreach($LETBLK as $key=>$value) {
			if(empty($value) || $value == " ") {
				echo "LETBLK ".$key."#\n";
			}
			else {
				echo "LETBLK ".$key." AS ".$value."#\n";
			}
		}
	
		echo "\n";
		echo "\n";
		
		$hh = explode(",",$_POST['maincode']);	
		$showState = 0;
		$varCount = 0;
		foreach($hh as $hhtok) {
			
			$token = explode("_",$hhtok);
			
			if($token[1] == "hoola") {
				echo "HOOLA ";
			}
			else if($token[1] == "hoop") {
				echo " HOOP\n";
			}
			else if($token[1] == "mbo") {
				echo "MATCHBOARD [\n";
			}
			else if($token[1] == "semic") {
				echo ":\n";
			}
			else if($token[1] == "mbc") {
				echo "\n]\n";
			}
			else if(preg_match('~hole~',$token[1])) {
				echo "HOLE ";
			}
			else if($token[1] == "pareo") {
				echo " ( ";
			}
			else if($token[1] == "parec") {
				echo " ) ";
			}
			else if($token[1] == "com") {
				echo ",";
			}
			else if($token[1] == "expt") {
				echo " !\n";
			}
			else if($token[1] == "collect") {
				echo "COLLECT ";
			}
			else if($token[1] == "show") {
				echo "SHOW ";
			}
			else if($token[1] == "give") {			
				echo "GIVE ";
			}
			else if($token[1] == "find") {
				echo "FIND_PLAYMATE ";
			}
			else if($token[1] == "lt") {
				echo " SMALLER_THAN ";
			}
			else if($token[1] == "gt") {
				echo " BIGGER_THAN ";
			}
			else if($token[1] == "lte") {
				echo " AS_SMALL_AS ";
			}
			else if($token[1] == "gte") {
				echo " AS_BIG_AS ";
			}
			else if($token[1] == "eq") {
				echo " THE_SAME_AS ";
			}
			else if($token[1] == "neq") {
				echo " NOT_THE_SAME_AS ";
			}
			else if($token[1] == "add") {
				echo " + ";
			}
			else if($token[1] == "sub") {
				echo " - ";
			}
			else if($token[1] == "mul") {
				echo " * ";
			}
			else if($token[1] == "div") {
				echo " / ";
			}
			else if($token[1] == "mod") {
				echo " % ";
			}
			else if($token[1] == "and") {
				echo " AND ";
			}
			else if($token[1] == "or") {
				echo " OR ";
			}
			else if($token[1] == "not") {
				echo " NOT ";
			}
			else if($token[1] == "as") {
				echo " AS ";
			}
			else if($token[1] == "rducky" || $token[1] == "numblk" || $token[1] == "letblk" || $token[1] == "mbox") {
				echo $token[2];
			}
			else if($token[1] == "alnum"){
				echo $token[3];
			}
			else if($token[1] == "hash") {
				echo "#\n";
			}
		}

		$hh = explode(",",$_POST['fxncode']);
		$showState = 0;
		$varCount = 0;
		$declare = 0;
		foreach($hh as $hhtok) {
			
			$token = explode("_",$hhtok);
			if($token[1] == "hoola") {
				echo "HOOLA ";
			}
			else if($token[1] == "hoop") {
				echo " HOOP\n";
			}
			else if($token[1] == "mbo") {
				echo "MATCHBOARD [\n";
			}
			else if($token[1] == "semic") {
				echo ":\n";
				if($declare == 0) {
						foreach($FRDUCKY as $key=>$value) {
							if(empty($value) || $value == " ") {
								echo "RDUCKY ".$key."#\n";
							}
							else {
								echo "RDUCKY ".$key." AS ".$value."#\n";
							}
						}

						foreach($FNUMBLK as $key=>$value) {
							if(empty($value) || $value == " ") {
								echo "NUMBLK ".$key."#\n";
							}
							else {
								echo "NUMBLK ".$key." AS ".$value."#\n";
							}
						}

						foreach($FLETBLK as $key=>$value) {
							if(empty($value) || $value == " ") {
								echo "LETBLK ".$key."#\n";
							}
							else {
								echo "LETBLK ".$key." AS ".$value."#\n";
							}
						}

						echo "\n\n";
						$declare = 1;
					}
			}
			else if($token[1] == "mbc") {
				echo "\n]\n";
			}
			else if(preg_match('~hole~',$token[1])) {
				echo "HOLE ";
			}
			else if($token[1] == "pareo") {
				echo " ( ";
			}
			else if($token[1] == "parec") {
				echo " ) ";
			}
			else if($token[1] == "com") {
				echo ",";
			}
			else if($token[1] == "expt") {
				echo " !\n";
			}
			else if($token[1] == "collect") {
				echo "COLLECT ";
			}
			else if($token[1] == "show") {
				echo "SHOW ";
			}
			else if($token[1] == "give") {
				echo "GIVE ";
			}
			else if($token[1] == "ppo") {
				echo "\nOPEN_PLAYPEN ";
			}
			else if($token[1] == "ppc") {
				echo "\nCLOSE_PLAYPEN\n";
			}
			else if($token[1] == "return") {
				echo "RETURN_TO_PLAYMATE ";
			}
			else if($token[1] == "find") {
				echo "FIND_PLAYMATE ";
			}
			else if($token[1] == "lt") {
				echo " SMALLER_THAN ";
			}
			else if($token[1] == "gt") {
				echo " BIGGER_THAN ";
			}
			else if($token[1] == "lte") {
				echo " AS_SMALL_AS ";
			}
			else if($token[1] == "gte") {
				echo " AS_BIG_AS ";
			}
			else if($token[1] == "eq") {
				echo " THE_SAME_AS ";
			}
			else if($token[1] == "neq") {
				echo " NOT_THE_SAME_AS ";
			}
			else if($token[1] == "add") {
				echo " + ";
			}
			else if($token[1] == "sub") {
				echo " - ";
			}
			else if($token[1] == "mul") {
				echo " * ";
			}
			else if($token[1] == "div") {
				echo " / ";
			}
			else if($token[1] == "mod") {
				echo " % ";
			}
			else if($token[1] == "and") {
				echo " AND ";
			}
			else if($token[1] == "or") {
				echo " OR ";
			}
			else if($token[1] == "not") {
				echo " NOT ";
			}
			else if($token[1] == "as") {
				echo " AS ";
			}
			else if($token[1] == "rducky" || $token[1] == "numblk" || $token[1] == "letblk" || $token[1] == "mbox") {
				if($declare==1) {				
					echo $token[2];
				}
			}
			else if($token[1] == "alnum"){
				echo $token[3];
			}
			else if($token[1] == "hash") {
				echo "#\n";
			}
		}
		
		echo "\n";
		echo "CLOSEBOX";
?>
