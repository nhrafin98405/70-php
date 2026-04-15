<?php 
session_start();

$message = "";

if (isset($_POST["btnregister"])) {

    $user = trim($_POST["name"]);
    $pass = trim($_POST["pass"]);

    // 🔒 Basic validation
    if ($user == "" || $pass == "") {
        $message = "❌ All fields are required";
    } else {

        // 🔍 Check if user already exists
        $exists = false;
        if (file_exists("nhr-login-text.txt")) {
            $files = file("nhr-login-text.txt");

            foreach ($files as $line) {
                list($n, $p) = explode(",", trim($line));
                if ($n === $user) {
                    $exists = true;
                    break;
                }
            }
        }

        if ($exists) {
            $message = "❌ Username already exists";
        } else {

            // 🔐 Hash password
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            // 💾 Save to file
            $data = $user . "," . $hash . PHP_EOL;
            file_put_contents("nhr-login-text.txt", $data, FILE_APPEND);

            $message = "✅ Registration successful!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<style>
    body{
    min-height:100vh;
    background: linear-gradient(135deg,#ff758c,#ff7eb3);
    font-family:sans-serif;
}
/* NAVBAR FIX */
nav{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    z-index:1000;
}

/* CENTER ONLY CARD */
.main{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding-top:80px; /* adjust based on navbar height */
}

    .card{
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(15px);
        padding:40px;
        border-radius:20px;
        width:320px;
        text-align:center;
        box-shadow:0 10px 30px rgba(0,0,0,0.2);
        animation: fade 1s;
    }

    @keyframes fade{
        from{opacity:0; transform:translateY(20px);}
        to{opacity:1;}
    }

    input{
        width:100%;
        padding:10px;
        margin:10px 0;
        border:none;
        border-radius:10px;
    }

    button{
        width:100%;
        padding:10px;
        background:#ff4b2b;
        border:none;
        border-radius:10px;
        color:white;
        cursor:pointer;
    }

    button:hover{
        background:#ff416c;
    }

    .msg{
        color:white;
    }

    a{
        color:white;
        display:block;
        margin-top:10px;
    }
</style>

</head>
<body>
    <?php require_once("nhr-login-home.php"); ?>

<div class="main">
    <div class="card">
        <h2 style="color:white;">Register</h2>

        <p class="msg"><?php echo $message; ?></p>

        <form method="post">
            <input type="text" name="name" placeholder="Username" required>
            <input type="password" name="pass" placeholder="Password" required>

            <button name="btnregister">Register</button>
        </form>

        <a href="nhr-login-login.php">Back to Login</a>
    </div>
</div>

</body>
</html>