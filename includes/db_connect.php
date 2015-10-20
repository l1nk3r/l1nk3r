<?php
$servername = "localhost";
$username = "l1nk3r_david";
$password = "boobies69";
$dbname = "l1nk3r_l1nk3r";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 