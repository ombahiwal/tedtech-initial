<?php
//error_reporting(0);
include('../handlers/select_user_handler.php');
if(isset($_POST['send']))
{
    $target_url = "http://localhost:8888/TedTech1/developer/registration/verify_token.php";
	$token = mt_rand(1000, 9999);
    $to=mysqli_real_escape_string($conn, $_POST['email']);
    $token_hash = password_hash($token.''.$to, PASSWORD_DEFAULT);
	$subject="TedTech Email Verification.";
	$body= "
    <center>
    <img  src='http://localhost:8888/TedTech1/images/logos/final.png'><br>
    <h1>Email Verification </h1>
    Verify your Email address <br>
    <a href='{$target_url}?t={$token_hash}'>Click Here to Verify</a><br><br>
    &#9400; 2018 TedTech.in
    </center>
    ";
    $user_ip = mysqli_real_escape_string($conn, $_POST['user_verify_ip']);
    // Change the Targer URL and Image URL 
    
include 'classes/class.phpmailer.php';
   $mail= new PHPMailer();
   $mail->isSMTP();
   $mail->SMTPDebug=0;
   $mail->SMTPAuth=true;
   $mail->SMTPSecure='ssl';
   $mail->Host="sg3plcpnl0150.prod.sin3.secureserver.net";
   $mail->Port=465;
   $mail->isHTML(true);
   $mail->Username="support@tedtech.in";   // Add your Address.
   $mail->Password="TedTech@123";           // Add your Gmail Password
   $mail->setFrom("TedTech Support");  // Add your Gmail Address.
   $mail->Subject=$subject;
   $mail->Body=$body;
   $mail->addAddress($to);
   if(!$mail->send())
   {
   	 echo "Mailer Error.".$mail->ErrorInfo;
   }
   else
   {
       
       //ALTER TABLE tokens_verify ADD FOREIGN KEY (email_id) REFERENCES temp_users_aug(email)
        $sql_insert_token = "INSERT INTO tokens_verify (token_verify, email_id, client_ip) VALUES ('{$token_hash}', '{$to}', '{$_POST['user_verify_ip']}')";
       
       mysqli_query($conn, $sql_insert_token);
       
   	  echo "<center><h2 style='font-family:helvetica'>Token Sent Successfully..</h2></center>";
   }
}

?>

<script>
setTimeout(function () {
       //window.location.href = "../developer/registration/register_launch.php?s=1"; 
    }, 10); 

</script>

