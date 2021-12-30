<?php include_once('_includes/functions.inc.php');?>
<?php include_once('_action/vlogin.php');?>
<?php 
session_start();


 if(isset($_SESSION['MM_oID'])){

  // echo $_SESSION['MM_oID'];
  // echo 90;
  // die;
 
 if(isset($_SESSION['MM_oID'])){$jj=$_SESSION['MM_oID'];}

$errors = array();
$pin = "";
$confrim_pin = "";


if(isset($_POST['pin'])){

  
  $pin =test_input($_POST['pin']);
  $folio = $_SESSION['MM_Username'];
if(empty($_POST['descr'])){ $errcode=112; $errmsg = "Please Enter Org. Description!";}else{}
if(test_input($_POST['confirm_pin'])!=$pin){
  $errcode=112; $errmsg = "Password do not Match Try Again!";
}else{}

if($errcode!=112){  
  mysqli_select_db($dbsmart, $database_dborg);
  $query_g = sprintf("SELECT * FROM `org_bio` WHERE orgID=%s",
  GetSQLValueString($jj, "int"));
  // echo $query_g ;
  // die;
  $g = mysqli_query($dbsmart, $query_g) or die(mysqli_error($dbsmart));
  $row_g = mysqli_fetch_assoc($g);
  $totalRows_g = mysqli_num_rows($g);
   $usname = $row_g['orgname'];
   $dd = $row_g['orgID'];
  // echo $dd;
  // echo 3;
  // die;
  $set = "{$usname}Neptalt";
  $pass= $pin.$set;
  $dsd = $_SESSION['MM_oID'];
  $change = $pin;
   $pd = $row_g['orgname'].$row_g['orgID'].$change;



   $insertSQL = sprintf("UPDATE `org_bio` SET   `status`=%s, `descr`=%s, `orgType`=%s, `address`=%s  WHERE `orgID`=%s",
                
   GetSQLValueString(1, "int"),
   GetSQLValueString(test_input(strtoupper($_POST['descr'])), "text"),
   GetSQLValueString(test_input($_POST['group']), "int"),
   GetSQLValueString(test_input($_POST['address']), "text"),
   GetSQLValueString($dd, "int"));       
   // echo  $insertSQL;
   // die;
          
     mysqli_select_db($dbsmart, $database_dborg);
     $Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));

  $insertSQL = sprintf("UPDATE `org_login` SET  `pwd`=%s, `status`=%s  WHERE `orgID`=%s",
                
  GetSQLValueString(md5($pd), "text"),
  GetSQLValueString(1, "int"),

  
  GetSQLValueString($dd, "int"));       
  // echo  $insertSQL;
  // die;
         
    mysqli_select_db($dbsmart, $database_dborg);
    $Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));
    if($Result1){
     
      header('location: org/index.php');


    }
  }
}else{
  $errors['db_error'] = "Database Error: Failed to Register";
}

 }else{
   header('location: option.php');
 }

 mysqli_select_db($dbsmart, $database_dborg);
  $query_g = sprintf("SELECT * FROM `org_type` WHERE status=1");
  
  $g = mysqli_query($dbsmart, $query_g) or die(mysqli_error($dbsmart));
  $row_g = mysqli_fetch_assoc($g);
  $totalRows_g = mysqli_num_rows($g);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wallet | Code</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="wallet_code.php"><b Style="color: red; font-weight: bold">Neptal</b> <span style="color: green; font-weight:bold">Wallet</span></a>
  </div>
  <h4 style="padding-top: 10px; text-align: center"><span style="font-size: 20px; color: red"><?php echo $errmsg?></span></h4>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Hi..<span style="color: green; font-weight: bold"><?php echo $_SESSION['MM_org'];?></span>.... Select your Business category and create your password to Login </p>

      <form action="" method="post" >

         
              
         <input type="hidden" name="folio" value="<?php echo $_SESSION['MM_Username'];?>" class="form-control">
     
    <div class="input-group mb-3">
    <select name="group" class="form-control"  required="required">
                
                <option value=""> -- Select Business Category ---</option>
                <?php while($row_g = mysqli_fetch_assoc($g)){?>
                <option value="<?php echo $row_g['typeID']; ?>"> <?php echo $row_g['name']; ?></option>
                <?php }?>
                </select>           
                       <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-note"></span>
                            </div>
                       </div>
                    </div>



                    <div class="input-group mb-3">
          <input type="text"  class="form-control" name="descr" autocomplete="off" placeholder="Org. Description" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>


        <div class="input-group mb-3">
          <input type="text"  class="form-control" name="address" autocomplete="off" placeholder="Org. Address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map"></span>
            </div>
          </div>
        </div>
        
        
        

        <div class="input-group mb-3">
          <input type="password" id="pin" class="form-control" name="pin" autocomplete="off" placeholder="Enter Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" id="pin_c" class="form-control"name="confirm_pin" autocomplete="off"  placeholder="Confirm Your Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" id="sub" name="register" class="btn btn-primary btn-block">Proceed</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<style>

</style>
<!-- /.login-box -->

<!-- jQuery -->
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
<script>

</script>