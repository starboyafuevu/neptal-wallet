<?php 

  
$hostname_dbsmart = "localhost";
$database_dbsmart = "wallet_users";
$username_dbsmart = "root";
$password_dbsmart = "";
$dbsmart = mysqli_connect($hostname_dbsmart, $username_dbsmart, $password_dbsmart) or trigger_error(mysqli_error($dbsmart),E_USER_ERROR);

   

//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
$mail = new PHPMailer();

   
// Enable verbose debug output 
$mail->SMTPDebug = 4;
$mail->isSMTP();  

  
// Send using SMTP 

$mail->Host = "smtp.gmail.com"; 

$mail->SMTPAuth = true; 

  
// SMTP username 

$mail->Username = "starboyandrew.oa@gmail.com";  

  
// SMTP password                    

$mail->Password = "stellajamaho"; 

$mail->SMTPAuth = "tls"; 

$mail->Port = 587;            

  
//Recipients 
// This email-id will be taken 
// from your database 

$mail->setFrom("info@gmail.com"); 

  
// Selecting the mail-id having 
// the send-mail =1 


mysqli_select_db($dbsmart, $database_dbsmart);
$query_sch = sprintf("SELECT * FROM `bio` WHERE status=1 AND send_mail=1");
// 
 
$sch = mysqli_query($dbsmart, $query_sch) or die(mysqli_error($dbsmart));
$row_sch = mysqli_fetch_assoc($sch);
$totalRows_sch = mysqli_num_rows($sch);
  

if($totalRows_sch > 0) { 

    while($row_sch = mysqli_fetch_assoc($sch)) { 

        $mail->addAddress($row_sch['email']); 

    } 

  

    // Set email format to HTML 

    $mail->isHTML(true); 

    $mail->Subject =  

        "Mailer Multiple address in php"; 

          

    $mail->Body = "Hii </p>Myself </h1>Andrew  

    </h1> your Article has been acknowledge  

    by me and shortly this article will be  

    contributing in</p> <h1>Okpako Andrew</h1>"; 

      

    $mail->AltBody = "Welcome to Neptal wallet"; 

       

    if($mail->send()) 

    { 

       echo "Message has been sent check mailbox";  

    } 

    else{ 

        echo "failure due to the google security"; 

    } 
}
?>