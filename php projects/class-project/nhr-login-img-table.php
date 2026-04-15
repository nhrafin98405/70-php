<?php 

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["rname"])) {
        header("location:nhr-login-login.php");
        exit();
    }
    require_once("nhr-login-home.php");
    $user = $_SESSION["rname"];
    $folder = "img/";
    $postFile = "img/posts.txt";
    $message = "";

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    /* CREATE FILE */
    if (!file_exists($postFile)) {
        file_put_contents($postFile, "");
    }

    /* =========================
    UPLOAD POST
    ========================= */
  if (isset($_POST["post"])) {

    if (!empty($_FILES["image"]["name"])) {

        $file = $_FILES["image"];

        $fileName = $file["name"];
        $tmp = $file["tmp_name"];
        $fileSize = $file["size"];
        $fileType = $file["type"];
        $fileError = $file["error"];

        $allowed = ["jpg", "jpeg", "png", "gif"];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            $message = "❌ Invalid file format!";
        }
        elseif ($fileSize > 2 * 1024 * 1024) {
            $message = "❌ File too large!";
        }
        else {

            $imgName = time() . "_" . rand(1000,9999) . "." . $ext;

            move_uploaded_file($tmp, $folder . $imgName);

            // STORE FILE INFO INSTEAD OF CAPTION
            $info =
                    "Name: $fileName<br>" .
                    "Type: $fileType<br>" .
                    "Size: $fileSize bytes<br>" .
                    "Error: $fileError";

            $line = $user . "|" . $imgName . "|" . $info . "|0|\n";

            file_put_contents($postFile, $line, FILE_APPEND);

            $message = "✅ File uploaded successfully!";
        }
    }
}
    /* =========================
    LIKE POST
    ========================= */
    if (isset($_GET["like"])) {

        $id = $_GET["like"];
        $posts = file($postFile);

        foreach ($posts as &$p) {

            $data = explode("|", trim($p));

            if ($data[1] == $id) {
                $data[3] = (int)$data[3] + 1;
                $p = implode("|", $data) . "\n";
            }
        }

        file_put_contents($postFile, implode("", $posts));
    }
/* =========================
DELETE POST
========================= */
if (isset($_GET["delete"])) {

    $id = $_GET["delete"];
    $posts = file($postFile);

    foreach ($posts as $key => $p) {

        $data = explode("|", trim($p));

        if ($data[1] == $id) {

            // delete image file also
            if (file_exists("img/" . $data[1])) {
                unlink("img/" . $data[1]);
            }

            unset($posts[$key]);
        }
    }

    file_put_contents($postFile, implode("", $posts));
}
    /* =========================
    LOAD POSTS
    ========================= */
    $posts = file($postFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Social Feed</title>
<style>
    h2{
        text-align: center;
    }
    .post-box{
    width:90%;
    max-width:600px;
    margin:25px auto;
    padding:20px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.post-box textarea{
    width:100%;
    margin-top:10px;
    padding:12px;
    border:none;
    border-radius:10px;
    outline:none;
    resize:none;
    height:80px;
    background:rgba(255,255,255,0.15);
    color:#fff;
}

.post-box input[type="file"]{
    width:100%;
    margin-top:10px;
    color:#fff;
}

.post-box button{
    width:100%;
    margin-top:12px;
    padding:10px;
    border:none;
    border-radius:10px;
    background:linear-gradient(90deg,#38bdf8,#60a5fa);
    color:black;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.post-box button:hover{
    transform:scale(1.03);
}
.feed-table{
    width:95%;
    max-width:1000px;
    margin:20px auto;
    border-collapse:separate;
    border-spacing:0 12px;
    font-family:Segoe UI;
}

.feed-table thead th{
    background:#1e293b;
    color:#fff;
    padding:14px;
    text-align:left;
    border-radius:10px;
}

.feed-table tbody tr{
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(10px);
    transition:0.3s;
}

.feed-table tbody tr:hover{
    transform:scale(1.01);
    background: rgba(255,255,255,0.12);
}

.feed-table td{
    padding:12px;
    color:#e2e8f0;
    vertical-align:middle;
}

.feed-img{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:10px;
    border:2px solid #38bdf8;
}

.badge{
    display:inline-block;
    padding:5px 10px;
    background:#38bdf8;
    color:black;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

.like-btn{
    display:inline-block;
    padding:6px 10px;
    background:#ef4444;
    color:white;
    border-radius:8px;
    text-decoration:none;
    font-size:13px;
}

.like-btn:hover{
    background:#dc2626;
}
</style>
</head>

<body>

<div class="header">
    <h2>👋 Welcome <?php echo $user; ?></h2>
</div>
<?php

if($message != ""): ?>
    <div style="
        width:90%;
        max-width:600px;
        margin:10px auto;
        padding:10px;
        border-radius:10px;
        text-align:center;
        background:rgba(255,255,255,0.1);
        color:white;
        font-weight:bold;
    ">
        <?php echo $message; ?>
    </div>
<?php endif; ?>
<!-- POST CREATE -->
<div class="post-box">
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button name="post">Post</button>
    </form>
</div>


<div class="feed">

<table class="feed-table">

    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Image</th>
            <th>Caption</th>
            <th>Likes</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

<?php 
$id = 1;
foreach(array_reverse($posts) as $p):

$data = explode("|", $p);
if(count($data) < 4) continue;

$username = $data[0];
$image = $data[1];
$caption = $data[2];
$likes = $data[3];
?>

<tr>

    <td><span class="badge"><?php echo $id++; ?></span></td>

    <td><?php echo htmlspecialchars($username); ?></td>

    <td>
        <img class="feed-img" src="img/<?php echo $image; ?>">
    </td>

    <td style="font-size:12px; line-height:1.4;">
    <?php echo $caption; ?>
    </td>

    <td>❤️ <?php echo $likes; ?></td>

    <td>
        <a class="like-btn" href="?like=<?php echo $image; ?>">Like</a>

        <a class="like-btn" style="background:#f97316;" 
        href="?delete=<?php echo $image; ?>" 
        onclick="return confirm('Delete this post?')">
        Delete
        </a>
    </td>
    

</tr>

<?php endforeach; ?>

    </tbody>
</table>
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