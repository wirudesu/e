<?php
// navigation.php
function generateMenu() {
    if (isset($_SESSION['user_id'])) {
        // User is logged in
        $menuItems = [
            'Home' => 'index.php',
            'Profile' => 'profile.php',
            'Log Out' => 'logout.php',
            // other logged-in user menu items
        ];
    } else {
        // Guest user
        $menuItems = [
            'Home' => 'index.php',
            'Login' => 'login.php',
            'Sign Up' => 'signup.php',
            // other guest user menu items
        ];
    }
    return $menuItems;
}

$menu = generateMenu();
?>

<!-- HTML for the navigation menu -->
<nav>
  <ul>
    <?php foreach ($menu as $name => $link): ?>
      <li><a href="<?php echo htmlspecialchars($link); ?>"><?php echo htmlspecialchars($name); ?></a></li>
    <?php endforeach; ?>
  </ul>
</nav>
