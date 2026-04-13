<?php 
session_start();

if (isset($_POST["btnsubmit"])) {

    $user = $_POST["name"];
    $pass = $_POST["pass"];

    $files = file("data.txt");
    $found = false;

    foreach ($files as $line) {
        list($n, $p) = explode(",", trim($line));

        if ($n === $user && $p === $pass) {
            $found = true;
            break;
        }
    }

    if ($found) {
        $_SESSION["rname"] = $user;
        header("location:file-upload.php");
        exit();
    } else {
        echo " Invalid username or password";
    }
}
?>

<form method="post">
    User-name:<br>
    <input type="text" name="name" required><br>

    Password:<br>
    <input type="password" name="pass" required><br><br>

    <input type="submit" name="btnsubmit" value="Login">
</form>