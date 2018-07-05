<?php

	include 'php/checklogin.php';

	if (isset($_POST['u'])) {
		include '../php_includes/connect.php';

			$u = $_POST['u'];
			$p = md5($_POST['p']);

			$sql = "SELECT * FROM customer WHERE Username='$u' AND Password='$p'";
			if ($query = mysqli_query($db, $sql)){
				$num_rows = mysqli_num_rows($query);
				if ($num_rows > 0){
					$_SESSION['user'] = $u;
					echo 'success';
					exit();
				}
				else {
					echo "num_rows error";
					exit();
				}	
			}
			else {
				echo "Login Fail!";
				exit();
			}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Најава</title>
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
							<h3>Најава</h3>
						    <div class="form-group c">
						    	<label for="exampleInputEmail1">Корисничко име</label>
						    	<input type="text" class="form-control inp" id="username" name="username">
						    </div>
							<div class="form-group f">
							    <label for="exampleInputEmail1">Лозинка</label>
							    <input type="password" class="form-control inp" id="password" name="password">
							</div>

							<div class="form-group g">
							    <button type="button" class="login-submit">Најави се</button><br>
							    <span id="status"></span>
							</div>							  
						</form>						
					
				</div>
			</div>
		</div>
	</header>

	 <script type="text/javascript">
		$('.login-submit').click(function(){
			loginStatus('login.php');
		});
	</script>

</body>
</html>