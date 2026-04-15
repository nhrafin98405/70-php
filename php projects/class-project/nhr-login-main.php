<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["rname"])) {
    header("location:nhr-login-login.php");
    exit();
}

$file = "nhr-login-data.txt";
$message = "";
$searchResult = null;

/* =========================
   SAVE DATA
========================= */
if (isset($_POST["submit"])) {

    $id = trim($_POST["txtId"]);
    $name = trim($_POST["txtName"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["txtPhone"]);

    if ($id != "" && $name != "" && $email != "" && $phone != "") {

        $line = $id . "," . $name . "," . $email . "," . $phone . PHP_EOL;

        file_put_contents($file, $line, FILE_APPEND);

        $message = "✅ Data saved successfully!";
    } else {
        $message = "❌ Please fill all fields!";
    }
}

/* =========================
   SEARCH BY ID
========================= */
if (isset($_POST["search"])) {

    $searchId = trim($_POST["searchId"]);

    if (file_exists($file)) {

        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {

            list($id, $name, $email, $phone) = explode(",", $line);

            if ($id == $searchId) {
                $searchResult = [
                    "id" => $id,
                    "name" => $name,
                    "email" => $email,
                    "phone" => $phone
                ];
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>

<style>
body{
    font-family:Arial;
    background:#0b0f2a;
    color:white;
    text-align:center;
}

.container{
    margin-top:30px;
}

input{
    padding:10px;
    margin:5px;
    border-radius:8px;
    border:none;
}

button{
    padding:10px 15px;
    border:none;
    border-radius:8px;
    background:linear-gradient(90deg,#00f5ff,#ff00ff);
    color:white;
    cursor:pointer;
}

.box{
    margin-top:20px;
    padding:15px;
    display:inline-block;
    background:rgba(255,255,255,0.1);
    border-radius:10px;
}
</style>

</head>
<body>
    <?php require_once("nhr-login-home.php"); ?>

<h2>Welcome <?php echo $_SESSION["rname"]; ?></h2>

<div class="container">

<!-- SAVE FORM -->
<form method="post">
    <h3>Save Data</h3>

    <input type="text" name="txtId" placeholder="ID"><br>
    <input type="text" name="txtName" placeholder="Name"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="text" name="txtPhone" placeholder="Phone"><br>

    <button name="submit">Save</button>
</form>

<p><?php echo $message; ?></p>

<hr>

<!-- SEARCH FORM -->
<form method="post">
    <h3>Search by ID</h3>

    <input type="text" name="searchId" placeholder="Enter ID">
    <button name="search">Search</button>
</form>

<!-- RESULT -->
<?php if ($searchResult): ?>
    <div class="box">
        <h3>Result Found</h3>
        <p>ID: <?php echo $searchResult["id"]; ?></p>
        <p>Name: <?php echo $searchResult["name"]; ?></p>
        <p>Email: <?php echo $searchResult["email"]; ?></p>
        <p>Phone: <?php echo $searchResult["phone"]; ?></p>
    </div>
<?php endif; ?>

<br><br>

<a href="nhr-login-demo.php">Back</a> |
<a href="nhr-login-logout.php">Logout</a>

</div>
<script>
window.addEventListener("storage", function(event) {
    if (event.key === "logout") {
        window.location.href = "nhr-login-login.php";
    }
});
</script>
</body>
</html>