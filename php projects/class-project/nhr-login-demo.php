<?php require_once("nhr-login-home.php"); ?>
<?php 
session_start();

if (!isset($_SESSION["rname"])) {
    header("location:nhr-login-login.php");
    exit();
}

$user = $_SESSION["rname"];
$folder = "img/";
$postFile = "img/posts.txt";

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

        $imgName = time() . "_" . $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];

        move_uploaded_file($tmp, $folder . $imgName);

        $caption = str_replace("|", "-", $_POST["caption"]);

        $line = $user . "|" . $imgName . "|" . $caption . "|0|\n";

        file_put_contents($postFile, $line, FILE_APPEND);
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
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    background: radial-gradient(circle at top,#0b0f2a,#05010a);
    color:white;
    display:flex;
    flex-direction:column;
    align-items:center;
}

/* HEADER */
.header{
    width:100%;
    text-align:center;
    padding:20px;
}

/* POST BOX */
.post-box{
    width:400px;
    padding:20px;
    border-radius:15px;

    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(20px);

    border:1px solid rgba(255,255,255,0.1);
    margin-bottom:20px;
}

input, textarea{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:none;
    border-radius:10px;
    background: rgba(255,255,255,0.08);
    color:white;
}

button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:10px;
    background: linear-gradient(90deg,#00f5ff,#ff00ff);
    color:white;
    cursor:pointer;
}

/* FEED */
.feed{
    width:450px;
}

/* POST CARD */
.post{
    margin-bottom:20px;
    border-radius:15px;
    overflow:hidden;

    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(20px);

    animation: fade 0.5s ease;
}

@keyframes fade{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}

.post img{
    width:100%;
}

/* ACTIONS */
.actions{
    display:flex;
    justify-content:space-between;
    padding:10px;
}

a{
    color:white;
    text-decoration:none;
    font-size:14px;
}

.like{
    color:#ff4d6d;
}

/* CAPTION */
.caption{
    padding:10px;
    font-size:14px;
    opacity:0.9;
}

/* USER */
.user{
    padding:10px;
    font-weight:bold;
    color:#00f5ff;
}
</style>
</head>

<body>

<div class="header">
    <h2>👋 Welcome <?php echo $user; ?></h2>
</div>

<!-- POST CREATE -->
<div class="post-box">
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <textarea name="caption" placeholder="Write caption..."></textarea>
        <button name="post">Post</button>
    </form>
</div>

<!-- FEED -->
<div class="feed">

<?php foreach(array_reverse($posts) as $p):

$data = explode("|", $p);
if(count($data) < 4) continue;

$username = $data[0];
$image = $data[1];
$caption = $data[2];
$likes = $data[3];
?>

<div class="post">

    <div class="user">@<?php echo $username; ?></div>

    <img src="img/<?php echo $image; ?>">

    <div class="caption"><?php echo $caption; ?></div>

    <div class="actions">

        <a class="like" href="?like=<?php echo $image; ?>">
            ❤️ Like (<?php echo $likes; ?>)
        </a>

        <a href="#">💬 Comment</a>

    </div>

</div>

<?php endforeach; ?>

</div>

</body>
</html>