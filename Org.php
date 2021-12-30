<?php include_once('_includes/functions.inc.php');?>
<?php
 
if($_SESSION['class']==1){
  
}else{
  header('location: option.php');
}

  
  
  
$errors = array();
 $fname = "";

 $lname = "";
 $sex = "";
 $date = "";
 $email = "";
 $phone = "";

 $folio = "";



if(isset($_POST['orgname'])){

 


  $orgname =test_input($_POST['orgname']);
 
  $orgphone= test_input($_POST['orgphone']);
  $orgemail =test_input($_POST['orgemail']);
  $orgID =test_input($_POST['orgID']);
  $oname =test_input($_POST['oname']);
  $ophone =test_input($_POST['ophone']);
  $oemail= test_input($_POST['oemail']);

 
  $orgshort =test_input($_POST['orgshort']);

  $ran_id = rand(time(), 100000000);





  // $pwd = password_hash($pwd, PASSWORD_DEFAULT);

  $twt="sdkjksdjk";
  $ttt="vcdfvdf";

if(isset($_POST['orgname'])){ $twt= test_input($_POST['orgname']);}
if(isset($_POST['orgemail'])){ $ttt= test_input($_POST['orgemail']);}
if(isset($_POST['orgphone'])){ $tst= test_input($_POST['orgphone']);}

if(isset($_POST['re'])){ $ref2= test_input($_POST['re']);}


if (empty($_POST["orgemail"])) {
  $errmsg = $errmsg." Email: Required <br />";
  $errcode=112;
  
  }


  if ((!empty($_POST["orgemail"])) && !filter_var(test_input($_POST['orgemail']), FILTER_VALIDATE_EMAIL)) {
$errmsg = $errmsg." Invalid email format<br />"; 
$errcode=112;
}

  if (empty($_POST["orgphone"])) {
    $errmsg = $errmsg." Phone: Required <br />";
    $errcode=112;
    
    } else {
      $phone = str_ireplace("-","",$_POST["orgphone"]);
      
    
      if(!is_numeric($phone) || strlen(test_input($phone))!=11){ $errcode=112; $errmsg = $errmsg." Phone Number must be 11 Character <br />";} 
      }


      if(isset($_FILES['image'])){

        // echo 99;
        // die;
        $img_name = $_FILES['image']['name'];
   
       $img_type = $_FILES['image']['type'];
  
       $tmp_name = $_FILES['image']['tmp_name'];
        
        $img_explode = explode('.',$img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];


        if(in_array($img_ext, $extensions) === true){


//echo 30;
          $types = ["image/jpeg", "image/jpg", "image/png"];
          if(in_array($img_type, $types) === true){
            $image1 =test_input($_POST['orgname']);
           $img_name = $image1.".jpg";
            //
           //  $new_img_name = $image1.$img_name;
           
              if(move_uploaded_file($tmp_name,"image/".$img_name)){

// echo "complete";
// die;

              }else{echo "cant upload"; die;}

            }


        }


      }


      mysqli_select_db($dbsmart, $database_dborg);
      $query_sch = sprintf("SELECT `orgID` FROM `org_bio` WHERE `orgname` LIKE '%s'", $twt);
      $sch = mysqli_query($dbsmart, $query_sch) or die(mysqli_error($dbsmart));
      $row_sch = mysqli_fetch_assoc($sch);
      $totalRows_sch = mysqli_num_rows($sch);
        
      if($totalRows_sch>0){$errcode=112; $errmsg.="Org. Name already exist<br/>";}


      mysqli_select_db($dbsmart, $database_dborg);
      $query_sch = sprintf("SELECT `orgID` FROM `org_bio` WHERE `orgemail` LIKE '%s'", $ttt);
      $sch = mysqli_query($dbsmart, $query_sch) or die(mysqli_error($dbsmart));
      $row_sch = mysqli_fetch_assoc($sch);
      $totalRows_sch = mysqli_num_rows($sch);
        
      if($totalRows_sch>0){$errcode=112; $errmsg.="Email Address: already exist<br/>";}


      mysqli_select_db($dbsmart, $database_dborg);
      $query_sch = sprintf("SELECT `orgID` FROM `org_bio` WHERE `orgphone` LIKE '%s'", $tst);
      $sch = mysqli_query($dbsmart, $query_sch) or die(mysqli_error($dbsmart));
      $row_sch = mysqli_fetch_assoc($sch);
      $totalRows_sch = mysqli_num_rows($sch);
        
      if($totalRows_sch>0){$errcode=112; $errmsg.="Phone Number: already exist<br/>";}
     

      
	 if (empty($_POST["re"])) {
        $ref3=NULL;
    }else{

      mysqli_select_db($dbsmart6, $database_dbsmart6);
      $query_sch = sprintf("SELECT `uID` FROM `bio` WHERE `ref` LIKE '%s'", $ref2);
      $sch = mysqli_query($dbsmart6, $query_sch) or die(mysqli_error($dbsmart6));
      $row_sch = mysqli_fetch_assoc($sch);
      $totalRows_sch = mysqli_num_rows($sch);

      if($totalRows_sch>0){
      $ref3 = $row_sch['uID'];
      }else{
        mysqli_select_db($dbsmart, $database_dborg);
        $query_sch1 = sprintf("SELECT `uID` FROM `org_bio` WHERE `ref` LIKE '%s'", $ref2);
        $sch1 = mysqli_query($dbsmart, $query_sch1) or die(mysqli_error($dbsmart));
        $row_sch1 = mysqli_fetch_assoc($sch1);
        $totalRows_sch1 = mysqli_num_rows($sch1);

        if( $totalRows_sch1>0){
        $ref3 = $row_sch1['uID'];
        }else{
          $ref3=NULL;
        }
      }
      }

      if($errcode!=112){
        
        $rf="walletABCDORG";
     $ref = str_shuffle($rf);
     

  $insertSQL = sprintf("INSERT INTO org_bio (`orgunique_id`, `orgname`, `orgphone`, `orgemail`, `orgtaxid`, `img`, `ref`) VALUES (%s, %s, %s, %s, %s, %s, %s)",
  GetSQLValueString($ran_id, "int"), 
                      GetSQLValueString($orgname, "text"),
            GetSQLValueString($orgphone, "text"),
             GetSQLValueString($orgemail, "text"),
            GetSQLValueString($orgID, "int"),
             GetSQLValueString($img_name, "text"),
             GetSQLValueString($ref, "text"));
            // GetSQLValueString($phone, "text"),
            // GetSQLValueString($folio, "text"),
            // GetSQLValueString(md5($pwd), "text"),
            // GetSQLValueString($ref, "text"));
          //  echo  $insertSQL;
          //  die;
mysqli_select_db($dbsmart, $database_dborg);
$Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));




