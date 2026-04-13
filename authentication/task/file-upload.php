<?php 
session_start();



if (!isset($_SESSION["rname"])) {
    header("location:log-in.php");
    exit();
}

$name = $_SESSION["rname"] ?? '';


$img = "img/";

if(isset($_POST['submitbutton'])){

    foreach($_FILES['r']['name'] as $key => $name){

        $file_name = $_FILES['r']['name'][$key];
        $file_tmp = $_FILES['r']['tmp_name'][$key];
        $file_error = $_FILES['r']['error'][$key];

        $type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $new_name = time() . "_" . $file_name;

        if($file_error === 0){

            if($type == "jpg" || $type == "png"){

                move_uploaded_file($file_tmp, $img . $new_name);

            } else {
                echo " Only JPG, PNG allowed: $file_name <br>";
            }

        } else {
            echo " Error uploading: $file_name <br>";
        }
    }
}
?>

<h3>Welcome, <?php echo $_SESSION["rname"]; ?></h3>

<a href="log-out.php">Logout</a><br><br>

<form method="post" enctype="multipart/form-data">
    Select Images:<br>
    <input type="file" name="r[]" multiple required><br><br>
    <input type="submit" name="submitbutton" value="Upload">
</form>

<hr>

<h3> Uploaded Images</h3>

<?php
$files = scandir($img);

foreach($files as $file){

    
    if($file != "." && $file != ".."){

        echo "<img src='".$img.$file."' width='150px' style='margin:10px;'>";
    }
}
?>