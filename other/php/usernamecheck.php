<?php

	if(isset($_POST["usernamecheck"])){
		include_once("../../php_includes/connect.php");
		$username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
		$sql = "SELECT CustomerID FROM customer WHERE Username='$username' LIMIT 1";
		
	    if ($query = mysqli_query($db, $sql)) {
	    	$uname_check = mysqli_num_rows($query);
	    	if (strlen($username) < 3 || strlen($username) > 16) {
		    echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
		    exit();
		    }
			if (is_numeric($username[0])) {
			    echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
			    exit();
		    }
		    if ($uname_check < 1) {
			    echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
			    exit();
		    } else {
			    echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
			    exit();
		    }
	    }
	    else {
	    	echo "query fail";
	    }
	}

?>