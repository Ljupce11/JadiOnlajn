<?php
	include '../php_includes/connect.php';
	include 'php/checklogin.php';

	if (isset($_GET['name'])) {
		$res_name = $_GET['name'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $res_name; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../assets/img/favicon.png">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/register.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/restaurant.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/index.js"></script>
	<script type="text/javascript" src="../assets/js/ajax.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>
</head>
<body>

	<div class="overlay9"></div>

		<!-- Login Section -->

	<?php include '../php_includes/login_popup.php'; ?>

	<header>
		
		<?php include '../php_includes/nav_menu.php'; ?>

		<div class="container">
			<div class="row">

				<div class="cart">
					<a href="cart.php?name=<?php echo $res_name; ?>"><i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i></a>
				</div>

				<div class="col-lg-6 col-md-6 rest"><br>
					<h1 class="res_name"><?php echo $res_name; ?></h1>
					<h4 class="type">Вид на храна</h4><br>
					<h4 class="type">Време за достава: 45 минути</h4>
					<h4 class="type">Просечно време за достава: 40 минути</h4><br>
					<h4 class="type"><i class="far fa-clock "></i> Понеделник: 09:00 - 23:00</h4>
					<h4 class="type"><i class="far fa-money-bill-alt"></i> Мин. нарачка: 400 ден. + достава</h4>
					<h4 class="type"><i class="far fa-credit-card"></i> Плаќање: во готово/со картица</h4><br>
				</div>
			</div>
		</div>

	</header>

	<h1 class="h-menu">МЕНИ</h1>

	<div class="container mgn">
		<div class="row">

		  		<?php

					$sql = "SELECT ThingID, Product, Image, Price FROM mainmenu";
					if ($query = mysqli_query($db, $sql)) {
					$numrows = mysqli_num_rows($query);
						if ($numrows > 0)
							while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
								echo 
								'

							    <div class="col-lg-3 col-sm-6 col-xs-12">
							      	<div class="box">
								      	<a>
								      		<div class="zoom-in">
								      		<img class="img-responsive res-logo" src="'. $row['Image'] .'"></div>
								      	</a>
								      	<div class="content1">
								      		<div class="res-name">
								      			<span class="name">'. $row['Product'] .'</span>
								      			<i class="fas fa-star"></i>
										        <i class="fas fa-star"></i>
										        <i class="fas fa-star"></i>
										        <i class="fas fa-star"></i>
										        <i class="fas fa-star"></i>
								      		</div>
								      		<div class="delivery">
								      			<i class="fas fa-minus"> </i><span class="quantity">1</span><i class="fas fa-plus"> </i>
								      		</div>
								      		<div class="del-price">
								      			<p>Цена: '. $row['Price'] .'ден.</p>
								      		</div>
								      		<div class="add-cart">
								      			<form name="form1" method="post" action="cart.php">
								      				<input type="hidden" name="pqt" class="pqt" value="1" />
											        <input type="hidden" name="pid" value="'. $row['ThingID'] . '" />
											        <input type="hidden" name="res_name" value="'. $res_name . '" />
											        <input type="submit" name="button" class="add-cart-button" value="Додади во кошничка" />
											    </form>
								      		</div>
								      	</div>
							      	</div>
							  	</div>

								';
							}
					}
					else {
						echo "Query Fail";
					}

				?>


		</div>
	</div>

</body>
</html>