<?php
include 'php/checklogin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>За нас</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../assets/img/favicon.png">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/register.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/contact.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/about.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/index.js"></script>
</head>
<body>

	<div class="overlay9"></div>

		<!-- Login Section -->

	<?php include '../php_includes/login_popup.php'; ?>	

	<header>
		
		<?php include '../php_includes/nav_menu.php'; ?>

		<div class="container">
                    <div class="row">
                        <div class="heading-title text-center">
                            <h3 class="text-uppercase">Нашиот тим</h3>
                            <p class="p-top-30 half-txt">Тимот на ЈадиОнлајн го сочинуваат и одржуваат членовите подолу.</p>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="team-member">
                                <div class="team-img">
                                    <img src="../assets/img/about/lb.png" alt="team member" class="img-responsive">
                                </div>
                            </div>
                            <div class="team-title">
                                <h4>Љубомир Бојаџиев</h4>
                                <span>Проект Менаџер</span><br>
                                <span>Lead Developer</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="team-member">
                                <div class="team-img">
                                    <img src="../assets/img/about/vg.png" alt="team member" class="img-responsive">
                                </div>
                            </div>
                            <div class="team-title">
                                <h4>Велјан Ѓорѓиов</h4>
                                <span>Системски и Веб Аналитичар</span><br>
                                <span>Database Administrator</span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="team-member">
                                <div class="team-img">
                                    <img src="../assets/img/about/vi.png" alt="team member" class="img-responsive">
                                </div>
                            </div>
                            <div class="team-title">
                                <h4>Васе Илиев</h4>
                                <span>Веб Дизајнер</span><br>
                                <span>Естетски Развивач</span>
                            </div>
                        </div>

                    </div>

                </div>

	</header>

	<!--Footer-->
	<footer class="page-footer">

	    <div style="background-color: #323232;">
	        <div class="container">
	            <div class="row align-items-center">
	                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
	                    <h6 class="mb-0">Следете нè на социјалните мрежи!</h6>
	                </div>
	               
	                <div class="col-md-6 col-lg-7 text-center text-md-right">                   
	                    <a href="" class="icons-sm fb-ic ml-0"><i class="fa fa-facebook-square white-text mr-lg-4"> </i></a>
	                    
	                    <a href="" class="icons-sm tw-ic"><i class="fa fa-twitter-square white-text mr-lg-4"> </i></a>
	                    
	                    <a href="" class="icons-sm gplus-ic"><i class="fa fa-google-plus-square white-text mr-lg-4"> </i></a>
	                   
	                    <a href="" class="icons-sm li-ic"><i class="fa fa-linkedin white-text mr-lg-4"> </i></a>
	                    
	                    <a href="" class="icons-sm ins-ic"><i class="fa fa-instagram white-text mr-lg-4"> </i></a>
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


	<script type="text/javascript">
		$('.about').toggleClass('active').removeAttr('href');
	</script>

	

</body>
</html>