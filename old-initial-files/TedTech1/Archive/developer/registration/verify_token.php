<!DOCTYPE HTML>
<html>
<head>
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <link rel="apple-touch-icon" sizes="57x57" href="../../favi/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../../favi/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../../favi/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../../favi/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../../favi/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../../favi/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../../favi/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../../favi/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../../favi/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../../favi/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../favi/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../../favi/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../favi/favicon-16x16.png">
<link rel="manifest" href="../../favi/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../../favi/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

<?php
    
    // add code for Already Verified
    
include('../../handlers/dbh.php');
if(isset($_REQUEST['t'])){
    
    
    $token = mysqli_real_escape_string($conn, $_REQUEST['t']);
    $sql_verify_token = "SELECT * FROM tokens_verify WHERE token_verify='{$token}'";
    $sql_query = mysqli_query($conn, $sql_verify_token);
    if(mysqli_num_rows($sql_query)){
        $row = mysqli_fetch_assoc($sql_query);
        $verification_email = $row['email_id'];
        $sql_update_verification_status = "UPDATE users_developer SET email_verification='1' WHERE user_email='{$verification_email}'";
        $sql_query = mysqli_query($conn, $sql_update_verification_status);
        echo "<center>
                <img style='' src='../../images/logos/final.png'><br>
                <br>
                <img style='' src='../../images/stock/verified.png'><br>
        <br><h2 style='font-family:helvetica'>Email Verified Successfully!!<br>Redirecting to TedTech.in...</h2><br></center>";
        
 echo "<script>
setTimeout(function () {
       window.location.href = '../../index.html'; 
    }, 6000); s

</script>
";
    }else{
        echo "<h1>Not Verified, Invalid Link</h1?>";
        echo "<script>
setTimeout(function () {
       window.location.href = '../../index.html'; 
    }, 2000); 

</script>
";
    }    
}else{
    
    echo "<script>
setTimeout(function () {
       window.location.href = '../../index.html'; 
    }, 3000); 

</script>
";
}

/*$has = password_hash( 'hello_pass', PASSWORD_DEFAULT);

if(password_verify('hello_pass', $has)){
    echo "verified";
}else{
    echo "Not Verified";
}

*/
?>
    
</html>