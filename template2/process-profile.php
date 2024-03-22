<?php include("db.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];
    $accessKey = $_POST["access_key"];
    $title = isset($_POST["title"]) ? $_POST["title"] : "";

    // Check if a file was uploaded
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        // Define the upload directory and file name
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);

        // $file_name = $_FILES["photo"]["name"];
        // $file_tmp  = $_FILES["photo"]["tmp_name"];
        // $file_dir  = "uploads/";

        // Move the uploaded file to the specified directory

        // if (mov_uploaded_file( $file_tmp, $file_dir, $file_name ))

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
            // File upload successful


            // Insert user profile data into 'profiles' table
            $insertProfileQuery = "INSERT INTO `profiles` (`name`, `access_key`, `photo_path`) VALUES ('$name', '$accessKey', '$uploadFile')";

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
        } else {
            // File upload failed
            echo "File upload failed.";
        }
    } else {
        // No file uploaded
        echo "No file uploaded.";
    }
}
?>
