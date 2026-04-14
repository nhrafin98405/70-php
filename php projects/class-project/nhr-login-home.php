<?php
session_start();

// get current page for active menu
$current = basename($_SERVER['PHP_SELF']);

// username (session)
$user = $_SESSION["rname"] ?? "Guest";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Modern Dashboard</title>

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* ===== ANIMATED BACKGROUND ===== */
body{
    margin:0;
    font-family:Arial;
    min-height:100vh;
    background: linear-gradient(-45deg,#0f172a,#1e293b,#0f766e,#1d4ed8);
    background-size: 400% 400%;
    animation: gradientBG 12s ease infinite;
}

@keyframes gradientBG{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* ===== NAVBAR ===== */
.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 40px;
    background:rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border-bottom:1px solid rgba(255,255,255,0.1);
    position:sticky;
    top:0;
    z-index:1000;
}

/* LOGO */
.logo{
    color:#00f7ff;
    font-size:22px;
    font-weight:bold;
}

/* USER */
.user{
    color:#fff;
    margin-left:15px;
    font-size:14px;
    opacity:0.9;
}

/* MENU */
.nav-links{
    display:flex;
    gap:12px;
    list-style:none;
}

.nav-links li a{
    text-decoration:none;
    color:white;
    padding:10px 14px;
    border-radius:10px;
    transition:0.3s;
    display:flex;
    align-items:center;
    gap:6px;
    position:relative;
}

/* HOVER */
.nav-links li a:hover{
    color:#00f7ff;
    transform:translateY(-2px);
}

/* ACTIVE PAGE */
.active{
    background:rgba(0,247,255,0.15);
    color:#00f7ff !important;
    box-shadow:0 0 12px #00f7ff;
}

/* MOBILE */
.menu-toggle{
    display:none;
    font-size:26px;
    color:white;
    cursor:pointer;
}

/* RESPONSIVE */
@media(max-width:768px){
    .nav-links{
        position:absolute;
        top:70px;
        right:0;
        flex-direction:column;
        background:rgba(0,0,0,0.85);
        width:220px;
        padding:20px;
        display:none;
        border-radius:10px;
    }

    .nav-links.show{
        display:flex;
        animation:fadeIn 0.3s ease;
    }

    .menu-toggle{
        display:block;
    }
}

@keyframes fadeIn{
    from{opacity:0; transform:translateY(-10px);}
    to{opacity:1; transform:translateY(0);}
}

/* ===== PAGE LOADER ===== */
#loader{
    position:fixed;
    width:100%;
    height:100%;
    background:#0f172a;
    display:flex;
    justify-content:center;
    align-items:center;
    z-index:9999;
}

.spinner{
    width:60px;
    height:60px;
    border:6px solid rgba(255,255,255,0.2);
    border-top:6px solid #00f7ff;
    border-radius:50%;
    animation:spin 1s linear infinite;
}

@keyframes spin{
    0%{transform:rotate(0);}
    100%{transform:rotate(360deg);}
}

</style>
</head>

<body>

<!-- LOADER -->
<div id="loader">
    <div class="spinner"></div>
</div>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">
        NHR SYSTEM
        <span class="user">
            <i class="fa fa-user"></i> <?php echo $user; ?>
        </span>
    </div>

    <div class="menu-toggle" onclick="toggleMenu()">☰</div>

    <ul class="nav-links" id="navLinks">

        <li>
            <a class="<?php echo ($current=='nhr-login-main.php')?'active':''; ?>" href="nhr-login-main.php">
                <i class="fa fa-house"></i> Home
            </a>
        </li>

        <li>
            <a class="<?php echo ($current=='nhr-login-login.php')?'active':''; ?>" href="nhr-login-login.php">
                <i class="fa fa-right-to-bracket"></i> Login
            </a>
        </li>

        <li>
            <a class="<?php echo ($current=='nhr-login-register.php')?'active':''; ?>" href="nhr-login-register.php">
                <i class="fa fa-user-plus"></i> Register
            </a>
        </li>

        <li>
            <a class="<?php echo ($current=='forgot-password.php')?'active':''; ?>" href="forgot-password.php">
                <i class="fa fa-key"></i> Forgot
            </a>
        </li>

        <li>
            <a class="<?php echo ($current=='nhr-login-demo.php')?'active':''; ?>" href="nhr-login-demo.php">
                <i class="fa fa-code"></i> Demo
            </a>
        </li>

        <li>
            <a class="<?php echo ($current=='demo.php')?'active':''; ?>" href="demo.php">
                <i class="fa fa-flask"></i> Demo2
            </a>
        </li>

        <li>
            <a href="nhr-login-logout.php">
                <i class="fa fa-power-off"></i> Logout
            </a>
        </li>

    </ul>
</div>

<script>
// MENU TOGGLE
function toggleMenu(){
    document.getElementById("navLinks").classList.toggle("show");
}

// PAGE LOADER
window.onload = function(){
    document.getElementById("loader").style.display = "none";
}
</script>

</body>
</html>