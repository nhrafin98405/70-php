<?php
if(isset($_POST['register'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // password validation
    if(strlen($pass) < 6){
        echo "Password must be at least 6 characters";
        exit;
    }

    $hash = password_hash($pass, PASSWORD_DEFAULT);

    file_put_contents("users.txt", "$user,$hash\n", FILE_APPEND);

    echo "User Registered";
}
?>

<form method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="register">Register</button>
<a href="login.php">
    log-in
</a>
</form>