<?php
// Retrieve user profile information from the file (or database)
$filePath = 'profiles.txt';
$lines = file($filePath, FILE_IGNORE_NEW_LINES);

foreach ($lines as $line) {
    $profileData = json_decode($line, true);

    // Display the user's profile information
    if ($profileData) {
        echo "<h1>Welcome, " . $profileData["title"] . " " . $profileData["name"] . "!</h1>";
        echo "<p>Access Key: " . $profileData["access_key"] . "</p>";
        // Additional profile information can be displayed here
    }
}
?>
