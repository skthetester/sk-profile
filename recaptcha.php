<!DOCTYPE html>
<html lang="en" class=" theme-color-07cb79 theme-skin-light">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sivakumar Ganesan</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/ico" href="img/favicon.png"/>

	<!-- Google Fonts -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fredoka+One">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic">

	<!-- Icon Fonts -->
	<link rel="stylesheet" type="text/css" href="fonts/map-icons/css/map-icons.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/icomoon/style.css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="js/plugins/jquery.bxslider/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/jquery.customscroll/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/jquery.mediaelement/mediaelementplayer.min.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/jquery.fancybox/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/jquery.owlcarousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/jquery.owlcarousel/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="colors/green.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Modernizer for detect what features the user�s browser has to offer -->
	<script type="text/javascript" src="js/libs/modernizr.js"></script>
	
	<!-- Google RreCaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

    <div class="mobile-nav">
        <button class="btn-mobile mobile-nav-close"><i class="rsicon rsicon-close"></i></button>
		
        <div class="mobile-nav-inner">
            <nav id="mobile-nav" class="nav">
				<ul class="clearfix">
					<li><a href="#about">About</a></li>
					<li><a href="#skills">Skills</a></li>
					<li><a href="#experience">Experience</a></li>
					<li><a href="#education">Education</a></li>
					<li><a href="#certification">Certification</a></li>
					<li><a href="#achievements">Achievements</a></li>
					<li><a href="#references">References</a></li>
					<li><a href="#contact">Contact <span></span></a></li>
				</ul>
			</nav>
        </div>
    </div>
	<!-- .mobile-nav -->

    <div class="wrapper">
        <header class="header">
			<div class="head-bg" style="background-image: url('img/uploads/rs-cover.jpg')"></div>
			
            <div class="head-bar">
                <div class="head-bar-inner">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">                            
                            <a class="logo" href="index.html"><span>SK</span> </a>
							<!-- <a class="head-logo" href=""><img src="img/rs-logo.png" alt="Sivakumar Ganesan"/></a> -->
                        </div>

                        <div class="col-sm-9 col-xs-6">
                            <div class="nav-wrap">
                                <nav id="nav" class="nav">
									<ul class="clearfix">
										<li><a href="#about">About</a></li>
										<li><a href="#skills">Skills</a></li>
										<li><a href="#experience">Experience</a></li>
										<li><a href="#education">Education</a></li>
										<li><a href="#certification">Certification</a></li>
										<li><a href="#achievements">Achievements</a></li>
										<li><a href="#references">References</a></li>
										<li><a href="#contact">Contact <span></span></a></li>
									</ul>
								</nav>
                                <button class="btn-mobile btn-mobile-nav">Menu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
		<!-- .header -->
		
        <div class="content">
            <div class="container">
						
			<!-- START: PAGE CONTENT -->
			<?php require_once __DIR__ . '/php/recaptcha/autoload.php';				
				$siteKey = '6Lf60n4UAAAAAPYBAuSlJVQfNC_I2BWqOF989Hk_'; // visit https://www.google.com/recaptcha/admin to generate keys
				$secret = '6Lf60n4UAAAAALa547fgYEveoICwaQ45y2dJtXjb';
				$lang = 'en'; // reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
			?>
			
			<section class="section section-text text-center">
				<div class="animate-up animated">
					<h2 class="section-title">You're not a bot? Aren't you?</h2>
					<div class="section-box">
					<?php
					if ($siteKey === '' || $secret === ''): ?>
						<h4>Add your keys</h4>
						<p>If you do not have keys already then visit
						<a href = "https://www.google.com/recaptcha/admin">
						https://www.google.com/recaptcha/admin</a> to generate them.<br/>
						Edit <strong>recaptcha.php</strong> file and set the respective keys in <strong>$siteKey</strong> and
						<strong>$secret</strong>. Reload the page after this.</p>
					<?php
					elseif (isset($_POST['g-recaptcha-response'])):
						$recaptcha = new \ReCaptcha\ReCaptcha($secret);
						$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
						if ($resp->isSuccess()):					
						// If the response is a success, that's it!
							?>
							<h3>Congratulation!</h3>
							<p>Your email was sent successfully! <a href="index.html">Go Back</a></p>
							<?php
							
							require_once __DIR__ . '/php/mailsender.php';
						else:
						// If it's not successful, then one or more error codes will be returned.
							?>
							<p>Something went wrong <a href="index.html">please try again</a>.</p>
						<?php
						endif;
					else:
						// Add the g-recaptcha tag to the form you want to include the reCAPTCHA element
						?>
						<p>Complete the reCAPTCHA then submit the form.</p>
						<form action="" method="post">
							<input type="hidden" value="<?php echo $_POST['rsName'];?>" name="rsName">
							<input type="hidden" value="<?php echo $_POST['rsEmail'];?>" name="rsEmail">
							<input type="hidden" value="<?php echo $_POST['rsSubject'];?>" name="rsSubject">
							<input type="hidden" value="<?php echo $_POST['rsMessage'];?>" name="rsMessage">						                        				
							
							<div class="input-field">
								<div class="g-recaptcha " data-sitekey="<?php echo $siteKey; ?>"></div>
								<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>"></script>
							</div>							
							<input type="submit" class="btn btn-lg btn-primary" value="Submit" />	
						</span>
						</form>
					<?php endif; ?>
					</div>
				</div>
			</section>
			<!-- END: PAGE CONTENT -->
			                
            </div><!-- .container -->
        </div><!-- .content -->

        <footer class="footer">
            <div class="footer-social">
                <ul class="social">
					<li><a class="ripple-centered" href="" target="_blank"><i class="rsicon rsicon-facebook"></i></a></li>
					<li><a class="ripple-centered" href="" target="_blank"><i class="rsicon rsicon-twitter"></i></a></li>
					<li><a class="ripple-centered" href="" target="https://www.linkedin.com/in/skthetester/"><i class="rsicon rsicon-linkedin"></i></a></li>
					<li><a class="ripple-centered" href="" target="_blank"><i class="rsicon rsicon-google-plus"></i></a></li>
					<li><a class="ripple-centered" href="" target="_blank"><i class="rsicon rsicon-dribbble"></i></a></li>
					<li><a class="ripple-centered" href="" target="_blank"><i class="rsicon rsicon-instagram"></i></a></li>
				</ul>
            </div>
        </footer><!-- .footer -->
    </div><!-- .wrapper -->
	
	<a class="btn-scroll-top" href="#"><i class="rsicon rsicon-arrow-up"></i></a>
    <div id="overlay"></div>
    <div id="preloader">
		<div class="preload-icon"><span></span><span></span></div>
		<div class="preload-text">Loading ...</div>
	</div>

    <!-- Scripts -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="fonts/map-icons/js/map-icons.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="js/plugins/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="js/plugins/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.appear.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.onepagenav.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.customscroll/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.mediaelement/mediaelement-and-player.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.fancybox/helpers/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/options.js"></script>	
    <script type="text/javascript" src="js/site.min.js"></script>
</body>
</html>