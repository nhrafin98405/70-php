<?php
session_start();

$message = "";

if (isset($_POST["btnreset"])) {

    $user = trim($_POST["name"]);
    $newpass = trim($_POST["pass"]);

    if ($user == "" || $newpass == "") {
        $message = "❌ All fields required";
    } else {

        $file = "nhr-login-text.txt";
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $found = false;
        $updated = [];

        foreach ($lines as $line) {

            $data = explode(",", $line);

            if (count($data) < 2) continue;

            $n = $data[0];
            $p = $data[1];

            if ($n === $user) {
                $p = password_hash($newpass, PASSWORD_DEFAULT);
                $found = true;
            }

            $updated[] = $n . "," . $p;
        }

        if ($found) {
            file_put_contents($file, implode(PHP_EOL, $updated) . PHP_EOL);
            $message = "✅ Password updated successfully!";
        } else {
            $message = "❌ Username not found!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    overflow:hidden;

    background: radial-gradient(circle at top,#05010a,#000000);
}

/* glowing dark orbs */
body::before,
body::after{
    content:'';
    position:absolute;
    width:500px;
    height:500px;
    border-radius:50%;
    filter: blur(120px);
    opacity:0.25;
    z-index:0;
    animation: float 12s infinite alternate;
}

body::before{
    background:#00f5ff;
    top:5%;
    left:10%;
}

body::after{
    background:#ff00ff;
    bottom:5%;
    right:10%;
}

@keyframes float{
    from{transform:translateY(0) scale(1);}
    to{transform:translateY(90px) scale(1.2);}
}

/* TITLE FIXED */
h2{
    color:white;
    margin-bottom:20px;
    font-size:26px;
    letter-spacing:3px;
    text-transform:uppercase;

    text-shadow:
        0 0 10px #00f5ff,
        0 0 20px #ff00ff;
    z-index:2;
}

/* form card */
form{
    width:360px;
    padding:45px;
    border-radius:20px;
    text-align:center;

    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(25px);

    border:1px solid rgba(255,255,255,0.12);

    box-shadow:
        0 0 30px rgba(0,245,255,0.2),
        0 0 60px rgba(255,0,255,0.1);

    position:relative;
    z-index:2;

    animation: fadeIn 0.8s ease;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(40px) scale(0.9);
    }
    to{
        opacity:1;
        transform:translateY(0) scale(1);
    }
}

/* inputs */
input{
    width:100%;
    padding:12px;
    margin:10px 0;

    border:none;
    outline:none;
    border-radius:12px;

    background: rgba(255,255,255,0.08);
    color:white;

    transition:0.3s;
}

input::placeholder{
    color:rgba(255,255,255,0.6);
}

input:focus{
    transform:scale(1.05);
    box-shadow:0 0 15px cyan;
}

/* button */
button{
    width:100%;
    padding:12px;
    margin-top:10px;

    border:none;
    border-radius:12px;

    background: linear-gradient(90deg,#00f5ff,#ff00ff);
    color:white;
    font-weight:bold;

    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.05);
    box-shadow:0 0 25px cyan;
}

/* link */
a{
    display:block;
    margin-top:15px;
    color:white;
    opacity:0.7;
    text-decoration:none;
    transition:0.3s;
}

a:hover{
    opacity:1;
    text-shadow:0 0 10px cyan;
}

/* message */
p{
    color:#ff4d6d;
    margin-bottom:10px;
    font-weight:bold;
}
</style>
</head>

<body>
    <?php require_once("nhr-login-home.php"); ?>

<h2>Forgot Password</h2>

<form method="post">

<p><?php echo $message; ?></p>

<input type="text" name="name" placeholder="Username">

<input type="password" name="pass" placeholder="New Password">

<button name="btnreset">Reset Password</button>

<a href="nhr-login-login.php">Back to Login</a>

</form>

</body>
</html>