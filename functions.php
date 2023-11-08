<?php
function generateMenu($userRole) {
    $menuItems = [
        'user' => [
            'Home' => 'index.php',
            'Profile' => 'profile.php',
            'Log Out' => 'logout.php',
        ],
        'admin' => [
            'Dashboard' => 'admin.php',
            'Manage Users' => 'manage-users.php',
            // Include other admin links
        ],
        // Define other roles as necessary
    ];

    return $menuItems[$userRole] ?? $menuItems['user']; // Default to 'user' role if not specified.
}
?>

<?php
// Function to create a new user in the database
function createUser($pdo, $username, $hashed_password) {
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

    if ($stmt = $pdo->prepare($sql)) {
        // Set parameters
        $param_username = $username; // Set the value before binding
        $param_password = $hashed_password; // Set the value before binding

        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page
            header("Location: login.php");
            exit; // Always call exit after a header redirect
        } else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        unset($stmt);
    }
}

// Function to check if the username already exists
function usernameExists($pdo, $username) {
    $sql = "SELECT id FROM users WHERE username = :username";
    
    if ($stmt = $pdo->prepare($sql)) {
        // Set parameters before binding
        $param_username = $username;

        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                return true; // Username already exists
            } else {
                return false; // Username does not exist
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        unset($stmt);
    }
}
?>

