<?php
session_start(); // Start the session.

// Check if the user is already logged in, redirect to homepage if true.
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Example credentials.
    $username = 'admin';
    $password = 'password';

    // Fetch user input from form.
    $input_username = $_POST['username'] ?? '';
    $input_password = $_POST['password'] ?? '';

    // Validate credentials.
    if ($input_username === $username && $input_password === $password) {
        // Set session variables.
        $_SESSION['user_id'] = $username;

        // Redirect to the homepage.
        header("Location: index.php");
        exit;
    } else {
        $error = 'Invalid username or password!';
    }
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

?>

<!-- HTML login form -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Include your CSS here -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="login-container">
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
            <button type="button" class="btn btn-default" onclick="location.href='index.php'">Cancel</button>

        </form>
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
