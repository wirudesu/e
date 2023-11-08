<?php
include 'session.php';

// Check if the user is admin
if (!$_SESSION['is_admin']) {
    header('Location: index.php');
    exit;
}
?>