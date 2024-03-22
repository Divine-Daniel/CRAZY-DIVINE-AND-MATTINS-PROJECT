<!DOCTYPE html>
<html>
<head>
    <title>Create Profile</title>
</head>
<body>
    <form action="process-profile.php" method="post" enctype="multipart/form-data">
        <!-- Name field -->
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <!-- Profile photo upload -->
        <label for="photo">Profile Photo:</label>
        <input type="file" name="photo" accept="image/*"><br>

        <!-- Generate access key button -->
        <input type="button" value="Generate Access Key" onclick="generateAccessKey()"><br>

        <!-- Display access key -->
        <label for="access_key">Access Key:</label>
        <input type="text" name="access_key" id="access_key" readonly><br>

        <!-- Checkboxes for Mr/Mrs -->
        <label>
            <input type="checkbox" name="title" value="Mr"> Mr
        </label>
        <label>
            <input type="checkbox" name="title" value="Mrs"> Mrs
        </label><br>

        <!-- Submit button -->
        <input type="submit" value="Create Profile">
    </form>

    <script>
        function generateAccessKey() {
            // Implement your access key generation logic here
            var accessKey = "generated_key"; // Replace with your logic
            document.getElementById("access_key").value = accessKey;
        }
    </script>
</body>
</html>
