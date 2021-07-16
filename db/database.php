<?php

$servername = "localhost";
$username = "cleo";
$password = "root";
$db = "cleobnb";

$conn = new mysqli($servername, $username, $password, $db);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connection Success";
