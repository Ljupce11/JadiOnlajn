<?php 
	session_start();
	include '../php_includes/connect.php';

	if (isset($_POST['r']) && isset($_POST['q']) && isset($_POST['t']) && isset($_POST['p'])) {
		$r = $_POST['r'];
		$q = $_POST['q'];
		$t = $_POST['t'];
		$p = $_POST['p'];
		$user = $_SESSION['user'];
		$date = date("Y-m-d H:i:s");

		$sql = "SELECT RestorantID FROM restorants WHERE Name='$r'";
		$query = mysqli_query($db, $sql) or die("acd");
		$num_rows = mysqli_num_rows($query) or die("asddd");
		if ($num_rows > 0) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$resID = $row['RestorantID'];
				echo "ok";
			}
		} else {
			echo "errorA";
		}
	
		$sql = "SELECT CustomerID, Email FROM customer WHERE Username='$user'";
		$query = mysqli_query($db, $sql) or die("asd1");
		$num_rows = mysqli_num_rows($query) or die("asd2");
		if ($num_rows > 0) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$cusID = $row['CustomerID'];
				$email = $row['Email'];
				echo $email;
				echo "ok";
			}
		} else {
			echo "errorB";
		}

		if ($t == 'Food') {
			$sql = "INSERT INTO `orderfood` (`CustomerID`, `RestorantID`, `Quantity`)
					VALUES ('$cusID', '$resID', '$q')";
			if ($query = mysqli_query($db, $sql)) {
				echo "success";
			}
			else {
				echo "fail";
			}

			$sql = "SELECT OrderFID FROM orderfood WHERE CustomerID='$cusID' AND Quantity='$q'";
			$query = mysqli_query($db, $sql) or die("asd1");
			$num_rows = mysqli_num_rows($query) or die("asd2");
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$OrderFID = $row['OrderFID'];
					echo "ok";
				}
			} else {
				echo "errorB";
			}

			$sql = "INSERT INTO `morder` (`OrderFID`, `TotalPrice`, `CustomerID`, `Date`)
					VALUES ('$OrderFID', '$p', '$cusID', '$date')";
			if ($query = mysqli_query($db, $sql)) {
				echo "success";
			}
			else {
				echo "fail123";
			}

		}
		else {
			$sql = "INSERT INTO `orderdrink` (`CustomerID`, `RestorantID`, `Quantity`)
					VALUES ('$cusID', '$resID', '$q')";
			if ($query = mysqli_query($db, $sql)) {
				echo "success";
			}
			else {
				echo "fail";
			}

			$sql = "SELECT OrderDID FROM orderdrink WHERE CustomerID='$cusID' AND Quantity='$q'";
			$query = mysqli_query($db, $sql) or die("asd1");
			$num_rows = mysqli_num_rows($query) or die("asd2");
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$OrderDID = $row['OrderDID'];
					echo "ok";
				}
			} else {
				echo "errorB";
			}

			$sql = "INSERT INTO `morder` (`OrderDID`, `TotalPrice`, `CustomerID`, `Date`)
					VALUES ('$OrderDID', '$p', '$cusID', '$date')";
			if ($query = mysqli_query($db, $sql)) {
				echo "success";
			}
			else {
				echo "fail123";
			}		

		}

			$to = "$email";
			$from = "contact@jadiOnlajn.com";
			$subject = "Успешна Нарачка";
			$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title></title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href=""><img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-check-icon.png" width="36" height="30" alt="websitename" style="border:none; float:left;"></a>Порака</div><div style="padding:24px; font-size:17px;">Нарачката е успешна.</div></body></html>';
			$headers = "From: $from\n";
	        $headers .= "MIME-Version: 1.0\n";
	        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
			mail($to, $subject, $message, $headers);
			echo "success1";

	}
	else {
		echo "failasd";
	}
?>



