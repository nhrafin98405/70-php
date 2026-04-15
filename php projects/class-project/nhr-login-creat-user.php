<?php
    $user = "admin";
    $pass = "1234";

    // hash password
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    // save to file
    file_put_contents("nhr-login-text.txt", $user . "," . $hash . PHP_EOL);

    echo "User created successfully!";

    // <a href="nhr-login-login.php">Back to Login</a>
    
?>
<script>
window.addEventListener("storage", function(event) {
    if (event.key === "logout") {
        window.location.href = "nhr-login-login.php";
    }
});
</script>

