<?php include_once('_includes/functions.inc.php');?>
<?php
  
  


  
  
  
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
  $re= test_input($_POST['re']);

 
  $folio =test_input($_POST['folio']);
  $pwd =test_input($_POST['pwd']);
  $ran_id = rand(time(), 100000000);





  // $pwd = password_hash($pwd, PASSWORD_DEFAULT);

  $twt="sdkjksdjk";
  $ttt="vcdfvdf";

if(isset($_POST['phone'])){ $twt= test_input($_POST['phone']);}
if(isset($_POST['email'])){ $ttt= test_input($_POST['email']);}
if(isset($_POST['folio'])){ $tst= test_input($_POST['folio']);}

if(isset($_POST['re'])){ $ref2= test_input($_POST['re']);}


if (empty($_POST["email"])) {
  $errmsg = $errmsg." Email: Required <br />";
  $errcode=112;
  
  }


  if ((!empty($_POST["email"])) && !filter_var(test_input($_POST['email']), FILTER_VALIDATE_EMAIL)) {
$errmsg = $errmsg." Invalid email format<br />"; 
$errcode=112;
}

  if (empty($_POST["phone"])) {
    $errmsg = $errmsg." Phone: Required <br />";
    $errcode=112;
    
    } else {
      $phone = str_ireplace("-","",$_POST["phone"]);
      
    
      if(!is_numeric($phone) || strlen(test_input($phone))!=11){ $errcode=112; $errmsg = $errmsg." Phone Number must be 11 Character <br />";} 
      }

      mysqli_select_db($dbsmart6, $database_dbsmart6);
      $query_sch = sprintf("SELECT `uID` FROM `bio` WHERE `phone` LIKE '%s'", $twt);
      $sch = mysqli_query($dbsmart6, $query_sch) or die(mysqli_error($dbsmart6));
      $row_sch = mysqli_fetch_assoc($sch);
      $totalRows_sch = mysqli_num_rows($sch);
        
      if($totalRows_sch>0){$errcode=112; $errmsg.="Phone number: already exist<br/>";}


      mysqli_select_db($dbsmart6, $database_dbsmart6);
      $query_sch = sprintf("SELECT `uID` FROM `bio` WHERE `email` LIKE '%s'", $ttt);
      $sch = mysqli_query($dbsmart6, $query_sch) or die(mysqli_error($dbsmart6));
      $row_sch = mysqli_fetch_assoc($sch);
      $totalRows_sch = mysqli_num_rows($sch);
        
      if($totalRows_sch>0){$errcode=112; $errmsg.="Email Address: already exist<br/>";}


      mysqli_select_db($dbsmart6, $database_dbsmart6);
      $query_sch = sprintf("SELECT `uID` FROM `bio` WHERE `folio` LIKE '%s'", $tst);
      $sch = mysqli_query($dbsmart6, $query_sch) or die(mysqli_error($dbsmart6));
      $row_sch = mysqli_fetch_assoc($sch);
      $totalRows_sch = mysqli_num_rows($sch);
        
      if($totalRows_sch>0){$errcode=112; $errmsg.="User name: already exist<br/>";}
     

      
	 if (empty($_POST["re"])) {
        $ref3=NULL;
    }else{

      mysqli_select_db($dbsmart6, $database_dbsmart6);
      $query_sch = sprintf("SELECT `uID` FROM `bio` WHERE `ref` LIKE '%s'", $ref2);
      $sch = mysqli_query($dbsmart6, $query_sch) or die(mysqli_error($dbsmart6));
      $row_sch = mysqli_fetch_assoc($sch);
      $totalRows_sch = mysqli_num_rows($sch);
      $ref3 = $row_sch['uID'];
      }

      if($errcode!=112){
        
        $rf="walletABCD";
     $ref = str_shuffle($rf);
     

  $insertSQL = sprintf("INSERT INTO bio (`unique_id`, `fname`, `lname`, `sex`, `date`, `email`, `phone`, `folio`,  `ref`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
  GetSQLValueString($ran_id, "int"), 
                      GetSQLValueString($fname, "text"),
            GetSQLValueString($lname, "text"),
             GetSQLValueString($sex, "text"),
            GetSQLValueString($date, "text"),
             GetSQLValueString($email, "text"),
            GetSQLValueString($phone, "text"),
            GetSQLValueString($folio, "text"),
          
            GetSQLValueString($ref, "text"));
            
mysqli_select_db($dbsmart6, $database_dbsmart6);
$Result1 = mysqli_query($dbsmart6, $insertSQL) or die(mysqli_error($dbsmart6));




if($Result1>0){
  
  $last_id = mysqli_insert_id($dbsmart6);

  $pd = $folio.$last_id.$pwd;

$insertSQL = sprintf("INSERT INTO login_wallet (`unique_id`, `folio`, `pwd`, refby) VALUES (%s, %s, %s, %s)",
GetSQLValueString($ran_id, "int"),
GetSQLValueString($folio, "text"),
GetSQLValueString(md5($pd), "text"),
GetSQLValueString($ref3, "int"));
mysqli_select_db($dbsmart, $database_dbwacc);
$Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));




