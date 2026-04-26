<?php
session_start();

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $lines = file("users.txt");

    foreach($lines as $line){
        list($u, $p) = explode(",", trim($line));

        if($u === $user && password_verify($pass, $p)){
            $_SESSION['user'] = $user;
            header("Location: upload.php");
            exit;
        }
    }

    echo "Invalid Login";
}
?>

<form method="post">
<input type="text" name="username" required>
<input type="password" name="password" required>
<button name="login">Login</button>
</form>