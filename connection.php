<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "sqli";

// Create connection_aborted
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>