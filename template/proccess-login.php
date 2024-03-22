<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the login form
    $enteredUsername = $_POST["username"];
    $enteredAccessKey = $_POST["access_key"];

    // Connect to the database (replace with your actual database credentials)
    $conn = new mysqli("localhost", "username", "password", "user_profiles");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check login credentials
    $checkLoginQuery = "SELECT p.id, c.username, c.password FROM `profiles` p
                        INNER JOIN `credentials` c ON p.id = c.profile_id
                        WHERE c.username = '$enteredUsername' AND c.password = '$enteredAccessKey'";

    $result = $conn->query($checkLoginQuery);

    if ($result->num_rows > 0) {
        // Successful login, retrieve the profile ID
        $row = $result->fetch_assoc();
        $profileId = $row["id"];

        // Close the database connection
        $conn->close();

        // Redirect to profile page
        header("Location: profile.php?id=$profileId");
        exit;
    }

    // Failed login, redirect back to login page
    $conn->close();
    header("Location: login.php");
    exit;
}
?>
