

<?php

	if(isset($_GET['u']) && isset($_GET['e']) && isset($_GET['p'])){

		include_once('../../php_includes/connect.php');
		$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
		$e = mysqli_real_escape_string($db, $_GET['e']);
		$p = mysqli_real_escape_string($db, $_GET['p']);

		if (strlen($u) < 3 || strlen($e) < 5 || strlen($p) < 10){
			header("location: message.php?msg=activation_string_length_issue");
			exit();
		}

		$sql = "SELECT * FROM customer WHERE Username='$u' AND Email='$e' AND Password='$p' LIMIT 1";
		$query = mysqli_query($db, $sql);
		$exist = mysqli_num_rows($query);

		if ($exist == 0){
			header("location: message.php?msg=Your credentials aren't matching anything in our system!");
			exit();
		}

		$sql = "UPDATE customer SET activated='1' WHERE Username='$u' LIMIT 1";
		$query = mysqli_query($db, $sql);
		$numRows = mysqli_num_rows($query);

		$sql = "SELECT * FROM customer WHERE activated='1' AND Username='$u' LIMIT 1";
		$query = mysqli_query($db, $sql);
		$numrows = mysqli_num_rows($query);

		if ($numrows == 0) {
			header("location: message.php?msg=Activation_Failure");
			exit();
		}
		else if ($numrows == 1){
			header("location: message.php?msg=Activation_Successful");
			exit();
		}
	}
	else {
		header("location: message.php?msg=Missing GET Variables");
		exit();
	}

?>