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
$searchtype=$_POST['searchtype'];
$searchterm=trim($_POST['searchterm']);
if (!$searchtype || !$searchterm) {
echo 'You have not entered search details. Please go back and try again.';
exit;
}
$connection = new mysqli('localhost', 'root', 'j007qj=rt', 'inventory');

if ($connection->connect_error){
  die("Connection Error: " . $connection->connect_error);
}
$mytableselect=$_POST['mytable'];
$sql= "SELECT * FROM $mytableselect where ".$searchtype." like '%".$searchterm."%'";
$result = mysqli_query($connection, $sql);
if(!$result) {
  die('Error: Could not retrieve data.' . mysqli_error($connection));
}
$num_results = $result->num_rows;
echo "<p>Building searched: ".$mytableselect."</p>";
echo"<br />";
echo "<p>Number of Results found: ".$num_results."</p>";
?>
<div class="container">
  <div class="table" id="table">
<table rules=all border=1 frame=box>
  <inventoryheader>
    <tr>
      <?php
      $row = mysqli_fetch_assoc($result);
            foreach ($row as $col => $value) {
                echo "<th>";
                echo $col;
                echo "</th>";
            }
      ?>
    </tr>
  </inventoryheader>
  <inventorybody>
    <?php
    mysqli_data_seek($result, 0);
    while ($row = mysqli_fetch_row($result)) {
        ?>
    <tr>
      <?php
    foreach($row as $key => $value){
        echo "<td>";
        echo $value;
        echo "</td>";
    }
    ?>
  </tr>
  <?php }
mysqli_free_result($result);
  ?>
</inventorybody>
</table>
</div>
</div>
</body>
</html>
