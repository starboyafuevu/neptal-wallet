<?php include_once('_includes/functions.inc.php');?>
<?php //include_once('_action/vlogin.php');?>
<?php 
session_start();


 if(isset($_SESSION['uID'])){

  mysqli_select_db($dbfeed, $database_dbsmart5);
  $query_sch3 = sprintf("SELECT folio FROM `bio`  WHERE (status=5 OR status=8) AND uID=".$_SESSION['uID']);
  $sch3 = mysqli_query($dbfeed, $query_sch3) or die(mysqli_error($dbfeed));
  $row_sch3 = mysqli_fetch_assoc($sch3);
  $totalRows_sch3 = mysqli_num_rows($sch3);
 
 if(isset($_SESSION['uID'])){$jj=$_SESSION['uID'];}

$errors = array();
$pwrd = "";


if(isset($_POST['chan'])){

  
  $change =test_input($_POST['chan']);
$chan = test_input($_POST['chang']);

if($change!=$chan){
  $errcode =112; $ermsg = "Code Does Not Match";
}else{
  


  
  mysqli_select_db($dbfeed, $database_dbsmart5);
  $query_g = sprintf("SELECT unique_id, uID, folio FROM `bio` WHERE (status=5 OR status=8) AND uID=%s",
  GetSQLValueString($jj, "int"));
  
  $g = mysqli_query($dbfeed, $query_g) or die(mysqli_error($dbfeed));
  $row_g = mysqli_fetch_assoc($g);
  $totalRows_g = mysqli_num_rows($g);

  $dd = $row_g['uID'];
  // echo $dd;
  // echo 3;
  // die;

  $pd = $row_g['folio'].$row_g['uID'].$change;
  

   $dsd = $row_g['unique_id'];
		
  $insertSQL = sprintf("UPDATE `bio` SET  `pwd`=%s, `status`=%s  WHERE `uID`=%s",
                
  GetSQLValueString(md5($pd), "text"),
  GetSQLValueString(1, "int"),

  // GetSQLValueString($_SESSION['MM_uID'], "int"),
  GetSQLValueString($dd, "int"));       
  // echo  $insertSQL;
  // die;
         
    mysqli_select_db($dbfeed, $database_dbsmart5);
    $Result1 = mysqli_query($dbfeed, $insertSQL) or die(mysqli_error($dbfeed));

    $insertSQL = sprintf("UPDATE `login_wallet` SET  `pwd`=%s, `status`=%s  WHERE `unique_id`=%s",
                
    GetSQLValueString(md5($pd), "text"),
    GetSQLValueString(1, "int"),
  
    // GetSQLValueString($_SESSION['MM_uID'], "int"),
    GetSQLValueString($dsd, "int"));       
    // echo  $insertSQL;
    // die;
           
      mysqli_select_db($dbsmart, $database_dbwacc);
      $Result1 = mysqli_query($dbsmart, $insertSQL) or die(mysqli_error($dbsmart));
    if($Result1){
     
      header('location: login.php');


    }
  }
}else{
  $errors['db_error'] = "Database Error: Failed to Register";
}

 }else{
   header('location: indx.php');
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
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" style="text-align: center; font-weight: bold">Hi..<?php echo $row_sch3['folio'];?><br>Enter Your New Password </p><br>
      <p class="login-box-msg" style="color: red; font-weight: bold"><?php echo $ermsg;?></p>

      <form action="" method="post" >

         
              
      

        <div class="input-group mb-3">
          <input type="password" id="pin" class="form-control" name="chan" autocomplete="off" placeholder="Enter Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" id="pin_c" class="form-control"name="chang" autocomplete="off"  placeholder="Confirm Your Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" id="sub" name="register" class="btn btn-primary btn-block">Confirm</button>
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