<html lang="en">
<div1 class="h-100 d-flex align-items-center justify-content-center">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Listing</title>
</head>
<div class="container-fluid">
<body>

    <h1>Added</h1>

<!-- 
    NOTE: this is our backend (server side) code. 
    1. User cannot see this code -- unlike HTML/CSS/JavaScript
    2. This is how we will do database opperations (DB is also on server)
-->    

<?php
// DYNAMIC HTML
$firstname = $_GET['apiFirst'];
echo "<p><strong>$firstname</strong> has been added.</p>";
$lastname = $_GET['apiLast'];
echo "<p><strong>$lastname</strong> has been added.</p>";
$country = $_GET['apiCountry'];
echo "<p><strong>$country</strong> has been added.</p>";
$time = $_GET['apiTime'];
echo "<p><strong>$time</strong> has been added.</p>";



// DATABASE OPERATIONS:
// https://www.w3schools.com/php/php_mysql_insert.asp
$servername = "localhost";
$username = "user14";
$password = "14rone";
$dbname = "db14";

// Create connection (assuming these exist -- we set up the DB on the CLI)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL OPPERATIONS
$sql = "INSERT INTO randuser (first, last, country, time) VALUES ('$firstname', '$lastname', '$country', '$time')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT first,last,country,time FROM randuser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Name: " . $row["first"] . "<br>" ;
  }
} else {
  echo "0 results";
}

$conn->close();

?>

    <br><br>
    <button onclick="history.back()" class="btn btn-primary">Back</button>

  <footer>
    <p>Author: Jordan Kelly</p>
    <p>So I used aligned and centered horizontally and vertically with bootstrap, it actually was much simpler than anticipated. I also changed the back button to be more user friendly.</p>
  </footer>

</body>
</div>
</div1>
</html>
