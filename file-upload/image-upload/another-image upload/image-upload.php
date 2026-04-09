<?php

$img = "img/";

if(isset($_POST['submitbutton'])){

    $file_name = $_FILES['r']['name'];
    $file_tmp_name = $_FILES['r']['tmp_name'];
    $file_size = $_FILES['r']['size'];
    $file_error = $_FILES['r']['error'];

    $type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // unique name
    $new_name = time() . "_" . $file_name;

    if($file_error === 0){

        if($type == "jpg" || $type == "png"){

            move_uploaded_file($file_tmp_name, $img . $new_name);
            echo "✅ Uploaded";

            // show image
            echo "<br><img src='".$img.$new_name."' width='300px'>";

        }else{
            echo "❌ Only JPG, PNG allowed";
        }

    }else{
        echo "❌ File upload error";
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="r">
    <input type="submit" name="submitbutton">
</form>