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
          </button>
        </div>
          <div id="navbar" class="collapse navbar-collapse">
              <u1 class="nav navbar-nav">
                <li class="active"><a href="/mctest/inventory/search.html">Return to search</a></li>
                <li><a href="/mctest/inventory/insert.html">Insert</a></li>
                <li><a href="/mctest/inventory/delete.html">Delete</a><li>
                <li><a href="http://131.183.14.213/phpmyadmin">Database Management</a></li>
                <li><a href="/mctest/inventory/php/logout.php">Logout</a></li>
              </u1>
          </div>
      </div>
    </nav>
    <?php
    //connect to the database
    $connection = new mysqli('localhost', 'root', 'j007qj=rt', 'inventory');
    $mytableinsert1 = $_POST['mytableinsert1'];
    if (isset($_POST['submit'])) {
  	    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
  	        echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
  	        echo "<h2>Displaying contents:</h2>";
  	        readfile($_FILES['filename']['tmp_name']);
            echo "<br /><br /><h3>Thank you for using the Main Campus inventory database.</h3>";
}
  	    $handle = fopen($_FILES['filename']['tmp_name'], "r");
  	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
  	        $import="INSERT into $mytableinsert1 (computertag, room, user, department, manufacturer, model)
            values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]', '$data[5]')";
  	        mysqli_query($connection, $import) or die(mysqli_error($connection));
  	    }
  	    fclose($handle);
  	}else {
  	}
    ?>
</body>
</html>
