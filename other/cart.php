<?php	

	include '../php_includes/connect.php';
	include 'php/checklogin.php';

	if (isset($_GET['name'])) {
		$res_name = $_GET['name'];
	}

	$msg = '';

	if (isset($_POST['pid']) && isset($_POST['pqt']) && isset($_POST['res_name'])) {
		if (isset($_SESSION['user'])) {
			$pid = $_POST['pid'];
			$pqt = $_POST['pqt'];
			$res_name = $_POST['res_name'];
			$wasFound = false;
			$i = 0;

			if (!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1) {
				$_SESSION['cart_array'] = array(0 => array('item_id' => $pid, 'quantity' => $pqt));
			}
			else {
				foreach ($_SESSION["cart_array"] as $each_item) { 
			      $i++;
			      while (list($key, $value) = each($each_item)) {
					  if ($key == "item_id" && $value == $pid) {
						  // That item is in cart already so let's adjust its quantity using array_splice()
						  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
						  $wasFound = true;
					  }
			      }
		       }
			   if ($wasFound == false) {
				   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
			   }
			}
		}
		else {
			$msg = "<h3 style='background-color:#FF3D3D; padding: 5px 0px;'  align='center'>Задолжителна е најава за додавање продукт во кошничка</h3>";
		}
	}
?>

<?php
	if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
	    unset($_SESSION["cart_array"]);
	}
?>

<?php 
	if (isset($_POST['id-to-remove']) && $_POST['id-to-remove'] != "") {
	    
	 	$key_to_remove = $_POST['id-to-remove'];
		if (count($_SESSION["cart_array"]) <= 1) {
			unset($_SESSION["cart_array"]);
		} else {
			unset($_SESSION["cart_array"]["$key_to_remove"]);
			sort($_SESSION["cart_array"]);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../assets/img/favicon.png">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">

	<link rel="stylesheet" type="text/css" href="../assets/css/cart.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/index.js"></script>
	<script type="text/javascript" src="../assets/js/ajax.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>
</head>
<body>

	<?php include '../php_includes/login_popup.php'; ?>

<header>
	
	<?php include '../php_includes/nav_menu.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12 mg-top">
				<a class="cart-btn" href="../index.php">Назад</a><br><br>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Избриши</th>
							<th>Ресторан</th>
							<th>Продукт</th>
							<th>Слика</th>
							<th>Вид</th>
							<th>Количина</th>
							<th>Цена</th>
							<th>Вкупно</th>
						</tr>
					</thead>
					<tbody>
						<?php

							$cartOutput = "";
							$total_price = 0;
							if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
						    	$cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
							}
							else {
								$i = 0; 
						    	foreach ($_SESSION["cart_array"] as $item) {
							 		$item_id = $item['item_id'];
							 		$quantity = $item['quantity'];
									$sql = mysqli_query($db, "SELECT * FROM mainmenu WHERE ThingID='$item_id' LIMIT 1");
									while ($row = mysqli_fetch_array($sql)) {
										$product_name = $row["Product"];
										$price = $row["Price"];
										$type = $row["Type"];
										$image = $row['Image'];
										$total = $price * $quantity;
										$total_price = $total + $total_price;
										$order_price = $total_price/60;
										echo "<tr>";
										echo "<th><form method='post' action='cart.php'><input class='cart-btn' type='submit' name='deleteBtn'". $item_id ." value='Избриши'></input><input type='hidden' name='id-to-remove' value='". $i ."'></input></form></th>";
										echo "<th id='res_name'>". $res_name ."</th>";
										echo "<th>". $product_name ."</th>";
										echo "<th class='image'><img src=". $image ."></th>";
										echo "<th id='type'>". $type ."</th>";
										echo "<th id='quantity'>". $quantity ."</th>";
										echo "<th>". $price .".00</th>";
										echo "<th>". $total .".00</th>";
										echo "</tr>";
										$i++;

									}   		
						    	}
							}

						?>						
					</tbody>
				</table>
				<div class="col-lg-12" style="text-align: center;">
					<a style="float: left;" class="cart-btn" href="cart.php?cmd=emptycart">Испразни</a>
					<a id='total_price' style="float: right; font-size: 18px;"><?php echo $total_price . ".00 ден."; ?></a>

					<form class="order_form" action="https://www.sandbox.paypal.com/bn/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="ljubomir.bojadziev-facilitator@gmail.com">
						<input type="hidden" name="item_name" value="Order">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="amount" value="<?php echo number_format((float)$order_price, 2, '.', ''); ?>">
						<input type="submit" class="cart-btn btnasd" name="submit" value="Нарачај">
					</form>

					<?php echo $msg; ?>
					

				</div><br>			
				
			</div>
		</div>
	</div>

</header>

<script type="text/javascript">
	$('.btnasd').click(function() {
		if ($('#total_price').html() == '0.00 ден.') {
			$('.order_form').attr('action', ' ');
			alert('Empty');
		}
	});
	$('.btnasd').click(function() {
		addCart();
	});
	$('.login-submit').click(function(){
		loginStatus('login.php');
	});
</script>

</body>
</html>