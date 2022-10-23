<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Listing</title>
</head>

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

$sql = "SELECT first FROM randuser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "First Name: " . $row["first"] . "<br>" ;
    echo "Last Name: " . $row["last"] . "<br>" ;
    echo "Country: " . $row["country"] . "<br>" ;
    echo "Time: " . $row["time"] . "<br>" ;
  
  }
} else {
  echo "0 results";
}


$conn->close();

?>

    <br><br>
    <button class= "btn btn-info" onclick="history.back()">Back</button>

</body>
</html>
