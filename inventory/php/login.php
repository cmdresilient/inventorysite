<html>
<head>
<title>Main Campus Inventory Database</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"/>
<link href="/mctest/inventory/css/styles.css" type="text/css" rel="stylesheet" />
<body>
  <?php
  session_start(); // Starting Session
  $error='';
  if (isset($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
  $error = "Username or Password is invalid";
  }
  else
  {
  // Define $username and $password
  $username=$_POST['username'];
  $password=$_POST['password'];
  $passwordsha = sha1($password);
  // Establishing Connection with Server by passing server_name, user_id and password as a parameter
  $connection = new mysqli('localhost', 'root', 'j007qj=rt', 'inventory');
  if (!$connection){
    mysqli_error($connection);
  }
  // To protect MySQL injection for Security purpose
  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);
  // SQL query to fetch information of registerd users and finds user match.
  $sql = "SELECT * from users where username='$username' and password='$passwordsha'";
  $result= mysqli_query($connection, $sql);
  if (!$result){
    die(mysqli_error($connection));
  }
  $rows = mysqli_num_rows($result);

  if ($rows == 1) {
  $_SESSION['login_user']=$username; // Initializing Session
  header("location: /mctest/inventory/search.html"); // Redirecting To Other Page
  } else {
  echo 'Username or Password is invalid ' . $passwordsha;
  }
  mysqli_close($connection); // Closing Connection
  }
  }
  ?>
 </body>
 </html>
