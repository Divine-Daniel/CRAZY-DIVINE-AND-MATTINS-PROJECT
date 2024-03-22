<?php include("db.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    global $conn;

    // Retrieve data from the login form
    $enteredUsername = $_POST["username"];
    $enteredAccessKey = $_POST["access_key"];

    // Query to check login credentials
    $checkLoginQuery = "SELECT p.id, c.username, c.password FROM `user_profiles` p
                        INNER JOIN `credentials` c ON p.id = c.profile_id
                        WHERE c.username = '$enteredUsername' AND c.password = '$enteredAccessKey'";

    $result = $conn->query($checkLoginQuery);

    if ($result->num_rows > 0) {
        // Successful login, retrieve the profile ID
        $row = $result->fetch_assoc();
        $profileId = $row["id"];

        // Close the database connection
        $conn->close();

        // Failed login, redirect back to login page
        header("Location: login.php");
        // header("Location: profile.php?id=$profileId");
        exit;
        
    }else {
        
        // Redirect to profile page
    $conn->close();
    header("Location: profile.php?id=$profileId");
    // header("Location: login.php");
    exit;
        
    }

}

?>
