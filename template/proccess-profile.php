<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];
    $accessKey = $_POST["access_key"];
    $title = isset($_POST["title"]) ? $_POST["title"] : "";

    // Connect to the database (replace with your actual database credentials)
    $conn = new mysqli("localhost", "root", "", "user_profiles");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user profile data into 'profiles' table
    $insertProfileQuery = "INSERT INTO `profiles` (`name`, `access_key`) VALUES ('$name', '$accessKey')";
    $conn->query($insertProfileQuery);

    // Retrieve the newly created profile ID
    $profileId = $conn->insert_id;

    // Insert login credentials into 'credentials' table
    $insertCredentialsQuery = "INSERT INTO `credentials` (`profile_id`, `username`, `password`) VALUES ('$profileId', '$name', '$accessKey')";
    $conn->query($insertCredentialsQuery);

    // Insert additional profile details into 'profile_details' table
    $insertDetailsQuery = "INSERT INTO `profile_details` (`profile_id`, `title`) VALUES ('$profileId', '$title')";
    $conn->query($insertDetailsQuery);

    // Close the database connection
    $conn->close();

    // Redirect to login page
    header("Location: login.php");
    exit;
}

?>
