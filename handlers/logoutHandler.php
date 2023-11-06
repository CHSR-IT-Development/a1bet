<?php 
include '../lib.php'; 
include '../apis.php';
?>

<?php
$subPath = rootSubPath();

// Start the session
session_start();

// When a user logs out, clear the current_session_id in the database
$playerId = $_SESSION['id'];
$query = "UPDATE players SET current_session_id = '' WHERE id = $playerId";
$stmt = $conn->prepare($query);
$stmt->execute();

// Unset all of the session variables
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

// Redirect to the login page or home page
// header("Location: /UAT/v4");
// exit;
?>
