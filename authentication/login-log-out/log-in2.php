<?php session_start();

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

        header('location:demo.php');
        exit();
    } else {
        echo "invalide password";
    }
}





?>


<form method="post">




    user-name : <br>
    <input type="text" name="name"> <br>
    pass : <br>
    <input type="password" name="pass">

    <br>
    <br>
    <br>

    <input type="submit" name="btnsubmit">
</form>