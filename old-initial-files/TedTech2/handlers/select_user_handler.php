<?php 
//Databse Handler
//tedtech_master is the database name.
// Addrequesr privilages
$id="select_query_u";$pass="Select@TedTech"; $db="tedtech_db"; 
//$id="root";$pass="root"; $db="tedtech_master"; 
$conn=mysqli_connect('localhost',$id,$pass,$db);
/*

if($conn){
    echo"Database Connected!!<br>";
}else{
    echo "Cannot Connect Database<br>";
}*/
?>