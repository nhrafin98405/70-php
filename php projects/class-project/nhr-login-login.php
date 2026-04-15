<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$message = ""; // 🔥 ADD THIS LINE

if (isset($_POST["btnsubmit"])) {

    $user = $_POST["name"];
    $pass = $_POST["pass"];

    $files = file("nhr-login-text.txt");

    $found = false;

    foreach ($files as $line) {
        list($n, $p) = explode(",", trim($line));

        if ($n === $user && password_verify($pass, $p)) {
            $found = true;
            break;
        }
    }

    if ($found) {
        $_SESSION["rname"] = $user;
        header('location:nhr-login-home.php');
        exit();
    } else {
        $message = "❌ Invalid username or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cyberpunk Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at top, #0b0f2a, #05010a);
        }

        /* canvas particles */
        canvas {
            position: absolute;
            top: 0;
            left: 0;
        }

        /* card container */
        .card {
            width: 360px;
            padding: 45px;
            border-radius: 25px;
            text-align: center;

            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);

            border: 1px solid rgba(255, 255, 255, 0.1);

            box-shadow:
                0 0 30px rgba(0, 255, 255, 0.2),
                0 0 60px rgba(255, 0, 255, 0.15);

            color: white;

            transform-style: preserve-3d;
            transition: 0.2s;

            animation: pop 1s ease;
            position: relative;
            z-index: 2;
        }

        @keyframes pop {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        h2 {
            margin-bottom: 20px;
            text-shadow: 0 0 10px cyan;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;

            border: none;
            outline: none;
            border-radius: 12px;

            background: rgba(255, 255, 255, 0.08);
            color: white;

            transition: 0.3s;
        }

        input:focus {
            box-shadow: 0 0 15px cyan;
            transform: scale(1.03);
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;

            border: none;
            border-radius: 12px;

            background: linear-gradient(90deg, #00f5ff, #ff00ff);
            color: white;
            font-weight: bold;

            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px cyan;
        }

        a {
            display: block;
            margin-top: 15px;
            color: white;
            opacity: 0.7;
            text-decoration: none;
        }

        a:hover {
            opacity: 1;
            text-shadow: 0 0 10px cyan;
        }
    </style>
</head>

<body>
    

    <canvas id="particles"></canvas>

    <div class="card" id="card">
        <h2>LOGIN</h2>

        <!-- SHOW ERROR -->
        <p style="color:#ff4d6d; margin-bottom:10px;">
            <?php echo $message; ?>
        </p>

        <!-- FORM FIXED -->
        <form method="post">
            <input type="text" name="name" placeholder="Username" required>

            <div style="position:relative;">
                <input type="password" name="pass" id="pass" placeholder="Password" required>

                <span onclick="togglePass()"
                    style="position:absolute; right:12px; top:50%; transform:translateY(-50%);
                 cursor:pointer; color:black; opacity:0.7;">
                    👁
                </span>
            </div>

            <button type="submit" name="btnsubmit">LOGIN</button>
        </form>

        <a href="forgot-password.php">Forgot Password?</a>
        <a href="nhr-login-register.php">Create New</a>
    </div>

    <script>
        // ==========================
        // PARTICLE BACKGROUND
        // ==========================
        const canvas = document.getElementById("particles");
        const ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particlesArray = [];

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2;
                this.speedX = Math.random() * 1 - 0.5;
                this.speedY = Math.random() * 1 - 0.5;
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;

                if (this.x < 0) this.x = canvas.width;
                if (this.x > canvas.width) this.x = 0;
                if (this.y < 0) this.y = canvas.height;
                if (this.y > canvas.height) this.y = 0;
            }

            draw() {
                ctx.fillStyle = "rgba(0,255,255,0.7)";
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function init() {
            for (let i = 0; i < 80; i++) {
                particlesArray.push(new Particle());
            }
        }
        init();

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particlesArray.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }
        animate();

        function togglePass() {
            let pass = document.getElementById("pass");

            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }
        // ==========================
        // 3D CARD MOUSE EFFECT
        // ==========================
        const card = document.getElementById("card");

        document.addEventListener("mousemove", (e) => {
            let x = (window.innerWidth / 2 - e.pageX) / 25;
            let y = (window.innerHeight / 2 - e.pageY) / 25;

            card.style.transform = `rotateY(${x}deg) rotateX(${y}deg)`;
        });

        document.addEventListener("mouseleave", () => {
            card.style.transform = "rotateY(0deg) rotateX(0deg)";
        });
    </script>
<script>
window.addEventListener("storage", function(event) {
    if (event.key === "logout") {
        window.location.href = "nhr-login-login.php";
    }
});
</script>
</body>

</html>