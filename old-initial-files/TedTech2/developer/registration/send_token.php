<?php
error_reporting(0);
if(isset($_POST['send']))
{
    $target_url = "http://localhost:8888/developer/registration/register_launch.php";
	$token = mt_rand(10000, 99999);
    $to="{$_POST['email']}";
	$subject="TedTech Verification - Token";
	$body= "
    <center>
    <img height='20%' width='20%' src='http://tedtech.in/final.png'>
    <h1>Email Verification - </h1>
    Use this token to verify your Email address <br>
    Or <a href='{$target_url}?t={$token}'>Click Here to Verify</a>
    </center>
    ";

    
    
include 'classes/class.phpmailer.php';
   $mail= new PHPMailer();
   $mail->isSMTP();
   $mail->SMTPDebug=0;
   $mail->SMTPAuth=true;
   //$mail->SMTPSecure='ssl';
   $mail->Host="smtp.tedtech.in";
   $mail->Port=143;
   $mail->isHTML(true);
   $mail->Username="support@tedtech.in";   // Add your Address.
   $mail->Password="TedTech@123";           // Add your Gmail Password
   $mail->setFrom("support@tedtech.in");  // Add your Gmail Address.
   $mail->Subject=$subject;
   $mail->Body=$body;
   $mail->addAddress($to);
   if(!$mail->send())
   {
   	 echo "Mailer Error.".$mail->ErrorInfo;
   }
   else
   {
   	  echo "<center><h1>Token Sent Successfully</h1></center>";
   }
}

?>

<script>
/*setTimeout(function () {
       window.location.href = "../index.html"; //will redirect to your blog page (an ex: blog.html)
    }, 2000); 
*/
</script>

