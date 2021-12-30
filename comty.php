<?php include_once('../_includes/functions.inc.php');?>
<?php include_once('../_action/vlogin.php');?>

<?

if(isset($_SESSION['MM_uID'])){
    session_start();
    
    if(isset($_POST['pin'])){
    
    $errors = array();
    $pin = "gfhhhcds";
    
    $pin = test_input(md5($_POST['pin']));
    
    mysqli_select_db($dbfeed, $database_dbsmart5);
    $query_sch = sprintf("SELECT `uID`, `folio` FROM `login_wallet` WHERE uID=".$_SESSION['MM_uID']." AND `pin` LIKE '%s'", $pin);
    // echo $query_sch;
    // die; 
    $sch = mysqli_query($dbfeed, $query_sch) or die(mysqli_error($dbfeed));
    $row_sch = mysqli_fetch_assoc($sch);
    $totalRows_sch = mysqli_num_rows($sch);
        
    if($totalRows_sch>0){header('location: dashboard.php');}
    
    }
    // 
     }else{
        // 
        
    header('location: ../index.php');
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
<title>Our Community</title>
<!-- Bundle and Base CSS -->
<link rel="stylesheet" href="assets/css/vendor.bundle.css?ver=192">
<link rel="stylesheet" href="assets/css/style.css?ver=192" id="changeTheme">
<!-- Extra CSS -->
<link rel="stylesheet" href="assets/css/theme.css?ver=192">




</head>


    <body class="nk-body body-wider bg-light-alt">

	<div class="nk-wrap">
		<header class="nk-header page-header is-transparent is-sticky is-shrink" id="header">
		    <!-- Header @s -->
			<div class="header-main">
				<div class="header-container container">
					<div class="header-wrap">
						<!-- Logo @s -->
						<div class="header-logo logo">
							<a href="./" class="logo-link">
								<img class="logo-dark" src="images/nep.png" srcset="images/nep.png 2x" alt="logo" style="width: 150px; height:70px;">
								<img class="logo-light" src="nep.png" srcset="images/nep.png 2x" alt="logo" style="width: 150px; height:70px;">
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
						<div class="header-navbar">
							<nav class="header-menu" id="header-menu">
    <ul class="menu">
    <li class="menu-item">
        <a class="menu-link nav-link " href="index.php">Home</a>
        
    </li>
   
    <li class="menu-item ">
        <a class="menu-link nav-link" href="comty.php">Communication World</a>
        
    </li>
   
    <li class="menu-item has-sub">
        <a class="menu-link nav-link menu-toggle" href="#">Pages</a>
        <ul class="menu-sub menu-drop menu-mega menu-mega-2clmn">
           
                <ul class="menu-mega-list">
                    
                    <li class="menu-item"><a class="menu-link nav-link" href="about.php">About Us<span class="badge badge-dot"></span></a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-team.html">Our Teams</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-wallets.html">Faqs</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-wallets-v2.html">Contact Us</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-download.html">Download</a></li>
                </ul>
               
        </ul>
    </li>
</ul>

    <ul class="menu-btns">
        <li><a href="page-login.html" class="btn btn-md btn-auto btn-grad no-change"  data-toggle="modal" data-target="#modal-top"><span>Login</span></a></li>
    </ul>
</nav>
						</div><!-- .header-navbar @e -->
					</div>                                                
				</div>
			</div><!-- .header-main @e -->

			<!-- Banner @s -->
			<div class="header-banner bg-theme-grad">
				<div class="nk-banner">
				    <div class="banner banner-page">
				        <div class="banner-wrap">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-6 col-lg-9">
                                        <div class="banner-caption cpn tc-light text-center">
                                            <div class="cpn-head">
                                                <h2 class="title ttu">Join Our Community </h2>
                                                <p>Get the best experince using our community... Which provides you a good view on business and advert</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				    </div>
				</div><!-- .nk-banner -->
				<div class="nk-ovm shape-a-sm"></div>
			</div>
			<!-- .header-banner @e -->
		</header>
    
        <main class="nk-pages">
            <section class="section bg-light">
                <div class="container">
                    <div class="nk-block nk-block-blog">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="blog">
                                            <div class="blog-photo">
                                                <img src="images/blog/a.jpg" alt="blog-thumb">
                                            </div>
                                            <div class="blog-text">
                                                <ul class="blog-meta">
                                                    <li><a href="#">12 Mar, 2018</a></li>
                                                    <li><a href="#">Blockchain</a></li>
                                                </ul>
                                                <h4 class="title title-sm"><a href="#">The Intersection with Blockchain.</a></h4>
                                                <p>Blockchain Meets Energy Surplus of electrical energy is sometimes ut perspiciatis unde omnis iste natus...</p>
                                            </div>
                                        </div><!-- .blog -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6">
                                        <div class="blog">
                                            <div class="blog-photo">
                                                <img src="images/blog/b.jpg" alt="blog-thumb">
                                            </div>
                                            <div class="blog-text">
                                                <ul class="blog-meta">
                                                    <li><a href="#">12 Mar, 2018</a></li>
                                                    <li><a href="#">Blockchain</a></li>
                                                </ul>
                                                <h4 class="title title-sm"><a href="#">The Intersection with Blockchain.</a></h4>
                                                <p>Blockchain Meets Energy Surplus of electrical energy is sometimes ut perspiciatis unde omnis iste natus...</p>
                                            </div>
                                        </div><!-- .blog -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6">
                                        <div class="blog">
                                            <div class="blog-photo">
                                                <img src="images/blog/c.jpg" alt="blog-thumb">
                                            </div>
                                            <div class="blog-text">
                                                <ul class="blog-meta">
                                                    <li><a href="#">12 Mar, 2018</a></li>
                                                    <li><a href="#">Blockchain</a></li>
                                                </ul>
                                                <h4 class="title title-sm"><a href="#">The Intersection with Blockchain.</a></h4>
                                                <p>Blockchain Meets Energy Surplus of electrical energy is sometimes ut perspiciatis unde omnis iste natus...</p>
                                            </div>
                                        </div><!-- .blog -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6">
                                        <div class="blog">
                                            <div class="blog-photo">
                                                <img src="images/blog/d.jpg" alt="blog-thumb">
                                            </div>
                                            <div class="blog-text">
                                                <ul class="blog-meta">
                                                    <li><a href="#">12 Mar, 2018</a></li>
                                                    <li><a href="#">Blockchain</a></li>
                                                </ul>
                                                <h4 class="title title-sm"><a href="#">The Intersection with Blockchain.</a></h4>
                                                <p>Blockchain Meets Energy Surplus of electrical energy is sometimes ut perspiciatis unde omnis iste natus...</p>
                                            </div>
                                        </div><!-- .blog -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6">
                                        <div class="blog">
                                            <div class="blog-photo">
                                                <img src="images/blog/e.jpg" alt="blog-thumb">
                                            </div>
                                            <div class="blog-text">
                                                <ul class="blog-meta">
                                                    <li><a href="#">12 Mar, 2018</a></li>
                                                    <li><a href="#">Blockchain</a></li>
                                                </ul>
                                                <h4 class="title title-sm"><a href="#">The Intersection with Blockchain.</a></h4>
                                                <p>Blockchain Meets Energy Surplus of electrical energy is sometimes ut perspiciatis unde omnis iste natus...</p>
                                            </div>
                                        </div><!-- .blog -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6">
                                        <div class="blog">
                                            <div class="blog-photo">
                                                <img src="images/blog/f.jpg" alt="blog-thumb">
                                            </div>
                                            <div class="blog-text">
                                                <ul class="blog-meta">
                                                    <li><a href="#">12 Mar, 2018</a></li>
                                                    <li><a href="#">Blockchain</a></li>
                                                </ul>
                                                <h4 class="title title-sm"><a href="#">The Intersection with Blockchain.</a></h4>
                                                <p>Blockchain Meets Energy Surplus of electrical energy is sometimes ut perspiciatis unde omnis iste natus...</p>
                                            </div>
                                        </div><!-- .blog -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                                <nav class="w-100 d-flex">
                                    <ul class="pagination">
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><em class="icon ti ti-angle-right"></em></a></li>
                                    </ul>
                                </nav>
                            </div><!-- .col -->
                            <div class="col-lg-4 order-lg-first">
                                <div class="sidebar mr-lg-4 mt-5 mt-lg-0">
                                    <div class="wgs wgs-search">
                                        <form action="#" class="field-inline">
                                            <input type="text" placeholder="Search Keyword" class="input-bordered">
                                            <button class="btn btn-primary btn-icon"><em class="ti ti-search"></em></button>
                                        </form>
                                    </div>
                                    <div class="wgs wgs-category">
                                        <h6 class="wgs-title">Category</h6>
                                        <div class="wgs-body">
                                            <ul class="wgs-links wgs-links-category">
                                                <li><a href="#">Blockchain</a></li>
                                                <li><a href="#">Cryptocurrency</a></li>
                                                <li><a href="#">Technology</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="wgs wgs-tags">
                                        <h6 class="wgs-title">Tags</h6>
                                        <div class="wgs-body">
                                            <ul class="wgs-links wgs-links-tags">
                                                <li><a href="#">ethereum</a></li>
                                                <li><a href="#">bitcoin</a></li>
                                                <li><a href="#">released</a></li>
                                                <li><a href="#">tokens</a></li>
                                                <li><a href="#">roadmap</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="wgs wgs-archive">
                                        <h6 class="wgs-title">Archive</h6>
                                        <div class="wgs-body">
                                            <select name="post-archive" class="select" data-select2-placehold="Select Month">
                                                <option label="placeholder"></option>
                                                <option value="All">All</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="wgs wgs-cta bg-theme tc-light round">
                                        <div class="wgs-body">
                                            <div class="title title-sm">How can we help you?</div>
                                            <p>Contact our support team if you need help or have any questions?</p>
                                            <a href="#" class="btn btn-md btn-light">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div><!-- .container -->
            </section><!-- .section -->
        </main>
    

        <div class="modal fade" id="modal-top" >
        <div class="modal-dialog">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <h3 class="title text-center title-md" style="color: white; font-weight: bold; ">Login Here</h3>
                <div class="modal-body p-md-4 p-lg-5"  style="background-color: transparent;">
                    <div class="ath-container">
                  
                    <div class="row">
                       <input type="text"  style="width: 70%; margin-left: 15%; border-bottom: 1px solid red; border-radius: 10px;" class="form-control bottomline" placeholder="Enter Your Username"><br>
                       <br>
                       <input type="password" style="width: 70%; margin-left: 15%; border-bottom: 1px solid green; border-radius: 10px;" class="form-control bottomline" placeholder="input Your Password"><br>
                       <br>
                       <button type="submit" style="margin-left: 35%;" class="btn btn-primary btn-sm">Login</button>
                  </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .modal @e --> 


		<footer class="nk-footer bg-theme-grad">
		    <section class="section no-pdy section-contact bg-transparent">
			
				<div class="container">
				    <!-- Block @s -->
					<div class="nk-block block-contact">
                        <div class="row justify-content-center no-gutters">
                            <div class="col-lg-8">
                                <div class="subscribe-wrap bg-grad tc-light round">
                                    <div class="section-head section-head-sm wide-auto-sm text-center">
                                        <h4 class="title title-sm">Don’t miss out, Be the first to know</h4>
                                        <p class="text-white">Get notified about the new features and update, as well as other important information .</p>
                                    </div>
                                    <form action="#" class="field-inline field-inline-s2  bg-white shadow-soft">
                                        <div class="field-wrap">
                                            <input class="input-solid" type="email" placeholder="Enter your email">
                                        </div>
                                        <div class="submit-wrap">
                                            <button class="btn btn-secondary"><i class="icontact-icon fas fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
					</div><!-- .block @e -->
				</div>
				
				<div class="nk-ovm ovm-top ovm-h-50 bg-light"></div><!-- .nk-ovm -->
				
			</section>
			<!-- // -->
			<section class="section section-footer tc-light bg-transparent">
			
				<div class="container">
				    <!-- Block @s -->
					<div class="nk-block block-footer">
                        <div class="row">
                           
                            <div class="col-lg-6 mb-6 mb-lg-0 order-lg-first " style="margin-left: 30%;">
                                <div class="wgs wgs-text">
                                    <div class="wgs-body">
                                        <a href="./" class="wgs-logo">
                                            <img src="images/nepwal.png" srcset="images/logo-full-white2x.png 2x" alt="logo">
                                        </a>
                                        <!-- <p>Copyright © 2018 ICO Crypto. <br>ABN: 2018AD947. All rights reserved. </p>
                                        <p class="copyright-text">Template by <a href="https://softnio.com/">Softnio</a>. Handcrafted by iO.</p> -->
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
					</div><!-- .block @e -->
				</div>
				
			</section>
			<div class="nk-ovm shape-b"></div>
		</footer>
	</div>

	<div class="preloader"><span class="spinner spinner-round"></span></div>
	
	<!-- JavaScript -->
	<script src="assets/js/jquery.bundle.js?ver=192"></script>
	<script src="assets/js/scripts.js?ver=192"></script>
	<script src="assets/js/charts.js"></script>
</body>
</html>