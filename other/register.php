<?php

	include 'php/checklogin.php';
	
	if (isset($_POST["u"])){
	include_once("../php_includes/connect.php");
	$u = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
	$e = mysqli_real_escape_string($db, $_POST['e']);
	$p = md5($_POST['p']);
	$a = preg_replace('#[^a-z0-9]#i', '', $_POST['a']);
	$fn = preg_replace("#[^a-z ]#i", '', $_POST['fn']);
	$ln = preg_replace("#[^a-z ]#i", '', $_POST['ln']);
	
	$sql = "SELECT CustomerID FROM customer WHERE Username='$u' LIMIT 1";
	$query = mysqli_query($db, $sql) or die("query fail1 ");
	$uCheck = mysqli_num_rows($query);

	$sql = "SELECT CustomerID FROM customer WHERE Email = '$e' LIMIT 1";
	$query = mysqli_query($db, $sql) or die("query fail 2 ");
	$eCheck = mysqli_num_rows($query);

	if ($u == "" || $e == "" || $p == "" || $fn == "" || $ln == "" || $a == ""){
		echo "Please fill out all form data!";
		exit();
	}
	else if ($uCheck > 1){
		echo "The Username is already in use!";
		exit();
	}
	else if ($eCheck > 1){
		echo "The Email address is already in use!";
		exit();
	}
	else if (strlen($u) < 3 || strlen($u) > 16) {
		echo '3 - 16 characters please';
		exit();
	}
	else if (is_numeric($u[0])){
		echo "The Username must start with a letter!";
	}
	else {
			//If signup is successfull, insert data to DB
		//Insert user info to database
		$sql = "INSERT INTO `customer` (`First Name`, `Last Name`, `Username`, `Email`, `Address`, `Password`)
				VALUES ('$fn', '$ln', '$u', '$e', '$a', '$p');";
		if ($query = mysqli_query($db, $sql)) {

		}
		else {
			echo "query fail 3";
		}

		$to = "$e";
		$from = "auto_responder@jadiOnlajn.com";
		$subject = "Account Activation";
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title></title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.ktbffh000webhostapp.com"><img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-check-icon.png" width="36" height="30" alt="websitename" style="border:none; float:left;"></a>Активација на профил</div><div style="padding:24px; font-size:17px;">Hello '.$u.',<br /><br />Кликнете го линкот за да го активирате профилот:<br /><br /><a href="http://localhost/Projects/JadiOnlajn/other/php/activation.php?u='.$u.'&e='.$e.'&p='.$p.'">Кликнете овде за активација на профилот</a><br /><br />После активацијата, најавете се на профилот со следната маил адреса:<br />* E-mail адреса: <b>'.$e.'</b></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		echo "signup_success";
		exit();
	}
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрација</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../assets/img/favicon.png">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/index.js"></script>
	<script type="text/javascript" src="../assets/js/ajax.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>
</head>
<body>

	<header>

			<!-- Navigation Menu -->

		<?php include '../php_includes/nav_menu.php'; ?>

		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 centered reg">
					<div class="blur"></div>
						
						<form spellcheck="false">
							<h3>Регистрација</h3>
						  <div class="form-group a">  	
						    <label for="exampleInputEmail1">Име</label>
						    <input type="text" class="form-control inp" id="fname" name="fname">
						  </div>
						  <div class="form-group b">
						    <label for="exampleInputEmail1">Презиме</label>
						    <input type="text" class="form-control inp" id="lname" name="lname">
						  </div>
						  <div class="form-group c">
						    <label for="exampleInputEmail1">Корисничко име</label>
						    <input type="text" class="form-control inp" id="username" name="username" onblur="checkUsername('username')">
						    <span id="unamestatus"></span>
						  </div>
						  <div class="form-group d">
						    <label for="exampleInputPassword1">Адреса</label>
						    <input type="text" class="form-control inp" id="adress" name="adress">
						  </div>
						  <div class="form-group e">
						    <label for="exampleInputPassword1">Email адреса</label>
						    <input type="email" class="form-control inp" id="email" name="email">
						  </div>
						  <div class="form-group f">
						    <label for="exampleInputEmail1">Лозинка</label>
						    <input type="password" class="form-control inp" id="password" name="password">
						  </div>

						  <div class="form-group g">
						    <button type="button" class="register-submit">Регистрирај се</button><br>
						    <span id="status"></span>
						  </div>							  
						</form>						
					
				</div>
			</div>
		</div>
	</header>

	 <script type="text/javascript">
		$('.b1').click(function() {
			window.location.replace("http://localhost/Projects/JadiOnlajn/other/login.php");
		});
		$('.register-submit').click(function(){
			signupStatus();
		});
	</script>

</body>
</html>