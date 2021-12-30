<?php include_once('_includes/functions.inc.php');?>
<?php
unset($_SESSION['class']);
if(isset($_POST['class'])){
   

  $_SESSION['class'] = test_input($_POST['class']);
   
    

 
    header('location: org.php');
}




?>

<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
	<meta charset="utf-8">
<meta name="author" content="Softnio">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<!-- Fav Icon  -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Site Title  -->
<title>Sign-up</title>
<!-- Bundle and Base CSS -->
<link rel="stylesheet" href="assets/css/vendor.bundle.css?ver=192">
<link rel="stylesheet" href="assets/css/style-salvia.css?ver=192" id="changeTheme">
<!-- Extra CSS -->
<link rel="stylesheet" href="assets/css/theme.css?ver=192">




</head>
     


    <body class="nk-body body-wider theme-dark mode-onepage">

<body class="nk-body body-wider theme-dark mode-onepage">
	<div class="nk-wrap">
		<header class="nk-header page-header is-transparent is-sticky is-shrink" id="header">
		    <!-- Header @s -->
            <div class="header-main">
                <div class="container">
                    <div class="header-wrap">
                        <!-- Logo @s -->
                        <div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".65">
                            <a href="./" class="logo-link">
                            <img class="logo-dark" src="images/nep.png"  alt="logo" style="width: 150px; height:70px;"  > 
                                <img class="logo-light" src="images/nep.png"  alt="logo"  style="width: 150px; height:70px;" >
                            </a>
                        </div>

                        <!-- Menu Toogle @s -->
                        <div class="header-nav-toggle">
                            <a href="#" class="navbar-toggle" data-menu-toggle="header-menu">
                                <div class="toggle-line">
                                    <span></span>
                                </div>
                            </a>
                        </div>

                        <!-- Menu @s -->
                        <div class="header-navbar header-navbar-s2">
                            <nav class="header-menu justify-content-between" id="header-menu">
                                <ul class="menu animated remove-animation" data-animate="fadeInDown" data-delay=".75">
                                <li class="menu-item" >
        <a class="menu-link nav-link " href="index.php">Home</a>
       
    </li>
   
 
    
    <li class="menu-item has-sub">
        <a class="menu-link nav-link menu-toggle" href="#">Pages</a>
        <ul class="menu-sub menu-drop  menu-mega menu-mega-2clmn">
           
                <ul class="menu-mega-list">
                    
                    <li class="menu-item"><a class="menu-link nav-link" href="about.php">About Us<span class="badge badge-dot"></span></a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-team.html">Our Teams</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-wallets.html">Faqs</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-wallets-v2.html">Contact Us</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-download.html">Download</a></li>
                </ul>
                                </ul>
    </li>
                            </nav>
                        </div><!-- .header-navbar @e -->
                    </div>                                                    
                </div>
            </div><!-- .header-main @e -->
			<!-- Banner @s -->
            <div class="header-banner bg-theme-grad-s2">
                <div class="nk-banner">
                    <div class="banner banner-fs banner-single banner-s1 banner-s1-overlay">
                        <div class="banner-wrap">
                            <div class="container">
                                <div class="row align-items-center justify-content-center justify-content-lg-between gutter-vr-60px">
                                    <div class="col-lg-6 col-xl-6 text-center text-lg-left">
                                    <div class="token-status token-status-s3 round bg-theme tc-light animated" data-animate="fadeInUp" data-delay="2">
                                            <h4 class="title-md title-thin">Create an Account</h4>
                                            <h7 class="title-md title-thin text-muted">Business Account</h7>
                                            <div class="countdown-s2 countdown" data-date="2021/03/15 20:00:00"></div>
                                            <div class="token-info token-info-s1">
                                                <p style="color:white">Create a wallet that understand the flow of your business and meet <span style="margin-left: 37%"> your need 24/7... </span></p>
                                            </div>
                                       
                                            <div class="token-action token-action-s2 flex-wrap flex-sm-nowrap">
                                             <form method="post" action="">
                                               <button value="1" class="btn btn-primary form-control" name="class"  style="margin-left: 130%;"> Create</button></form>
                                            </div>
                                            
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-lg-6 col-xl-5 col-md-8 col-sm-9">
                                        <div class="token-status token-status-s3 round bg-theme tc-light animated" data-animate="fadeInUp" data-delay="2">
                                            <h4 class="title-md title-thin">Create an Account</h4>
                                            <h7 class="title-md title-thin text-muted">Personal Account</h7>
                                            <div class="countdown-s2 countdown" data-date="2020/03/15 20:00:00"></div>
                                            <div class="token-info token-info-s1">
                                                <p style="color: white">Create a wallet for individual purpose/personal use that meet your needs and build up your Ecosystem...</p>
                                            </div>
                                            <div class="token-action token-action-s2 flex-wrap flex-sm-nowrap"> 
                                                <span  style="margin-left: 25%"><a href="signup.php" class="btn btn-md btn-secondary">Create Now</span></a>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-banner -->
                <div class="nk-ovm shape-q"></div>
                
                <!-- Place Particle Js -->
				<!-- <div id="particles-bg" class="particles-container particles-bg" data-pt-base="#00c0fa" data-pt-base-op=".3" data-pt-line="#2b56f5" data-pt-line-op=".5" data-pt-shape="#00c0fa" data-pt-shape-op=".2"></div> -->
            </div>
			<!-- .header-banner @e -->
		</header>
    
      
	</div>
	
	<div class="preloader"><span class="spinner spinner-round"></span></div>
	
	<!-- JavaScript -->
	<script src="assets/js/jquery.bundle.js?ver=192"></script>
	<script src="assets/js/scripts.js?ver=192"></script>
	<script src="assets/js/charts.js?var=161"></script>
</body>

</html>