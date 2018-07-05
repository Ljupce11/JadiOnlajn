<?php
	include 'php_includes/connect.php';
	include 'other/php/checklogin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Јади Онлајн</title>
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/img/favicon.png">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/index.js"></script>
	<script type="text/javascript" src="assets/js/ajax.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</head>
<body>

		<!-- Login Section -->

	<?php include 'php_includes/login_popup.php'; ?>

	<header>

			<!--  Navigation Menu -->

			<?php include 'php_includes/nav_menu.php'; ?>

			<!-- Company Logo and search bar -->

		<div class="container logo-cont">

			<div class="row">
			  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 centered">
			  	<a href="index.php"><img class="img-fluid" src="assets/img/logo.png"></a>
			  </div>
			</div>
		
				<div class="form-group row">
					<div class="col-lg-6 col-xs-4 centered">
							<input type="text" name="search" class="form-control input-lg search" id="search">
							<div class="col-lg-2 centered">
								<button class="form-control btn-lg input-lg search-submit"><i class="fas fa-search"></i></button>
							</div>
					</div>						
				</div>

		</div>
	</header>

	
		<!-- Main content section -->

	<section>
		<br><br><br>
	<div class="container">
  		<div class="row"> 

  			<?php

  			if (isset($_POST['search'])) {
				$input = $_POST['search'];

				$sql = "SELECT Name, Image FROM restorants WHERE Name='$input'";
				if ($query = mysqli_query($db, $sql)) {
					$num_rows = mysqli_num_rows($query);
					if ($num_rows > 0) {
						while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

							echo 
							'
							    <div class="col-lg-4 col-sm-6 col-xs-12">
							      	<div class="box">
								      	<a href="other/restaurant.php?name='.$row['Name'].'">
								      		<div class="zoom-in">
								      		<img class="img-responsive res-logo" src="'. $row['Image'] .'"></div>
								      	</a>
								      	<div class="content1">
								      		<div class="res-name">
								      			<p>'. $row['Name'] .'</p>
								      		</div>
								      		<div class="delivery">
								      			<i class="fa fa-truck fa-2x"></i>
								      		</div>
								      		<div class="del-price">
								      			<p>Достава: 50ден.</p>
								      		</div>
								      	</div>
							      	</div>
							  	</div>
							';
							exit();
						}
					}
					else {
						echo "error2";
						exit();
					}
				}
				else {
					echo "error3";
					exit();
				}
			}

  			?>

  			<div class="content">

		  		<?php

					$sql = "SELECT Name, Image FROM restorants";
					if ($query = mysqli_query($db, $sql)) {
					$numrows = mysqli_num_rows($query);
						if ($numrows > 0)
							while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
								echo 
								'
								    <div class="col-lg-4 col-sm-6 col-xs-12">
								      	<div class="box">
									      	<a href="other/restaurant.php?name='.$row['Name'].'">
									      		<div class="zoom-in">
									      		<img class="img-responsive res-logo" src="'. $row['Image'] .'"></div>
									      	</a>
									      	<div class="content1">
									      		<div class="res-name">
									      			<p>'. $row['Name'] .'</p>
									      		</div>
									      		<div class="delivery">
									      			<i class="fa fa-truck fa-2x"></i>
									      		</div>
									      		<div class="del-price">
									      			<p>Достава: 50ден.</p>
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
	</div>
	</section>

		<!--Footer-->
	<footer class="page-footer">

	    <div style="background-color: #818181;">
	        <div class="container">
	            <div class="row align-items-center">
	                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
	                    <h6 class="mb-0">Следете не на социјалните мрежи</h6>
	                </div>
	               
	                <div class="col-md-6 col-lg-7 text-center text-md-right">                   
	                    <a href="" class="icons-sm fb-ic ml-0"><i class="fab fa-facebook-square white-text mr-lg-4"> </i></a>
	                    
	                    <a href="" class="icons-sm tw-ic"><i class="fab fa-twitter-square white-text mr-lg-4"> </i></a>
	                    
	                    <a href="" class="icons-sm gplus-ic"><i class="fab fa-google-plus-square white-text mr-lg-4"> </i></a>
	                   
	                    <a href="" class="icons-sm li-ic"><i class="fab fa-linkedin white-text mr-lg-4"> </i></a>
	                    
	                    <a href="" class="icons-sm ins-ic"><i class="fab fa-instagram white-text mr-lg-4"> </i></a>
	                </div>	           
	            </div>
	        </div>
	    </div>

	    <!-- Copyright-->
	    <div class="footer-copyright">
	        <div class="container-fluid">
	            Copyright <i class="far fa-copyright white-text"></i>2018: JadiOnlajn.com <a href=""><strong>Сите права се задржани</strong></a>
	        </div>
	    </div>
	    
	</footer>

	<div class="overlay9"></div>

	<script type="text/javascript">
		$('.home').toggleClass('active').removeAttr('href');
		$('.about').attr('href', 'other/about.php');
		$('.contact').attr('href', 'other/contact.php');
		$('.b2').attr('href', 'other/register.php');

		$('.login-submit').click(function(){
			loginStatus('other/login.php');
		});

		$('.search-submit').click(function() {
			Search();
			$('.content').css('display', 'none');
		});

	    if ($('.login').html() != 'Најави се'){
	      $('.register').attr('href', 'other/logout.php');
	      $('.login').attr('href', 'other/user.php?user='+ $('.login').html() +'');	
	    }
	    else {
	      $('.register').attr('href', 'other/register.php');
	    }		
	</script>


</body>
</html>