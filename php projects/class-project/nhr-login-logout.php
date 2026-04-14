<?php 
    session_start();

    $_SESSION = [];
    session_destroy();
    ?>

    <script>
    // logout all tabs
    localStorage.setItem("logout", Date.now());
    window.location.href = "nhr-login-login.php";
</script>