if($Result1>0){
  
  $last_id = mysqli_insert_id($dbsmart);

$insertSQL = sprintf("INSERT INTO org_login (`orgunique_id`, `orgemail`, `short`, `orgID`, `refby`) VALUES (%s, %s, %s, %s, %s)",
GetSQLValueString($ran_id, "int"),
GetSQLValueString($orgemail, "text"),
GetSQLValueString($orgshort, "text"),
GetSQLValueString($last_id, "int"),
GetSQLValueString($ref3, "int"));
mysqli_select_db($dbsmart, $database_dborg);
$Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));


$status = "Active Now";

$insertSQL = sprintf("INSERT INTO org_user (`oname`, `ophone`, `oemail`, `orgID`) VALUES (%s, %s, %s, %s)",
GetSQLValueString($oname, "text"),
GetSQLValueString($ophone, "text"),
GetSQLValueString($oemail, "text"),
GetSQLValueString($last_id, "int"));
mysqli_select_db($dbsmart, $database_dborg);
$Result2 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));

//include_once('ind.php');

if($Result2){


 include_once('_action/org.php');

  
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
                 <!-- <p id="letter" class="invalid">A <b>lowercase</b>letter</p>
                 <p id="capital" class="invalid">A <b>capital (uppercase)</b></p>
                 <p id="number" class="invalid">A <b>number</b></p>
                 <p id="length" class="invalid">Minimum <b>8 character</b></p> -->
             </div>

            <div class="register-header" style="text-align:center; margin-bottom: 10px;">
                <h3>Create an Account to suite your Business</h3>
            </div>
              <form action="" method="post" enctype="multipart/form-data">

       
               
                   <div class="input-group mb-3">
                       <input type="text" name="orgname" value="<?php echo $orgname;?>"  autocomplete="off" placeholder="Org. Name" required class="form-control">  
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-users"></span>
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
                       <input type="text" autocomplete="off" value="<?php echo $orgphone;?>" name="orgphone" placeholder="Org. Phone" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-phone"></span>
                            </div>
                       </div>
                    </div>

                    <!-- <div class="input-group mb-3">
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
                    </div> -->
                    <div class="input-group mb-3">
                       <input type="email" name="orgemail" value="<?php echo $orgemail;?>" placeholder="Enter Org. Email Address" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="number" name="orgID" value="<?php echo $orgID;?>" placeholder="Tax ID/ Registration No." required class="form-control bottom-line">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-link"></span>
                            </div>
                       </div>
                    </div>

                    
                    <div class="input-group mb-3">           
                     
                           
                              <span class="fas fa-user">Owner's Details</span>
                           
                    </div>

                    <div class="input-group mb-3">
                       <input type="text" name="oname"  autocomplete="off" value="<?php echo $oname;?>" placeholder="Enter Full Name" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                       </div>
                    </div>

                    <div class="input-group mb-3">
                       <input type="text" name="ophone"  autocomplete="off" value="<?php echo $ophone;?>" placeholder="Phone" class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-phone"></span>
                            </div>
                       </div>
                    </div>

                 

                    <div class="input-group mb-3">
                       <input type="text" name="oemail"  autocomplete="off" placeholder="Email Address" value="<?php echo $oemail;?>" required class="form-control">           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                       </div>
                    </div>


                    <div class="input-group mb-3">
          <input type="file" name="image" placeholer="Choose your Image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
          <div class="input-group-append">
                            
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

                    <div class="input-group mb-3">
                       <input type="text"  name="orgshort"  autocomplete="off" placeholder="Org. Short-Name" required class="form-control" >           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-key"></span>
                            </div>
                       </div>
                    </div>
                   
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