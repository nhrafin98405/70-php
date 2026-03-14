<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    




<form method="post">

enter the number : <br>
<input type="number" name="prime" > <br> <br> <br>

<input type="submit" name="submit" value="Check Prime">


</form>

<?php


if(isset($_POST['submit'])){

$num = $_POST['prime'];
$prm = true;

if($num <= 1){
    $prm = false;
}else{
    for($i = 2; $i < $num; $i++){
        if($num % $i == 0){
            $prm = false;
            break;
        }
    }
}

if($prm){
    echo $num . " is a Prime Number";
}else{
    echo $num . " is Not a Prime Number";
}

}






?>



</body>
</html>