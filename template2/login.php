<?php require("proccess-login.php"); ?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<center>

 <div class="container_log">
    
    <form action="proccess-login.php" method="post">

    <div class="heading_log">
                        <h1>Login Page</h1>
                        <h3>Login into your account</h3>
                    </div>

        <!-- Username field -->
        <label for="username">Username:</label><br><br>
        <input type="text" name="username" placeholder="Enter Name" required><br>

        <!-- Accgess key field -->
        <label for="access_key">Access Key:</label><br><br>
        <input type="text" name="access_key" placeholder="Enter Password" required><br>

        <!-- Submit button -->
        <input type="submit" value="Login">
        <p>
           <span>Don't have an account? <a href="create-profile.php">Signup</a></span>
        </p>

    </form>

    </div>

    </center>

</body>

</html>