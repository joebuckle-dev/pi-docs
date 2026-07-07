<?php
session_start();

// Configuration - CHANGE THIS PASSWORD!
define('PASSWORD', 'policing2026');
define('SESSION_TIMEOUT', 3600); // 1 hour in seconds

// Check if user is authenticated
$authenticated = false;
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // Check if session has expired
    if (time() - $_SESSION['auth_time'] < SESSION_TIMEOUT) {
        $authenticated = true;
    } else {
        // Session expired
        session_destroy();
    }
}

// If not authenticated, redirect to login
if (!$authenticated) {
    // Remember where the user was trying to go so we can return them there after login
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET') {
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    }
    header('Location: /docs/index.php');
    exit;
}
?>
