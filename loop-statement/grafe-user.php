<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form method="post">

enter marks : <input type="number" name="marks">
<input type="submit" name="submit" value="Check Grade">

</form>

<?php



if(isset($_POST['submit'])){


$marks =$_POST['marks'];


if($marks >= 80){
    echo "Gread A+";
}elseif($marks >= 70){
    echo "Gread A";
}elseif($marks >= 60){
    echo "Gread A-";
}elseif($marks >= 50){
    echo "Gread B";
}elseif($marks >= 40){
    echo "Gread B-";
}elseif($marks >= 33){
    echo "Gread A";
}else {
    echo "fail";
}

}


?>
    
</body>
</html>