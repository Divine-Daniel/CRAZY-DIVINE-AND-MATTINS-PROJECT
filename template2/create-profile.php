<?php require("process-profile.php"); ?>


<!DOCTYPE html>
<html>
<head>
    <title>Create Profile</title>
    <link rel="stylesheet" href="assets/css/createprofile.css">
</head>

<body>

    <center>

    <div class="container">

    <form action="process-profile.php" method="post" enctype="multipart/form-data">

                        <h1>Signup Page</h1>
                        <h3>Create new account</h3>

        <!-- Name field -->
        <!-- <label for="name"><b>Name:</b></label> -->
        <input type="text" name="name" placeholder="Enter Name" required><br>

        <!-- Display access key -->
        <!-- <label for="access_key"><b>Access Key:</b></label> -->
        <input type="text" name="access_key" placeholder="Enter Security Key" id="access_key" readonly><br>
        
        <!-- Generate access key button -->
        <input type="button" value="Generate Access Key" onclick="generateAccessKey()"><br>

        
        <!-- Profile photo upload -->
        <!-- <label for="photo">Profile Photo:</label> -->
        <input type="file" name="photo" accept="image/*"><br>
        

        <!-- Checkboxes for Mr/Mrs -->
        <label>
            <input type="checkbox" name="title" value="Mr"> Mr
        </label>
        <label>
            <input type="checkbox" name="title" value="Mrs"> Mrs
        </label><br>

        <!-- Submit button -->
        <input type="submit" value="Create Profile">
        <p>
            <span>Don't have an account? <a href="login.php">Signup</a></span>
        </p>

    </form>

    </div>

    </center>

    



    <script>

        function generateAccessKey() {
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*(){}-_=+';
            var keyLength = 10; // Adjust the length as needed
            var accessKey = '';
            
            var randomValues = new Uint32Array(keyLength);
            window.crypto.getRandomValues(randomValues);
            
            for (var i = 0; i < keyLength; i++) {
                accessKey += characters.charAt(randomValues[i] % characters.length);
            }
            
            document.getElementById("access_key").value = accessKey;
        }

    </script>




    <!-- <script>

        function generateAccessKey() {
            // Implement your access key generation logic here
            var accessKey = "generated_key"; // Replace with your logic
            document.getElementById("access_key").value = accessKey;
        }

    </script> -->

</body>
</html>
