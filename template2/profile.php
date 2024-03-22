<?php include("db.php"); ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>HOME PAGE</title>
</head>
<body>
    
<?php
if (isset($_GET["id"])) {
    // Connect to the database (replace with your actual database credentials)
    // $conn = new mysqli("localhost", "root", "", "user_profiles");


    $profileId = $_GET["id"];

    // Query to retrieve profile details
    // $getProfileQuery = "SELECT p.username, p_d.gender, p.photo FROM `profiles` p
    //                    LEFT JOIN `profile_details` pd ON p.id = pd.profile_id
    //                    WHERE p.id = '$profileId'";


    $getProfileQuery = "SELECT p.name, pd.title, p.photo_path FROM `profiles` p
                       LEFT JOIN `profile_details` pd ON p.id = pd.profile_id
                       WHERE p.id = '$profileId'";

    $result = $conn->query($getProfileQuery);

    if ($result -> num_rows > 0) {

        // Display the user's profile information
        $row = $result->fetch_assoc();
        echo "<h1>Welcome, " . $row["title"] . " " . $row["username"] . "!</h1>";
        echo "<img src='" . $row["photo"] . "' alt='Profile Photo', class='img_profile'><br>";
        // Additional profile information can be displayed here

    } 

    // Close the database connection
    $conn->close();
}// else {
    // Redirect to login page if profile ID is not provided
  //  header("Location: login.php");
    //exit;
//}
?>




<script src="assets/js//bootstrap.bundle.js"></script>
<script type="text/javascript" src="assets/js/jquery-4.3.0.js"></script>
</body>
</html>
