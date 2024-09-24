<?php
$servername = "sql312.infinityfree.com";
$username = "if0_37052951";
$password = "d02sUlCj9fGH";
$dbname = "if0_37052951_dg";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>