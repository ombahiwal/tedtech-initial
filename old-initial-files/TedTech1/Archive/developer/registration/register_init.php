<?php
// add user already registered Code. If not register then only insert

error_reporting(0);
if(isset($_POST['send'])){
include('../../handlers/dbh.php');  
    
    $email_verify = mysqli_real_escape_string($conn, $_POST['email']);
    $sql_verify_email = "SELECT * FROM users_developer WHERE user_email='{$email_verify}'";
    $sql_query = mysqli_query($conn, $sql_verify_email);
    if(mysqli_num_rows($sql_query)){
        header("location:index.php?exists=1");   
    }
    
    // upload resume code    
    $target_dir = "resumes/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.
    <script>

    window.setTimeout(function () {
        location.href = \"../../index.html\";
    }, 6000);

    </script>";
// if everything is ok, try to upload file
    }else {
   
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
    if ( move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.''.$newfilename)) {
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
        
    }
}
    
    
    
    // Insert Details Code.
     
   // $name= mysqli_real_escape_string($_POST['name']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $status= mysqli_real_escape_string($conn, $_POST['status']);
    $name= mysqli_real_escape_string($conn, $_POST['name']);
    $resume_name = $newfilename;
    $institution = mysqli_real_escape_string($conn, $_POST['institution']);
    $qualification= mysqli_real_escape_string($conn, $_POST['qualification']);
    $domains = mysqli_real_escape_string($conn, $_POST['domains']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);
    $hash = password_hash( $password, PASSWORD_DEFAULT);

    $insert_sql_query = "INSERT INTO users_developer (name, user_email, resume_name, password, domains, institution, qualification_status, qualification) VALUES ('{$name}', '{$email}','{$resume_name}', '{$hash}', '{$domains}', '{$institution}', '{$status}', '{$qualification}')";
        
    $query_insert = mysqli_query($conn, $insert_sql_query);
    $target_url = "http://tedtech.in/developer/registration/verify_token.php";
	$token = mt_rand(10000, 99999);
    $to=$email;
    $token_hash = password_hash($token.''.$to, PASSWORD_DEFAULT);
	$subject="TedTech Email Verification.";
	$body= "
    <center>
    <img src='http://tedtech.in/images/logos/email_logo.png'><br>
    <h1>Email Verification </h1>
    Verify your Email address <br>
    <a href='{$target_url}?t={$token_hash}'>Click Here to Verify</a><br><br>
    &#9400; 2018 TedTech.in
    </center>
    ";
    $user_ip = mysqli_real_escape_string($conn, $_POST['user_verify_ip']);
    // Change the Targer URL and Image URL 
    
include '../../Mailer/classes/class.phpmailer.php';
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
       
       //ALTER TABLE tokens_verify ADD FOREIGN KEY (email_id) REFERENCES temp_users_aug(email)
        $sql_insert_token = "INSERT INTO tokens_verify (token_verify, email_id, client_ip) VALUES ('{$token_hash}', '{$to}', '{$_POST['user_verify_ip']}')";
       mysqli_query($conn, $sql_insert_token);
   	  //echo "<center><h2 style='font-family:helvetica'>Token Sent Successfully..</h2></center>";
   }


    
/*if(password_verify('hello_pass', $has)){
    echo "verified";
}else{
    echo "Not Verified";
}
  */  echo'
  <html>
    <title>TedTech | Registered</title>
    <body style="font-family:Roboto Condensed, sans-serif;" >
<center><h3>Registration Success</h3><br><h1>Please Check your Email</h1><br><h2>We will get back to you soon!!</h2><br><h3><br>Redirecting to Home Page...</h3></center>
        </body>
<script>

    window.setTimeout(function () {
        location.href = "../../index.html";
    }, 6000);

    </script></html>
  ';
}

?>