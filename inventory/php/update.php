<html>
<head>
<title>Main Campus Inventory Database</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"/>
<link href="/mctest/inventory/css/styles.css" type="text/css" rel="stylesheet" />
<body>
  <h1><u>Main Campus Inventory:</u></h1><br>
    <br><br>
  <nav class ="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
          <div id="navbar" class="collapse navbar-collapse">
              <u1 class="nav navbar-nav">
                <li class="active"><a href="/mctest/inventory/search.html">Return to search</a></li>
                <li><a href="/mctest/inventory/insert.html">Insert</a></li>
                <li><a href="/mctest/inventory/delete.html">Delete</a></li>
                <li><a href="http://131.183.14.213/phpmyadmin">Database Management</a></li>
                <li><a href="/mctest/inventory/php/logout.php">Logout</a></li>
              </u1>
          </div>
      </div>
    </nav>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$shapassword = sha1($password);
$connection = new mysqli('localhost', 'root', 'j007qj=rt', 'inventory');

if ($connection->connect_error){
  die("Connection Error: " . $connection->connect_error);
}
if($password == $password1){
$sql = "update users
        SET password='$shapassword'
        where username='$username'";
$result = mysqli_query($connection, $sql);
echo "Password Update Successful";
}
else {
  echo "Passwords do not match";
}
?>
</body>
</html>
