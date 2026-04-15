<?php
session_start();

// unset all session variables
$_SESSION = [];

// destroy session
session_destroy();

// delete session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
?>

<script>
localStorage.setItem("logout", Date.now());
window.location.href = "nhr-login-login.php";
</script>