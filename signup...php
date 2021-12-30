<?php include_once('_includes/functions.inc.php'); ?>
<?php //include_once('_action/vlogin.php');?>
<?php
if(isset($_POST['uname'])  && isset($_POST['phone'])  && isset($_POST['address'])  && isset($_POST['fname'])  && isset($_POST['lname'])){


  $insertSQL = sprintf("INSERT INTO users (`fname`, `lname`, `phone`, `email`, `address`, `dob`, `sex`, `pwrd`, `mname`, `country`, `username`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
  GetSQLValueString(test_input($_POST['fname']), "text"),
GetSQLValueString(test_input($_POST['lname']), "text"),
GetSQLValueString(test_input($_POST['phone']), "text"),
//GetSQLValueString(test_input($_POST['aphone']), "text"),
GetSQLValueString(test_input($_POST['email']), "text"),
GetSQLValueString(test_input($_POST['address']), "text"),
GetSQLValueString(test_input($_POST['dob']), "text"),
GetSQLValueString(test_input($_POST['sex']), "int"),
GetSQLValueString(md5(test_input($_POST['pwrd'])), "text"),
GetSQLValueString(test_input($_POST['mname']), "text"),
GetSQLValueString(test_input($_POST['country']), "text"),
GetSQLValueString(test_input($_POST['username']), "text"));

mysqli_select_db($dbfeed, $database_dbsmart);
$Result1 = mysqli_query($dbfeed, $insertSQL) or die(mysqli_error($dbfeed));

header("location: yes.php");
}else{
  
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!-- theme style -->
    <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- sweet Alert -->
    <link rel="stylesheet" href="AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- toastr -->
    <link rel="stylesheet" href="AdminLTE/plugins/toastr.min.css">
    <!-- my style -->
    <link rel="stylesheet" href="css/main.css">
    
    <link rel="stylesheet" href="css/font.css">

    <title>Sign-up</title>
</head>
<body class="hold-transition register-page layout-navbar-fixed sidebar-min">
    <div class="wrapper">
    <a href="index.php"><span class="fa fa-home"></span></a>
   
       <div class="content">
       
       <img src="images/app-screens/gfx-z-e.png" alt="guaranty">  
       <!-- <p>Guaranty your Information are Safe.</p> -->
          
          <div class="register-box">

          

            <div class="register-header" style="text-align:center; margin-bottom: 10px;">
                <h3>Create an Account</h3>
            </div>
              <form action="" method="post" >

       
               
                   <div class="input-group mb-3">
                       <input type="text" name="fname" value="<?php echo $fname;?>"  autocomplete="off" placeholder="Enter First Name" required class="form-control">  
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div>


                   
                    <div class="input-group mb-3">
                       <input type="text" autocomplete="off" value="<?php echo $mname;?>"  name="mname" placeholder="Enter Middle Name" required class="form-control">   
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div>
                    

                    <div class="input-group mb-3">
                       <input type="text" autocomplete="off" value="<?php echo $lname;?>" name="lname" placeholder="Enter Last Name" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <select name="sex" class="form-control" required >
                       <option value="">---Select Your Gender---</option>
                       <option value="0">Male</option>
                       <option value="1">Female</option>
                       <option value="3">Others</option>
                       </select>           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="date" name="dob" value="<?php echo $dob;?>" placeholder="Date of Birth" required class="form-control bottom-line">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-calendar"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="email" name="email" value="<?php echo $email;?>" placeholder="Enter Your Email Address" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="text" name="phone"  autocomplete="off" value="<?php echo $phone;?>" placeholder="Enter Phone Number" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-phone"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="text" name="address"  autocomplete="off" value="<?php echo $address;?>" placeholder="Enter Your Address" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-map"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                     <div class="autocomplete" style="width: auto;">
                          <!-- <label for="country">Country</label> -->
                          <input type="text" name="country"   placeholder="Country" value="<?php echo $country;?>" value="" id="myInput" class="form-control">
                            
                      </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="text" name="username"  autocomplete="off" placeholder="Enter Your Username" value="<?php echo $username;?>" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="password" name="pwrd"  autocomplete="off" placeholder="Enter Your Password" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-key"></span>
                            </div>
                       </div>
                    </div>

                    <button type="submit" name="sign-up" class="btn btn-info form-control   swalDefaultSuccess">Submit</button>
                    <p class="btn btn-primary form-control">Already a member? <a href="login.php"><span style="color: white;">Click Here</span></a></p>
                    <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>
              </form>
          </div>
          
            
           
       
      
       </div>
    </div>
    <style>
    .wrapper{
      display: inline-block;
    }
    .fa-home{
     
      margin-left: -200px;
      
      font-size: 30px;
      cursor: pointer;
    }
    .content>img{

      margin-right: 200px;
      margin-top: -125%;
      width: 320px;
      height: 350px;
      padding: 10px 13px;
    }
    img{
      
    }
    input{
      text-decoration: none;
    }
          form{
            bottom: 150px;
          margin: 10px;
            padding: 15px 17px;
            border: 1px solid lightgray;
            border-radius: 10px;
         
          }
          .register-box{
           
           display: inline-block;
            margin-top: 70px;
          }
          </style>
          
</body>
<!-- AdminLTE App -->
<script src="AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo Purpose -->
<script src="AdminLTE/dist/js/demo.js"></script>
<!-- Sweet alert -->
<script src="AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- toastr -->
<script src="AdminLTE/plugins/toastr/toastr.min.js"></script>
<!-- Bootstrap from AdminLTE -->
<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- js files -->
<scrip type="text/javascript" src="js-files/styleform.js"></script>
<!-- Toast -->
<script>
$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Your Account has been created... Please Login!.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: ''
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: ''
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: ''
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: ''
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: ''
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: ''
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: ''
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: ''
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'You are now a registed member'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: ''
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: '',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: '',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: ''
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: ''
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: ''
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: ''
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: ''
      })
    });
  });
</script>
</html>