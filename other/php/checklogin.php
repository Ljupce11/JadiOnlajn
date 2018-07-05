<?php

	session_start();

	if (!isset($_SESSION['user'])){
		$user = "Најави се";
		$logout = 'Регистрирај се';
	}
	else {
		$user = $_SESSION['user'];
		$logout = 'Одјави се';
	}

?>