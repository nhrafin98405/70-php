<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php


if(isset($_POST['submitbutton'])){

    $file_name = $_FILES['r']['name'];
    $file_type = $_FILES['r']['type'];
    $file_full_path = $_FILES['r']['full_path'];
    $file_tmp_name = $_FILES['r']['tmp_name'];
    $file_size = $_FILES['r']['size'];
    $file_error = $_FILES['r']['error'];
    $type = pathinfo($file_name,PATHINFO_EXTENSION);

    // image path 
    $img = "img/";

    // convert to kb 

    $kb = $file_size / 1024;


    // type validation 


    if($type == "jpg" || $type == "png"){

        move_uploaded_file($file_tmp_name,$img.$file_name);

         echo "uplpaded";

    }else{
        echo "only jpg,png uplpaded";
    }

    // size validation + type validation  

//     if($kb > 200){
//         echo "file is too large";
//     }elseif($type == "jpg" || $type == "png"){
//         move_uploaded_file($file_tmp_name,$img.$file_name);
//     }else{
//         echo "only jpg,png uplpaded ";
//     }

    
}



?>

<form action="" method="post" enctype="multipart/form-data">

<input type="file" name="r">
<input type="submit" name="submitbutton">
</form>


<?php 



if(isset($_POST["submitbutton"])){
     echo "<img src='$img.$file_name' alt='image' width='500px'>";
}




?>
    
</body>
</html>