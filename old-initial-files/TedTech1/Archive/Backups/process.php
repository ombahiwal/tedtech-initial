<?php
include('./handlers/dbh.php');
if(isset($_POST['send'])){
$sql = "INSERT INTO temp_users_aug(name, email, domains, status) VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$_POST['domains']}', '{$_POST['status']}')";
$query = mysqli_query($conn, $sql);
}


?>
<html>
    <title>TedTech | Registered</title>
    <body >
<center><h3>Registration Success</h3><br><h1>We will get back to you soon!!</h1><br><h3>Redirecting to Home Page...</h3></center>
        </body>
<script>

    window.setTimeout(function () {
        location.href = "../../index.html";
    }, 3000);

    </script></html>