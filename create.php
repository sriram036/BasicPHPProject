<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$name = "";
$age = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = test_input($_POST["name"]);
  $age = test_input($_POST["age"]);
}
echo $name;
echo $age;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "INSERT INTO staffs (fname, age) VALUES ('$name',$age)";

if ($conn->query($sql) === TRUE) {
  echo "New Record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>