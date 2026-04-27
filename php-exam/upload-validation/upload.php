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

    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];

    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    $allowed = ['jpg','jpeg','png'];

    if(!in_array($ext, $allowed)){
        $msg = "Only JPG, PNG allowed";
    }
    elseif($size > 2*1024*1024){
        $msg = "Max size 2MB";
    }
    else{
        if(!is_dir("uploads")) mkdir("uploads");

        // make unique filename
        $newName = time() . "_" . $name;

        move_uploaded_file($tmp, "uploads/".$newName);

        // save info to file (JSON)
       $data = '"file":"'.$newName.'","name":"'.$fullname.'","email":"'.$email.'"';

file_put_contents("data.txt", $data.PHP_EOL, FILE_APPEND);

$msg = "Upload Success";
}
}


?>


<h3>Welcome <?php echo $_SESSION['user']; ?></h3>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="fullname" placeholder="Your Name" required><br><br>
    <input type="email" name="email" placeholder="Your Email" required><br><br>
    <input type="file" name="image" required><br><br>
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


?>

<h2>Images</h2>

<?php
if(file_exists("data.txt")){
    $lines = file("data.txt");

    foreach($lines as $line){

        preg_match('/"file":"(.*?)","name":"(.*?)","email":"(.*?)"/', $line, $match);

        if(count($match) == 4){
            $file  = $match[1];
            $name  = $match[2];
            $email = $match[3];

            echo "<div>";
            echo "<img src='uploads/".$file."' width='150'><br>";
            echo "Name: ".htmlspecialchars($name)."<br>";
            echo "Email: ".htmlspecialchars($email)."<br>";
            echo "Size: ".filesize("uploads/".$file)." bytes";
            echo "</div><hr>";
        }
    }
}
?>
<a href="login.php">Back</a>