$insertSQL = sprintf("INSERT INTO users (`unique_id`, `name`, `password`, `email`) VALUES (%s, %s, %s, %s)",
GetSQLValueString($ran_id, "int"),
GetSQLValueString($folio, "text"),
GetSQLValueString(md5($pwd), "text"),
GetSQLValueString($email, "text"));
mysqli_select_db($dbchat, $database_dbchat);
$Result2 = mysqli_query($dbchat, $insertSQL) or die(mysqli_error($dbchat));

include_once('ind.php');

if($Result2){


 include_once('_action/slogin.php');

  
}

}
}


   
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
    <div class="top-nav">
    <a href="index.php"><span class="fa fa-home"></span></a>
    <button onclick="myTheme()" style="">Change Theme</button>
   </div>
       <div class="content">
       
      <div class="card">
           <div class="card-body">
           </div>
      </div> 
       <!-- <p>Guaranty your Information are Safe.</p> -->
      
          <div class="register-box">

          <div id="message" style="margin-left: 400px; margin-top: 100px; width: 200px;"> 
                 <p style="color: green"><?php echo $errmsg;?></p>
                 <p id="letter" class="invalid">A <b>lowercase</b>letter</p>
                 <p id="capital" class="invalid">A <b>capital (uppercase)</b></p>
                 <p id="number" class="invalid">A <b>number</b></p>
                 <p id="length" class="invalid">Minimum <b>8 character</b></p>
             </div>

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


<!--                    
                    <div class="input-group mb-3">
                       <input type="text" autocomplete="off" value="<?php// echo $mname;?>"  name="mname" placeholder="Enter Middle Name" required class="form-control">   
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div> -->
                    

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
                       <option value="male">Male</option>
                       <option value="female">Female</option>
                       <option value="others">Others</option>
                       </select>           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="date" name="date" value="<?php echo $dob;?>" placeholder="Date of Birth" required class="form-control bottom-line">           
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
                       <input type="text" name="re"  autocomplete="off" value="<?php echo $re;?>" placeholder="Referral Code ( Optional )" class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-link"></span>
                            </div>
                       </div>
                    </div>

                    <!-- <div class="input-group mb-3">
                     <div class="autocomplete" style="width: auto;">
                          <label for="country">Country</label>
                          <input type="text" name="country"   placeholder="Country" value="<?php echo $country;?>" value="" id="myInput" class="form-control">
                            
                      </div>
                    </div> -->

                    <div class="input-group mb-3">
                       <input type="text" name="folio"  autocomplete="off" placeholder="Enter Your Username" value="<?php echo $folio;?>" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="password" id="pwrd" name="pwd"  autocomplete="off" placeholder="Enter Your Password" required class="form-control" >           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-key"></span>
                            </div>
                       </div>
                    </div>
                    <input type="checkbox" class="check" onclick="myFunction()"> Show Password 

                    <button type="submit" id="sub" name="sub" class="btn btn-info form-control ">Submit</button>
                    
                    <p class="btn btn-primary btn-md">Already a member? <a href="login.php"><span style="color: white;">Click Here</span></a></p>
                    
              
          
                    </form>
                   
                
          </div>
            
           
       
      
       </div>
    </div>
    <style>
    body {
  padding: 25px;
  background-color: white;
  color: black;
  font-size: 18px;
}

.dark-mode {
  background-color: black;
  color: white;
}
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
function myTheme(){
  var element = document.body;
   element.classList.toggle("dark-mode");
}

</script>
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