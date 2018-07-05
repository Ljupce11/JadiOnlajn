<?php
	include 'php/checklogin.php';

	if (isset($_POST['n']) && isset($_POST['mail']) && isset($_POST['msg'])) {
		$name = $_POST['n'];
		$mail = $_POST['mail'];
		$msg = $_POST['msg'];

		$to = "$mail";
		$from = "contact@jadiOnlajn.com";
		$subject = "Contact Message";
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title></title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href=""><img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-check-icon.png" width="36" height="30" alt="websitename" style="border:none; float:left;"></a>Порака</div><div style="padding:24px; font-size:17px;">'.$msg.'</div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		echo "success";
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Контакт</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../assets/img/favicon.png">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/register.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/contact.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/index.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>
	<script type="text/javascript" src="../assets/js/ajax.js"></script>
</head>
<body>

	<div class="overlay9"></div>

		<!-- Login Section -->

	<?php include '../php_includes/login_popup.php'; ?>

	<header>
		
		<?php include '../php_includes/nav_menu.php' ?>

		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 reg">
					<div class="blur"></div>
						
						<form spellcheck="false">
							<h3>Контакт</h3>
						  <div class="form-group">  	
						    <label for="exampleInputEmail1">Име</label>
						    <input type="text" class="form-control inp" id="contactName" aria-describedby="emailHelp">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Email адреса</label>
						    <input type="email" class="form-control inp" id="contactMail">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Порака</label>
						    <textarea class="form-control inp ta" id="contactMsg" rows="7"></textarea>
						  </div>

						  <div class="form-group">
						    <button type="button" class="contactBtn register-submit">Испрати</button><br>
						    <span id="status"></span>
						  </div>							  
						</form>						
					
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 map">
					<div class="blur"></div>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3786.3869914818592!2d22.18303346649623!3d41.745389562850306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x408394ed6daf953a!2z0JrQsNC80L_Rg9GBIDIsINCj0JPQlA!5e1!3m2!1sen!2smk!4v1513275269362
	      					&zoom=17
	     					&key=AIzaSyBhsBQ7Ew_fE9PCRKlUMhd3UOQ3dJJWkHM" allowfullscreen>
						</iframe>
					</div><br>
					<p style="color: white;">Кампус 2, УГД - Штип - Република Македонија</p>
					<p style="color: white;">Campus 2, UGD - Stip - Republic of Macedonia</p>
					<p style="color: white;">contact@JadiOnlajn.com</p>
					<p style="color: white;">077/ 707 - 755</p>			
				</div>

			</div>
		</div>

	</header>

	<script type="text/javascript">
		$('.contact').toggleClass('active').removeAttr('href');
		$('.contactBtn').click(function() {
			contact();
		});
	</script>

</body>
</html>