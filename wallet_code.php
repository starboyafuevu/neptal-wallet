<?php include_once('_includes/functions.inc.php');?>
<?php include_once('_action/vlogin.php');?>
<?php 
session_start();


 if(isset($_SESSION['MM_uID'])){

  // echo 3;
  // die;
 
 if(isset($_SESSION['MM_uID'])){$jj=$_SESSION['MM_uID'];}

$errors = array();
$pin = "";
$confrim_pin = "";
$folio = $_SESSION['MM_Username'];

if(isset($_POST['pin'])){

  
  $pin =test_input($_POST['pin']);
  $folio = $_SESSION['MM_Username'];

if(test_input($_POST['confirm_pin'])!=$pin){
  $errcode=112; $errmsg = "Code Do not Match Try Again!";
}else{}

if($errcode!=112){  
  mysqli_select_db($dbsmart, $database_dbsmart6);
  $query_g = sprintf("SELECT * FROM `bio` WHERE uID=%s",
  GetSQLValueString($jj, "int"));
  // echo $query_g ;
  // die;
  $g = mysqli_query($dbsmart, $query_g) or die(mysqli_error($dbsmart));
  $row_g = mysqli_fetch_assoc($g);
  $totalRows_g = mysqli_num_rows($g);
   $usname = $row_g['folio'];
   $dd = $row_g['unique_id'];
  // echo $dd;
  // echo 3;
  // die;
  $set = "{$usname}Neptalt";
  $pass= $pin.$set;
  $dsd = $_SESSION['MM_uID'];


  $insertSQL = sprintf("UPDATE `login_wallet` SET  `pin`=%s, `status`=%s  WHERE `unique_id`=%s",
                
  GetSQLValueString(md5($pass), "text"),
  GetSQLValueString(1, "int"),

  // GetSQLValueString($_SESSION['MM_uID'], "int"),
  GetSQLValueString($dd, "text"));       
  // echo  $insertSQL;
  // die;
         
    mysqli_select_db($dbsmart, $database_dbwacc);
    $Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));
    if($Result1){
     
      header('location: org/index.php');


    }
  }
}else{
  $errors['db_error'] = "Database Error: Failed to Register";
}

 }else{
   header('location: indee.php');
 }

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
      <p class="login-box-msg">Hi..<span style="color: Green; font-weight: bold"><?php echo $_SESSION['MM_Username'];?></span>..Enter a code. For the use of transfer and funding of Wallet </p>

      <form action="" method="post" >

         
              
         <input type="hidden" name="folio" value="<?php echo $_SESSION['MM_Username'];?>" class="form-control">
     

        <div class="input-group mb-3">
          <input type="password" id="pin" class="form-control" name="pin" autocomplete="off" placeholder="Enter Code" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" id="pin_c" class="form-control"name="confirm_pin" autocomplete="off"  placeholder="Confirm Your Code" required>
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