<?php include_once('_includes/functions.inc.php');



?>
<?php 

session_destroy();
//sinclude_once('users-page/chatapp/php/logout.php');
if (!isset($_SESSION)) {
    session_start();
  }
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_uID'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['client'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_uID']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['client']);


if($_REQUEST['email']){
    
}
unset($_SESSION['rest']);
if(isset($_POST['email'])){
   

if(isset($_POST['email'])){ $ttt= test_input($_POST['email']);}

    if (empty($_POST["email"])) {
        $ERR = " Email: Required <br />";
        $errcode=112;
        
        }
        if ((!empty($_POST["email"])) && !filter_var(test_input($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $ERR = " Invalid email format<br />"; 
            $errcode=112;
            }
 
            if($errcode!=112){
                

    mysqli_select_db($dbsmart6, $database_dbsmart6);
    $query_sch = sprintf("SELECT email, uID  FROM `bio` WHERE status=1 OR status=5 AND `email` LIKE '%s'", $ttt);
    //  echo $query_sch ;
    //  die;
    $sch = mysqli_query($dbsmart6, $query_sch) or die(mysqli_error($dbsmart6));
    $row_sch = mysqli_fetch_assoc($sch);
    if($sch>0){


       
      
           $mail = $row_sch['email'];
     
        $insertSQL = sprintf("UPDATE `bio` SET  `pwd`=%s, `status`=%s  WHERE `email`=%s",
                
  GetSQLValueString($ran, "text"),
  GetSQLValueString(5, "int"),

  // GetSQLValueString($_SESSION['MM_uID'], "int"),
  GetSQLValueString($mail, "text"));       
//   echo  $insertSQL;
//   die;
         
    mysqli_select_db($dbfeed, $database_dbsmart6);
    $Result1 = mysqli_query($dbfeed, $insertSQL) or die(mysqli_error($dbfeed));

    $insertSQL = sprintf("UPDATE `login_wallet` SET   `status`=%s  WHERE `email`=%s",
                
 
  GetSQLValueString(5, "int"),

  // GetSQLValueString($_SESSION['MM_uID'], "int"),
  GetSQLValueString($mail, "text"));       
//   echo  $insertSQL;
//   die;
         
    mysqli_select_db($dbsmart, $database_dbwacc);
    $Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));
  session_start();
   // include_once('mail.php');

       
$_GET['ran'] = $ran;


header('location: code.php');





        
    }else{
        mysqli_select_db($dbsmart, $database_dborg);
        $query_sch = sprintf("SELECT orgemail, orgID  FROM `org_bio` WHERE status=1 OR status=5 AND `orgemail` LIKE '%s'", $ttt);
         echo $query_sch ;
         die;
        $sch = mysqli_query($dbsmart, $query_sch) or die(mysqli_error($dbsmart));
        $row_sch = mysqli_fetch_assoc($sch);
    }



  
    $errcode=132; $ERR ="Code Sent to Email if found  in Our Network";   
            }
}else{
    $errcode=112; $ERR ="Enter your email to Reset your password.";
}
 


$ran = (rand(1000000,000));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="sb-admin/vendor/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <!-- Custom style for this template -->
    <!-- <link rel="stylesheet" href="sb-admin/css/sb-admin-2.min.css"> -->
    <!-- Other custom stye for demo purpose -->
    <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">

    <title>LOGIN!</title>
