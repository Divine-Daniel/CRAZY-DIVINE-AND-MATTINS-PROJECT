<?php

// Connect to the database (replace with your actual database credentials)
$conn = new mysqli("localhost", "root", "", "user_profiles");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>