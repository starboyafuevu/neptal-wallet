<?php 
// *** Logout the current user.
$logoutGoTo = "../indx.php";
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





header("Location: login.php");

include_once('_includes/functions.inc.php');
exit;
?>


