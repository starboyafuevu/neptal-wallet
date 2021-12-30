<?php include_once('_includes/functions.inc.php') ?>
<?php 

 session_start();


 $errors = array();
 $fname = "";

 $lname = "";
 $sex = "";
 $date = "";
 $email = "";
 $phone = "";

 $folio = "";



if(isset($_POST['fname'])){
  $fname =test_input($_POST['fname']);
 
  $lname = test_input($_POST['lname']);
  $sex =test_input($_POST['sex']);
  $date =test_input($_POST['date']);
  $email =test_input($_POST['email']);
  $phone =test_input($_POST['phone']);

 
  $folio =test_input($_POST['folio']);
  $pwd =test_input($_POST['pwd']);


  // $pwd = password_hash($pwd, PASSWORD_DEFAULT);

  $insertSQL = sprintf("INSERT INTO bio (`fname`, `lname`, `sex`, `date`, `email`, `phone`, `folio`, `pwd`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                    
                      GetSQLValueString($fname, "text"),
            GetSQLValueString($lname, "text"),
             GetSQLValueString($sex, "text"),
            GetSQLValueString($date, "text"),
             GetSQLValueString($email, "text"),
            GetSQLValueString($phone, "text"),
            GetSQLValueString($folio, "text"),
            GetSQLValueString(md5($pwd), "text"));
            
mysqli_select_db($dbsmart6, $database_dbsmart6);
$Result1 = mysqli_query($dbsmart6, $insertSQL) or die(mysqli_error($dbsmart6));




if(isset($_POST['fname'])){


$insertSQL = sprintf("INSERT INTO login_wallet (`folio`, `phone`, `email`, `pwd`) VALUES (%s, %s, %s, %s)",
GetSQLValueString($folio, "text"),
GetSQLValueString($phone, "text"),
GetSQLValueString($email, "text"),
GetSQLValueString(md5($pwd), "text"));
mysqli_select_db($dbfeed, $database_dbsmart5);
$Result1 = mysqli_query($dbfeed, $insertSQL) or die(mysqli_error($dbfeed));

 
}

 include_once('_action/slogin.php');
    
   header("location: wallet_code.php");
   
  }
  else{
    $errors['db_error'] = "Datebase Error: failed to register";
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
       
      <div class="card">
           <div class="card-body">
           </div>
      </div> 
       <!-- <p>Guaranty your Information are Safe.</p> -->
      
          <div class="register-box">

         

            <div class="register-header" style="text-align:center; margin-bottom: 10px;">
                <h4>Create a Business Account</h4>
            </div><br>
              <form action="" method="post" >

       
               <span><small style="color: red; margin-left: 55px;">** Holder Details ** (Requried)</small></span>
               <div class="input-group mb-3">
                       <input type="test" name="ptn" value="<?php echo $dob;?>" placeholder="Enter Full Name" required class="form-control bottom-line">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
  <div class="input-group mb-2">
                       <input type="test" name="phone2" value="<?php echo $dob;?>" placeholder="Enter Number" required class="form-control bottom-line">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-phone"></span>
                            </div>
                       </div>

                       <div class="input-group mb-2">
                       <input type="email" name="email" value="<?php echo $email;?>" placeholder="Enter Your Email Address" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                       </div>
                    </div>
                    </div>



                  

                    <div class="input-group mb-3">
                       <input type="number" class="form-control bottom-line" name="cuser" placeholder="Number Of Shakeholders">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div>
                                  <span style="margin-left: 55px; color: red;"><small>** Holder Details ** (optional)</small></span>
                    <div class="input-group mb-3">
                       <input type="test" name="ptn2" value="<?php echo $dob;?>" placeholder="Enter Full Name" class="form-control bottom-line">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
  <div class="input-group mb-2">
                       <input type="test" name="phone2" value="<?php echo $dob;?>" placeholder="Enter Number"  class="form-control bottom-line">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-phone"></span>
                            </div>
                       </div>

                       <div class="input-group mb-2">
                       <input type="email" name="email" value="<?php echo $email;?>" placeholder="Enter Your Email Address" class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                       </div>
                    </div>
                    </div>
<!-- 
                    <div class="input-group mb-3">
                       <input type="email" name="email" value="<?php echo $email;?>" placeholder="Enter Your Email Address" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                       </div>
                    </div> -->
<!-- 
                    <div class="input-group mb-3">
                       <input type="text" name="phone"  autocomplete="off" value="<?php echo $phone;?>" placeholder="Enter Phone Number" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-phone"></span>
                            </div>
                       </div>
                    </div> -->

                    <!-- <div class="input-group mb-3">
                       <input type="text" name="address"  autocomplete="off" value="<?php echo $address;?>" placeholder="Enter Your Address" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-map"></span>
                            </div>
                       </div>
                    </div> -->

                    <!-- <div class="input-group mb-3">
                     <div class="autocomplete" style="width: auto;">
                          <label for="country">Country</label>
                          <input type="text" name="country"   placeholder="Country" value="<?php echo $country;?>" value="" id="myInput" class="form-control">
                            
                      </div>
                    </div> -->
<!-- 
                    <div class="input-group mb-3">
                       <input type="text" name="folio"  autocomplete="off" placeholder="Enter Your Username" value="<?php echo $folio;?>" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div> -->

                    <!-- <div class="input-group mb-3">
                       <input type="password" id="pwrd" name="pwd"  autocomplete="off" placeholder="Enter Your Password" required class="form-control" >           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-key"></span>
                             </div>
                       </div>
                    </div> -->
                    <!-- <input type="checkbox" class="check" onclick="myFunction()"> Show Password  -->
                  
                       <button type="submit" id="sub" name="sub" class="btn btn-info form-control bottom-line">Next</button>
                    
              
          
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
          #message{
       
            background: #f1f1f1;
            color: #000;
            position: absolute;
            padding: 20px;
            margin-top: 10px;
          }
          #message p {
           display: block;
           color: red;
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
function myFunction(){
  var x = document.getElementById("pwrd");
  if(x.type === "password"){
    x.type = "text";
  }else{
    x.type = "password";
  }
}
</script>
<script>
var myInput = document.getElementById("pwrd");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var sub = document.getElementById("sub");

//when the user clicks on the password field, show the message
myInput.onfocus= function() {
  document.getElementById("message").style.display ="block";
}

//when the user clicks outside of the password fiels, hide the message
myInput.onchange = function(){
  document.getElementById("message").style.display = "none";
}

//when the user starts to type something inside the password field
myInput.onkeyup = function(){
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)){
    document.getElementById("letter").style.display = "none";
  }else{
    document.getElementById("letter").style.display = "block";
  }

  //validate capital letter
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)){
    document.getElementById("capital").style.display = "none";
  }else{
    document.getElementById("capital").style.display = "block";
  }

  //validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    document.getElementById("number").style.display = "none";
  }else{
    document.getElementById("number").style.display = "block";
  }
  
  //validate length
  if(myInput.value.length <=7){
    document.getElementById("length").style.display = "block";
    document.getElementById("sub").style.display = "none";
    
  }else{
    document.getElementById("length").style.display = "none";
    document.getElementById("sub").style.display = "block";
  }
}

</script>

</html>