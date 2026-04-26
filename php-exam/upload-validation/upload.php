<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$msg = "";

if(isset($_POST['upload'])){
    $file = $_FILES['image'];

    $name = $file['name'];
    $tmp  = $file['tmp_name'];
    $size = $file['size'];

    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    // validation
    $allowed = ['jpg','jpeg','png'];

    if(!in_array($ext, $allowed)){
        $msg = "Only JPG, PNG allowed";
    }
    elseif($size > 2*1024*1024){
        $msg = "Max size 2MB";
    }
    else{
        if(!is_dir("uploads")) mkdir("uploads");

        move_uploaded_file($tmp, "uploads/".$name);
        $msg = "Upload Success";
    }
}
?>


<h3>Welcome <?php echo $_SESSION['user']; ?></h3>

<form method="post" enctype="multipart/form-data">
<input type="file" name="image" required>
<button name="upload">Upload</button>
</form>

<p><?php echo $msg; ?></p>


<a href="logout.php">Logout</a>

<hr>

<?php


if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$files = glob("uploads/*");
?>

<h2>Images</h2>

<?php
foreach($files as $f){
    echo "<div>";
    echo "<img src='$f' width='150'><br>";

    echo "Size: ".filesize($f)." bytes";
    echo "</div><hr>";
}
?>

<a href="upload.php">Back</a>