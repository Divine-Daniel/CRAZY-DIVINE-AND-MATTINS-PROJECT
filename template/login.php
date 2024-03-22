<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="process-login.php" method="post">
        <!-- Username field -->
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <!-- Access key field -->
        <label for="access_key">Access Key:</label>
        <input type="text" name="access_key" required><br>

        <!-- Submit button -->
        <input type="submit" value="Login">
    </form>
</body>
</html>
