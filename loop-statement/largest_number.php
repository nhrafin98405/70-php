<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php



if(isset($_POST['submit'])){

$a =$_POST['num1'];
$b =$_POST['num2'];
$c =$_POST['num3'];


if($a >= $b && $a >= $c){
    echo "largest number :". $a;
}elseif($b >= $a && $b>=$c){
    echo "largest number :". $b;
}else{
    echo "largest number :". $c;
}
    
}




?>



<form method="post">


first number : <input type="number" name="num1"> <br> <br> <br>
first number : <input type="number" name="num2"> <br> <br> <br>
first number : <input type="number" name="num3"> <br> <br> <br>

<input type="submit" name="submit" value="Check Largest">
</form>
    
</body>
</html>