<?php

require "config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_GET["Name"];
$age = $_GET["Age"];

$sql = "INSERT INTO `User` (`Name`, `Age`, `Status`)
VALUES ('$name', '$age', 0)";

if ($conn->query($sql) === TRUE) {
  header("Location: Z.php");
  exit;
} else {
  echo "Error: " . $conn->error;
}

$conn->close();

?>