</head>
<body class="bg-gradient-light">
    <div class="container">

        <!-- outer row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within card body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <svg id="b9b061f4-2238-46cf-9cbb-0fa8bffbec0a" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="793.56289" height="662.46368" viewBox="0 0 793.56289 662.46368"><rect x="167.35474" y="277.15781" width="630.1657" height="31.98284" transform="translate(-285.26597 168.12179) rotate(-30.64932)" fill="#f2f2f2"/><rect x="285.18618" y="304.09069" width="630.16572" height="31.98284" transform="translate(-282.53524 231.95258) rotate(-30.64932)" fill="#f2f2f2"/><rect x="389.55116" y="333.54852" width="630.16572" height="31.98284" transform="translate(-282.9729 289.27113) rotate(-30.64932)" fill="#f2f2f2"/><circle cx="353.12035" cy="206.84364" r="169.73576" fill="#fff"/><path d="M385.34074,325.61183c0-94.28862,76.70937-170.99819,170.99819-170.99819s170.99819,76.70957,170.99819,170.99819S650.62775,496.61,556.33893,496.61,385.34074,419.90044,385.34074,325.61183Zm2.525,0c0,92.89626,75.57675,168.47321,168.47322,168.47321s168.47322-75.577,168.47322-168.47321S649.2354,157.13861,556.33893,157.13861,387.86571,232.71556,387.86571,325.61183Z" transform="translate(-203.21856 -118.76816)" fill="#3f3d56"/><path d="M526.08167,326.34979v0A30.25726,30.25726,0,1,1,556.3389,356.607,30.25726,30.25726,0,0,1,526.08167,326.34976Zm30.25723-28.7813a28.81369,28.81369,0,0,0-28.7813,28.78132v0a28.7813,28.7813,0,1,0,28.7813-28.78132Z" transform="translate(-203.21856 -118.76816)" fill="#3f3d56" style="isolation:isolate"/><path d="M498.77636,326.34979v0a57.56256,57.56256,0,1,1,57.56254,57.56259A57.56254,57.56254,0,0,1,498.77636,326.34976Zm57.56254-56.08661a56.08661,56.08661,0,1,0,56.08661,56.08663,56.14995,56.14995,0,0,0-56.08661-56.08663Z" transform="translate(-203.21856 -118.76816)" fill="#ccc" style="isolation:isolate"/><path d="M444.16568,326.34976A112.17322,112.17322,0,1,1,556.3389,438.523,112.30013,112.30013,0,0,1,444.16568,326.34976ZM556.3389,215.65255A110.69725,110.69725,0,1,0,667.03618,326.34981,110.82276,110.82276,0,0,0,556.3389,215.65255Z" transform="translate(-203.21856 -118.76816)" fill="#ccc" style="isolation:isolate"/><circle cx="353.12035" cy="206.84365" r="14.02164" fill="#6c63ff" style="isolation:isolate"/><circle cx="316.95924" cy="247.43264" r="14.02164" fill="#6c63ff" style="isolation:isolate"/><circle cx="458.0353" cy="241.52879" r="14.02164" fill="#6c63ff" style="isolation:isolate"/><circle cx="353.12035" cy="206.84365" r="6.64182" fill="#2f2e41"/><circle cx="458.0353" cy="241.52879" r="6.64184" fill="#2f2e41"/><circle cx="316.95924" cy="248.17061" r="6.64183" fill="#2f2e41"/><circle cx="43.16807" cy="132.3075" r="6.64182" fill="#6c63ff"/><polygon points="352.751 132.677 61.248 132.677 61.248 131.201 354.228 131.201 354.228 207.212 352.751 207.212 352.751 132.677" fill="#2f2e41"/><path d="M227.199,251.07566a19.18754,19.18754,0,1,1,19.18756,19.18752A19.18751,19.18751,0,0,1,227.199,251.07566Zm19.18756-17.71155a17.71156,17.71156,0,1,0,17.71153,17.71155,17.73186,17.73186,0,0,0-17.71153-17.71155Z" transform="translate(-203.21856 -118.76816)" fill="#2f2e41"/><circle cx="87.44698" cy="323.44473" r="6.64183" fill="#6c63ff"/><path d="M271.478,442.21288h0a19.18751,19.18751,0,1,1,19.18751,19.18751A19.18753,19.18753,0,0,1,271.478,442.21288Zm19.18751-17.71156a17.71155,17.71155,0,1,0,17.71153,17.71156,17.73188,17.73188,0,0,0-17.71153-17.71156Z" transform="translate(-203.21856 -118.76816)" fill="#2f2e41"/><circle cx="663.93217" cy="163.30273" r="6.64183" fill="#6c63ff"/><path d="M847.96319,282.07088a19.18753,19.18753,0,1,1,19.18754,19.18754A19.18751,19.18751,0,0,1,847.96319,282.07088Zm19.18754-17.7115a17.73182,17.73182,0,0,0-17.71155,17.7115v0a17.71157,17.71157,0,1,0,17.71155-17.71158Z" transform="translate(-203.21856 -118.76816)" fill="#2f2e41"/><polygon points="457.297 165.528 645.471 162.565 645.494 164.04 458.773 166.981 458.773 241.529 457.297 241.529 457.297 165.528" fill="#2f2e41"/><polygon points="105.897 322.707 316.221 322.707 316.221 248.171 317.697 248.171 317.697 324.182 105.897 324.182 105.897 322.707" fill="#2f2e41"/><rect x="2.57907" y="166.99264" width="81.178" height="5.16587" fill="#ccc"/><rect x="2.57907" y="181.75227" width="81.178" height="5.16587" fill="#ccc"/><rect x="2.57907" y="196.51191" width="81.178" height="5.16587" fill="#ccc"/><rect x="46.85793" y="358.12988" width="81.178" height="5.16586" fill="#ccc"/><rect x="46.85793" y="372.8895" width="81.178" height="5.16586" fill="#ccc"/><rect x="46.85793" y="387.64914" width="81.178" height="5.16586" fill="#ccc"/><rect x="623.34318" y="198.72585" width="81.17797" height="5.16587" fill="#ccc"/><rect x="623.34318" y="213.48548" width="81.17797" height="5.16587" fill="#ccc"/><rect x="623.34318" y="228.24511" width="81.17797" height="5.16586" fill="#ccc"/><polygon points="743.166 638.861 731.622 642.987 710.214 600.421 727.253 594.332 743.166 638.861" fill="#ffb8b8"/><path d="M916.10405,781.07119l-.16846-.4707a15.40481,15.40481,0,0,1,9.31128-19.66748l22.73559-8.12549,5.34668,14.96045Z" transform="translate(-203.21856 -118.76816)" fill="#2f2e41"/><polygon points="668.095 650.28 655.835 650.279 650.003 602.991 668.097 602.992 668.095 650.28" fill="#ffb8b8"/><path d="M874.43974,780.932l-39.53076-.00146v-.5a15.38646,15.38646,0,0,1,15.38672-15.38623h.001l24.1438.001Z" transform="translate(-203.21856 -118.76816)" fill="#2f2e41"/><path d="M899.2535,466.93834l-5.33176-10.53543s-19.86256,4.97638-21.66824,16.48819Z" transform="translate(-203.21856 -118.76816)" fill="#6c63ff"/><polygon points="718.035 468.635 703.535 549.548 742.035 617.635 719.035 626.635 680.035 560.635 675.035 542.635 672.035 636.635 651.292 636.005 641.781 548.232 657.035 466.635 718.035 468.635" fill="#2f2e41"/><path d="M852,602c-.44995-2.00391-1.74065-63.17326-1.74065-63.17326s21.32544-70.00879,21.52051-70.584l.07617-.22461,16.19068-6.07032c.22705-.10351,5.62134-2.50683,10.03564-.5039a8.65063,8.65063,0,0,1,4.60083,5.65429c1.83643,1.36817,15.07032,16.19239,15.07032,36.29981l.49951,47.44922,11.095,51.44043-.49048.10449c-.303.06445-13.82739,4.13867-35.12842,4.13867C881.89363,606.53084,852,602,852,602Z" transform="translate(-203.21856 -118.76816)" fill="#3f3d56"/><circle cx="674.14281" cy="312.43466" r="21.88287" fill="#ffb8b8"/><polygon points="705.318 408.841 667.035 462.257 661.381 437.312 705.318 408.841" opacity="0.2"/><path d="M840.58961,582.17691a9.39072,9.39072,0,0,0,8.79948-11.39812l28.44617-17.44924L862.1276,545.981l-24.60481,17.69671a9.44164,9.44164,0,0,0,3.06682,18.49919Z" transform="translate(-203.21856 -118.76816)" fill="#ffb8b8"/><polygon points="657.035 427.635 647.292 434.462 655.555 449.135 667.035 439.635 657.035 427.635" fill="#6c63ff"/><path d="M855.15291,546.83358l22.917-26.56348-8.78027-36.63867a16.031,16.031,0,0,1,29.70483-11.33594l.19947.37109,8.09057,54.40821-40.6543,41.67089Z" transform="translate(-203.21856 -118.76816)" fill="#3f3d56"/><path d="M896.00075,450.20218l-18.16292.65194c-1.10712.03974-4.11189-11.90855-4.50522-14.38721a6.76485,6.76485,0,0,0-7.05681-5.47254c-1.35961.12843-4.78806-2.41166-8.32588-5.4194-6.71659-5.71022-6.36717-16.43488,1.011-21.26q.30247-.19782.59374-.36125c4.65454-2.6052,10.09951-3.48006,15.43312-3.54678,4.83507-.06047,9.8072.54809,14.0668,2.83662,7.63654,4.10284,11.70069,13.06869,12.05768,21.73025s-2.41975,17.131-5.57072,25.207" transform="translate(-203.21856 -118.76816)" fill="#2f2e41"/><path d="M995.78144,781.23184h-221a1,1,0,0,1,0-2h221a1,1,0,0,1,0,2Z" transform="translate(-203.21856 -118.76816)" fill="#3f3d56"/></svg>
                            </div>
                            <div class="col-lg-6">
                                <div class="register-box">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1><br>
                                        <p style="color: red; font-weight: bold;"></p>
                                     <?php
                                        if($errcode==112){?>
                                     <button class="btn btn-danger btn-icon-split btn-user"  style="padding-bottom: 20px; margin-bottom: 20px;"><span class="icon text-white-50">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <span class="text"><?php echo $ERR?></span></button>
                                        <?php }else{ if($errcode==132){?>
                                           <button class="btn btn-success btn-icon-split btn-user" style="padding-bottom: 20px; margin-bottom: 20px;"><span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text"><?php echo $ERR?></span></button>
                                        <?php } }?>
                                    </div>
                                    <form action="code.php" class="user" method="get">

                                     

                                    <div class="form-group">
                                         <div class="input-group md-3">
                                         <div class="input-group-append">
                                             <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                             </div>
                                             </div>
                                            <input type="email" name="email" required autocomplete="off" value="" class="form-control form-control-user"  aria-describedby="texthelp"
                                             placeholder="Input Your Email">
                                             
                                        </div>
                                        </div>
                                         
                                        

                                        <!-- <div class="form-group">
                                           <div class="custom-control custom-checkbox small">
                                               <input type="checkbox" class="custom-control-input">
                                               <label for="customCheck" class="custom-control-label"> Remember Me</label>
                                           </div>
                                        </div> -->
                                        <hr>

                                      <button  class="btn btn-primary btn-icon-split btn-user btn-block" value="<?php echo $ran;?>" name="reset-btn">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Send Code</span>
                                        </button>
                                        <hr>

                                       


                                    </form>

                                    <div class="text-center">
                                            <a href="login.php" class="small">Back to Login</a>
                                        </div>
                                        <div class="text-center">
                                            <p  class="small">Aleready have an account?<a href="signup.php"> Click Here</a></p>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
   .register-box{
       margin-left: -200px;
       margin-top: 100px;
   }
    </style>
</body>
    <!-- Bootstrap core Javascript -->
    <script src="sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="sb-admin/vendor/bootstrap.bundle.min.js"></script>

    <!-- Core plugin Javascript -->
    <script src="sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="sb-admin/js/sb-admin-2.min.js"></script>
</html>