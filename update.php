<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$id = "";
$name = "";
$age = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $id = test_input($_POST["id"]);
  $name = test_input($_POST["name"]);
  $age = test_input($_POST["age"]);
}

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

$sql = "UPDATE staffs SET fname='$name', age='$age' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>