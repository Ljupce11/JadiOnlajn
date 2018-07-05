<?php

	$message = "No Message";
	$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
	if ($msg == 'Activation_Failure'){
		$message = 'Activation Error! Sorry there seems to have been an issue activating your account at this time. We have already notified ourselves of this issue and we will contact you via email when we have identified the issue.';
	}
	else if ($msg == 'Activation_Successful'){
		$message = 'Aктивацијата на вашиот профил е успешна!. <a href="../../other/login.php">Најави се</a>';
	}
	else {
		$message = $msg;
	}

?>
<h1 style="text-align: center; padding-top: 50px;"><?php echo $message; ?></h1>