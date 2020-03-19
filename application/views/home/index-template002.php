<!DOCTYPE html>
<html lang="en">
<head><title><?php echo $title ?></title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<?php

$link[] = '<!-- FontAwesome CSS -->';
$link[] = '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">';
$link[] = '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
$link[] = '<link rel="stylesheet" href="<?php echo URL ?>/sumber/css/font-awesome.min.css">';

echo $link[0] . "\r";
echo $link[2] . "\r";

$link2[] = '<!-- ElegantFonts CSS -->';
$link2[] = '<link rel="stylesheet" href="' . URL. '/sumber/css/elegant-fonts.css">';
$link2[] = '<link rel="stylesheet" href="https://technext.github.io/ezuca/css/elegant-fonts.css">';

echo $link2[0] . "\r";
echo $link2[2] . "\r";

$link3[] = '<!-- themify-icons CSS -->';
$link3[] = '<link rel="stylesheet" href="' . URL . '/sumber/css/themify-icons.css">';
$link3[] = '<link rel="stylesheet" href="https://technext.github.io/ezuca/css/themify-icons.css">';

echo $link3[0] . "\r";
echo $link3[2] . "\r";

?>
<!-- Swiper CSS -->
<link rel="stylesheet" href="<?php echo URL ?>/sumber/css/swiper.min.css">
<!-- Styles -->
<link rel="stylesheet" href="<?php echo URL ?>/sumber/css/style.css">
<style>
.hero-content {
    background: url("<?php echo URL ?>/sumber/images/hero-bg.jpg") no-repeat center;
    background-size: cover;
}

</style>
</head>
<body>
<div class="hero-content">
<header class="site-header">
            <div class="top-header-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                            <div class="header-bar-email d-flex align-items-center">
                                <i class="fa fa-envelope"></i><a href="#"><?php echo $email ?></a>
                            </div><!-- .header-bar-email -->

                            <div class="header-bar-text lg-flex align-items-center">
                                <p><i class="fa fa-phone"></i><?php echo $telefon ?> </p>
                            </div><!-- .header-bar-text -->
                        </div><!-- .col -->

                        <div class="col-12 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                            <div class="header-bar-search">
                                <form class="flex align-items-stretch">
                                    <input type="search" placeholder="What would you like to learn?">
                                    <button type="submit" value="" class="flex justify-content-center align-items-center"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- .header-bar-search -->

                            <div class="header-bar-menu">
                                <ul class="flex justify-content-center align-items-center py-2 pt-md-0">
                                    <li><a href="<?php echo URL ?>/login/teacher">Teacher</a></li>
                                    <li><a href="<?php echo URL ?>/login/admin">Admin</a></li>
                                </ul>
                            </div><!-- .header-bar-menu -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container-fluid -->
            </div><!-- .top-header-bar -->
	<!-- ########################################################################################## -->
	<div class="nav-bar">
	<div class="container">
	<div class="row">
		<div class="col-9 col-lg-3">
			<div class="site-branding">
				<h1 class="site-title"><a href="index.html" rel="home">Ezu<span>ca</span></a></h1>
			</div><!-- .site-branding -->
		</div><!-- .col -->

		<div class="col-3 col-lg-9 flex justify-content-end align-content-center">
			<nav class="site-navigation flex justify-content-end align-items-center">
				<ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
				<li class="current-menu-item"><a href="index.html">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Courses</a></li>
				<li><a href="#">blog</a></li>
				<li><a href="#">Contact</a></li>
				</ul>

				<div class="hamburger-menu d-lg-none">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div><!-- .hamburger-menu -->

				<div class="header-bar-cart">
					<a href="#" class="flex justify-content-center align-items-center">
						<span aria-hidden="true" class="icon_bag_alt"></span>
					</a>
				</div><!-- .header-bar-search -->
			</nav><!-- .site-navigation -->
		</div><!-- .col -->
	</div><!-- .row -->
	</div><!-- .container -->
	</div><!-- .nav-bar -->
	<!-- ########################################################################################## -->
</header><!-- .site-header -->
<!-- ########################################################################################## -->
<?php include 'section-hero-content.php'; ?>
<!-- ########################################################################################## -->
</div><!-- .hero-content -->

<br><br><br><br><br>
<div class="container">
    <footer class="site-footer">
<?php //include 't-footer-widgets.php'; ?>
        <div class="footer-bar">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="download-apps flex flex-wrap justify-content-center justify-content-lg-start align-items-center">
                            <a href="#"><img src="<?php echo URL ?>/sumber/images/app-store.png" alt=""></a>
                            <a href="#"><img src="<?php echo URL ?>/sumber/images/play-store.png" alt=""></a>
                        </div><!-- .download-apps -->

                    </div>

                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                        <div class="footer-bar-nav">
                            <ul class="flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                                <li><a href="#">DPA</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div><!-- .footer-bar-nav -->
                    </div><!-- .col-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-bar -->
    </footer><!-- .site-footer -->

</div><!-- .container -->

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="<?php echo URL ?>/sumber/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo URL ?>/sumber/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo URL ?>/sumber/js/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="<?php echo URL ?>/sumber/js/custom.js"></script>

</body>
</html>