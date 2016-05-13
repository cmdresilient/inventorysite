<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli('localhost', 'root', '', 'mysql');
// Selecting Database
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=("select username from login where username='$user_check'");
$result = mysqli_query($connection, $ses_sql);
$row = mysqli_fetch_assoc($result);
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: /testsite/inventory/php/login.php'); // Redirecting To Home Page
}
?>
