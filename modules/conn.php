<?php
$serverip = "website.cxis6qocq7rk.eu-west-2.rds.amazonaws.com";
$username = "admin";
$password = "Woody3120!";
$dbname = "website";

// Create connection
$conn = new mysqli($serverip, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
