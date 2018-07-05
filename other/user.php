<?php
	include '../php_includes/connect.php';
	include 'php/checklogin.php';

	if (isset($_GET['user']) && $_GET['user'] == $_SESSION['user']) {
		$user = $_GET['user'];
		$sql = "SELECT * FROM customer WHERE Username='$user'";
		if ($query = mysqli_query($db,$sql)) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$cusID = $row['CustomerID'];
				$fname = $row['First Name'];
				$lname = $row['Last Name'];
				$email = $row['Email'];
				$address = $row['Address'];
				$activated = $row['Activated'];
			}
		}
		$sql = "SELECT TotalPrice, Date FROM morder  WHERE CustomerID='$cusID' LIMIT 1";
		if ($query = mysqli_query($db, $sql)) {
			$num_rows = mysqli_num_rows($query);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$price = $row['TotalPrice'];
					$sqldate = $row['Date'];
					$date = strtotime($sqldate);
					$d = date("j F Y", $date);
				}
			}
			else {
				$price = ' ';
				$d = ' ';
			}
		}
	}
	else {
		header("Location: ../index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../assets/img/favicon.png">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/register.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/user.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/index.js"></script>
	<script type="text/javascript" src="../assets/js/ajax.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>
</head>
<body>

	<header>
		
		<?php include '../php_includes/nav_menu.php'; ?>

		<div class="container">
			<div class="row">
				<div class="user-cont col-lg-8 centered">
					<div class="avatar"></div><br>
					<h2 id="username"><?php echo $user; ?></h2><br>
					<p><b>Име: </b><span><?php echo $fname; ?></span></p><br>
					<p><b>Презиме: </b><span><?php echo $lname; ?></span></p><br>
					<p><b>Е-mail: </b><span><?php echo $email; ?></span></p><br>
					<p><b>Адреса: </b><span><?php echo $address; ?></span></p><br>
					<p><b>Последна нарачка: </b><span><?php echo $d; ?></span><span> | <b>Цена:</b> <?php echo $price; ?>ден.</span></p><br>
				</div>
			</div>
		</div>


	</header>

</body>
</html>